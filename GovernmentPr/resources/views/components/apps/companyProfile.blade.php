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
                            aria-selected="false"><i class="la la-box d-block"></i>Inventory Management</a>
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
                                                            <!-- Products and Wastes Section -->
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
                                    <div class="card shadow-sm border-0" style="background-color: #f5f5dc;" id="annual-operations-log-card"> <!-- Light beige background for annual operations log -->
                                        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">Annual Operations Log</h4>
                                            <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" id="annual-operations-log-form">
                                                @csrf
                                                <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                <div class="row g-3">
                                                    <!-- Operation Name -->
                                                    <div class="col-md-6">
                                                        <label for="operation_name" class="form-label">Operation Name</label>
                                                        <select class="form-select operation-select" id="operation_name" name="operation_name" required>
                                                            <option value="" selected disabled>Choose...</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <!-- Calendar Year -->
                                                    <div class="col-md-6">
                                                        <label for="calendar_year" class="form-label">Calendar Year</label>
                                                        <select class="form-select calendar-year" id="calendar_year" name="calendar_year" required>
                                                            <option value="" selected disabled>Select Calendar Year</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <!-- Expected Operations Per Year -->
                                                    <div class="col-md-4">
                                                        <label for="operations_per_year" class="form-label">Expected Operations Per Year</label>
                                                        <input type="number" class="form-control" id="operations_per_year" name="operations_per_year" min="0" placeholder="Enter expected operations" required>
                                                    </div>
                                                    <!-- Materials and Chemicals Section -->
                                                    <div class="col-12">
                                                        <h5 class="border-bottom pb-2">Materials and Chemicals</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="material-quantity-used-container-operation-log col-md-12">
                                                            <div class="row g-2 align-items-end mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="expected_material" class="form-label fw-bold">Material Needed</label>
                                                                        <select class="form-select material-select" id="expected_material" name="material_used[0][material_id]">
                                                                            <option value="" selected disabled>Select Material</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="expected_quantity" class="form-label fw-bold">Expected Quantity</label>
                                                                        <input type="number" class="form-control" id="expected_quantity" name="material_used[0][quantity]" placeholder="Enter Expected Quantity" min="0">
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
                                                                        <label for="chemical_used" class="form-label fw-bold">Chemical Needed</label>
                                                                        <select class="form-select chemical-select" id="chemical_used" name="chemical_used[0][chemical_id]">
                                                                            <option value="" selected disabled>Select Chemical</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="chemical_quantity" class="form-label fw-bold">Quantity</label>
                                                                        <input type="number" class="form-control" id="chemical_quantity" name="chemical_used[0][quantity]" placeholder="Enter Quantity Used" min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-start">
                                                            <button type="button" class="btn btn-outline-primary btn-sm add-more-chemical-quantity-operation">Add More</button>
                                                        </div>
                                                    </div>
                                                    <!-- Expected Waste Generated -->
                                                    <div class="col-md-4">
                                                        <label for="waste_generated" class="form-label">Expected Waste Generated</label>
                                                        <input type="number" class="form-control" id="waste_generated" name="waste_generated" min="0" placeholder="Enter expected waste" required>
                                                    </div>
                                                    <!-- Expected Water Usage -->
                                                    <div class="col-md-4">
                                                        <label for="water_usage" class="form-label">Expected Water Usage (Liters)</label>
                                                        <input type="number" class="form-control" id="water_usage" name="water_usage" min="0" placeholder="Enter expected water usage" required>
                                                    </div>
                                                    <!-- Expected Units Produced -->
                                                    <div class="col-md-4">
                                                        <label for="units_produced" class="form-label">Expected Units Produced</label>
                                                        <input type="number" class="form-control" id="units_produced" name="units_produced" min="0" placeholder="Enter expected units" required>
                                                    </div>
                                                    <!-- Submit Button -->
                                                    <div class="col-12 text-end mt-3">
                                                        <button type="submit" class="btn btn-secondary">Save Annual Log</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Annual Operations Log Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-annual-operations-log">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Operation Name</th>
                                                    <th>Operation</th>
                                                    <th>Year</th>
                                                    <th>Expected Number of Operations per year</th>
                                                    <th>Expected Number of Waste to be Generated per year</th>
                                                    <th>Expected Number of Water to be Used per year</th>
                                                    <th>Expected Number of Units to be Produced</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($annual_operations_logs as $operations)
                                                <tr>
                                                    <td>{{ $operations->operation_name }}</td>
                                                    <td>{{ $operations->operation->operation_name ?? 'N/A'  }}</td>
                                                    <td>{{ $operations->calendarYear->name ?? 'N/A' }}</td>
                                                    <td>{{ $operations->operations_per_year }}</td>
                                                    <td>{{ implode(', ', $operations->quantity_of_waste) }}</td>

                                                    <td>{{ $operations->water_used_per_year }}</td>
                                                    <td>{{ $operations->units_produced_per_year }}</td>
                                                    <td class="text-end">
                                                        <div class="dropdown d-inline-block">
                                                            <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                                data-bs-toggle="dropdown" href="#" role="button"
                                                                aria-haspopup="false" aria-expanded="false">
                                                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dLabel11">
                                                                <a class="dropdown-item" href="#"
                                                                >Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
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
                                    Account Setup
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
                                                        <select id="industry_process_used" name="industry_process_used"
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
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
                                                    <button type="submit" class="btn btn-primary">Save Location</button>
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
    @section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/dataTables.bootstrap.min.css') }}">

    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
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
    @endsection

    @section('scripts')
    <!-- DataTables and Bootstrap JavaScript -->
    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>
    <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
    <script>
    // Confirm deletion function
    function confirmDeletion(id) {
        if (confirm("Are you sure you want to delete this operation type?")) {
            // Implement deletion logic
            console.log("Delete operation type with ID:", id);
        }
    }
    </script>
    <script>
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
            dropdown.addEventListener('click', async function (e) {
                const clickedDropdown = e.target;
                // if (clickedDropdown.dataset.populated === "true") {
                //     return; // Avoid fetching data again if already populated
                // }
                console.log('Selection detected');
                // Retrieve the company_id dynamically
                let company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding on the server
                console.log("Company ID:", company_id);
                // Construct the API URL
                let url = `/admin/get-calendar-years/${company_id}`;
                console.log("Fetching data from URL:", url);
                // Fetch data using the fetchFieldInput function
                try {
                    let data = await fetchFieldInput(url);
                    console.log("Fetched calendar years:", data);
                    // Handle the data (e.g., populate the dropdown, display a message, etc.)
                    // Example:
                    populateDropdown(clickedDropdown, data);
                    clickedDropdown.dataset.populated = "true"; // Mark as populated
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
        // Fetch operation type on page load
        document.querySelectorAll('.operation-type').forEach(dropdown => {
            dropdown.addEventListener('click', async function (e) {
                const clickedDropdown = e.target;
                // if (clickedDropdown.dataset.populated === "true") {
                //     return; // Avoid fetching data again if already populated
                // }
                console.log('Selection detected');
                // Retrieve the company_id dynamically
                let company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding on the server
                console.log("Company ID:", company_id);
                // Construct the API URL
                let url = `/admin/get-operation-types/${company_id}`;
                console.log("Fetching data from URL:", url);
                // Fetch data using the fetchFieldInput function
                try {
                    let data = await fetchFieldInput(url);
                    console.log("Fetched Operation Types:", data);
                    // Handle the data (e.g., populate the dropdown, display a message, etc.)
                    // Example:
                    populateOperationTypeDropdown(dropdown, data);
                    clickedDropdown.dataset.populated  = "true"; // Mark as populated
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
        // Fetch operation category on page load
        document.querySelectorAll('.operation-category').forEach(dropdown => {
            dropdown.addEventListener('click', async function (e) {
                const clickedDropdown = e.target;
                // if (clickedDropdown.dataset.populated === "true") {
                //     return; // Avoid fetching data again if already populated
                // }
                console.log('Selection detected');
                // Retrieve the company_id dynamically
                let company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding on the server
                console.log("Company ID:", company_id);
                // Construct the API URL
                let url = `/admin/get-operation-category/${company_id}`;
                console.log("Fetching data from URL:", url);

                // Fetch data using the fetchFieldInput function
                try {
                    let data = await fetchFieldInput(url);
                    console.log("Fetched Operation Types:", data);
                    // Handle the data (e.g., populate the dropdown, display a message, etc.)
                    // Example:
                    populateOperationCategoryDropdown(clickedDropdown, data);
                    clickedDropdown.dataset.populated = "true"; // Mark as populated
                } catch (error) {
                    console.error("Error fetching operation categories:", error);
                }
            });
        });
        // end fetch operation category
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
                document.addEventListener("click", async (e) => {
                    if (e.target && e.target.classList.contains('material-select')) {
                        const clickedDropdown = e.target;

                        if (clickedDropdown.dataset.populated === "true") {
                            return; // Avoid fetching data again if already populated
                        }

                        console.log("Material selection detected");

                        // Dynamically retrieve the company ID
                        const companyID = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding on the server
                        console.log("Company ID:", companyID);

                        const url = `/admin/get-materials/${companyID}`;
                        console.log("Fetching data from URL:", url);

                        try {
                            const data = await fetchFieldInput(url); // Await the data fetch
                            console.log("Fetched Materials:", data);

                            // Populate the dropdown with the fetched data
                            populateMaterialDropdown(clickedDropdown, data);

                            // Mark as populated
                            clickedDropdown.dataset.populated = "true";
                        } catch (error) {
                            console.error("Error fetching materials:", error);
                            alert("Failed to load materials. Please try again.");
                        }
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
            document.querySelectorAll(".chemical-select").forEach(dropdown => {
                document.addEventListener("click", async (e) => {
                    const clickedDropdown = e.target;
                    if (e.target && e.target.classList.contains('chemical-select')) {
                        // if (clickedDropdown.dataset.populated === "true") {
                        //     return; // Avoid fetching data again if already populated
                        // }

                        console.log("Chemical selection detected");

                        // Dynamically retrieve the company ID
                        const companyID = "{{ json_encode($company->company_id) }}"; // Ensure valid JSON encoding on the server
                        console.log("Company ID:", companyID);

                        const url = `/admin/get-chemicals/${companyID}`;
                        console.log("Fetching data from URL:", url);

                        try {
                            const data = await fetchFieldInput(url); // Await the data fetch
                            console.log("Fetched Chemicals:", data);

                            // Populate the dropdown with the fetched data
                            populateChemicalDropdown(clickedDropdown, data);

                            // Mark as populated
                            clickedDropdown.dataset.populated = "true";
                        } catch (error) {
                            console.error("Error fetching chemicals:", error);
                            alert("Failed to load chemicals. Please try again.");
                        }
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
            document.querySelectorAll('.product-select').forEach(dropdown => {
                document.addEventListener('click', async function (e) {
                    if (e.target && e.target.classList.contains('product-select')) {
                        const clickedDropdown = e.target;
                        // if (clickedDropdown.dataset.populated === "true") {
                        //     return; // Avoid fetching data again if already populated
                        // }
                        console.log('Product dropdown clicked:', e.target);
                        console.log('Selection detected');
                        // Retrieve the company_id dynamically
                        let company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding on the server
                        console.log("Company ID:", company_id);
                        // Construct the API URL
                        let url = `/admin/get-product/${company_id}`;
                        console.log("Fetching data from URL:", url);

                        // Fetch data using the fetchFieldInput function
                        try {
                            let data = await fetchFieldInput(url);
                            console.log("Fetched Product:", data);
                            // Handle the data (e.g., populate the dropdown, display a message, etc.)
                            // Example:
                            populateProductDropdown(clickedDropdown, data);
                            clickedDropdown.dataset.populated  = "true"; // Mark as populated
                        } catch (error) {
                            console.error("Error fetching product:", error);
                        }
                    }
                });
            });
        });
        // end fetch product

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

            return;
            console.log("Dropdown populated with options:", data);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.waste-select').forEach(dropdown => {
                let isLoading = false; // Prevent multiple concurrent requests
                dropdown.addEventListener('click', async function (e) {
                    console.log('Waste dropdown clicked:', dropdown);
                    // Check if the clicked element is the dropdown
                    if (e.target && e.target.classList.contains('waste-select')) {
                        let clickedDropdown = this;
                        clickedDropdown.innerHTML = ""; // Clear existing options
                        // if (clickedDropdown.dataset.populated === "true") {
                        //     return; // Avoid fetching data again if already populated
                        // }
                        console.log('Waste dropdown clicked:', clickedDropdown);
                        if (isLoading) return; // Debounce logic

                        console.log('Selection detected');
                        const company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding
                        console.log("Company ID:", company_id);

                        const url = `/admin/get-waste/${company_id}`;
                        console.log("Fetching data from URL:", url);

                        isLoading = true;
                        try {
                            const data = await fetchFieldInput(url); // Assuming fetchFieldInput is defined
                            console.log("Fetched Waste:", data, clickedDropdown);

                            // Add new options
                            populateWasteDropdown(clickedDropdown, data);
                            // clickedDropdown.dataset.populated = "true"; // Mark as populated
                        } catch (error) {
                            console.error("Error fetching waste:", error);
                            alert("Failed to load waste data. Please try again.");
                        } finally {
                            isLoading = false;
                        }
                    }
                });
            });
        });
        // end fetch waste

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
            let isLoading = false; // Prevent multiple concurrent requests
            document.addEventListener('click', async function (e) {
                if (e.target && e.target.classList.contains('operation-select')) {
                const clickedDropdown = e.target;
                // if (clickedDropdown.dataset.populated === "true") {
                //     return; // Avoid fetching data again if already populated
                // }
                console.log('Operation dropdown clicked:', e.target);
                if (isLoading) return; // Debounce logic

                console.log('Selection detected');
                const company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding
                console.log("Company ID:", company_id);

                const url = `/admin/get-operations/${company_id}`;
                console.log("Fetching data from URL:", url);

                isLoading = true;
                try {
                    const data = await fetchFieldInput(url); // Assuming fetchFieldInput is defined
                    console.log("Fetched Operations:", data);
                    populateOperationDropdown(clickedDropdown, data);
                    clickedDropdown.dataset.populated = "true"; // Mark as populated
                } catch (error) {
                    console.error("Error fetching operations:", error);
                    alert("Failed to load operation data. Please try again.");
                } finally {
                    isLoading = false;
                }
                }
            });
            });
        });
        // end fetch operations

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

        // Function to populate the table
        function populateProductTable() {
            const tbody = document.getElementById("tbl-products").querySelector("tbody");
            tbody.innerHTML = ""; // Clear existing content
            // Retrieve the company_id dynamically
            let company_id = {{ json_encode($company->company_id) }}; // Ensure valid JSON encoding on the server
            console.log("Company ID:", company_id);
            // Construct the API URL
            let url = `/admin/get-product/${company_id}`;
            console.log("Fetching data from URL:", url);
            fetchFieldInput(url).then(data => {
                console.log("Fetched Product:", data);
                // Check if the data contains products
                if (data.products && data.products.length > 0) {
                    // Populate the table with products
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
                    // Display "No products available" message if no products exist
                    tbody.innerHTML = `
                        <tr id="no-products">
                            <td colspan="5" class="text-center">No products available</td>
                        </tr>`;
                }
            }).catch(error => {
                console.error("Error fetching product:", error);
            });
        }

        // Attach event listener for when the accordion section is shown
        document.getElementById('productListCollapse').addEventListener('shown.bs.collapse', populateProductTable);

        // show, hide, scroll to element and display message functions
        const showElement = (element) => element.classList.remove('d-none');
        const hideElement = (element) => element.classList.add('d-none');
        const scrollToElement = (element) => element.scrollIntoView({ behavior: 'smooth' });
        function displayMessage (type, message) {
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
                                <button class="btn btn-outline-primary btn-sm" onclick="editOperationType(${row.operation_type_id}, '${row.name}', '${row.description??""}', '${row.sequenceOrder??"0"}')">
                                    <i class="las la-edit"></i> Edit
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="confirmDeletion(${row.operation_type_id}, '${row.name}')">
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
        document.getElementById('operationTypeCollapse').addEventListener('shown.bs.collapse', () => {
            let company_id = {{ json_encode($company->company_id) }};
            let url = `/admin/get-operation-types/${company_id}`;
            const spinner = document.getElementById('loading-spinner');
            try {
                showElement(spinner);
                fetchFieldInput(url).then(data => {
                    if (data.status === "success") {
                        data_array = data.operation_types.map(
                            type => new OperationTypeObject(type.operation_type_id, type.name, type.description, type.sequence_order)
                        );

                        // Clear and add rows without destroying the table
                        table.clear();
                        table.rows.add(data_array);
                        table.draw();
                        hideElement(spinner)
                    }
                });
            }catch(error) {
                console.error("Error showing spinner:", error);
                displayMessage('danger', 'An error occurred while fetching data.');
            }

        });
        // Edit operation type
        function editOperationType(operation_type_id, name, description, sequenceOrder){
            const editCard = document.getElementById('edit-operation-type-card');
            showElement(editCard);
            scrollToElement(editCard);
            const form = document.getElementById('edit_operation_type_form');
            form.querySelector('[name="operation_type_id"]').value = operation_type_id;
            form.querySelector('[name="operation_type_name"]').value = name;
            form.querySelector('[name="operation_type_description"]').value = description;
            form.querySelector('[name="operation_type_sequence_order"]').value = sequenceOrder??"0";
        }
        // Confirm deletion
        function confirmDeletion(operation_type_id, name){
            if (confirm(`Are you sure you want to delete "${name}"?`)) {
                console.log(`Deleted operation type ID: ${operation_type_id}`);
                displayMessage('success', 'Operation type deleted successfully.');
                // Add your delete logic here
            }
        }
        // Trigger operation setup card
        const setupCard = document.getElementById('operation-type-card');
        document.querySelector('#setup-operation-type').addEventListener('click', () => {
            showElement(setupCard);
            scrollToElement(setupCard);
        });

        // Initialize DataTable for operation categories
        let categoriesTable = $('#tbl-operation-categories').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [2] } // Disable sorting on the "Action" column
            ],
            data: [], // Start with an empty data array
            columns: [
                { data: 'name' },
                { data: 'description' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-outline-primary btn-sm" onclick="editOperationCategory(${row.operation_category_id}, '${row.name}', '${row.description}')">
                                    <i class="las la-edit"></i> Edit
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="confirmCategoryDeletion(${row.operation_category_id}, '${row.name}')">
                                    <i class="las la-trash-alt"></i> Delete
                                </button>
                            </div>`;
                    }
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
        document.getElementById('operationCategoryCollapse').addEventListener('shown.bs.collapse', () => {
            console.log('====================================');
            console.log('Fetching operation categories...');
            console.log('====================================');
            let company_id = {{ json_encode($company->company_id) }};
            let url = `/admin/get-operation-category/${company_id}`;
            let categoriesSpinner = document.getElementById('loading-spinner');
            try {
                showElement(categoriesSpinner);
                fetchFieldInput(url).then(data => {
                    if (data.status === "success") {
                        data_array = data.operation_categories.map(
                            category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                        );

                        // Clear and add rows without destroying the table
                        categoriesTable.clear();
                        categoriesTable.rows.add(data_array);
                        categoriesTable.draw();
                        hideElement(categoriesSpinner);
                    }
                });
            } catch (error) {
                console.error("Error showing spinner:", error);
                displayMessage('danger', 'An error occurred while fetching data.');
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
            if (confirm(`Are you sure you want to delete "${name}"?`)) {
                console.log(`Deleted operation category ID: ${operation_category_id}`);
                displayMessage('success', 'Operation category deleted successfully.');
                // Add your delete logic here
            }
        }

        // Trigger operation category setup card
        let setupCategoryCard = document.getElementById('operation-category-card');
        document.querySelector('#setup-operation-category').addEventListener('click', () => {
            showElement(setupCategoryCard);
            scrollToElement(setupCategoryCard);
        });
        // 
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

        // function showElement(element) {
        //     if (element) element.classList.remove('d-none');
        // }

        // function hideElement(element) {
        //     if (element) element.classList.add('d-none');
        // }

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
            const company_id = {{ json_encode($company->company_id) }};
            const url = `/admin/get-operations-log/${company_id}`;
            const operationsLogSpinner = document.getElementById('loading-spinner');

            showElement(operationsLogSpinner);

            try {
                const data = await fetchOperationsLog(url);
                if (data.status === "success") {
                    const dataArray = data.operations.map(log => 
                        new OperationLog(
                            log.company_operation_id ?? 0,
                            log.operation_name ?? "N/A",
                            log.operation_code ?? "N/A",
                            log.operation_type?.name ?? "Unknown Type",
                            log.operation_category?.name ?? "Unknown Category",
                            log.operation_unit_cost ?? 0,
                            log.calendar_year?.name ?? "N/A",
                            log.start_date ?? null,
                            log.end_date ?? null,
                            formatOperationStatus(log.operation_status)
                        )
                    );

                    // Clear and repopulate table rows
                    operationsLogTable.clear();
                    operationsLogTable.rows.add(dataArray);
                    operationsLogTable.draw();
                } else {
                    displayMessage('warning', 'No operations found.');
                }
            } catch (error) {
                console.error("Error fetching operations log:", error);
                displayMessage('danger', 'An error occurred while fetching operations log.');
            } finally {
                hideElement(operationsLogSpinner);
            }
        });

        // setup operation log
        const setupOperationLogCard = document.getElementById('operation-log-card');
        document.querySelector('#btn-setup-operation-log').addEventListener('click', () => {
            showElement(setupOperationLogCard);
            scrollToElement(setupOperationLogCard);
        });
        // Hide operation log card on page load
        document.addEventListener('DOMContentLoaded', () => {
            hideElement(setupOperationLogCard);
        });
        // View operation log
        function viewOperationLog() {
            const viewOperationCard = document.getElementById('operation-log-card');
            showElement(viewOperationCard);
            scrollToElement(viewOperationCard);
        }

        // Edit operation log
        function editOperationLog(operation_id, operation_name, operation_code, operation_type, operation_category, operation_unit, expected_waste_per_operation, expected_water_usage_per_operation, expected_unit_produced_for_goods, calendar_year, start_date, end_date, status) {
            const editOperationCard = document.getElementById('operation-log-card');
            showElement(editOperationCard);
            scrollToElement(editOperationCard);

            const form = document.getElementById('operations-form-update');
            form.querySelector('[name="operation_id"]').value = operation_id;
            form.querySelector('[name="operation_name"]').value = operation_name;
            form.querySelector('[name="operation_code"]').value = operation_code;
            form.querySelector('[name="operation_type"]').value = operation_type;
            form.querySelector('[name="operation_category"]').value = operation_category;
            form.querySelector('[name="operation_unit"]').value = operation_unit;
            form.querySelector('[name="operation_unit_price"]').value = expected_waste_per_operation;
            form.querySelector('[name="operation_unit_cost"]').value = expected_water_usage_per_operation;
            form.querySelector('[name="operation_unit_time"]').value = expected_unit_produced_for_goods;
            form.querySelector('[name="calendar_year"]').value = calendar_year;
            form.querySelector('[name="start_date"]').value = start_date;
            form.querySelector('[name="end_date"]').value = end_date;
            form.querySelector('[name="status"]').value = status;
        }

        // Confirm deletion
        function confirmOperationLogDeletion(operation_id, operation_name) {
            if (confirm(`Are you sure you want to delete "${operation_name}"?`)) {
            console.log(`Deleted operation log ID: ${operation_id}`);
            displayMessage('success', 'Operation log deleted successfully.');
            // Add your delete logic here
            }
        }
    </script>
    <script>
        function calculateOperationUnitCost() {
            console.log("Calculating operation unit cost...");
            
            // Fetch cost fields
            const labourCost = parseFloat(document.getElementById('labour_cost').value) || 0;
            const overheadCost = parseFloat(document.getElementById('overhead_cost').value) || 0;
            const maintenanceCost = parseFloat(document.getElementById('maintenance_cost').value) || 0;
            const depreciationCost = parseFloat(document.getElementById('depreciation_cost').value) || 0;
            const supervisionCost = parseFloat(document.getElementById('supervision_cost').value) || 0;
            const variableCost = parseFloat(document.getElementById('variable_cost').value) || 0;
            const fixedCost = parseFloat(document.getElementById('fixed_cost').value) || 0;

            // Calculate material costs
            let totalMaterialCost = 0;
            document.querySelectorAll('.material-quantity-used-container-operation-log .row').forEach((row, i) => {
                const quantity = parseFloat(row.querySelector(`[name="material_used[${i}][quantity]"]`).value) || 0;
                const unitCost = parseFloat(row.querySelector(`[name="material_used[${i}][unit_cost]"]`).value) || 0;
                totalMaterialCost += quantity * unitCost;
            });


            // Calculate chemical costs
            let totalChemicalCost = 0;
            document.querySelectorAll('.chemical-quantity-container-operation-log .row').forEach((row, i) => {
                const quantity = parseFloat(row.querySelector(`[name="chemical_used[${i}][quantity]"]`).value) || 0;
                const unitCost = parseFloat(row.querySelector(`[name="chemical_used[${i}][unit_cost]"]`).value) || 0;
                totalChemicalCost += quantity * unitCost;
            });

            // Calculate total cost
            const totalCost = labourCost + overheadCost + maintenanceCost + depreciationCost +
                            supervisionCost + variableCost + fixedCost +
                            totalMaterialCost + totalChemicalCost;
            // update the total cost
            document.getElementById('total_operation_cost').value = totalCost.toFixed(2);
            // Fetch product quantities
            const productQuantities = document.querySelectorAll('[name="expected_quantity_produced_for_goods[]"]');
            let totalOutputQuantity = 0;

            productQuantities.forEach(input => {
                totalOutputQuantity += parseFloat(input.value) || 0;
            });

            // Ensure output quantity is valid
            if (totalOutputQuantity === 0) {
                document.getElementById('operation_unit_cost').value = "N/A";
                return;
            }

            // Calculate operation unit cost
            const operationUnitCost = totalCost / totalOutputQuantity;

            // Update the Operation Unit Cost field
            document.getElementById('operation_unit_cost').value = operationUnitCost.toFixed(2);
        }

        // Attach listeners to all relevant input fields
        function attachListeners() {
            const fields = document.querySelectorAll('#labour_cost, #overhead_cost, #maintenance_cost, #depreciation_cost, #supervision_cost, #variable_cost, #fixed_cost, [name^="material_used"][name$="[quantity]"], [name^="material_used"][name$="[unit_cost]"], [name^="chemical_used"][name$="[quantity]"], [name^="chemical_used"][name$="[unit_cost]"], [name="expected_quantity_produced_for_goods[]"]');
            console.log(fields);
            
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
        async function ChangePolicy(ele, company, policy) {
            console.log(ele, company, policy);
            if (ele.checked) {
                let uri = "{{ route('admin.add-company-policy') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('policy', policy)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--policy", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove this policy?")) {
                    let uri = "{{ route('admin.remove-company-policy') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('policy', policy)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--policy", data);
                    })
                }
            }
        }

        // company objectives
        async function ChangeObjectives(ele, company, objective) {
            console.log(ele, company, objective);
            if (ele.checked) {
                let uri = "{{ route('admin.add-company-objective') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('objective', objective)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--objective", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove this policy?")) {
                    let uri = "{{ route('admin.remove-company-objective') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('objective', objective)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--objective", data);
                    })
                }
            }
        }
    </script>

    <script>
        // area of utmost benefit
        async function ChangeUtmostBenefit(ele, company, benefit) {
            console.log(ele, company, benefit);
            if (ele.checked) {
                let uri = "{{ route('admin.add-recp-project') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('areas_of_company_benefit', benefit)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--benefit", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove this area of benefit?")) {
                    let uri = "{{ route('admin.remove-recp-project') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('areas_of_company_benefit', benefit)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--benefit", data);
                    })
                }
            }
        }

        // human  & environmental and health benefit
        async function ChangeEnvironmentalBenefit(ele, company, benefit) {
            console.log(ele, company, benefit);
            if (ele.checked) {
                let uri = "{{ route('admin.add-recp-environmental') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('enviromental_benefit_title', benefit)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--benefit", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove this benefit?")) {
                    let uri = "{{ route('admin.remove-recp-environmental') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('enviromental_benefit_title', benefit)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--benefit", data);
                    })
                }
            }
        }

        // Good House Keeping
        async function ChangeGoodHouseKeeping(ele, company, house_keeping) {
            console.log(ele, company, house_keeping);
            if (ele.checked) {
                let uri = "{{ route('admin.add-house-keeping') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('house_keeping_title', house_keeping)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--house keeping", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove House keeping?")) {
                    let uri = "{{ route('admin.remove-house-keeping') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('house_keeping_title', house_keeping)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--house keeping", data);
                    })
                }
            }
        }

        // Waste Reduction measures
        async function ChangeWasteReductionMeasures(ele, company, measure) {
            console.log(ele, company, measure);
            if (ele.checked) {
                let uri = "{{ route('admin.add-waste-reduction-measure') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('waste_reduction_measure', measure)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--Wate Reduction Measure", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove this waste reduction measure?")) {
                    let uri = "{{ route('admin.remove-waste-reduction-measure') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('waste_reduction_measure', measure)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json();
                        console.log("--wate_reduction_measure", data);
                    });
                }
            }
        }
        // Waste disposal method
        async function ChangeWasteDisposalMethod(ele, company, disposal_method) {
            console.log(ele, company, disposal_method);
            if (ele.checked) {
                let uri = "{{ route('admin.add-waste-disposal-method') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('waste_management_method', disposal_method)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--Waste Disposal Method", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove waste management method?")) {
                    let uri = "{{ route('admin.remove-waste-disposal-method') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('waste_management_method', disposal_method)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--Waste Disposal Method", data);
                    });
                }
            }
        }

        // Product recovery measures
        async function ChangeProductRecoveryMeasure(ele, company, measure) {
            console.log(ele, company, measure);
            if (ele.checked) {
                let uri = "{{ route('admin.add-product-recovery-measure') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('product_recovery_measure', measure)
                let response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log("--product recovery measure", data);
                    if (data.status == 'success') {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                        }).showToast();
                    }

                    if (data.status == 'error') {
                        console.log(data.errors);
                        for (let key in data.errors) {
                            Toastify({
                                text: data.errors[key],
                                duration: 3000,
                                close: true,
                                gravity: "top",     // `top` or `bottom`
                                position: "right",  // `left`, `center` or `right`
                                stopOnFocus: true,  // Prevents dismissing of toast on hover
                                style: {
                                    background: "linear-gradient(to right, #ff0000, #ff1745)",
                                }
                            }).showToast();
                        }
                    }
                })
            } else {
                if (confirm("Do you want to remove product recovery measure?")) {
                    let uri = "{{ route('admin.remove-product-recovery-measure') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('product_recovery_measure', measure)
                    let response = await fetch(uri, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                        credentials: 'same-origin',
                        body: formData
                    }).then(async (response) => {
                        let data = await response.json()
                        console.log("--product recovery measure", data);
                    });
                }
            }
        }


        // key areas for improvement
        // ***** Add key area ******//
        let add_more_key_areas = document.querySelector('.add_more_key_areas')
        add_more_key_areas.addEventListener('click', () => {
            let key_area_value = document.querySelector('#key_area_for_improvent').value.trim();
            if (!key_area_value) {
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
                return
            }

            let url = `{{ route('admin.add-improvement-key-area') }}`;
            let formData = new FormData();
            formData.append('company', '{{$company->company_id}}')
            formData.append('key_area', key_area_value);

            fetch_cycle('--Add Key Area', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
                if (result.key_areas) {
                    let container = document.querySelector('.key-areas-container')
                    container.innerHTML = "";
                    result.key_areas.forEach(element => {
                        console.log(element.area_title);
                        container.innerHTML += `
        <div class="row g-2 my-1">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.area_title}" placeholder="Key area for improving performance in your industry" onblur='update_key_area("{{$company->company_id}}", ${element.improvementAreaID}, this)'>
                </div>
            </div>
            <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_key_area(this, ${element.improvementAreaID} )' type="button">  <i class="iconoir-trash"></i> </button></div>
        </div>
    `
                    });
                }
            });
        });
        // ***** Udate key area ******//
        function update_key_area(company, key_area_id, ele) {
            console.log(company, key_area_id, ele.value);
            let key_area_value = ele.value.trim();
            if (!key_area_value) {
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
                return
            }

            let url = `{{ route('admin.update-improvement-key-area') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('key_area_id', key_area_id)
            formData.append('key_area', key_area_value);
            fetch_cycle('--Update Key Area', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        function remove_key_area(ele, key_area_id) {
            console.log(ele, key_area_id);

            let parent = ele.parentElement.parentElement
            // parent.remove()
            if (confirm("Do you want to delete this area of perfomance improvement?")) {
                let url = `{{ route('admin.remove-improvement-key-area') }}`;
                let formData = new FormData();
                formData.append('key_area_id', key_area_id)
                fetch_cycle('--Update Key Area', url, 'POST', formData).then(result => {
                    // let data = await result.json()
                    console.log(result);
                    if (result.status == 'success') {
                        parent.remove()
                    }
                });

            }
        }
        // end key area for improvement

        // key Product Innovation
        // ***** Add ******//
        let add_more_key_innovation = document.querySelector('.add_more_key_innovation')
        add_more_key_innovation.addEventListener('click', () => {
            let key_product_innovation_value = document.querySelector('#key_product_innovation').value.trim();
            if (!key_product_innovation_value) {
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
                return
            }

            let url = `{{ route('admin.add-product-innovation') }}`;
            let formData = new FormData();
            formData.append('company', '{{$company->company_id}}')
            formData.append('key_product_innovation', key_product_innovation_value);

            fetch_cycle('--Add Key Product Innovation', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
                if (result.product_innovation) {
                    let container = document.querySelector('.product-innovation-container')
                    container.innerHTML = "";
                    result.product_innovation.forEach(element => {
                        console.log(element.product_innovation);
                        container.innerHTML += `
        <div class="row g-2 my-1">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.innovation_area_title}" placeholder="Key innovation that enhance your product's environmental compatibility" onblur='update_product_innovation("{{$company->company_id}}", ${element.innovationAreaID}, this)'>
                </div>
            </div>
            <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_product_innovation(this, ${element.innovationAreaID} )' type="button">  <i class="iconoir-trash"></i> </button></div>
        </div>
    `
                    });
                }
            });
        });

        // ***** Udate ******//
        function update_product_innovation(company, product_innovation_id, ele) {
            console.log(company, product_innovation_id, ele.value);
            let key_product_innovation_value = ele.value.trim();
            if (!key_product_innovation_value) {
                Toastify({
                    text: "Key product innovation cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.update-product-innovation') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('key_product_innovation_id', product_innovation_id)
            formData.append('key_product_innovation', key_product_innovation_value);
            fetch_cycle('--Update Key Product Innovation', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        function remove_product_innovation(ele, key_product_innovation_id) {
            console.log(ele, key_product_innovation_id);

            let parent = ele.parentElement.parentElement
            // parent.remove()
            if (confirm("Do you want to delete this area of perfomance improvement?")) {
                let url = `{{ route('admin.remove-product-innovation') }}`;
                let formData = new FormData();
                formData.append('key_product_innovation_id', key_product_innovation_id)
                fetch_cycle('--Update Key Area', url, 'POST', formData).then(result => {
                    // let data = await result.json()
                    console.log(result);
                    if (result.status == 'success') {
                        parent.remove()
                    }
                });

            }
        }
        // end Product Innovation

        // key Hazarduous Material
        // ***** Add ******//
        let add_more_hazardous_material = document.querySelector('.add_more_hazardous_material')
        add_more_hazardous_material.addEventListener('click', () => {
            let hazarduous_material_value = document.querySelector('#hazarduous_material').value.trim();
            if (!hazarduous_material_value) {
                Toastify({
                    text: "Hazarduous material field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.add-hazarduous-material') }}`;
            let formData = new FormData();
            formData.append('company', '{{$company->company_id}}')
            formData.append('hazarduous_material', hazarduous_material_value);

            fetch_cycle('--Add Hazarduous Material', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
                if (result.hazarduous_materials) {
                    let container = document.querySelector('.hazarduous-material-container')
                    container.innerHTML = "";
                    result.hazarduous_materials.forEach(element => {
                        console.log(element);
                        container.innerHTML += `
        <div class="row g-2 my-1">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.material_title}" placeholder="Key innovation that enhance your product's environmental compatibility" onblur='update_hazarduous_material("{{$company->company_id}}", ${element.hazarduousMaterialID}, this)'>
                </div>
            </div>
            <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_harzardous_material(this, ${element.hazarduousMaterialID} )' type="button">  <i class="iconoir-trash"></i> </button></div>
        </div>
    `
                    });
                }
            });
        });

        // ***** Udate ******//
        function update_hazarduous_material(company, hazarduous_material_id, ele) {
            console.log(company, hazarduous_material_id, ele.value);
            let hazarduous_material_value = ele.value.trim();
            if (!hazarduous_material_value) {
                Toastify({
                    text: "Key product innovation cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.update-hazarduous-material') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('hazarduous_material_id', hazarduous_material_id)
            formData.append('hazarduous_material', hazarduous_material_value);
            fetch_cycle('--Update Hazarduous Material', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        function remove_harzardous_material(ele, hazarduous_material_id) {
            console.log(ele, hazarduous_material_id);
            let parent = ele.parentElement.parentElement
            if (confirm("Do you want to delete this hazaruous material?")) {
                let url = `{{ route('admin.remove-hazarduous-material') }}`;
                let formData = new FormData();
                formData.append('hazarduous_material_id', hazarduous_material_id)
                fetch_cycle('--Remove Hazarduous Material', url, 'POST', formData).then(result => {
                    console.log(result);
                    if (result.status == 'success') {
                        parent.remove()
                    }
                });

            }
        }
        // end hazarduous material

        // Unit Process
        // ***** Add ******//
        let add_more_unit_process = document.querySelector('.add_more_unit_process')
        add_more_unit_process.addEventListener('click', () => {
            let unit_process_value = document.querySelector('#unit_process').value.trim();
            if (!unit_process_value) {
                Toastify({
                    text: "Unit process field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.add-unit-process') }}`;
            let formData = new FormData();
            formData.append('company', '{{$company->company_id}}')
            formData.append('unit_process', unit_process_value);

            fetch_cycle('--Add Unit Process', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
                if (result.unit_processes) {
                    let container = document.querySelector('.unit-process-container')
                    container.innerHTML = "";
                    result.unit_processes.forEach(element => {
                        console.log(element);
                        container.innerHTML += `
        <div class="row g-2 my-1">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.unit_process_title}" placeholder="Unit process" onblur='update_unit_process("{{$company->company_id}}", ${element.unitProcessID}, this)'>
                </div>
            </div>
            <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_unit_process(this, ${element.unitProcessID} )' type="button">  <i class="iconoir-trash"></i> </button></div>
        </div>
    `
                    });
                }
            });
        });

        // ***** Update ******//
        function update_unit_process(company, unit_process_id, ele) {
            console.log(company, unit_process_id, ele.value);
            let unit_process_value = ele.value.trim();
            if (!unit_process_value) {
                Toastify({
                    text: "Unit process field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.update-unit-process') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('unit_process_id', unit_process_id)
            formData.append('unit_process', unit_process_value);
            fetch_cycle('--Update Unit Process', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        function remove_unit_process(ele, unit_process_id) {
            console.log(ele, unit_process_id);
            let parent = ele.parentElement.parentElement
            if (confirm("Do you want to delete this unit process?")) {
                let url = `{{ route('admin.remove-unit-process') }}`;
                let formData = new FormData();
                formData.append('unit_process_id', unit_process_id)
                fetch_cycle('--Remove Unit Process', url, 'POST', formData).then(result => {
                    console.log(result);
                    if (result.status == 'success') {
                        parent.remove()
                    }
                });

            }
        }
        // end unit process

        // Problem Summary & Suggeseted Solution
        // ***** Add ******//
        let add_more_problem_solution = document.querySelector('.add_more_problem_solution')
        add_more_problem_solution.addEventListener('click', () => {
            let problem_summary_value = document.querySelector('#problem_summary').value.trim();
            let suggested_solution_value = document.querySelector('#suggested_solution').value.trim();
            if (!problem_summary_value) {
                Toastify({
                    text: "Problem summary field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!suggested_solution_value) {
                Toastify({
                    text: "Suggested solution field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.add-problem-solution') }}`;
            let formData = new FormData();
            formData.append('company', '{{$company->company_id}}')
            formData.append('problem_summary', problem_summary_value);
            formData.append('suggested_solution', suggested_solution_value);

            fetch_cycle('--Add Problem Solution', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
                if (result.problems_solutions) {
                    let container = document.querySelector('.problems-solutions-container')
                    container.innerHTML = "";
                    result.problems_solutions.forEach(element => {
                        console.log(element);
                        container.innerHTML += `
        <div class="row g-2 my-1 align-items-end">
            <div class="col-md-5">
                <label for="">Problem Summary</label>
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.problem_title}" placeholder="Problem Summary" onblur='update_problem_summary("{{$company->company_id}}", ${element.problemSolutionID}, this)'>
                </div>
            </div>
            <div class="col-md-5">
                <label for="">Suggested Solution</label>
                <div class="form-group">
                    <input type="text" class="form-control" value="${element.solution_title}" placeholder="Suggested solution" onblur='update_suggested_solution("{{$company->company_id}}", ${element.problemSolutionID}, this)'>
                </div>
            </div>
            <div class="col-md-2"><button class="btn btn-outline-danger" onclick='remove_problem_solution(this, ${element.problemSolutionID} )' type="button">  <i class="iconoir-trash"></i> </button></div>
        </div>
    `
                    });
                }
            });
        });

        // ***** Update problem ******//
        function update_problem_summary(company, problem_solution_id, ele) {
            console.log(company, problem_solution_id, ele.value);
            let problem_summary_value = ele.value.trim();
            if (!problem_summary_value) {
                Toastify({
                    text: "Problem summary field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.update-problem-summary') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('problem_solution_id', problem_solution_id)
            formData.append('problem_summary', problem_summary_value);
            fetch_cycle('--Update problem summary', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        // ***** Update solution ******//
        function update_suggested_solution(company, problem_solution_id, ele) {
            console.log(company, problem_solution_id, ele.value);
            let suggested_solution_value = ele.value.trim();
            if (!suggested_solution_value) {
                Toastify({
                    text: "Suggested solution field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = `{{ route('admin.update-suggested-solution') }}`;
            let formData = new FormData();
            formData.append('company', company)
            formData.append('problem_solution_id', problem_solution_id)
            formData.append('suggested_solution', suggested_solution_value);
            fetch_cycle('--Update suggested solution', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result);
            });
        }

        function remove_problem_solution(ele, problem_solution_id) {
            console.log(ele, problem_solution_id);
            let parent = ele.parentElement.parentElement
            if (confirm("Do you want to delete this Problem summary with it's suggested solution?")) {
                let url = `{{ route('admin.remove-problem-solution') }}`;
                let formData = new FormData();
                formData.append('problem_solution_id', problem_solution_id)
                fetch_cycle('--Remove Problem Solution', url, 'POST', formData).then(result => {
                    console.log(result);
                    if (result.status == 'success') {
                        parent.remove()
                    }
                });

            }
        }
        // end hazarduous material

        // material
        let btn_submit_material = document.querySelector('#btn-submit-material');
        btn_submit_material.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.getElementById('loader');
            loader.style.display = 'inline-block';

            let companyID = document.querySelector('input[name="company_id"]').value.trim();
            let materialID = document.querySelector('select[name="material"]').value.trim();
            let serialNo = document.querySelector('input[name="serial_number"]').value.trim();
            let unit = document.querySelector('input[name="unit_of_measurement"]').value.trim();
            let threshold = document.querySelector('input[name="threshold"]').value.trim();
            if (!companyID) {
                Toastify({
                    text: "Company id field cannot be empty.",
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
                return
            }
            if (!materialID) {
                Toastify({
                    text: "Material field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-material') }}"
            let formData = new FormData();
            formData.append('companyID', companyID);
            formData.append('material', materialID);
            formData.append('serial_number', serialNo);
            formData.append('unit_of_measurement', unit);
            formData.append('threshold', threshold);
            fetch_cycle('--Update problem summary', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
                if (result.company_material) {
                    let tableBody = document.querySelector('#tbl-company-material tbody')
                    console.log(tableBody);
                    tableBody.innerHTML = ""
                    result.company_material.forEach(material => {
                        let id = material.companyMaterialId;
                        const baseUrl = "{{ route('admin.view-material', ['material' => '__PLACEHOLDER__']) }}";
                        const url = baseUrl.replace('__PLACEHOLDER__', id);

                        tableBody.innerHTML += `<tr>
                            <td>${material.material}</td>
                            <td>${material.serial_number ?? ''}</td>
                            <td>${material.unit_of_measure ?? ''}</td>
                            <td> <span class="badge bg-${(material.company_material_status == 'active') ? 'success' : 'danger'}">${material.company_material_status}</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="${url}">Open Material</a>
                                        <a class="dropdown-item" href="#">Update Material</a>
                                        <a class="dropdown-item" href="#">Delete Material</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="#" onclick = 'triggerMaterialPrice("${material.companyMaterialId}")'>Setup Price</a>
                                        <a href="#" class="dropdown-item" onclick='triggerCheckIn("${material.companyMaterialId}", "${material.materialID}", "${material.companyID}", "${material.material}")'> Check In Item </a>
                                        <a href="#" class="dropdown-item" onclick='triggerCheckOut("${material.companyMaterialId}", "${material.materialID}", "${material.companyID}",  "${material.material}")'> Check Out Item </a>
                                        <a href="#" class="dropdown-item" onclick='triggerAdjustment("${material.companyMaterialId}", "${material.materialID}", "${material.companyID}",  "${material.material}")'> Make Adjusment </a>
                                    </div>
                                </div>
                            </td>
                        </tr>`
                    });
                }
            });
        });
        // end material

        // company material price
        let btn_submit_material_price = document.querySelector('#btn-submit-material-price');
        btn_submit_material_price.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#materialPriceModal #loader');
            loader.style.display = 'inline-block';

            let material_price_id = document.querySelector('input[name="material_price_id"]').value.trim();
            let unit = document.querySelector('input[name="unit"]').value.trim();
            let price = document.querySelector('input[name="price"]').value.trim();
            let date = document.querySelector('input[name="date"]').value.trim();
            if (!material_price_id) {
                Toastify({
                    text: "Material price id field cannot be empty.",
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
                return
            }
            if (!unit) {
                Toastify({
                    text: "Unit field cannot be empty.",
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
                return
            }
            if (!price) {
                Toastify({
                    text: "Price field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-material-price') }}"
            let formData = new FormData();
            formData.append('companyMaterialID', material_price_id);
            formData.append('unit', unit);
            formData.append('price', price);
            formData.append('date', date);
            fetch_cycle('--Update problem summary', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
        // end company material price

        // checkin
        let btn_submit_check_in = document.querySelector('#btn-submit-check-in');
        btn_submit_check_in.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#checkInModal #loader');
            loader.style.display = 'inline-block';

            let checkIn_material_id = document.querySelector('#checkInModal input[name="checkIn_material_id"]').value.trim();
            let material_id = document.querySelector('#checkInModal input[name="material_id"]').value.trim();
            let company_id = document.querySelector('#checkInModal input[name="company_id"]').value.trim();
            let quantity = document.querySelector('#checkInModal input[name="quantity"]').value.trim();
            let date = document.querySelector('#checkInModal input[name="date"]').value.trim();
            let remark = document.querySelector('#checkInModal input[name="remark"]').value.trim();
            if (!checkIn_material_id) {
                Toastify({
                    text: "Material id field cannot be empty.",
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
                return
            }
            if (!quantity) {
                Toastify({
                    text: "Quantity field cannot be empty.",
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
                return
            }
            if (!date) {
                Toastify({
                    text: "Date field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-material-check-in') }}"
            let formData = new FormData();
            formData.append('checkIn_material_id', checkIn_material_id);
            formData.append('material_id', material_id);
            formData.append('company_id', company_id);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);
            fetch_cycle('--Create Check In', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
        // end company material price

        // company material checkout
        let btn_submit_check_out = document.querySelector('#btn-submit-check-out');
        btn_submit_check_out.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#checkOutModal #loader');
            loader.style.display = 'inline-block';

            let checkOut_material_id = document.querySelector('#checkOutModal input[name="checkOut_material_id"]').value.trim();
            let material_id = document.querySelector('#checkOutModal input[name="material_id"]').value.trim();
            let company_id = document.querySelector('#checkOutModal input[name="company_id"]').value.trim();
            let quantity = document.querySelector('#checkOutModal input[name="quantity"]').value.trim();
            let date = document.querySelector('#checkOutModal input[name="date"]').value.trim();
            let remark = document.querySelector('#checkOutModal input[name="remark"]').value.trim();
            if (!checkOut_material_id) {
                Toastify({
                    text: "Material id field cannot be empty.",
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
                return
            }
            if (!quantity) {
                Toastify({
                    text: "Quantity field cannot be empty.",
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
                return
            }
            if (!date) {
                Toastify({
                    text: "Date field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-material-check-out') }}"
            let formData = new FormData();
            formData.append('checkOut_material_id', checkOut_material_id);
            formData.append('material_id', material_id);
            formData.append('company_id', company_id);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);
            fetch_cycle('--Create Check Out', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
        // end check out

        // general setting
        let btn_general_settings = document.querySelector('#btn-general-settings')
        btn_general_settings.addEventListener('click', () => {
            // Show the loader
            let loader = document.querySelector('#general-settings #loader');
            loader.style.display = 'inline-block';
            let company_id = document.querySelector('#general-settings input[name="company_id"]').value.trim();
            let company_name = document.querySelector('#general-settings input[name="company_name"]').value.trim();
            let industry = document.querySelector('#general-settings select[name="industry"]').value.trim();
            let industry_process_used = document.querySelector('#general-settings select[name="industry_process_used"]').value.trim();
            let email = document.querySelector('#general-settings input[name="email"]').value.trim();
            let website_address = document.querySelector('#general-settings input[name="website_address"]').value.trim();
            let primary_phone_number = document.querySelector('#general-settings input[name="primary_phone_number"]').value.trim();
            let secondary_phone_number = document.querySelector('#general-settings input[name="secondary_phone_number"]').value.trim();
            let number_of_employees = document.querySelector('#general-settings input[name="number_of_employees"]').value.trim();
            let date_of_establishment = document.querySelector('#general-settings input[name="date_of_establishment"]').value.trim();

            if (!company_id) {
                loader.style.display = 'none';
                Toastify({
                    text: "Company id field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!company_name) {
                loader.style.display = 'none';
                Toastify({
                    text: "Company name field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!industry) {
                loader.style.display = 'none';
                Toastify({
                    text: "Industry field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!email) {
                loader.style.display = 'none';
                Toastify({
                    text: "Company email field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!primary_phone_number) {
                loader.style.display = 'none';
                Toastify({
                    text: "Primary phone number field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!number_of_employees) {
                loader.style.display = 'none';
                Toastify({
                    text: "Number of employees field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!date_of_establishment) {
                loader.style.display = 'none';
                Toastify({
                    text: "Establishment date field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = document.querySelector('#general-settings').action;
            let formData = new FormData();
            formData.append('company_id', company_id);
            formData.append('company_name', company_name);
            formData.append('industry', industry);
            formData.append('industry_process', industry_process_used);
            formData.append('email', email);
            formData.append('website_address', website_address);
            formData.append('primary_phone_number', primary_phone_number);
            formData.append('secondary_phone_number', secondary_phone_number);
            formData.append('number_of_employees', number_of_employees);
            formData.append('establishment_date', date_of_establishment);

            fetch_cycle('--Update Personal company details', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result, result.companies_info);
                if (result.companies_info) {
                    loader.style.display = 'none';
                }
            });

        });
        // end general setting 

        // company location update
        let btn_location_settings = document.querySelector('#btn-location-settings')
        btn_location_settings.addEventListener('click', () => {
            // Show the loader
            let loader = document.querySelector('#location_settings #loader');
            loader.style.display = 'inline-block';
            let company_id = document.querySelector('#location_settings input[name="company_id"]').value.trim();
            let country = document.querySelector('#location_settings select[name="country"]').value.trim();
            let state = document.querySelector('#location_settings select[name="state"]').value.trim();
            let city = document.querySelector('#location_settings select[name="city"]').value.trim();
            let address = document.querySelector('#location_settings  input[name="address"]').value.trim();
            let zip_code = document.querySelector('#location_settings  input[name="zip_code"]').value.trim();
            let longitude = document.querySelector('#location_settings  input[name="longitude"]').value.trim();
            let latitude = document.querySelector('#location_settings  input[name="latitude"]').value.trim();
            let mgrs = document.querySelector('#location_settings  input[name="mgrs"]').value.trim();

            if (!company_id) {
                loader.style.display = 'none';
                Toastify({
                    text: "Company id field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!country) {
                loader.style.display = 'none';
                Toastify({
                    text: "Country field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!state) {
                loader.style.display = 'none';
                Toastify({
                    text: "State field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!city) {
                loader.style.display = 'none';
                Toastify({
                    text: "City field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!address) {
                loader.style.display = 'none';
                Toastify({
                    text: "Address field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = document.querySelector('#location_settings').action;
            let formData = new FormData();
            formData.append('company_id', company_id);
            formData.append('country', country);
            formData.append('state', state);
            formData.append('city', city);
            formData.append('address', address);
            formData.append('zip_code', zip_code);
            formData.append('longitude', longitude);
            formData.append('latitude', latitude);
            formData.append('mgrs', mgrs);

            fetch_cycle('--Update Company Location', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result, result.companies_info);
                if (result.companies_info) {
                    loader.style.display = 'none';

                }
            });

        });
        // end company location update
        // company contact update
        let btn_contact_settings = document.querySelector('#btn_contact_settings')
        btn_contact_settings.addEventListener('click', () => {
            // Show the loader
            let loader = document.querySelector('#contact_settings #loader');
            loader.style.display = 'inline-block';
            let company_id = document.querySelector('#contact_settings input[name="company_id"]').value.trim();
            let enviromental_operations_manager = document.querySelector('#contact_settings input[name="enviromental_operations_manager"]').value.trim();
            let contact_person_name = document.querySelector('#contact_settings input[name="contact_person_name"]').value.trim();
            let contact_person_position = document.querySelector('#contact_settings input[name="contact_person_position"]').value.trim();
            let contact_person_phone_number = document.querySelector('#contact_settings input[name="contact_person_phone_number"]').value.trim();
            if (!company_id) {
                loader.style.display = 'none';
                Toastify({
                    text: "Company id field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!enviromental_operations_manager) {
                loader.style.display = 'none';
                Toastify({
                    text: "Enviromental operations manager field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!contact_person_name) {
                loader.style.display = 'none';
                Toastify({
                    text: "Contact person name field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!contact_person_position) {
                loader.style.display = 'none';
                Toastify({
                    text: "Contact person position field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!contact_person_name) {
                loader.style.display = 'none';
                Toastify({
                    text: "Contact person name field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            if (!contact_person_position) {
                loader.style.display = 'none';
                Toastify({
                    text: "Contact person position field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }
            if (!contact_person_phone_number) {
                loader.style.display = 'none';
                Toastify({
                    text: "Contact person phone number field cannot be empty.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
                return
            }

            let url = document.querySelector('#contact_settings').action;
            let formData = new FormData();
            formData.append('company_id', company_id);
            formData.append('enviromental_operations_manager', enviromental_operations_manager);
            formData.append('contact_person_name', contact_person_name);
            formData.append('contact_person_position', contact_person_position);
            formData.append('contact_person_phone_number', contact_person_phone_number);

            fetch_cycle('--Update Contact Personnel', url, 'POST', formData).then(result => {
                // let data = await result.json()
                console.log(result, result.companies_info);
                if (result.companies_info) {
                    loader.style.display = 'none';

                }
            });

        });
        // end company contact update
        // activate and deactivate start

        // end activate and deactivate start
        async function fetch_cycle(subject, url, method, form_data) {
            try {
                let response = await fetch(url, {
                    method: method,
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: form_data
                });

                let data = await response.json();

                // feedback
                if (data.status == 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                    return data
                } else if (data.status == 'error') {
                    console.log(data.errors);
                    for (let key in data.errors) {
                        Toastify({
                            text: data.errors[key],
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    }
                }
                // end feedback
            } catch (error) {
                console.log('Fetch error:', error);
                Toastify({
                    text: "An unexpected error occurred.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
            }

        }
    </script>
    <script src="{{ asset('adminAssets/js/location.js') }}"></script>
    <script src="{{ asset('adminAssets/js/industry.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"></script>
    <script>
        // -----Country Code Selection
        let tel_primary = document.querySelector('#mobile_code_primary')
        let tel_secondary = document.querySelector('#mobile_code_secondary')
        let tel_contact = document.querySelector('#mobile_code_contact')
        let primary = window.intlTelInput(tel_primary, {
            initialCountry: "ng",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
        let secondary = window.intlTelInput(tel_secondary, {
            initialCountry: "ng",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
        let contact = window.intlTelInput(tel_contact, {
            initialCountry: "ng",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });

        tel_primary.addEventListener("blur", function () {
            const fullPhoneNumber = primary.getNumber(); // Gets the full number in E.164 format
            console.log("Full phone number:", fullPhoneNumber);
            document.querySelector('input[name="primary_phone_number"]').value = fullPhoneNumber
        });

        tel_secondary.addEventListener("blur", function () {
            const fullPhoneNumber = secondary.getNumber(); // Gets the full number in E.164 format
            console.log("Full phone number:", fullPhoneNumber);
            document.querySelector('input[name="secondary_phone_number"]').value = fullPhoneNumber
        });

        tel_contact.addEventListener("blur", function () {
            const fullPhoneNumber = contact.getNumber(); // Gets the full number in E.164 format
            console.log("Full phone number:", fullPhoneNumber);
            document.querySelector('input[name="contact_person_phone_number"]').value = fullPhoneNumber
        });
    </script>
    <script>
        let industry_element = document.querySelector('#industry')
        console.log(industry_element, industry_element.options);
        for (const key in industry_element.options) {
            let ele = industry_element.options[key]
            console.log(ele.value, ele);
            if (ele.value == `{{ $company->industry }}`) {
                console.log("true", `{{ $company->true }}`);
                ele.selected = true
            }
        }

        let industry_process_element = document.querySelector('#industry-process')
        console.log(industry_process_element, industry_process_element.options);
        for (const key in industry_process_element.options) {
            let ele = industry_process_element.options[key]
            console.log(ele.value, ele);
            if (ele.value == `{{ $company->industry_process }}`) {
                console.log("true", `{{ $company->true }}`);
                ele.selected = true
            }
        }

        setTimeout(() => {
            let countriesEle = document.querySelector('.countries')
            console.log(countriesEle.options, countriesEle);
            for (let index = 0; index < countriesEle.options.length; index++) {
                const element = countriesEle.options[index];
                console.log(element);

            }
            let loadCountries = Array.from(countriesEle.options).map(option => option.value)
            console.log(loadCountries);
        }, 1000);
    </script>
    <script>
        // Trigger Material Price Modal
        let triggerMaterialPrice = (companyMaterialID) => {
            let materialPriceModal = document.querySelector('#materialPriceModal');
            // Initialize Bootstrap modal
            document.querySelector('input[name="material_price_id"]').value = companyMaterialID;
            const myModal = new bootstrap.Modal(materialPriceModal);
            myModal.show();
        }

        // Trigger CheckIn
        let triggerCheckIn = (companyMaterialID, materialID, companyID, materialName) => {
            let checkInModal = document.querySelector('#checkInModal');
            // Initialize Bootstrap modal
            document.querySelector('#checkInModal input[name="checkIn_material_id"]').value = companyMaterialID;
            document.querySelector('#checkInModal input[name="material_id"]').value = materialID;
            document.querySelector('#checkInModal input[name="company_id"]').value = companyID;
            document.querySelector('#checkInModal input[name="checkIn_material_name"]').value = materialName;
            const myModal = new bootstrap.Modal(checkInModal);
            myModal.show();
        }

        // Trigger CheckOut
        let triggerCheckOut = (companyMaterialID, materialID, companyID, materialName) => {
            let checkOutModal = document.querySelector('#checkOutModal');
            // Initialize Bootstrap modal
            document.querySelector('#checkOutModal input[name="checkOut_material_id"]').value = companyMaterialID;
            document.querySelector('#checkOutModal input[name="material_id"]').value = materialID;
            document.querySelector('#checkOutModal input[name="company_id"]').value = companyID;
            document.querySelector('#checkOutModal input[name="checkOut_material_name"]').value = materialName;
            const myModal = new bootstrap.Modal(checkOutModal);
            myModal.show();
        }

        // Trigger adjustment
        let triggerAdjustment = (companyMaterialID, materialID, companyID, materialName) => {
            let adjustmentModal = document.querySelector('#adjustmentModal');
            // Initialize Bootstrap modal
            document.querySelector('#adjustmentModal input[name="adjustment_material_id"]').value = companyMaterialID;
            document.querySelector('#adjustmentModal input[name="material_id"]').value = materialID;
            document.querySelector('#adjustmentModal input[name="company_id"]').value = companyID;
            document.querySelector('#adjustmentModal input[name="checkOut_material_name"]').value = materialName;
            const myModal = new bootstrap.Modal(adjustmentModal);
            myModal.show();
        }
    </script>
    <!-- activate and deactivate -->
    <script>
        document.querySelectorAll('.toggle-status').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const companyId = this.getAttribute('data-company-id');
                const status = this.checked ? 1 : 0; // Convert to a boolean-friendly value

                fetch("{{ route('company.toggleStatus') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        company_id: companyId,
                        status: status
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        const feedback = document.getElementById('feedback-message');
                        if (data.success) {
                            feedback.textContent = data.message;
                            feedback.style.color = 'green';
                        } else {
                            feedback.textContent = 'Error updating status!';
                            feedback.style.color = 'red';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const feedback = document.getElementById('feedback-message');
                        feedback.textContent = 'An error occurred!';
                        feedback.style.color = 'red';
                    });
            });
        });

        // Questionaire
        async function ChangeQuestionResult(ele, company, value) {
            console.log(ele, company, value);
            if (ele.checked) {
                let uri = "{{ route('company.add-question') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('question_id', value)
                fetch_cycle('--Save question', uri, 'POST', formData).then(result => {
                    // let data = await result.json()
                    console.log(result);
                });
            } else {
                if (confirm("Do you want to uncheck this?")) {
                    let uri = "{{ route('company.remove-question') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('question_id', value)
                    fetch_cycle('--Save question', uri, 'POST', formData).then(result => {
                        // let data = await result.json()
                        console.log(result);
                    });
                }
            }
        }
        // WaterConservationMethod
        async function ChangeWaterConservationOpportunity(ele, company, value) {
            console.log(ele, company, value);
            if (ele.checked) {
                let uri = "{{ route('company.add-water-conservation-method') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('water_conservation_method_id', value)
                fetch_cycle('--Save method', uri, 'POST', formData).then(result => {
                    // let data = await result.json()
                    console.log(result);
                });
            } else {
                if (confirm("Do you want to uncheck this?")) {
                    let uri = "{{ route('company.remove-water-conservation-method') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('water_conservation_method_id', value)
                    fetch_cycle('--Save method', uri, 'POST', formData).then(result => {
                        // let data = await result.json()
                        console.log(result);
                    });
                }
            }
        }
        // WaterSources
        async function ChangeWaterSources(ele, company, value) {
            console.log(ele, company, value);
            if (ele.checked) {
                let uri = "{{ route('company.add-water-sources') }}";
                let formData = new FormData();
                formData.append('company', company)
                formData.append('water_sources_id', value)
                fetch_cycle('--Save sources', uri, 'POST', formData).then(result => {
                    // let data = await result.json()
                    console.log(result);
                });
            } else {
                if (confirm("Do you want to uncheck this?")) {
                    let uri = "{{ route('company.remove-water-Sources') }}";
                    let formData = new FormData();
                    formData.append('company', company)
                    formData.append('water_sources_id', value)
                    fetch_cycle('--Save sources', uri, 'POST', formData).then(result => {
                        // let data = await result.json()
                        console.log(result);
                    });
                }
            }
        }

        document.querySelector('#water-checkin-trigger').addEventListener('click', function (e) {
            e.preventDefault();

            const waterCheckinCard = document.querySelector('#water-checkin-card');
            waterCheckinCard.classList.remove('d-none');
            waterCheckinCard.scrollIntoView({ behavior: 'smooth' });
        });

        document.querySelector('#water-usage-log-trigger').addEventListener('click', function (e) {
            e.preventDefault();

            const waterUsageLogsCard = document.querySelector('#water-usage-logs-card');
            waterUsageLogsCard.classList.remove('d-none');
            waterUsageLogsCard.scrollIntoView({ behavior: 'smooth' });
        });

        document.querySelector('#water-recycling-log-trigger').addEventListener('click', function (e) {
            e.preventDefault();
            const waterRecyclingLogsCard = document.querySelector('#water-recycling-logs-card');
            waterRecyclingLogsCard.classList.remove('d-none');
            waterRecyclingLogsCard.scrollIntoView({ behavior: 'smooth' });
        });

        document.querySelector('#add-quality-control-record').addEventListener('click', function (e) {
            e.preventDefault();
            const qualityControlCard = document.querySelector('#quality-control-log-card');
            qualityControlCard.classList.remove('d-none');
            qualityControlCard.scrollIntoView({ behavior: 'smooth' });
        });

        document.querySelector('#add-chemical-button').addEventListener('click', function (e) {
            e.preventDefault();
            const chemicalCard = document.querySelector('#add-chemical-form-card');
            chemicalCard.classList.remove('d-none');
            chemicalCard.scrollIntoView({ behavior: 'smooth' });
        });

        document.querySelector('#add-material-button').addEventListener('click', function (e) {
            e.preventDefault();
            const materialCard = document.querySelector('#add-material-form-card');
            materialCard.classList.remove('d-none');
            materialCard.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
    <!-- end activate and deactivate -->
    <script src="https://cdn.jsdelivr.net/npm/date-fns@4.1.0/cdn.min.js"></script>
    <!-- water inventory -->
    <script>
        // check-in form submission
        document.querySelector('#water-checkin-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let url = "{{ route('admin.water-stock-check-in') }}";
            const formData = new FormData(this);

            fetch_cycle('--Save Water Check-In', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the water management table or UI as needed
                    let tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = "";
                    result.water_stock_movements.forEach(water_stock_movement => {
                        let sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        let calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        let formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        let row = document.createElement('tr');
                        row.innerHTML = `
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
                        `;
                        tableBody.appendChild(row);
                    });

                }
            });
        });
        // end check-in form submission
        // water usage log form submission
        document.querySelector('#water-usage-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.water-stock-check-out') }}";

            fetch_cycle('--Save Water Usage Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the water management table or UI as needed
                    let tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = "";
                    result.water_stock_movements.forEach(water_stock_movement => {
                        let sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        let calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        let formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        let row = document.createElement('tr');
                        row.innerHTML = `
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
                        `;
                        tableBody.appendChild(row);
                    });

                }
            });
        });
        // end water usage log form submission
        // water recycling log form submission
        document.querySelector('#water-recycling-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.water-stock-recycling-log') }}";

            fetch_cycle('--Save Water Recycling Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the water management table or UI as needed
                    let tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = "";
                    result.water_stock_movements.forEach(water_stock_movement => {
                        let sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        let calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        let formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        let row = document.createElement('tr');
                        row.innerHTML = `
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
                        `;
                        tableBody.appendChild(row);
                    });
                }
            });
        });
    </script>
    <script>
        // company water sources
        // Store Water Sources
        document.querySelector('#waterSourceForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-water-source-details') }}";

            fetch_cycle('--Store Water Sources', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the water sources table or UI as needed
                    let tableBody = document.querySelector('#tbl-water-sources tbody');
                    tableBody.innerHTML = "";
                    result.water_sources.forEach(source => {
                        tableBody.innerHTML += `<tr>
                            <td>${source.sources}</td>
                            <td>${source.description ?? ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });

    </script>

    <!-- water usage logs -->
    <script>
        // AJAX implementation to store water usage logs
        document.querySelector('#btn-submit-water-usage-logs').addEventListener('click', function () {
            const company_id = document.querySelector('#waterUsageLogsForm input[name="company_id"]').value.trim();
            const water_source = document.querySelector('#waterUsageLogsForm select[name="water_source_selected"]').value.trim();
            const quantity_used = document.querySelector('#waterUsageLogsForm input[name="quantity_used"]').value.trim();
            const unit_of_water_measured = document.querySelector('#waterUsageLogsForm select[name="unit_of_water_measured"]').value.trim();
            const date = document.querySelector('#waterUsageLogsForm input[name="date"]').value.trim();
            const purpose = document.querySelector('#waterUsageLogsForm input[name="purpose"]').value.trim();

            if (!water_source) {
                Toastify({
                    text: "Please select a water source.",
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

            if (!quantity_used) {
                Toastify({
                    text: "Please provide the quantity of water used.",
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

            if (!unit_of_water_measured) {
                Toastify({
                    text: "Please select a unit of measurement.",
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

            if (!date) {
                Toastify({
                    text: "Please provide a date.",
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

            let url = "{{ route('admin.store-water-usage-logs') }}";
            const formData = new FormData();
            formData.append('company_id', company_id);
            formData.append('water_source_id', water_source);
            formData.append('quantity_used', quantity_used);
            formData.append('unit_of_water_measured', unit_of_water_measured);
            formData.append('date', date);
            formData.append('purpose', purpose);

            fetch_cycle('--Save Water Usage Logs', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === "success") {
                    const waterUsageLogsTable = document.querySelector('#waterUsageLogsForm select[name="water_source_selected"]');
                    waterUsageLogsTable.innerHTML = ""; // Clear existing options

                    result.water_usage_logs.forEach(log => {
                        const option = document.createElement("option");
                        option.value = log.WaterSourcesId;
                        option.textContent = log.sources;
                        if (result.company_water_sources.includes(log.WaterSourcesId)) {
                            option.selected = true; // Mark as selected if already associated with the company
                        }
                        waterUsageLogsTable.appendChild(option);
                    });

                    Toastify({
                        text: result.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else {
                    Toastify({
                        text: result.message || "An error occurred.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                    }).showToast();
                }
            });
        });
    </script>

    <!-- water recycling logs -->
    <script>
        document.querySelector('#btn-submit-water-recycling-logs').addEventListener('click', function () {
            const company_id = document.querySelector('#waterRecyclingLogsForm input[name="company_id"]').value.trim();
            const quantity_recycled = document.querySelector('#waterRecyclingLogsForm input[name="quantity_recycled"]').value.trim();
            const unit_of_water_recycled = document.querySelector('#waterRecyclingLogsForm select[name="unit_of_water_recycled"]').value.trim();
            const recycling_date = document.querySelector('#waterRecyclingLogsForm input[name="recycling_date"]').value.trim();
            const method = document.querySelector('#waterRecyclingLogsForm input[name="method"]').value.trim();

            if (!quantity_recycled) {
                Toastify({
                    text: "Please provide the quantity of water recycled.",
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

            if (!unit_of_water_recycled) {
                Toastify({
                    text: "Please select a unit of measurement.",
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

            if (!recycling_date) {
                Toastify({
                    text: "Please provide a recycling date.",
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

            let url = "{{ route('admin.store-water-recycling-logs') }}";
            const formData = new FormData();
            formData.append('company_id', company_id);
            formData.append('quantity_recycled', quantity_recycled);
            formData.append('unit_of_water_recycled', unit_of_water_recycled);
            formData.append('recycling_date', recycling_date);
            formData.append('method', method);

            fetch_cycle('--Save Water Recycling Logs', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === "success" && !document.querySelector('.toastify-success')) {
                    Toastify({
                        text: result.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        className: "toastify-success"
                    }).showToast();
                } else if (!document.querySelector('.toastify-error')) {
                    Toastify({
                        text: result.message || "An error occurred.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #ff0000, #ff1745)",
                        },
                        className: "toastify-error"
                    }).showToast();
                }
            });
        });
    </script>
    <!-- end water recycling logs -->
   <script>
    // Store Quality Control Logs
    document.querySelector('#qualityControlLogForm').addEventListener('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "{{ route('admin.store-water-quality-logs') }}";

        fetch_cycle('--Store Quality Control Log', url, 'POST', formData).then(result => {
            console.log(result);
            if (result.status === 'success') {
                // Update the quality control logs table or UI as needed
                let tableBody = document.querySelector('#tbl-quality-control-management tbody');
                tableBody.innerHTML = "";
                result.water_quality_logs.forEach(quality => {
                    tableBody.innerHTML += `<tr>
                        <td>${quality.test_date}</td>
                        <td>${quality.parameter_tested}</td>
                        <td>${quality.test_results }</td>
                        <td>${quality.deviation_detected}</td>
                        <td>${quality.corrective_actions}</td>
                        <td class="text-end">
                            <div class="dropdown d-inline-block">
                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                });
            }
        });
    });
   </script>
     <!-- start water disposal -->
    <script>
        // Store Waste Disposal
        document.querySelector('#waste-disposal-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-waste-disposal') }}";

            fetch_cycle('--Store Waste Disposal', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the waste disposal table or UI as needed
                    let tableBody = document.querySelector('#tbl-waste-disposal tbody');
                    tableBody.innerHTML = "";
                    result.waste_disposals.forEach(disposal => {
                        tableBody.innerHTML += `<tr>
                            <td>${disposal.waste_type}</td>
                            <td>${disposal.disposal_method}</td>
                            <td>${disposal.quantity}</td>
                            <td>${disposal.disposal_date}</td>
                            <td>${disposal.operation?.operation_name || 'N/A'}</td>
                            <td>${disposal.calendarYear?.name || 'N/A'}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });
    </script>
     <!-- end water disposal -->
    <!-- water usage logs -->



    <!-- Chemical  -->
    <script>
        let btn_submit_chemical = document.querySelector('#btn-submit-chemical');
        btn_submit_chemical.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#btn-submit-chemical #loader');
            loader.style.display = 'inline-block';

            let company_id = document.querySelector('#chemical-form input[name="company_id"]').value.trim();
            let chemical = document.querySelector('#chemical-form select[name="chemical"]').value.trim();
            let unit_of_measurement = document.querySelector('#chemical-form input[name="unit_of_measurement"]').value.trim();
            let threshold = document.querySelector('#chemical-form input[name="threshold"]').value.trim();
            console.log('====================================');
            console.log(chemical, unit_of_measurement);
            console.log('====================================');
            if (!company_id) {
                Toastify({
                    text: "Company ID field cannot be empty.",
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
            if (!chemical) {
                Toastify({
                    text: "Chemical field cannot be empty.",
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
                return
            }
            if (!unit_of_measurement) {
                Toastify({
                    text: "Unit of measurement field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.store-company-chemical') }}"
            let formData = new FormData();
            formData.append('chemical_id', chemical);
            formData.append('unit_of_measurement', unit_of_measurement);
            formData.append('threshold', threshold);
            formData.append('company_id', company_id);
            fetch_cycle('--Save Chemical', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
                if (result.status == "success") {
                    let tableBody = document.querySelector('#tbl-company-chemical tbody')
                    tableBody.innerHTML = ""
                    result.data.forEach(chemical => {
                        let id = chemical.company_chemical_id;
                        const baseUrl = "{{ route('admin.view-chemical', ['chemical' => '__PLACEHOLDER__']) }}";
                        const url = baseUrl.replace('__PLACEHOLDER__', id);

                        tableBody.innerHTML += `<tr>
                            <td>${chemical.name}</td>
                            <td>${chemical.unit ?? ''}</td>
                            <td> <span class="badge bg-${(chemical.chemical_status == 'active') ? 'success' : 'danger'}">${chemical.chemical_status}</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="${url}">Open Chemical</a>
                                        <a class="dropdown-item" href="#">Update Chemical</a>
                                        <a class="dropdown-item" href="#">Delete Chemical</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="#">Setup Price</a>
                                        <a href="#" class="dropdown-item">Check In Item</a>
                                        <a href="#" class="dropdown-item">Check Out Item</a>
                                        <a href="#" class="dropdown-item">Adjustment</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`
                    });
                }
            });
        });

        // Trigger CheckIn Chemical
        let triggerCheckInChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            let checkInChemicalModal = document.querySelector('#checkInChemicalModal');
            // Initialize Bootstrap modal
            document.querySelector('#checkInChemicalModal input[name="checkIn_chemical_id"]').value = companyChemicalID;
            document.querySelector('#checkInChemicalModal input[name="chemical_id"]').value = chemicalID;
            document.querySelector('#checkInChemicalModal input[name="company_id"]').value = companyID;
            document.querySelector('#checkInChemicalModal input[name="checkIn_chemical_name"]').value = chemicalName;
            let loader = document.querySelector('#checkInChemicalModal #loader');
            loader.style.display = 'none';
            const myModal = new bootstrap.Modal(checkInChemicalModal);
            myModal.show();
        }

        // Trigger CheckOut Chemical
        let triggerCheckOutChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            let checkOutChemicalModal = document.querySelector('#checkOutChemicalModal');
            // Initialize Bootstrap modal
            document.querySelector('#checkOutChemicalModal input[name="checkOut_chemical_id"]').value = companyChemicalID;
            document.querySelector('#checkOutChemicalModal input[name="chemical_id"]').value = chemicalID;
            document.querySelector('#checkOutChemicalModal input[name="company_id"]').value = companyID;
            document.querySelector('#checkOutChemicalModal input[name="checkOut_chemical_name"]').value = chemicalName;
            const myModal = new bootstrap.Modal(checkOutChemicalModal);
            myModal.show();
        }

        // checkin chemical
        let btn_submit_check_in_chemical = document.querySelector('#btn-submit-check-in-chemical');
        btn_submit_check_in_chemical.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#checkInChemicalModal #loader');
            loader.style.display = 'inline-block';

            let checkIn_chemical_id = document.querySelector('#checkInChemicalModal input[name="checkIn_chemical_id"]').value.trim();
            let chemical_id = document.querySelector('#checkInChemicalModal input[name="chemical_id"]').value.trim();
            let company_id = document.querySelector('#checkInChemicalModal input[name="company_id"]').value.trim();
            let quantity = document.querySelector('#checkInChemicalModal input[name="quantity"]').value.trim();
            let date = document.querySelector('#checkInChemicalModal input[name="date"]').value.trim();
            let remark = document.querySelector('#checkInChemicalModal input[name="remark"]').value.trim();
            if (!checkIn_chemical_id) {
                Toastify({
                    text: "Chemical id field cannot be empty.",
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
                return
            }
            if (!quantity) {
                Toastify({
                    text: "Quantity field cannot be empty.",
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
                return
            }
            if (!date) {
                Toastify({
                    text: "Date field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-chemical-check-in') }}"
            let formData = new FormData();
            formData.append('checkIn_chemical_id', checkIn_chemical_id);
            formData.append('chemical_id', chemical_id);
            formData.append('company_id', company_id);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);
            fetch_cycle('--Create Check In', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
        // checkout chemical
        let btn_submit_check_out_chemical = document.querySelector('#btn-submit-check-out-chemical');
        btn_submit_check_out_chemical.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#checkOutChemicalModal #loader');
            loader.style.display = 'inline-block';

            let checkOut_chemical_id = document.querySelector('#checkOutChemicalModal input[name="checkOut_chemical_id"]').value.trim();
            let chemical_id = document.querySelector('#checkOutChemicalModal input[name="chemical_id"]').value.trim();
            let company_id = document.querySelector('#checkOutChemicalModal input[name="company_id"]').value.trim();
            let quantity = document.querySelector('#checkOutChemicalModal input[name="quantity"]').value.trim();
            let date = document.querySelector('#checkOutChemicalModal input[name="date"]').value.trim();
            let remark = document.querySelector('#checkOutChemicalModal input[name="remark"]').value.trim();
            if (!checkOut_chemical_id) {
                Toastify({
                    text: "Chemical id field cannot be empty.",
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
                return
            }
            if (!quantity) {
                Toastify({
                    text: "Quantity field cannot be empty.",
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
                return
            }

            if (!date) {
                Toastify({
                    text: "Date field cannot be empty.",
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
                return
            }

            let url = "{{ route('admin.save-company-chemical-check-out') }}"
            let formData = new FormData();
            formData.append('checkout_chemical_id', checkOut_chemical_id);
            formData.append('chemical_id', chemical_id);
            formData.append('company_id', company_id);
            formData.append('quantity', quantity);
            formData.append('date', date);
            formData.append('remark', remark);
            fetch_cycle('--Create Check Out', url, 'POST', formData).then(result => {
                console.log(result);
                loader.style.display = 'none';
            });
        });
    </script>
    <!-- Chemical  -->

    <!-- operations -->
    <script>
        // Store Operation Type
        document.querySelector('#company_operation_type_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-operation-type') }}";
            fetch_cycle('--Store Operation Type', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation types table or UI as needed
                    let tableBody = document.querySelector('#tbl-operation-types tbody');
                    tableBody.innerHTML = "";
                    result.operation_types.forEach(type => {
                        tableBody.innerHTML += `<tr>
                            <td>${type.name}</td>
                            <td>${type.description ?? ""}</td>
                            <td>${type.sequence_order ?? ""}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });

        // Edit Operation Type
        document.querySelector('#edit_operation_type_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.update-operation-type') }}";

            fetch_cycle('--Update Operation Type', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation types table or UI as needed
                    data_array = result.operation_types.map(
                            type => new OperationTypeObject(type.operation_type_id, type.name, type.description, type.sequence_order)
                        );

                        // Clear and add rows without destroying the table
                        table.clear();
                        table.rows.add(data_array);
                        table.draw();
                        hideElement(spinner)
                }
            });
        });

        // Store Equipment Type
        document.querySelector('#equipment_type_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-equipment-type') }}";

            fetch_cycle('--Store Equipment Type', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the equipment types table or UI as needed
                    let tableBody = document.querySelector('#tbl-equipment-types tbody');
                    tableBody.innerHTML = "";
                    result.equipment_types.forEach(type => {
                        tableBody.innerHTML += `<tr>
                            <td>${type.name}</td>
                            <td>${type.description ?? ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });

        // Industrial equipment log
        // Store Equipment Log
        document.querySelector('#industrial-equipment-log-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-equipment-log') }}";

            fetch_cycle('--Store Equipment Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the equipment logs table or UI as needed
                    let tableBody = document.querySelector('#tbl-equipment-logs tbody');
                    tableBody.innerHTML = "";
                    result.equipment_logs.forEach(log => {
                        tableBody.innerHTML += `<tr>
                            <td>${log.equipment_name}</td>
                            <td>${log.equipment_type ? log.equipment_type.name : 'N/A'}</td>
                            <td>${log.equipment_capacity}</td>
                            <td>${log.status}</td>
                            <td>${log.date_added}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });



        // function addProductField() {
        //     const container = document.createElement('div');
        //     let products = @json($products);
        //     container.classList.add('row', 'g-2', 'mt-2', 'product-field-container');
        //     container.innerHTML = `
        //     <div class="col-md-5">
        //         <div class="form-group">
        //             <label for="product_name">Product Name</label>
        //             <select class="form-control" name="product_name[]" required>
        //                 <option value="" disabled selected>Select Product</option>
        //                 ${products.map(product => `<option value="${product.product_id}">${product.name}</option>`).join('')}
        //             </select>
        //         </div>
        //     </div>
        //     <div class="col-md-5">
        //         <div class="form-group">
        //             <label for="expected_quantity">Expected Quantity</label>
        //             <input type="number" class="form-control" name="expected_quantity[]" placeholder="Enter expected quantity" required>
        //         </div>
        //     </div>
        //     <div class="col-md-2 d-flex align-items-end">
        //         <button type="button" class="btn btn-danger btn-sm remove-product-btn">Remove</button>
        //     </div>
        //     `;
        //     document.querySelector('#annual-operations-form .row.g-2 .product-quantity-expected').appendChild(container);

        //     // Add event listener to the remove button
        //     container.querySelector('.remove-product-btn').addEventListener('click', function () {
        //         container.remove();
        //     });
        // }


        // Add event listener to the add more product button
    //     document.addEventListener('DOMContentLoaded', function () {
    //     const productContainer = document.querySelector('.product-quantity-container');
    //     const addMoreButton = document.querySelector('.add-more-product-quantity-operation');

    //     addMoreButton.addEventListener('click', function () {
    //         const newRow = document.createElement('div');
    //         newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
    //         newRow.innerHTML = `
    //             <div class="col-md-6">
    //                 <div class="form-group">
    //                     <label for="expected_product">Expected Product</label>
    //                     <select class="form-select" name="expected_product[]" required>
    //                         <option value="" selected disabled>Select Product</option>
    //                         @foreach($active_products as $product)
    //                             <option value="{{ $product->product_id }}">{{ $product->name }}</option>
    //                         @endforeach
    //                     </select>
    //                 </div>
    //             </div>
    //             <div class="col-md-4">
    //                 <div class="form-group">
    //                     <label for="expected_unit_produced_for_goods">Expected Quantity</label>
    //                     <input type="number" class="form-control" name="expected_quantity_produced_for_goods[]" placeholder="Expected Unit Produced For Goods" required>
    //                 </div>
    //             </div>
    //             <div class="col-md-2">
    //                 <button type="button" class="btn btn-outline-danger btn-sm remove-product-quantity">Remove</button>
    //             </div>
    //         `;
    //         productContainer.appendChild(newRow);
    //     });

    //     productContainer.addEventListener('click', function (e) {
    //         if (e.target.classList.contains('remove-product-quantity')) {
    //             e.target.closest('.row').remove();
    //         }
    //     });
    // });
    
        // Store Operation Category
        document.querySelector('#operation_category_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-operation-category') }}";
            fetch_cycle('--Store Operation Category', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation categories table or UI as needed
                    let tableBody = document.querySelector('#tbl-operation-categories tbody');
                    tableBody.innerHTML = "";
                    result.operation_categories.forEach(category => {
                        tableBody.innerHTML += `<tr>
                        <td>${category.name}</td>
                        <td>${category.description ?? ""}</td>
                        <td class="text-end">
                            <div class="dropdown d-inline-block">
                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                    <a class="dropdown-item" href="#">Update</a>
                                    <a class="dropdown-item" href="#" onclick="deleteOperationCategory(${category.operationcategoryid}, ${ category->operationcategory})">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                    });
                }
            });
        });
        // Edit Operation Category
        document.querySelector('#edit_operation_category_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.update-operation-category') }}";

            fetch_cycle('--Update Operation Category', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation categories table or UI as needed
                    data_array = result.operation_categories.map(
                            category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                        );

                        // Clear and add rows without destroying the table
                        categoriesTable.clear();
                        categoriesTable.rows.add(data_array);
                        categoriesTable.draw();
                        hideElement(spinner);
                    }
    
            });
        });
        // Delete Operation Category
        function deleteOperationCategory(operation_category_id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                let url = "{{ route('admin.delete-operation-category') }}";
                let formData = new FormData();
                formData.append('operation_category_id', operation_category_id);

                fetch_cycle('--Delete Operation Category', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation categories table or UI as needed
                    data_array = result.operation_categories.map(
                    category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                    );

                    // Clear and add rows without destroying the table
                    categoriesTable.clear();
                    categoriesTable.rows.add(data_array);
                    categoriesTable.draw();

                    Swal.fire(
                    'Deleted!',
                    'Operation category has been deleted.',
                    'success'
                    );
                } else {
                    Swal.fire(
                    'Error!',
                    'Failed to delete operation category.',
                    'error'
                    );
                }
                });
            }
            });
        }
        // store annual operaions log
        // Store Annual Operations Log
        document.querySelector('#annual-operations-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-annual-operations-log') }}";

            fetch_cycle('--Store Annual Operations Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the annual operations logs table or UI as needed
                    let tableBody = document.querySelector('#tbl-annual-operations-log tbody');
                    tableBody.innerHTML = "";
                    result.annual_operations_logs.forEach(operation => {
                        tableBody.innerHTML += `<tr>
                            <td>${operation.operation_name}</td>
                            <td>${operation.operation?.operation_name || 'N/A' }</td>
                            <td>${operation.calendarYear?.name || 'N/A'}</td>
                            <td>${Array.isArray(operation.quantity_of_waste) ? operation.quantity_of_waste.join(', ') : 'N/A'}</td>
                            <td>${operation.water_used_per_year}</td>
                            <td>${operation.units_produced_per_year}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });
        
        // Store Operation Log
        document.querySelector('#operations-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-operation') }}";
            fetch_cycle('--Store Operation Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation logs table or UI as needed
                    let tableBody = document.querySelector('#tbl-operations-log tbody');
                    tableBody.innerHTML = "";
                    result.operation_logs.forEach(log => {
                        tableBody.innerHTML += `<tr>
                            <td>${log.operation_name}</td>
                            <td>${log.operation_code}</td>
                            <td>${log.operation_type}</td>
                            <td>${log.operation_category}</td>
                            <td>${log.operation_unit}</td>
                            <td>${log.expected_waste_per_operation}</td>
                            <td>${log.expected_water_usage_per_operation}</td>
                            <td>${log.expected_unit_produced_for_goods}</td>
                            <td>${log.calendar_year_name}</td>
                            <td>${log.start_date}</td>
                            <td>${log.end_date}</td>
                            <td><span class="badge bg-${log.status === 'active' ? 'success' : 'danger'}">${log.status}</span></td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="#" onclick="triggerUpdateOperation('${log.company_operation_id}')">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });

        // Trigger Update Operation Log
        let triggerUpdateOperation = (operationID) => {
            console.log(operationID);

            let updateOperationModal = document.querySelector('#updateOperationModal');
            // Initialize Bootstrap modal
            document.querySelector('#updateOperationModal input[name="operation_id"]').value = operationID;
            let loader = document.querySelector('#updateOperationModal #loader');
            loader.style.display = 'none';
            const myModal = new bootstrap.Modal(updateOperationModal);
            myModal.show();
        }

        // Update Operation Log
        document.querySelector('#btn-submit-update-operation-log').addEventListener('click', function () {
            let form = document.querySelector('#operations-form-update');
            let formData = new FormData(form);
            let url = "{{ route('admin.update-operation') }}";
            fetch_cycle('--Update Operation Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the operation logs table or UI as needed
                    let tableBody = document.querySelector('#tbl-operations-log tbody');
                    tableBody.innerHTML = "";
                    result.operation_logs.forEach(log => {
                        tableBody.innerHTML += `<tr>
                    <td>${log.operation_name}</td>
                    <td>${log.operation_code ?? ""}</td>
                    <td>${log.operation_type ?? ""}</td>
                    <td>${log.operation_category ?? ""}</td>
                    <td>${log.operation_unit ?? ""}</td>
                    <td>${log.expected_waste_per_operation ?? ""}</td>
                    <td>${log.expected_water_usage_per_operation ?? ""}</td>
                    <td>${log.expected_unit_produced_for_goods ?? ""}</td>
                    <td>${log.calendar_year_name ?? ""}</td>
                    <td>${log.start_date ?? ""}</td>
                    <td>${log.end_date ?? ""}</td>
                    <td><span class="badge bg-${log.status === 'active' ? 'success' : 'danger'}">${log.status}</span></td>
                    <td class="text-end">
                    <div class="dropdown d-inline-block">
                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                        <a class="dropdown-item" href="#" onclick="triggerUpdateOperation('${log.company_operation_id}')">Update</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                    </td>
                </tr>`;
                    });
                }
            });
        });

        // store quality control
        // Store Quality Control
        document.querySelector('#quality-control-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-quality-control') }}";

            fetch_cycle('--Store Quality Control', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the quality control table or UI as needed
                    let tableBody = document.querySelector('#tbl-quality-control tbody');
                    tableBody.innerHTML = "";
                    result.quality_controls_record.forEach(control => {
                        tableBody.innerHTML += `<tr>
                        <td>${control.quality_metric }</td>
                        <td>${control.acceptable_range }</td>
                        <td>${control.measurement_frequency }</td>
                        <td>${control.responsible_person }</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-primary me-2">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </td>
                        </tr>`;
                    });
                }
            });
        });
        // Store Waste Item
        document.querySelector('#submit-waste-item').addEventListener('click', function () {
            let form = document.querySelector('#waste-item-form');
            let formData = new FormData(form);
            let url = "{{ route('admin.store-waste') }}";

            fetch_cycle('--Store Waste Item', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the waste items table or UI as needed
                    let tableBody = document.querySelector('#tbl-waste-items tbody');
                    tableBody.innerHTML = "";
                    result.waste_items.forEach(item => {
                        tableBody.innerHTML += `<tr>
                    <td>${item.waste_name}</td>
                    <td>${item.waste_type}</td>
                    <td>${item.unit}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>`;
                    });
                }
            });
        });
    </script>
    <!-- operations -->

    <!-- Production Log -->
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Material" functionality for a section.
                * @param {string} containerSelector - Selector for the parent container where rows will be added.
                * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
                * @param {Array} materials - Array of materials to populate the dropdown.
                */
            function initializeMaterialSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let materialIndex = 1; // Start index

                // Function to create a new material row
                function createMaterialRow(index) {
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
                                <input 
                                    id="material-quantity-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="material_used[${index}][quantity]" 
                                    placeholder="Used Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-material-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new material row
                addButton.addEventListener('click', function () {
                    const newRow = createMaterialRow(materialIndex);
                    container.appendChild(newRow);
                    materialIndex++;
                });

                // Remove a material row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-material-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            initializeMaterialSection(
                '.material-quantity-used-container-production-log', 
                '.add-more-material-used-production-log'
            );
        });

        // with unit quantity and cost price
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Material" functionality for a section.
                * @param {string} containerSelector - Selector for the parent container where rows will be added.
                * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
                * @param {Array} materials - Array of materials to populate the dropdown.
                */
            function initializeMaterialSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let materialIndex = 1; // Start index

                // Function to create a new material row
                function createMaterialRow(index) {
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
                                <input 
                                    id="material-quantity-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="material_used[${index}][quantity]" 
                                    placeholder="Used Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_quantity" class="form-label fw-bold text-primary">Unit Quantity</label>
                                <input type="text" class="form-control border-primary" id="unit_quantity" name="material_used[${index}][unit_quantity]" placeholder="Enter Unit Quantity" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_cost" class="form-label fw-bold text-primary">Unit Cost</label>
                                <input type="number" class="form-control border-primary" id="unit_cost" name="material_used[${index}][unit_cost]" placeholder="Enter Unit Cost" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-material-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new material row
                addButton.addEventListener('click', function () {
                    const newRow = createMaterialRow(materialIndex);
                    container.appendChild(newRow);
                    materialIndex++;
                });

                // Remove a material row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-material-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            initializeMaterialSection(
                '.material-quantity-used-container-production-log', 
                '.add-more-material-used-production-log'
            );

            initializeMaterialSection(
                '.material-quantity-used-container-operation-log',
                '.add-more-material-quantity-operation'
            );
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Chemical" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             * @param {Array} chemicals - Array of chemicals to populate the dropdown.
             */
            function initializeChemicalSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let chemicalIndex = 1; // Start index

                // Function to create a new chemical row
                function createChemicalRow(index) {
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
                                <input 
                                    id="chemical-quantity-${index}" 
                                    type="number" 
                                    class="form-control"
                                    name="chemical_used[${index}][quantity]" 
                                    placeholder="Used Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-chemical-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new chemical row
                addButton.addEventListener('click', function () {
                    const newRow = createChemicalRow(chemicalIndex);
                    container.appendChild(newRow);
                    chemicalIndex++;
                });

                // Remove a chemical row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-chemical-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            initializeChemicalSection(
                '.chemical-quantity-container-production-log', 
                '.add-more-chemical-used-production-log'
            );
        });
        
        // with unit quantity and cost price
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Chemical" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             * @param {Array} chemicals - Array of chemicals to populate the dropdown.
             */
            function initializeChemicalSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let chemicalIndex = 1; // Start index

                // Function to create a new chemical row
                function createChemicalRow(index) {
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
                                <input 
                                    id="chemical-quantity-${index}" 
                                    type="number" 
                                    class="form-control"
                                    name="chemical_used[${index}][quantity]" 
                                    placeholder="Used Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_quantity" class="form-label fw-bold text-primary">Unit Quantity</label>
                                <input type="text" class="form-control border-primary" id="unit_quantity" name="chemical_used[${index}][unit_quantity]" placeholder="Enter Unit Quantity" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_cost" class="form-label fw-bold text-primary">Unit Cost</label>
                                <input type="number" class="form-control border-primary" id="unit_cost" name="chemical_used[${index}][unit_cost]" placeholder="Enter Unit Cost" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-chemical-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new chemical row
                addButton.addEventListener('click', function () {
                    const newRow = createChemicalRow(chemicalIndex);
                    container.appendChild(newRow);
                    chemicalIndex++;
                });

                // Remove a chemical row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-chemical-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            initializeChemicalSection(
                '.chemical-quantity-container-production-log', 
                '.add-more-chemical-used-production-log'
            );

            initializeChemicalSection(
                '.chemical-quantity-container-operation-log', 
                '.add-more-chemical-quantity-operation'
            );
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Product" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             * @param {Array} products - Array of products to populate the dropdown.
             */
            function initializeProductSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let productIndex = 1; // Start index

                // Function to create a new product row
                function createProductRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="produced-product-${index}">Produced Product</label>
                                <select id="produced-product-${index}" class="form-select product-select" name="product_produced[${index}][product_id]" required>
                                    <option value="" selected disabled>Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="produced-quantity-${index}">Quantity Produced</label>
                                <input 
                                    id="produced-quantity-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="product_produced[${index}][quantity]" 
                                    placeholder="Produced Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity-defected-${index}">Quantity Defected</label>
                                <input 
                                    id="quantity-defected-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="product_produced[${index}][quantity_defected]" 
                                    placeholder="Quantity Defected" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-product-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new product row
                addButton.addEventListener('click', function () {
                    const newRow = createProductRow(productIndex);
                    container.appendChild(newRow);
                    productIndex++;
                });

                // Remove a product row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-product-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            initializeProductSection(
                '.product-quantity-container-production-log', 
                '.add-more-product-production-log'
            );

            initializeProductSection(
                '.product-quantity-container', 
                '.add-more-product-quantity-operation'
            );
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Product" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             * @param {Array} products - Array of products to populate the dropdown.
             */
            function initializeProductSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let productIndex = 1; // Start index

                // Function to create a new product row
                function createProductRow(index) {
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
                                <input 
                                    id="produced-quantity-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="product_produced[${index}][quantity]" 
                                    placeholder="Produced Quantity" 
                                    min="0" 
                                    step="any" 
                                    required
                                >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-product-quantity">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new product row
                addButton.addEventListener('click', function () {
                    const newRow = createProductRow(productIndex);
                    container.appendChild(newRow);
                    productIndex++;
                });

                // Remove a product row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-product-quantity')) {
                        const row = e.target.closest('.row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            // Example usage: Initialize multiple sections

            initializeProductSection(
                '.operation-log-product-quantity-container', 
                '.add-more-operation-log-product-quantity-operation'
            );
        });


        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Waste" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeWasteSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let wasteIndex = 1; // Start index

                // Function to create a new waste row
                function createWasteRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waste-type-${index}">Waste</label>
                                <select id="waste-type-${index}" 
                                        class="form-select waste-select" 
                                        name="waste_generated[${index}][waste_id]" 
                                        aria-label="Select Waste Type" 
                                        required>
                                    <option value="" selected disabled>Select Waste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waste-quantity-${index}">Quantity Generated</label>
                                <input id="waste-quantity-${index}" 
                                    type="number" 
                                    class="form-control" 
                                    name="waste_generated[${index}][quantity]" 
                                    placeholder="Generated Quantity" 
                                    min="0" 
                                    step="any" 
                                    aria-label="Quantity Generated" 
                                    required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-waste-quantity" aria-label="Remove Waste Row">
                                Remove
                            </button>
                        </div>
                    `;
                    return newRow;
                }

                // Add a new waste row
                addButton.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent default behavior
                    const newRow = createWasteRow(wasteIndex);
                    container.appendChild(newRow);
                    wasteIndex++;
                });

                // Remove a waste row
                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-waste-quantity')) {
                        const row = e.target.closest('.operation-log-row');
                        if (row) {
                            row.remove();
                        }
                    }
                });
            }

            // Initialize the waste section with appropriate selectors
            initializeWasteSection(
                '.operation-log-waste-quantity-container', 
                '.add-more-operation-log-waste-quantity-operation'
            );
        });


        

        // Store Production Log
        document.querySelector('#production-log-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-production-log') }}";

            fetch_cycle('--Store Production Log', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the production logs table or UI as needed
                    let tableBody = document.querySelector('#tbl-production-logs tbody');
                    tableBody.innerHTML = "";
                    result.production_logs.forEach(log => {
                        tableBody.innerHTML += `<tr>
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
                        </tr>`;
                    });
                }
            });
        });
     </script>
    <!-- End Production Log -->

    <!-- Calendar Year Management Script -->
    <script>
        // Calendar Year Management Script
        document.querySelector('#calendar_year_form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-calendar-year') }}";

            fetch_cycle('--Store Calendar Year', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the calendar year table or UI as needed
                    let tableBody = document.querySelector('#calendar_year_table tbody');
                    tableBody.innerHTML = "";
                    result.calendar_years.forEach(year => {
                        tableBody.innerHTML += `<tr>
                            <td>${year.name ?? ''}</td>
                            <td>${year.start_date ?? ''}</td>
                            <td>${year.end_date ?? ''}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-primary" onclick="editCalendar('${year.calendar_year_id}')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteCalendar('${year.calendar_year_id}')">Delete</button>
                            </td>
                        </tr>`;
                    });
                }
            });
        });
    </script>
    <!-- Calendar Year Management Script -->
    <!-- Product Management Script -->
    <script>
        // Store Product Category
        document.querySelector('#add-product-category-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-product-category') }}";

            fetch_cycle('--Store Product Category', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the product categories table or UI as needed
                    let tableBody = document.querySelector('#tbl-product-categories tbody');
                    tableBody.innerHTML = "";
                    result.product_categories.forEach(category => {
                        tableBody.innerHTML += `<tr>
                            <td>${category.name}</td>
                            <td>${category.description}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            });
        });

        // Store Product
        document.querySelector('#add-product-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('admin.store-product') }}";

            fetch_cycle('--Store Product', url, 'POST', formData).then(result => {
                console.log(result);
                if (result.status === 'success') {
                    // Update the product list table or UI as needed
                    let tableBody = document.querySelector('#tbl-products tbody');
                    tableBody.innerHTML = "";
                    result.products.forEach(product => {
                        tableBody.innerHTML += `<tr>
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
                }
            });
        });
    </script>
    <!-- Product Management Script -->
    @endsection
</x-layouts.admin-app>