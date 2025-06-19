<x-layouts.admin-app>
    @section('PageTitle', 'Company Profile')
    <div class="container-xxl">
        <!-- Header -->
        <div class="profile-header text-center py-5">
            <h1 class="display-4 fw-bold">Company Profile</h1>
            <p class="">Your company's information at a glance</p>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-12 nav-tabs-custom text-center">
                <ul class="nav nav-tabs mb-3 justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-selected="true"><i class="la la-info-circle d-block"></i>Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#policy" role="tab"
                            aria-selected="false"><i class="la la-file-alt d-block"></i>Policies & Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#recp" role="tab"
                            aria-selected="false"><i class="la la-chart-line d-block"></i>R.E.C.P</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#inventory" role="tab"
                            aria-selected="false"><i class="la la-box d-block"></i>Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#hrms" role="tab"
                            aria-selected="false"><i class="la la-users d-block"></i>HRMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#operations" role="tab"
                            aria-selected="false"><i class="la la-cogs d-block"></i>Operations Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#product-management" role="tab"
                            aria-selected="false"><i class="la la-box-open d-block"></i>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#settings" role="tab"
                            aria-selected="false"><i class="la la-cog d-block"></i>General Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#contact" role="tab"
                            aria-selected="false"><i class="la la-user d-block"></i>Contact Personnel Details</a>
                    </li>
                </ul>
                <!-- Tab panes -->
            </div>
            <div class="tab-content">
                <!-- Overview -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Company Name</h5>
                                    <p class="card-text">{{ $company->company_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Founded</h5>
                                    <p class="card-text">{{
                                        \Carbon\Carbon::parse($company->date_of_establishment)->format('Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Industry</h5>
                                    <p class="card-text">{{ $company->industry }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Headquarters</h5>
                                    <p class="card-text">{{ $company->address }}, {{ $company->city }}, {{
                                        $company->state }}, {{
                                        $company->country }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Contact Details</h5>
                                    <p class="card-text">Phone: {{ $company->primary_phone_number }}, {{
                                        $company->secondary_phone_number }}</p>
                                    <p class="card-text">Email: {{ $company->email }}</p>
                                    <p class="card-text">Website: <a href="{{ $company->website_url }}">{{
                                            $company->website_url }}</a></p>
                                    <p class="card-text">ZIP Code: {{ $company->zip_code }}</p>
                                    <p class="card-text">Longitude: {{ $company->longitude }}</p>
                                    <p class="card-text">Latitude: {{ $company->latitude }}</p>
                                    <p class="card-text">MGRS: {{ $company->mgrs }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Environmental Manager</h5>
                                    <p class="card-text">Name: {{ $company->operations_manager }}</p>
                                    <p class="card-text">Phone: (123) 555-7890</p>
                                    <p class="card-text">Email: jane.doe@abccorp.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Contact Person</h5>
                                    <p class="card-text">Name: {{ $company->contact_person_full_name }}</p>
                                    <p class="card-text">Phone: {{ $company->contact_person_contact_number }}</p>
                                    <p class="card-text">Position: {{ $company->contact_person_position }}</p>
                                    <p class="card-text">Email: john.smith@abccorp.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Number of Employees</h5>
                                    <p class="card-text">{{ $company->number_of_employees }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Industry Process Used</h5>
                                    <p class="card-text">This company primarily utilizes processes such as {{
                                        $company->industry_process }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="policy" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Company Policies</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <!-- Policy -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="quality-policy" value="quality policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'quality policy')"
                                            name="policy[]" {{(in_array('quality policy',
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label" for="quality-policy">Quality policy </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="environmental-policy" value="environmental policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'environmental policy')"
                                            name="policy[]" {{(in_array("environmental policy",
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label" for="environmental-policy">Enviromental
                                            Policy.</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="health-and-safety-policy" value="health and safety policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'health and safety policy')"
                                            name="policy[]" {{(in_array('health and safety policy',
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label" for="health-and-safety-policy">Health and
                                            safety policy. </label>
                                    </div>
                                </div>
                                <x-section-border />
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="human-resource-policy" value="human resource policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'human resource policy')"
                                            name="policy[]" {{(in_array('human resource policy',
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label" for="human-resource-policy">Human resource
                                            policy. </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="data-protection-policy" value="data protection policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'data protection policy')"
                                            name="policy[]" {{(in_array('data protection policy',
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label" for="data-protection-policy">Data protection
                                            policy. </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="cooperate-social-responsibility-policy"
                                            value="cooperate social responsibility policy"
                                            onchange="ChangePolicy(this, '{{$company->company_id}}', 'cooperate social responsibility policy')"
                                            name="policy[]" {{(in_array('cooperate social responsibility policy',
                                            array_column($company_policies->toArray(), 'policy_title')))? "checked":
                                        ""}}>
                                        <label class="form-check-label"
                                            for="cooperate-social-responsibility-policy">Cooperate social
                                            reponsibility policy. </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Policy -->
                        </div><!--end card-body-->
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Company Objectives</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <!-- objective -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="business-growth"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'business growth')"
                                            value="business growth" name="objective[]" {{(in_array("business growth",
                                            array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="business-growth"> Business growth
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="customer-satisfaction"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'customer satisfaction')"
                                            value="customer satisfaction" name="objective[]" {{(in_array("customer
                                            satisfaction", array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="customer-satisfaction"> Customer
                                            satisfaction. </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="material-optimization"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'material optimization')"
                                            value="material optimization" name="objective[]" {{(in_array("material
                                            optimization", array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="material-optimization"> Material
                                            optimization. </label>
                                    </div>
                                </div>
                                <x-section-border />
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="waste-minimization"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'waste minimization')"
                                            value="waste minimization" name="objective[]" {{(in_array("waste
                                            minimization", array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="waste-minimization"> Waste
                                            minimization. </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="measurable-and-timely-targets"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'measurable and timely targets')"
                                            value="measurable and timely targets" name="objective[]"
                                            {{(in_array("measurable and timely targets",
                                            array_column($company_objectives->toArray(), 'objective_title')))?
                                        "checked": ""}}>
                                        <label class="form-check-label" for="measurable-and-timely-targets">
                                            Measurable & timely targets. </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="innovation"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'innovation')"
                                            value="innovation" name="objective[]" {{(in_array("innovation",
                                            array_column($company_objectives->toArray(), 'objective_title')))?
                                        "checked": ""}}>
                                        <label class="form-check-label" for="innovation"> Innovation. </label>
                                    </div>
                                </div>
                                <x-section-border />
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="sustainability"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'sustainability')"
                                            value="sustainability" name="objective[]" {{(in_array("sustainability",
                                            array_column($company_objectives->toArray(), 'objective_title')))?
                                        "checked": ""}}>
                                        <label class="form-check-label" for="sustainability"> Sustainability.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="employee-management"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'employee management')"
                                            value="employee management" name="objective[]" {{(in_array("employee
                                            management", array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="employee-management"> Employee
                                            management. </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="market-expansion"
                                            onchange="ChangeObjectives(this, '{{$company->company_id}}', 'market expansion')"
                                            value="market expansion" name="objective[]" {{(in_array("market expansion",
                                            array_column($company_objectives->toArray(),
                                        'objective_title')))? "checked": ""}}>
                                        <label class="form-check-label" for="market-expansion"> Market expansion.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Policy -->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
                <div class="tab-pane" id="recp" role="tabpanel">
                    <h4 class="">General Knowledge of Nigeria IEE RECP Concept/Benefit</h4>
                    <p class="subtitle">In Nigeria, Industrial Energy Efficiency (IEE) and Resource Efficiency
                        and Cleaner Production (RECP) focus on optimizing energy and resource use while minimizing
                        waste.
                        These practices help businesses reduce costs, enhance sustainability, and lower
                        environmental impacts.
                        The benefits include cost savings, compliance with regulations, improved competitiveness,
                        and positive
                        contributions to Nigeria's economic growth and environmental protection. Adopting IEE and
                        RECP strategies
                        enables industries to operate more efficiently and sustainably, fostering a cleaner, greener
                        future.</p>
                    <!-- this projct -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="#this-project"
                                        data-bs-toggle="tab">This Project</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#environmental-health" data-bs-toggle="tab">Human and
                                        Environmental Health/Business Benefits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab-innovation" data-bs-toggle="tab">Innovation</a>
                                </li>
                            </ul>
                        </div><!--end card-header-->
                        <div class="card-body pt-2">
                            <div class="tab-content">
                                <div class="row tab-pane fade show active" id="this-project">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `Develop policy and regulation that deliver economic, human and environmental health gain to your company.`)"
                                                value="Develop policy and regulation that deliver economic, human and environmental health gain to your company."
                                                name="areas_of_company_benefit[]" {{(in_array("Develop policy and
                                                regulation that deliver economic, human and environmental health gain to
                                                your company.", array_column($company_benefits->toArray(),
                                            'benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Develop policy and regulation
                                                that deliver economic, humanand environmental health gain to your
                                                company. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.`)"
                                                value="To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise."
                                                name="areas_of_company_benefit[]" {{(in_array("To offer standard
                                                accreditation and certification capacity building on ISO 15000 and 14000
                                                series to your enterprise.", array_column($company_benefits->toArray(),
                                            'benefit_title')))?
                                            "checked": ""}}>
                                            <label class="form-check-label" for=""> To offer standard accreditation
                                                and certification capacity building on ISO 15000 and 14000 series to
                                                your enterprise </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector.`)"
                                                value="To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector."
                                                name="areas_of_company_benefit[]" {{(in_array("To deliver impactful
                                                training on Resource Efficient and Cleaner Production (RECP), including
                                                comprehensive support materials, toolkits, and learning resources,
                                                tailored for staff and employees across Nigeria's industrial
                                                manufacturing sector.", array_column($company_benefits->toArray(),
                                            'benefit_title')))?
                                            "checked": ""}}>
                                            <label class="form-check-label" for=""> To deliver impactful training on
                                                Resource Efficient and Cleaner Production (RECP), including
                                                comprehensive support materials, toolkits, and learning resources,
                                                tailored for staff and employees across Nigeria's industrial
                                                manufacturing sector. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.`)"
                                                value="To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes."
                                                name="areas_of_company_benefit[]" {{(in_array("To strengthen the
                                                internal capacity for delivering RECP training and related technical
                                                assistance to your enterprise, ensuring long-term impact and achieving
                                                commercially sustainable outcomes.",
                                                array_column($company_benefits->toArray(), 'benefit_title')))?
                                            "checked": ""}}>
                                            <label class="form-check-label" for=""> To strengthen the internal
                                                capacity for delivering RECP training and related technical
                                                assistance to your enterprise, ensuring long-term impact and
                                                achieving commercially sustainable outcomes. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.`)"
                                                value="To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector."
                                                name="areas_of_company_benefit[]" {{(in_array("To raise awareness and
                                                implement pilot programs on RECP, aimed at enhancing productivity
                                                through efficient use of manufacturing inputs (water, chemicals, and
                                                materials), minimizing waste and emissions, and promoting regulatory
                                                compliance while boosting competitiveness within your industrial
                                                sector.", array_column($company_benefits->toArray(), 'benefit_title')))?
                                            "checked": ""}}>
                                            <label class="form-check-label" for=""> To raise awareness and implement
                                                pilot programs on RECP, aimed at enhancing productivity through
                                                efficient use of manufacturing inputs (water, chemicals, and
                                                materials), minimizing waste and emissions, and promoting regulatory
                                                compliance while boosting competitiveness within your industrial
                                                sector. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.`)"
                                                value="To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs."
                                                name="areas_of_company_benefit[]" {{(in_array("To enhance the adoption
                                                of RECP practices and associated investments by providing a targeted
                                                financial assistance package for companies participating in RECP pilot
                                                programs.", array_column($company_benefits->toArray(),
                                            'benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> To enhance the adoption of RECP
                                                practices and associated investments by providing a targeted
                                                financial assistance package for companies participating in RECP
                                                pilot programs. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.`)"
                                                value="To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects."
                                                name="areas_of_company_benefit[]" {{(in_array("To deliver the
                                                cost-saving benefits of RECP to your industrial manufacturing sector by
                                                facilitating greater access to financial mechanisms—both commercial and
                                                government—to support the financing of RECP projects.",
                                                array_column($company_benefits->toArray(),
                                            'benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> To deliver the cost-saving
                                                benefits of RECP to your industrial manufacturing sector by
                                                facilitating greater access to financial mechanisms—both commercial
                                                and government—to support the financing of RECP projects. </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- environmental health -->
                                <div class="row tab-pane fade" id="environmental-health">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a minimum 20% reduction in energy consumption within one year.`)"
                                                value="Achieve a minimum 20% reduction in energy consumption within one year."
                                                name="environment_health_benefit[]" {{(in_array("Achieve a minimum 20%
                                                reduction in energy consumption within one year.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Achieve a minimum 20% reduction
                                                in energy consumption within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.`)"
                                                value="Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months."
                                                name="environment_health_benefit[]" {{(in_array("Achieve a 40% reduction
                                                in CO<sub>2</sub> emissions within 18 months.",
                                            array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Achieve a 40% reduction in
                                                CO<sub>2</sub> emissions within 18 months.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Double your water productivity within one year.`)"
                                                value="Double your water productivity within one year."
                                                name="environment_health_benefit[]" {{(in_array("Double your water
                                                productivity within one year.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Double your water productivity
                                                within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 50% increase in overall material productivity within one year.`)"
                                                value="Achieve a 50% increase in overall material productivity within one year."
                                                name="environment_health_benefit[]" {{(in_array("Achieve a 50% increase
                                                in overall material productivity within one year.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Achieve a 50% increase in
                                                overall material productivity within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.`)"
                                                value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices."
                                                name="environment_health_benefit[]" {{(in_array("Attain ISO 14000
                                                certification to demonstrate your commitment to effective environmental
                                                management and sustainability practices.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Attain ISO 14000 certification
                                                to demonstrate your commitment to effective environmental management
                                                and sustainability practices. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve an increase in overall annual financial savings.`)"
                                                value="Achieve an increase in overall annual financial savings."
                                                name="environment_health_benefit[]" {{(in_array("Achieve an increase in
                                                overall annual financial savings.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Achieve an increase in overall
                                                annual financial savings. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Enhance customer satisfaction through improved products, services, and overall experience.`)"
                                                value="Enhance customer satisfaction through improved products, services, and overall experience."
                                                name="environment_health_benefit[]" {{(in_array("Enhance customer
                                                satisfaction through improved products, services, and overall
                                                experience.", array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Enhance customer satisfaction
                                                through improved products, services, and overall experience.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.`)"
                                                value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management."
                                                name="environment_health_benefit[]" {{(in_array("Achieve ISO 15000
                                                series certification to demonstrate adherence to international standards
                                                for information and communication technology management.",
                                                array_column($company_enviromental_benefits->toArray(),
                                            'environmental_benefit_title')))? "checked": ""}}>
                                            <label class="form-check-label" for=""> Achieve ISO 15000 series
                                                certification to demonstrate adherence to international standards
                                                for information and communication technology management. </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- environmental health -->
                                <!-- Innovation -->
                                <div class="row tab-pane fade g-2" id="tab-innovation">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Key areas for improving performance in your
                                                industry.</label>
                                        </div>
                                        <div class="col-md-12 key-areas-container">
                                            @foreach($company_areas_of_improvement as $keyArea)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $keyArea->area_title }}"
                                                            placeholder="Key area for improving performance in your industry"
                                                            onblur='update_key_area("{{$company->company_id}}", "{{ $keyArea->improvementAreaID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_key_area(this, "{{ $keyArea->improvementAreaID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Key area for performance improvement"
                                                        id="key_area_for_improvent">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_key_areas"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Highlight innovations that enhance your product's
                                                environmental compatibility.</label>
                                        </div>
                                        <div class="col-md-12 product-innovation-container">
                                            @foreach($company_product_innovation as $productInnovation)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $productInnovation->innovation_area_title }}"
                                                            placeholder="Key innovation that enhance your product's environmental compatibility"
                                                            onblur='update_product_innovation("{{$company->company_id}}", "{{ $productInnovation->innovationAreaID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_product_innovation(this, "{{ $productInnovation->innovationAreaID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Key innovation that enhance your product's environmental compatibility"
                                                        id="key_product_innovation">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_key_innovation"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Identify hazarduous materials in your process system that
                                                can be reduced, eliminated, or replaced with safer
                                                alternatives.</label>
                                        </div>
                                        <div class="col-md-12 hazarduous-material-container">
                                            @foreach($company_hazarduous_material as $hazarduousMaterial)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $hazarduousMaterial->material_title }}"
                                                            placeholder="Key innovation that enhance your product's environmental compatibility"
                                                            onblur='update_hazarduous_material("{{$company->company_id}}", "{{ $hazarduousMaterial->hazarduousMaterialID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_harzardous_material(this, "{{ $hazarduousMaterial->hazarduousMaterialID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Hazarduous material " id="hazarduous_material">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_hazardous_material"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>
                                    <!-- Innovation -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="">Resource Efficiency & Cleaner Production Opportunities</h4>
                    <p>Resource Efficiency and Cleaner Production (RECP) focus on optimizing
                        the use of resources while minimizing waste and environmental impacts
                        throughout production processes. By adopting these strategies, industries
                        can enhance productivity, reduce costs, and achieve sustainability goals.</p>
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="#tab-housekeeping"
                                        data-bs-toggle="tab">Good Housekeeping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process-specific-optimization"
                                        data-bs-toggle="tab">Process Specific Optimization</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process-waste-reduction-measures"
                                        data-bs-toggle="tab">Waste Reduction Measures</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#waste-management-method" data-bs-toggle="tab">Waste
                                        Management & Disposal Methods</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product-recovery" data-bs-toggle="tab">Product
                                        Recovery Measures</a>
                                </li>
                            </ul>
                        </div><!--end card-header-->
                        <div class="card-body pt-2">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-housekeeping">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Attitudinal change (negligence attitude).`)"
                                                    value="Attitudinal change (negligence attitude)."
                                                    name="house_keeping[]" {{(in_array("Attitudinal change (negligence
                                                    attitude).", array_column($company_house_keeping->toArray(),
                                                'practice_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Attitudinal change
                                                    (negligence attitude). </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Improved workplace management.`)"
                                                    value="Improved workplace management." name="house_keeping[]"
                                                    {{(in_array("Improved workplace management.",
                                                    array_column($company_house_keeping->toArray(),
                                                'practice_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Improved Workplace
                                                    management. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Good operating practices(personel practices, waste segregation etc.).`)"
                                                    value="Good operating practices(personel practices, waste segregation etc.)."
                                                    name="house_keeping[]" {{(in_array("Good operating
                                                    practices(personel practices, waste segregation etc.).",
                                                    array_column($company_house_keeping->toArray(),
                                                'practice_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Good operating
                                                    practices(personel practices, waste segregation etc.). </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Workers motivation.`)"
                                                    value="Workers motivation." name="house_keeping[]"
                                                    {{(in_array("Workers motivation.",
                                                    array_column($company_house_keeping->toArray(),
                                                'practice_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Workers motivation. </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Process  Specific Specialization -->
                                <div class="row g-2 tab-pane fade " id="process-specific-optimization">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">List Unit Processes Requiring Intervention (if
                                                applicable)</label>
                                        </div>
                                        <div class="col-md-12 unit-process-container">
                                            @foreach($company_unit_process as $unitProcess)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $unitProcess->unit_process_title }}"
                                                            placeholder="Unit process"
                                                            onblur='update_unit_process("{{$company->company_id}}", "{{ $unitProcess->unitProcessID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_unit_process(this, "{{ $unitProcess->unitProcessID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Unit process"
                                                        id="unit_process">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_unit_process"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for=""> Problem Summary and Suggested Solutions. </label>
                                        </div>
                                        <div class="col-md-12 problems-solutions-container">
                                            @foreach($company_problems_and_solutions as $problemSolution)
                                            <div class="row g-2 my-1 align-items-end">
                                                <div class="col-md-5">
                                                    <label for="">Problem Summary</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $problemSolution->problem_title }}"
                                                            placeholder="Problem Summary"
                                                            onblur='update_problem_summary("{{$company->company_id}}", "{{ $problemSolution->problemSolutionID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="">Suggested Solution</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $problemSolution->solution_title }}"
                                                            placeholder="Suggested solution"
                                                            onblur='update_suggested_solution("{{$company->company_id}}", "{{ $problemSolution->problemSolutionID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"><button class="btn btn-outline-danger"
                                                        onclick='remove_problem_solution(this, "{{ $problemSolution->problemSolutionID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-5">
                                                <label for="">Problem summary</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Problem summary" id="problem_summary">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="">Suggested Solution</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Suggested solution" id="suggested_solution">
                                                </div>
                                            </div>
                                            <div class="col-md-2 "><button
                                                    class="btn btn-outline-primary btn-sm add_more_problem_solution"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Process specific specialization -->
                                <!-- waste reduction measures -->
                                <div class="tab-pane fade" id="process-waste-reduction-measures">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Water recycling flow.`)"
                                                    id="" value="Water recycling flow."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Water recycling
                                                    flow.", array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Water recycling flow.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Waste water treatment.`)"
                                                    value="Waste water treatment."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Waste water
                                                    treatment.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Waste water treatment.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Monitoring of the quality and quantity of waste water.`)"
                                                    value="Monitoring of the quality and quantity of waste water."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Monitoring of
                                                    the quality and quantity of waste water.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Monitoring of the quality
                                                    and quantity of wastewater. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Using production equipment or technology that supports energy/resource-efficient production.`)"
                                                    value="Using production equipment or technology that supports energy/resource-efficient production."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Using production
                                                    equipment or technology that supports energy/resource-efficient
                                                    production.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Using production equipment
                                                    or technology that supports energy/resource-efficient
                                                    production. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of waste for internal energy sources.`)"
                                                    value="Use of waste for internal energy sources."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Use of waste for
                                                    internal energy sources.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Use of waste for internal
                                                    energy sources. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Installation of lighting sensor.`)"
                                                    value="Installation of lighting sensor."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Installation of
                                                    lighting sensor.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Installation of lighting
                                                    sensor. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Utilization of sunlight for daytime lighting.`)"
                                                    value="Utilization of sunlight for daytime lighting."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Utilization of
                                                    sunlight for daytime lighting.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Utilization of sunlight for
                                                    daytime lighting. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of enviromentally friendly/renewable energy.`)"
                                                    value="Use of enviromentally friendly/renewable energy."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Use of
                                                    enviromentally friendly/renewable energy.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Use of enviromentally
                                                    friendly/renewable energy. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Recording of fuel usage.`)"
                                                    value="Recording of fuel usage."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Recording of
                                                    fuel usage.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Recording of fuel usage.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Minimize the use of generating sets.`)"
                                                    value="Minimize the use of generating sets."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Minimize the use
                                                    of generating sets.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Minimize the use of
                                                    generating sets. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Substitute high yield pollutant raw materials with other less polluting materials.`)"
                                                    value="Substitute high yield pollutant raw materials with other less polluting materials."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Substitute high
                                                    yield pollutant raw materials with other less polluting materials.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Substitute high yield
                                                    pollutant raw materials with other less polluting materials.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Maintain the unit process/equipment to minimize emission of pollutants.`)"
                                                    value="Maintain the unit process/equipment to minimize emission of pollutants."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Maintain the
                                                    unit process/equipment to minimize emission of pollutants.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Maintain the unit
                                                    process/equipment to minimize emission of pollutants. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Diluting the air pollutants.`)"
                                                    value="Diluting the air pollutants."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Diluting the air
                                                    pollutants.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Diluting the air pollutants.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Plant flowers and trees around the premises to reduce large number of pollutants in the air.`)"
                                                    value="Plant flowers and trees around the premises to reduce large number of pollutants in the air."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Plant flowers
                                                    and trees around the premises to reduce large number of pollutants
                                                    in the air.",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Plant flowers and trees
                                                    around the premises to reduce large number of pollutants in the
                                                    air. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).`)"
                                                    value="Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy)."
                                                    name="RECP_waste_reduction_measures[]" {{(in_array("Fuel
                                                    substituting(petrol and diesel can be replaced with compressed
                                                    natural gas, solar and wind energy).",
                                                    array_column($company_waste_reduction_measures->toArray(),
                                                'waste_reduction_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Fuel substituting(petrol and
                                                    diesel can be replaced with compressed natural gas, solar and
                                                    wind energy). </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- waste reduction measures -->
                                <!-- waste management and disposal methods -->
                                <div class="tab-pane fade" id="waste-management-method">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Landfill`)"
                                                    value="Landfill" name="waste_management_methods[]"
                                                    {{(in_array("Landfill",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Landfill </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Recycling`)"
                                                    value="Recycling" name="waste_management_methods[]"
                                                    {{(in_array("Recycling",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Recycling </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste segregation`)"
                                                    value="Waste segregation" name="waste_management_methods[]"
                                                    {{(in_array("Waste segregation",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Waste segregation </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Incineration`)"
                                                    value="Incineration" name="waste_management_methods[]"
                                                    {{(in_array("Incineration",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Incineration </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Composting`)"
                                                    value="Composting" name="waste_management_methods[]"
                                                    {{(in_array("Composting",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Composting </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste Symbiosis`)"
                                                    value="Waste Symbiosis" name="waste_management_methods[]"
                                                    {{(in_array("Waste Symbiosis",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Waste Symbiosis </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="tab-pane fade" id="product-recovery">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `High temperature recovery method`)"
                                                    value="High temperature recovery method"
                                                    name="product_recovery_measures[]" {{(in_array("High temperature
                                                    recovery method",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> High temperature recovery
                                                    method </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using correct material ratio`)"
                                                    value="Using correct material ratio"
                                                    name="product_recovery_measures[]" {{(in_array("Using correct
                                                    material ratio",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Using correct material ratio
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using standard measuring equipment`)"
                                                    value="Using standard measuring equipment"
                                                    name="product_recovery_measures[]" {{(in_array("Using standard
                                                    measuring equipment",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Using standard measuring
                                                    equipment </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate chemical/ material storage facility`)"
                                                    value="Adequate chemical/ material storage facility"
                                                    name="product_recovery_measures[]" {{(in_array("Adequate chemical/
                                                    material storage facility",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Adequate chemical/ material
                                                    storage facility </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate container seal to prevent spill`)"
                                                    value="Adequate container seal to prevent spill"
                                                    name="product_recovery_measures[]" {{(in_array("Adequate container
                                                    seal to prevent spill",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Adequate container seal to
                                                    prevent spill </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Recycling`)"
                                                    value="Recycling" name="product_recovery_measures[]"
                                                    {{(in_array("Recycling",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Recycling </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Filtration`)"
                                                    value="Filtration" name="product_recovery_measures[]"
                                                    {{(in_array("Filtration",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Filtration </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Extended Producer Responsibility(EPR)`)"
                                                    value="Extended Producer Responsibility(EPR)"
                                                    name="product_recovery_measures[]" {{(in_array("Extended Producer
                                                    Responsibility(EPR)",
                                                    array_column($company_product_recovery_measures->toArray(),
                                                'recovery_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Extended Producer
                                                    Responsibility(EPR) </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Waste Management -->
                <!-- HRMS Tab -->
                <div class="tab-pane fade" id="hrms" role="tabpanel" aria-labelledby="hrms-tab">
                    <h3>Human Resource Management System (HRMS)</h3>
                    <div class="accordion my-3" id="hrmsAccordion">
                        <!-- Department Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="departmentHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#departmentCollapse" aria-expanded="false" aria-controls="departmentCollapse">
                                    <i class="las la-building me-2" style="font-size: 1.5rem;"></i> <span>Department Management</span>
                                </button>
                            </h2>
                            <div id="departmentCollapse" class="accordion-collapse collapse" aria-labelledby="departmentHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="department-form">
                                        <div class="card shadow-sm border-0 mb-4">
                                            <div class="card-header bg-gradient-primary text-white">
                                                <h5 class="mb-0"><i class="las la-building me-2"></i> Add New Department</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3 align-items-end">
                                                    <div class="col-md-6">
                                                        <label for="department_name" class="form-label fw-bold">Department Name</label>
                                                        <input type="text" class="form-control border-primary" id="department_name" name="department_name" required placeholder="Enter department name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="taggable-container " id="manager-tag-input-1">
                                                            <label for="manager" class="form-label fw-bold">Department Head / Manager</label>
                                                            <div class="manager-tag-input-1 manager-tag-input border-primary bg-light">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3 text-end">
                                                        <button type="submit" class="btn btn-primary px-4 py-2">
                                                            <i class="las la-plus"></i> Add Department
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-hover table-bordered rounded shadow-sm align-middle w-100" id="tbl-departments">
                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th style="width: 35%;">Department Name</th>
                                                    <th style="width: 45%;">Department Head / Manager</th>
                                                    <th style="width: 20%;" class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Department rows will be dynamically populated here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Employees Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="employeesHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#employeesCollapse" aria-expanded="false" aria-controls="employeesCollapse">
                                    <i class="las la-user-friends me-2" style="font-size: 1.5rem;"></i> Employees Management
                                </button>
                            </h2>
                            <div id="employeesCollapse" class="accordion-collapse collapse" aria-labelledby="employeesHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="employee-form" enctype="multipart/form-data" class="card shadow-sm border-0 mb-4">
                                        @csrf
                                        <div class="card-header bg-gradient-primary text-white">
                                            <h5 class="mb-0"><i class="las la-user-plus me-2"></i> Add New Employee</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="employee_number" class="form-label fw-bold">Employee Number</label>
                                                    <input type="text" class="form-control" id="employee_number" name="employee_number" required placeholder="e.g. EMP12345">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_first_name" class="form-label fw-bold">First Name</label>
                                                    <input type="text" class="form-control" id="employee_first_name" name="employee_first_name" required placeholder="First Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_last_name" class="form-label fw-bold">Last Name</label>
                                                    <input type="text" class="form-control" id="employee_last_name" name="employee_last_name" required placeholder="Last Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_email" class="form-label fw-bold">Email</label>
                                                    <input type="email" class="form-control" id="employee_email" name="employee_email" required placeholder="example@company.com">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_phone" class="form-label fw-bold">Phone Number</label>
                                                    <input type="tel" class="form-control" id="employee_phone" name="employee_phone" placeholder="+234 800 000 0000">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_dob" class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" id="employee_dob" name="employee_dob">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_gender" class="form-label">Gender</label>
                                                    <select class="form-select" id="employee_gender" name="employee_gender">
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_job_title" class="form-label">Job Title</label>
                                                    <input type="text" class="form-control" id="employee_job_title" name="employee_job_title">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_department" class="form-label">Department</label>
                                                    <select class="form-select" id="employee_department" name="employee_department">
                                                        <option value="" selected disabled>Choose...</option>
                                                        @foreach($company_departments as $department)
                                                            <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="taggable-container " id="manager-tag-input-2">
                                                        <label for="manager" class="form-label fw-bold">Manager</label>
                                                        <div class="manager-tag-input-2 manager-tag-input border-primary bg-light">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_hire_date" class="form-label">Hire Date</label>
                                                    <input type="date" class="form-control" id="employee_hire_date" name="employee_hire_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="employee_status" class="form-label">Status</label>
                                                    <select class="form-select" id="employee_status" name="employee_status">
                                                        <option value="active" selected>Active</option>
                                                        <option value="inactive">Inactive</option>
                                                        <option value="on_leave">On Leave</option>
                                                        <option value="terminated">Terminated</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="employee_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="employee_address" name="employee_address">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="employee_city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="employee_city" name="employee_city">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="employee_state" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="employee_state" name="employee_state">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="employee_zip" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="employee_zip" name="employee_zip">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="employee_country" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="employee_country" name="employee_country">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="employee_emergency_contact" class="form-label">Emergency Contact</label>
                                                    <input type="text" class="form-control" id="employee_emergency_contact" name="employee_emergency_contact">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="employee_emergency_phone" class="form-label">Emergency Phone</label>
                                                    <input type="text" class="form-control" id="employee_emergency_phone" name="employee_emergency_phone">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="employee_profile_picture" class="form-label">Profile Picture</label>
                                                    <input type="file" class="form-control" id="employee_profile_picture" name="employee_profile_picture" accept="image/*">
                                                </div>
                                                <div class="col-12 mt-2 text-end">
                                                    <button type="submit" class="btn btn-primary btn-sm">Add Employee</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-employees">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Attendance Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="attendanceHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#attendanceCollapse" aria-expanded="false" aria-controls="attendanceCollapse">
                                    Attendance Management
                                </button>
                            </h2>
                            <div id="attendanceCollapse" class="accordion-collapse collapse" aria-labelledby="attendanceHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="attendance-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="attendance_employee" class="form-label">Employee</label>
                                                <select class="form-select" id="attendance_employee" name="attendance_employee">
                                                    <option value="" selected disabled>Choose...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="attendance_date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="attendance_status" class="form-label">Status</label>
                                                <select class="form-select" id="attendance_status" name="attendance_status">
                                                    <option value="present">Present</option>
                                                    <option value="absent">Absent</option>
                                                    <option value="leave">On Leave</option>
                                                </select>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Mark Attendance</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-attendance">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Payroll Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="payrollHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#payrollCollapse" aria-expanded="false" aria-controls="payrollCollapse">
                                    Payroll Management
                                </button>
                            </h2>
                            <div id="payrollCollapse" class="accordion-collapse collapse" aria-labelledby="payrollHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="payroll-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="payroll_employee" class="form-label">Employee</label>
                                                <select class="form-select" id="payroll_employee" name="payroll_employee">
                                                    <option value="" selected disabled>Choose...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="payroll_month" class="form-label">Month</label>
                                                <input type="month" class="form-control" id="payroll_month" name="payroll_month" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="payroll_amount" class="form-label">Amount</label>
                                                <input type="number" class="form-control" id="payroll_amount" name="payroll_amount" min="0" required>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Process Payroll</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-payroll">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Month</th>
                                                    <th>Amount</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Recruitment Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="recruitmentHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#recruitmentCollapse" aria-expanded="false" aria-controls="recruitmentCollapse">
                                    Recruitment Management
                                </button>
                            </h2>
                            <div id="recruitmentCollapse" class="accordion-collapse collapse" aria-labelledby="recruitmentHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="recruitment-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="candidate_name" class="form-label">Candidate Name</label>
                                                <input type="text" class="form-control" id="candidate_name" name="candidate_name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="candidate_position" class="form-label">Position</label>
                                                <input type="text" class="form-control" id="candidate_position" name="candidate_position" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="candidate_status" class="form-label">Status</label>
                                                <select class="form-select" id="candidate_status" name="candidate_status">
                                                    <option value="applied">Applied</option>
                                                    <option value="interview">Interview</option>
                                                    <option value="hired">Hired</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Add Candidate</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-recruitment">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Leave Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="leaveHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#leaveCollapse" aria-expanded="false" aria-controls="leaveCollapse">
                                    Leave Management
                                </button>
                            </h2>
                            <div id="leaveCollapse" class="accordion-collapse collapse" aria-labelledby="leaveHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="leave-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="leave_employee" class="form-label">Employee</label>
                                                <select class="form-select" id="leave_employee" name="leave_employee">
                                                    <option value="" selected disabled>Choose...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="leave_type" class="form-label">Leave Type</label>
                                                <select class="form-select" id="leave_type" name="leave_type">
                                                    <option value="annual">Annual</option>
                                                    <option value="sick">Sick</option>
                                                    <option value="casual">Casual</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="leave_dates" class="form-label">Dates</label>
                                                <input type="text" class="form-control" id="leave_dates" name="leave_dates" placeholder="e.g. 2024-06-01 to 2024-06-10">
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Apply Leave</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-leave">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Type</th>
                                                    <th>Dates</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Performance Review -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="performanceHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#performanceCollapse" aria-expanded="false" aria-controls="performanceCollapse">
                                    Performance Review
                                </button>
                            </h2>
                            <div id="performanceCollapse" class="accordion-collapse collapse" aria-labelledby="performanceHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="performance-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="review_employee" class="form-label">Employee</label>
                                                <select class="form-select" id="review_employee" name="review_employee">
                                                    <option value="" selected disabled>Choose...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="review_period" class="form-label">Review Period</label>
                                                <input type="text" class="form-control" id="review_period" name="review_period" placeholder="e.g. Q1 2024">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="review_score" class="form-label">Score</label>
                                                <input type="number" class="form-control" id="review_score" name="review_score" min="0" max="100">
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-performance">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Period</th>
                                                    <th>Score</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- User Roles Management -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="rolesHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#rolesCollapse" aria-expanded="false" aria-controls="rolesCollapse">
                                    User Roles Management
                                </button>
                            </h2>
                            <div id="rolesCollapse" class="accordion-collapse collapse" aria-labelledby="rolesHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="role-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <label for="role_name" class="form-label">Role Name</label>
                                                <input type="text" class="form-control" id="role_name" name="role_name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="role_description" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="role_description" name="role_description">
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Add Role</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-roles">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Training & Development -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="trainingHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#trainingCollapse" aria-expanded="false" aria-controls="trainingCollapse">
                                    Training & Development
                                </button>
                            </h2>
                            <div id="trainingCollapse" class="accordion-collapse collapse" aria-labelledby="trainingHeading">
                                <div class="accordion-body">
                                    <form action="" method="post" id="training-form">
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label for="training_title" class="form-label">Training Title</label>
                                                <input type="text" class="form-control" id="training_title" name="training_title" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="training_date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="training_date" name="training_date" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="training_employees" class="form-label">Employees</label>
                                                <select class="form-select" id="training_employees" name="training_employees[]" multiple>
                                                </select>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="submit" class="btn btn-primary btn-sm">Add Training</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped mb-0" id="tbl-training">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th>Employees</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End HRMS Tab -->
                <!-- Inventory Management -->
                <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                    <h3>Inventory Management</h3>
                    <div class="accordion my-3" id="inventoryAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="waterHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#waterCollapse" aria-expanded="false" aria-controls="waterCollapse">
                                    Water Inventory
                                </button>
                            </h2>
                            <div id="waterCollapse" class="accordion-collapse collapse" aria-labelledby="waterHeading">
                                <div class="accordion-body">
                                    <!-- Water inventory -->
                                    <!-- water inventory -->
                                    <div class="card shadow-sm">
                                        <div class="card-body py-3">
                                            <form action="" method="post">
                                                <input type="hidden" class="form-control" name="company_id"
                                                    value="{{ $company->company_id }}">
                                                <div class="row g-2">
                                                    @foreach($waterQuestions as $question)
                                                    <!-- question  -->
                                                    <div class="col-md-6">
                                                        <!-- form check -->
                                                        <div class="form-check">
                                                            <input class="form-check-input"
                                                                onchange="ChangeQuestionResult(this, '{{$company->company_id}}', `{{ $question->questionId }}`)"
                                                                type="checkbox" value="{{ $question->questionId }}"
                                                                name="{{ $question->label }}"
                                                                id="flexCheckIndeterminate_{{ $question->questionId }}"
                                                                {{(in_array($question->questionId,
                                                            array_column($CompanyWaterQuestions->toArray(),
                                                            'questionID')))? "checked": ""}}
                                                            >
                                                            <label class="form-check-label"
                                                                for="flexCheckIndeterminate">
                                                                {{ $question->question }}
                                                            </label>
                                                        </div>
                                                        <!-- form check -->
                                                    </div>
                                                    <!-- question ends -->
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <input type="hidden" class="form-control" name="company_id"
                                                    value="{{ $company->company_id }}">
                                                <label for="">Indicate the water conservations opportunity that is
                                                    applicable or
                                                    beneficial to your process</label>
                                                <div class="row g-2 mt-2">
                                                    @foreach($WaterConservationMethod as $method)
                                                    <!-- question  -->
                                                    <div class="col-md-6">
                                                        <!-- form check -->
                                                        <div class="form-check">
                                                            <input class="form-check-input"
                                                                onchange="ChangeWaterConservationOpportunity(this, '{{$company->company_id}}', `{{ $method->WaterConservationMethodId }}`)"
                                                                type="checkbox"
                                                                value="{{ $method->WaterConservationMethodId }}"
                                                                name="{{ $method->label }}"
                                                                id="flexCheckIndeterminate_{{ $method->WaterConservationMethodId }}"
                                                                {{(in_array($method->WaterConservationMethodId,
                                                            array_column($companyWaterConservationMethod->toArray(),
                                                            'waterConservationMethod_id')))? "checked": ""}}
                                                            >
                                                            <label class="form-check-label"
                                                                for="flexCheckIndeterminate">
                                                                {{ $method->method }}
                                                            </label>
                                                        </div>
                                                        <!-- form check -->
                                                    </div>
                                                    <!-- question ends -->
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <input type="hidden" class="form-control" name="company_id"
                                                    value="{{ $company->company_id }}">
                                                <label for="">Select the water source used in your
                                                    Organization</label>
                                                <div class="row g-2 mt-2">
                                                    @foreach($WaterSources as $sources)
                                                    <!-- question  -->
                                                    <div class="col-md-6">
                                                        <!-- form check -->
                                                        <div class="form-check">
                                                            <input class="form-check-input"
                                                                onchange="ChangeWaterSources(this, '{{$company->company_id}}', `{{ $sources->WaterSourcesId }}`)"
                                                                type="checkbox" value="{{ $sources->WaterSourcesId }}"
                                                                name="{{ $sources->label }}"
                                                                id="flexCheckIndeterminate_{{ $sources->WaterSourcesId }}"
                                                                {{(in_array($sources->WaterSourcesId,
                                                            array_column($companyWaterSources->toArray(),
                                                            'WaterSources_id')))? "checked": ""}}
                                                            >
                                                            <label class="form-check-label"
                                                                for="flexCheckIndeterminate">
                                                                {{ $sources->sources }}
                                                            </label>
                                                        </div>
                                                        <!-- form check -->
                                                    </div>
                                                    <!-- question ends -->
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Water Sources Details -->
                                   <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Water Sources Information</h4>
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>

    <div class="card-body pt-3">
        <form action="" method="post" id="waterSourceForm"> <!-- Moved ID here -->
            <input type="hidden" name="company_id" value="{{ $company->company_id }}">

            <div class="row g-3">
                <!-- Water Source -->
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="water_source" class="form-label">Select Water Source</label>
                        <select name="water_source" id="water_source" class="form-select">
                            <option value="" selected disabled>Choose...</option>
                            @foreach($companyWaterSources as $source)
                                <option value="{{ $source->waterSource->WaterSourcesId }}">{{ $source->waterSource->sources }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Location -->
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" class="form-control" name="location" placeholder="Enter location">
                    </div>
                </div>

                <!-- Capacity of Water -->
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="capacity" class="form-label">Water Capacity (Liters)</label>
                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            <input type="number" class="form-control" min="0" name="capacity" value="0">
                            <button class="btn btn-outline-primary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="col-12 mt-3 text-end">
                    <button type="submit" class="btn btn-primary" id="btn-submit-water-source">Save Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

                                    <!-- Water Sources Management Table -->
                                    <div class="card shadow-sm mt-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">Water Sources Management</h4>
                                            <a href="#" class="btn btn-primary btn-sm" id="add-water-source-trigger">Add Water Source</a>
                                        </div> <!-- end card-header -->

                                        <div class="card-body pt-3">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="tbl-water-sources-management">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Water Source</th>
                                                            <th>Location</th>
                                                            <th>Capacity (Liters)</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                @foreach($companyWaterSources as $source)
                                                <tr>
                                                    <td>{{ $source->waterSource->sources }}</td>
                                                    <td>{{ $source->location }}</td>
                                                    <td>{{ $source->capacity }}</td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                                            <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                    </tbody>
                                                </table><!--end /table-->
                                            </div><!--end /tableresponsive-->
                                        </div> <!-- end card-body -->
                                    </div>
                                    <!-- End Water Sources Management Table -->

                                    <!-- Water Check-In Card -->
                                    <div class="card shadow-sm border-0 d-none" style="background-color: #e0f7fa;" id="water-checkin-card"> <!-- Light cyan background for water check-in -->
                                        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center"> <!-- Info color for water check-in header -->
                                            <h4 class="card-title mb-0">Water Check-In</h4>
                                            <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body pt-3" id="waterCheckinForm">
                                            <form action="" method="post" id="water-checkin-form">
                                            <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                                            <div class="row g-3">
                                                <!-- Water Source -->
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="water_source" class="form-label">Water Source</label>
                                                        <select name="water_source" id="water_source" class="form-select">
                                                            <option value="" selected disabled>Choose...</option>
                                                            @foreach($companyWaterSources as $source)
                                                                <option value="{{ $source->CompanyWaterSourcesID }}">{{ $source->waterSource->sources }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Volume -->
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="volume" class="form-label">Volume of Water in Litres</label>
                                                        <input type="number" class="form-control" min="0" name="volume" value="0" placeholder="Enter volume">
                                                    </div>
                                                </div>
                                                <!-- Calendar Year -->
                                                <div class="col-md-4">
                                                    <label for="calendar_year" class="form-label">Calendar Year</label>
                                                    <select class="form-select calendar-year" id="calendar_year" name="calendar_year" required>
                                                        <option value="" selected disabled>Select Calendar Year</option>
                                                    </select>
                                                </div>
                                                <!-- Date -->
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="date" class="form-label">Date</label>
                                                        <input type="date" class="form-control" name="date">
                                                    </div>
                                                </div>
                                                <!-- Remark -->
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="remark" class="form-label">Remark</label>
                                                        <input type="text" class="form-control" name="remark" placeholder="Enter remark">
                                                    </div>
                                                </div>
                                                <!-- Save Button -->
                                                <div class="col-12 text-end mt-3">
                                                    <button type="submit" class="btn btn-info" id="btn-submit-water-checkin">Check-In</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Water Check-In Card -->
                                    <div class="row">
                                        <!-- Water Usage Logs Card -->
                                        <div class="col-md-6 d-none" id="water-usage-logs-card">
                                            <div class="card shadow-sm border-0" style="background-color: #f0f8ff;"> <!-- Light blue background for water usage -->
                                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title mb-0">Water Usage Logs</h4>
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                                </div> <!-- end card-header -->

                                                <div class="card-body pt-3" id="waterUsageLogsForm">
                                                    <form action="" method="post" id="water-usage-form">
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    <div class="row g-3">
                                                        <!-- Quantity Used -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="quantity_used" class="form-label">Volume Used (in Litres)</label>
                                                                <input type="number" class="form-control" min="0" name="volume_used" id="quantity_used" placeholder="Enter quantity used">
                                                            </div>
                                                        </div>
                                                        <!-- Calendar Year -->
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Calendar Year</label>
                                                                <select class="form-select" id="calendar_year" name="calendar_year" required>
                                                                    <option value="" selected disabled>Select Calendar Year</option>
                                                                    @foreach($calendar_years as $calendar)
                                                                        <option value="{{ $calendar->calendar_year_id }}">{{ $calendar->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                         </div>
                                                        <!-- Date -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="date" class="form-label">Date</label>
                                                                <input type="date" class="form-control" name="date" id="date">
                                                            </div>
                                                        </div>
                                                        <!-- Purpose -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="purpose" class="form-label">Purpose</label>
                                                                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Enter purpose of water usage">
                                                            </div>
                                                        </div>
                                                        <!-- Save Button -->
                                                        <div class="col-12 text-end mt-3">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div> <!-- end card-body -->
                                            </div>
                                        </div>
                                        <!-- End Water Usage Logs Card -->

                                        <!-- Water Recycling Logs Card -->
                                        <div class="col-md-6 d-none" id="water-recycling-logs-card">
                                            <div class="card shadow-sm border-0" style="background-color: #e6ffe6;"> <!-- Light green background for water recycling -->
                                                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title mb-0">Water Recycling Logs</h4>
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                                </div> <!-- end card-header -->
                                                <div class="card-body pt-3" id="waterRecyclingLogsForm">
                                                    <form action="" method="post" id="water-recycling-form">
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    <div class="row g-3">
                                                        <!-- Quantity Recycled -->
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="quantity_recycled" class="form-label">Quantity Recycled</label>
                                                                <input type="number" class="form-control" min="0" name="quantity_recycled" id="quantity_recycled" placeholder="Enter quantity">
                                                            </div>
                                                        </div>
                                                        <!-- Calendar Year -->
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="calendar_year" class="form-label">Calendar Year</label>
                                                                <select class="form-select" id="calendar_year" name="calendar_year" required>
                                                                    <option value="" selected disabled>Select Calendar Year</option>
                                                                    @foreach($calendar_years as $calendar)
                                                                        <option value="{{ $calendar->calendar_year_id }}">{{ $calendar->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Recycling Date -->
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="recycling_date" class="form-label">Recycling Date</label>
                                                                <input type="date" class="form-control" name="recycling_date" id="recycling_date">
                                                            </div>
                                                        </div>
                                                        <!-- Method -->
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="method" class="form-label">Recycling Method</label>
                                                                <input type="text" class="form-control" name="method" id="method" placeholder="Enter recycling method">
                                                            </div>
                                                        </div>
                                                        <!-- Remark -->
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="remark" class="form-label">Remark</label>
                                                                <input type="text" class="form-control" name="remark" id="remark" placeholder="Enter your remark here">
                                                            </div>
                                                        </div>
                                                        <!-- Save Button -->
                                                        <div class="col-12 text-end mt-3">
                                                            <button type="submit" class="btn btn-success">Save Recycling Log</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div> <!-- end card-body -->
                                            </div>
                                        </div>
                                        <!-- End Water Recycling Logs Card -->
                                    </div>

                                    <!-- Water Management Table -->
                                    <div class="card shadow-sm mt-4">
                                        <div class="card-header ">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="card-title mb-0">Water Management Records</h4>
                                                <div class="">
                                                    <div class="btn-group d-flex flex-wrap" role="group" aria-label="Water Management Actions">
                                                        <a href="#water-checkin-form" id="water-checkin-trigger" class="btn btn-primary btn-sm flex-fill mb-2">
                                                            <i class="iconoir-plus"></i> Check In
                                                        </a>
                                                        <a href="#waterUsageLogsForm" id="water-usage-log-trigger" class="btn btn-secondary btn-sm flex-fill mb-2">
                                                            <i class="iconoir-plus"></i> Usage Log
                                                        </a>
                                                        <a href="#waterRecyclingLogsForm" id="water-recycling-log-trigger" class="btn btn-success btn-sm flex-fill mb-2">
                                                            <i class="iconoir-plus"></i> Recycling Log
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!--end row-->
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="tbl-water-management">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Movement Type</th>
                                                            <th>Water Source</th>
                                                            <th>Volume (Litres)</th>
                                                            <th>Calendar Year</th>
                                                            <th>Date</th>
                                                            <th>Remark</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($water_stock_movements->isEmpty())
                                                            <tr>
                                                                <td colspan="7" class="text-center">No records found.</td>
                                                            </tr>
                                                        @endif
                                                    @foreach($water_stock_movements as $record)
                                                        <tr>
                                                            <td class="text-capitalize">{{ $record->movement_type }}
                                                            @if ($record->movement_type == 'in')
                                                                <i class="fas fa-caret-up text-success font-16"></i>
                                                            @elseif ($record->movement_type == 'out')
                                                                <i class="fas fa-caret-down text-danger font-16"></i>
                                                            @elseif ($record->movement_type == 'recycling')
                                                                <i class="fas fa-recycle text-info font-16"></i>
                                                            @elseif ($record->movement_type == 'usage')
                                                                <i class="fas fa-tint text-primary font-16"></i>
                                                            @endif
                                                        </td>
                                                            <td>{{ $record->companyWaterSources->waterSource->sources ?? 'N/A' }}</td>
                                                            <td>{{ $record->volume }}</td>
                                                            <td>{{ $record->calendarYear->name }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($record->movement_date)->format('d M Y') }}</td>
                                                            <td>{{ $record->remark }}</td>
                                                            <td class="text-end">
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-striped mb-0" id="tbl-water-management-records">
                                                    <tbody>
                                                        <tr>
                                                            <td>Water Balance</td>
                                                            <td>Total Water Inflow: {{ $availableWaterInflowBalance }} Liters</td>
                                                            <td>Total Water Outflow: {{ $availableWaterOutflowBalance }} Liters</td>
                                                            <td>Total Water Recycled: {{ $availableWaterRecycleBalance }} Liters</td>
                                                            <td>Total Balance: {{ $availableWaterBalance }} Liters</td>
                                                            <td class="text-end">
                                                                <button class="btn btn-outline-primary btn-sm">View Details</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quality Control Log Form -->
                                    <div class="card shadow-sm border-0 d-none" style="background-color: #fff3cd;" id="quality-control-log-card"> <!-- Light yellow background for quality control -->
                                        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">Quality Control Logs</h4>
                                            <button type="button" class="btn-close" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body pt-0" >
                                            <form action="" method="post" id="qualityControlLogForm">
                                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3">
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="test_date" class="col-form-label">Test Date</label>
                                                            <input type="date" class="form-control" name="test_date" id="test_date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="parameter_tested" class="col-form-label">Parameter Tested</label>
                                                            <input type="text" class="form-control" name="parameter_tested" id="parameter_tested" placeholder="Enter parameter tested" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="ph_level" class="col-form-label">pH Level</label>
                                                            <input type="number" class="form-control" name="ph_level" id="ph_level" step="0.01" placeholder="Enter pH level" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="turbidity" class="col-form-label">Turbidity (NTU)</label>
                                                            <input type="number" class="form-control" name="turbidity" id="turbidity" step="0.01" placeholder="Enter turbidity level" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="contaminants" class="col-form-label">Contaminants</label>
                                                            <input type="text" class="form-control" name="contaminants_detected" id="contaminants" placeholder="Enter contaminants" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="result" class="col-form-label">Result</label>
                                                            <input type="text" class="form-control" name="result" id="result" placeholder="Enter result" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label for="deviation_detected" class="form-label">Deviation Detected</label>
                                                            <textarea class="form-control" id="deviation_detected" name="deviation_detected" rows="3" placeholder="Enter deviation detected"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label for="corrective_action" class="form-label">Corrective Action</label>
                                                            <textarea class="form-control" id="corrective_action" name="corrective_action" rows="3" placeholder="Enter corrective action"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-warning text-dark">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Quality Control Log Form -->

                                    <!-- Quality Control Management Table -->
                                    <div class="card shadow-sm mt-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">Quality Control Management Records</h4>
                                            <button type="button" class="btn btn-warning btn-sm" id="add-quality-control-record">
                                                <i class="iconoir-plus"></i> Add Record
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered mb-0" id="tbl-quality-control-management">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Test Date</th>
                                                            <th>Parameter Tested</th>
                                                            <th>Result</th>
                                                            <th>Deviation Detected</th>
                                                            <th>Corrective Action</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic rows will be appended here -->
                                                        @foreach($water_quality_logs as $quality)
                                                        <tr>
                                                            <td>{{  $quality->test_date}}</td>
                                                            <td>{{ $quality->parameter_tested }}</td>
                                                            <td>{{ $quality->test_results }}</td>
                                                            <td>{{ $quality->deviation_detected }}</td>
                                                            <td>{{ $quality->corrective_actions }}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-outline-primary btn-sm me-2" onclick="editQualityControlLog({{ $quality->id }})">Edit</button>
                                                                <button class="btn btn-outline-danger btn-sm" onclick="deleteQualityControlLog({{ $quality->id }})">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Quality Control Management Table -->
                                    <!-- Water inventory -->
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="chemicalHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chemicalCollapse" aria-expanded="false"
                                    aria-controls="chemicalCollapse">
                                    Chemical Inventory
                                </button>
                            </h2>
                            <div id="chemicalCollapse" class="accordion-collapse collapse"
                                aria-labelledby="chemicalHeading">
                                <div class="accordion-body">
                                    <!-- chemical -->
                                    <div class="card shadow-sm border-0 d-none" style="background-color: #e8f5e9;" id="add-chemical-form-card"> <!-- Light green background for form -->
                                        <div class="card-header bg-success text-white"> <!-- Green header for form -->
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title mb-0">Add New Chemical</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3">
                                            <form action="" method="post" id="chemical-form" class="">
                                                <input type="hidden" class="form-control" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3 align-items-end">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="chemical" class="form-label fw-bold">Chemical</label>
                                                            <select name="chemical" id="chemical" class="form-select border-primary">
                                                                <option value="" selected disabled>Choose...</option>
                                                                @foreach($approved_chemicals as $chemical)
                                                                <option value="{{ $chemical->chemical_id }}">{{ $chemical->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="unit_of_measurement" class="form-label fw-bold">Unit of Measurement</label>
                                                            <input type="text" class="form-control border-primary" name="unit_of_measurement" placeholder="Unit of Measurement">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="threshold" class="form-label fw-bold">Threshold</label>
                                                            <input type="number" class="form-control border-primary" name="threshold" placeholder="Minimum Stock Threshold" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-success px-4 py-2" id="btn-submit-chemical">
                                                            <i class="las la-save"></i> Save
                                                            <span class="loader" id="loader"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow-sm border-0 mt-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">
                                                Chemical Inventory Management
                                            </h4>
                                            <button type="button" class="btn btn-primary btn-sm" id="add-chemical-button">
                                                <i class="iconoir-plus"></i> Add Chemical
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="tbl-company-chemical">
                                                <table class="table table-hover table-striped mb-0 " id="datatable_1">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Chemical</th>
                                                            <th scope="col">Unit of Measurement</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col" class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @forelse($company_chemicals as $chemical)
                                                        <tr>
                                                            <td class="align-middle">
                                                                <strong>{{ $chemical->chemical->name }}</strong> 
                                                                <small>({!! $chemical->chemical->formula !!})</small>
                                                            </td>
                                                            <td class="align-middle">{{ $chemical->unit }}</td>
                                                            <td class="align-middle">
                                                                <span class="badge rounded-pill" style="background-color: 
                                                                    {{ $chemical->status == 'active' ? '#28a745' : ($chemical->status == 'inactive' ? '#dc3545' : '#ffc107') }}; color: white;">
                                                                    {{ ucfirst($chemical->status) }}
                                                                </span>
                                                            </td>
                                                            <td class="align-middle text-end">
                                                                <div class="dropdown">
                                                                    <a class="dropdown-toggle text-muted" href="#" role="button" id="chemicalActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="las la-ellipsis-v fs-20"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chemicalActionsDropdown">
                                                                        <li>
                                                                            <a class="dropdown-item text-primary" href="{{ route('admin.view-chemical', ['chemical' => $chemical->company_chemical_id]) }}">
                                                                                <i class="las la-eye"></i> View Details
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-warning" href="#">
                                                                                <i class="las la-edit"></i> Update Chemical
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="las la-trash"></i> Delete Chemical
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider">
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-info" href="#">
                                                                                <i class="las la-dollar-sign"></i> Setup Price
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-success" href="#" onclick='triggerCheckInChemical("{{ $chemical->company_chemical_id }}", "{{ $chemical->chemical_id }}", "{{ $chemical->company_id }}", "{{ $chemical->chemical->name }}")'>
                                                                                <i class="las la-arrow-circle-down"></i> Check In
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-danger" href="#" onclick='triggerCheckOutChemical("{{ $chemical->company_chemical_id }}", "{{ $chemical->chemical_id }}", "{{ $chemical->company_id }}", "{{ $chemical->chemical->name }}")'>
                                                                                <i class="las la-arrow-circle-up"></i> Check Out
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-secondary" href="#">
                                                                                <i class="las la-tools"></i> Make Adjustment
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center text-muted">No chemicals found in the inventory.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- chemical -->
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="materialHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#materialCollapse" aria-expanded="false"
                                    aria-controls="materialCollapse">
                                    Material Inventory
                                </button>
                            </h2>
                            <div id="materialCollapse" class="accordion-collapse collapse"
                                aria-labelledby="materialHeading">
                                <div class="accordion-body">
                                    <!-- Material Inventory -->
                                    <div class="card shadow-sm border-0 d-none" style="background-color: #f0f8ff;" id="add-material-form-card"> <!-- Light blue background for material section -->
                                        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center"> <!-- Info color for material header -->
                                            <h4 class="card-title mb-0">Material Registration</h4>
                                            <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <input type="hidden" class="form-control" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3">
                                                    <!-- Material -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="material" class="form-label">Material</label>
                                                            <select name="material" id="material" class="form-select">
                                                                <option value="" selected disabled>Choose...</option>
                                                                @foreach($materials as $material)
                                                                <option value="{{ $material->materialID }}">{{ $material->material }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Serial Number -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="serial_number" class="form-label">Serial Number (If any)</label>
                                                            <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Serial Number">
                                                        </div>
                                                    </div>
                                                    <!-- Unit of Measurement -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="unit_of_measurement" class="form-label">Unit of Measurement</label>
                                                            <input type="text" class="form-control" id="unit_of_measurement" name="unit_of_measurement" placeholder="Unit of Measurement">
                                                        </div>
                                                    </div>
                                                    <!-- Threshold -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="threshold" class="form-label">Threshold</label>
                                                            <input type="number" class="form-control" id="threshold" name="threshold" placeholder="Minimum Stock Threshold" min="0">
                                                        </div>
                                                    </div>
                                                    <!-- Save Button -->
                                                    <div class="col-12 mt-3 text-end">
                                                        <button type="button" class="btn btn-info px-4 py-2" id="btn-submit-material">
                                                            <i class="las la-save"></i> Save
                                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="spinner"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title">Material Inventory Management</h4>
                                                </div><!--end col-->
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-primary btn-sm" id="add-material-button">
                                                        <i class="iconoir-plus"></i> Add Material
                                                    </button>
                                                </div><!--end col-auto-->
                                            </div> <!--end row-->
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="tbl-company-material">
                                                <table class="table table-hover table-striped mb-0" id="datatable_2">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Unit of Measurement</th>
                                                            <th scope="col">Material Status</th>
                                                            <th scope="col" class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($companyMaterials as $material)
                                                        <tr>
                                                            <td class="align-middle">{{ $material->material }}</td>
                                                            <td class="align-middle">{{ $material->serial_number }}</td>
                                                            <td class="align-middle">{{ $material->unit_of_measure }}</td>
                                                            <td class="align-middle">
                                                                <span class="badge rounded-pill" style="background-color: 
                                                                    {{ $material->company_material_status == 'active' ? '#28a745' : '#dc3545' }}; color: white;">
                                                                    {{ ucfirst($material->company_material_status) }}
                                                                </span>
                                                            </td>
                                                            <td class="align-middle text-end">
                                                                <div class="dropdown">
                                                                    <a class="dropdown-toggle text-muted" href="#" role="button" id="materialActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="las la-ellipsis-v fs-20"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="materialActionsDropdown">
                                                                        <li>
                                                                            <a class="dropdown-item text-primary" href="{{ route('admin.view-material', ['material'=> $material->companyMaterialId]) }}">
                                                                                <i class="las la-eye"></i> View Details
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-warning" href="#">
                                                                                <i class="las la-edit"></i> Update Material
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="las la-trash"></i> Delete Material
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <hr class="dropdown-divider">
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-info" href="#" onclick='triggerMaterialPrice("{{ $material->companyMaterialId }}")'>
                                                                                <i class="las la-dollar-sign"></i> Setup Price
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-success" href="#" onclick='triggerCheckIn("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>
                                                                                <i class="las la-arrow-circle-down"></i> Check In
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-danger" href="#" onclick='triggerCheckOut("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>
                                                                                <i class="las la-arrow-circle-up"></i> Check Out
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-secondary" href="#" onclick='triggerAdjustment("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>
                                                                                <i class="las la-tools"></i> Make Adjustment
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center text-muted">No materials found in the inventory.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Material Inventory -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Operations Management -->
                <div class="tab-pane p-3" id="operations" role="tabpanel">
                    <div class="accordion" id="operationsAccordion">
                        <!-- Company Workflow Management Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="workflowManagementHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#workflowManagementCollapse" aria-expanded="false"
                                    aria-controls="workflowManagementCollapse">
                                    <i class="las la-project-diagram me-2" style="font-size: 1.5rem;"></i> Organization Workflow Management
                                </button>
                            </h2>
                            <div id="workflowManagementCollapse" class="accordion-collapse collapse"
                                aria-labelledby="workflowManagementHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Workflow Management Form -->
                                    <form action="" id="workflow-management-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="workflow_name" class="form-label">Workflow Name</label>
                                                <input type="text" class="form-control" id="workflow_name" name="workflow_name" placeholder="Enter workflow name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="workflow_description" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="workflow_description" name="workflow_description" placeholder="Enter description">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="workflow_status" class="form-label">Status</label>
                                                <select class="form-select" id="workflow_status" name="workflow_status" required>
                                                    <option value="" selected disabled>Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="archived">Archived</option>
                                                </select>
                                            </div>
                                            <div class="col-12 text-end mt-3">
                                                <button type="submit" class="btn btn-primary">Save Workflow</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Workflow Management Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0 w-100" id="tbl-workflow-management">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Workflow Name</th>
                                                    <th>Description</th>
                                                    <th>Owner</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="operationTypeHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#operationTypeCollapse" aria-expanded="false"
                                aria-controls="operationTypeCollapse">
                                <i class="las la-cogs me-2" style="font-size: 1.5rem;"></i> Operation Type Management
                            </button>
                        </h2>
                        <div id="operationTypeCollapse" class="accordion-collapse collapse"
                            aria-labelledby="operationTypeHeading" data-bs-parent="#operationsAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 closeable-card d-none" id="operation-type-card">
                                        <div class="card shadow-sm border-0" style="background-color: #e3f2fd;"> <!-- Light blue background for the card -->
                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-0">New Operation Type Setup</h4>
                                                <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.closeable-card').classList.add('d-none');"></button>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="company_operation_type_form" class="pt-2">
                                                    @csrf
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label fw-bold text-primary">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter operation type name" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="sequence" class="form-label fw-bold text-primary">Sequence</label>
                                                            <input type="number" class="form-control" id="sequence" name="sequence_order" placeholder="Enter sequence order">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="description" class="form-label fw-bold text-primary">Description</label>
                                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-4 text-end">
                                                        <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 closeable-card d-none" id="edit-operation-type-card">
                                        <!-- Edit Operation Type Card -->
                                        <div class="card shadow-sm border-0"  style="background-color: #f8f9fa;"> <!-- Light gray background for the card -->
                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-0">Edit Operation Type</h4>
                                                <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.closeable-card').classList.add('d-none');"></button>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="edit_operation_type_form" class="pt-2">
                                                    @csrf
                                                    <input type="hidden" name="operation_type_id" id="operation_type_id">
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="edit_name" class="form-label fw-bold text-primary">Name</label>
                                                            <input type="text" class="form-control" id="edit_operation_type_name" name="operation_type_name" placeholder="Enter operation type name" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="edit_sequence" class="form-label fw-bold text-primary">Sequence</label>
                                                            <input type="number" class="form-control" id="edit_operation_type_sequence" name="operation_type_sequence_order" placeholder="Enter sequence order">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="edit_description" class="form-label fw-bold text-primary">Description</label>
                                                            <textarea class="form-control" id="edit_operation_type_description" name="operation_type_description" rows="3" placeholder="Enter description"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-4 text-end">
                                                        <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col">
                                                <h4 class="text-primary mb-0">Operation Types</h4>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary btn-sm" id="setup-operation-type">
                                                    <i class="iconoir-plus"></i> Set Up Operation Type
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Spinner -->
                                        <div id="loading-spinner" class="spinner-border text-primary d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered w-100" id="tbl-operation-types">
                                                <thead class="table-primary text-center">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Sequence Order</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div id="message-container" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="operationCategoryHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#operationCategoryCollapse" aria-expanded="false"
                                aria-controls="operationCategoryCollapse">
                                <i class="las la-layer-group me-2" style="font-size: 1.5rem;"></i> Operation Category Management
                            </button>
                        </h2>
                        <div id="operationCategoryCollapse" class="accordion-collapse collapse"
                            aria-labelledby="operationCategoryHeading" data-bs-parent="#operationsAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 closeable-card d-none" id="operation-category-card">
                                        <div class="card shadow-sm border-0" style="background-color: #e3f2fd;"> <!-- Light blue background for operation category -->
                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-0">Add New Operation Category</h4>
                                                <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="operation_category_form" class="pt-2">
                                                    @csrf
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="category_name" class="form-label fw-bold text-primary">Category Name</label>
                                                            <input type="text" class="form-control" id="category_name" name="name" placeholder="Enter category name" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="category_description" class="form-label fw-bold text-primary">Description</label>
                                                            <textarea class="form-control" id="category_description" name="description" rows="3" placeholder="Enter description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 text-end">
                                                        <button type="submit" class="btn btn-primary px-4 py-2">
                                                            <i class="las la-save"></i> Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 closeable-card d-none" id="edit-operation-category-card">
                                        <!-- Edit Operation Category Card -->
                                        <div class="card shadow-sm border-0" style="background-color: #f8f9fa;"> <!-- Light gray background for the card -->
                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-0">Edit Operation Category</h4>
                                                <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.closeable-card').classList.add('d-none');"></button>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="edit_operation_category_form" class="pt-2">
                                                    @csrf
                                                    <input type="hidden" name="operation_category_id" id="operation_category_id">
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="edit_name" class="form-label fw-bold text-primary">Name</label>
                                                            <input type="text" class="form-control" id="edit_operation_category_name" name="operation_category_name" placeholder="Enter category name" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="edit_description" class="form-label fw-bold text-primary">Description</label>
                                                            <textarea class="form-control" id="edit_operation_category_description" name="operation_category_description" rows="3" placeholder="Enter description"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-4 text-end">
                                                        <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col">
                                                <h4 class="text-primary mb-0">Operation Categories</h4>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary btn-sm" id="setup-operation-category">
                                                    <i class="iconoir-plus"></i> Add Operation Category
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Spinner -->
                                        <div id="loading-spinner-category" class="spinner-border text-primary d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered w-100" id="tbl-operation-categories">
                                                <thead class="table-primary text-center">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                            <h2 class="accordion-header" id="operationsLogHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#operationsLogCollapse" aria-expanded="false"
                                    aria-controls="operationsLogCollapse">
                                    <i class="las la-book me-2" style="font-size: 1.5rem;"></i> Operations Log Management
                                </button>
                            </h2>
                            <div id="operationsLogCollapse" class="accordion-collapse collapse"
                                aria-labelledby="operationsLogHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-12 closeable-card d-none" id="operation-log-card">
                                            <div class="card shadow-lg border-0 rounded-3" style="background-color: #e3f2fd;"> <!-- Light blue background for the card -->
                                                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
                                                    <h4 class="card-title mb-0">Operations Management Form</h4>
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.closeable-card').classList.add('d-none');"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="" method="post" id="operations-form">
                                                        @csrf
                                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                        <div class="row g-3 d-flex align-items-end">
                                                            <div class="col-12">
                                                                <h5 class="text-primary border-bottom pb-2">Operation Details</h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="operation_name" class="form-label fw-bold text-primary">Operation Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control border-primary" id="operation_name" name="operation_name" placeholder="Enter operation name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="description" class="form-label fw-bold text-primary">Description</label>
                                                                    <textarea class="form-control border-primary" id="description" name="description" placeholder="Provide a brief description" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="operation_code" class="form-label fw-bold text-primary">Operation Code</label>
                                                                    <input type="text" class="form-control border-primary" id="operation_code" name="operation_code" placeholder="Enter operation code">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="operation_category" class="form-label fw-bold text-primary">Operation Category <span class="text-danger">*</span></label>
                                                                    <select class="form-select border-primary operation-category" id="operation_category" name="operation_category" required>
                                                                        <option value="" selected disabled>Select category</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="operation_type" class="form-label fw-bold text-primary">Operation Type <span class="text-danger">*</span></label>
                                                                    <select class="form-select border-primary operation-type" id="operation_type" name="operation_type" required>
                                                                        <option value="" selected disabled>Select type</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="calendar_year" class="form-label fw-bold text-primary">Calendar Year</label>
                                                                    <select class="form-select border-primary calendar-year" id="calendar_year" name="calendar_year" required>
                                                                        <option value="" selected disabled>Select year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="start_date" class="form-label fw-bold text-primary">Start Date</label>
                                                                    <input type="date" class="form-control border-primary" id="start_date" name="start_date" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="end_date" class="form-label fw-bold text-primary">End Date</label>
                                                                    <input type="date" class="form-control border-primary" id="end_date" name="end_date" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="operation_status" class="form-label fw-bold text-primary">Operation Status</label>
                                                                    <select class="form-select border-primary" id="operation_status" name="operation_status" required>
                                                                        <option value="" selected disabled>Select status</option>
                                                                        <option value="active">Active</option>
                                                                        <option value="inactive">Inactive</option>
                                                                        <option value="completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- Cost Details -->
                                                            <div class="col-12">
                                                                <h5 class="text-primary border-bottom pb-2 mt-4">Cost Details</h5>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="labour_cost" class="form-label fw-bold text-primary">Labour Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="labour_cost" name="labour_cost" placeholder="Enter labour cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="overhead_cost" class="form-label fw-bold text-primary">Overhead Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="overhead_cost" name="overhead_cost" placeholder="Enter overhead cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="maintenance_cost" class="form-label fw-bold text-primary">Maintenance Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="maintenance_cost" name="maintenance_cost" placeholder="Enter maintenance cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="depreciation_cost" class="form-label fw-bold text-primary">Depreciation Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="depreciation_cost" name="depreciation_cost" placeholder="Enter depreciation cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="supervision_cost" class="form-label fw-bold text-primary">Supervision & Administration Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="supervision_cost" name="supervision_cost" placeholder="Enter supervision cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="variable_cost" class="form-label fw-bold text-primary">Variable Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="variable_cost" name="variable_cost" placeholder="Enter variable cost" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="fixed_cost" class="form-label fw-bold text-primary">Fixed Cost</label>
                                                                    <input type="number" class="form-control border-primary" id="fixed_cost" name="fixed_cost" placeholder="Enter fixed cost" min="0">
                                                                </div>
                                                            </div>
                                                            <!-- Materials and Chemicals Section -->
                                                             <div class="row flex-start">
                                                                <div class="col-12">
                                                                    <h5 class="text-primary border-bottom pb-2 mt-4">Materials and Chemicals</h5>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="material-quantity-used-container-operation-log col-md-12">
                                                                        <div class="row g-2 align-items-end mb-3">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="expected_material" class="form-label fw-bold text-primary">Material Needed</label>
                                                                                    <select class="form-select border-primary material-select" id="expected_material" name="material_used[0][material_id]">
                                                                                        <option value="" selected disabled>Select Material</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="expected_quantity" class="form-label fw-bold text-primary">Expected Quantity</label>
                                                                                    <input type="number" class="form-control border-primary" id="expected_quantity" name="material_used[0][quantity]" placeholder="Enter Expected Quantity" min="0">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="unit_quantity" class="form-label fw-bold text-primary">Unit Quantity</label>
                                                                                    <input type="text" class="form-control border-primary" id="unit_quantity" name="material_used[0][unit_quantity]" placeholder="Enter Unit Quantity">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="unit_cost" class="form-label fw-bold text-primary">Unit Cost (₦)</label>
                                                                                    <input type="number" class="form-control border-primary" id="unit_cost" name="material_used[0][unit_cost]" placeholder="Enter Unit Cost" min="0">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 text-start">
                                                                        <button type="button" class="btn btn-outline-primary btn-sm add-more-material-quantity-operation">Add More</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="chemical-quantity-container-operation-log col-md-12">
                                                                        <div class="row g-2 align-items-end mb-3">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="chemical_used" class="form-label fw-bold text-primary">Chemical Needed</label>
                                                                                    <select class="form-select border-primary chemical-select" id="chemical_used" name="chemical_used[0][chemical_id]">
                                                                                        <option value="" selected disabled>Select Chemical</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="chemical_quantity" class="form-label fw-bold text-primary">Quantity</label>
                                                                                    <input type="number" class="form-control border-primary" id="chemical_quantity" name="chemical_used[0][quantity]" placeholder="Enter Quantity Used" min="0">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="unit_quantity" class="form-label fw-bold text-primary">Unit Quantity</label>
                                                                                    <input type="text" class="form-control border-primary" id="unit_quantity" name="chemical_used[0][unit_quantity]" placeholder="Enter Unit Quantity">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="unit_cost" class="form-label fw-bold text-primary">Unit Cost (₦)</label>
                                                                                    <input type="number" class="form-control border-primary" id="unit_cost" name="chemical_used[0][unit_cost]" placeholder="Enter Unit Cost" min="0">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 text-start">
                                                                        <button type="button" class="btn btn-outline-primary btn-sm add-more-chemical-quantity-operation">Add More</button>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                            <!-- Products and Wastes Section -->
                                                             <div class="row flex-start">
                                                             <div class="col-12">
                                                                <h5 class="text-primary border-bottom pb-2 mt-4">Products and Wastes</h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="operation-log-product-quantity-container col-md-12">
                                                                    <div class="row g-2 align-items-end mb-3">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="expected_product" class="form-label fw-bold text-primary">Expected Product</label>
                                                                                <select class="form-select border-primary product-select" id="expected_product" name="product_produced[0][product_id]" required>
                                                                                    <option value="" selected disabled>Select Product</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="expected_quantity_produced_for_goods" class="form-label fw-bold text-primary">Expected Quantity</label>
                                                                                <input type="number" class="form-control border-primary" id="expected_quantity_produced_for_goods" name="product_produced[0][quantity]" placeholder="Enter Expected Quantity Produced" min="0" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-start">
                                                                    <button type="button" class="btn btn-outline-primary btn-sm add-more-operation-log-product-quantity-operation">Add More</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="operation-log-waste-quantity-container col-md-12">
                                                                    <div class="row g-2 align-items-end mb-3">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="expected_waste" class="form-label fw-bold text-primary">Expected Waste</label>
                                                                                <select class="form-select border-primary waste-select" id="expected_waste" name="waste_generated[0][waste_id]">
                                                                                    <option value="" selected disabled>Select Waste</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="expected_quantity" class="form-label fw-bold text-primary">Expected Quantity</label>
                                                                                <input type="number" class="form-control border-primary" id="expected_quantity" name="waste_generated[0][quantity]" placeholder="Enter Expected Quantity" min="0">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-start">
                                                                    <button type="button" class="btn btn-outline-primary btn-sm add-more-operation-log-waste-quantity-operation">Add More</button>
                                                                </div>
                                                            </div>
                                                             </div>
                                                            <!-- Operation Metrics -->
                                                            <div class="col-12">
                                                                <h5 class="text-primary border-bottom pb-2 mt-4">Operation Metrics</h5>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="total_operation_cost" class="form-label fw-bold text-primary">Total Operation Cost (₦)</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">₦</span>
                                                                        <input type="number" class="form-control border-primary" id="total_operation_cost" name="total_operation_cost" placeholder="Enter total operation cost" min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="operation_unit_cost" class="form-label fw-bold text-primary">Operation Unit Cost (₦)</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">₦</span>
                                                                        <input type="number" class="form-control border-primary" id="operation_unit_cost" name="operation_unit_cost" placeholder="Enter operation unit cost" min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="operation_unit_time" class="form-label fw-bold text-primary">Operation Unit Time (e.g., hours, minutes)</label>
                                                                    <input type="text" class="form-control border-primary" id="operation_unit_time" name="operation_unit_time" placeholder="Enter operation unit time (e.g., hours, minutes)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="expected_water_usage_per_operation" class="form-label fw-bold text-primary">Expected Water Usage Per Operation (Liters)</label>
                                                                    <input type="number" class="form-control border-primary" id="expected_water_usage_per_operation" name="expected_water_usage_per_operation" placeholder="Enter expected water usage per operation" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4 text-end">
                                                                <button type="submit" class="btn btn-primary px-4 py-2">Save Operation</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col">
                                                    <h4 class="text-primary mb-0">Operations Log Overview</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-setup-operation-log">
                                                        <i class="iconoir-plus"></i> Add Operation Log
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1050;"></div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-hover table-bordered w-100" id="tbl-operations-log">
                                                    <thead class="table-primary text-center">
                                                        <tr>
                                                            <th scope="col" class="col-width-20">Operation Name</th>
                                                            <th scope="col" class="col-width-10">Operation Code</th>
                                                            <th scope="col" class="col-width-15">Operation Type</th>
                                                            <th scope="col" class="col-width-15">Operation Category</th>
                                                            <th scope="col" class="col-width-10">Operation Unit Cost</th>
                                                            <th scope="col" class="col-width-15">Calendar Year</th>
                                                            <th scope="col" class="col-width-15">Start Date</th>
                                                            <th scope="col" class="col-width-15">End Date</th>
                                                            <th scope="col" class="col-width-10">Operation Status</th>
                                                            <th scope="col" class="text-end col-width-10">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic rows will go here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="annualOperationsLogHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#annualOperationsLogCollapse" aria-expanded="false"
                                    aria-controls="annualOperationsLogCollapse">
                                    <i class="las la-calendar-alt me-3" style="font-size: 1.5rem;"></i> Annual Operations Log Overview
                                </button>
                            </h2>
                            <div id="annualOperationsLogCollapse" class="accordion-collapse collapse"
                                aria-labelledby="annualOperationsLogHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Annual Operations Log Form -->
                                    <div class="card shadow-sm border-0" style="background-color: #f5f5dc;" id="annual-operations-log-card">
                                        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">Annual Operations Metadata</h4>
                                            <button type="button" class="btn-close btn-close-white" aria-label="Close"
                                                onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" id="annual-operations-log-form">
                                                @csrf
                                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="operation_name" class="form-label">Operation Name</label>
                                                        <input type="text" name="operation_name" class="form-control" placeholder="Enter operation name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="calendar_year" class="form-label">Calendar Year</label>
                                                        <select class="form-select calendar-year" name="calendar_year" required>
                                                            <option value="" selected disabled>Select Calendar Year</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="operations_per_year" class="form-label">Expected Operations Per Year</label>
                                                        <input type="number" class="form-control" name="operations_per_year" min="0" placeholder="Enter expected operations">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="taggable-container" id="manager-tag-input-4">
                                                            <label for="preparedBy" class="form-label fw-bold">Prepared By</label>
                                                            <div class="manager-tag-input-4 manager-tag-input"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" name="status" required>
                                                            <option value="" selected disabled>Select Status</option>
                                                            <option value="Draft">Draft</option>
                                                            <option value="Published">Publish</option>
                                                            <option value="Archived">Archived</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 text-end mt-3">
                                                        <button type="submit" class="btn btn-secondary">Save Annual Operation Log</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Annual Operations Log Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0 w-100" id="tbl-annual-operations-metadata-log">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Operation Name</th>
                                                    <th>Calendar Year</th>
                                                    <th>Expected Operations per Year</th>
                                                    <th>Prepared By</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="equipmentTypeHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#equipmentTypeCollapse" aria-expanded="false"
                                    aria-controls="equipmentTypeCollapse">
                                    <i class="las la-tools me-2"></i> Equipment Types
                                </button>
                            </h2>
                            <div id="equipmentTypeCollapse" class="accordion-collapse collapse"
                                aria-labelledby="equipmentTypeHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Equipment Type Form -->
                                    <form action="" method="post" id="equipment_type_form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_type_name" class="form-label">Equipment Type
                                                        Name</label>
                                                    <input type="text" class="form-control" id="equipment_type_name"
                                                        name="equipment_type_name"
                                                        placeholder="Enter equipment type name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_type_description"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" id="equipment_type_description"
                                                        name="equipment_type_description"
                                                        placeholder="Enter description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Add Equipment
                                                    Type</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Equipment Type Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-equipment-types">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Equipment Type Name</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($active_equipment_types as $type)
                                                <tr>
                                                    <td>{{ $type->name }}</td>
                                                    <td>{{ $type->description }}</td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="industrialEquipmentLogHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#industrialEquipmentLogCollapse" aria-expanded="false"
                                    aria-controls="industrialEquipmentLogCollapse">
                                    <i class="las la-industry me-2"></i> Industrial Equipment Log
                                </button>
                            </h2>
                            <div id="industrialEquipmentLogCollapse" class="accordion-collapse collapse"
                                aria-labelledby="industrialEquipmentLogHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Industrial Equipment Log Form -->
                                    <form action="" method="post" id="industrial-equipment-log-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_name" class="form-label">Equipment Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="equipment_name"
                                                        name="equipment_name" placeholder="Enter equipment name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="equipment_code" class="form-label">Equipment Code <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="equipment_code" name="equipment_code" placeholder="Enter equipment code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="equipment_type" class="form-label">Equipment Type <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="equipment_type"
                                                        name="equipment_type" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        @foreach($active_equipment_types as $type)
                                                        <option value="{{ $type->equipment_type_id }}">{{ $type->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_model" class="form-label">Model</label>
                                                    <input type="text" class="form-control" id="equipment_model" name="equipment_model" placeholder="Enter equipment model">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_serial_number" class="form-label">Serial Number</label>
                                                    <input type="text" class="form-control" id="equipment_serial_number" name="equipment_serial_number" placeholder="Enter serial number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_brand" class="form-label">Equipment Brand</label>
                                                    <input type="text" class="form-control" id="equipment_brand" name="equipment_brand" placeholder="Enter brand">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_capacity" class="form-label">Capacity</label>
                                                    <input type="text" class="form-control" id="equipment_capacity"
                                                        name="equipment_capacity" placeholder="Enter equipment capacity">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_location" class="form-label">Location <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="equipment_location" name="equipment_location" placeholder="Enter equipment location" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_condition" class="form-label">Condition</label>
                                                    <select class="form-select" id="equipment_condition"
                                                        name="equipment_condition">
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="New">New</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Fair">Fair</option>
                                                        <option value="Poor">Poor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="equipment_status" class="form-label">Equipment Status <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="equipment_status"
                                                        name="equipment_status" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Operational">Operational</option>
                                                        <option value="Under Maintenance">Under Maintenance</option>
                                                        <option value="Out of Service">Out of Service</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="purchase_date" class="form-label">Purchase Date <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="purchase_date"
                                                        name="purchase_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Add Equipment</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Industrial Equipment Log Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-equipment-logs">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Equipment Name</th>
                                                    <th>Type</th>
                                                    <th>Capacity</th>
                                                    <th>Status</th>
                                                    <th>Purchase Date</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($industrial_equipments as $equipment)
                                                    <tr>
                                                        <td>{{ $equipment->equipment_name }}</td>
                                                        <td>{{ $equipment->equipmentType->name }}</td>
                                                        <td>{{ $equipment->equipment_capacity }}</td>
                                                        <td>
                                                            @php
                                                                $statusClasses = [
                                                                    'Operational' => 'bg-success',
                                                                    'Under Maintenance' => 'bg-warning',
                                                                    'Out of Service' => 'bg-danger',
                                                                ];
                                                            @endphp
                                                            <span class="badge {{ $statusClasses[$equipment->equipment_status] ?? 'bg-secondary' }}">
                                                                {{ $equipment->equipment_status }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $equipment->purchase_date }}</td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="wasteItemHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#wasteItemCollapse" aria-expanded="false"
                                    aria-controls="wasteItemCollapse">
                                    <i class="las la-trash-alt me-2"></i> Waste Items
                                </button>
                            </h2>
                            <div id="wasteItemCollapse" class="accordion-collapse collapse"
                                aria-labelledby="wasteItemHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Waste Item Form -->
                                    <form action="" method="post" id="waste-item-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="waste_item_name" class="form-label">Waste Item
                                                        Name</label>
                                                    <input type="text" class="form-control" id="waste_item_name"
                                                        name="waste_item_name" placeholder="Enter waste item name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="waste_item_type" class="form-label">Waste Item
                                                        Type</label>
                                                    <select class="form-select" id="waste_item_type"
                                                        name="waste_item_type" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Hazardous">Hazardous</option>
                                                        <option value="Non-Hazardous">Non-Hazardous</option>
                                                        <option value="Recyclable">Recyclable</option>
                                                        <option value="Organic">Organic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="waste_item_unit" class="form-label">Unit</label>
                                                    <input type="text" class="form-control" id="waste_item_unit"
                                                        name="waste_item_unit"
                                                        placeholder="Enter unit (e.g., kg, liters)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="button" class="btn btn-primary" id="submit-waste-item">
                                                    Add Waste Item
                                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Waste Item Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-waste-items">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Waste Item Name</th>
                                                    <th>Type</th>
                                                    <th>Unit</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($waste_items as $item)
                                                <tr>
                                                    <td>{{ $item->waste_name }}</td>
                                                    <td>{{ $item->waste_type }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="wasteDisposalTrackingHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#wasteDisposalTrackingCollapse" aria-expanded="false"
                                    aria-controls="wasteDisposalTrackingCollapse">
                                    <i class="las la-recycle me-2"></i> Waste Disposal Tracking
                                </button>
                            </h2>
                            <div id="wasteDisposalTrackingCollapse" class="accordion-collapse collapse"
                                aria-labelledby="wasteDisposalTrackingHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Waste Disposal Tracking Form -->
                                    <form action="" method="post" id="waste-disposal-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="waste_type" class="form-label">Waste Type</label>
                                                    <select class="form-select" id="waste_type" name="waste_type"
                                                        required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Hazardous">Hazardous</option>
                                                        <option value="Non-Hazardous">Non-Hazardous</option>
                                                        <option value="Recyclable">Recyclable</option>
                                                        <option value="Organic">Organic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="operation_status" class="form-label">Operation</label>
                                                    <select class="form-select" id="operation_status"
                                                        name="operation" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="waste_item" class="form-label">Waste Item</label>
                                                    <select class="form-select" id="waste_item" name="waste_item" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        @foreach($waste_items as $item)
                                                            <option value="{{ $item->company_waste_id }}">{{ $item->waste_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="quantity_disposed" class="form-label">Quantity
                                                        Disposed</label>
                                                    <input type="number" class="form-control" id="quantity_disposed"
                                                        name="quantity_disposed" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="disposal_method" class="form-label">Disposal
                                                        Method</label>
                                                    <select class="form-select" id="disposal_method" name="disposal_method" required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Landfill">Landfill</option>
                                                        <option value="Recycling">Recycling</option>
                                                        <option value="Incineration">Incineration</option>
                                                        <option value="Composting">Composting</option>
                                                        <option value="Waste Symbiosis">Waste Symbiosis</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="calendar_year" class="form-label">Calendar Year</label>
                                                    <select class="form-select calendar-year" id="calendar_year" name="calendar_year"
                                                        required>
                                                        <option value="" selected disabled>Choose...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="disposal_date" class="form-label">Disposal
                                                        Date</label>
                                                    <input type="date" class="form-control" id="disposal_date"
                                                        name="disposal_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <!-- water disposal table -->
                        
                                <div class="table-responsive mt-4">
                                    <table class="table table-striped mb-0" id="tbl-waste-disposal">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Waste Type</th>
                                                <th>Quantity Disposed</th>
                                                <th>Disposal Method</th>
                                                <th>Disposal Date</th>
                                                <th>Operation</th>
                                                <th>Calendar Year</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($waste_disposals as $disposal)
                                        <tr>
                                            <td>{{ $disposal->waste_type }}</td>
                                            <td>{{ $disposal->quantity }}</td>
                                            <td>{{ $disposal->disposal_method }}</td>
                                            <td>{{ $disposal->disposal_date }}</td>
                                            <td>{{ $disposal->operation->operation_name ?? 'N/A' }}</td>
                                            <td>{{ $disposal->calendarYear->name ?? 'N/A' }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                             
                                        </tbody>
                                    </table>
                                </div>
                            
                        <!-- end water disposal table -->
                                </div>
                                
                            </div>
                        </div>
                        <!-- iot device -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="iotDeviceHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#iotDeviceCollapse" aria-expanded="false" aria-controls="iotDeviceCollapse">
                                    <i class="las la-microchip me-2"></i> IoT Device Management
                                </button>
                            </h2>
                            <div id="iotDeviceCollapse" class="accordion-collapse collapse" aria-labelledby="iotDeviceHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- IoT Device Form -->
                                    <form action="" method="post" id="iot-device-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="device_name" class="form-label">Device Name</label>
                                                    <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Enter device name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="device_type" class="form-label">Device Location</label>
                                                    <input type="text" class="form-control" id="device_location" name="device_location" placeholder="Enter device location" required>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_maintenance_date" class="form-label">Last Maintenance Date</label>
                                                    <input type="date" class="form-control" id="last_maintenance_date" name="last_maintenance_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- IoT Device Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-iot-devices">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Device Name</th>
                                                
                                                    <th>Device Location</th>
                                                    <th>Status</th>
                                                    
                                                 
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end iot device -->
                         <!-- production batch tracking -->
                        <!-- Batch Tracking Accordion Item -->
                        <div class="accordion-item"> 
                            <h2 class="accordion-header" id="batchTrackingHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#batchTrackingCollapse" aria-expanded="false" aria-controls="batchTrackingCollapse">
                                    <span class="me-2">
                                        <i class="las la-box" style="font-size: 1.8rem;"></i>
                                    </span>
                                    Batch Production Management
                                </button>
                            </h2>
                            <div id="batchTrackingCollapse" class="accordion-collapse collapse" aria-labelledby="batchTrackingHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col">
                                            <h4 class="text-primary mb-0">Batch Production Tracking Table</h4>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-setup-batch-production"
                                                onclick="toggleBatchTrackingForm()">
                                                <i class="iconoir-plus"></i> New Batch
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Batch Tracking Form (hidden by default) -->
                                    <div id="batch-tracking-form-container" class="d-none position-relative">
                                        <div class="card shadow-lg border-0" style="background: linear-gradient(90deg, #f7b42c 0%, #fc575e 100%); border-radius: 1rem;">
                                            <div class="card-header text-white d-flex justify-content-between align-items-center" style="background: transparent; border-bottom: none;">
                                                <h4 class="card-title mb-0 fw-bold">
                                                    <i class="las la-box me-2"></i> Batch Production Management Form
                                                </h4>
                                                <button type="button" class="btn-close btn-close-white btn-lg" aria-label="Close" style="font-size:2rem;" onclick="document.getElementById('batch-tracking-form-container').classList.add('d-none');"></button>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="batch-tracking-form">
                                                    @csrf
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    <div class="row g-4">
                                                        <!-- Batch Name -->
                                                        <div class="col-md-6">
                                                            <label for="batch_name" class="form-label text-white fw-semibold">Batch Name</label>
                                                            <input type="text" class="form-control border-0 shadow-sm" id="batch_name" name="batch_name" placeholder="Enter batch name">
                                                        </div>
                                                        <!-- Production Date -->
                                                        <div class="col-md-6">
                                                            <label for="start_date" class="form-label text-white fw-semibold">Production Date</label>
                                                            <div class="input-group" id="DateRange">
                                                                <input type="date" class="form-control border-0 shadow-sm" name="start_date" placeholder="Start" aria-label="StartDate">
                                                                <span class="input-group-text bg-white border-0">to</span>
                                                                <input type="date" class="form-control border-0 shadow-sm" name="end_date" placeholder="End" aria-label="EndDate">
                                                            </div>
                                                        </div>
                                                        <!-- Product -->
                                                        <div class="col-md-6">
                                                            <label for="product" class="form-label text-white fw-semibold">Product</label>
                                                            <select class="form-select border-0 shadow-sm" id="product" name="product">
                                                                <option value="" selected disabled>Select Product</option>
                                                                @foreach($products as $product)
                                                                    <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Quantity -->
                                                        <div class="col-md-6">
                                                            <label for="quantity" class="form-label text-white fw-semibold">Total Quantity</label>
                                                            <input type="number" class="form-control border-0 shadow-sm" id="quantity" name="total_quantity" placeholder="Enter quantity" min="0">
                                                        </div>
                                                        <!-- Defective Quantity -->
                                                        <div class="col-md-6">
                                                            <label for="defective_quantity" class="form-label text-white fw-semibold">Total Quantity Defective</label>
                                                            <input type="number" class="form-control border-0 shadow-sm" id="defective_quantity" name="defective_quantity" placeholder="Enter defective quantity" min="0">
                                                        </div>
                                                        <!-- Yield Percentage -->
                                                        <div class="col-md-6">
                                                            <label for="yield_percentage" class="form-label text-white fw-semibold">Yield Percentage</label>
                                                            <input type="number" class="form-control border-0 shadow-sm" id="yield_percentage" name="yield_percentage" placeholder="Enter yield percentage" min="0" max="100" step="0.01">
                                                        </div>
                                                        <!-- Created By -->
                                                        <div class="col-md-6">
                                                            <label for="prepared_by" class="form-label text-white fw-semibold">Created By</label>
                                                            <input type="text" class="form-control border-0 shadow-sm" id="created_by_input" name="created_by" placeholder="Enter prepared by">
                                                        </div>
                                                        <!-- Geolocation -->
                                                        <div class="col-md-6">
                                                            <label for="geolocation" class="form-label text-white fw-semibold">Geolocation</label>
                                                            <input type="text" class="form-control border-0 shadow-sm" id="geolocation" name="geolocation" placeholder="Enter geolocation coordinates (e.g., latitude, longitude)">
                                                        </div>
                                                        <!-- IoT Device ID -->
                                                        <div class="col-md-6">
                                                            <label for="iot_device_id" class="form-label text-white fw-semibold">IoT Device</label>
                                                            <select class="form-select border-0 shadow-sm" id="iot_device_id" name="iot_device">
                                                                <option value="" selected disabled>Select IoT Device</option>
                                                                @php
                                                                    $iotDevices = \App\Models\IotDevice::all();
                                                                @endphp
                                                                @foreach($iotDevices as $device)
                                                                    <option value="{{ $device->iot_device_id }}">{{ $device->device_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Predicted Defect Rate -->
                                                        <div class="col-md-6">
                                                            <label for="predicted_defect_rate" class="form-label text-white fw-semibold">Predicted Defect Rate (%)</label>
                                                            <input type="number" class="form-control border-0 shadow-sm" id="predicted_defect_rate" name="predicted_defect_rate" placeholder="Enter predicted defect rate" min="0" max="100" step="0.01">
                                                        </div>
                                                        <!-- Audit Trail -->
                                                        <div class="col-md-6">
                                                            <label for="audit_trail" class="form-label text-white fw-semibold">Audit Trail</label>
                                                            <select class="form-select border-0 shadow-sm" id="audit_trail" name="audit_trail">
                                                                <option value="" selected disabled>Select Audit Trail</option>
                                                            </select>
                                                        </div>
                                                        <!-- Submit Button -->
                                                        <div class="col-md-12 mt-3 text-end">
                                                            <button type="submit" class="btn btn-light fw-bold px-4 py-2 shadow-sm">Save Batch</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Spinner before table -->
                                    <div id="batch-tracking-spinner" class="d-none text-center my-4">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>

                                    <!-- Batch Tracking Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0 w-100" id="tbl-batch-tracking">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Batch Name</th>
                                                    <th>Product</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <!-- Batch Tracking Table End -->
                                         <!-- Production Process Modal -->
                                    <div class="modal fade" id="productionProcessModal" tabindex="-1" aria-labelledby="productionProcessModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info text-white">
                                                    <h5 class="modal-title" id="productionProcessModalLabel">Production Process</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Button to show the form -->
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h6 class="mb-0">Manage Production Process</h6>
                                                        <button type="button" class="btn btn-info btn-sm" id="show-production-process-form">
                                                            <i class="iconoir-plus"></i> Add Production Process
                                                        </button>
                                                    </div>
                                                    <!-- Table of production processes -->
                                                    <div id="production-process-table-container">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped mb-0 w-100" id="tbl-production-process">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>Operation Type</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>Status</th>
                                                                        <th>Remarks</th>
                                                                        <th class="text-end">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- Dynamic rows go here -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- Production Process Form (hidden by default) -->
                                                    <div id="production-process-form-container" class="d-none mt-4">
                                                        <div class="card shadow border-0" style="max-width:900px;margin:auto;">
                                                            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center rounded-top">
                                                                <span class="fw-bold"><i class="las la-industry"></i> Add Production Process</span>
                                                                <!-- Close icon as a visible cancel button (no background, just icon) -->
                                                                <button type="button" class="btn p-0 border-0" aria-label="Cancel" id="close-production-process-form" style="font-size:2rem; background:none; box-shadow:none; color:#333;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="card-body">
                                                                <form id="production-process-form" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                                    <input type="hidden" id="batch_id" name="batch_id">
                                                                    <div class="row g-3">
                                                                        <div class="col-md-6">
                                                                            <label for="operation_type" class="form-label">Operation Type</label>
                                                                            <input type="text" class="form-control" id="operation_type" name="operation_type" placeholder="Enter operation type" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="process_date_range" class="form-label">Start Date / End Date</label>
                                                                            <div class="input-group" id="process_date_range">
                                                                                <input type="date" class="form-control" id="process_start_date" name="process_start_date" placeholder="Start Date" required>
                                                                                <span class="input-group-text">to</span>
                                                                                <input type="date" class="form-control" id="process_end_date" name="process_end_date" placeholder="End Date" required>
                                                                            </div>
                                                                        </div>
                                                                        @if(auth('admin')->check())
                                                                            <input type="hidden" name="operator" value="{{ auth('admin')->user()->id }}">
                                                                        @elseif(auth('web')->check())
                                                                            <input type="hidden" name="operator" value="{{ auth('web')->user()->id }}">
                                                                        @endif
                                                                        <div class="col-md-6">
                                                                            <label for="process_status" class="form-label">Status</label>
                                                                            <select class="form-select" id="process_status" name="process_status" required>
                                                                                <option value="" selected disabled>Select Status</option>
                                                                                <option value="Pending">Pending</option>
                                                                                <option value="In Progress">In Progress</option>
                                                                                <option value="Completed">Completed</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="remarks" class="form-label">Remarks</label>
                                                                            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter any remarks or notes about this process"></textarea>
                                                                        </div>
                                                                        <div class="col-12 mt-3 text-end">
                                                                            <button type="submit" class="btn btn-info">Save Production Process</button>
                                                                            <button type="button" class="btn btn-secondary ms-2" id="cancel-production-process-form">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Production Process Form -->
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                               
                                               

                                    
                                </div>
                            </div>
                        </div>
                         <!-- end production batch tracking -->
                
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="productionTrackingHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#productionTrackingCollapse" aria-expanded="false"
                                    aria-controls="productionTrackingCollapse">
                                    <i class="las la-industry me-2"></i> Production Log
                                </button>
                            </h2>
                            <div id="productionTrackingCollapse" class="accordion-collapse collapse"
                                aria-labelledby="productionTrackingHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body">
                                    <!-- Production Tracking Form -->
                                    <form action="" method="post" id="production-log-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-3">
                                            <!-- Production Title -->
                                            <div class="col-md-6">
                                                <label for="production_title" class="form-label">Production Title</label>
                                                <input type="text" class="form-control" id="production_title" name="production_title" placeholder="Enter production title" required>
                                            </div>

                                            <!-- Operation Name -->
                                            <div class="col-md-6">
                                                <label for="operation_name_select" class="form-label">Operation</label>
                                                <select class="form-select" id="operation_name_select" name="operation_name" required>
                                                    <option value="" selected disabled>Choose...</option>
                                                    
                                                </select>
                                            </div>

                                            <!-- Material Used -->
                                            <div class="material-quantity-used-container-production-log col-md-12">
                                                <div class="row g-2 align-items-end mb-3">
                                                    <div class="col-md-3">
                                                        <label for="material_used" class="form-label">Used Material</label>
                                                        <select class="form-select" id="material_used" name="material_used[0][material_id]" required>
                                                            <option value="" selected disabled>Select Material</option>
                                                            @foreach($companyMaterials as $material)
                                                                <option value="{{ $material->companyMaterialId }}">{{ $material->material }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="quantity_used" class="form-label">Used Quantity</label>
                                                        <input type="number" min="0" class="form-control" id="quantity_used" name="material_used[0][quantity]" placeholder="Enter quantity used" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-start">
                                                <button type="button" class="btn btn-outline-primary btn-sm add-more-material-used-production-log">Add More</button>
                                            </div>

                                            <!-- Chemical Used -->
                                            <div class="chemical-quantity-container-production-log col-md-12">
                                                <div class="row g-2 align-items-end mb-3">
                                                    <div class="col-md-3">
                                                        <label for="chemical_name" class="form-label">Used Chemical</label>
                                                        <select class="form-select" id="chemical_name" name="chemical_used[0][chemical_id]" required>
                                                            <option value="" selected disabled>Select Chemical</option>
                                                            @foreach($approved_company_chemicals as $chemical)
                                                                <option value="{{ $chemical->company_chemical_id }}">{{ $chemical->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="chemical_volume" class="form-label">Used Volume (Liters)</label>
                                                        <input type="number" min="0" class="form-control" id="chemical_volume" name="chemical_used[0][volume]" placeholder="Enter volume" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-start">
                                                <button type="button" class="btn btn-outline-primary btn-sm add-more-chemical-used-production-log">Add More</button>
                                            </div>

                                            <!-- Water Usage -->
                                            <div class="col-md-3">
                                                <label for="amount_of_water_used" class="form-label">Volume of Water Used (Liters)</label>
                                                <input type="number" class="form-control" id="amount_of_water_used" min="0" name="amount_of_water_used" placeholder="Enter amount of water used" required>
                                            </div>

                                            <!-- Calendar Year -->
                                            <div class="col-md-3">
                                                <label for="calendar_year" class="form-label">Calendar Year</label>
                                                <select class="form-select calendar-year" id="calendar_year" name="calendar_year" required>
                                                    <option value="" selected disabled>Select Calendar Year</option>
                                                </select>
                                            </div>

                                            <!-- Production Date -->
                                            <div class="col-md-3">
                                                <label for="production_date" class="form-label">Production Date</label>
                                                <input type="date" class="form-control" id="production_date" name="production_date" required>
                                            </div>

                                            <!-- Production Status -->
                                            <div class="col-md-3">
                                                <label for="production_status" class="form-label">Production Status</label>
                                                <select class="form-select" id="production_status" name="production_status" required>
                                                    <option value="" selected disabled>Select Status</option>
                                                    <option value="ongoing">Ongoing</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="halted">Halted</option>
                                                    <option value="failed">Failed</option>
                                                </select>
                                            </div>

                                            <!-- Product Produced -->
                                            <div class="product-quantity-container-production-log col-md-12">
                                                <div class="row g-2 align-items-end mb-3">
                                                    <div class="col-md-3">
                                                        <label for="product_name" class="form-label">Produced Product</label>
                                                        <select class="form-select" id="product_name" name="product_produced[0][product_id]" required>
                                                            <option value="" selected disabled>Select Product</option>
                                                            @foreach($active_products as $product)
                                                                <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="quantity_produced" class="form-label">Quantity Produced</label>
                                                        <input type="number" min="0" class="form-control" id="quantity_produced" name="product_produced[0][quantity]" placeholder="Enter quantity produced" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="quantity_defected" class="form-label">Quantity Defected</label>
                                                        <input type="number" min="0" class="form-control" id="quantity_defected" name="product_produced[0][quantity_defected]" placeholder="Enter quantity defected" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-start">
                                                <button type="button" class="btn btn-outline-primary btn-sm add-more-product-production-log">Add More</button>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Submit Production Log</button>
                                        </div>
                                    </form>
                                    <!-- Production Log Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-production-log">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Production Title</th>
                                                    <th>Operation Name</th>
                                                    <th>Materials Used</th>
                                                    <th>Chemicals Used</th>
                                                    <th>Water Used (Liters)</th>
                                                    <th>Products Produced</th>
                                                    <th>Production Date</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($production_logs as $log)
                                                <tr>
                                                    <td>{{ $log->production_title }}</td>
                                                    <td>{{ $log->operation->operation_name ?? 'N/A' }}</td>
                                                    <td>
                                                        {{ $log->material->material_name ?? 'N/A' }} ({{ $log->quantity_used }})
                                                    </td>
                                                    <td>
                                                        {{ $log->chemical->name ?? 'N/A' }} ({{ $chemical->volume_used }} Liters)
                                                    </td>
                                                    <td>{{ $log->amount_of_water_used }} Liters</td>
                                                    <td>
                                                    @foreach($log->product_log_data as $product)
                                                        {{ $log->product->name ?? 'N/A' }} ({{ $product->quantity_produced ?? "N/A" }} Produced, {{ $product->quantity_defected ?? "N/A" }} Defected)
                                                    @endforeach
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($log->production_date)->format('d M Y') }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $log->production_status == 'completed' ? 'success' : ($log->production_status == 'ongoing' ? 'primary' : 'danger') }}">
                                                            {{ ucfirst($log->production_status) }}
                                                        </span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end gap-2">
                                                            <button class="btn btn-outline-primary btn-sm" onclick="editProductionLog({{ $log->id }})">Edit</button>
                                                            <button class="btn btn-outline-danger btn-sm" onclick="deleteProductionLog({{ $log->id }})">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="qualityControlHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#qualityControlCollapse" aria-expanded="false" aria-controls="qualityControlCollapse">
                                    <i class="las la-check-circle me-2"></i> Quality Control
                                </button>
                            </h2>
                            <div id="qualityControlCollapse" class="accordion-collapse collapse"
                                aria-labelledby="qualityControlHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body ">
                                    <!-- Quality Control Form -->
                                    <form action="" method="post" id="quality-control-form">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="row g-2">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="quality_metric" class="form-label">Quality Metric</label>
                                                    <input type="text" class="form-control" id="quality_metric" name="quality_metric"
                                                        placeholder="Enter quality metric" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="acceptable_range" class="form-label">Acceptable Range</label>
                                                    <input type="text" class="form-control" id="acceptable_range" name="acceptable_range"
                                                        placeholder="Enter acceptable range" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="measurement_frequency" class="form-label">Measurement Frequency</label>
                                                    <input type="text" class="form-control" id="measurement_frequency"
                                                        name="measurement_frequency" placeholder="Enter measurement frequency" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="responsible_person" class="form-label">Responsible Person</label>
                                                    <input type="text" class="form-control" id="responsible_person" name="responsible_person"
                                                        placeholder="Enter responsible person" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Add Quality Control Metric</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Quality Control Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-quality-control">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Quality Metric</th>
                                                    <th>Acceptable Range</th>
                                                    <th>Measurement Frequency</th>
                                                    <th>Responsible Person</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($quality_controls_record as $control)
                                                <tr>
                                                    <td>{{ $control->quality_metric }}</td>
                                                    <td>{{ $control->acceptable_range }}</td>
                                                    <td>{{ $control->measurement_frequency }}</td>
                                                    <td>{{ $control->responsible_person }}</td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Operations Management -->
                <!-- Product Management -->
                <div class="tab-pane fade" id="product-management" role="tabpanel">
                    <h3>Product Management</h3>
                    <div class="accordion my-3" id="productManagementAccordion">
                        <!-- Add New Product -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="productCategoryHeading">
                                <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#productCategoryCollapse" aria-expanded="false"
                                    aria-controls="productCategoryCollapse">
                                    Product Categories
                                </button>
                            </h2>
                            <div id="productCategoryCollapse" class="accordion-collapse collapse"
                                aria-labelledby="productCategoryHeading">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card shadow-sm border-0 mt-4">
                                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title mb-0">Add New Product Category</h4>
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted">Use this form to add a new product category. Provide a name and description for the category to help organize your products effectively.</p>
                                                    <form action="" method="post" id="add-product-category-form">
                                                        @csrf
                                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                        <div class="row g-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="category_name">Category Name</label>
                                                                    <input type="text" class="form-control" id="category_name"
                                                                        name="category_name" placeholder="Enter category name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="category_description">Description</label>
                                                                    <textarea class="form-control" id="category_description"
                                                                        name="category_description"
                                                                        placeholder="Enter category description" rows="3"
                                                                        required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <button type="submit" class="btn btn-primary">Add Category</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-sm border-0 mt-4  d-none">
                                                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title mb-0">Edit Product Category</h4>
                                                    <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted">Use this form to edit an existing product category. You can update the category name and description as needed.</p>
                                                    <form action="" method="post" id="edit-product-category-form">
                                                        @csrf
                                                        <input type="hidden" name="category_id" id="category_id">
                                                        <div class="row g-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_category_name">Category Name</label>
                                                                    <input type="text" class="form-control" id="edit_category_name" name="category_name" placeholder="Enter category name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_category_description">Description</label>
                                                                    <textarea class="form-control" id="edit_category_description" name="category_description" placeholder="Enter category description" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <button type="submit" class="btn btn-primary">Update Category</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-product-categories">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product_categories as $category)
                                                <tr>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->description }}</td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product List -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="productListHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#productListCollapse" aria-expanded="false" aria-controls="productListCollapse">
                                    Product Management
                                </button>
                            </h2>
                            <div id="productListCollapse" class="accordion-collapse collapse" aria-labelledby="productListHeading">
                                <div class="accordion-body">
                                    <div class="card shadow-sm border-0 d-none" style="background-color: #f9fbe7;" id="new_product_setup_card"> <!-- Light greenish-yellow background for product setup -->
                                        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">New Product Setup</h4>
                                            <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body pt-3">
                                            <form action="" method="post" id="add-product-form">
                                                @csrf
                                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3">
                                                    <!-- Product Name -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="product_name" class="form-label">Product Name</label>
                                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                                                        </div>
                                                    </div>
                                                    <!-- Product Category -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="product_category" class="form-label">Category</label>
                                                            <select class="form-select" id="product_category" name="product_category" required>
                                                                <option value="" selected disabled>Choose...</option>
                                                                @foreach($active_product_categories as $category)
                                                                    <option value="{{ $category->product_category_id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Quantity Per Unit -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="product_quantity_per_unit" class="form-label">Quantity Per Unit</label>
                                                            <input type="number" class="form-control" id="product_quantity_per_unit" name="product_quantity_per_unit" placeholder="Enter quantity per unit" min="1" required>
                                                        </div>
                                                    </div>
                                                    <!-- Product Unit -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="product_unit" class="form-label">Unit</label>
                                                            <input type="text" class="form-control" id="product_unit" name="product_unit" placeholder="Enter product unit" required>
                                                        </div>
                                                    </div>
                                                    <!-- Product Price -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label" for="product_price">Price</label>
                                                            <div class="input-group">
                                                                <!-- Currency dropdown with a fixed width -->
                                                                <select class="form-select flex-shrink-1" style="max-width: 120px;" id="currency" name="currency"
                                                                    aria-label="Select currency" required>
                                                                    <option value="USD">USD</option>
                                                                    <option value="EUR">EUR</option>
                                                                    <option value="GBP">GBP</option>
                                                                    <option value="NGN" selected>NGN</option>
                                                                </select>
                                                                <!-- Price input field taking the remaining space -->
                                                                <input type="number" class="form-control" id="product_price" name="product_price"
                                                                    placeholder="Enter product price in NGN" aria-label="Product price" min="0" step="0.01" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Save Button -->
                                                    <div class="col-12 text-end mt-3">
                                                        <button type="submit" class="btn btn-success">Save Product</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-4 align-items-center">
                                        <div class="col-md-6">
                                            <label for="product_category_filter" class="form-label fw-bold text-primary">Filter by Category</label>
                                            <select class="form-select shadow-sm" id="product_category_filter" name="product_category_filter">
                                                <option value="" selected>All Categories</option>
                                                @foreach($active_product_categories as $category)
                                                <option value="{{ $category->product_category_id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <button type="button" class="btn btn-outline-primary shadow-sm me-2" id="export-products">
                                                <i class="las la-file-export me-1"></i> Export Products
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary shadow-sm" id="btn-setup-products">
                                                <i class="las la-cogs me-1"></i> Setup a Product
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered rounded shadow-sm" id="tbl-products">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Category</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th class="text-center">Quantity per unit</th>
                                                    <th>Unit</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Placeholder for dynamic content -->
                                                <tr id="no-products">
                                                    <td colspan="5" class="text-center text-muted">No products available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end product list -->
                    </div>
                </div>
                <!-- General Settings -->
                <div class="tab-pane p-3" id="settings" role="tabpanel">
                    <!-- Company Profile Setup Accordion -->
                    <div class="accordion mb-4" id="companyProfileAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="companyProfileHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#companyProfileCollapse" aria-expanded="true"
                                    aria-controls="companyProfileCollapse">
                                    <i class="las la-user-cog me-2"></i> Company Account Setup
                                </button>
                            </h2>
                            <div id="companyProfileCollapse" class="accordion-collapse collapse show"
                                aria-labelledby="companyProfileHeading" data-bs-parent="#companyProfileAccordion">
                                <div class="accordion-body">
                                    <!-- Company Information Section -->
                                    <div class="card fancy-card mb-4">
                                        <div class="card-header">
                                            <h4>Company's Personal Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="general-settings" action="{{route('update-company-details')}}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="company_id"
                                                    value="{{ $company->company_id }}">

                                                <div class="mb-3">
                                                    <label for="company_name" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="company_name"
                                                        name="company_name" value="{{ $company->company_name }}"
                                                        placeholder="Company name">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="industry" class="form-label">Industry</label>
                                                        <select name="industry" id="industry" class="form-select">
                                                            <option value="" selected disabled>Choose...</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="industry_process_used" class="form-label">Industrial
                                                            Process
                                                            Used</label>
                                                        <select id="industry-process" name="industry_process_used"
                                                            class="form-select">
                                                            <option value="" selected disabled>Choose...</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            value="{{ $company->email }}"
                                                            placeholder="Example: company@domain.com">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="website_address" class="form-label">Website
                                                            Address</label>
                                                        <input type="url" class="form-control" id="website_address"
                                                            name="website_address" value="{{ $company->website_url }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label for="mobile_code_primary">Primary Phone
                                                                Number</label>
                                                            <div class="">
                                                                <input id="mobile_code_primary" type="tel"
                                                                    class="form-control">
                                                                <input type="hidden" name="primary_phone_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label for="mobile_code_secondary">Secondary Phone
                                                                Number</label>
                                                            <div class="">
                                                                <input id="mobile_code_secondary" type="tel"
                                                                    class="form-control">
                                                                <input type="hidden" name="secondary_phone_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="number_of_employees" class="form-label">Number Of
                                                            Employees</label>
                                                        <input type="number" class="form-control"
                                                            id="number_of_employees" name="number_of_employees"
                                                            value="{{ $company->number_of_employees }}">
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label for="date_of_establishment" class="form-label">Date of
                                                            Establishment</label>
                                                        <input type="date" class="form-control"
                                                            id="date_of_establishment" name="date_of_establishment"
                                                            value="{{ $company->date_of_establishment }}">
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary" id="btn-general-settings">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Company Location Section -->
                                    <div class="card fancy-card mb-4">
                                        <div class="card-header">
                                            <h4>Company's Location</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('update-company-location')}}" method="post"
                                                id="location_settings">
                                                <input type="hidden" name="company_id"
                                                    value="{{ $company->company_id }}">

                                                <div class="row mb-3">
                                                    <div class="col-md-4 mt-2">
                                                        <div class="form-group">
                                                            <label for="">Country</label>
                                                            <select name="country" id="" class="form-select countries"
                                                                id="countryId">
                                                                <option value="" selected disabled> Choose... </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <div class="form-group">
                                                            <label for="">State</label>
                                                            <select id="" class="form-select states"
                                                                onchange="toggleLGA(this);" id="stateId" name="state">
                                                                <option value="" selected disabled> Choose... </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <div class="form-group">
                                                            <label for="">City</label>
                                                            <select id="lga" class="form-select select-lga cities"
                                                                id="cityId" name="city">
                                                                <option value="" selected disabled> Choose... </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="{{ $company->address }}">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="zip_code" class="form-label">ZIP Code</label>
                                                        <input type="text" class="form-control" id="zip_code"
                                                            name="zip_code" value="{{ $company->zip_code }}">
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label for="longitude" class="form-label">Longitude</label>
                                                        <input type="text" class="form-control" id="longitude"
                                                            name="longitude" value="{{ $company->longitude }}">
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label for="latitude" class="form-label">Latitude</label>
                                                        <input type="text" class="form-control" id="latitude"
                                                            name="latitude" value="{{ $company->latitude }}">
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary" id="btn-location-settings">Save Location</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Other Settings Section -->
                                    <div class="card fancy-card mb-4">
                                        <div class="card-header">
                                            <h4>Other Settings</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="share_info"
                                                    name="is_sharable" value="active">
                                                <label class="form-check-label" for="share_info">Share information with
                                                    other
                                                    companies?</label>
                                            </div>

                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="activate_company"
                                                    data-company-id="{{ $company->company_id }}" {{ $company->status ===
                                                'active' ?
                                                'checked' : '' }}>
                                                <label class="form-check-label" for="activate_company">Activate or
                                                    Deactivate
                                                    Company</label>
                                            </div>

                                            <!-- Add this button wherever you want the Appearance settings to be triggered -->
                                            <div class="text-start">
                                                <button type="button" class="btn btn-danger">Delete Company</button>
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-toggle="offcanvas" data-bs-target="#Appearance"
                                                    aria-controls="Appearance">
                                                    Appearance Settings
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Calendar Year Setup Accordion -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="calendarYearHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#calendarYearCollapse" aria-expanded="false"
                                    aria-controls="calendarYearCollapse">
                                    Company Calendar Setup
                                </button>
                            </h2>
                            <div id="calendarYearCollapse" class="accordion-collapse collapse"
                                aria-labelledby="calendarYearHeading" data-bs-parent="#companyProfileAccordion">
                                <div class="accordion-body">
                                    <!-- Calendar Year Section -->
                                    <div class="card fancy-card mb-4">
                                        <div class="card-header">
                                            <h4>Calendar Year Setup</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" id="calendar_year_form">
                                                @csrf
                                                <input type="hidden" name="company_id"
                                                    value="{{ $company->company_id }}">

                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <label for="calendar_name" class="form-label">Calendar
                                                            Name</label>
                                                        <input type="text" class="form-control" id="calendar_name"
                                                            name="calendar_name" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="start_date" class="form-label">Start Date</label>
                                                        <input type="date" class="form-control" id="start_date"
                                                            name="start_date" required>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="end_date" class="form-label">End Date</label>
                                                        <input type="date" class="form-control" id="end_date"
                                                            name="end_date" required>
                                                    </div>
                                                </div>

                                                <div class="text-end mt-3">
                                                    <button type="submit" class="btn btn-primary">Save Calendar
                                                        Year</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card fancy-card mb-4">
                                        <div class="card-header">
                                            <h4>Company Calendar</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="calendar_year_table">
                                                <table class="table table-striped mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Calendar Title</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($calendar_years as $calendar)
                                                        <tr>
                                                            <td>{{ $calendar->name }}</td>
                                                            <td>{{ $calendar->start_date }}</td>
                                                            <td>{{ $calendar->end_date }}</td>
                                                            <td class="text-end">
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="editCalendar('{{ $calendar->calendar_year_id }}')">Edit</button>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="deleteCalendar('{{ $calendar->calendar_year_id }}')">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Appearance Settings Section -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance"
                        aria-labelledby="AppearanceLabel">
                        <div class="offcanvas-header border-bottom">
                            <h5 class="offcanvas-title" id="AppearanceLabel">Appearance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <h6>Account Settings</h6>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="auto_updates">
                                <label class="form-check-label" for="auto_updates">Auto Updates</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="location_permission" checked>
                                <label class="form-check-label" for="location_permission">Location
                                    Permission</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="show_offline_contacts">
                                <label class="form-check-label" for="show_offline_contacts">Show Offline
                                    Contacts</label>
                            </div>

                            <h6 class="mt-3">General Settings</h6>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="show_online">
                                <label class="form-check-label" for="show_online">Show Me Online</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="status_visible" checked>
                                <label class="form-check-label" for="status_visible">Status Visible to All</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notifications_popup">
                                <label class="form-check-label" for="notifications_popup">Notifications
                                    Popup</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- General Settings -->
                <!-- contact personel details  -->
                <!-- Contact Details -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-company-contact')}}" method="post" id="contact_settings">
                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"
                                            placeholder="Full Name Of Enviromental Operations Specialist or Manager"
                                            name="enviromental_operations_manager"
                                            value="{{ $company->operations_manager }}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control"
                                            placeholder="Full Name Of Contact Person" name="contact_person_name"
                                            value="{{$company->contact_person_full_name}}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control"
                                            placeholder="Office Position of Contact Person"
                                            name="contact_person_position"
                                            value="{{$company->contact_person_position}}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Contact Personnel Phone Number</label>
                                            <div class="">
                                                <input id="mobile_code_contact" type="tel" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="contact_person_phone_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-primary" id="btn_contact_settings">Save
                                            Contact</button>
                                        <span class="loader" id="loader"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end contact personel details  -->
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" tabindex="-1" id="materialPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Setup Price </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="material_price_id">
                    <div class="row g-2">
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Per Unit</label>
                                <input type="number" value="1" min="0" class="form-control"
                                    placeholder="Unit of Measurement" name="unit">
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Price -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price of Disposal in Naira(₦).</label>
                                <input type="number" min="0" class="form-control" placeholder="Price" name="price">
                            </div>
                        </div>
                        <!-- end Price -->
                        <!-- Price -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Price -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-material-price">Save
                        changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- modal -->
    <div class="modal fade" tabindex="-1" id="checkInModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Check In Item </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="checkIn_material_id">
                    <input type="hidden" name="material_id">
                    <input type="hidden" name="company_id">
                    <div class="row g-2">
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Material</label>
                                <input type="text" class="form-control" readonly name="checkIn_material_name">
                            </div>
                        </div>
                        <!-- Material name -->
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Date -->
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity/Volume</label>
                                <div class="input-group qty-icons">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0"
                                        style="pointer-events: none;">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>
                        </div>
                        <!-- Material name -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-check-in">Save
                        changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- modal -->
    <div class="modal fade" tabindex="-1" id="checkOutModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check Out Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="checkOut_material_id">
                    <input type="hidden" name="material_id">
                    <input type="hidden" name="company_id">
                    <div class="row g-2">
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Material</label>
                                <input type="text" class="form-control" readonly name="checkOut_material_name">
                            </div>
                        </div>
                        <!-- Material name -->
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Date -->
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity/Volume</label>
                                <div class="input-group qty-icons">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0"
                                        style="pointer-events: none;">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>
                        </div>
                        <!-- Material name -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out">Save
                        changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- modal -->
    <div class="modal fade" tabindex="-1" id="adjustmentModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make Adjustment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="adjustment_material_id">
                    <input type="hidden" name="material_id">
                    <input type="hidden" name="company_id">
                    <div class="row g-2">
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Material</label>
                                <input type="text" class="form-control" readonly name="checkOut_material_name">
                            </div>
                        </div>
                        <!-- Material name -->
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Date -->
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Change in Quantity/Volume</label>
                                <div class="input-group qty-icons">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" name="quantity" value="0"
                                        style="pointer-events: none;">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Material name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>
                        </div>
                        <!-- Material name -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out">Save
                        changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- checkin chemical modal -->
    <div class="modal fade" tabindex="-1" id="checkInChemicalModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check In Chemical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="checkIn_chemical_id">
                    <input type="hidden" name="chemical_id">
                    <input type="hidden" name="company_id">

                    <div class="row g-2">
                        <!-- Chemical name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chemical</label>
                                <input type="text" class="form-control" readonly name="checkIn_chemical_name">
                            </div>
                        </div>
                        <!-- Chemical name -->
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Date -->
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity/Volume</label>
                                <div class="input-group qty-icons">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Remark -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>
                        </div>
                        <!-- Remark -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-check-in-chemical">
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" id="loader"></span>
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- checkout modal -->
    <div class="modal fade" tabindex="-1" id="checkOutChemicalModal" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check Out Chemical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="checkOut_chemical_id">
                    <input type="hidden" name="chemical_id">
                    <input type="hidden" name="company_id">
                    <div class="row g-2">
                        <!-- Chemical name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chemical</label>
                                <input type="text" class="form-control" readonly name="checkOut_chemical_name">
                            </div>
                        </div>
                        <!-- Chemical name -->
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" min="0" class="form-control" name="date">
                            </div>
                        </div>
                        <!-- end Date -->
                        <!-- Unit of measurement -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity/Volume</label>
                                <div class="input-group qty-icons">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0"
                                        style="pointer-events: none;">
                                    <button class="btn btn-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Unit of measurement -->
                        <!-- Remark -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>
                        </div>
                        <!-- Remark -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out-chemical">Save
                        changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- update operation log modal -->
    <div class="modal fade" tabindex="-1" id="updateOperationModal" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <form method="post" id="operations-form-update">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Operation Log</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="operation_id">
                        <input type="hidden" name="company_id">
                        <div class="row g-2">
                            <!-- Operation Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Operation Name</label>
                                    <input type="text" class="form-control" name="operation_name">
                                </div>
                            </div>
                            <!-- end Operation Name -->
                            <!-- Operation Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Operation Code</label>
                                    <input type="text" class="form-control" name="operation_code">
                                </div>
                            </div>
                            <!-- end Operation Code -->
                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>
                            <!-- end Description -->

                            <!-- Operation Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Operation Type</label>
                                    <input type="text" class="form-control" name="operation_type">
                                </div>
                            </div>
                            <!-- end Operation Type -->
                            <!-- Operation Category -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Operation Category</label>
                                    <input type="text" class="form-control" name="operation_category">
                                </div>
                            </div>
                            <!-- end Operation Category -->
                            <!-- Operation Unit -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Operation Unit</label>
                                    <input type="text" class="form-control" name="operation_unit">
                                </div>
                            </div>
                            <!-- end Operation Unit -->
                            <!-- Operation Unit Price -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Operation Unit Price</label>
                                    <input type="number" step="0.01" class="form-control" name="operation_unit_price">
                                </div>
                            </div>
                            <!-- end Operation Unit Price -->
                            <!-- Operation Unit Cost -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Operation Unit Cost</label>
                                    <input type="number" step="0.01" class="form-control" name="operation_unit_cost">
                                </div>
                            </div>
                            <!-- end Operation Unit Cost -->
                            <!-- Operation Unit Time -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Operation Unit Time</label>
                                    <input type="text" class="form-control" name="operation_unit_time">
                                </div>
                            </div>
                            <!-- end Operation Unit Time -->
                            <!-- Expected Waste Per Operation -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Expected Waste Per Operation</label>
                                    <input type="number" step="0.01" class="form-control"
                                        name="expected_waste_per_operation">
                                </div>
                            </div>
                            <!-- end Expected Waste Per Operation -->
                            <!-- Expected Water Usage Per Operation -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Expected Water Usage Per Operation</label>
                                    <input type="number" step="0.01" class="form-control"
                                        name="expected_water_usage_per_operation">
                                </div>
                            </div>
                            <!-- end Expected Water Usage Per Operation -->
                            <!-- Expected Unit Produced For Goods -->
                            <div class="col-md-4">
                                <div class="form-group
                                ">
                                    <label for="">Expected Unit Produced For Goods</label>
                                    <input type="number" step="0.01" class="form-control"
                                        name="expected_unit_produced_for_goods">
                                </div>
                            </div>
                            <!-- end Expected Unit Produced For Goods -->
                            <!-- Status -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end Status -->
                            <!-- Start Date -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <!-- End Start Date -->
                            <!-- End Date -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>
                            </div>
                            <!-- End End Date -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-submit-update-operation-log">Save
                            changes</button>
                        <span class="loader" id="loader"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end update operation log modal -->
    @section('modals')
    <!-- Add your modal content here if needed -->
    <!-- workflow management -->
    <!-- Workflow Edit Form Modal -->
    <div class="modal fade" id="workflowEditModal" tabindex="-1" aria-labelledby="workflowEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="workflow-edit-form" method="post">
                    @csrf
                    <input type="hidden" name="workflow_id" id="workflow_edit_id">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="workflowEditModalLabel">Edit Workflow</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="workflow_edit_name" class="form-label">Workflow Name</label>
                                <input type="text" class="form-control" id="workflow_edit_name" name="workflow_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="workflow_edit_description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="workflow_edit_description" name="description" />
                            </div>
                            <div class="col-md-6">
                                <label for="workflow_edit_status" class="form-label">Status</label>
                                <select class="form-select" id="workflow_edit_status" name="status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Workflow</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Workflow Edit Form Modal -->
    <!-- Stage Management Modal -->
    <div class="modal fade" id="stageManagementModal" tabindex="-2" aria-labelledby="stageManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="stage-management-form">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="workflow_id" id="stage_workflow_id">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="stageManagementModalLabel">
                            Stage Management for <span id="stage-workflow-title"></span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="stage_name" class="form-label">Stage Name</label>
                                <input type="text" class="form-control" id="stage_name" name="stage_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stage_description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="stage_description" name="stage_description" placeholder="Enter stage description">
                            </div>
                            <div class="col-md-6">
                                <label for="stage_status" class="form-label">Status</label>
                                <select class="form-select" id="stage_status" name="stage_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="halted">Halted</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="stage_sequence_order" class="form-label">Sequence Order</label>
                                <input type="number" class="form-control" id="stage_sequence_order" name="stage_sequence_order" min="1" placeholder="Enter sequence order">
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-info">Save Stage</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive px-3 pb-3">
                    <table class="table table-striped mb-0 w-100" id="tbl-stage-management">
                        <thead class="table-light">
                            <tr>
                                <th>Stage Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Sequence Order</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Stage Modal -->
    <div class="modal fade animate__animated animate__fadeInDown" id="editStageModal" tabindex="-1" aria-labelledby="editStageModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="z-index: 1200;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <form id="edit-stage-form" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" name="stage_id" id="edit_stage_id">
                    <div class="modal-header bg-gradient-primary text-white rounded-top">
                        <h5 class="modal-title fw-bold" id="editStageModalLabel">
                            <i class="las la-edit me-2"></i> Edit Stage
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="edit_stage_name" class="form-label fw-semibold">Stage Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_stage_name" name="stage_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_description" class="form-label fw-semibold">Description</label>
                                <input type="text" class="form-control" id="edit_stage_description" name="stage_description">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_stage_status" name="stage_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="halted">Halted</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_sequence_order" class="form-label fw-semibold">Sequence Order</label>
                                <input type="number" class="form-control" id="edit_stage_sequence_order" name="stage_sequence_order" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="las la-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="las la-save"></i> Update Stage
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Stage Management Modal -->
     <!-- Task Management Modal -->
    <!-- Task Management Modal -->
    <div class="modal fade" id="taskManagementModal" tabindex="-1" aria-labelledby="taskManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="task-management-form" method="post">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="stage_id" id="stage_workflow_id">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="taskManagementModalLabel">Task Management</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="task_title" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="task_title" name="task_title" required>
                            </div>
                            <div class="col-md-6">
                                <div class="taggable-container " id="manager-tag-input-5">
                                    <label for="manager" class="form-label">Supervisor</label>
                                    <div class="manager-tag-input-5 manager-tag-input border-primary bg-light">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="task_due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="task_due_date" name="task_due_date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="task_priority" class="form-label">Priority</label>
                                <select class="form-select" id="task_priority" name="task_priority" required>
                                    <option value="" selected disabled>Select Priority</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="task_description" class="form-label">Description</label>
                                <textarea class="form-control" id="task_description" name="task_description" rows="3" placeholder="Enter task description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="task_status" class="form-label">Status</label>
                                <select class="form-select" id="task_status" name="task_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="task_tags" class="form-label">Tags</label>
                                <div id="tagging-system-2"></div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive px-3 pb-3">
                    <table class="table table-striped mb-0 w-100" id="tbl-task-management">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Tags</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Task Management Modal -->
     <!-- End Task Management Modal -->
    <!-- end workflow management -->

     <!-- Annual operations activity -->
    <!-- Annual Operations Activity Modal -->
    <div class="modal fade" id="annualOperationsActivityModal" tabindex="-1" aria-labelledby="annualOperationsActivityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="annualOperationsActivityModalLabel">Annual Operations Activities for</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm border-0 d-none" id = "annual-operation-activity-form-card" style="background: linear-gradient(90deg, #f8ffae 0%, #43c6ac 100%); color: #333;">
                <div class="card-header d-flex justify-content-between align-items-center rounded-top" style="background: #f8ffae; color: #333;">
                    <h4 class="card-title mb-0 fw-bold">
                        <i class="las la-tasks me-2" style="color: #22c55e;"></i> <span class="fw-bold">Annual Operations Activity Form</span>
                    </h4>
                    <button type="button" class="btn-close" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="annual-operations-activity-form" class="needs-validation" novalidate>
                    <input type="hidden" name="annual_op_metadata_ID" id="annual_op_metadata_ID">
                    <div class="row g-4">
                        <div class="col-md-12">
                        <label for="annual_operation_title" class="form-label fw-semibold">Annual Operation Activity Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="annual_operation_activity_title" name="annual_operation_activity_title" placeholder="Enter Annual Operation Activity Title" readonly>
                        </div>
                        <div class="col-md-6">
                        <label for="operation_name" class="form-label fw-semibold">Operation Activity (Operation type) <span class="text-danger">*</span></label>
                        <select class="form-select operation-select" id="operation_id" name="operation_activity" required>
                            <option value="" selected disabled>Select Operation</option>
                        </select>
                        <div class="invalid-feedback">Please select an operation activity.</div>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label fw-semibold">Activity Date <span class="text-danger">*</span></label>
                        <div class="input-group" id="DateRange">
                            <input type="date" class="form-control" name="activity_start_date" placeholder="Start" aria-label="StartDate" required>
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control rounded-end" name="activity_end_date" placeholder="End" aria-label="EndDate" required>
                        </div>
                        <div class="invalid-feedback">Please provide both start and end dates.</div>
                        </div>
                        <div class="col-md-6">
                        <label for="objectives" class="form-label fw-semibold">Objectives</label>
                        <textarea name="Objectives" id="objectives" rows="3" class="form-control" placeholder="Enter the objectives of the activity"></textarea>
                        </div>
                        <div class="col-md-6">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="Description" id="description" rows="3" class="form-control" placeholder="Enter a detailed description of the activity"></textarea>
                        </div>
                        <div class="col-md-6">
                        <div class="material-quantity-used-container-annual-operation-activity">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <label for="expected_material" class="form-label fw-semibold">Material Needed</label>
                                <select class="form-select material-select" id="expected_material" name="material_used[0][material_id]">
                                <option value="" selected disabled>Select Material</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="expected_quantity" class="form-label fw-semibold">Quantity</label>
                                <input type="number" class="form-control" id="expected_quantity" name="material_used[0][quantity]" placeholder="Quantity" min="0">
                            </div>
                            <div class="col-md-2">
                                <label for="expected_unit" class="form-label fw-semibold">Unit</label>
                                <input type="text" class="form-control" id="expected_unit" name="material_used[0][unit]" placeholder="Unit">
                            </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-material-quantity-annual-operation-activity">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="chemical-quantity-container-annual-operation-activity">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <label for="chemical_used" class="form-label fw-semibold">Chemical Needed</label>
                                <select class="form-select chemical-select" id="chemical_used" name="chemical_used[0][chemical_id]">
                                <option value="" selected disabled>Select Chemical</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="chemical_quantity" class="form-label fw-semibold">Quantity</label>
                                <input type="number" class="form-control" id="chemical_quantity" name="chemical_used[0][quantity]" placeholder="Enter Quantity Used" min="0">
                            </div>
                            <div class="col-md-2">
                                <label for="chemical_unit" class="form-label fw-semibold">Unit</label>
                                <input type="text" class="form-control" id="chemical_unit" name="chemical_used[0][unit]" placeholder="Unit">
                            </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-chemical-quantity-annual-operation-activity">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <label for="water_usage" class="form-label fw-semibold">Expected Water Usage (Liters)</label>
                        <input type="number" class="form-control" id="water_usage" name="water_usage" min="0" placeholder="Enter expected water usage" required>
                        </div>
                        <div class="col-md-3">
                        <label for="energy_usage" class="form-label fw-semibold">Expected Energy Usage (kWh)</label>
                        <input type="number" class="form-control" id="energy_usage" name="energy_usage" min="0" placeholder="Enter expected energy usage">
                        </div>
                        <div class="col-md-6">
                        <div class="annual-operation-activity-waste-quantity-container">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="expected_waste" class="form-label fw-bold">Waste Type</label>
                                <select class="form-select waste-select" name="waste_generated[0][waste_id]" id="expected_waste">
                                    <option value="" selected disabled>Select Waste</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="expected_quantity" class="form-label fw-bold">Quantity</label>
                                <input type="number" class="form-control" name="waste_generated[0][quantity]" id="expected_quantity" placeholder="Enter Expected Quantity" min="0">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="expected_unit" class="form-label fw-bold">Unit</label>
                                <input type="text" class="form-control" name="waste_generated[0][unit]" id="expected_unit" placeholder="Enter Expected Unit" >
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-annual-activity-waste-quantity-operation">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <label for="priority" class="form-label fw-semibold">Priority <span class="text-danger">*</span></label>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="" selected disabled>Select Priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select class="form-select" id="status" name="Status">
                            <option value="" selected disabled>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                            <div class="taggable-container " id="manager-tag-input-3">
                                <label for="manager" class="form-label fw-bold">Manager</label>
                                <div class="manager-tag-input-3 manager-tag-input border-primary bg-light">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label for="location" class="form-label fw-semibold">Location</label>
                        <input type="text" class="form-control" id="location" name="Location" placeholder="Enter activity location">
                        </div>
                        <div class="col-md-4">
                        <label for="success_criteria" class="form-label fw-semibold">Success Criteria</label>
                        <textarea class="form-control" id="success_criteria" name="success_criteria" rows="2" placeholder="Enter success criteria"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="tag-input-field" class="form-label fw-semibold">Tags</label>
                            <div id="tagging-system"></div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-dark fw-bold px-4 py-2 shadow-sm">Save Activity</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-primary mb-0">Annual Operations Activities</h4>
                <button type="button" class="btn btn-primary btn-sm" id="btn-add-annual-activity"
                    onclick="addActivityAnnualOperationLogForm()">
                    <i class="iconoir-plus"></i> Add Activity
                </button>
                </div>
                <div class="table-responsive">
                <table class="table table-striped mb-0 w-100" id="tbl-annual-operations-activity">
                    <thead class="table-light">
                    <tr>
                        <th>Activity Name</th>
                        <th>Operation Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Priority</th>
                        <th>Tags</th>
                        <th class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- End Annual Operations Activity Modal -->
    <!-- Annual Operation Performance Metrics Modal -->
    <div class="modal fade" id="annualOperationPerformanceMetricsModal" tabindex="-1" aria-labelledby="annualOperationPerformanceMetricsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="annualOperationPerformanceMetricsModalLabel">Annual Operation Performance Metrics</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="annual-operation-performance-metrics-form">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        <div class="row g-3">
                            <!-- Total Operations -->
                            <div class="col-md-4">
                                <label for="total_operations" class="form-label">Total Operations</label>
                                <input type="number" class="form-control" id="total_operations" name="total_operations" min="0" placeholder="Enter total operations" required>
                            </div>
                            <!-- Total Waste Generated -->
                            <div class="col-md-4">
                                <label for="total_waste_generated" class="form-label">Total Waste Generated (Units)</label>
                                <input type="number" class="form-control" id="total_waste_generated" name="total_waste_generated" min="0" placeholder="Enter total waste generated" required>
                            </div>
                            <!-- Total Water Used -->
                            <div class="col-md-4">
                                <label for="total_water_used" class="form-label">Total Water Used (Liters)</label>
                                <input type="number" class="form-control" id="total_water_used" name="total_water_used" min="0" placeholder="Enter total water used" required>
                            </div>
                            <!-- Total Units Produced -->
                            <div class="col-md-4">
                                <label for="total_units_produced" class="form-label">Total Units Produced</label>
                                <input type="number" class="form-control" id="total_units_produced" name="total_units_produced" min="0" placeholder="Enter total units produced" required>
                            </div>
                            <!-- Total Cost -->
                            <div class="col-md-4">
                                <label for="total_cost" class="form-label">Total Cost (₦)</label>
                                <input type="number" class="form-control" id="total_cost" name="total_cost" min="0" placeholder="Enter total cost" required>
                            </div>
                            <!-- Efficiency -->
                            <div class="col-md-4">
                                <label for="efficiency" class="form-label">Efficiency (%)</label>
                                <input type="number" class="form-control" id="efficiency" name="efficiency" min="0" max="100" placeholder="Enter efficiency percentage" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-secondary">Save Performance Metrics</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
     <!-- End annual operations Log -->
    @endsection

    @section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/dataTables.bootstrap5.min.css') }}">

    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/vanillajs-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            padding: 5px;
            /* border-radius: 8px; */
            cursor: text;
            position: relative;
        }

        .tag-input input {
            border: none;
            outline: none;
            flex: 1;
            min-width: 100px;
        }

        .tag {
            display: flex;
            align-items: center;
            background-color: #e0e7ff;
            color: #1d4ed8;
            border-radius: 16px;
            padding: 5px 10px;
            margin: 5px;
            font-size: 14px;
        }

        .tag span {
            margin-left: 5px;
            cursor: pointer;
        }

        .tag span:hover {
            color: #dc2626;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            /* border: 1px solid #ccc; */
            border-radius: 4px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 10;
        }

        .TagSuggestion {
            padding: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .TagSuggestion:hover {
            background-color: #f0f0f0;
        }

        .suggestion {
            padding: 8px 10px;
            cursor: pointer;
        }

        .suggestion img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .suggestion:hover {
            background-color: #f3f4f6;
        }

        /* Profile card */
        .profile-card {
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        }

        .profile-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        }

        .profile-card .profile-info {
        padding: 15px;
        }

        .profile-card .profile-info h2 {
        margin: 10px 0 5px;
        font-size: 18px;
        }

        .profile-card .profile-info p {
        margin: 0;
        color: #666;
        font-size: 14px;
        }
        /* Profile card */
        .taggable-container {
            flex: 1;
            max-width: 400px;
        }

        .supervisor-tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            /* padding: 5px; */
            border-radius: 8px;
            cursor: text;
            position: relative;
            /* background-color: #fff; */
        }

        .supervisor-tag-input input {
            /* border: none;
            outline: none; */
            flex: 1;
            min-width: 100px;
        }

        .manager-tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            /* padding: 5px; */
            border-radius: 8px;
            cursor: text;
            position: relative;
            /* background-color: #fff; */
        }

        .manager-tag-input input {
            /* border: none;
            outline: none; */
            flex: 1;
            min-width: 100px;
        }


    </style>
    <style>
        /* Tag Input Wrapper */
        .tag-inline-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            /* gap: 4px;
            padding: 4px 8px; */
            background: #fff;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            /* min-height: 38px; */
            position: relative;
            transition: box-shadow 0.2s, border-color 0.2s;
        }
        .tag-inline-container:focus-within {
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            border-color: #86b7fe;
        }

        /* Tag Styling */
        .task-tag {
            display: inline-flex;
            align-items: center;
            background: #0d6efd;
            color: #fff;
            padding: 4px 12px 4px 10px;
            border-radius: 1rem;
            font-size: 14px;
            margin: 2px 2px 2px 0;
            box-shadow: 0 1px 2px rgba(13,110,253,0.08);
            font-weight: 500;
            cursor: default;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        .task-tag:hover {
            background: #0b5ed7;
            box-shadow: 0 2px 6px rgba(13,110,253,0.12);
            transform: translateY(-1px) scale(1.04);
        }
        .task-tag span {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            opacity: 0.7;
            transition: opacity 0.15s;
        }
        .task-tag span:hover {
            opacity: 1;
            color: #f87171;
        }

        /* Input Styling */
        #task-tag-input {
            flex-grow: 1;
            min-width: 120px;
            padding: 6px 10px;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            color: #212529;
            margin: 2px 0;
        }
        #task-tag-input::placeholder {
            color: #adb5bd;
            opacity: 1;
        }

        /* Suggestions Dropdown */
        #task-suggestions {
            margin-top: 4px;
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            box-shadow: 0 4px 16px rgba(13,110,253,0.10);
            max-height: 220px;
            overflow-y: auto;
            z-index: 20;
            position: absolute;
            /* left: 0;
            right: 0;
            min-width: 180px; */
        }

        .task-suggestion {
            padding: 8px 16px;
            cursor: pointer;
            border-bottom: 1px solid #f3f4f6;
            font-size: 15px;
            color: #212529;
            background: transparent;
            transition: background 0.18s, color 0.18s;
        }
        .task-suggestion:last-child {
            border-bottom: none;
        }
        .task-suggestion:hover,
        .task-suggestion.active {
            background: #0d6efd;
            color: #fff;
        }

        /* Scrollbar Styling */
        #task-suggestions::-webkit-scrollbar {
            width: 8px;
        }
        #task-suggestions::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 10px;
        }
        #task-suggestions::-webkit-scrollbar-thumb:hover {
            background: #0b5ed7;
        }


    </style>
    <style>
        .tagify {
            width: 100%;
            max-width: 700px;
            background: rgba(white, .8);
        }

        :root {
            --tagify-dd-item-pad: .5em .7em;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0 1em;
            grid-template-areas: "avatar name"
                "avatar email";
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item {
            grid-template-areas: "add remove-tags"
                "remaning .";
        }

        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
            transform: scale(1.2);
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
            grid-area: avatar;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            background: #EEE;
            transition: .1s ease-out;
        }

        .tagify__dropdown.users-list img {
            width: 100%;
            vertical-align: top;
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item>div,
        .tagify__dropdown.users-list .tagify__dropdown__item strong {
            grid-area: name;
            width: 100%;
            align-self: center;
        }

        .tagify__dropdown.users-list span {
            grid-area: email;
            width: 100%;
            font-size: .9em;
            opacity: .6;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__addAll {
            border-bottom: 1px solid #DDD;
            gap: 0;
        }

        .tagify__dropdown.users-list .remove-all-tags {
            grid-area: remove-tags;
            justify-self: self-end;
            font-size: .8em;
            padding: .2em .3em;
            border-radius: 3px;
            user-select: none;
        }

        .tagify__dropdown.users-list .remove-all-tags:hover {
            color: white;
            background: salmon;
        }


        /* Tags items */
        .tagify__tag {
            white-space: nowrap;
        }

        .tagify__tag img {
            width: 100%;
            vertical-align: top;
            pointer-events: none;
        }


        .tagify__tag:hover .tagify__tag__avatar-wrap {
            transform: scale(1.6) translateX(-10%);
        }

        .tagify__tag .tagify__tag__avatar-wrap {
            width: 16px;
            height: 16px;
            white-space: normal;
            border-radius: 50%;
            background: silver;
            margin-right: 5px;
            transition: .12s ease-out;
        }

        .users-list .tagify__dropdown__itemsGroup:empty {
            display: none;
        }

        .users-list .tagify__dropdown__itemsGroup::before {
            content: attr(data-title);
            display: inline-block;
            font-size: .9em;
            padding: 4px 6px;
            margin: var(--tagify-dd-item-pad);
            font-style: italic;
            border-radius: 4px;
            background: #00ce8d;
            color: white;
            font-weight: 600;
        }

        .users-list .tagify__dropdown__itemsGroup:not(:first-of-type) {
            border-top: 1px solid #DDD;
        }
    </style>
    <style>
        /* Loader style */
        .loader {
            display: none;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        .profile-header {
            background: linear-gradient(to right, #4e73df, #1cc88a);
            color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .fancy-card {
            /* border: 1px solid #dee2e6; */
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .fancy-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .fancy-card .card-header {
            /* background-color: #f8f9fa; */
            /* font-weight: 600; */
            /* border-bottom: 1px solid #dee2e6; */
        }

        .offcanvas {
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 0.5rem;
        }

        .btn-danger {
            border-radius: 0.5rem;
        }

        .bg-gradient-primary {
            background: linear-gradient(90deg, #007bff, #22c55e); /* Updated gradient colors for primary */
            color: #ffffff; /* Ensures text is visible on the gradient */
        }


        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

     <style>
        #production-process-form-container .card {
            border-radius: 1rem;
            box-shadow: 0 6px 24px rgba(0,0,0,0.10);
            background: #f8fafc;
        }
        #production-process-form-container .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(90deg, #36b3e8 0%, #0ea5e9 100%);
        }
        #production-process-form-container .btn-close,
        #production-process-form-container .btn[aria-label="Cancel"] {
            opacity: 0.8;
            background: none !important;
            box-shadow: none;
            outline: none;
            color: #333;
            font-size: 2rem;
        }
        #production-process-form-container .btn-close:hover,
        #production-process-form-container .btn[aria-label="Cancel"]:hover {
            opacity: 1;
            color: #0ea5e9;
        }
        #production-process-form-container .card-body {
            background: #f8fafc;
        }
        #production-process-form-container label {
            font-weight: 500;
            color: #0ea5e9;
        }
        #production-process-form-container .form-control,
        #production-process-form-container .form-select {
            border-radius: 0.5rem;
            border: 1px solid #b6e0fe;
            background: #fff;
        }
        #production-process-form-container .btn-info {
            background: linear-gradient(90deg, #36b3e8 0%, #0ea5e9 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(14,165,233,0.10);
        }
        #production-process-form-container .btn-secondary {
            border-radius: 0.5rem;
        }
        @media (min-width: 992px) {
            #productionProcessModal .modal-dialog {
                max-width: 1000px;
            }
        }
    </style>
    @endsection

    @section('scripts')
    <!-- DataTables and Bootstrap JavaScript -->
    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/toastify.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/js/pages/datatable.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('adminAssets/js/location.js') }}"></script>
    <script src="{{ asset('adminAssets/js/industry.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/vanillajs-datepicker/js/datepicker-full.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
    <script src="{{ asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
    <script src="{{ asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{ asset('adminAssets/js/moment.js')}}"></script>
    <script src="{{ asset('adminAssets/libs/imask/imask.min.js')}}"></script>
    <script src="{{ asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="{{ asset('adminAssets/js/app.js')}}"></script>
    <!-- created by tagify -->
    <script>
    (function() {
        const input = document.querySelector("input[name='created_by']");
        if (!input) return;

        // Tagify instance for "created_by"
        const tagify = new Tagify(input, {
            tagTextProp: 'name',
            skipInvalid: true,
            dropdown: {
                closeOnSelect: false,
                enabled: 1,
                classname: 'users-list',
                searchKeys: ['name', 'email'],
                position: "text",
                mapValueTo: "email",
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate,
                dropdownHeader: dropdownHeaderTemplate
            },
            whitelist: [],
            transformTag: transformTagData,
            validate: validateTagData
        });

        function tagTemplate(tagData) {
            return `
                <tag title="${tagData.email}" contenteditable='false' spellcheck='false' tabIndex="-1" class="tagify__tag ${tagData.class || ""}" ${this.getAttributes(tagData)}>
                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                    <div>
                        <div class='tagify__tag__avatar-wrap'>
                            <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                        </div>
                        <span class='tagify__tag-text'>${tagData.name}</span>
                    </div>
                </tag>
            `;
        }

        function suggestionItemTemplate(tagData) {
            return `
                <div ${this.getAttributes(tagData)} class='tagify__dropdown__item ${tagData.class || ""}' tabindex="0" role="option">
                    ${tagData.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'><img onerror="this.style.visibility='hidden'" src="${tagData.avatar}"></div>` : ''}
                    <strong>${tagData.name}</strong>
                    <span>${tagData.email}</span>
                </div>
            `;
        }

        function dropdownHeaderTemplate(suggestions) {
            return `
                <header class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
                    <strong>${this.value.length ? `Add Remaining` : 'Add All'}</strong>
                    <a class='remove-all-tags'>Remove all</a>
                </header>
            `;
        }

        function transformTagData(tagData) {
            const { name, email } = parseFullValue(tagData.name);
            tagData.name = name;
            tagData.email = email || tagData.email;
        }

        function validateTagData(tagData) {
            const name = tagData?.name || '';
            const email = tagData?.email || '';
            if (!name) return "Missing name";
            if (!validateEmail(email)) return "Invalid email";
            return true;
        }

        function escapeHTML(s) {
            return typeof s === 'string' ? s
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/`|'/g, "&#039;")
                : s;
        }

        tagify.dropdown.createListHTML = (suggestionsList) => {
            const rolesOfUsers = suggestionsList.reduce((acc, suggestion) => {
                const role = suggestion.role || 'Not Assigned';
                acc[role] = acc[role] || [];
                acc[role].push(suggestion);
                return acc;
            }, {});

            const getUsersSuggestionsHTML = (roleUsers) => roleUsers.map((suggestion) => {
                suggestion.value = escapeHTML(tagify.dropdown.getMappedValue.call(tagify, suggestion));
                return tagify.settings.templates.dropdownItem.call(tagify, suggestion);
            }).join("");

            return Object.entries(rolesOfUsers).map(([role, roleUsers]) => {
                return `<div class="tagify__dropdown__itemsGroup" data-title="Role ${role}:">${getUsersSuggestionsHTML(roleUsers)}</div>`;
            }).join("");
        };

        tagify.on('input', debounce(async (e) => {
            const searchTerm = e.detail.value.trim();
            if (searchTerm.length < 2) return;

            tagify.settings.whitelist.length = 0;
            tagify.loading(true).dropdown.hide();

            try {
                const url = new URL("{{ route('admins.details') }}");
                url.searchParams.append("query", searchTerm);

                const response = await fetch(url.toString());
                const users = await response.json();

                if (!users || !Array.isArray(users.users)) {
                    console.error('Unexpected API response structure:', users);
                    return;
                }

                // Only include non-admin users
                const filteredUsers = users.users
                    .filter(user => user.role !== 'admin')
                    .map(user => formatUser(user, user.role || 'user'));

                tagify.settings.whitelist = filteredUsers;
                tagify.loading(false).dropdown.show(searchTerm);
            } catch (error) {
                console.error('Error fetching user data:', error);
                tagify.settings.whitelist = [];
                tagify.dropdown.show('Error fetching data. Try again later.');
            }
        }, 300));

        tagify.on('dropdown:select', (e) => {
            if (e.detail.event.target.matches('.remove-all-tags')) {
                tagify.removeAllTags();
            } else if (e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`)) {
                tagify.dropdown.selectAll();
            }
        });

        tagify.on('edit:start', ({ detail: { tag, data } }) => {
            tagify.setTagTextNode(tag, `${data.name} <${data.email}>`);
        });

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function parseFullValue(value) {
            const parts = value.split(/<(.*?)>/g);
            return {
                name: parts[0]?.trim() || '',
                email: parts[1]?.replace(/<(.*?)>/g, '').trim() || ''
            };
        }

        function formatUser(user, role) {
            return {
                value: user.id,
                name: `${user.first_name} ${user.last_name}`,
                avatar: user.profile_photo_path || 'https://via.placeholder.com/80',
                email: user.email,
                role
            };
        }

        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }
    })();
    </script>
    <!-- end created by tagify -->
    <script>
        const inputElm = document.querySelector("input[name='prepared_by']");

        const tagify = new Tagify(inputElm, {
            tagTextProp: 'name',
            skipInvalid: true,
            dropdown: {
                closeOnSelect: false,
                enabled: 1,
                classname: 'users-list',
                searchKeys: ['name', 'email'],
                position: "text",
                mapValueTo: "email",
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate,
                dropdownHeader: dropdownHeaderTemplate
            },
            whitelist: [],
            transformTag: transformTagData,
            validate: validateTagData
        });

        function tagTemplate(tagData) {
            return `
                <tag title="${tagData.email}" contenteditable='false' spellcheck='false' tabIndex="-1" class="tagify__tag ${tagData.class || ""}" ${this.getAttributes(tagData)}>
                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                    <div>
                        <div class='tagify__tag__avatar-wrap'>
                            <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                        </div>
                        <span class='tagify__tag-text'>${tagData.name}</span>
                    </div>
                </tag>
            `;
        }

        function suggestionItemTemplate(tagData) {
            return `
                <div ${this.getAttributes(tagData)} class='tagify__dropdown__item ${tagData.class || ""}' tabindex="0" role="option">
                    ${tagData.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'><img onerror="this.style.visibility='hidden'" src="${tagData.avatar}"></div>` : ''}
                    <strong>${tagData.name}</strong>
                    <span>${tagData.email}</span>
                </div>
            `;
        }

        function dropdownHeaderTemplate(suggestions) {
            return `
                <header class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
                    <strong>${this.value.length ? `Add Remaining` : 'Add All'}</strong>
                    <span>${suggestions.length} members</span>
                    <a class='remove-all-tags'>Remove all</a>
                </header>
            `;
        }

        function transformTagData(tagData) {
            const { name, email } = parseFullValue(tagData.name);
            tagData.name = name;
            tagData.email = email || tagData.email;
        }

        function validateTagData({ name, email }) {
            if (!email && name) {
                const parsed = parseFullValue(name);
                name = parsed.name;
                email = parsed.email;
            }
            if (!name) return "Missing name";
            if (!validateEmail(email)) return "Invalid email";
            return true;
        }

        function escapeHTML(s) {
            return typeof s === 'string' ? s
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/`|'/g, "&#039;")
                : s;
        }

        tagify.dropdown.createListHTML = (suggestionsList) => {
            const rolesOfUsers = suggestionsList.reduce((acc, suggestion) => {
                const role = suggestion.role || 'Not Assigned';
                acc[role] = acc[role] || [];
                acc[role].push(suggestion);
                return acc;
            }, {});

            const getUsersSuggestionsHTML = (roleUsers) => roleUsers.map((suggestion) => {
                suggestion.value = escapeHTML(tagify.dropdown.getMappedValue.call(tagify, suggestion));
                return tagify.settings.templates.dropdownItem.call(tagify, suggestion);
            }).join("");

            return Object.entries(rolesOfUsers).map(([role, roleUsers]) => {
                return `<div class="tagify__dropdown__itemsGroup" data-title="Role ${role}:">${getUsersSuggestionsHTML(roleUsers)}</div>`;
            }).join("");
        };

        tagify.on('input', debounce(async (e) => {
            const searchTerm = e.detail.value.trim();
            if (searchTerm.length < 2) return;

            tagify.settings.whitelist.length = 0;
            tagify.loading(true).dropdown.hide();

            try {
                const url = new URL("{{ route('admins.details') }}");
                url.searchParams.append("query", searchTerm);

                const response = await fetch(url.toString());
                const users = await response.json();

                if (!users || !Array.isArray(users.admin) || !Array.isArray(users.users)) {
                    console.error('Unexpected API response structure:', users);
                    return;
                }

                const formattedAdmins = users.admin.map(user => formatUser(user, 'admin'));
                const formattedUsers = users.users.map(user => formatUser(user, 'user'));

                tagify.settings.whitelist = [...formattedAdmins, ...formattedUsers];
                tagify.loading(false).dropdown.show(searchTerm);
            } catch (error) {
                console.error('Error fetching user data:', error);
                tagify.settings.whitelist = [];
                tagify.dropdown.show('Error fetching data. Try again later.');
            }
        }, 300));

        tagify.on('dropdown:select', onSelectSuggestion)
            .on('edit:start', onEditStart);

        function onSelectSuggestion(e) {
            if (e.detail.event.target.matches('.remove-all-tags')) {
                tagify.removeAllTags();
            } else if (e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`)) {
                tagify.dropdown.selectAll();
            }
        }

        function onEditStart({ detail: { tag, data } }) {
            tagify.setTagTextNode(tag, `${data.name} <${data.email}>`);
        }

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function parseFullValue(value) {
            const parts = value.split(/<(.*?)>/g);
            return {
                name: parts[0].trim(),
                email: parts[1]?.replace(/<(.*?)>/g, '').trim()
            };
        }

        function formatUser(user, role) {
            return {
                value: user.id,
                name: `${user.first_name} ${user.last_name}`,
                avatar: user.profile_photo_path || 'https://via.placeholder.com/80',
                email: user.email,
                role
            };
        }

        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }
    </script>
    <script>
        /**
         * Show a confirmation dialog and delete the operation type if confirmed.
         * @param {number|string} id - The ID of the operation type to delete.
         */
        function deleteOperationType(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        // Replace with your actual delete endpoint
                        const url = `/admin/delete-operation-type/${id}`;
                        const response = await fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (data.status === 'success') {
                            Swal.fire('Deleted!', 'Operation type has been deleted.', 'success');
                            // Optionally refresh the table or remove the row
                            $('#tbl-operation-types').DataTable().ajax.reload();
                        } else {
                            Swal.fire('Error', data.message || 'Failed to delete operation type.', 'error');
                        }
                    } catch (error) {
                        Swal.fire('Error', 'An error occurred while deleting.', 'error');
                    }
                }
            });
        }
    </script>
    <script>
        /**
         * JavaScript logic for dynamic dropdown population, data fetching, and UI interactions
         * in the company profile component.
         *
         * Features:
         * - Dynamically populates dropdowns for calendar years, operation types, operation categories,
         *   materials, chemicals, products, wastes, and operations based on company ID.
         * - Uses fetch API with CSRF protection to retrieve data from server endpoints.
         * - Handles dropdown population on focus/click to ensure up-to-date data.
         * - Provides utility functions for showing/hiding elements, scrolling, and displaying messages.
         * - Integrates DataTables for displaying operation types, categories, and operations log with
         *   custom rendering for actions (edit/delete).
         * - Includes logic for editing and deleting operation types, categories, and operation logs,
         *   with confirmation dialogs using SweetAlert.
         * - Formats dates and statuses for display in tables.
         * - Handles UI updates for product setup, operation log setup, and dynamic placeholders.
         *
         * Dependencies:
         * - jQuery
         * - DataTables
         * - SweetAlert2
         * - Bootstrap (for collapse and alert components)
         *
         * Assumptions:
         * - Server routes return JSON responses with expected data structures.
         * - Blade template provides a valid $company object with company_id.
         * - HTML structure includes elements with specific IDs and classes referenced in the script.
         */
        /**
         * Populates a dropdown element with options.
         * 
         * @param {HTMLElement} dropdown - The dropdown element to populate.
         * @param {Array} data - An array of objects representing the options. Each object should have a `value` and `label`.
         */
        function populateDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";

            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select a year";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);
            // Add options from the data
            data.calendar_years.forEach(item => {
                const option = document.createElement("option");
                option.value = item.calendar_year_id; // Use the value from the data
                option.textContent = item.name; // Use the label from the data
                dropdown.appendChild(option);
            });
            console.log("Dropdown populated with options:", data);
        }

        // Generic function to fetch data from a URL
        async function fetchFieldInput(url, options = {}) {
            try {
                const response = await fetch(url, {
                    method: options.method || "GET", // Default to GET
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        ...options.headers, // Include additional headers if provided
                    },
                    credentials: 'same-origin', // Include credentials for same-origin requests
                    ...options, // Merge any additional options
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();
                console.log("Fetched data:", data);
                return data;
            } catch (error) {
                console.error("Error fetching data:", error);
                throw error; // Re-throw the error to handle it in the calling function
            }
        }


        // Fetch calendar years on page load
        document.querySelectorAll('.calendar-year').forEach(dropdown => {
            dropdown.addEventListener('focus', async function () {
                console.log('Selection detected');
                const companyId = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding on the server
                console.log("Company ID:", companyId);

                const url = `/admin/get-calendar-years/${companyId}`;
                console.log("Fetching data from URL:", url);

                try {
                    const data = await fetchFieldInput(url);
                    console.log("Fetched calendar years:", data);
                    populateDropdown(dropdown, data);
                } catch (error) {
                    console.error("Error fetching calendar years:", error);
                }
            });
        });
        // end fetch calendar years on page load
        // fetch operation type
        // populate the dropdown
        function populateOperationTypeDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";
            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select operation type";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);
            // Add options from the data
            data.operation_types.forEach(item => {
                const option = document.createElement("option");
                option.value = item.operation_type_id; // Use the value from the data
                option.textContent = item.name; // Use the label from the data
                dropdown.appendChild(option);
            });
            console.log("Dropdown populated with options:", data);
        }
        // end populate dropdown
        // Fetch operation type on focus
        document.querySelectorAll('.operation-type').forEach(dropdown => {
            dropdown.addEventListener('focus', async () => {
                const companyId = "{{ json_encode($company->company_id) }}";
                const url = `/admin/get-operation-types/${companyId}`;
                console.log("Fetching operation types from URL:", url);

                try {
                    const data = await fetchFieldInput(url);
                    console.log("Fetched Operation Types:", data);
                    populateOperationTypeDropdown(dropdown, data);
                } catch (error) {
                    console.error("Error fetching operation types:", error);
                }
            });
        });
        // end fetch operation type

        // fetch operation category
        // populate the dropdown
        function populateOperationCategoryDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";
            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select operation category";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);
            // Add options from the data
            data.operation_categories.forEach(item => {
                const option = document.createElement("option");
                option.value = item.operation_category_id; // Use the value from the data
                option.textContent = item.name; // Use the label from the data
                dropdown.appendChild(option);
            });
            console.log("Dropdown populated with options:", data);
        }
        // end populate dropdown
        // Fetch operation category on focus
        document.querySelectorAll('.operation-category').forEach(dropdown => {
            dropdown.addEventListener('focus', async () => {
                console.log('Operation category dropdown focused');
                const companyId = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding
                const url = `/admin/get-operation-category/${companyId}`;
                console.log("Fetching data from URL:", url);

                try {
                    const data = await fetchFieldInput(url);
                    console.log("Fetched Operation Categories:", data);
                    populateOperationCategoryDropdown(dropdown, data);
                } catch (error) {
                    console.error("Error fetching operation categories:", error);
                }
            });
        });
        // Fetch material and populate dropdown
        function populateMaterialDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";

            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select material";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);

            // Add options from the data
            if (data.company_materials && Array.isArray(data.company_materials)) {
                data.company_materials.forEach(item => {
                    if (item.material != null) {
                        const option = document.createElement("option");
                        option.value = item.materialID || ""; // Use the value from the data
                        option.textContent = item.material.material || ""; // Use the label from the data
                        dropdown.appendChild(option);
                    }
                });
                console.log("Dropdown populated with materials:", data);
            } else {
                console.warn("Invalid materials data structure:", data);
            }
        }

        // Fetch material on page load
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".material-select").forEach(dropdown => {
                dropdown.addEventListener("focus", async () => {
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-materials/${companyID}`;

                    try {
                        const data = await fetchFieldInput(url);
                        populateMaterialDropdown(dropdown, data);
                    } catch (error) {
                        console.error("Error fetching materials:", error);
                        alert("Failed to load materials. Please try again.");
                    }
                });
            });
        });

        // Fetch chemical and populate dropdown
        function populateChemicalDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";

            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select chemical";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);

            // Add options from the data
            if (data.company_chemicals && Array.isArray(data.company_chemicals)) {
                data.company_chemicals.forEach(item => {
                    if (item.chemical) {
                        const option = document.createElement("option");
                        option.value = item.chemicalID || ""; // Use the value from the data
                        option.textContent = item.chemical.name || ""; // Use the label from the data
                        dropdown.appendChild(option);
                    }
                });
                console.log("Dropdown populated with chemicals:", data);
            } else {
                console.warn("Invalid data structure for chemicals:", data);
            }
        }

        // Fetch chemicals on page load
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".chemical-select").forEach(element => {
                element.addEventListener("focus", async () => {
                    // Dynamically retrieve the company ID
                    const companyID = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding on the server
                    console.log("Company ID:", companyID);
                    const url = `/admin/get-chemicals/${companyID}`;
                    console.log("Fetching data from URL:", url);
                    try {
                        const data = await fetchFieldInput(url); // Await the data fetch
                        console.log("Fetched Chemicals:", data);
                        // Populate the dropdown with the fetched data
                        populateChemicalDropdown(element, data);
                    } catch (error) {
                        console.error("Error fetching chemicals:", error);
                        alert("Failed to load chemicals. Please try again.");
                    }
                });
            });
        });
        // fetch product
        // populate the dropdown
        function populateProductDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";
            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select product";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);
            // Add options from the data
            data.products.forEach(item => {
                const option = document.createElement("option");
                option.value = item.product_id; // Use the value from the data
                option.textContent = item.name; // Use the label from the data
                dropdown.appendChild(option);
            });
            console.log("Dropdown populated with options:", data);
        }
        // end populate dropdown
        // Fetch product on page load
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.product-select').forEach(element => {
                element.addEventListener('focus', async () => {
                    const companyId = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding
                    const url = `/admin/get-product/${companyId}`;
                    console.log("Fetching data from URL:", url);

                    try {
                        const data = await fetchFieldInput(url);
                        console.log("Fetched Product:", data);

                        if (populateProductDropdown(element, data)) {
                            console.log("Product dropdown populated successfully.");
                        } else {
                            console.error("Failed to populate product dropdown.");
                        }
                    } catch (error) {
                        console.error("Error fetching product:", error);
                    }
                });
            });
        });

        async function populateWasteDropdown(ele, data) {
            // Clear existing options
            ele.innerHTML = "";

            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select waste";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            ele.appendChild(defaultOption);

            // Add options from the data
            data.company_wastes.forEach(item => {
                const option = document.createElement("option");
                option.value = item.company_waste_id; // Use the value from the data
                option.textContent = item.waste_name; // Use the label from the data
                ele.appendChild(option);
            });

            return "true";
            console.log("Dropdown populated with options:", data);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.waste-select').forEach(element => {
                element.addEventListener('focus', async function () {
                    console.log('Waste dropdown clicked:', element);

                    const companyId = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding
                    console.log("Company ID:", companyId);

                    const url = `/admin/get-waste/${companyId}`;
                    console.log("Fetching data from URL:", url);

                    try {
                        const data = await fetchFieldInput(url); // Assuming fetchFieldInput is defined
                        console.log("Fetched Waste:", data, element);

                        if (await populateWasteDropdown(element, data)) {
                            console.log("Waste dropdown populated successfully.");
                            element.dataset.populated = "true"; // Mark as populated
                        } else {
                            console.error("Failed to populate waste dropdown.");
                        }
                    } catch (error) {
                        console.error("Error fetching waste:", error);
                        alert("Failed to load waste data. Please try again.");
                    }
                });
            });
        });

        async function populateOperationDropdown(dropdown, data) {
            // Clear existing options
            dropdown.innerHTML = "";
            // Add a default placeholder option
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select operation";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            dropdown.appendChild(defaultOption);
            // Add options from the data
            data.company_operations.forEach(item => {
                const option = document.createElement("option");
                option.value = item.operation_id; // Use the value from the data
                option.textContent = item.operation_name; // Use the label from the data
                dropdown.appendChild(option);
            });
            console.log("Dropdown populated with options:", data);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.operation-select').forEach(dropdown => {
                let isLoading = false;

                dropdown.addEventListener('click', async function () {
                    if (isLoading || dropdown.dataset.populated === "true") return;

                    console.log('Operation dropdown clicked:', dropdown);
                    const companyId = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-operations/${companyId}`;
                    console.log("Fetching data from URL:", url);

                    isLoading = true;
                    try {
                        const data = await fetchFieldInput(url);
                        console.log("Fetched Operations:", data);
                        populateOperationDropdown(dropdown, data);
                        dropdown.dataset.populated = "true";
                    } catch (error) {
                        console.error("Error fetching operations:", error);
                        alert("Failed to load operation data. Please try again.");
                    } finally {
                        isLoading = false;
                    }
                });
            });
        });

        // triger product setup
        let new_product_setup_card = document.getElementById('new_product_setup_card');
        document.querySelector('#btn-setup-products').addEventListener('click', () => {
            new_product_setup_card.classList.remove('d-none');
            new_product_setup_card.scrollIntoView({ behavior: 'smooth' });
        });

        // Dynamically update placeholder based on currency selection
        document.getElementById('currency').addEventListener('change', function () {
            const currency = this.value;
            const priceInput = document.getElementById('product_price');
            priceInput.placeholder = `Enter product price in ${currency}`;
        });

        // Function to populate the product table
        function populateProductTable() {
            const tbody = document.querySelector("#tbl-products tbody");
            tbody.innerHTML = ""; // Clear existing content

            const companyId = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding
            const url = `/admin/get-product/${companyId}`;

            fetchFieldInput(url)
                .then(data => {
                    if (data.products && data.products.length > 0) {
                        data.products.forEach(product => {
                            tbody.innerHTML += `
                                <tr>
                                    <td>${product.name}</td>
                                    <td>${product.product_category.name}</td>
                                    <td>${product.currency} ${product.price}</td>
                                    <td>${product.quantity_per_unit}</td>
                                    <td>${product.unit}</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>`;
                        });
                    } else {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-center">No products available</td>
                            </tr>`;
                    }
                })
                .catch(error => console.error("Error fetching products:", error));
        }

        // Attach event listener for when the accordion section is shown
        document.getElementById('productListCollapse').addEventListener('shown.bs.collapse', populateProductTable);

        // show, hide, scroll to element and display message functions
        const showElement = (element) => element.classList.remove('d-none');
        const hideElement = (element) => element.classList.add('d-none');
        const scrollToElement = (element) => element.scrollIntoView({ behavior: 'smooth' });
        function displayMessage(type, message) {
            const messageContainer = document.getElementById('message-container');
            messageContainer.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
            setTimeout(() => (messageContainer.innerHTML = ''), 3000);
        }
        // end show, hide, scroll to element and display message functions

        // operation type and operation category
        // Initialize DataTable for operation type
        let table = $('#tbl-operation-types').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [3] } // Disable sorting on the "Action" column
            ],
            data: [], // Start with an empty data array
            columns: [
                { data: 'name' },
                { data: 'description' },
                { data: 'sequenceOrder' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editOperationType(${row.operation_type_id}, '${row.name}', '${row.description ?? ""}', '${row.sequenceOrder ?? "0"}')">
                                        <i class="las la-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmTypeDeletion(${row.operation_type_id}, '${row.name}')">
                                        <i class="las la-trash-alt"></i> Delete
                                    </button>
                                </div>`;
                    }
                }
            ]
        });
        // Function to create an object for each operation type
        function OperationTypeObject(operation_type_id, name, description, sequenceOrder) {
            this.operation_type_id = operation_type_id;
            this.name = name;
            this.description = description;
            this.sequenceOrder = sequenceOrder;
        }
        // Fetch data and populate table when the accordion is expanded
        document.getElementById('operationTypeCollapse').addEventListener('shown.bs.collapse', async () => {
            const companyId = "{{ json_encode($company->company_id) }}";
            const url = `/admin/get-operation-types/${companyId}`;
            const spinner = document.getElementById('loading-spinner');

            try {
                showElement(spinner);
                const data = await fetchFieldInput(url);

                if (data.status === "success") {
                    const operationTypes = data.operation_types.map(type => 
                        new OperationTypeObject(type.operation_type_id, type.name, type.description, type.sequence_order)
                    );

                    table.clear();
                    table.rows.add(operationTypes);
                    table.draw();
                }
            } catch (error) {
                console.error("Error fetching operation types:", error);
                displayMessage('danger', 'An error occurred while fetching data.');
            } finally {
                hideElement(spinner);
            }
        });
        // end fetch data and populate table when the accordion is expanded
        // Edit operation type
        function editOperationType(operation_type_id, name, description, sequenceOrder) {
            const editCard = document.getElementById('edit-operation-type-card');
            showElement(editCard);
            scrollToElement(editCard);
            const form = document.getElementById('edit_operation_type_form');
            form.querySelector('[name="operation_type_id"]').value = operation_type_id;
            form.querySelector('[name="operation_type_name"]').value = name;
            form.querySelector('[name="operation_type_description"]').value = description;
            form.querySelector('[name="operation_type_sequence_order"]').value = sequenceOrder ?? "0";
        }
        // Confirm deletion
        async function confirmTypeDeletion(operation_type_id, name) {
            const result = await Swal.fire({
                title: `Are you sure you want to delete "${name}"?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(`/admin/operation-type/${operation_type_id}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });

                    if (response.ok) {
                        Swal.fire('Deleted!', 'The operation type has been deleted.', 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'There was an issue deleting the operation type.', 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        }

        // Trigger operation setup card
        const setupCard = document.getElementById('operation-type-card');
        document.querySelector('#setup-operation-type').addEventListener('click', () => {
            showElement(setupCard);
            scrollToElement(setupCard);
        });

        // Initialize DataTable for operation categories
        const categoriesTable = $('#tbl-operation-categories').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            responsive: true,
            columnDefs: [{ orderable: false, targets: [2] }],
            data: [],
            columns: [
                { data: 'name' },
                { data: 'description' },
                {
                    data: null,
                    render: (data, type, row) => `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-primary btn-sm" 
                                    onclick="editOperationCategory(${row.operation_category_id}, '${row.name}', '${row.description}')">
                                <i class="las la-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm" 
                                    onclick="confirmCategoryDeletion(${row.operation_category_id}, '${row.name}')">
                                <i class="las la-trash-alt"></i> Delete
                            </button>
                        </div>`
                }
            ]
        });

        // Function to create an object for each operation category
        function OperationCategoryObject(operation_category_id, name, description) {
            this.operation_category_id = operation_category_id;
            this.name = name;
            this.description = description;
        }

        // Fetch data and populate table when the accordion is expanded
        document.getElementById('operationCategoryCollapse').addEventListener('shown.bs.collapse', async () => {
            console.log('Fetching operation categories...');
            const companyId = "{{ json_encode($company->company_id) }}";
            const url = `/admin/get-operation-category/${companyId}`;
            const categoriesSpinner = document.getElementById('loading-spinner');

            try {
                showElement(categoriesSpinner);
                const data = await fetchFieldInput(url);

                if (data.status === "success") {
                    const dataArray = data.operation_categories.map(
                        category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                    );

                    // Clear and add rows without destroying the table
                    categoriesTable.clear();
                    categoriesTable.rows.add(dataArray);
                    categoriesTable.draw();
                }
            } catch (error) {
                console.error("Error fetching operation categories:", error);
                displayMessage('danger', 'An error occurred while fetching data.');
            } finally {
                hideElement(categoriesSpinner);
            }
        });

        // Edit operation category
        function editOperationCategory(operation_category_id, name, description) {
            const editCategoryCard = document.getElementById('edit-operation-category-card');
            showElement(editCategoryCard);
            scrollToElement(editCategoryCard);

            const form = document.getElementById('edit_operation_category_form');
            form.querySelector('[name="operation_category_id"]').value = operation_category_id;
            form.querySelector('[name="operation_category_name"]').value = name;
            form.querySelector('[name="operation_category_description"]').value = description;
        }

        // Confirm deletion
        function confirmCategoryDeletion(operation_category_id, name) {
            Swal.fire({
                title: `Are you sure you want to delete ${name}?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/operation-category/${operation_category_id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Deleted!',
                                    'The operation category has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting the operation category.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'An unexpected error occurred.',
                                'error'
                            );
                        });
                }
            });
        }


        // Trigger operation category setup card
        let setupCategoryCard = document.getElementById('operation-category-card');
        document.querySelector('#setup-operation-category').addEventListener('click', () => {
            showElement(setupCategoryCard);
            scrollToElement(setupCategoryCard);
        });

        // Initialize DataTable for operations log
        let operationsLogTable = $('#tbl-operations-log').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [9] } // Disable sorting on the "Action" column
            ],
            data: [], // Start with an empty data array
            columns: [
                { data: 'operation_name' },
                { data: 'operation_code' },
                { data: 'operation_type' },
                { data: 'operation_category' },
                { data: 'operation_unit_cost' },
                { data: 'calendar_year' },
                { data: 'start_date' },
                { data: 'end_date' },
                { data: 'operation_status' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-info btn-sm" onclick="viewOperationLog()">
                                <i class="las la-eye"></i> View
                            </button>
                            <button class="btn btn-outline-primary btn-sm" onclick="editOperationLog(${row.operation_id}, '${row.operation_name}', '${row.operation_code}', '${row.operation_type}', '${row.operation_category}', '${row.operation_unit}', '${row.expected_waste_per_operation}', '${row.expected_water_usage_per_operation}', '${row.expected_unit_produced_for_goods}', '${row.calendar_year}', '${row.start_date}', '${row.end_date}', '${row.status}')">
                                <i class="las la-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="confirmOperationLogDeletion(${row.operation_id}, '${row.operation_name}')">
                                <i class="las la-trash-alt"></i> Delete
                            </button>
                        </div>`;
                    }
                }
            ]
        });

        // Define a class for the operation log objects
        class OperationLog {
            constructor(
                operation_id,
                operation_name,
                operation_code,
                operation_type,
                operation_category,
                operation_unit_cost,
                calendar_year,
                start_date,
                end_date,
                operation_status
            ) {
                this.operation_id = operation_id;
                this.operation_name = operation_name;
                this.operation_code = operation_code;
                this.operation_type = operation_type;
                this.operation_category = operation_category;
                this.operation_unit_cost = operation_unit_cost;
                this.calendar_year = calendar_year;
                this.start_date = formatDate(start_date);
                this.end_date = formatDate(end_date);
                this.operation_status = operation_status;
            }
        }

        function displayMessage(type, message, timeout = 5000) {
            const alertContainer = document.getElementById('alert-container');
            const alertBox = document.createElement('div');

            alertBox.className = `alert alert-${type} alert-dismissible fade show`;
            alertBox.role = "alert";
            alertBox.innerHTML = `
                    <strong>${type.charAt(0).toUpperCase() + type.slice(1)}:</strong> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;

            alertContainer.appendChild(alertBox);

            if (timeout) {
                setTimeout(() => {
                    alertBox.classList.remove('show');
                    alertBox.classList.add('d-none');
                }, timeout);
            }
        }

        function formatOperationStatus(status) {
            const statusMap = {
                active: '<span class="badge bg-success">Active</span>',
                inactive: '<span class="badge bg-secondary">Inactive</span>',
                pending: '<span class="badge bg-warning text-dark">Pending</span>',
                cancelled: '<span class="badge bg-danger">Cancelled</span>',
            };
            return statusMap[status?.toLowerCase()] ?? '<span class="badge bg-dark">Unknown</span>';
        }


        // Utility function to fetch data
        async function fetchOperationsLog(url) {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        }

        // Utility function to format waste details
        function formatWasteDetails(wasteData) {
            if (!Array.isArray(wasteData) || wasteData.length === 0) return "No waste generated";
            return wasteData
                .map(waste => `${waste.name || "Unknown"}: ${waste.quantity || 0}`)
                .join(", ");
        }

        // Utility function to format dates in "03 April, 2025" format
        function formatDate(dateString) {
            if (!dateString) return "N/A";
            const date = new Date(dateString);
            return new Intl.DateTimeFormat("en-US", { day: "2-digit", month: "long", year: "numeric" }).format(date);
        }

        // Event listener for accordion expansion
        document.getElementById('operationsLogCollapse').addEventListener('shown.bs.collapse', async () => {
            console.log('Fetching operations log...');
            const companyId = "{{ json_encode($company->company_id) }}";
            const url = `/admin/get-operations-log/${companyId}`;
            const spinner = document.getElementById('loading-spinner');

            showElement(spinner);

            try {
                const data = await fetchOperationsLog(url);
                if (data.status === "success") {
                    const operations = data.operations.map(log => new OperationLog(
                        log.company_operation_id || 0,
                        log.operation_name || "N/A",
                        log.operation_code || "N/A",
                        log.operation_type?.name || "Unknown Type",
                        log.operation_category?.name || "Unknown Category",
                        log.operation_unit_cost || 0,
                        log.calendar_year?.name || "N/A",
                        log.start_date || null,
                        log.end_date || null,
                        formatOperationStatus(log.operation_status)
                    ));

                    operationsLogTable.clear();
                    operationsLogTable.rows.add(operations);
                    operationsLogTable.draw();
                } else {
                    displayMessage('warning', 'No operations found.');
                }
            } catch (error) {
                console.error("Error fetching operations log:", error);
                displayMessage('danger', 'An error occurred while fetching operations log.');
            } finally {
                hideElement(spinner);
            }
        });

        // Setup operation log
        const operationLogCard = document.getElementById('operation-log-card');
        document.querySelector('#btn-setup-operation-log').addEventListener('click', () => {
            showElement(operationLogCard);
            scrollToElement(operationLogCard);
        });

        // Hide operation log card on page load
        document.addEventListener('DOMContentLoaded', () => hideElement(operationLogCard));

        // View operation log
        function viewOperationLog() {
            showElement(operationLogCard);
            scrollToElement(operationLogCard);
        }

        // Edit operation log
        function editOperationLog(
            operationId, operationName, operationCode, operationType, operationCategory,
            operationUnit, expectedWaste, expectedWaterUsage, expectedUnitsProduced,
            calendarYear, startDate, endDate, status
        ) {
            showElement(operationLogCard);
            scrollToElement(operationLogCard);

            const form = document.getElementById('operations-form-update');
            form.querySelector('[name="operation_id"]').value = operationId;
            form.querySelector('[name="operation_name"]').value = operationName;
            form.querySelector('[name="operation_code"]').value = operationCode;
            form.querySelector('[name="operation_type"]').value = operationType;
            form.querySelector('[name="operation_category"]').value = operationCategory;
            form.querySelector('[name="operation_unit"]').value = operationUnit;
            form.querySelector('[name="operation_unit_price"]').value = expectedWaste;
            form.querySelector('[name="operation_unit_cost"]').value = expectedWaterUsage;
            form.querySelector('[name="operation_unit_time"]').value = expectedUnitsProduced;
            form.querySelector('[name="calendar_year"]').value = calendarYear;
            form.querySelector('[name="start_date"]').value = startDate;
            form.querySelector('[name="end_date"]').value = endDate;
            form.querySelector('[name="status"]').value = status;
        }

        // Confirm deletion
        function confirmOperationLogDeletion(operationId, operationName) {
            Swal.fire({
                title: `Are you sure you want to delete "${operationName}"?`,
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(`Deleted operation log ID: ${operationId}`);
                    displayMessage('success', 'Operation log deleted successfully.');
                    // Add your delete logic here
                }
            });
        }
    </script>
    <script>
        /**
         * Calculates the total operation unit cost for an operation log.
         * - Sums up all cost fields (labour, overhead, maintenance, etc.)
         * - Adds total material and chemical costs (based on quantity/unit and unit cost)
         * - Divides total cost by total output quantity to get unit cost
         * - Updates the relevant fields in the form
         */
        function calculateOperationUnitCost() {
            console.log("Calculating operation unit cost...");

            // Fetch cost fields
            const costs = {
                labour: parseFloat(document.getElementById('labour_cost').value) || 0,
                overhead: parseFloat(document.getElementById('overhead_cost').value) || 0,
                maintenance: parseFloat(document.getElementById('maintenance_cost').value) || 0,
                depreciation: parseFloat(document.getElementById('depreciation_cost').value) || 0,
                supervision: parseFloat(document.getElementById('supervision_cost').value) || 0,
                variable: parseFloat(document.getElementById('variable_cost').value) || 0,
                fixed: parseFloat(document.getElementById('fixed_cost').value) || 0,
            };

            // Calculate material costs
            const totalMaterialCost = Array.from(document.querySelectorAll('.material-quantity-used-container-operation-log .row'))
                .reduce((total, row, i) => {
                    const quantity = parseFloat(row.querySelector(`[name="material_used[${i}][quantity]"]`).value) || 0;
                    const unitQuantity = parseFloat(row.querySelector(`[name="material_used[${i}][unit_quantity]"]`).value) || 1;
                    const unitCost = parseFloat(row.querySelector(`[name="material_used[${i}][unit_cost]"]`).value) || 0;
                    return total + (quantity / unitQuantity) * unitCost;
                }, 0);

            // Calculate chemical costs
            const totalChemicalCost = Array.from(document.querySelectorAll('.chemical-quantity-container-operation-log .row'))
                .reduce((total, row, i) => {
                    const quantity = parseFloat(row.querySelector(`[name="chemical_used[${i}][quantity]"]`).value) || 0;
                    const unitQuantity = parseFloat(row.querySelector(`[name="chemical_used[${i}][unit_quantity]"]`).value) || 1;
                    const unitCost = parseFloat(row.querySelector(`[name="chemical_used[${i}][unit_cost]"]`).value) || 0;
                    return total + (quantity / unitQuantity) * unitCost;
                }, 0);

            // Calculate total cost
            const totalCost = Object.values(costs).reduce((sum, cost) => sum + cost, 0) + totalMaterialCost + totalChemicalCost;
            document.getElementById('total_operation_cost').value = totalCost.toFixed(2);

            // Calculate total output quantity
            const totalOutputQuantity = Array.from(document.querySelectorAll('.operation-log-product-quantity-container .row'))
                .reduce((total, row, i) => {
                    return total + (parseFloat(row.querySelector(`[name="product_produced[${i}][quantity]"]`).value) || 0);
                }, 0);

            // Calculate and update operation unit cost
            if (totalOutputQuantity > 0) {
                const operationUnitCost = totalCost / totalOutputQuantity;
                document.getElementById('operation_unit_cost').value = operationUnitCost.toFixed(2);
            } else {
                document.getElementById('operation_unit_cost').value = "N/A";
            }
        }

        /**
         * Attaches input listeners to all relevant cost and quantity fields
         * to trigger recalculation when any value changes.
         */
        function attachListeners() {
            const fields = document.querySelectorAll(
                '#labour_cost, #overhead_cost, #maintenance_cost, #depreciation_cost, #supervision_cost, #variable_cost, #fixed_cost, ' +
                '[name^="material_used"][name$="[quantity]"], [name^="material_used"][name$="[unit_cost]"], ' +
                '[name^="chemical_used"][name$="[quantity]"], [name^="chemical_used"][name$="[unit_cost]"], ' +
                '[name="expected_quantity_produced_for_goods[]"]'
            );

            fields.forEach(field => {
                field.addEventListener('input', calculateOperationUnitCost);
            });
        }

        // Initialize listeners when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            attachListeners();
            calculateOperationUnitCost(); // Run calculation on initial load in case of preset values
        });

    </script>
    <script>
        // =========================
        // Company Profile JS Logic
        // =========================

        /**
         * =========================
         * Company Profile JS Logic
         * =========================
         * This section contains event handlers, AJAX logic, and UI helpers for managing
         * company profile features such as policies, objectives, benefits, materials,
         * contacts, water/chemical/material inventory, and dynamic UI interactions.
         * All logic is scoped to the company profile component.
         */
        // --- Company Policies ---
        /**
         * Handles toggling of company policy assignment.
         * Sends AJAX request to add or remove a policy for the company.
         */
        // company policies
        async function ChangePolicy(ele, company, policy) {
            console.log(ele, company, policy);

            const uri = ele.checked 
                ? "{{ route('admin.add-company-policy') }}" 
                : "{{ route('admin.remove-company-policy') }}";

            if (!ele.checked && !confirm("Do you want to remove this policy?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('policy', policy);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--policy", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end company policies
        // Company Objectives
        async function changeObjectives(element, company, objective) {
            console.log(element, company, objective);

            const uri = element.checked 
                ? "{{ route('admin.add-company-objective') }}" 
                : "{{ route('admin.remove-company-objective') }}";

            if (!element.checked && !confirm("Do you want to remove this objective?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('objective', objective);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--objective", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end company objectives
        // Area of Utmost Benefit
        async function ChangeUtmostBenefit(ele, company, benefit) {
            console.log(ele, company, benefit);

            const uri = ele.checked 
                ? "{{ route('admin.add-recp-project') }}" 
                : "{{ route('admin.remove-recp-project') }}";

            if (!ele.checked && !confirm("Do you want to remove this area of benefit?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('areas_of_company_benefit', benefit);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--benefit", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end area of utmost benefit

        // Human & Environmental and Health Benefit
        async function ChangeEnvironmentalBenefit(ele, company, benefit) {
            console.log(ele, company, benefit);

            const uri = ele.checked 
                ? "{{ route('admin.add-recp-environmental') }}" 
                : "{{ route('admin.remove-recp-environmental') }}";

            if (!ele.checked && !confirm("Do you want to remove this benefit?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('enviromental_benefit_title', benefit);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--benefit", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end human & environmental and health benefit

        // Good House Keeping
        async function ChangeGoodHouseKeeping(ele, company, houseKeeping) {
            console.log(ele, company, houseKeeping);

            const uri = ele.checked 
                ? "{{ route('admin.add-house-keeping') }}" 
                : "{{ route('admin.remove-house-keeping') }}";

            if (!ele.checked && !confirm("Do you want to remove House keeping?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('house_keeping_title', houseKeeping);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--house keeping", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end good house keeping

        // Waste Reduction Measures
        async function ChangeWasteReductionMeasures(ele, company, measure) {
            console.log(ele, company, measure);

            const uri = ele.checked 
                ? "{{ route('admin.add-waste-reduction-measure') }}" 
                : "{{ route('admin.remove-waste-reduction-measure') }}";

            if (!ele.checked && !confirm("Do you want to remove this waste reduction measure?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('waste_reduction_measure', measure);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--Waste Reduction Measure", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end waste reduction measures

        // Waste disposal method
        async function ChangeWasteDisposalMethod(ele, company, disposal_method) {
            console.log(ele, company, disposal_method);

            const uri = ele.checked 
                ? "{{ route('admin.add-waste-disposal-method') }}" 
                : "{{ route('admin.remove-waste-disposal-method') }}";

            if (!ele.checked && !confirm("Do you want to remove waste management method?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('waste_management_method', disposal_method);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--Waste Disposal Method", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end waste disposal method

        // Product recovery measures
        async function ChangeProductRecoveryMeasure(ele, company, measure) {
            console.log(ele, company, measure);

            const uri = ele.checked 
                ? "{{ route('admin.add-product-recovery-measure') }}" 
                : "{{ route('admin.remove-product-recovery-measure') }}";

            if (!ele.checked && !confirm("Do you want to remove product recovery measure?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('product_recovery_measure', measure);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--product recovery measure", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end product recovery measures
        // Show toast message
        function showToast(message, type) {
            const colors = {
                success: "linear-gradient(to right, #00b09b, #96c93d)",
                error: "linear-gradient(to right, #ff0000, #ff1745)"
            };

            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: colors[type] || colors.error,
                },
            }).showToast();
        }
        // end show toast message

        // Key Areas for Improvement
        document.querySelector('.add_more_key_areas').addEventListener('click', async () => {
            const keyAreaInput = document.querySelector('#key_area_for_improvent');
            const keyAreaValue = keyAreaInput.value.trim();

            if (!keyAreaValue) {
                Toastify({
                    text: "Key area cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return;
            }

            const url = `{{ route('admin.add-improvement-key-area') }}`;
            const formData = new FormData();
            formData.append('company', '{{$company->company_id}}');
            formData.append('key_area', keyAreaValue);

        await fetch_cycle('--Add Key Area', url, 'POST', formData).then(result => {
                if (result.key_areas) {
                    const container = document.querySelector('.key-areas-container');
                    container.innerHTML = result.key_areas.map(element => `
                        <div class="row g-2 my-1">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${element.area_title}" 
                                        placeholder="Key area for improving performance in your industry" 
                                        onblur='update_key_area("{{$company->company_id}}", ${element.improvementAreaID}, this)'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-danger" 
                                    onclick='remove_key_area(this, ${element.improvementAreaID})' type="button">
                                    <i class="iconoir-trash"></i>
                                </button>
                            </div>
                        </div>
                    `).join('');
                }
            });
        });
        // ***** End Add key area ******//

        // ***** Update key area ******//
        async function updateKeyArea(company, keyAreaId, element) {
            const keyAreaValue = element.value.trim();

            if (!keyAreaValue) {
                showToast("Key area cannot be empty.", "error");
                return;
            }

            const url = `{{ route('admin.update-improvement-key-area') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('key_area_id', keyAreaId);
            formData.append('key_area', keyAreaValue);

        await fetch_cycle('--Update Key Area', url, 'POST', formData)
                .then(result => console.log(result))
                .catch(error => console.error('Error updating key area:', error));
        }
        // ***** End Update key area ******//
        function removeKeyArea(element, keyAreaId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this area of performance improvement?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const parentElement = element.closest('.row');
                    const url = `{{ route('admin.remove-improvement-key-area') }}`;
                    const formData = new FormData();
                    formData.append('key_area_id', keyAreaId);

                    try {
                        const response = await fetch_cycle('--Remove Key Area', url, 'POST', formData);
                        if (response.status === 'success') {
                            parentElement.remove();
                            Swal.fire(
                                'Deleted!',
                                'The area of performance improvement has been deleted.',
                                'success'
                            );
                        } else {
                            console.error('Failed to remove key area:', response);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            });
        }
        // end Key Areas for Improvement

        // key Product Innovation
        // ***** Add ******//
        document.querySelector('.add_more_key_innovation').addEventListener('click', async () => {
            const keyProductInnovationInput = document.querySelector('#key_product_innovation');
            const keyProductInnovationValue = keyProductInnovationInput.value.trim();

            if (!keyProductInnovationValue) {
                Toastify({
                    text: "Key Product innovation cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return;
            }

            const url = `{{ route('admin.add-product-innovation') }}`;
            const formData = new FormData();
            formData.append('company', '{{$company->company_id}}');
            formData.append('key_product_innovation', keyProductInnovationValue);

            try {
                const result = await fetch_cycle('--Add Key Product Innovation', url, 'POST', formData);
                if (result.product_innovation) {
                    const container = document.querySelector('.product-innovation-container');
                    container.innerHTML = result.product_innovation.map(element => `
                        <div class="row g-2 my-1">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${element.innovation_area_title}" 
                                        placeholder="Key innovation that enhance your product's environmental compatibility" 
                                        onblur='update_product_innovation("{{$company->company_id}}", ${element.innovationAreaID}, this)'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-danger" onclick='remove_product_innovation(this, ${element.innovationAreaID})' type="button">
                                    <i class="iconoir-trash"></i>
                                </button>
                            </div>
                        </div>`).join('');
                }
            } catch (error) {
                console.error("Error adding product innovation:", error);
            }
        });
        // ***** End Add key Product Innovation ******//
        // ***** Update Key Product Innovation ******//
        function updateProductInnovation(company, productInnovationId, element) {
            const innovationValue = element.value.trim();
            if (!innovationValue) {
                showToast("Key product innovation cannot be empty.", "error");
                return;
            }

            const url = `{{ route('admin.update-product-innovation') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('key_product_innovation_id', productInnovationId);
            formData.append('key_product_innovation', innovationValue);

            fetchCycle('--Update Key Product Innovation', url, 'POST', formData)
                .then(result => console.log(result))
                .catch(error => console.error('Error updating product innovation:', error));
        }
        // ***** End Update Key Product Innovation ******//
        // ***** Remove Key Product Innovation ******//
        function removeProductInnovation(element, productInnovationId) {
            if (!confirm("Do you want to delete this area of performance improvement?")) return;

            const parent = element.closest('.row');
            const url = `{{ route('admin.remove-product-innovation') }}`;
            const formData = new FormData();
            formData.append('key_product_innovation_id', productInnovationId);

            fetchCycle('--Remove Product Innovation', url, 'POST', formData)
                .then(result => {
                    if (result.status === 'success') {
                        parent.remove();
                    }
                })
                .catch(error => console.error('Error removing product innovation:', error));
        }
        // End Product Innovation
        // key Hazarduous Material
        // ***** Add Hazardous Material ******//
        document.querySelector('.add_more_hazardous_material').addEventListener('click', () => {
            const hazardousMaterialInput = document.querySelector('#hazarduous_material');
            const hazardousMaterialValue = hazardousMaterialInput.value.trim();

            if (!hazardousMaterialValue) {
                Toastify({
                    text: "Hazardous material field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return;
            }

            const url = `{{ route('admin.add-hazarduous-material') }}`;
            const formData = new FormData();
            formData.append('company', '{{$company->company_id}}');
            formData.append('hazarduous_material', hazardousMaterialValue);

            fetch_cycle('--Add Hazardous Material', url, 'POST', formData).then(result => {
                if (result.hazarduous_materials) {
                    const container = document.querySelector('.hazarduous-material-container');
                    container.innerHTML = result.hazarduous_materials.map(element => `
                        <div class="row g-2 my-1">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${element.material_title}" 
                                        placeholder="Key innovation that enhances your product's environmental compatibility" 
                                        onblur='update_hazarduous_material("{{$company->company_id}}", ${element.hazarduousMaterialID}, this)'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-danger" onclick='remove_harzardous_material(this, ${element.hazarduousMaterialID})' type="button">
                                    <i class="iconoir-trash"></i>
                                </button>
                            </div>
                        </div>`).join('');
                }
            }).catch(error => {
                console.error("Error adding hazardous material:", error);
            });
        });
        // ***** End Add Hazardous Material ******//
        // ***** Update Hazardous Material ******//
        function updateHazardousMaterial(company, hazardousMaterialId, element) {
            const hazardousMaterialValue = element.value.trim();
            if (!hazardousMaterialValue) {
                showToast("Hazardous material field cannot be empty.", "error");
                return;
            }

            const url = `{{ route('admin.update-hazarduous-material') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('hazarduous_material_id', hazardousMaterialId);
            formData.append('hazarduous_material', hazardousMaterialValue);

            fetch_cycle('--Update Hazardous Material', url, 'POST', formData)
                .then(result => console.log(result))
                .catch(error => console.error('Error updating hazardous material:', error));
        }
        // ***** End Update Hazardous Material ******//
        // ***** Remove Hazardous Material ******//
        function removeHazardousMaterial(element, hazardousMaterialId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this hazardous material?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const parent = element.closest('.row');
                    const url = `{{ route('admin.remove-hazarduous-material') }}`;
                    const formData = new FormData();
                    formData.append('hazarduous_material_id', hazardousMaterialId);

                    fetch(url, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.status === 'success') {
                            parent.remove();
                            Swal.fire(
                                'Deleted!',
                                'Hazardous material removed successfully.',
                                'success'
                            );
                        } else {
                            console.error('Failed to remove hazardous material:', result);
                            Swal.fire(
                                'Error!',
                                'Failed to remove hazardous material.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error removing hazardous material:', error);
                        Swal.fire(
                            'Error!',
                            'An unexpected error occurred.',
                            'error'
                        );
                    });
                }
            });
        }
        // End Hazardous Material
        // Unit Process Management
        document.querySelector('.add_more_unit_process').addEventListener('click', () => {
            const unitProcessValue = document.querySelector('#unit_process').value.trim();
            if (!unitProcessValue) {
                showToast("Unit process field cannot be empty.", "error");
                return;
            }

            const url = `{{ route('admin.add-unit-process') }}`;
            const formData = new FormData();
            formData.append('company', '{{$company->company_id}}');
            formData.append('unit_process', unitProcessValue);

            fetch_cycle('--Add Unit Process', url, 'POST', formData)
                .then(result => {
                    if (result.unit_processes) {
                        updateUnitProcessContainer(result.unit_processes);
                    }
                })
                .catch(error => console.error('Error adding unit process:', error));
        });
        // ***** End Add Unit Process ******//
        // ***** Update Unit Process ******//
        function updateUnitProcessContainer(unitProcesses) {
            const container = document.querySelector('.unit-process-container');
            container.innerHTML = unitProcesses.map(element => `
                <div class="row g-2 my-1">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" value="${element.unit_process_title}" 
                                placeholder="Unit process" 
                                onblur='updateUnitProcess("{{$company->company_id}}", ${element.unitProcessID}, this)'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-outline-danger" 
                            onclick='removeUnitProcess(this, ${element.unitProcessID})' type="button">
                            <i class="iconoir-trash"></i>
                        </button>
                    </div>
                </div>`).join('');
        }
        // ***** End Update Unit Process ******//
        // ***** Update Unit Process ******//
        function updateUnitProcess(company, unitProcessId, element) {
            const unitProcessValue = element.value.trim();
            if (!unitProcessValue) {
                showToast("Unit process field cannot be empty.", "error");
                return;
            }

            const url = `{{ route('admin.update-unit-process') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('unit_process_id', unitProcessId);
            formData.append('unit_process', unitProcessValue);

            fetch_cycle('--Update Unit Process', url, 'POST', formData)
                .then(result => console.log(result))
                .catch(error => console.error('Error updating unit process:', error));
        }
        // ***** End Update Unit Process ******//
        // ***** Remove Unit Process ******//
        function removeUnitProcess(element, unitProcessId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this unit process?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const parent = element.closest('.row');
                    const url = `{{ route('admin.remove-unit-process') }}`;
                    const formData = new FormData();
                    formData.append('unit_process_id', unitProcessId);

                    fetch_cycle('--Remove Unit Process', url, 'POST', formData)
                        .then(result => {
                            if (result.status === 'success') {
                                parent.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'The unit process has been deleted.',
                                    'success'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error removing unit process:', error);
                            Swal.fire(
                                'Error!',
                                'An unexpected error occurred.',
                                'error'
                            );
                        });
                }
            });
        }
        // End Unit Process Management
        // Problem Summary & Suggested Solution
        document.querySelector('.add_more_problem_solution').addEventListener('click', () => {
            const problemSummary = document.querySelector('#problem_summary').value.trim();
            const suggestedSolution = document.querySelector('#suggested_solution').value.trim();

            if (!problemSummary || !suggestedSolution) {
                Toastify({
                    text: !problemSummary ? "Problem summary field cannot be empty." : "Suggested solution field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                }).showToast();
                return;
            }
            if (problemSummary.length < 5) {
                Toastify({
                    text: "Problem summary must be at least 5 characters long.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                }).showToast();
                return;
            }
            const url = `{{ route('admin.add-problem-solution') }}`;
            const formData = new FormData();
            formData.append('company', '{{$company->company_id}}');
            formData.append('problem_summary', problemSummary);
            formData.append('suggested_solution', suggestedSolution);

            fetch_cycle('--Add Problem Solution', url, 'POST', formData).then(result => {
                if (result.problems_solutions) {
                    const container = document.querySelector('.problems-solutions-container');
                    container.innerHTML = result.problems_solutions.map(element => `
                        <div class="row g-2 my-1 align-items-end">
                            <div class="col-md-5">
                                <label for="">Problem Summary</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${element.problem_title}" placeholder="Problem Summary" 
                                        onblur='updateProblemSummary("{{$company->company_id}}", ${element.problemSolutionID}, this)'>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="">Suggested Solution</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${element.solution_title}" placeholder="Suggested Solution" 
                                        onblur='updateSuggestedSolution("{{$company->company_id}}", ${element.problemSolutionID}, this)'>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-danger" onclick='removeProblemSolution(this, ${element.problemSolutionID})' type="button">
                                    <i class="iconoir-trash"></i>
                                </button>
                            </div>
                        </div>
                    `).join('');
                }
            });
        });
        // ***** End Add Problem Summary & Suggested Solution ******//
        // ***** Update Problem Summary ******//
        function updateProblemSummary(company, problemSolutionId, element) {
            const problemSummary = element.value.trim();
            if (!problemSummary) {
                Toastify({
                    text: "Problem summary field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                }).showToast();
                return;
            }

            const url = `{{ route('admin.update-problem-summary') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('problem_solution_id', problemSolutionId);
            formData.append('problem_summary', problemSummary);

            fetch_cycle('--Update Problem Summary', url, 'POST', formData).then(result => console.log(result));
        }
        // ***** End Update Problem Summary ******//
        // ***** Update Suggested Solution ******//
        function updateSuggestedSolution(company, problemSolutionId, element) {
            const suggestedSolution = element.value.trim();
            if (!suggestedSolution) {
                Toastify({
                    text: "Suggested solution field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                }).showToast();
                return;
            }

            const url = `{{ route('admin.update-suggested-solution') }}`;
            const formData = new FormData();
            formData.append('company', company);
            formData.append('problem_solution_id', problemSolutionId);
            formData.append('suggested_solution', suggestedSolution);

            fetch_cycle('--Update Suggested Solution', url, 'POST', formData).then(result => console.log(result));
        }
        // ***** End Update Suggested Solution ******//
        // ***** Remove Problem Solution ******//
        function removeProblemSolution(element, problemSolutionId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this Problem Summary with its Suggested Solution?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = `{{ route('admin.remove-problem-solution') }}`;
                    const formData = new FormData();
                    formData.append('problem_solution_id', problemSolutionId);

                    fetch_cycle('--Remove Problem Solution', url, 'POST', formData).then(result => {
                        if (result.status === 'success') {
                            element.closest('.row').remove();
                            Swal.fire(
                                'Deleted!',
                                'The Problem Summary and its Suggested Solution have been deleted.',
                                'success'
                            );
                        }
                    });
                }
            });
        }
        // ***** End Remove Problem Solution ******//
        // Material Submission
        document.querySelector('#btn-submit-material').addEventListener('click', () => {
            console.log("Material submission triggered");
            const loader = document.getElementById('loader');
            loader.style.display = 'inline-block';

            const companyID = document.querySelector('input[name="company_id"]').value.trim();
            const materialID = document.querySelector('select[name="material"]').value.trim();
            const serialNo = document.querySelector('input[name="serial_number"]').value.trim();
            const unit = document.querySelector('input[name="unit_of_measurement"]').value.trim();
            const threshold = document.querySelector('input[name="threshold"]').value.trim();

            if (!companyID || !materialID) {
                const errorMessage = !companyID ? "Company ID field cannot be empty." : "Material field cannot be empty.";
                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                loader.style.display = 'none';
                return;
            }

            const url = "{{ route('admin.save-company-material') }}";
            const formData = new FormData();
            formData.append('companyID', companyID);
            formData.append('material', materialID);
            formData.append('serial_number', serialNo);
            formData.append('unit_of_measurement', unit);
            formData.append('threshold', threshold);

            fetch_cycle('--Save Company Material', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';

                if (result.company_material) {
                    const tableBody = document.querySelector('#tbl-company-material tbody');
                    tableBody.innerHTML = result.company_material.map(material => {
                        const id = material.companyMaterialId;
                        const viewUrl = "{{ route('admin.view-material', ['material' => '__PLACEHOLDER__']) }}".replace('__PLACEHOLDER__', id);

                        return `
                            <tr>
                                <td>${material.material}</td>
                                <td>${material.serial_number || ''}</td>
                                <td>${material.unit_of_measure || ''}</td>
                                <td>
                                    <span class="badge bg-${material.company_material_status === 'active' ? 'success' : 'danger'}">
                                        ${material.company_material_status}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="${viewUrl}">Open Material</a>
                                            <a class="dropdown-item" href="#">Update Material</a>
                                            <a class="dropdown-item" href="#">Delete Material</a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item" href="#" onclick='triggerMaterialPrice("${id}")'>Setup Price</a>
                                            <a class="dropdown-item" href="#" onclick='triggerCheckIn("${id}", "${material.materialID}", "${material.companyID}", "${material.material}")'>Check In Item</a>
                                            <a class="dropdown-item" href="#" onclick='triggerCheckOut("${id}", "${material.materialID}", "${material.companyID}", "${material.material}")'>Check Out Item</a>
                                            <a class="dropdown-item" href="#" onclick='triggerAdjustment("${id}", "${material.materialID}", "${material.companyID}", "${material.material}")'>Make Adjustment</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }
            });
        });
        // end Material Submission

        // Company Material Price
        const btnSubmitMaterialPrice = document.querySelector('#btn-submit-material-price');
        btnSubmitMaterialPrice.addEventListener('click', () => {
            console.log("Material price submission triggered");

            const loader = document.querySelector('#materialPriceModal #loader');
            loader.style.display = 'inline-block';

            const materialPriceId = document.querySelector('input[name="material_price_id"]').value.trim();
            const unit = document.querySelector('input[name="unit"]').value.trim();
            const price = document.querySelector('input[name="price"]').value.trim();
            const date = document.querySelector('input[name="date"]').value.trim();

            if (!materialPriceId || !unit || !price) {
                const errorMessage = !materialPriceId
                    ? "Material price ID field cannot be empty."
                    : !unit
                    ? "Unit field cannot be empty."
                    : "Price field cannot be empty.";

                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();

                loader.style.display = 'none';
                return;
            }

            const url = "{{ route('admin.save-company-material-price') }}";
            const formData = new FormData();
            formData.append('companyMaterialID', materialPriceId);
            formData.append('unit', unit);
            formData.append('price', price);
            formData.append('date', date);

            fetch_cycle('--Save Material Price', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
        // End Company Material Price

        // Check-in functionality
        document.querySelector('#btn-submit-check-in').addEventListener('click', async () => {
            console.log("Check-in button clicked");

            const loader = document.querySelector('#checkInModal #loader');
            loader.style.display = 'inline-block';

            const checkInMaterialId = document.querySelector('#checkInModal input[name="checkIn_material_id"]').value.trim();
            const materialId = document.querySelector('#checkInModal input[name="material_id"]').value.trim();
            const companyId = document.querySelector('#checkInModal input[name="company_id"]').value.trim();
            const quantity = document.querySelector('#checkInModal input[name="quantity"]').value.trim();
            const date = document.querySelector('#checkInModal input[name="date"]').value.trim();
            const remark = document.querySelector('#checkInModal input[name="remark"]').value.trim();

            // Validation
            const validationMessages = [];
            if (!checkInMaterialId) validationMessages.push("Material ID field cannot be empty.");
            if (!quantity) validationMessages.push("Quantity field cannot be empty.");
            if (!date) validationMessages.push("Date field cannot be empty.");

            if (validationMessages.length > 0) {
                validationMessages.forEach(message => {
                    Toastify({
                        text: message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                });
                loader.style.display = 'none';
                return;
            }

            // Prepare data and send request
            const url = "{{ route('admin.save-company-material-check-in') }}";
            const formData = new FormData();
            formData.append('checkIn_material_id', checkInMaterialId);
            formData.append('material_id', materialId);
            formData.append('company_id', companyId);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);

            try {
                const result = await fetch_cycle('--Create Check In', url, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error during check-in:", error);
            } finally {
                loader.style.display = 'none';
            }
        });
        // End check-in functionality
        // Company material checkout
        document.querySelector('#btn-submit-check-out').addEventListener('click', async () => {
            console.log("Checkout button clicked");

            const loader = document.querySelector('#checkOutModal #loader');
            loader.style.display = 'inline-block';

            const checkOutMaterialId = document.querySelector('#checkOutModal input[name="checkOut_material_id"]').value.trim();
            const materialId = document.querySelector('#checkOutModal input[name="material_id"]').value.trim();
            const companyId = document.querySelector('#checkOutModal input[name="company_id"]').value.trim();
            const quantity = document.querySelector('#checkOutModal input[name="quantity"]').value.trim();
            const date = document.querySelector('#checkOutModal input[name="date"]').value.trim();
            const remark = document.querySelector('#checkOutModal input[name="remark"]').value.trim();

            const validationMessages = [];
            if (!checkOutMaterialId) validationMessages.push("Material ID field cannot be empty.");
            if (!quantity) validationMessages.push("Quantity field cannot be empty.");
            if (!date) validationMessages.push("Date field cannot be empty.");

            if (validationMessages.length > 0) {
                validationMessages.forEach(message => {
                    Toastify({
                        text: message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                });
                loader.style.display = 'none';
                return;
            }

            const url = "{{ route('admin.save-company-material-check-out') }}";
            const formData = new FormData();
            formData.append('checkOut_material_id', checkOutMaterialId);
            formData.append('material_id', materialId);
            formData.append('company_id', companyId);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);

            try {
                const result = await fetch_cycle('--Create Check Out', url, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error during checkout:", error);
            } finally {
                loader.style.display = 'none';
            }
        });
        // End checkout

        // General Settings Update
        const btnGeneralSettings = document.querySelector('#btn-general-settings');
        btnGeneralSettings.addEventListener('click', () => {
            const loader = document.querySelector('#general-settings #loader');
            loader.style.display = 'inline-block';

            const formData = new FormData(document.querySelector('#general-settings'));
            const requiredFields = [
                { name: 'company_id', message: "Company ID field cannot be empty." },
                { name: 'company_name', message: "Company name field cannot be empty." },
                { name: 'industry', message: "Industry field cannot be empty." },
                { name: 'email', message: "Company email field cannot be empty." },
                { name: 'primary_phone_number', message: "Primary phone number field cannot be empty." },
                { name: 'number_of_employees', message: "Number of employees field cannot be empty." },
                { name: 'date_of_establishment', message: "Establishment date field cannot be empty." }
            ];

            for (const field of requiredFields) {
                if (!formData.get(field.name)?.trim()) {
                    loader.style.display = 'none';
                    Toastify({
                        text: field.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                    return;
                }
            }

            const url = document.querySelector('#general-settings').action;

            fetch_cycle('--Update Personal Company Details', url, 'POST', formData)
                .then(result => {
                    console.log(result, result.companies_info);
                    loader.style.display = 'none';
                });
        });
        // End General Settings Update

        // Company location update
        document.querySelector('#btn-location-settings').addEventListener('click', () => {
            const loader = document.querySelector('#location_settings #loader');
            loader.style.display = 'inline-block';

            const formData = new FormData(document.querySelector('#location_settings'));
            const requiredFields = [
                { name: 'company_id', message: "Company ID field cannot be empty." },
                { name: 'country', message: "Country field cannot be empty." },
                { name: 'state', message: "State field cannot be empty." },
                { name: 'city', message: "City field cannot be empty." },
                { name: 'address', message: "Address field cannot be empty." }
            ];

            for (const field of requiredFields) {
                if (!formData.get(field.name)?.trim()) {
                    loader.style.display = 'none';
                    Toastify({
                        text: field.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                    return;
                }
            }

            fetch_cycle('--Update Company Location', document.querySelector('#location_settings').action, 'POST', formData)
                .then(result => {
                    console.log(result);
                    loader.style.display = 'none';
                });
        });

        // Company contact update
        document.querySelector('#btn_contact_settings').addEventListener('click', () => {
            const loader = document.querySelector('#contact_settings #loader');
            loader.style.display = 'inline-block';

            const formData = new FormData(document.querySelector('#contact_settings'));
            const requiredFields = [
                { name: 'company_id', message: "Company ID field cannot be empty." },
                { name: 'enviromental_operations_manager', message: "Environmental operations manager field cannot be empty." },
                { name: 'contact_person_name', message: "Contact person name field cannot be empty." },
                { name: 'contact_person_position', message: "Contact person position field cannot be empty." },
                { name: 'contact_person_phone_number', message: "Contact person phone number field cannot be empty." }
            ];

            for (const field of requiredFields) {
                if (!formData.get(field.name)?.trim()) {
                    loader.style.display = 'none';
                    Toastify({
                        text: field.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                    return;
                }
            }

            fetch_cycle('--Update Contact Personnel', document.querySelector('#contact_settings').action, 'POST', formData)
                .then(result => {
                    console.log(result);
                    loader.style.display = 'none';
                });
        });
        // activate and deactivate start
        // end activate and deactivate start
        async function fetch_cycle(subject, url, method, formData) {
            try {
                const response = await fetch(url, {
                    method: method,
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();

                // Handle feedback
                const toastOptions = {
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                };

                if (data.status === 'success') {
                    Toastify({
                        ...toastOptions,
                        text: data.message,
                        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" },
                    }).showToast();
                    return data;
                } else if (data.status === 'error') {
                    console.error(data.errors);
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            ...toastOptions,
                            text: error,
                            style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error('Fetch error:', error);
                Toastify({
                    text: "An unexpected error occurred.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: { background: "linear-gradient(to right, #ff0000, #ff1745)" },
                }).showToast();
            }
        }
        // End fetchCycle function

        // -----Country Code Selection
        const initializeIntlTelInput = (inputElement, hiddenInputName) => {
            const intlTelInstance = window.intlTelInput(inputElement, {
                initialCountry: "ng",
                separateDialCode: true,
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
            });

            inputElement.addEventListener("blur", () => {
                const fullPhoneNumber = intlTelInstance.getNumber(); // Gets the full number in E.164 format
                console.log("Full phone number:", fullPhoneNumber);
                document.querySelector(`input[name="${hiddenInputName}"]`).value = fullPhoneNumber;
            });

            return intlTelInstance;
        };
        // Initialize intlTelInput for primary, secondary, and contact phone numbers
        const telPrimary = document.querySelector('#mobile_code_primary');
        const telSecondary = document.querySelector('#mobile_code_secondary');
        const telContact = document.querySelector('#mobile_code_contact');

        initializeIntlTelInput(telPrimary, "primary_phone_number");
        initializeIntlTelInput(telSecondary, "secondary_phone_number");
        initializeIntlTelInput(telContact, "contact_person_phone_number");
        // Country Code Selection End

        // Set selected options for industry and industry process
        const setSelectedOption = (selector, value) => {
            const element = document.querySelector(selector);
            if (element) {
                Array.from(element.options).forEach(option => {
                    if (option.value == value) {
                        option.selected = true;
                    }
                });
            }
        };

        setSelectedOption('#industry', `{{ $company->industry }}`);
        setSelectedOption('#industry-process', `{{ $company->industry_process }}`);

        // Log country options after a delay
        setTimeout(() => {
            const countriesElement = document.querySelector('.countries');
            if (countriesElement) {
                const countryValues = Array.from(countriesElement.options).map(option => option.value);
                console.log(countryValues);
            }
        }, 1000);
        // End of country options log

        // Trigger Material Price Modal
        const triggerMaterialPrice = (companyMaterialID) => {
            const materialPriceModal = document.querySelector('#materialPriceModal');
            document.querySelector('input[name="material_price_id"]').value = companyMaterialID;
            const modalInstance = new bootstrap.Modal(materialPriceModal);
            modalInstance.show();
        };

        // Trigger CheckIn
        const triggerCheckIn = (companyMaterialID, materialID, companyID, materialName) => {
            const checkInModal = document.querySelector('#checkInModal');
            const modalInputs = {
                checkInMaterialID: document.querySelector('#checkInModal input[name="checkIn_material_id"]'),
                materialID: document.querySelector('#checkInModal input[name="material_id"]'),
                companyID: document.querySelector('#checkInModal input[name="company_id"]'),
                materialName: document.querySelector('#checkInModal input[name="checkIn_material_name"]')
            };

            // Set input values
            modalInputs.checkInMaterialID.value = companyMaterialID;
            modalInputs.materialID.value = materialID;
            modalInputs.companyID.value = companyID;
            modalInputs.materialName.value = materialName;

            // Show modal
            const modalInstance = new bootstrap.Modal(checkInModal);
            modalInstance.show();
        };

        // Trigger CheckOut
        const triggerCheckOut = (companyMaterialID, materialID, companyID, materialName) => {
            const checkOutModal = document.querySelector('#checkOutModal');
            const modalInputs = {
                checkOutMaterialID: document.querySelector('#checkOutModal input[name="checkOut_material_id"]'),
                materialID: document.querySelector('#checkOutModal input[name="material_id"]'),
                companyID: document.querySelector('#checkOutModal input[name="company_id"]'),
                materialName: document.querySelector('#checkOutModal input[name="checkOut_material_name"]')
            };

            // Set input values
            modalInputs.checkOutMaterialID.value = companyMaterialID;
            modalInputs.materialID.value = materialID;
            modalInputs.companyID.value = companyID;
            modalInputs.materialName.value = materialName;

            // Show modal
            const modalInstance = new bootstrap.Modal(checkOutModal);
            modalInstance.show();
        };

        // Trigger adjustment
        const triggerAdjustment = (companyMaterialID, materialID, companyID, materialName) => {
            const adjustmentModal = document.querySelector('#adjustmentModal');
            const modalInputs = {
                adjustmentMaterialID: adjustmentModal.querySelector('input[name="adjustment_material_id"]'),
                materialID: adjustmentModal.querySelector('input[name="material_id"]'),
                companyID: adjustmentModal.querySelector('input[name="company_id"]'),
                materialName: adjustmentModal.querySelector('input[name="checkOut_material_name"]')
            };

            // Set input values
            modalInputs.adjustmentMaterialID.value = companyMaterialID;
            modalInputs.materialID.value = materialID;
            modalInputs.companyID.value = companyID;
            modalInputs.materialName.value = materialName;

            // Show modal
            const modalInstance = new bootstrap.Modal(adjustmentModal);
            modalInstance.show();
        };
        // End trigger adjustment
        // Activate and Deactivate Company
        document.querySelectorAll('.toggle-status').forEach(checkbox => {
            checkbox.addEventListener('change', async function () {
                const companyId = this.dataset.companyId;
                const status = this.checked ? 1 : 0;

                try {
                    const response = await fetch("{{ route('company.toggleStatus') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ company_id: companyId, status })
                    });

                    const data = await response.json();
                    const feedback = document.getElementById('feedback-message');
                    feedback.textContent = data.message || 'Error updating status!';
                    feedback.style.color = data.success ? 'green' : 'red';
                } catch (error) {
                    console.error('Error:', error);
                    const feedback = document.getElementById('feedback-message');
                    feedback.textContent = 'An error occurred!';
                    feedback.style.color = 'red';
                }
            });
        });
        // End activate and deactivate
        // Questionnaire
        async function toggleQuestionResult(element, companyId, questionId) {
            console.log(element, companyId, questionId);

            const isChecked = element.checked;
            const confirmationMessage = "Do you want to uncheck this?";
            const uri = isChecked 
                ? "{{ route('company.add-question') }}" 
                : "{{ route('company.remove-question') }}";

            if (!isChecked && !confirm(confirmationMessage)) return;

            const formData = new FormData();
            formData.append('company', companyId);
            formData.append('question_id', questionId);

            try {
                const result = await fetch_cycle('--Save question', uri, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error processing question result:", error);
            }
        }
        // End Questionnaire
        // Water Conservation Method
        async function toggleWaterConservationMethod(element, companyId, methodId) {
            console.log(element, companyId, methodId);

            const isChecked = element.checked;
            const confirmationMessage = "Do you want to uncheck this?";
            const uri = isChecked 
                ? "{{ route('company.add-water-conservation-method') }}" 
                : "{{ route('company.remove-water-conservation-method') }}";

            if (!isChecked && !confirm(confirmationMessage)) return;

            const formData = new FormData();
            formData.append('company', companyId);
            formData.append('water_conservation_method_id', methodId);

            try {
                const result = await fetch_cycle('--Save method', uri, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error processing water conservation method:", error);
            }
        }
        // End Water Conservation Method
        // Water Quality Control
        async function toggleWaterQualityControl(element, companyId, qualityControlId) {
            console.log(element, companyId, qualityControlId);

            const isChecked = element.checked;
            const confirmationMessage = "Do you want to uncheck this?";
            const uri = isChecked 
                ? "{{ route('admin.store-water-quality-logs') }}" 
                : "{{ route('admin.remove-water-quality-logs') }}";

            if (!isChecked && !confirm(confirmationMessage)) return;

            const formData = new FormData();
            formData.append('company', companyId);
            formData.append('water_quality_control_id', qualityControlId);

            try {
                const result = await fetch_cycle('--Save quality control', uri, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error processing water quality control:", error);
            }
        }
        // End Water Quality Control
        // WaterSources
        async function toggleWaterSource(ele, company, value) {
            console.log(ele, company, value);

            const isChecked = ele.checked;
            const confirmationMessage = "Do you want to uncheck this?";
            const uri = isChecked 
                ? "{{ route('company.add-water-sources') }}" 
                : "{{ route('company.remove-water-sources') }}";

            if (!isChecked && !confirm(confirmationMessage)) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('water_sources_id', value);

            try {
                const result = await fetch_cycle('--Save sources', uri, 'POST', formData);
                console.log(result);
            } catch (error) {
                console.error("Error processing water source:", error);
            }
        }
        // End WaterSources
        // Utility function to show and scroll to a card
        function showAndScrollToCard(cardSelector) {
            const card = document.querySelector(cardSelector);
            if (card) {
                card.classList.remove('d-none');
                card.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Event listeners for various triggers
        document.querySelector('#water-checkin-trigger').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#water-checkin-card');
        });
        // Water usage log trigger
        document.querySelector('#water-usage-log-trigger').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#water-usage-logs-card');
        });
        // Water recycling log trigger
        document.querySelector('#water-recycling-log-trigger').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#water-recycling-logs-card');
        });
        // Water quality control log trigger
        document.querySelector('#add-quality-control-record').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#quality-control-log-card');
        });
        // chemical trigger
        document.querySelector('#add-chemical-button').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#add-chemical-form-card');
        });

        // Water quality control log trigger
        document.querySelector('#add-material-button').addEventListener('click', (e) => {
            e.preventDefault();
            showAndScrollToCard('#add-material-form-card');
        });
    </script>
    <!-- end of script -->
    <!-- water inventory -->
    <script>
        // Check-in form submission
        document.querySelector('#water-checkin-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const url = "{{ route('admin.water-stock-check-in') }}";
            const formData = new FormData(this);

            try {
                const result = await fetch_cycle('--Save Water Check-In', url, 'POST', formData);
                console.log(result);

                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = result.water_stock_movements.map(water_stock_movement => {
                        const sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        const calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        const formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        return `
                            <tr>
                                <td class="text-capitalize">
                                    ${water_stock_movement.movement_type}
                                    ${water_stock_movement.movement_type === 'in' ? '<i class="fas fa-caret-up text-success font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'out' ? '<i class="fas fa-caret-down text-danger font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'recycling' ? '<i class="fas fa-recycle text-info font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'usage' ? '<i class="fas fa-tint text-primary font-16"></i>' : ''}
                                </td>
                                <td>${sourceName}</td>
                                <td>${water_stock_movement.volume}</td>
                                <td>${calendarYear}</td>
                                <td>${formattedDate}</td>
                                <td>${water_stock_movement.remark ?? ''}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }
            } catch (error) {
                console.error('Error during water check-in:', error);
            }
        });
        // End check-in form submission
        // Water usage log form submission
        document.querySelector('#water-usage-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.water-stock-check-out') }}";

            try {
                const result = await fetch_cycle('--Save Water Usage Log', url, 'POST', formData);
                console.log(result);

                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = result.water_stock_movements.map(water_stock_movement => {
                        const sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        const calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        const formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        return `
                            <tr>
                                <td class="text-capitalize">
                                    ${water_stock_movement.movement_type}
                                    ${water_stock_movement.movement_type === 'in' ? '<i class="fas fa-caret-up text-success font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'out' ? '<i class="fas fa-caret-down text-danger font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'recycling' ? '<i class="fas fa-recycle text-info font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'usage' ? '<i class="fas fa-tint text-primary font-16"></i>' : ''}
                                </td>
                                <td>${sourceName}</td>
                                <td>${water_stock_movement.volume}</td>
                                <td>${calendarYear}</td>
                                <td>${formattedDate}</td>
                                <td>${water_stock_movement.remark ?? ''}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }
            } catch (error) {
                console.error('Error saving water usage log:', error);
            }
        });
        // End water usage log form submission
        // Water recycling log form submission
        document.querySelector('#water-recycling-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.water-stock-recycling-log') }}";

            try {
                const result = await fetch_cycle('--Save Water Recycling Log', url, 'POST', formData);
                if (result.status === 'success') {
                    updateWaterManagementTable(result.water_stock_movements);
                }
            } catch (error) {
                console.error('Error saving water recycling log:', error);
            }
        });

        // Update Water Management Table
        function updateWaterManagementTable(waterStockMovements) {
            const tableBody = document.querySelector('#tbl-water-management tbody');
            tableBody.innerHTML = waterStockMovements.map(waterStockMovement => {
                const sourceName = waterStockMovement.company_water_sources?.water_source?.sources ?? 'N/A';
                const calendarYear = waterStockMovement.calendar_year?.name ?? 'N/A';
                const formattedDate = new Date(waterStockMovement.movement_date).toLocaleDateString('en-GB', {
                    day: '2-digit', month: 'short', year: 'numeric'
                });

                return `
                    <tr>
                        <td class="text-capitalize">
                            ${waterStockMovement.movement_type}
                            ${getMovementTypeIcon(waterStockMovement.movement_type)}
                        </td>
                        <td>${sourceName}</td>
                        <td>${waterStockMovement.volume}</td>
                        <td>${calendarYear}</td>
                        <td>${formattedDate}</td>
                        <td>${waterStockMovement.remark ?? ''}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </div>
                        </td>
                    </tr>`;
            }).join('');
        }

        // Get Movement Type Icon
        function getMovementTypeIcon(movementType) {
            const icons = {
                in: '<i class="fas fa-caret-up text-success font-16"></i>',
                out: '<i class="fas fa-caret-down text-danger font-16"></i>',
                recycling: '<i class="fas fa-recycle text-info font-16"></i>',
                usage: '<i class="fas fa-tint text-primary font-16"></i>'
            };
            return icons[movementType] || '';
        }

        // Store Water Sources
        document.querySelector('#waterSourceForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-water-source-details') }}";

            try {
                const result = await fetch_cycle('--Store Water Sources', url, 'POST', formData);
                if (result.status === 'success') {
                    updateWaterSourcesTable(result.water_sources);
                }
            } catch (error) {
                console.error('Error storing water sources:', error);
            }
        });

        // Update Water Sources Table
        function updateWaterSourcesTable(waterSources) {
            const tableBody = document.querySelector('#tbl-water-sources tbody');
            tableBody.innerHTML = waterSources.map(source => `
                <tr>
                    <td>${source.sources}</td>
                    <td>${source.description ?? ""}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>`).join('');
        }
        // End water sources
    </script>
    <script>
        // Store Quality Control Logs
        document.querySelector('#qualityControlLogForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-water-quality-logs') }}";

            try {
                const result = await fetch_cycle('--Store Quality Control Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-quality-control-management tbody');
                    tableBody.innerHTML = result.water_quality_logs.map(quality => `
                        <tr>
                            <td>${quality.test_date}</td>
                            <td>${quality.parameter_tested}</td>
                            <td>${quality.test_results}</td>
                            <td>${quality.deviation_detected}</td>
                            <td>${quality.corrective_actions}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing quality control log:', error);
            }
        });
    </script>
    <!-- end water quality control logs -->
    <!-- Waste Disposal -->
    <script>
        // Store Waste Disposal
        // Handles the submission of the waste disposal form and updates the waste disposal table.
        document.querySelector('#waste-disposal-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-waste-disposal') }}";

            try {
                const result = await fetch_cycle('--Store Waste Disposal', url, 'POST', formData);
                if (result.status === 'success' && Array.isArray(result.waste_disposals)) {
                    const tableBody = document.querySelector('#tbl-waste-disposal tbody');
                    tableBody.innerHTML = result.waste_disposals.map(disposal => `
                        <tr>
                            <td>${disposal.waste_type ?? ''}</td>
                            <td>${disposal.quantity ?? ''}</td>
                            <td>${disposal.disposal_method ?? ''}</td>
                            <td>${disposal.disposal_date ?? ''}</td>
                            <td>${disposal.operation?.operation_name ?? 'N/A'}</td>
                            <td>${disposal.calendarYear?.name ?? 'N/A'}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing waste disposal:', error);
            }
        });
    </script>
    <!-- end waste disposal -->

    <!--store IoT Device Management -->
    <script>
        /**
         * Handles the submission of the IoT Device Management form.
         *
         * - Prevents the default form submission behavior.
         * - Collects form data and sends it via an asynchronous POST request to the server.
         * - On successful response, updates the IoT devices table with the latest device data.
         * - Handles and logs any errors that occur during the process.
         *
         * Dependencies:
         * - Assumes the existence of a `fetch_cycle` function for making AJAX requests.
         * - Requires a form with the ID `iot-device-form` and a table with the ID `tbl-iot-devices`.
         * - Uses Laravel's route helper to generate the endpoint URL.
         */
        document.querySelector('#iot-device-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-iot-device') }}";

            try {
                const result = await fetch_cycle('--Store IoT Device', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-iot-devices tbody');
                    tableBody.innerHTML = result.iot_devices.map(device => `
                        <tr>
                            <td>${device.device_name}</td>
                            <td>${device.device_type}</td>
                            <td>${device.serial_number}</td>
                            <td>${device.status}</td>
                            <td>${device.date_added}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing IoT device:', error);
            }
        });
    </script>
    <!-- end iot device managment -->
    <!-- Chemical  -->
    <script>
        /**
         * Chemical Management Script
         *
         * Handles:
         * - Submission of new company chemicals.
         * - Dynamic update of the chemical management table.
         * - Modal triggers for chemical check-in and check-out.
         * - Submission of check-in/check-out forms for chemicals.
         *
         * Features:
         * - Validates required fields before submission.
         * - Uses fetch_cycle for AJAX requests.
         * - Updates the chemical table on success.
         * - Provides utility functions for modal handling and field validation.
         */

        // Button for submitting a new chemical
        const btnSubmitChemical = document.querySelector('#btn-submit-chemical');

        // Utility: Validate required fields
        const validateFields = (fields) => {
            for (const { value, message } of fields) {
                if (!value.trim()) {
                    showToast(message);
                    return false;
                }
            }
            return true;
        };

        // Utility: Handle AJAX submission and update table
        const handleSubmit = async (url, formData, loader) => {
            loader.style.display = 'inline-block';
            try {
                const result = await fetch_cycle('--Save Chemical', url, 'POST', formData);
                loader.style.display = 'none';
                if (result.status === "success") {
                    // Update chemical management table with new data
                    const tableBody = document.querySelector('#tbl-company-chemical tbody');
                    tableBody.innerHTML = result.company_chemical.map(chemical => `
                        <tr>
                            <td>${escapeHTML(chemical.name ?? '')}</td>
                            <td>${escapeHTML(chemical.unit ?? '')}</td>
                            <td>
                                <span 
                                    class="badge bg-${chemical.chemical_status === 'active' ? 'success' : 'danger'}" 
                                    role="status" 
                                    aria-label="Chemical status: ${escapeHTML(chemical.chemical_status)}"
                                >
                                    ${escapeHTML(chemical.chemical_status)}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a 
                                        class="dropdown-toggle arrow-none" 
                                        data-bs-toggle="dropdown" 
                                        href="#" 
                                        role="button" 
                                        aria-expanded="false"
                                    >
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a 
                                            class="dropdown-item" 
                                            href="${`/admin/view-chemical/${encodeURIComponent(chemical.company_chemical_id)}`}"
                                        >
                                            Open Chemical
                                        </a>
                                        <a class="dropdown-item" href="#">Update Chemical</a>
                                        <a class="dropdown-item" href="#">Delete Chemical</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="#">Setup Price</a>
                                        <a class="dropdown-item" href="#">Check In Item</a>
                                        <a class="dropdown-item" href="#">Check Out Item</a>
                                        <a class="dropdown-item" href="#">Adjustment</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error(error);
                loader.style.display = 'none';
            }
        };

        // Handle chemical submission
        btnSubmitChemical.addEventListener('click', () => {
            const loader = document.querySelector('#btn-submit-chemical #loader');
            const companyId = document.querySelector('#chemical-form input[name="company_id"]').value;
            const chemical = document.querySelector('#chemical-form select[name="chemical"]').value;
            const unitOfMeasurement = document.querySelector('#chemical-form input[name="unit_of_measurement"]').value;
            const threshold = document.querySelector('#chemical-form input[name="threshold"]').value;

            if (!validateFields([
                { value: companyId, message: "Company ID field cannot be empty." },
                { value: chemical, message: "Chemical field cannot be empty." },
                { value: unitOfMeasurement, message: "Unit of measurement field cannot be empty." }
            ])) return;

            const formData = new FormData();
            formData.append('chemical_id', chemical);
            formData.append('unit_of_measurement', unitOfMeasurement);
            formData.append('threshold', threshold);
            formData.append('company_id', companyId);

            handleSubmit("{{ route('admin.store-company-chemical') }}", formData, loader);
        });

        // Utility: Trigger modal and set fields
        const triggerModal = (modalId, fields) => {
            const modal = document.querySelector(modalId);
            fields.forEach(({ name, value }) => {
                modal.querySelector(`input[name="${name}"]`).value = value;
            });
            const loader = modal.querySelector('#loader');
            loader.style.display = 'none';
            new bootstrap.Modal(modal).show();
        };

        // Utility: Handle check-in/check-out AJAX
        const handleCheckInOut = async (url, modalId, loaderSelector) => {
            const modal = document.querySelector(modalId);
            const loader = modal.querySelector(loaderSelector);
            loader.style.display = 'inline-block';

            const formData = new FormData(modal.querySelector('form'));
            if (!validateFields([
                { value: formData.get('checkIn_chemical_id') || formData.get('checkOut_chemical_id'), message: "Chemical ID field cannot be empty." },
                { value: formData.get('quantity'), message: "Quantity field cannot be empty." },
                { value: formData.get('date'), message: "Date field cannot be empty." }
            ])) {
                loader.style.display = 'none';
                return;
            }

            try {
                const result = await fetch_cycle('--Create Check In/Out', url, 'POST', formData);
                loader.style.display = 'none';
            } catch (error) {
                console.error(error);
                loader.style.display = 'none';
            }
        };

        // Chemical check-in
        document.querySelector('#btn-submit-check-in-chemical').addEventListener('click', () => {
            handleCheckInOut("{{ route('admin.save-company-chemical-check-in') }}", '#checkInChemicalModal', '#loader');
        });

        // Chemical check-out
        document.querySelector('#btn-submit-check-out-chemical').addEventListener('click', () => {
            handleCheckInOut("{{ route('admin.save-company-chemical-check-out') }}", '#checkOutChemicalModal', '#loader');
        });

        // Modal triggers for check-in/check-out
        window.triggerCheckInChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            triggerModal('#checkInChemicalModal', [
                { name: 'checkIn_chemical_id', value: companyChemicalID },
                { name: 'chemical_id', value: chemicalID },
                { name: 'company_id', value: companyID },
                { name: 'checkIn_chemical_name', value: chemicalName }
            ]);
        };

        window.triggerCheckOutChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            triggerModal('#checkOutChemicalModal', [
                { name: 'checkOut_chemical_id', value: companyChemicalID },
                { name: 'chemical_id', value: chemicalID },
                { name: 'company_id', value: companyID },
                { name: 'checkOut_chemical_name', value: chemicalName }
            ]);
        };
    </script>
    <!-- end chemical management -->

    <!-- operations -->
    <script>
        /**
         * Operations Management Script
         *
         * Handles:
         * - Submission and update of operation types and categories.
         * - Submission of equipment types and equipment logs.
         * - Submission of operation logs and quality control records.
         * - Submission of waste items.
         *
         * Features:
         * - Updates corresponding tables on success.
         * - Uses fetch_cycle for AJAX requests.
         * - Provides utility functions for editing and confirming deletions.
         */

        // Store Operation Type
        document.querySelector('#company_operation_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation-type') }}";

            try {
                const result = await fetch_cycle('--Store Operation Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operation-types tbody');
                    tableBody.innerHTML = result.operation_types.map(type => `
                        <tr>
                            <td>${type.name}</td>
                            <td>${type.description || ""}</td>
                            <td>${type.sequence_order || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editOperationType(${type.operation_type_id}, '${type.name}', '${type.description || ""}', ${type.sequence_order || 0})">
                                        <i class="las la-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmTypeDeletion(${type.operation_type_id}, '${type.name}')">
                                        <i class="las la-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation type:', error);
            }
        });

        // Edit Operation Type
        document.querySelector('#edit_operation_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-operation-type') }}";

            try {
                const result = await fetch_cycle('--Update Operation Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const updatedData = result.operation_types.map(
                        type => new OperationTypeObject(type.operation_type_id, type.name, type.description, type.sequence_order)
                    );

                    table.clear();
                    table.rows.add(updatedData).draw();
                }
            } catch (error) {
                console.error('Error updating operation type:', error);
            }
        });

        // Store Equipment Type
        document.querySelector('#equipment_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-equipment-type') }}";

            try {
                const result = await fetch_cycle('--Store Equipment Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-equipment-types tbody');
                    tableBody.innerHTML = result.equipment_types.map(type => `
                        <tr>
                            <td>${type.name}</td>
                            <td>${type.description || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing equipment type:', error);
            }
        });

        // Store Equipment Log
        document.querySelector('#industrial-equipment-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-equipment-log') }}";

            try {
                const result = await fetch_cycle('--Store Equipment Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-equipment-logs tbody');
                    tableBody.innerHTML = result.equipment_logs.map(log => `
                        <tr>
                            <td>${log.equipment_name}</td>
                            <td>${log.equipment_type?.name || 'N/A'}</td>
                            <td>${log.equipment_capacity}</td>
                            <td>${log.status}</td>
                            <td>${log.date_added}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing equipment log:', error);
            }
        });

        // Store Operation Category
        document.querySelector('#operation_category_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation-category') }}";

            try {
                const result = await fetch_cycle('--Store Operation Category', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operation-categories tbody');
                    tableBody.innerHTML = result.operation_categories.map(category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editOperationCategory(${category.operation_category_id}, '${category.name}', '${category.description || ""}')">
                                        <i class="las la-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmCategoryDeletion(${category.operation_category_id}, '${category.name}')">
                                        <i class="las la-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation category:', error);
            }
        });

        // Edit Operation Category
        document.querySelector('#edit_operation_category_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-operation-category') }}";

            try {
                const result = await fetch_cycle('--Update Operation Category', url, 'POST', formData);
                if (result.status === 'success') {
                    const updatedCategories = result.operation_categories.map(
                        category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                    );

                    categoriesTable.clear();
                    categoriesTable.rows.add(updatedCategories).draw();
                }
            } catch (error) {
                console.error('Error updating operation category:', error);
            }
        });

        // Store Operation Log
        document.querySelector('#operations-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation') }}";

            try {
                const result = await fetch_cycle('--Store Operation Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operations-log tbody');
                    tableBody.innerHTML = result.operation_logs.map(log => `
                        <tr>
                            <td>${log.operation_name}</td>
                            <td>${log.operation_code || ''}</td>
                            <td>${log.operation_type || ''}</td>
                            <td>${log.operation_category || ''}</td>
                            <td>${log.operation_unit || ''}</td>
                            <td>${log.expected_waste_per_operation || ''}</td>
                            <td>${log.expected_water_usage_per_operation || ''}</td>
                            <td>${log.expected_unit_produced_for_goods || ''}</td>
                            <td>${log.calendar_year_name || ''}</td>
                            <td>${log.start_date || ''}</td>
                            <td>${log.end_date || ''}</td>
                            <td>
                                <span class="badge bg-${log.status === 'active' ? 'success' : 'danger'}">
                                    ${log.status}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" onclick="triggerUpdateOperation('${log.company_operation_id}')">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation log:', error);
            }
        });

        // Store Quality Control
        document.querySelector('#quality-control-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-quality-control') }}";

            try {
                const result = await fetch_cycle('--Store Quality Control', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-quality-control tbody');
                    tableBody.innerHTML = result.quality_controls_record.map(control => `
                        <tr>
                            <td>${control.quality_metric}</td>
                            <td>${control.acceptable_range}</td>
                            <td>${control.measurement_frequency}</td>
                            <td>${control.responsible_person}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing quality control:', error);
            }
        });

        // Store Waste Item
        document.querySelector('#submit-waste-item').addEventListener('click', async function () {
            const form = document.querySelector('#waste-item-form');
            const formData = new FormData(form);
            const url = "{{ route('admin.store-waste') }}";

            try {
                const result = await fetch_cycle('--Store Waste Item', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-waste-items tbody');
                    tableBody.innerHTML = result.waste_items.map(item => `
                        <tr>
                            <td>${item.waste_name}</td>
                            <td>${item.waste_type}</td>
                            <td>${item.unit}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing waste item:', error);
            }
        });
    </script>
    <!-- operations -->

    <!-- Production Log -->
    <script>
        /**
         * Production Log Section
         * 
         * This section handles the dynamic addition of materials, chemicals, and products
         * for the production log form. It also manages the submission of the production log
         * and updates the production log table accordingly.
         * 
         * - initializeMaterialSection: Handles dynamic material rows.
         * - initializeChemicalSection: Handles dynamic chemical rows.
         * - initializeProductSection: Handles dynamic product rows.
         * - Form submission: Handles production log form submission and table update.
         */
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Material" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeMaterialSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let materialIndex = 1;

                async function createMaterialRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="material-used-${index}">Material Needed</label>
                                <select id="material-used-${index}" class="form-select material-select" name="material_used[${index}][material_id]" required>
                                    <option value="" selected disabled>Select Material</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="material-quantity-${index}">Quantity</label>
                                <input id="material-quantity-${index}" type="number" class="form-control" name="material_used[${index}][quantity]" placeholder="Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="expected_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="expected_unit" name="material_used[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-material-quantity">Remove</button>
                        </div>
                    `;
                    const materialSelect = newRow.querySelector(`#material-used-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-materials/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.company_materials.forEach(material => {
                            if (material.material) {
                                const option = document.createElement('option');
                                option.value = material.materialID;
                                option.textContent = material.material.material;
                                materialSelect.appendChild(option);
                            }
                        });
                    } catch (error) {
                        console.error("Error fetching materials:", error);
                        alert("Failed to load materials. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createMaterialRow(materialIndex);
                    container.appendChild(newRow);
                    materialIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-material-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeMaterialSection('.material-quantity-used-container-production-log', '.add-more-material-used-production-log');
            initializeMaterialSection('.material-quantity-used-container-annual-operation-activity', '.add-more-material-quantity-annual-operation-activity');
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Chemical" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeChemicalSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let chemicalIndex = 1;

                async function createChemicalRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="chemical-used-${index}">Chemical Needed</label>
                                <select id="chemical-used-${index}" class="form-select chemical-select" name="chemical_used[${index}][chemical_id]" required>
                                    <option value="" selected disabled>Select Chemical</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chemical-quantity-${index}">Quantity</label>
                                <input id="chemical-quantity-${index}" type="number" class="form-control" name="chemical_used[${index}][quantity]" placeholder="Used Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="chemical_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="chemical_unit" name="chemical_used[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-chemical-quantity">Remove</button>
                        </div>
                    `;
                    const chemicalSelect = newRow.querySelector(`#chemical-used-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-chemicals/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.company_chemicals.forEach(chemical => {
                            if (chemical.chemical) {
                                const option = document.createElement('option');
                                option.value = chemical.chemicalID;
                                option.textContent = chemical.chemical.name;
                                chemicalSelect.appendChild(option);
                            }
                        });
                    } catch (error) {
                        console.error("Error fetching chemicals:", error);
                        alert("Failed to load chemicals. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createChemicalRow(chemicalIndex);
                    container.appendChild(newRow);
                    chemicalIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-chemical-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeChemicalSection('.chemical-quantity-container-production-log', '.add-more-chemical-used-production-log');
            initializeChemicalSection('.chemical-quantity-container-annual-operation-activity', '.add-more-chemical-quantity-annual-operation-activity');
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Product" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeProductSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let productIndex = 1;

                async function createProductRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produced-product-${index}">Produced Product</label>
                                <select id="produced-product-${index}" class="form-select product-select" name="product_produced[${index}][product_id]" required>
                                    <option value="" selected disabled>Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="produced-quantity-${index}">Quantity Produced</label>
                                <input id="produced-quantity-${index}" type="number" class="form-control" name="product_produced[${index}][quantity]" placeholder="Produced Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-product-quantity">Remove</button>
                        </div>
                    `;
                    const productSelect = newRow.querySelector(`#produced-product-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-product/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.products.forEach(product => {
                            const option = document.createElement('option');
                            option.value = product.product_id;
                            option.textContent = product.name;
                            productSelect.appendChild(option);
                        });
                    } catch (error) {
                        console.error("Error fetching products:", error);
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createProductRow(productIndex);
                    container.appendChild(newRow);
                    productIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-product-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeProductSection('.operation-log-product-quantity-container', '.add-more-operation-log-product-quantity-operation');
        });

        /**
         * Waste Section for Production Log
         * 
         * This section handles the dynamic addition of waste items for the production log form.
         * It allows users to add/remove waste rows and select waste types, enter quantities, and units.
         */
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Waste" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeWasteSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let wasteIndex = 1;

                async function createWasteRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waste-type-${index}">Waste Type</label>
                                <select id="waste-type-${index}" class="form-select waste-select" name="waste_generated[${index}][waste_id]" required>
                                    <option value="" selected disabled>Select Waste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waste-quantity-${index}">Quantity</label>
                                <input id="waste-quantity-${index}" type="number" class="form-control" name="waste_generated[${index}][quantity]" placeholder="Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="waste_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="waste_unit" name="waste_generated[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-waste-quantity">Remove</button>
                        </div>
                    `;
                    const wasteSelect = newRow.querySelector(`#waste-type-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-waste/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        if (data.company_wastes && Array.isArray(data.company_wastes)) {
                            data.company_wastes.forEach(waste => {
                                const option = document.createElement('option');
                                option.value = waste.company_waste_id;
                                option.textContent = waste.waste_name;
                                wasteSelect.appendChild(option);
                            });
                        }
                    } catch (error) {
                        console.error("Error fetching wastes:", error);
                        alert("Failed to load wastes. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createWasteRow(wasteIndex);
                    container.appendChild(newRow);
                    wasteIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-waste-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            // Example usage for production log waste section
            initializeWasteSection('.annual-operation-activity-waste-quantity-container', '.add-more-annual-activity-waste-quantity-operation');
        });

        document.querySelector('#production-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-production-log') }}";

        await fetch_cycle('--Store Production Log', url, 'POST', formData).then(result => {
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-production-logs tbody');
                    tableBody.innerHTML = result.production_logs.map(log => `
                        <tr>
                            <td>${log.production_title}</td>
                            <td>${log.operation?.operation_name || 'N/A'}</td>
                            <td>${log.material?.material_name || 'N/A'} (${log.quantity_used})</td>
                            <td>${log.chemical?.name || 'N/A'} (${log.chemical?.volume_used || 0} Liters)</td>
                            <td>${log.amount_of_water_used} Liters</td>
                            <td>${log.product?.name || 'N/A'} (${log.product?.quantity_produced || 0} Produced, ${log.product?.quantity_defected || 0} Defected)</td>
                            <td>${new Date(log.production_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                            <td>
                                <span class="badge bg-${log.production_status === 'completed' ? 'success' : (log.production_status === 'ongoing' ? 'primary' : 'danger')}">
                                    ${log.production_status.charAt(0).toUpperCase() + log.production_status.slice(1)}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editProductionLog(${log.id})">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProductionLog(${log.id})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            });
        });
    </script>
    <!-- End Production Log -->

    <!-- Calendar Year Management Script -->
    <script>
        // Calendar Year Management
        // This section handles the submission and update of the company calendar year table.
        document.querySelector('#calendar_year_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-calendar-year') }}";

            try {
                const result = await fetch_cycle('--Store Calendar Year', url, 'POST', formData);
                if (result.status === 'success') {
                    updateCalendarYearTable(result.calendar_years);
                }
            } catch (error) {
                console.error('Error storing calendar year:', error);
            }
        });

        /**
         * Updates the Calendar Year table with new data.
         * @param {Array} calendarYears - Array of calendar year objects.
         */
        function updateCalendarYearTable(calendarYears) {
            const tableBody = document.querySelector('#calendar_year_table tbody');
            tableBody.innerHTML = calendarYears.map(year => `
                <tr>
                    <td>${year.name || ''}</td>
                    <td>${year.start_date || ''}</td>
                    <td>${year.end_date || ''}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-primary" onclick="editCalendar('${year.calendar_year_id}')">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteCalendar('${year.calendar_year_id}')">Delete</button>
                    </td>
                </tr>
            `).join('');
        }
    </script>
    <!-- End Calendar Year Management Script -->

    <!-- Product Management Script -->
    <script>
        /**
         * (No code provided in the selection.)
         *
         * Please provide the code you want documented.
         */
        // Utility function to update table content
        function updateTableContent(tableSelector, data, rowTemplate) {
            const tableBody = document.querySelector(tableSelector);
            tableBody.innerHTML = data.map(rowTemplate).join('');
        }

        // Store Product Category
        document.querySelector('#add-product-category-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-product-category') }}";

            try {
                const result = await fetch_cycle('--Store Product Category', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-product-categories tbody', result.product_categories, category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error storing product category:', error);
            }
        });

        // Edit Product Category
        document.querySelector('#edit-product-category-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-product-category') }}";

            try {
                const result = await fetch_cycle('--Update Product Category', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-product-categories tbody', result.product_categories, category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error updating product category:', error);
            }
        });

        // Store Product
        document.querySelector('#add-product-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-product') }}";

            try {
                const result = await fetch_cycle('--Store Product', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-products tbody', result.products, product => `
                        <tr>
                            <td>${product.name}</td>
                            <td>${product.product_category.name}</td>
                            <td>${product.currency} ${product.price}</td>
                            <td>${product.quantity_per_unit}</td>
                            <td>${product.unit}</td>
                            <td class="text-end">
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error storing product:', error);
            }
        });
    </script>
    <!-- Product Management Script -->
     
    <!-- Annual Operation log -->
    <script>
        // Annual Operation Metadata Management
        // This section handles fetching, displaying, and managing annual operation metadata logs.
        let annualOperationMetadataTable = $('#tbl-annual-operations-metadata-log').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [5] } // Disable sorting on the "Action" column
            ],
            data: [], // Start with an empty data array
            columns: [
                { data: 'operation_name', title: 'Operation Name' },
                { data: 'calendarYear', title: 'Calendar Year' },
                { data: 'expected_operations_per_year', title: 'Expected Operations (Per Year)' },
                {
                    data: 'prepared_by',
                    title: 'Prepared By',
                    render: function(data, type, row) {
                        if (type === 'display' && data !== 'N/A') {
                            return data; // HTML content for rendering Prepared By column
                        }
                        return 'N/A'; // Fallback
                    }
                },
                { data: 'status', title: 'Operation Status' },
                {
                    data: null,
                    title: 'Actions',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-primary btn-sm" onclick="addActivityAnnualOperationLog(${row.id}, '${row.operation_name}')">
                                    <i class="fas fa-tasks"></i> Manage Activities
                                </button>
                                <button class="btn btn-success btn-sm" onclick="editAnnualOperationLog(${row.id})">
                                    <i class="fas fa-edit"></i> Edit Log
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteAnnualOperationLog(${row.id})">
                                    <i class="fas fa-trash-alt"></i> Delete Log
                                </button>
                            </div>`;
                    }
                }
            ]
        });

        document.querySelector('#annualOperationsLogCollapse').addEventListener('shown.bs.collapse', async () => {
            // Initialize DataTable for Annual Operations Metadata Log
            console.log("Annual Operations Metadata Log initialized");
            // const annualOperationMetadataTable = $('#tbl-annual-operations-metadata-log').DataTable();
            
            const companyId = "{{ json_encode($company->company_id) }}";
            console.log("Company ID:", companyId);
            
            const url = `/admin/metadata/company/${companyId}`;
            const spinner = document.getElementById('loading-spinner');

            showElement(spinner);

            try {
                const data = await fetchFieldInput(url);

                if (data.status === "success" && Array.isArray(data.annual_operation_metadata)) {
                    const logs = data.annual_operation_metadata.map(log => {
                        let preparedBy = "N/A";

                        // Attempt to parse the PreparedBy JSON string
                        try {
                            const parsedPreparedBy = JSON.parse(log.PreparedBy);
                            if (Array.isArray(parsedPreparedBy) && parsedPreparedBy.length > 0) {
                                preparedBy = parsedPreparedBy.map(prep => `
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <img src="${prep.avatar}" alt="${prep.name}" style="width: 30px; height: 30px; border-radius: 50%;" />
                                        <div>
                                            <strong>${prep.name}</strong><br />
                                            <small>${prep.email}</small>
                                        </div>
                                    </div>
                                `).join("<br />");
                            }
                        } catch (e) {
                            console.error("Error parsing PreparedBy field:", e);
                        }

                        return {
                            operation_name: log.OperationName || "N/A",
                            calendarYear: log.calendar_year?.name || "N/A",
                            expected_operations_per_year: log.annual_no_of_operation || "N/A",
                            prepared_by: preparedBy,
                            status: log.Status || "N/A",
                            id: log.annual_op_metadata_ID || "N/A"
                        };
                    });

                    // Populate the table with the fetched data
                    annualOperationMetadataTable.clear();
                    annualOperationMetadataTable.rows.add(logs).draw();

                    // Enable rendering HTML in the 'Prepared By' column
                    annualOperationMetadataTable.columns().every(function () {
                        this.render(function (data, type, row) {
                            if (type === 'display') {
                                return data;
                            }
                            return data;
                        });
                    });
                } else {
                    displayMessage('warning', 'No annual operation logs found or invalid data structure.');
                }
            } catch (error) {
                console.error("Error fetching annual operation logs:", error);
                displayMessage('danger', 'An error occurred while fetching annual operation logs. Please try again.');
            } finally {
                hideElement(spinner);
            }

        });

        // Form submission for storing annual operation log
        document.querySelector('#annual-operations-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            let manager = manager_4.getSelectedUserIds();
            if (manager.length === 0) {
                displayMessage('warning', 'Please select at least one manager.');
                return;
            }

            manager.forEach(id => {
                formData.append('prepared_by_ids[]', id);
            });

            const url = "{{ route('admin.store-annual-operation-metadata') }}";

            try {
                const result = await fetch_cycle('--Store Annual Operation Log', url, 'POST', formData);
                if (result.status === 'success') {
                    console.log("Annual operation log stored successfully:", result.annual_operation_metadatas);
                    updateAnnualOperationLogTable(result.annual_operation_metadatas);
                }
            } catch (error) {
                console.log('Error storing annual operation log:', error);
            }
        });
        /**
         * Updates the Annual Operation Log table with new data.
         * @param {Array} logs - Array of annual operation logs.
         */
        function updateAnnualOperationLogTable(logs) {
            if (Array.isArray(logs)) {
                // Transform logs to match DataTable columns
                const formattedLogs = logs.map(log => {
                let preparedBy = "N/A";
                try {
                    const parsedPreparedBy = JSON.parse(log.PreparedBy);
                    if (Array.isArray(parsedPreparedBy) && parsedPreparedBy.length > 0) {
                    preparedBy = parsedPreparedBy.map(prep => `
                        <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="${prep.avatar}" alt="${prep.name}" style="width: 30px; height: 30px; border-radius: 50%;" />
                        <div>
                            <strong>${prep.name}</strong><br />
                            <small>${prep.email}</small>
                        </div>
                        </div>
                    `).join("<br />");
                    }
                } catch (e) {
                    // ignore parse error, fallback to N/A
                }
                return {
                    operation_name: log.OperationName || "N/A",
                    calendarYear: log.calendar_year?.name || "N/A",
                    expected_operations_per_year: log.annual_no_of_operation || "N/A",
                    prepared_by: preparedBy,
                    status: log.Status || "N/A",
                    id: log.annual_op_metadata_ID || "N/A"
                };
                });
                annualOperationMetadataTable.clear().rows.add(formattedLogs).draw();
            }
        }

        /**
         * Adds an activity for the specified metadata ID.
         * @param {number} metadataId - The ID of the metadata to add an activity for.
         */
        function addActivityAnnualOperationLog(metadataId, metadataName) {
            console.log("Adding activity for metadata ID:", metadataId);

            const form = document.querySelector('form#annual-operations-activity-form');
            document.getElementById('annualOperationsActivityModalLabel').textContent = `Annual Operations Activities for Annual Operation Metadata: ${metadataName}`;
            if (!form) {
                console.log('Form with ID "annual-operations-activity-form" not found.');
                return;
            }

            // Reset the form and populate default options
            form.reset();

            // Set the metadata ID in the form
            const metadataInput = form.querySelector('input[name="annual_op_metadata_ID"]');
            if (metadataInput) {
                metadataInput.value = metadataId;
            } else {
                console.log('Input field "annual_op_metadata_ID" not found in the form.');
            }

            // Show the modal for adding activities
            const modalElement = document.getElementById('annualOperationsActivityModal');
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            } else {
                console.log('Modal with ID "annualOperationsActivityModal" not found.');
            }
        }

        // annual operation activity
        let annualOperationsActivityTable = $('#tbl-annual-operations-activity').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            destroy: true,
            columnDefs: [
                { orderable: false, targets: [6] } // Disable sorting on the "Action" column
            ],
            data: [],
            columns: [
                { data: 'activity_name', title: 'Activity Name' },
                { data: 'operation_name', title: 'Operation Name' },
                { data: 'start_date', title: 'Start Date' },
                { data: 'end_date', title: 'End Date' },
                { data: 'priority', title: 'Priority' },
                { data: 'tags', title: 'Tags' },
                {
                    data: null,
                    title: 'Actions',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-primary btn-sm" onclick="editActivity(${row.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteActivity(${row.id})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </div>`;
                    }
                }
            ]
        });
        // Annual Operations Activity Modal: Fetch and display activities for the selected annual operation metadata
        // This section listens for the modal to be shown, then fetches activities and populates the DataTable.
        // Listen for when the Annual Operations Activity Modal is shown
        document.getElementById('annualOperationsActivityModal').addEventListener('shown.bs.modal', async function () {
            const metadataId = document.querySelector('input[name="annual_op_metadata_ID"]').value;
            if (!metadataId) return;

            const url = `/admin/metadata/activities/${metadataId}`;
            const spinner = document.getElementById('loading-spinner');
            showElement(spinner);

            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.activities)) {
                    const activities = data.activities.map(activity => ({
                        activity_name: activity.activity_name || "N/A",
                        operation_name: activity.operation?.operation_name || "N/A",
                        start_date: activity.start_date ? new Date(activity.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        end_date: activity.end_date ? new Date(activity.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        priority: activity.priority || "N/A",
                        tags: activity.tags || "N/A",
                        id: activity.id || "N/A"
                    }));

                    annualOperationsActivityTable.clear().rows.add(activities).draw();
                } else {
                    displayMessage('warning', 'No activities found for this metadata.');
                    annualOperationsActivityTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching activities:", error);
                displayMessage('danger', 'An error occurred while fetching activities. Please try again.');
                annualOperationsActivityTable.clear().draw();
            } finally {
                hideElement(spinner);
            }
        });
        // Form submission for adding activities
        // This section listens for the form submission, collects data, and sends it to the server.
        // Form submission for adding activities
        document.querySelector('#annual-operations-activity-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            console.log('====================================');
            console.log('Annual Operations Activity Form submitted');
            console.log('====================================');
            const formData = new FormData(this);
            const url = "{{ route('admin.store-activity') }}";

            // Show loading spinner
            const spinner = document.getElementById('loading-spinner');
            showElement(spinner);
            // Store the activity data
            try {
                const result = await fetch_cycle('--Store Annual Operation Activity', url, 'POST', formData);
                if (result.status === 'success') {
                    if (Array.isArray(result.activities)) {
                        const activities = result.activities.map(activity => ({
                            activity_name: activity.activity_name || "N/A",
                            operation_name: activity.operation?.operation_name || "N/A",
                            start_date: activity.start_date ? new Date(activity.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            end_date: activity.end_date ? new Date(activity.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            priority: activity.priority || "N/A",
                            tags: activity.tags || "N/A",
                            id: activity.id || "N/A"
                        }));
                        annualOperationsActivityTable.clear().rows.add(activities).draw();
                    }
                }
            } catch (error) {
                console.error('Error storing annual operation activity:', error);
            }
        });

    </script>
    <!-- Annual Operation log -->

    <!-- Batch tracking -->
    <script>
        // Initialize DataTable for Batch Tracking
        const batchTrackingTable = $('#tbl-batch-tracking').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            destroy: true,
            columnDefs: [
                { orderable: false, targets: [5] } // Disable sorting on the "Actions" column
            ],
            data: [],
            columns: [
                { data: 'batch_name', title: 'Batch Name' },
                { data: 'product_name', title: 'Product Name' },
                { data: 'start_date', title: 'Start Date' },
                { data: 'end_date', title: 'End Date' },
                {
                    data: 'status',
                    title: 'Status',
                    render: function (data, type, row) {
                        if (type === 'display') {
                            let badgeClass = 'secondary';
                            let label = data || 'N/A';
                            if (typeof data === 'string') {
                                switch (data.toLowerCase()) {
                                    case 'completed':
                                        badgeClass = 'success';
                                        break;
                                    case 'pending':
                                        badgeClass = 'warning';
                                        break;
                                    case 'rejected':
                                        badgeClass = 'dark';
                                        break;
                                }
                            }
                            return `<span class="badge bg-${badgeClass}">${label.charAt(0).toUpperCase() + label.slice(1)}</span>`;
                        }
                        return data;
                    }
                },
                {
                    data: null,
                    title: 'Actions',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button 
                                    class="btn btn-info btn-sm setup-production-btn" 
                                    data-batch-id="${row.batch_id}" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#productionProcessModal">
                                    <i class="fas fa-cogs"></i> Setup Production Process
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </div>`;
                    }
                }
            ]
        });

        // Fetch and display batch tracking data
        document.getElementById('batchTrackingCollapse').addEventListener('shown.bs.collapse', async () => {
            const companyId = "{{ json_encode($company->company_id) }}";
            const url = `/admin/batch-tracking/company/${companyId}`;
            const spinner = document.getElementById('loading-spinner');

            showElement(spinner);

            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.production_batch_tracking)) {
                    const batchTrackingData = data.production_batch_tracking.map(batch => ({
                        batch_name: batch.batch_name || "N/A",
                        product_name: batch.product?.name || "N/A",
                        start_date: batch.start_date ? new Date(batch.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        end_date: batch.end_date ? new Date(batch.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        status: batch.status || "N/A",
                        batch_id: batch.batch_id || "N/A" // ✅ FIXED: correctly named for access
                    }));

                    batchTrackingTable.clear().rows.add(batchTrackingData).draw();
                } else {
                    displayMessage('warning', 'No batch tracking data found or invalid data structure.');
                }
            } catch (error) {
                console.error("Error fetching batch tracking data:", error);
                displayMessage('danger', 'An error occurred while fetching batch tracking data. Please try again.');
            } finally {
                hideElement(spinner);
            }
        });

        // Handle form submission for adding a new batch
        document.querySelector('#batch-tracking-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-batch-tracking') }}";

            try {
                const result = await fetch_cycle('--Store Batch Tracking', url, 'POST', formData);
                if (result.status === 'success') {
                    const batch = result.productionBatchTracking;

                    const newRow = {
                        batch_name: batch.batch_name || "N/A",
                        product_name: batch.product?.name || "N/A",
                        start_date: batch.start_date ? new Date(batch.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        end_date: batch.end_date ? new Date(batch.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        status: batch.status || "N/A",
                        batch_id: batch.batch_id || "N/A" // ✅ FIXED
                    };

                    batchTrackingTable.row.add(newRow).draw(false);
                }
            } catch (error) {
                console.error('Error storing batch tracking:', error);
            }
        });

        // Handle Setup Production Process button click
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('#tbl-batch-tracking').addEventListener('click', function (e) {
                const button = e.target.closest('.setup-production-btn');
                if (button) {
                    const batchId = button.getAttribute('data-batch-id');
                    console.log('Clicked batch ID:', batchId);
                    document.getElementById('batch_id').value = batchId;
                }
            });
        });

        function toggleBatchTrackingForm() {
            const form = document.getElementById('batch-tracking-form-container');
            form.classList.toggle('d-none');
            if (!form.classList.contains('d-none')) {
                form.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function showProductionProcessModal() {
            const modal = new bootstrap.Modal(document.getElementById('productionProcessModal'));
            modal.show();
        }
             // Show/hide production process form logic
      function showProductionProcessTable() {
          document.getElementById('production-process-form-container').classList.add('d-none');
          document.getElementById('production-process-table-container').classList.remove('d-none');
      }
      function showProductionProcessForm() {
          document.getElementById('production-process-form-container').classList.remove('d-none');
          document.getElementById('production-process-table-container').classList.add('d-none');
      }
      document.addEventListener('DOMContentLoaded', function () {
          const showBtn = document.getElementById('show-production-process-form');
          const cancelBtn = document.getElementById('cancel-production-process-form');
          const closeBtn = document.getElementById('close-production-process-form');
          // Always show table when modal opens
          $('#productionProcessModal').on('show.bs.modal', function () {
              showProductionProcessTable();
          });
          if (showBtn) showBtn.addEventListener('click', showProductionProcessForm);
          if (cancelBtn) cancelBtn.addEventListener('click', showProductionProcessTable);
          if (closeBtn) closeBtn.addEventListener('click', showProductionProcessTable);
      });
    </script>
    <!-- End Batch tracking -->

    <!-- store production process -->
    <script>
    /**
     * Handles the submission of the Production Process form in the Batch Tracking section.
     * - Prevents default form submission.
     * - Sends form data via AJAX to the server.
     * - Uses fetch_cycle for AJAX POST.
     * - On success, you can update the UI or show a toast.
     * - On error, logs the error or can show a toast.
     */
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize DataTable for Production Process
        const productionProcessTable = $('#tbl-production-process').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            destroy: true,
            columnDefs: [
                { orderable: false, targets: [5] }
            ],
            data: [],
            columns: [
                { data: 'operation_type', title: 'Operation Type' },
                { data: 'start_date', title: 'Start Date' },
                { data: 'end_date', title: 'End Date' },
                { data: 'remarks', title: 'Remarks' },
                {
                    data: 'status',
                    title: 'Status',
                    render: (data, type) => {
                        if (type === 'display') {
                            let badgeClass = 'secondary';
                            let label = data || 'N/A';
                            switch ((data || '').toLowerCase()) {
                                case 'completed': badgeClass = 'success'; break;
                                case 'pending': badgeClass = 'warning'; break;
                                case 'rejected': badgeClass = 'dark'; break;
                            }
                            return `<span class="badge bg-${badgeClass}">${label.charAt(0).toUpperCase() + label.slice(1)}</span>`;
                        }
                        return data;
                    }
                },
                {
                    data: null,
                    title: 'Actions',
                    render: (data, type, row) => `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-primary btn-sm" onclick="editProductionProcess(${row.process_id || row.id || "''"})">Edit</button>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteProductionProcess(${row.process_id || row.id || "''"})">Delete</button>
                        </div>
                    `
                }
            ]
        });

        // Handle form submission for adding a new production process
        const form = document.querySelector('#production-process-form');
        if (form) {
            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(form);
                const url = "{{ route('admin.store-production-process') }}";

                try {
                    const result = await fetch_cycle('--Store Production Process', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.production_processes)) {
                        const formatted = result.production_processes.map(proc => ({
                            operation_type: proc.operation_type || 'N/A',
                            start_date: proc.start_date ? new Date(proc.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : 'N/A',
                            end_date: proc.end_date ? new Date(proc.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : 'N/A',
                            remarks: proc.remarks || '',
                            status: proc.status || 'N/A',
                            id: proc.process_id || ''
                        }));
                        productionProcessTable.clear().rows.add(formatted).draw();
                    }
                } catch (error) {
                    console.error('Error storing production process:', error);
                }
            });
        }
    });
    </script>
    <!-- end store production process -->
    <!-- End Batch tracking -->

    <script>
        /**
         * Toggle the visibility of the annual operation activity form card.
         * Called when addActivityAnnualOperationLog is invoked.
         */
        function addActivityAnnualOperationLogForm() {
            // Show the activity form card
            const formCard = document.getElementById('annual-operation-activity-form-card');
            if (formCard) {
                formCard.classList.remove('d-none');
                formCard.scrollIntoView({ behavior: 'smooth' });
            }
            // Reset the form fields
            const form = document.getElementById('annual-operations-activity-form');
            if (form) {
                form.reset();
            }
        }
    </script>
    <script>
        class TaskTaggingSystem {
            constructor({ containerId, apiUrl }) {
                this.container = document.getElementById(containerId);
                this.apiUrl = apiUrl;
                this.tags = [];
                this.init();
            }

            // Initialize the tagging system
            init() {
                // Render the tag input UI
                this.container.innerHTML = `
                    <div id="tag-input-wrapper" class="tag-inline-container" style="display: flex; align-items: center; flex-wrap: wrap; padding: 0px 10px;">
                        <div id="task-tags-container" class="tags-display" style="display: flex; flex-wrap: wrap;"></div>
                        <input type="text" class="form-control border-0 shadow-none" id="task-tag-input" autocomplete="off" placeholder="Add a task tag..." style="flex: 1; min-width: 120px;"/>
                    </div>
                    <div id="task-suggestions"></div>
                `;

                this.tagsContainer = this.container.querySelector("#task-tags-container");
                this.inputField = this.container.querySelector("#task-tag-input");
                this.suggestionsDiv = this.container.querySelector("#task-suggestions");

                this.bindEvents();
                this.renderTags();
            }


            // Fetch suggestions from API
            async fetchSuggestions(query) {
                try {
                    const response = await fetch(`${this.apiUrl}?query=${encodeURIComponent(query)}&type=task`);
                    if (!response.ok) throw new Error("Failed to fetch task suggestions");
                    return await response.json();
                } catch (error) {
                    console.error("Error fetching task suggestions:", error);
                    return [];
                }
            }

            // Add a task tag
            addTag(tag) {
                if (tag && !this.tags.includes(tag)) {
                    this.tags.push(tag);
                    this.renderTags();
                    this.inputField.value = "";
                    this.suggestionsDiv.innerHTML = "";
                }
            }

            // Remove a task tag
            removeTag(tag) {
                const index = this.tags.indexOf(tag);
                if (index > -1) {
                    this.tags.splice(index, 1);
                    this.renderTags();
                }
            }

            // Render task tags
            renderTags() {
                this.tagsContainer.innerHTML = "";
                this.tags.forEach(tag => {
                    const tagElement = document.createElement("div");
                    tagElement.className = "task-tag";
                    tagElement.innerHTML = `${tag} <span>&times;</span>`;
                    tagElement.querySelector("span").onclick = () => this.removeTag(tag);
                    this.tagsContainer.appendChild(tagElement);
                });
            }

            // Show task suggestions
            async showSuggestions(input) {
                const fetchedSuggestions = await this.fetchSuggestions(input);
                const filteredSuggestions = fetchedSuggestions.filter(suggestion => !this.tags.includes(suggestion));
                this.suggestionsDiv.innerHTML = "";
                filteredSuggestions.forEach(suggestion => {
                    const suggestionElement = document.createElement("div");
                    suggestionElement.className = "task-suggestion";
                    suggestionElement.textContent = suggestion;
                    suggestionElement.onclick = () => this.addTag(suggestion);
                    this.suggestionsDiv.appendChild(suggestionElement);
                });
            }

            // Bind events
            bindEvents() {
                this.inputField.addEventListener("input", () => {
                    const input = this.inputField.value.trim();
                    if (input) {
                        this.showSuggestions(input);
                    } else {
                        this.suggestionsDiv.innerHTML = "";
                    }
                });

                this.inputField.addEventListener("keydown", (event) => {
                    if (event.key === "Enter" || event.key === ",") {
                        event.preventDefault();
                        this.addTag(this.inputField.value.trim());
                    }
                });
            }
        }

        // Usage example
        const taskTaggingSystem2 = new TaskTaggingSystem({
            containerId: "tagging-system-2",
            apiUrl: "{{ url('/admin/search-tag') }}"
        });

        class TaggingSystem {
            constructor({ containerId, apiUrl }) {
                this.container = document.getElementById(containerId);
                this.apiUrl = apiUrl;
                this.tags = [];
                this.init();
            }

            // Initialize the tagging system
            init() {
                this.container.innerHTML = `
                <div id="tags-container"></div>
                <input type="text" class="form-control" id="tag-input-field" placeholder="Type to add tags" />
                <div id="suggestions"></div>
                `;

                this.tagsContainer = this.container.querySelector("#tags-container");
                this.inputField = this.container.querySelector("#tag-input-field");
                this.suggestionsDiv = this.container.querySelector("#suggestions");

                this.bindEvents();
                this.renderTags();
            }

            // Fetch suggestions from API
            async fetchSuggestions(query) {
                try {
                const response = await fetch(`${this.apiUrl}?query=${encodeURIComponent(query)}`);
                if (!response.ok) throw new Error("Failed to fetch suggestions");
                return await response.json();
                } catch (error) {
                console.error("Error fetching suggestions:", error);
                return [];
                }
            }

            // Add a tag
            addTag(tag) {
                if (tag && !this.tags.includes(tag)) {
                this.tags.push(tag);
                this.renderTags();
                this.inputField.value = "";
                this.suggestionsDiv.innerHTML = "";
                }
            }

            // Remove a tag
            removeTag(tag) {
                const index = this.tags.indexOf(tag);
                if (index > -1) {
                this.tags.splice(index, 1);
                this.renderTags();
                }
            }

            // Render tags
            renderTags() {
                this.tagsContainer.innerHTML = "";
                this.tags.forEach(tag => {
                const tagElement = document.createElement("div");
                tagElement.className = "tag";
                tagElement.innerHTML = `${tag} <span>&times;</span>`;
                tagElement.querySelector("span").onclick = () => this.removeTag(tag);
                this.tagsContainer.appendChild(tagElement);
                });
            }

            // Show suggestions
            async showSuggestions(input) {
                const fetchedSuggestions = await this.fetchSuggestions(input);
                const filteredSuggestions = fetchedSuggestions.filter(suggestion => !this.tags.includes(suggestion));
                this.suggestionsDiv.innerHTML = "";
                filteredSuggestions.forEach(suggestion => {
                const suggestionElement = document.createElement("div");
                suggestionElement.className = "TagSuggestion";
                suggestionElement.textContent = suggestion;
                suggestionElement.onclick = () => this.addTag(suggestion);
                this.suggestionsDiv.appendChild(suggestionElement);
                });
            }

            // Bind events
            bindEvents() {
                this.inputField.addEventListener("input", () => {
                const input = this.inputField.value.trim();
                if (input) {
                    this.showSuggestions(input);
                } else {
                    this.suggestionsDiv.innerHTML = "";
                }
                });

                this.inputField.addEventListener("keydown", (event) => {
                if (event.key === "Enter" || event.key === ",") {
                    event.preventDefault();
                    this.addTag(this.inputField.value.trim());
                }
                });
            }
        }

        // Usage example
        const taggingSystem = new TaggingSystem({
        containerId: "tagging-system",
        apiUrl: "{{ url('/admin/search-tag') }}"
        });

    </script>
    <script>
    class TaggingComponent {
      constructor(containerId, TagInput) {
        this.container = document.getElementById(containerId);
        this.tagInput = this.container.querySelector(`.${TagInput}`);
        this.tags = [];
        this.userMap = {}; // Maps user names to ids

        this.renderInputField();
        this.renderSuggestions();
      }

      renderInputField() {
        const inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.placeholder = 'Tag someone...';
        inputField.className = 'form-control';
        inputField.classList.add('form-control');
        inputField.addEventListener('input', (e) => this.fetchUsers(e.target.value.trim()));
        inputField.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const name = e.target.value.trim();
            console.log("Adding tag:", name);
            
            if (this.userMap[name]) {
                this.addTag(this.userMap[name], name);
            }
          }
        });
        this.tagInput.appendChild(inputField);
        this.inputField = inputField;
      }

      renderSuggestions() {
        const suggestionsDiv = document.createElement('div');
        suggestionsDiv.className = 'suggestions';
        this.tagInput.appendChild(suggestionsDiv);
        this.suggestionsDiv = suggestionsDiv;
      }

      async fetchUsers(query) {
        if (!query) {
          this.suggestionsDiv.innerHTML = '';
          return;
        }
        try {
          const companyId = "{{ $company->company_id }}";
          const response = await fetch(`{{ url('/admin/search-employee') }}?search=${encodeURIComponent(query)}&company_id=${encodeURIComponent(companyId)}`);
          const users = await response.json();
          console.log("Fetched users:", users);
          this.showSuggestions(users.users || []);
        } catch (error) {
          console.error("Failed to fetch users:", error);
        }
      }

      showSuggestions(users) {
        const filteredUsers = users.filter(user => !this.tags.includes(user.name));
        this.suggestionsDiv.innerHTML = '';
        filteredUsers.forEach(user => {
          const suggestionElement = document.createElement('div');
          suggestionElement.className = 'suggestion';
          suggestionElement.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
              <img src="${user.profilePic}" alt="${user.name}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #e0e7ff;">
              <div>
                <strong style="font-size: 15px; color: #1d4ed8;">${user.name}</strong><br>
                <span style="font-size: 13px; color: #64748b;">${user.role}</span><br>
                <span style="font-size: 12px; color: #6366f1;">${user.email}</span>
              </div>
            </div>
          `;
          suggestionElement.addEventListener('click', () => this.addTag(user.id, user.name));
          this.suggestionsDiv.appendChild(suggestionElement);
          
           // Update the user map
            this.userMap[user.name] = user.id;
        });
      }

      addTag(userId, userName) {
        if (userId && !this.tags.includes(userId)) {
            this.tags.push(userId);
            this.renderTags();
            this.inputField.value = '';
            this.suggestionsDiv.innerHTML = '';
        }
      }

      removeTag(userId) {
        this.tags = this.tags.filter(id => id !== userId);
        this.renderTags();
      }

      renderTags() {
        this.tagInput.innerHTML = '';
        this.tags.forEach(userId => {
            const userName = Object.keys(this.userMap).find(name => this.userMap[name] === userId);
            const tagElement = document.createElement('div');
            tagElement.className = 'tag';
            tagElement.innerHTML = `${userName} <span>&times;</span>`;
            tagElement.querySelector('span').addEventListener('click', () => this.removeTag(userId));
            this.tagInput.appendChild(tagElement);
        });
        this.tagInput.appendChild(this.inputField);
        this.tagInput.appendChild(this.suggestionsDiv);
      }
      // Get selected user IDs and names
      getSelectedUserIds() {
        return this.tags;
      }

      getSelectedUserNames() {
        return this.tags.map(id => Object.keys(this.userMap).find(name => this.userMap[name] === id));
      }
    }
    
    let  manager_1 =  new TaggingComponent('manager-tag-input-1', 'manager-tag-input-1');
    let  manager_2 =  new TaggingComponent('manager-tag-input-2', 'manager-tag-input-2');
    let  manager_3 =  new TaggingComponent('manager-tag-input-3', 'manager-tag-input-3');
    let  manager_4 =  new TaggingComponent('manager-tag-input-4', 'manager-tag-input-4');
    let  manager_5 =  new TaggingComponent('manager-tag-input-5', 'manager-tag-input-5');
  </script>
  <!-- Department -->
   <script>
    /**
     * Handles the submission of the Department form.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */
    /**
     * Department Management Script
     * Handles the submission of the Department form and updates the department table.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */

    /**
     * Department Management Script
     * Handles the submission of the Department form and updates the department table.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */

    let departmentsTable = $('#tbl-departments').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [2] } // Disable sorting on the "Action" column
        ],
        data: [],
        columns: [
            { data: 'name', title: 'Department Name' },
            {
                data: 'managers',
                title: 'Managers',
                render: function(data, type, row) {
                    if (Array.isArray(data) && data.length > 0) {
                        return `
                            <div class="d-flex flex-row flex-wrap gap-2">
                                ${data.map(mgr => `
                                    <div class="card shadow-sm mb-0" style="display:inline-block; min-width:220px; max-width:320px;">
                                        <div class="card-body p-2">
                                            <div class="d-flex align-items-center">
                                                <img src="${mgr.profilePic || 'https://via.placeholder.com/32'}" alt="${mgr.name ?? mgr.full_name ?? 'N/A'}" class="rounded-circle me-2" style="width:32px;height:32px;object-fit:cover;">
                                                <div>
                                                    <div class="fw-bold">${mgr.name ?? mgr.full_name ?? 'N/A'}</div>
                                                    <div class="small text-muted">${mgr.email ?? ''}</div>
                                                    <div class="small text-secondary">${mgr.jobTitle ?? ''}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        `;
                    }
                    return '<span class="text-muted">None</span>';
                }
            },
            {
                data: null,
                title: 'Action',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-primary btn-sm" onclick="editDepartment('${row.id}')">
                                <i class="las la-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteDepartment('${row.id}')">
                                <i class="las la-trash-alt"></i> Delete
                            </button>
                        </div>
                    `;
                },
                className: 'text-end'
            }
        ]
    });
    // Fetch and display departments when the accordion is expanded
    document.getElementById('departmentCollapse').addEventListener('shown.bs.collapse', async () => {
        console.log('====================================');
        console.log('Fetching departments for company:', "{{ json_encode($company->company_id) }}");
        console.log('====================================');
        const companyId = "{{ json_encode($company->company_id) }}";
        const url = `/admin/get-departments/${companyId}`;
        const spinner = document.getElementById('loading-spinner');
        showElement(spinner);

        try {
            const data = await fetchFieldInput(url);
            if (data.status === "success" && Array.isArray(data.departments)) {
                const departments = data.departments.map(department => ({
                    name: department.DepartmentName || "N/A",
                    managers: department.managers || [],
                    id: department.DepartmentID || "N/A"
                }));
                departmentsTable.clear().rows.add(departments).draw();
            } else {
                displayMessage('warning', 'No departments found or invalid data structure.');
                departmentsTable.clear().draw();
            }
        } catch (error) {
            console.error("Error fetching departments:", error);
            displayMessage('danger', 'An error occurred while fetching departments.');
        } finally {
            hideElement(spinner);
        }
    });

    // Handle department form submission
    document.addEventListener('DOMContentLoaded', function () {
        const departmentForm = document.getElementById('department-form');
        if (departmentForm) {
            departmentForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(departmentForm);
                console.log('====================================');
                console.log(manager_1.getSelectedUserIds());
                console.log('====================================');
                let manager = manager_1.getSelectedUserIds();
                // Append manager IDs to the form data
                manager.forEach(id => {
                    formData.append('manager_ids[]', id);
                });
                // Append the company ID to the form data
                const url = "{{ route('admin.store-company-department') }}";

                try {
                    const result = await fetch_cycle('--Store Department', url, 'POST', formData);
                    if (result.status === 'success') {
                        // Optionally update UI or show a success message
                        console.log("Department stored successfully:", result.department);
                    } else {
                        // Handle validation errors
                        console.error("Error storing department:", result.message);
                    }
                } catch (error) {
                    console.error('Error storing department:', error);
                }
            });
        }
    });
   </script>
  <!-- End Department -->
   <!-- Employee -->
    <script>
        // Handle employee form submission
        document.getElementById('employee-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-company-employee') }}";

            try {
                // Ensure the route supports POST; if not, use GET and append params to URL
                // If the route only supports GET, use the following pattern:
                // const params = new URLSearchParams(formData).toString();
                // const response = await fetch(url + '?' + params, { method: 'GET' });
                // Otherwise, use POST as below if the route supports it:
                const result = await fetch_cycle('--Store Employee', url, 'POST', formData);
                if (result.status === 'success' && result.employee) {
                    const emp = result.employee;
                    employeesTable.row.add({
                        name: emp.name ?? "N/A",
                        email: emp.email ?? "N/A",
                        role: emp.role ?? "N/A",
                        department: emp.department?.DepartmentName ?? "N/A",
                        id: emp.id ?? "N/A"
                    }).draw(false);
                } else {
                    displayMessage('danger', result.message || 'Failed to add employee.');
                }
            } catch (error) {
                console.error('Error storing employee:', error);
                displayMessage('danger', 'An error occurred while adding employee.');
            }
        });

    </script>
   <!-- Employee -->
    <!-- Company Workflow Management Script -->
    <script>
    /**
     * Company Workflow Management Script
     * Handles:
     * - Fetching and displaying company workflows in a DataTable.
     * - Adding, editing, and deleting workflow steps.
     * - Submitting the workflow form and updating the workflow table.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Company Workflow
    // Initialize the DataTable for workflow management
    let workflowTable = $('#tbl-workflow-management').DataTable({
        paging: true,                  // Enable pagination
        searching: true,               // Enable search functionality
        ordering: false,               // Disable global ordering
        responsive: true,              // Make the table responsive
        columnDefs: [
            { orderable: false, targets: [4] } // Disable sorting on the "Action" column
        ],
        data: [], // Placeholder for dynamic data
        columns: [
            { data: 'workflow_name', title: 'Workflow Name' },
            { data: 'description', title: 'Description' },
            { 
                data: 'creator', 
                title: 'Created By',
                render: function(data) {
                    return data 
                        ? `<div class="d-flex align-items-center">
                                <img src="${data.profile_picture}" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                                <div>
                                    <div>
                                        <strong>${data.first_name ?? ''} ${data.last_name ?? ''} ${data.other_name ?? ''}</strong>
                                    </div>
                                    <span>${data.email}</span>
                                </div>
                            </div>`
                        : 'N/A';
                }
            },
            { 
                data: 'status', 
                title: 'Status', 
                render: function(data) {
                    const statusClass = data === 'active' ? 'text-success' : 'text-danger';
                    return `<span class="${statusClass} fw-bold">${data}</span>`;
                }
            },
            { 
                data: null, 
                title: 'Action',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-secondary btn-sm" onclick="manageWorkflowStages('${row.workflow_id}')">
                                <i class="las la-layer-group"></i> Stages
                            </button>
                            <button class="btn btn-outline-primary btn-sm" onclick="editWorkflowStep('${row.workflow_id}')">
                                <i class="las la-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteWorkflowStep('${row.workflow_id}')">
                                <i class="las la-trash-alt"></i> Delete
                            </button>
                        </div>
                    `;
                },
                className: 'text-end'
            }
        ]
    });

    // Function to load workflows dynamically
    function loadWorkflows(data) {
        workflowTable.clear();        // Clear existing data
        workflowTable.rows.add(data); // Add new data
        workflowTable.draw();         // Re-render the table
    }


    // Fetch and display workflows when the accordion is expanded
    document.getElementById('workflowManagementCollapse').addEventListener('shown.bs.collapse', async () => {
        const companyId = "{{ json_encode($company->company_id) }}";
        const url = `/admin/get-workflows/${companyId}`;
        const spinner = document.getElementById('loading-spinner');
        showElement(spinner);

        try {
            const data = await fetchFieldInput(url);
            if (data.status === "success" && Array.isArray(data.workflows)) {
                const workflows = data.workflows.map(wf => ({
                    workflow_name: wf.workflow_name || "N/A",
                    description: wf.description || "",
                    creator: wf.creator
                        ? {
                            first_name: wf.creator.first_name || "N/A",
                            last_name: wf.creator.last_name || "N/A",
                            other_name: wf.creator.other_name || "",
                            profile_picture: wf.creator.profile_photo_path || 'https://via.placeholder.com/30',
                            email: wf.creator.email || "N/A"
                        }
                        : null,
                    status: wf.status || "N/A",
                    workflow_id: wf.workflow_id || "N/A"
                }));
                workflowTable.clear().rows.add(workflows).draw();
            } else {
                displayMessage('warning', 'No workflows found or invalid data structure.');
                workflowTable.clear().draw();
            }
        } catch (error) {
            console.error("Error fetching workflows:", error);
            displayMessage('danger', 'An error occurred while fetching workflows.');
        } finally {
            hideElement(spinner);
        }
    });

    // Handle workflow form submission
    document.addEventListener('DOMContentLoaded', function () {
        const workflowForm = document.getElementById('workflow-management-form');
        if (workflowForm) {
            workflowForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(workflowForm);
                const url = "{{ route('admin.store-company-workflow') }}";

                try {
                    const result = await fetch_cycle('--Store Workflow', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.workflows)) {
                        const workflows = result.workflows.map(wf => ({
                            workflow_name: wf.workflow_name || "N/A",
                            description: wf.description || "",
                            creator: wf.creator
                                ? {
                                    first_name: wf.creator.first_name || "N/A",
                                    last_name: wf.creator.last_name || "N/A",
                                    other_name: wf.creator.other_name || "",
                                    profile_picture: wf.creator.profile_photo_path || 'https://via.placeholder.com/30',
                                    email: wf.creator.email || "N/A"
                                }
                                : null,
                            status: wf.status || "N/A",
                            workflow_id: wf.workflow_id || "N/A"
                        }));
                        workflowTable.clear().rows.add(workflows).draw();
                    }
                } catch (error) {
                    console.error('Error storing workflow:', error);
                }
            });
        }
    });

    // Edit workflow step
    window.editWorkflowStep = function(id) {
        // Fetch workflow step details and populate the form for editing
        // (Implementation depends on your backend API)
        // Example:
        // fetch(`/admin/get-workflow-step/${id}`).then(...);

        // alert('Edit workflow step: ' + id);
        const workflow = workflowTable.row($(`button[onclick="editWorkflowStep('${id}')"]`).parents('tr')).data();
        if (workflow) {
            // Populate the modal form fields with workflow data
            document.getElementById('workflow_edit_id').value = id;
            document.getElementById('workflow_edit_name').value = workflow.workflow_name || '';
            document.getElementById('workflow_edit_description').value = workflow.description || '';
            // Populate type and status dropdowns if needed (fetch or static)
            // Example: document.getElementById('workflow_edit_type').value = workflow.type || '';
            // Set the selected option for status dropdown
            const statusSelect = document.getElementById('workflow_edit_status');
            if (statusSelect) {
                Array.from(statusSelect.options).forEach(option => {
                    option.selected = (option.value === (workflow.status || ''));
                });
            }
            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('workflowEditModal'));
            modal.show();
        }
    };

    // Delete workflow step
    window.deleteWorkflowStep = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this workflow?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/workflow/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        workflowTable.row($(`button[onclick="deleteWorkflowStep('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Workflow step has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete workflow step.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
    </script>
    <!-- End Company Workflow Management Script -->
    <!-- Stage Management Script -->
    <script>
    /**
     * Stage Management Script
     * Handles:
     * - Fetching and displaying stages for a batch in a DataTable.
     * - Adding, editing, and deleting stages.
     * - Submitting the stage management form and updating the stage table.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Stage Management
    // Initialize DataTable for Stage Management
    const stageTable = $('#tbl-stage-management').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [4] } // Action column
        ],
        data: [],
        columns: [
            { data: 'stage_name', title: 'Stage Name' },
            { data: 'description', title: 'Description' },
            { data: 'status', title: 'Status' },
            { data: 'sequence_order', title: 'Sequence Order' },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-secondary btn-sm" onclick="manageStageTasks('${row.stage_id}')">
                            <i class="las la-tasks"></i> Tasks
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="editStage('${row.stage_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteStage('${row.stage_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                    </div>
                `
            }
        ]
    });

    window.manageWorkflowStages = function(workflowId) {
                // clear the form fields
        document.getElementById('stage-management-form').reset();
        // Set the batch_id (or workflow_id) in the hidden input for the stage form
        document.getElementById('stage_workflow_id').value = workflowId;

        const workflow = workflowTable.row($(`button[onclick="manageWorkflowStages('${workflowId}')"]`).parents('tr')).data();
        if (workflow && document.getElementById('stage-workflow-title')) {
            document.getElementById('stage-workflow-title').textContent = workflow.workflow_name || '';
        }

        // Fetch and display stages for the selected workflow
        (async () => {
            const url = `/admin/get-company-stages/${workflowId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.stages)) {
                    const stages = data.stages.map(stage => ({
                        stage_name: stage.name || "N/A",
                        description: stage.description || "",
                        status: stage.status || "N/A",
                        sequence_order: stage.sequence || "N/A",
                        stage_id: stage.stage_id || stage.id || "N/A"
                    }));
                    stageTable.clear().rows.add(stages).draw();
                    // Clear the form for new entry
                    document.getElementById('stage-management-form').reset();
                } else {
                    stageTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching stages:", error);
                stageTable.clear().draw();
            }
        })();
        
        // Show the stage management modal
        const modal = new bootstrap.Modal(document.getElementById('stageManagementModal'));
        modal.show();
    };


    // Handle stage form submission
    document.addEventListener('DOMContentLoaded', function () {
        const stageForm = document.getElementById('stage-management-form');
        if (stageForm) {
            stageForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(stageForm);
                const url = "{{ route('admin.store-company-stage') }}";

                try {
                    const result = await fetch_cycle('--Store Stage', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.stages)) {
                        const stages = result.stages.map(stage => ({
                            stage_name: stage.name || "N/A",
                            description: stage.description || "",
                            status: stage.status || "N/A",
                            sequence_order: stage.sequence || "N/A",
                            stage_id: stage.stage_id || stage.id || "N/A"
                        }));
                        stageTable.clear().rows.add(stages).draw();
                        stageForm.reset();
                    }
                } catch (error) {
                    console.error('Error storing stage:', error);
                }
            });
        }
    });

    // Edit stage
    window.editStage = async function(id) {
        // Optionally fetch the latest stage data from the server
        let stage = stageTable.row($(`button[onclick="editStage('${id}')"]`).parents('tr')).data();

        // If not found in DataTable, fetch from backend
        if (!stage) {
            try {
                const response = await fetch(`/admin/get-stage/${id}`);
                if (response.ok) {
                    stage = await response.json();
                }
            } catch (error) {
                console.error('Failed to fetch stage:', error);
                return;
            }
        }

        if (stage) {
            document.getElementById('edit_stage_id').value = stage.stage_id || stage.id || "";
            document.getElementById('edit_stage_name').value = stage.stage_name || stage.name || "";
            document.getElementById('edit_stage_status').value = stage.status || "";
            document.getElementById('edit_stage_sequence_order').value = stage.sequence_order || stage.sequence || "";
            document.getElementById('edit_stage_description').value = stage.description || "";
            // Show the modal for editing stage
            const modal = new bootstrap.Modal(document.getElementById('editStageModal'));
            modal.show();
        }
    };

    // Delete stage
    window.deleteStage = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this stage?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/company-stages/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        stageTable.row($(`button[onclick="deleteStage('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Stage has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete stage.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
    </script>
    <!-- End Stage Management Script -->
     <!-- Task Management -->
    <script>
    /**
     * Task Management Script
     * Handles:
     * - Fetching and displaying tasks for a stage in a DataTable.
     * - Adding, editing, and deleting tasks.
     * - Submitting the task management form and updating the task table.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Task Management
    const taskTable = $('#tbl-task-management').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [4] } // Action column
        ],
        data: [],
        columns: [
            { data: 'task_name', title: 'Task Name' },
            { data: 'description', title: 'Description' },
            { data: 'status', title: 'Status' },
            { data: 'sequence_order', title: 'Sequence Order' },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="editTask('${row.task_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteTask('${row.task_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                    </div>
                `
            }
        ]
    });

    // Show Task Management Modal for a stage
    window.manageStageTasks = function(stageId) {
        document.getElementById('task-management-form').reset();
        document.getElementById('stage_workflow_id').value = ""; // Clear workflow id if present
        // document.getElementById('task_id').value = "";
        document.getElementById('task-management-form').querySelector('input[name="stage_id"]').value = stageId;

        // Fetch and display tasks for the selected stage
        (async () => {
            const url = `/admin/get-stage-tasks/${stageId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.tasks)) {
                    const tasks = data.tasks.map(task => ({
                        task_name: task.name || "N/A",
                        description: task.description || "",
                        status: task.status || "N/A",
                        sequence_order: task.sequence || "N/A",
                        task_id: task.task_id || task.id || "N/A"
                    }));
                    taskTable.clear().rows.add(tasks).draw();
                    document.getElementById('task-management-form').reset();
                } else {
                    taskTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching tasks:", error);
                taskTable.clear().draw();
            }
        })();

        // Show the task management modal
        const modal = new bootstrap.Modal(document.getElementById('taskManagementModal'));
        modal.show();
    };

    // Handle task form submission
    document.addEventListener('DOMContentLoaded', function () {
        const taskForm = document.getElementById('task-management-form');
        if (taskForm) {
            taskForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(taskForm);
                const url = "{{ route('admin.store-stage-task') }}";

                try {
                    const result = await fetch_cycle('--Store Task', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.tasks)) {
                        const tasks = result.tasks.map(task => ({
                            task_name: task.name || "N/A",
                            description: task.description || "",
                            status: task.status || "N/A",
                            sequence_order: task.sequence || "N/A",
                            task_id: task.task_id || task.id || "N/A"
                        }));
                        taskTable.clear().rows.add(tasks).draw();
                        taskForm.reset();
                    }
                } catch (error) {
                    console.error('Error storing task:', error);
                }
            });
        }
    });

    // Edit task
    window.editTask = async function(id) {
        let task = taskTable.row($(`button[onclick="editTask('${id}')"]`).parents('tr')).data();

        if (!task) {
            try {
                const response = await fetch(`/admin/get-stage-tasks/${id}`);
                if (response.ok) {
                    task = await response.json();
                }
            } catch (error) {
                console.error('Failed to fetch task:', error);
                return;
            }
        }

        if (task) {
            document.getElementById('task_id').value = task.task_id || task.id || "";
            document.getElementById('task_name').value = task.task_name || task.name || "";
            document.getElementById('task_status').value = task.status || "";
            document.getElementById('task_sequence_order').value = task.sequence_order || task.sequence || "";
            document.getElementById('task_description').value = task.description || "";
            // Show the modal for editing task
            const modal = new bootstrap.Modal(document.getElementById('taskManagementModal'));
            modal.show();
        }
    };

    // Delete task
    window.deleteTask = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this task?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/stage-tasks/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        taskTable.row($(`button[onclick="deleteTask('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Task has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete task.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
    </script>
     <!-- End Task Management -->
    @endsection
</x-layouts.admin-app>