<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyObjectives;
use App\Models\RECPHistory;
use App\Models\RECP_areas_of_benefit;
use App\Models\RECP_human_and_environmental_health_benefit;
use App\Models\RECP_innovation_areas;
use App\Models\RECP_areas_of_improvement;
use App\Models\RECP_harzardous_materials;
use App\Models\RECP_house_keep_practice;
use App\Models\RECP_unit_of_process;
use App\Models\RECP_problem_and_solution;
use App\Models\RECP_waste_management_method;
use App\Models\RECP_waste_reduction_measure;
use App\Models\RECP_product_recovery_method;
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
            'company_id'                        => ['required', 'numeric', 'unique:recp_histories,companyID'],
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
        ], [
            'company_id.unique'=> 'Company already registered for RECP.'
        ]);

        $check = false;

        // Areas of company benefit
        if(is_array($request['areas_of_company_benefit']) && isset($request['company_id'])){
            foreach ($request['areas_of_company_benefit'] as $key => $benefit) {
                # code...
                if ($benefit != null) {
                    # code...
                    $RECP_areas_of_benefit = 
                    RECP_areas_of_benefit::create([
                        'companyID' => $request['company_id'],
                        'benefit_title' => $benefit
                    ]);
                    $check = true;
                }

            }
        }

        // Environment and health benefit
        if(is_array($request['environment_health_benefit']) && isset($request['company_id'])){
            foreach ($request['environment_health_benefit'] as $key => $healthBenefit) {
                # code...
                if($healthBenefit != null){
                    $RECP_environment_health_benefit = 
                    RECP_human_and_environmental_health_benefit::create([
                        'companyID' => $request['company_id'],
                        'enviromental_benefit_title' => $healthBenefit
                    ]);

                    $check = true;
                }

            }
        }

        // Key area of innovation
        if(is_array($request['innovation_that_enhance_product']) != null && isset($request['company_id'])){
            foreach ($request['innovation_that_enhance_product'] as $key => $innovation) {
                # code...
                if ($innovation != null) {
                    # code...
                    // dd($innovation);
                    $RECP_areas_of_innovation = RECP_innovation_areas::create([
                        'companyID' => $request['company_id'],
                        'innovation_area_title' => $innovation
                    ]);
    
                    $check = true;
                }

            }
        }

        // Key area of improvement
        if(is_array($request['key_area_for_improvent']) && isset($request['company_id'])){
            
            foreach ($request['key_area_for_improvent'] as $key => $improvement) {
                # code...
                if ($improvement != null) {
                    # code...
                    $RECP_areas_of_improvement = RECP_areas_of_improvement::create([
                        'companyID' => $request['company_id'],
                        'area_title' => $improvement
                    ]);
                    $check = true;
                }
            }
        }

        // Key area of hazarduous materials
        if(isset($request['hazardous_material_in_process']) && isset($request['company_id'])){
            foreach ($request['hazardous_material_in_process'] as $key => $harzaduous_material) {
                # code...
                if ($harzaduous_material != null) {
                    # code...
                    $RECP_areas_of_hazarduous_material = 
                    RECP_harzardous_materials::create([
                        'companyID' => $request['company_id'],
                        'material_title' => $harzaduous_material
                    ]);
    
                    $check = true;
                }

            }
        }

        // good housekeeping practice
        if(is_array($request['house_keeping']) && isset($request['company_id'])){
            foreach ($request['house_keeping'] as $key => $practice) {
                # code...
                if ($practice != null) {
                    # code...
                    $RECP_house_keeping_practice = 
                    RECP_house_keep_practice::create([
                        'companyID' => $request['company_id'],
                        'practice_title' => $practice
                    ]);

                    $check = true;
                }

            }
        }

        // Key area of unit process
        if(isset($request['unit_process']) && isset($request['company_id'])){
            foreach ($request['unit_process'] as $key => $unit_process) {
                # code...
                if ($unit_process != null) {
                    # code...
                    $RECP_areas_of_unit_process = RECP_unit_of_process::create([
                        'companyID' => $request['company_id'],
                        'unit_process_title' => $unit_process
                    ]);
                    $check = true;
                }

            }
        }

        // Key area of problem and solution
        if(isset($request['problem_and_solution']) && isset($request['company_id'])){
            foreach ($request['problem_and_solution'] as $key => $problem_solution) {
                # code...
                if ($problem_solution != null) {
                    # code...
                    $RECP_areas_of_problem_solution = RECP_problem_and_solution::create([
                        'companyID' => $request['company_id'],
                        'problem_solution_title' => $problem_solution
                    ]);
                    $check = true;
                }

            }
        }

        // Waste Reduction Measure
        if(isset($request['RECP_waste_reduction_measures']) && isset($request['company_id'])){
            foreach ($request['RECP_waste_reduction_measures'] as $key => $reduction_measures) {
                # code...
                if ($reduction_measures != null) {
                    # code...
                    $RECP_waste_reduction_measure = RECP_waste_reduction_measure::create([
                        'companyID' => $request['company_id'],
                        'waste_reduction_title' => $reduction_measures
                    ]);
                    $check = true;
                }

            }
        }

        // Waste Management Method
        if(isset($request['waste_management_methods']) && isset($request['company_id'])){
            foreach ($request['waste_management_methods'] as $key => $method) {
                # code...
                if ($method != null) {
                    # code...
                    $RECP_waste_management_method = RECP_waste_management_method::create([
                        'companyID' => $request['company_id'],
                        'management_method_title' => $method
                    ]);
                    $check = true;
                }

            }
        }

        // Recovery Measures
        if(isset($request['product_recovery_measures']) && isset($request['company_id'])){
            foreach ($request['product_recovery_measures'] as $key => $measure) {
                # code...
                if ($measure != null) {
                    # code...
                    $RECP_recovery_measures = RECP_product_recovery_method::create([
                        'companyID' => $request['company_id'],
                        'recovery_method_title' => $measure
                    ]);
                    $check = true;
                }

            }
        }

        if ($check == true) {
            # code...
            RECPHistory::create(['companyID' => $request['company_id']]);
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
    public function show($company)
    {
        //
        // return "hello";
        return view('components.apps.companyProfile');
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
