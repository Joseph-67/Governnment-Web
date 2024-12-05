<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyObjectives;
use App\Models\RECP_areas_of_benefit;
use App\Models\RECP_areas_of_improvement;
use App\Models\RECP_innovation_areas;
use App\Models\RECP_harzardous_materials;
use App\Models\RECP_unit_of_process;
use App\Models\RECP_problem_and_solution;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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

    public function store_recp(Request $request) {
        // dd($request);
        $validator = $request->validate([
            'company_id'                        => ['required', 'numeric'],
            'areas_of_company_benefit'          => ['nullable', 'array'],
            'areas_of_company_benefit.*'        => ['nullable', 'string'],
            'environment_health_benefit'        => ['nullable', 'array'],
            'environment_health_benefit.*'      => ['nullable', 'string'],
            'key_area_for_improvent'            => ['nullable', 'array'],
            'key_area_for_improvent.*'          => ['nullable', 'string'],
            'innovation_that_enhance_product'   => ['nullable', 'array'],
            'innovation_that_enhance_product.*' => ['nullable', 'string'],
            'hazardous_material_in_process'     => ['nullable', 'array'],
            'hazardous_material_in_process.*'   => ['nullable', 'string'],
            'house_keeping'                     => ['nullable', 'array'],
            'house_keeping.*'                   => ['nullable', 'string'],
            'unit_process'                      => ['nullable', 'array'],
            'unit_process.*'                    => ['nullable', 'string'],
            'problem_and_solution'              => ['nullable', 'array'],
            'problem_and_solution.*'            => ['nullable', 'string'],
            'RECP_waste_reduction_measures'     => ['nullable', 'array'],
            'RECP_waste_reduction_measures.*'   => ['nullable', 'string'],
            'waste_management_methods'          => ['nullable', 'array'],
            'waste_management_methods.*'        => ['nullable', 'string'],
            'product_recovery_measures'         => ['nullable', 'array'],
            'product_recovery_measures.*'       => ['nullable', 'string'],
        ]);

        $check = false;
        // Areas of company benefit
        if(is_array($request['areas_of_company_benefit']) && $request['areas_of_company_benefit.*'] == null && isset($request['company_id'])){
            foreach ($request['areas_of_company_benefit'] as $key => $benefit) {
                # code...
                $RECP_areas_of_benefit = RECP_areas_of_benefit::create([
                    'companyID' => $request['company_id'],
                    'benefit_title' => $benefit
                ]);

                $check = true;
            }
        }

        // Key area of improvement
        if(is_array($request['key_area_for_improvent']) && $request['key_area_for_improvent.*'] != null && isset($request['company_id'])){
            foreach ($request['key_area_for_improvent'] as $key => $improvement) {
                # code...
                $RECP_areas_of_improvement = RECP_areas_of_improvement::create([
                    'companyID' => $request['company_id'],
                    'area_title' => $improvement
                ]);

                $check = true;
            }
        }

        // Key area of innovation
        if(is_array($request['innovation_that_enhance_product']) && $request['innovation_that_enhance_product.*'] != null && isset($request['company_id'])){
            foreach ($request['innovation_that_enhance_product'] as $key => $innovation) {
                # code...
                $RECP_areas_of_innovation = RECP_innovation_areas::create([
                    'companyID' => $request['company_id'],
                    'innovation_area_title' => $innovation
                ]);

                $check = true;
            }
        }

        // Key area of hazarduous materials
        if(isset($request['hazardous_material_in_process']) && $request['hazardous_material_in_process.*'] != null && isset($request['company_id'])){
            foreach ($request['hazardous_material_in_process'] as $key => $harzaduous_material) {
                # code...
                $RECP_areas_of_hazarduous_material = RECP_harzardous_materials::create([
                    'companyID' => $request['company_id'],
                    'material_title' => $harzaduous_material
                ]);

                $check = true;
            }
        }

        // Key area of unit process
        if(isset($request['unit_process']) && $request['unit_process.*'] != null && isset($request['company_id'])){
            foreach ($request['unit_process'] as $key => $unit_process) {
                # code...
                $RECP_areas_of_unit_process = RECP_unit_of_process::create([
                    'companyID' => $request['company_id'],
                    'unit_process_title' => $unit_process
                ]);
                $check = true;
            }
        }

        // Key area of problem and solution
        if(isset($request['problem_and_solution']) && $request['problem_and_solution.*'] != null && isset($request['company_id'])){
            foreach ($request['problem_and_solution'] as $key => $problem_solution) {
                # code...
                $RECP_areas_of_problem_solution = RECP_problem_and_solution::create([
                    'companyID' => $request['company_id'],
                    'problem_solution_title' => $problem_solution
                ]);
                $check = true;
            }
        }

        if ($check == true) {
            # code...
            return back()->with(['success' => 'RECP registeration successful.']);
        }

        $error = new MessageBag(['Please fill in the form before submission.']);
        return back()->withErrors($error);
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
