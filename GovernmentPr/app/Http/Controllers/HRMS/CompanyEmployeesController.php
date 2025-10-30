<?php

namespace App\Http\Controllers\HRMS;
use App\Http\Controllers\Controller;

use App\Models\HRMS\CompanyEmployees;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyId)
    {
        try {
            // Fetch employees belonging to this company
            $employees = CompanyEmployees::with(['department'])
                ->where('CompanyID', $companyId)
                ->where('is_delete', 0)
                ->orderBy('created_at', 'desc')
                ->get();

            // Always return JSON
            return response()->json([
                'status' => 'success',
                'employees' => $employees
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }


    /**
     * Search for company employees based on query parameters.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = CompanyEmployees::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $company_id = $request->input('company_id');
            $query->where('CompanyID', $company_id);
            $query->where(function ($q) use ($search) {
                foreach (['FirstName', 'LastName', 'email', 'JobTitle'] as $field) {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            });
        }

        $employees = $query->get();

        $users = $employees->map(function ($employee) {
        $defaultProfilePic = ['avatar-2.jpg', 'avatar-3.jpg', 'avatar-4.jpg'];
            return [
                'id' => (string) $employee->EmployeeID,
                'name' => trim($employee->FirstName . ' ' . $employee->LastName),
                'role' => $employee->JobTitle,
                'profilePic' => $employee->ProfilePicture ? asset('storage/' . $employee->ProfilePicture) : asset('adminAssets/images/users/' . $defaultProfilePic[array_rand($defaultProfilePic)]),
                'email' => $employee->Email,
            ];
        });

        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
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
    public function store(Request $request, $company)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'company_id' => [
                    'required',
                    'integer',
                    'exists:companies,company_id',
                ],
                'employee_number' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('company_employees', 'EmployeeNumber')
                        ->where(fn($query) => $query->where('CompanyID', $request->input('company_id'))),
                ],
                'employee_email' => [
                    'required',
                    'email',
                    Rule::unique('company_employees', 'Email')
                        ->where(fn($query) => $query->where('CompanyID', $request->input('company_id'))),
                ],
                'employee_first_name' => 'required|string|max:255',
                'employee_last_name' => 'required|string|max:255',
                'employee_phone' => 'required|string|max:20',
                'employee_dob' => 'required|date',
                'employee_gender' => 'required|in:Male,Female,Other',
                'employee_job_title' => 'required|string|max:255',
                'employee_department' => 'required|integer|exists:company_departments,DepartmentID',
                'manager' => 'nullable|array',
                'manager.*' => 'exists:company_employees,EmployeeID',
                'employee_hire_date' => 'required|date',
                'employee_status' => 'required|in:Active,Inactive,On Leave,Terminated',
                'employee_address' => 'nullable|string|max:255',
                'employee_city' => 'nullable|string|max:100',
                'employee_state' => 'nullable|string|max:100',
                'employee_zip' => 'nullable|string|max:20',
                'employee_country' => 'nullable|string|max:100',
                'employee_emergency_contact' => 'nullable|string|max:255',
                'employee_emergency_phone' => 'nullable|string|max:20',
                'employee_profile_picture' => 'nullable|image|max:2048',
            ], [
                'company_id.required' => __('Company ID is required.'),
                'company_id.exists' => __('The selected company does not exist.'),
                'employee_number.required' => __('Employee number is required.'),
                'employee_number.unique' => __('The employee number must be unique within the company.'),
                'employee_email.required' => __('Email address is required.'),
                'employee_email.unique' => __('The email has already been taken within this company.'),
                'manager.*.exists' => __('One or more selected managers do not exist.'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validated = $validator->validated();

            $data = [
                'CompanyID' => $validated['company_id'],
                'EmployeeNumber' => $validated['employee_number'],
                'FirstName' => $validated['employee_first_name'],
                'LastName' => $validated['employee_last_name'],
                'Email' => $validated['employee_email'],
                'PhoneNumber' => $validated['employee_phone'],
                'DateOfBirth' => $validated['employee_dob'],
                'Gender' => $validated['employee_gender'],
                'JobTitle' => $validated['employee_job_title'],
                'DepartmentID' => $validated['employee_department'],
                'ManagerIDs' => isset($validated['manager']) ? json_encode($validated['manager']) : null,
                'HireDate' => $validated['employee_hire_date'],
                'Status' => $validated['employee_status'],
                'Address' => $validated['employee_address'] ?? null,
                'City' => $validated['employee_city'] ?? null,
                'State' => $validated['employee_state'] ?? null,
                'ZipCode' => $validated['employee_zip'] ?? null,
                'Country' => $validated['employee_country'] ?? null,
                'EmergencyContact' => $validated['employee_emergency_contact'] ?? null,
                'EmergencyPhone' => $validated['employee_emergency_phone'] ?? null,
            ];

            if ($request->hasFile('employee_profile_picture')) {
                $path = $request->file('employee_profile_picture')->store('profile_pictures', 'public');
                $data['ProfilePicture'] = $path;
            }

            $data['password'] = bcrypt('defaultPassword123');

            $employee = CompanyEmployees::create($data);

            return response()->json([
                'status' => 'success',
                'message' => __('Employee created successfully.'),
                'employee' => $employee
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('An error occurred while creating the employee.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyEmployees  $companyEmployees
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyEmployees $companyEmployees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyEmployees  $companyEmployees
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyEmployees $companyEmployees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        try {
            $employeeRecord = CompanyEmployees::where('EmployeeID', $employee)
                ->where('is_delete', 0)
                ->first();

            if (!$employeeRecord) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('Employee not found.')
                ], 404);
            }

            $validator = \Validator::make($request->all(), [
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'Email' => [
                    'required',
                    'email',
                    Rule::unique('company_employees', 'Email')
                        ->where(fn($query) => $query->where('CompanyID', $employeeRecord->CompanyID))
                        ->ignore($employee, 'EmployeeID'),
                ],
                'DepartmentID' => 'required|integer|exists:company_departments,DepartmentID',
                'HireDate' => 'nullable|date',
                'Status' => 'nullable|in:Active,Inactive,On Leave,Terminated',
                'ProfilePicture' => 'nullable|image|max:2048',
            ], [
                'FirstName.required' => __('First name is required.'),
                'LastName.required' => __('Last name is required.'),
                'Email.required' => __('Email address is required.'),
                'Email.unique' => __('The email has already been taken within this company.'),
                'DepartmentID.required' => __('Department is required.'),
                'DepartmentID.exists' => __('The selected department does not exist.'),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validated = $validator->validated();

            $data = [
                'FirstName' => $validated['FirstName'],
                'LastName' => $validated['LastName'],
                'Email' => $validated['Email'],
                'DepartmentID' => $validated['DepartmentID'],
            ];

            if (isset($validated['HireDate'])) {
                $data['HireDate'] = $validated['HireDate'];
            }

            if (isset($validated['Status'])) {
                $data['Status'] = $validated['Status'];
            }

            if ($request->hasFile('ProfilePicture')) {
                // Delete old profile picture if exists
                if ($employeeRecord->ProfilePicture && \Storage::disk('public')->exists($employeeRecord->ProfilePicture)) {
                    \Storage::disk('public')->delete($employeeRecord->ProfilePicture);
                }
                
                $path = $request->file('ProfilePicture')->store('profile_pictures', 'public');
                $data['ProfilePicture'] = $path;
            }

            $employeeRecord->update($data);

            return response()->json([
                'status' => 'success',
                'message' => __('Employee updated successfully.'),
                'employee' => $employeeRecord->fresh()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('An error occurred while updating the employee.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        try {
            $employeeRecord = CompanyEmployees::where('EmployeeID', $employee)
                ->where('is_delete', 0)
                ->first();

            if (!$employeeRecord) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('Employee not found.')
                ], 404);
            }

            // Soft delete by setting is_delete to 1
            $employeeRecord->update(['is_delete' => 1]);

            // Optionally delete profile picture file
            if ($employeeRecord->ProfilePicture && \Storage::disk('public')->exists($employeeRecord->ProfilePicture)) {
                \Storage::disk('public')->delete($employeeRecord->ProfilePicture);
            }

            return response()->json([
                'status' => 'success',
                'message' => __('Employee deleted successfully.')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('An error occurred while deleting the employee.'),
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
