<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyObjectives;
use App\Models\Policy;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['companies'] = Company::where('status', '=', 'active')->get();
        return view('components.apps.displayCompany', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('components.apps.create-company');
    }

    public function create_resp($id)
    {
        //
        $id = decrypt($id);
        return view('components.apps.create-recp')->with(['companyID' => $id]);
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
        // dd($request);
        $request->validate([
            'company_name' => ['required', 'string', 'min:3', 'max:225'],
            'industry' => ['required', 'string', 'min:3', 'max:225'],
            'industry_process_used' => ['nullable', 'string', 'min:3', 'max:225'],
            'email' => ['required', 'string', 'min:3', 'max:225'],
            'website_address' => ['nullable', 'url'],
            'primary_phone_number' => ['required', 'numeric', 'regex:/^(\+?[1-9][0-9]{1,14})$/', 'phone:*'],
            'secondary_phone_number' => ['nullable', 'numeric', 'regex:/^(\+?[1-9][0-9]{1,14})$/', 'phone:*'],
            'number_of_employees' => ['required', 'numeric'],
            'date_of_establishment' => ['required', 'date', 'before:now'],
            'country' => ['required', 'string'],
            'state' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'gis_location' => ['nullable', 'string'],
            'policy' => ['nullable', 'array'],
            'policy.*' => ['string'],
            'objective' => ['nullable', 'array'],
            'objective.*' => ['string'],
            'enviromental_operations_manager' => ['required', 'string', 'min:3', 'max:225'],
            'contact_person_name' => ['required', 'string', 'min:3', 'max:225'],
            'contact_person_position' => ['required', 'string', 'min:3', 'max:225'],
            'contact_person_phone_number' => ['required', 'numeric', 'regex:/^(\+?[1-9][0-9]{1,14})$/', 'phone:*'],
            'is_sherable' => ['nulable', 'string']
        ]);

        // company eloquent save
        $company = Company::create([
            'company_name' => $request['company_name'],
            'industry' => $request['industry'],
            'industry_process' => $request['industry_process_used'],
            'email' => $request['email'],
            'primary_phone_number' => $request['primary_phone_number'],
            'secondary_phone_number' => $request['secondary_phone_number'],
            'country' => $request['country'],
            'state' => $request['state'],
            'city' => $request['city'],
            'address' => $request['address'],
            'gis_location' => $request['gis_location'],
            'website_url' => $request['website_address'],
            'date_of_establishment' => $request['date_of_establishment'],
            'number_of_employees' => $request['number_of_employees'],
            'operations_manager' => $request['enviromental_operations_manager'],
            'contact_person_full_name' => $request['contact_person_name'],
            'contact_person_position' => $request['contact_person_position'],
            'contact_person_contact_number' => $request['contact_person_phone_number'],
            'is_sharable' => ($request['is_sherable'])? $request['is_sherable']:"inactive",
        ]);

        if ($company) {
            # code...
            if (isset($request['policy'])) {
                # code...
                foreach ($request['policy'] as $key => $policy) {
                    # code...
                    $policyModel = Policy::create([
                        'companyID' => $company->company_id,
                        'policy_title' => $policy
                    ]);
                }
            }

            if (isset($request['objective'])) {
                # code...
                
            foreach ($request['objective'] as $key => $objective) {
                # code...
                $objectiveModel = CompanyObjectives::create([
                    'companyID' => $company->company_id,
                    'objective_title' => $objective
                ]);
            }
            }
        }

        return back()->withInput()->with(['success', "Company registered successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
