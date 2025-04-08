<?php

namespace App\Http\Controllers;
use App\Models\AnnualOperationsLog;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class AnnualOperationsLogController extends Controller
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
        $validator = Validator::make($request->all(), [
            'operation_name' => 'required|string|max:255',
            'operation' => 'required|integer',
            'calendar_year' => 'required|integer',
            'material' => 'required|array',
            'material.*' => 'required|integer',
            'expected_quantity'=> 'required|array',
            'expected_quantity.*' => 'required|numeric',
            'chemical' => 'required|array',
            'chemical.*' => 'required|integer',
            'expected_quantity_chemical' => 'required|array',
            'expected_quantity_chemical.*' => 'required|numeric',
            'operations_per_year' => 'required|numeric',
            'water_used_per_year' => 'required|numeric',
            'units_produced_per_year' => 'required|numeric',
            'expected_waste'=> 'required|array',
            'expected_waste.*' => 'required|string',
            'quantity_of_waste' => 'required|array',
            'quantity_of_waste.*'=> 'required|numeric',
            'expected_product' => 'required|array',
            'expected_product.*' => 'required|numeric',
            'expected_quantity' => 'required|array',
            'expected_quantity.*' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $operationsLog = AnnualOperationsLog::create([
            'operation_name' => $request->operation_name,
            'operation_id' => $request->operation,
            'calendar_year_id' => $request->calendar_year,
            'companyMaterialId' => $request->material,
            'company_waste_id' => $request->expected_waste,
            'company_chemical_id' => $request->chemical,
            'product_id' => $request->expected_product,
            'company_id' => $request->company_id,
            'expected_quantity' => $request->expected_quantity,
            'expected_quantity_chemical' => $request->expected_quantity_chemical,
            'operations_per_year' => $request->operations_per_year,
            'water_used_per_year' => $request->water_used_per_year,
            'units_produced_per_year' => $request->units_produced_per_year,
            'quantity_of_waste' => $request->quantity_of_waste,
            'status' => 'active'
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create Annual Operations Log.',
            'error' => $e->getMessage(),
            ], 500);
        }
        try {
            $annual_operations_logs = AnnualOperationsLog::where('status', 'active')
            ->with(['operation', 'calendarYear'])
            ->where('company_id', $request->company_id)
            ->where('status', 'active')
            ->get();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve Annual Operations Logs.',
            'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
           
            'status'=> 'success',
            'message' => 'Annual Operations Log created successfully.',
            'annual_operations_logs' => $annual_operations_logs,
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
