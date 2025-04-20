<?php

namespace App\Http\Controllers;

use App\Models\CompanyOperation;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyOperationController extends Controller
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

    public function get_all_operations($value)
    {
        try {
            $operations = CompanyOperation::where('is_delete', false)
                ->where('company_id', $value)
                ->with(['operationCategory', 'operationType', 'company', 'calendarYear'])
                ->select([
                    'company_operation_id',
                    'operation_name',
                    'description',
                    'operation_code',
                    'operation_type_id',
                    'operation_category_id',
                    'operation_unit',
                    'operation_unit_price',
                    'operation_unit_cost',
                    'operation_unit_time',
                    'status',
                    'expected_waste_per_operation',
                    'expected_water_usage_per_operation',
                    'expected_products',
                    'calendar_year_id',
                    'start_date',
                    'end_date',
                    'created_at',
                    'updated_at'
                ])
                ->get();
            return response()->json(['status' => 'success', 'operations' => $operations], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch operations', 'error' => $e->getMessage()], 500);
        }
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
            'operation_name' => [
            'required', 
            'string', 
            'max:255', 
            Rule::unique('company_operations')->where(function ($query) use ($request) {
                return $query->where('company_id', $request->input('company_id'));
            })
            ],
            'description' => ['nullable', 'string'],
            'operation_code' => ['nullable', 'string', 'max:255'],
            'operation_type' => ['required', 'numeric'],
            'operation_category' => ['required', 'numeric'],
            'operation_unit' => ['required', 'string', 'max:255'],
            'operation_unit_price' => ['nullable', 'numeric'],
            'operation_unit_cost' => ['nullable', 'numeric'],
            'operation_unit_time' => ['nullable', 'numeric'],
            'expected_products' => ['nullable', 'array'],
            'expected_products.*' => ['nullable', 'string'],
            'expected_quantity_produced_for_goods' => ['nullable', 'array'],
            'expected_quantity_produced_for_goods.*' => ['nullable', 'numeric'],
            'company_id' => ['required', 'numeric'],
            'expected_waste_per_operation' => ['required', 'numeric'],
            'expected_water_usage_per_operation' => ['required', 'numeric'],
            'calendar_year' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $companyOperation = CompanyOperation::create([
            'operation_name' => $request->input('operation_name'),
            'description' => $request->input('description'),
            'operation_code' => $request->input('operation_code'),
            'operation_type_id' => $request->input('operation_type'),
            'operation_category_id' => $request->input('operation_category'),
            'operation_unit' => $request->input('operation_unit'),
            'operation_unit_price' => $request->input('operation_unit_price'),
            'operation_unit_cost' => $request->input('operation_unit_cost'),
            'operation_unit_time' => $request->input('operation_unit_time'),
            
                'expected_products' => json_encode([
                    'products' => $request->input('expected_products'),
                    'quantities' => $request->input('expected_quantity_produced_for_goods'),
                ]),
        
            'company_id' => $request->input('company_id'),
            'expected_waste_per_operation' => $request->input('expected_waste_per_operation'),
            'expected_water_usage_per_operation' => $request->input('expected_water_usage_per_operation'),
            'calendar_year_id' => $request->input('calendar_year'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Company Operation', 'message' => $e->getMessage()], 500);
        }
        $companyOperations = CompanyOperation::get();
        return response()->json(['status' => 'success', 'message' => 'Company Operation created successfully', 'operation_logs' => $companyOperations], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyOperation  $companyOperation
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyOperation $companyOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyOperation  $companyOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyOperation $companyOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyOperation  $companyOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyOperation $companyOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyOperation  $companyOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyOperation $companyOperation)
    {
        //
    }
}
