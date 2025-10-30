<?php

namespace App\Http\Controllers\HRMS;
use App\Http\Controllers\Controller;

use App\Models\HRMS\CompanyDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\HRMS\CompanyEmployees;
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
     * Get all departments for a given company.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * Retrieve all departments for a given company, including their managers.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentsByCompany($companyId)
    {
        try {
            $departments = CompanyDepartment::where('CompanyID', $companyId)->get();

            $departments = $departments->map(function ($department) {
            $managerIDs = $department->ManagerIDs 
                ? (is_array($department->ManagerIDs) ? $department->ManagerIDs : json_decode($department->ManagerIDs, true)) 
                : [];

            $managers = !empty($managerIDs)
                ? CompanyEmployees::whereIn('EmployeeID', $managerIDs)
                ->get(['EmployeeID', 'FirstName', 'LastName', 'Email', 'JobTitle', 'ProfilePicture'])
                ->map(function ($manager) {
                    return [
                    'id' => $manager->EmployeeID,
                    'name' => trim($manager->FirstName . ' ' . $manager->LastName),
                    'email' => $manager->Email,
                    'jobTitle' => $manager->JobTitle,
                    'profilePic' => $manager->ProfilePicture
                        ? asset('storage/' . $manager->ProfilePicture)
                        : asset('adminAssets/images/users/avatar-2.jpg'),
                    ];
                })
                : collect();

            return [
                'DepartmentID' => $department->DepartmentID,
                'DepartmentName' => $department->DepartmentName,
                'managers' => $managers,
                'status' => $department->Status,
            ];
            });

            return response()->json([
            'status' => 'success',
            'departments' => $departments
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => __('An error occurred while fetching departments.'),
            'error' => $e->getMessage()
            ], 500);
        }
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
        // dd($request->all());
        // Validate the request data
        try {
            $validator = Validator::make($request->all(), [
                'department_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('company_departments', 'DepartmentName')
                        ->where(fn($query) => $query->where('CompanyID', $request->input('company_id'))),
                ],
                'manager_ids' => [
                    'nullable',
                    'array',
                ],
                'manager_ids.*' => [
                    'exists:company_employees,EmployeeID',
                ],
                'company_id' => 'required|exists:companies,company_id',
            ], [
                'department_name.required' => __('Department name is required.'),
                'department_name.unique' => __('The department name must be unique for the selected company.'),
                'manager_ids.*.exists' => __('One or more selected managers do not exist.'),
                'company_id.required' => __('Company ID is required.'),
                'company_id.exists' => __('The selected company does not exist.'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validated = $validator->validated();

            $department = CompanyDepartment::create([
                'DepartmentName' => $validated['department_name'],
                'CompanyID' => $validated['company_id'],
                'ManagerIDs' => isset($validated['manager_ids']) ? json_encode($validated['manager_ids']) : null,
            ]);

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
    public function show($id)
    {
        try {
            $department = CompanyDepartment::findOrFail($id);
            
            // Get managers data
            $managerIDs = $department->ManagerIDs 
                ? (is_array($department->ManagerIDs) ? $department->ManagerIDs : json_decode($department->ManagerIDs, true)) 
                : [];

            $managers = !empty($managerIDs)
                ? CompanyEmployees::whereIn('EmployeeID', $managerIDs)
                ->get(['EmployeeID', 'FirstName', 'LastName', 'Email', 'JobTitle', 'ProfilePicture'])
                ->map(function ($manager) {
                    return [
                        'id' => $manager->EmployeeID,
                        'name' => trim($manager->FirstName . ' ' . $manager->LastName),
                        'full_name' => trim($manager->FirstName . ' ' . $manager->LastName),
                        'email' => $manager->Email,
                        'jobTitle' => $manager->JobTitle,
                        'profilePic' => $manager->ProfilePicture
                            ? asset('storage/' . $manager->ProfilePicture)
                            : asset('adminAssets/images/users/avatar-2.jpg'),
                        // Additional fields that might be needed by the frontend
                        'EmployeeID' => $manager->EmployeeID,
                        'FirstName' => $manager->FirstName,
                        'LastName' => $manager->LastName,
                    ];
                })
                : collect();

            return response()->json([
                'status' => 'success',
                'department' => [
                    'DepartmentID' => $department->DepartmentID,
                    'DepartmentName' => $department->DepartmentName,
                    'CompanyID' => $department->CompanyID,
                    'managers' => $managers->toArray(), // Convert to array
                    'manager_ids' => $managerIDs, // Also return the raw IDs
                    'status' => $department->Status,
                ],
                'debug' => [
                    'raw_manager_ids' => $department->ManagerIDs,
                    'parsed_manager_ids' => $managerIDs,
                    'managers_count' => $managers->count(),
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('Department not found.'),
                'error' => $e->getMessage()
            ], 404);
        }
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
    public function update(Request $request, $id)
    {
        try {
            // Find the department
            $companyDepartment = CompanyDepartment::findOrFail($id);
            
            // Use Validator for validation
            $validator = Validator::make($request->all(), [
                'department_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('company_departments', 'DepartmentName')
                        ->ignore($companyDepartment->DepartmentID, 'DepartmentID')
                        ->where(fn($query) => $query->where('CompanyID', $request->input('company_id'))),
                ],
                'manager_ids' => [
                    'nullable',
                    'array',
                ],
                'manager_ids.*' => [
                    'exists:company_employees,EmployeeID',
                ],
                'company_id' => 'required|exists:companies,company_id',
            ], [
                'department_name.required' => __('Department name is required.'),
                'department_name.unique' => __('The department name must be unique for the selected company.'),
                'manager_ids.*.exists' => __('One or more selected managers do not exist.'),
                'company_id.required' => __('Company ID is required.'),
                'company_id.exists' => __('The selected company does not exist.'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Update the department
            $validated = $validator->validated();
            $companyDepartment->DepartmentName = $validated['department_name'];
            $companyDepartment->ManagerIDs = isset($validated['manager_ids']) ? json_encode($validated['manager_ids']) : null;
            $companyDepartment->CompanyID = $validated['company_id'];
            $companyDepartment->save();

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
    public function destroy($id)
{
    try {
        $department = CompanyDepartment::findOrFail($id);

        $department->delete();

        return response()->json([
            'status' => 'success',
            'message' => __('Department deleted successfully.')
        ], 200);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'status' => 'error',
            'message' => __('Department not found.')
        ], 404);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => __('An error occurred while deleting the department.'),
            'error' => $e->getMessage()
        ], 500);
    }
}
}