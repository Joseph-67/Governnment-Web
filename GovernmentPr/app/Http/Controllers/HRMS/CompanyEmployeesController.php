<?php

namespace App\Http\Controllers\HRMS;
use App\Http\Controllers\Controller;

use App\Models\HRMS\CompanyEmployees;
use Illuminate\Http\Request;

class CompanyEmployeesController extends Controller
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
    public function store(Request $request)
    {
        //
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
     * @param  \App\Models\CompanyEmployees  $companyEmployees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyEmployees $companyEmployees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyEmployees  $companyEmployees
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyEmployees $companyEmployees)
    {
        //
    }
}
