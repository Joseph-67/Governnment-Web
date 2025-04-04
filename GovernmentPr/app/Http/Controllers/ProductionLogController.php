<?php

namespace App\Http\Controllers;

use App\Models\ProductionLog;
use App\Models\stock_movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Http\Controllers\StockMovementController;

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
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,company_id',
            'production_title' => 'required|string|max:255',
            'operation_name' => 'required|exists:company_operations,company_operation_id',
            'materials_used' => 'required|array|min:1',
            'materials_used.*.material_id' => 'required|exists:company_materials,companyMaterialId',
            'materials_used.*.quantity' => 'required|numeric|min:0',
            'chemical_used' => 'nullable|array',
            'chemical_used.*.chemical_id' => 'required|exists:company_chemicals,company_chemical_id',
            'chemical_used.*.volume' => 'required|numeric|min:0',
            'amount_of_water_used' => 'required|numeric|min:0',
            'calendar_year' => 'required|exists:calendar_years,calendar_year_id',
            'production_date' => 'required|date',
            'production_status' => 'required|in:halted,ongoing,completed,failed',
            'product_produced' => 'required|array|min:1',
            'product_produced.*.product_id' => 'required|exists:products,product_id',
            'product_produced.*.quantity' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $productionLog = ProductionLog::create([
                'production_title' => $request->input('production_title'),
                'company_operation_id' => $request->input('operation_name'),
                'company_id' => $request->input('company_id'),
                'material_log_data' => json_encode($request->input('materials_used')),
                'chemical_log_data' => $request->has('chemical_used') ? json_encode($request->input('chemical_used')) : null,
                'water_volume' => $request->input('amount_of_water_used'),
                'product_log_data' => json_encode($request->input('product_produced')),
                'calendar_year_id' => $request->input('calendar_year'),
                'production_date' => $request->input('production_date'),
                'production_status' => $request->input('production_status'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create production log', 'message' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Production log created successfully', 'data' => $productionLog], 201);

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
