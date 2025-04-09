<?php

namespace App\Http\Controllers;

use App\Models\ProductionLog;
use App\Models\stock_movement;
use App\Models\ChemicalStockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\CompanyMaterial;
use App\Models\CompanyChemical;
// use App\Http\Controllers\StockMovementController;

class ProductionLogController extends StockMovementController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,company_id',
            'production_title' => 'required|string|max:255',
            'operation_name' => 'required|exists:company_operations,company_operation_id',
            'material_used' => 'nullable|array',
            'material_used.*.material_id' => 'required|exists:company_materials,companyMaterialId',
            'materials_used.*.quantity' => 'required|numeric|min:0',
            'chemical_used' => 'nullable|array',
            'chemical_used.*.chemical_id' => 'required|exists:company_chemicals,company_chemical_id',
            'chemical_used.*.volume' => 'required|numeric|min:0',
            'amount_of_water_used' => 'required|numeric|min:0',
            'calendar_year' => 'required|exists:calendar_years,calendar_year_id',
            'production_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isFuture()) {
                        $fail('The production date cannot be in the future.');
                    }
                },
            ],
            'production_status' => 'required|in:halted,ongoing,completed,failed',
            'product_produced' => 'required|array|min:1',
            'product_produced.*.product_id' => 'required|exists:products,product_id',
            'product_produced.*.quantity' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Get the balance of each material used
        foreach ($request->input('material_used') as $material) {
            $materialId = $material['material_id'];
            $quantityUsed = $material['quantity'];
            $companyMaterial = CompanyMaterial::where('companyMaterialId', $materialId)->first('materialID');
            // dd($companyMaterial->materialID);
            // get the balance of each material used
            $availableMaterialBalance = $this->getMaterialBalance($materialId);

            // dd($availableMaterialBalance);

            if ($availableMaterialBalance <= 0) {
            $validator->errors()->add('balance_error', 'No material stock is available. The balance is 0.');
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableMaterialBalance
            ], 400);
            } elseif ($quantityUsed > $availableMaterialBalance) {
            $validator->errors()->add('balance_error', "Insufficient stock for material: ".$companyMaterial->material->material);
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableMaterialBalance
            ], 400);
            }
        }

        // Get the balance of each chemical used
        foreach ($request->input('chemical_used', []) as $chemical) {
            $chemicalId = $chemical['chemical_id'];
            $volumeUsed = $chemical['volume'];
            $companyChemical = CompanyChemical::where('company_chemical_id' ,$chemical['chemical_id'])->first('chemical_id');
            // get the balance of each chemical used
            $availableChemicalBalance = $this->getChemicalBalance($chemicalId);

            if ($availableChemicalBalance <= 0) {
            $validator->errors()->add('balance_error', 'No chemical stock is available. The balance is 0.');
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableChemicalBalance
            ], 400);
            } elseif ($volumeUsed > $availableChemicalBalance) {
            $validator->errors()->add('balance_error', "Insufficient stock for chemical: ".$companyChemical->chemical->name);
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableChemicalBalance
            ], 400);
            }
        }

        if (!empty($request['production_date'])) {
            # code...
            // Extract the year using Carbon
            $year = Carbon::parse($request->input('dateInput'))->year;
        }

        try {
            // If both material and chemical balances are approved, proceed to checkout
            foreach ($request->input('material_used') as $material) {
            $companyMaterial = CompanyMaterial::where('companyMaterialId', $materialId)->first('materialID');
            $result = stock_movement::create([
                'companyMaterialId'  => $material['material_id'],
                'materialID'  => $companyMaterial->materialID,
                'companyID'  => $request['company_id'],
                'quantity'  => $material['quantity'],
                'movement_type' => 'out',
                'calendar_year' => $year,
                'movement_date' => $request['production_date'],
                'remark' => "Material checked out for production log on {$request['production_date']} with title {$request['production_title']}",
            ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to process material checkout', 'error' => $e->getMessage()], 500);
        }

        try {
            foreach ($request->input('chemical_used', []) as $chemical) {
            $companyChemical = CompanyChemical::where('company_chemical_id', $chemical['chemical_id'])->first('chemical_id');
            $result = ChemicalStockMovement::create([
                'company_chemical_id'  => $chemical['chemical_id'],
                'chemical_id'  => $companyChemical->chemical_id,
                'company_id'  => $request['company_id'],
                'quantity'  => $chemical['volume'],
                'movement_type' => 'out',
                'calendar_year' => $year,
                'movement_date' => $request['production_date'],
                'remark' => "Chemical checked out for production log on {$request['production_date']} with title {$request['production_title']}",
            ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to process chemical checkout', 'error' => $e->getMessage()], 500);
        }

        try {
            $productionLog = ProductionLog::create([
                'production_title' => $request->input('production_title'),
                'company_operation_id' => $request->input('operation_name'),
                'company_id' => $request->input('company_id'),
                'material_log_data' => $request->has('material_used') ? json_encode($request->input('material_used')) : null,
                'chemical_log_data' => $request->has('chemical_used') ? json_encode($request->input('chemical_used')) : null,
                'water_volume' => $request->input('amount_of_water_used'),
                'product_log_data' => json_encode($request->input('product_produced')),
                'calendar_year_id' => $request->input('calendar_year'),
                'production_date' => $request->input('production_date'),
                'production_status' => $request->input('production_status'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create production log',
                'error' => $e->getMessage()
            ], 500);
        }
        
        try {
            $production_logs = ProductionLog::with(['company', 'operation', 'products', 'materials', 'chemicals'])
                ->find($productionLog->id); // <-- use $productionLog here
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch production log data',
                'error' => $e->getMessage()
            ], 500);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Production log created successfully',
            'production_logs' => $production_logs
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionLog  $productionLog
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionLog $productionLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionLog  $productionLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionLog $productionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionLog  $productionLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionLog $productionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionLog  $productionLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionLog $productionLog)
    {
        //
    }
}
