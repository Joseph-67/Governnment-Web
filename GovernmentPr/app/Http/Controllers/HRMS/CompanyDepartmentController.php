<?php

namespace App\Http\Controllers\HRMS;
use App\Http\Controllers\Controller;

use App\Models\CompanyDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\CompanyEmployee;
use App\Models\Company;
/**
 * CompanyDepartmentController handles the management of company departments.
 */

class CompanyDepartmentController extends Controller
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
        try {
            // Use Validator for validation
            $validator = Validator::make($request->all(), [
                'department_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('company_departments')->where(function ($query) use ($request) {
                        return $query->where('company_id', $request->input('company_id'));
                    }),
                ],
                'manager_id' => 'nullable|exists:company_employees,EmployeeID',
                'company_id' => 'required|exists:companies,CompanyID',
                // Add other fields and validation rules as needed
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Store the new department
            $validated = $validator->validated();

            $department = new CompanyDepartment();
            $department->DepartmentName = $validated['department_name'];
            $department->ManagerID = $validated['manager_id'] ?? null;
            $department->CompanyID = $validated['company_id'];
            // Set other fields if needed
            $department->save();

            // Return a JSON response
            return response()->json([
                'status' => 'success',
                'message' => __('Department created successfully.'),
                'data' => $department
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('An error occurred while creating the department.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDepartment  $companyDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDepartment $companyDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDepartment  $companyDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDepartment $companyDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDepartment  $companyDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyDepartment $companyDepartment)
    {
        //
        try {
            // Use Validator for validation
            $validator = Validator::make($request->all(), [
                'department_id' => 'required|exists:company_departments,DepartmentID',
                'department_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('company_departments')->ignore($companyDepartment->DepartmentID)->where(function ($query) use ($request) {
                        return $query->where('company_id', $request->input('company_id'));
                    }),
                ],
                'manager_id' => 'nullable|exists:company_employees,EmployeeID',
                'company_id' => 'required|exists:companies,CompanyID',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            // Update the department
            $validated = $validator->validated();
            $companyDepartment = CompanyDepartment::find($companyDepartment->department_id);
            $companyDepartment->DepartmentName = $validated['department_name'];
            $companyDepartment->ManagerID = $validated['manager_id'] ?? null;
            $companyDepartment->CompanyID = $validated['company_id'];
            // Set other fields if needed
            $companyDepartment->save();
            // Return a JSON response
            return response()->json([
                'status' => 'success',
                'message' => __('Department updated successfully.'),
                'data' => $companyDepartment
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('An error occurred while updating the department.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDepartment  $companyDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDepartment $companyDepartment)
    {
        //
    }
}
