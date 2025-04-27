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
            $operations = CompanyOperation::where('is_deleted', false)
                ->where('company_id', $value)
                ->with(['operationCategory', 'operationType', 'company', 'calendarYear'])
                ->select([
                    'company_operation_id',
                    'operation_name',
                    'description',
                    'operation_code',
                    'operation_type_id',
                    'operation_category_id',
                    'labour_cost',
                    'overhead_cost',
                    'maintenance_cost',
                    'depreciation_cost',
                    'administration_cost',
                    'variable_cost',
                    'fixed_cost',
                    'total_operation_cost',
                    'operation_unit_cost',
                    'operation_unit_time',
                    'company_id',
                    'operation_status',
                    'expected_water_usage_per_operation',
                    'expected_materials_used',
                    'expected_chemicals_used',
                    'expected_products_produced',
                    'expected_waste_generated',
                    'calendar_year_id',
                    'start_date',
                    'end_date',
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

            'labour_cost' => ['nullable', 'numeric'],
            'overhead_cost' => ['nullable', 'numeric'],
            'maintenance_cost' => ['nullable', 'numeric'],
            'depreciation_cost' => ['nullable', 'numeric'],
            'administration_cost' => ['nullable', 'numeric'],
            'variable_cost' => ['nullable', 'numeric'],
            'fixed_cost' => ['nullable', 'numeric'],
            'total_operation_cost' => ['nullable', 'numeric'],
            'operation_unit_cost' => ['nullable', 'numeric'],
            'operation_unit_time' => ['nullable', 'string'],

            'material_used' => ['nullable', 'array'],
            'material_used.*.material_id' => ['nullable', 'numeric'],
            'material_used.*.quantity' => ['nullable', 'numeric'],
            'material_used.*.unit_quantity' => ['nullable', 'string'],
            'material_used.*.unit_cost' => ['nullable', 'numeric'],
            'chemical_used' => ['nullable', 'array'],
            'chemical_used.*.chemical_id' => ['nullable', 'numeric'],
            'chemical_used.*.quantity' => ['nullable', 'numeric'],
            'chemical_used.*.unit_quantity' => ['nullable', 'string'],
            'chemical_used.*.unit_cost' => ['nullable', 'numeric'],

            'product_produced' => ['required', 'array'],
            'product_produced.*.product_id' => ['required', 'numeric'],
            'product_produced.*.quantity' => ['required', 'numeric'],
            'waste_generated' => ['nullable', 'array'],
            'waste_generated.*.waste_id' => ['nullable', 'numeric'],
            'waste_generated.*.quantity' => ['nullable', 'numeric'],

            'company_id' => ['required', 'numeric'],
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
                'labour_cost' => $request->input('labour_cost'),
                'overhead_cost' => $request->input('overhead_cost'),
                'maintenance_cost' => $request->input('maintenance_cost'),
                'depreciation_cost' => $request->input('depreciation_cost'),
                'administration_cost' => $request->input('administration_cost'),
                'variable_cost' => $request->input('variable_cost'),
                'fixed_cost' => $request->input('fixed_cost'),
                'total_operation_cost' => $request->input('total_operation_cost'),
                'operation_unit_cost' => $request->input('operation_unit_cost'),
                'operation_unit_time' => $request->input('operation_unit_time'),
                'company_id' => $request->input('company_id'),
                'operation_status' => $request->input('operation_status'),
                'expected_water_usage_per_operation' => $request->input('expected_water_usage_per_operation'),
                'expected_materials_used' => json_encode($request->input('material_used')),
                'expected_chemicals_used' => json_encode($request->input('chemical_used')),
                'expected_products_produced' => json_encode($request->input('product_produced')),
                'expected_waste_generated' => json_encode($request->input('waste_generated')),
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
