<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaterial;
use App\Models\MaterialPrice;
use App\Models\Company;
use App\Models\category;
use App\Models\Material;
use App\Models\stock_movement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\StockMovementController;

class CompanyMaterialController extends StockMovementController
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

    public function getCompanyMaterials($companyId)
    {
        try {
            // Fetch company materials with relationships
            $companyMaterials = CompanyMaterial::with(['material', 'company'])
                ->active()
                ->byCompany($companyId)
                ->get()
                ->map(function ($mat) {
                    // Get all movement totals for this material
                    $totalCheckIn = $this->getMaterialTotalCheckIn($mat->companyMaterialId);
                    $totalCheckOut = $this->getMaterialTotalCheckOut($mat->companyMaterialId);
                    $totalTransfer = $this->getMaterialTotalTransfer($mat->companyMaterialId);
                    $totalAdjustment = $this->getMaterialTotalAdjustment($mat->companyMaterialId);
                    
                    // Calculate available quantity after each movement type
                    $availableAfterCheckIn = $totalCheckIn; // Available after check-ins
                    $availableAfterCheckOut = $availableAfterCheckIn - $totalCheckOut; // Available after check-outs
                    $availableAfterTransfer = $availableAfterCheckOut - $totalTransfer; // Available after transfers
                    $availableAfterAdjustment = $availableAfterTransfer + $totalAdjustment; // Final available after adjustments
                    
                    return [
                        'company_material_id' => $mat->companyMaterialId,
                        'material_id' => $mat->materialID,
                        'name' => optional($mat->material)->material ?? 'N/A',
                        'quantity' => $mat->quantity_per_unit ?? $mat->threshold_quantity ?? 0, // Show initial quantity like chemicals
                        
                        // Movement totals
                        'total_check_in' => $totalCheckIn,
                        'total_check_out' => $totalCheckOut,
                        'total_transfer' => $totalTransfer,
                        'total_adjustment' => $totalAdjustment,
                        
                        // Available quantity after each movement type
                        'available_after_checkin' => max(0, $availableAfterCheckIn),
                        'available_after_checkout' => max(0, $availableAfterCheckOut),
                        'available_after_transfer' => max(0, $availableAfterTransfer),
                        'available_after_adjustment' => max(0, $availableAfterAdjustment),
                        
                        // Movement breakdown with impact
                        'movement_breakdown' => [
                            'in' => [
                                'total' => $totalCheckIn,
                                'available_after' => max(0, $availableAfterCheckIn)
                            ],
                            'out' => [
                                'total' => $totalCheckOut,
                                'available_after' => max(0, $availableAfterCheckOut)
                            ],
                            'transfer' => [
                                'total' => $totalTransfer,
                                'available_after' => max(0, $availableAfterTransfer)
                            ],
                            'adjustment' => [
                                'total' => $totalAdjustment,
                                'available_after' => max(0, $availableAfterAdjustment)
                            ]
                        ],
                        
                        'original_quantity' => $mat->quantity_per_unit ?? $mat->threshold_quantity ?? 0,
                        'unit' => $mat->unit ?? $mat->unit_of_measure ?? '-',
                        'reorder_level' => $mat->minimum_threshold ?? $mat->threshold_quantity ?? '-',
                        'safety_level' => $mat->maximum_threshold ?? '-',
                        'hazardous' => ($mat->hazardous ?? false) ? 
                            '<span class="badge bg-danger">Yes</span>' : 
                            '<span class="badge bg-success">No</span>',
                        'storage_location' => $mat->storage_location ?? '-',
                        'updated_at' => $mat->updated_at 
                            ? Carbon::parse($mat->updated_at)->diffForHumans() 
                            : '-',
                    ];
                });

            return response()->json([
                'status' => 'success',
                'company_materials' => $companyMaterials,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch company materials.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store_company_material(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'material' => ['required', 'integer', Rule::unique('company_materials', 'materialID')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company_id']);
            })],
            'quantity_per_unit' => 'required|string',
            'unit_of_measurement' => ['required', 'string', 'regex:/^[A-Za-z\/²³°%\s]+$/'],
            'hazardous' => 'nullable|boolean',
            'storage_location' => 'nullable|string',
            'reorder_level' => 'nullable',
            'safety_stock' => 'nullable',
        ], [
            'material.unique' => "Material has already been added.",
            'unit_of_measurement.regex' => "Unit should contain only letters and symbols (e.g., kg, m², L/min, °C). Numbers are not allowed."
        ]);

        // Return validation errors if any
        if ($validatedData->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validatedData->errors(),
            ], 422);
        }

        $companyMaterial = new CompanyMaterial();
        $companyMaterial->companyID = $request['company_id'];
        $companyMaterial->materialID = $request['material'];
        
        // Use new fields if they exist, otherwise use old fields
        if (Schema::hasColumn('company_materials', 'quantity_per_unit')) {
            $companyMaterial->quantity_per_unit = $request['quantity_per_unit'];
            $companyMaterial->unit = $request['unit_of_measurement'];
            $companyMaterial->minimum_threshold = $request['reorder_level'];
            $companyMaterial->maximum_threshold = $request['safety_stock'];
            $companyMaterial->storage_location = $request['storage_location'];
            $companyMaterial->hazardous = $request['hazardous'] ?? false;
        } else {
            // Fallback to old fields
            $companyMaterial->threshold_quantity = $request['quantity_per_unit'];
            $companyMaterial->unit_of_measure = $request['unit_of_measurement'];
            $companyMaterial->serial_number = $request['serial_number'] ?? null;
        }
        
        $companyMaterial->status = "active";
        $companyMaterial->save();

        $company_materials = CompanyMaterial::join('materials', 'materials.materialID', '=', 'company_materials.materialID')
            ->where('company_materials.status', 'active')
            ->get(['company_materials.materialID as id', 'material', 'unit', 'company_materials.status as material_status', 'companyMaterialId']);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Material recorded successfully.',
            'data'    => $company_materials
        ]);
    }

    public function check_in_material(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'material_id' => 'required|integer',
        ]);

        // Return validation errors if any
        if ($validatedData->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validatedData->errors(),
            ], 422);
        }

        $companyMaterial = CompanyMaterial::where('companyID', $request['company_id'])
            ->where('materialID', $request['material_id'])
            ->first();

        if (!$companyMaterial) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Material not found for the specified company.',
            ], 404);
        }

        $companyMaterial->status = "active";
        $companyMaterial->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Material checked in successfully.',
            'data'    => $companyMaterial
        ]);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'companyID'         =>  ['required', 'numeric'],
            'material'          =>  ['required', 'numeric', Rule::unique('company_materials', 'materialID')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['companyID']);
            })],
            'serial_number'   =>  ['nullable', 'string'],
            'unit_of_measurement' => ['nullable', 'string', 'regex:/^[A-Za-z\/²³°%\s]+$/'],
            'threshold' => ['nullable', 'string']
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = CompanyMaterial::create([
            'companyID'         => $request['companyID'],
            'materialID'        => $request['material'],
            'serial_number'     => $request['serial_number'],
            'unit_of_measure'   => $request['unit_of_measurement'],
            'threshold_quantity'         => $request['threshold'],
        ]);

    
        if ($result) {
            # code...
            $companyMaterial  = CompanyMaterial::where('companyID', $request['companyID'])
            ->join('materials', 'materials.materialID', '=', 'company_materials.materialID')
            ->where('company_materials.status', 'active')
            ->select('*', 'materials.materialID as material_id', 'company_materials.materialID as materialID', 'company_materials.status as company_material_status', 'materials.status as material_status')
            ->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Material added successfully.',
                'company_material' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    public function store_price(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'companyMaterialID' =>  ['required', 'numeric'],
            'unit' =>  ['required', 'numeric'],
            'price' =>  ['required', 'numeric'],
            'date' =>  ['nullable', 'date'],
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = MaterialPrice::create([
            'companyMaterialID'  => $request['companyMaterialID'],
            'units'  => $request['unit'],
            'price'  => $request['price'],
            'date'   => $request['date'],
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Material price added successfully.',
                // 'company_material_price' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material price failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    
    public function show($material)
    {
        $stockMovementController = new StockMovementController();
        $data['availableMaterialBalance'] = $stockMovementController->getMaterialBalance($material);
        $data['availableMaterialInflowBalance'] = $stockMovementController->getMaterialTotalCheckIn($material);
        $data['availableMaterialOutflowBalance'] = $stockMovementController->getMaterialTotalCheckOut($material);
        $data['availableMaterialAdjustmentBalance'] = $stockMovementController->getMaterialTotalAdjustment($material);
        $data['CompanyMaterial'] = CompanyMaterial::where('companyMaterialId', $material)->first();
        $data['transactions'] = CompanyMaterial::where('companyMaterialId', $material)->get();
        return view('components.materials.view-material', $data);
    }
    public function getMaterialTotalCheckIn($companyMaterialId)
    {
        $totalCheckIn = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('movement_type', 'in')
            ->where('status', 'active')
            ->sum('quantity');
        return $totalCheckIn ?: 0;
    }

    public function getMaterialTotalTransfer($companyMaterialId)
    {
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('movement_type', 'transfer')
            ->where('status', 'active')
            ->sum('quantity');
        return $totalTransfer ?: 0;
    }

    public function getMaterialTotalAdjustment($companyMaterialId)
    {
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('movement_type', 'adjustment')
            ->where('status', 'active')
            ->sum('quantity');
        return $totalAdjustment ?: 0;
    }

    public function getMaterialTotalCheckOut($companyMaterialId)
    {
        $totalCheckOut = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('movement_type', 'out')
            ->where('status', 'active')
            ->sum('quantity');
        return $totalCheckOut ?: 0;
    }

    public function getMaterialBalance($companyMaterialId) 
    {
        $balance = $this->getMaterialTotalCheckIn($companyMaterialId) - $this->getMaterialTotalTransfer($companyMaterialId) + $this->getMaterialTotalAdjustment($companyMaterialId) - $this->getMaterialTotalCheckOut($companyMaterialId);
        return $balance; 
    }
       
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyMaterial $companyMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyMaterial $companyMaterial)
    {
        //
    }

    public function delete_company_material($material)
    {
        try {
            $companyMaterial = CompanyMaterial::where('companyMaterialId', $material)->first();
            
            if (!$companyMaterial) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Material not found.',
                ], 404);
            }

            $companyMaterial->status = 'inactive';
            $companyMaterial->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Material deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete material.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function save_check_in(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'company_material_id' => 'required|integer',
            'quantity' => 'required|numeric|min:0.01',
            'batch_no' => 'nullable|string',
            'source' => 'nullable|string',
            'date' => 'required|date',
            'remarks' => 'nullable|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        try {
            $stockMovement = new stock_movement();
            $stockMovement->companyMaterialId = $request['company_material_id'];
            $stockMovement->materialID = $request['material_id'];
            $stockMovement->movement_type = 'in';
            $stockMovement->quantity = $request['quantity'];
            $stockMovement->batch_number = $request['batch_no'];  // Fixed: batch_number not batch_no
            $stockMovement->source = $request['source'];
            $stockMovement->movement_date = $request['date'];
            $stockMovement->remark = $request['remarks'];  // Fixed: remark not remarks
            $stockMovement->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Material check-in recorded successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to record check-in.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function save_check_out(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'checkOut_material_id' => 'required|integer',
            'material_id' => 'required|integer',
            'quantity' => 'required|numeric|min:0.01',
            'batch_no' => 'nullable|string',
            'usage_reason' => 'required|string',
            'date' => 'required|date',
            'remark' => 'nullable|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        try {
            $stockMovement = new stock_movement();
            $stockMovement->companyMaterialId = $request['checkOut_material_id'];  // Fixed: match form field name
            $stockMovement->materialID = $request['material_id'];  // Added missing materialID
            $stockMovement->movement_type = 'out';
            $stockMovement->quantity = $request['quantity'];
            $stockMovement->batch_number = $request['batch_no'];  // Fixed: batch_number not batch_no
            $stockMovement->usage_reason = $request['usage_reason'];
            $stockMovement->movement_date = $request['date'];  // Fixed: match form field name
            $stockMovement->remark = $request['remark'];  // Fixed: match form field name
            $stockMovement->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Material check-out recorded successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to record check-out.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyMaterial $companyMaterial)
    {
        //
    }
}
