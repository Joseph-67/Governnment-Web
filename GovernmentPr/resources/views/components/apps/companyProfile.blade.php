<x-layouts.admin-app>
    @section('PageTitle', 'Company Profile')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="d-flex align-items-center flex-row flex-wrap">
                                    <div class="">
                                        <h5 class="fw-semibold fs-22 mb-1 text-uppercase">
                                            {{ $company->company_name }}
                                        </h5>
                                        <p class="mb-0 text-muted fw-medium">{{ $company->industry }}</p>
                                        <p class="mb-0 text-muted fw-medium">{{ $company->address }}, <br>
                                            {{ $company->city }}, {{ $company->state }}, {{ $company->country }}.</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-1 ms-auto align-self-center">
                                <div class="d-flex justify-content-center">
                                    <div
                                        class="border-dashed rounded border-theme-color p-2 me-2 flex-grow-1 flex-basis-0">
                                        <h5 class="fw-semibold fs-22 mb-1">{{ $company->number_of_employees }}</h5>
                                        <p class="text-muted mb-0 fw-medium">Employees</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Personal Information</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <a href="#" class="float-end text-muted d-inline-flex text-decoration-underline"><i
                                        class="iconoir-edit-pencil fs-18 me-1"></i>Edit</a>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <p class="text-muted fw-medium mb-1">
                            This section displays the personal information you’ve provided to us. Please review the
                            details below to ensure they’re accurate and up-to-date.
                        </p>
                        <p class="text-muted fw-medium mb-3">
                            If you need to make any changes, simply click the "Edit" button. Your privacy is important
                            to us, and all your information is securely stored in compliance with our [Privacy Policy].
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-transparent border border-light text-gray-700 fs-12 fw-medium mb-1">{{
                                $company->industry_process }}</span>
                        </div>
                        @php
                        $est_date = Carbon\Carbon::parse($company->date_of_establishment);
                        @endphp
                        <ul class="list-unstyled mb-0">
                            <li class=""><i class="las la-birthday-cake me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Establishment Date </b> : {{ $est_date->format('d M Y') }}</li>
                            <!-- <li class="mt-2"><i class="las la-briefcase me-2 text-secondary fs-22 align-middle"></i> <b> Industry </b> : {{ $company->industry }}</li> -->
                            <!-- <li class="mt-2"><i class="las la-university me-2 text-secondary fs-22 align-middle"></i> <b> Education </b> : Stanford Univercity</li> -->
                            <!-- <li class="mt-2"><i class="las la-language me-2 text-secondary fs-22 align-middle"></i> <b> Languages </b> : English, French, Spanish</li> -->
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Primary Phone </b> : {{ $company->primary_phone_number }}</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Secondary Phone </b> : {{ $company->secondary_phone_number }}</li>
                            <li class="mt-2"><i class="las la-envelope me-2 text-secondary fs-22 align-middle me-2"></i>
                                <b> Email </b> : {{ $company->email }}
                            </li>
                            <li class="mt-2"><i class="las la-link text-secondary fs-22 align-middle me-2"></i> <b>
                                    Website </b> : <a href="{{ $company->website_url }}">{{ $company->website_url }}</a>
                            </li>
                            <li class="mt-2"><i class="las la-map-marked text-secondary fs-22 align-middle me-2"></i>
                                <b> ZIP Code </b> : {{ $company->zip_code }}
                            </li>
                            <li class="mt-2"><i class="las la-map-marked text-secondary fs-22 align-middle me-2"></i>
                                <b> Longitude </b> : {{ $company->longitude }}
                            </li>
                            <li class="mt-2"><i class="las la-map-marked text-secondary fs-22 align-middle me-2"></i>
                                <b> Latitude </b> : {{ $company->latitude }}
                            </li>
                            <li class="mt-2"><i class="las la-map-marked text-secondary fs-22 align-middle me-2"></i>
                                <b> MGRS </b> : {{ $company->mgrs }}
                            </li>
                        </ul>
                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Extra</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <p class="text-muted fw-medium mb-1">
                            <!-- This section displays the personal information you’ve provided to us. Please review the details below to ensure they’re accurate and up-to-date. -->
                        </p>
                        <ul class="list-unstyled mb-0">
                            <li class="text-capitalize"><i
                                    class="las la-user-alt me-2 text-secondary fs-22 align-middle"></i> <b> Enviromental
                                    Operations Manager </b> : {{ $company->operations_manager }}</li>
                            <li class="mt-2 text-capitalize"><i
                                    class="las la-user-alt me-2 text-secondary fs-22 align-middle"></i> <b> Contact
                                    Person </b> : {{ $company->contact_person_full_name }}</li>
                            <li class="mt-2 text-capitalize"><i
                                    class="las la-briefcase me-2 text-secondary fs-22 align-middle"></i> <b> Position
                                </b> : {{ $company->contact_person_position }}</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Mobile </b> : {{ $company->contact_person_contact_number }}</li>
                        </ul>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-8">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#policy" role="tab"
                            aria-selected="true">Policies & Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#recp" role="tab"
                            aria-selected="false">R.E.C.P</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#water-usage" role="tab"
                            aria-selected="false">Water Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#chemical-usage" role="tab"
                            aria-selected="false">Chemical Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#materials" role="tab"
                            aria-selected="false">Material Inventory</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#settings" role="tab"
                            aria-selected="false">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="policy" role="tabpanel">
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
                                            <label class="form-check-label" for="environmental-policy">Enviromental Policy.</label>
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
                                                value="business growth" name="objective[]" {{(in_array("business
                                                growth", array_column($company_objectives->toArray(),
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
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="innovation"
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
                                                value="market expansion" name="objective[]" {{(in_array("market
                                                expansion", array_column($company_objectives->toArray(),
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
                                                    regulation that deliver economic, human and environmental health
                                                    gain to your company.", array_column($company_benefits->toArray(),
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
                                                    accreditation and certification capacity building on ISO 15000 and
                                                    14000 series to your enterprise.",
                                                    array_column($company_benefits->toArray(), 'benefit_title')))?
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
                                                    training on Resource Efficient and Cleaner Production (RECP),
                                                    including comprehensive support materials, toolkits, and learning
                                                    resources, tailored for staff and employees across Nigeria's
                                                    industrial manufacturing sector.",
                                                    array_column($company_benefits->toArray(), 'benefit_title')))?
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
                                                    assistance to your enterprise, ensuring long-term impact and
                                                    achieving commercially sustainable outcomes.",
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
                                                    name="areas_of_company_benefit[]" {{(in_array("To raise awareness
                                                    and implement pilot programs on RECP, aimed at enhancing
                                                    productivity through efficient use of manufacturing inputs (water,
                                                    chemicals, and materials), minimizing waste and emissions, and
                                                    promoting regulatory compliance while boosting competitiveness
                                                    within your industrial sector.",
                                                    array_column($company_benefits->toArray(), 'benefit_title')))?
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
                                                    name="areas_of_company_benefit[]" {{(in_array("To enhance the
                                                    adoption of RECP practices and associated investments by providing a
                                                    targeted financial assistance package for companies participating in
                                                    RECP pilot programs.", array_column($company_benefits->toArray(),
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
                                                    cost-saving benefits of RECP to your industrial manufacturing sector
                                                    by facilitating greater access to financial mechanisms—both
                                                    commercial and government—to support the financing of RECP
                                                    projects.", array_column($company_benefits->toArray(),
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
                                                    name="environment_health_benefit[]" {{(in_array("Achieve a minimum
                                                    20% reduction in energy consumption within one year.",
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
                                                    name="environment_health_benefit[]" {{(in_array("Achieve a 40%
                                                    reduction in CO<sub>2</sub> emissions within 18 months.",
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
                                                    name="environment_health_benefit[]" {{(in_array("Achieve a 50%
                                                    increase in overall material productivity within one year.",
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
                                                    certification to demonstrate your commitment to effective
                                                    environmental management and sustainability practices.",
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
                                                    name="environment_health_benefit[]" {{(in_array("Achieve an increase
                                                    in overall annual financial savings.",
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
                                                    experience.",
                                                    array_column($company_enviromental_benefits->toArray(),
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
                                                    series certification to demonstrate adherence to international
                                                    standards for information and communication technology management.",
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
                                                        name="house_keeping[]" {{(in_array("Attitudinal change
                                                        (negligence attitude).",
                                                        array_column($company_house_keeping->toArray(),
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
                                                        <input type="text" class="form-control"
                                                            placeholder="Unit process" id="unit_process">
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Water
                                                        recycling flow.",
                                                        array_column($company_waste_reduction_measures->toArray(),
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Monitoring
                                                        of the quality and quantity of waste water.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Using
                                                        production equipment or technology that supports
                                                        energy/resource-efficient production.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Use of waste
                                                        for internal energy sources.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Installation
                                                        of lighting sensor.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Utilization
                                                        of sunlight for daytime lighting.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Minimize the
                                                        use of generating sets.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Substitute
                                                        high yield pollutant raw materials with other less polluting
                                                        materials.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Diluting the
                                                        air pollutants.",
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
                                                        name="RECP_waste_reduction_measures[]" {{(in_array("Plant
                                                        flowers and trees around the premises to reduce large number of
                                                        pollutants in the air.",
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
                                                        name="product_recovery_measures[]" {{(in_array("Adequate
                                                        chemical/ material storage facility",
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
                                                        name="product_recovery_measures[]" {{(in_array("Adequate
                                                        container seal to prevent spill",
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
                                                        name="product_recovery_measures[]" {{(in_array("Extended
                                                        Producer Responsibility(EPR)",
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
                    <!-- water usage -->
                    <div class="tab-pane p-3" id="water-usage" role="tabpanel">
                        <div class="card">
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
                                                    name="{{ $question->label }}" id="flexCheckIndeterminate"
                                                    {{(in_array($question->questionId,
                                                    array_column($CompanyWaterQuestions->toArray(),
                                                    'questionID')))? "checked": ""}}
                                                >
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    {{ $question->question }}
                                                </label>
                                            </div>
                                            <!-- form check -->
                                        </div>
                                        <!-- question ends -->
                                        @endforeach
                                    </div>
                                </form>
                                <hr>
                                <form action="" method="post">
                                    <input type="hidden" class="form-control" name="company_id"
                                        value="{{ $company->company_id }}">
                                    <label for="">Indicate the water conservations opportunity that is applicable or
                                        beneficial to your process</label>
                                    <div class="row g-2 mt-2">
                                        @foreach($WaterConservationMethod as $method)
                                        <!-- question  -->
                                        <div class="col-md-6">
                                            <!-- form check -->
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    onchange="ChangeWaterConservationOpportunity(this, '{{$company->company_id}}', `{{ $method->WaterConservationMethodId }}`)"
                                                    type="checkbox" value="{{ $method->WaterConservationMethodId }}"
                                                    name="{{ $method->label }}" id="flexCheckIndeterminate"
                                                    {{(in_array($method->WaterConservationMethodId,
                                                array_column($companyWaterConservationMethod->toArray(),
                                                'waterConservationMethod_id')))? "checked": ""}}
                                                >
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    {{ $method->method }}
                                                </label>
                                            </div>
                                            <!-- form check -->
                                        </div>
                                        <!-- question ends -->
                                        @endforeach
                                    </div>
                                </form>
                                <hr>
                                <form action="" method="post">
                                    <input type="hidden" class="form-control" name="company_id"
                                        value="{{ $company->company_id }}">
                                    <label for="">Select the water source used in your Organization</label>
                                    <div class="row g-2 mt-2">
                                        @foreach($WaterSources as $sources)
                                        <!-- question  -->
                                        <div class="col-md-6">
                                            <!-- form check -->
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    onchange="ChangeWaterSources(this, '{{$company->company_id}}', `{{ $sources->WaterSourcesId }}`)"
                                                    type="checkbox" value="{{ $sources->WaterSourcesId }}"
                                                    name="{{ $sources->label }}" id="flexCheckIndeterminate"
                                                    {{(in_array($sources->WaterSourcesId,
                                                array_column($companyWaterSources->toArray(),
                                                'WaterSources_id')))? "checked": ""}}
                                                >
                                                <label class="form-check-label" for="flexCheckIndeterminate">
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
                      <!-- Water Sources -->
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Water Sources Details</h4>
    </div> <!-- end card-header -->

    <div class="card-body pt-0" id="waterSourceForm">
        <input type="hidden" name="company_id" value="{{ $company->company_id }}">

        <div class="row g-3">
            <!-- Water Source -->
            <div class="col-md-5">
                <div class="form-group">
                    <label for="water_source" class="form-label">Water Source</label>
                    <select name="water_source" id="source" class="form-select">
                        <option value="" selected disabled>Choose...</option>
                    @foreach($waterSources as $source)
                        @if(in_array($source->WaterSourcesId, array_column($companyWaterSources->toArray(), 'WaterSources_id')))
                            <option value="{{ $source->WaterSourcesId }}" selected>
                                {{ $source->sources }}
                            </option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            <!-- Location -->
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" id="remark" class="form-control" name="location">
                </div>
            </div>
            <!-- capacity of Water -->
            <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="col col-form-label">Capacity of Water(LTR)</label>
                                            
                                            <div class="input-group qty-icons">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                                <input type="number" class="form-control" min="0" name="capacity"
                                                    value="0">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                            </div>
                                        </div>
                                    </div>

            <!-- Save Button (Moved Down) -->
            <div class="col-12 mt-3">
                <button type="button" class="btn btn-primary" id="btn-submit-water-source">Save</button>
            </div>
        </div>
    </div> <!-- end card-body -->
</div>
<!-- End Water Sources -->
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Water Usage</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0" id="water-usage-form">
                                <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                                <div class="row g-2">
                                    <!-- Unit of measurement -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="col col-form-label">Volume of Water</label>
                                            <div class="input-group qty-icons">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                                <input type="number" class="form-control" min="0" name="volume"
                                                    value="0">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Unit of measurement -->
                                    <!-- date type -->
                                    <div class="col-md-4 col-sm-6">
                                        <label class="col my-1 control-label">Date Type</label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="date_type"
                                                    id="inlineRadio1" value="daily" checked onchange="addDate(this)">
                                                <label class="form-check-label" for="inlineRadio1">Daily</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="date_type"
                                                    id="inlineRadio2" value="weekly" onchange="addDate(this)">
                                                <label class="form-check-label" for="inlineRadio2">Weekly</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="date_type"
                                                    id="inlineRadio3" value="monthly" onchange="addDate(this)">
                                                <label class="form-check-label" for="inlineRadio3">Monthly</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="date_type"
                                                    id="inlineRadio4" value="yearly" onchange="addDate(this)">
                                                <label class="form-check-label" for="inlineRadio3">Yearly</label>
                                            </div>
                                        </div>
                                    </div> <!--end row-->
                                    <!-- date type -->
                                    <!-- Date -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group" id="date">
                                            <label for="" class="col col-form-label">Date</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <!-- end Date -->


                                    <!-- Material name -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="col col-form-label">Remark</label>
                                            <input type="text" class="form-control" name="remark">
                                        </div>
                                    </div>
                                    <!-- Material name -->
                                     <div class="col-12">
                                        <button type="button" class="btn btn-primary" id="btn-submit-water-usage">Save</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <!-- water usage card -->
                         <!-- water usage logs card -->
                        <div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Water Usage Logs</h4>
    </div> <!-- end card-header -->

    <div class="card-body pt-0" id="waterSourceForm">
        <input type="hidden" name="company_id" value="{{ $company->company_id }}">

        <div class="row g-3">

            <!-- Water Usage logs -->
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="log_location" class="form-label">Location</label>
                    <select name="log_location" id="log_location" class="form-select" onchange="updateWaterSources(this.value)">
                        <option value="" selected disabled>Choose...</option>
                        @foreach($water_source_details as $waterSource)
                            <option value="{{ $waterSource->location }}">{{ $waterSource->location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="water_source" class="form-label">Water Source</label>
                    <select name="water_source" id="water_source" class="form-select">
                        <option value="" selected disabled>Choose...</option>
                    </select>
                </div>
            </div>


            <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="col col-form-label">Quantity Used(LTR)</label>
                                            
                                            <div class="input-group qty-icons">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                                <input type="number" class="form-control" min="0" name="unit_of_water"
                                                    value="0">
                                                <button class="btn btn-primary"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                            </div>
                                        </div>
                                    </div>
            <!-- unit of Water -->
            <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="col col-form-label">Unit of Measurement</label>
                                            
                                            <select name="water_source" id="source" class="form-select">
                        <option value="" selected disabled>Choose...</option>
                        <option value="kg">Kilogram (kg)</option>
    <option value="g">Gram (g)</option>
    <option value="lb">Pound (lb)</option>
    <option value="oz">Ounce (oz)</option>
    <option value="cm">Centimeter (cm)</option>
    <option value="m">Meter (m)</option>
    <option value="in">Inch (in)</option>
    <option value="ft">Foot (ft)</option>
    <option value="l">Liter (L)</option>
    <option value="ml">Milliliter (mL)</option>                    
                    </select>
                                        </div>
                                    </div>
                        <!-- Date -->
                        <div class="col-md-4 col-sm-6">
                                        <div class="form-group" id="date">
                                            <label for="" class="col col-form-label">Date</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <!-- end Date -->
                                    <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="" class="col col-form-label">Purpose</label>
                    <input type="text" class="form-control" name="purpose">
                </div>
            </div>
            <!-- Save Button (Moved Down) -->
            <div class="col-12 mt-3">
                <button type="button" class="btn btn-primary" id="btn-submit-water-usage-logs">Save</button>
            </div>
        </div>
    </div> <!-- end card-body -->
</div>
<!-- End Water Usage Logs -->
                        <div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Water Usage Re-adjustment</h4>
            </div><!--end col-->
        </div> <!--end row-->
    </div><!--end card-header-->
    <div class="card-body pt-0" id="water-usage-form">
        <input type="hidden" value="{{ $company->company_id }}" name="company_id">
        <div class="row g-2">
            <!-- Unit of measurement -->
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="" class="col col-form-label">Volume of Water</label>
                    <div class="input-group qty-icons">
                        <button class="btn btn-primary"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input type="number" class="form-control" min="0" name="volume"
                            value="0">
                        <button class="btn btn-primary"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                </div>
            </div>
            <!-- Unit of measurement -->
            <!-- date type -->
            <div class="col-md-4 col-sm-6">
                <label class="col my-1 control-label">Date Type</label>
                <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="date_type"
                            id="inlineRadio1" value="daily" checked onchange="addDate(this)">
                        <label class="form-check-label" for="inlineRadio1">Daily</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="date_type"
                            id="inlineRadio2" value="weekly" onchange="addDate(this)">
                        <label class="form-check-label" for="inlineRadio2">Weekly</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="date_type"
                            id="inlineRadio3" value="monthly" onchange="addDate(this)">
                        <label class="form-check-label" for="inlineRadio3">Monthly</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="date_type"
                            id="inlineRadio4" value="yearly" onchange="addDate(this)">
                        <label class="form-check-label" for="inlineRadio3">Yearly</label>
                    </div>
                </div>
            </div> <!--end row-->
            <!-- date type -->
            <!-- Date -->
            <div class="col-md-4 col-sm-6">
                <div class="form-group" id="date">
                    <label for="" class="col col-form-label">Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
            </div>
            <!-- end Date -->


            <!-- Material name -->
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label for="" class="col col-form-label">Remark</label>
                    <input type="text" class="form-control" name="remark">
                </div>
            </div>
            <!-- Material name -->
             <div class="col-12">
                <button type="button" class="btn btn-primary" id="btn-submit-water-usage">Save</button>
             </div>
        </div>
    </div>
</div>
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Water Usage</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="tbl-company-material">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Volume</th>
                                                <!-- <th>Date type</th> -->
                                                <th>Date</th>
                                                <th>Remark</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="water-usage-table">
                                            @foreach($company_water_usage as $key=>$water_usage)
                                            <tr>
                                                <td>{{ $water_usage->volume }}</td>
                                                <!-- <td>{{$water_usage->date_type}}</td> -->
                                                @if($water_usage->date_type === 'monthly')
                                                <td>{{ \Carbon\Carbon::parse($water_usage->date)->format('M Y') }}</td>
                                                @elseif($water_usage->date_type === 'yearly')
                                                <td>{{ \Carbon\Carbon::parse($water_usage->date)->format('Y') }}</td>
                                                @elseif($water_usage->date_type === 'weekly')
                                                <td>{{ \Carbon\Carbon::parse($water_usage->date)->startOfWeek()->format('d M Y') }} - {{ \Carbon\Carbon::parse($water_usage->date)->endOfWeek()->format('d M Y') }}</td>
                                                @else
                                                <td>{{ \Carbon\Carbon::parse($water_usage->date)->format('d M Y') }}</td>
                                                @endif
                                                <td>{{$water_usage->remark}}</td>
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                            data-bs-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dLabel11">
                                                            <a class="dropdown-item" href="#">Update Material</a>
                                                            <a class="dropdown-item" href="#">Delete Material</a>
                                                            <hr class="dropdown-divider">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div>
                        </div>
                        <!-- end water usage card -->
                    </div>
                    <!-- tab water usage -->
                    <!-- tab chemical inventory -->
                    <div class="tab-pane p-3" id="chemical-usage" role="tabpanel">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title mb-0">Add New Chemical</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <form action="" method="post" id="chemical-form">
                                    <input type="hidden" class="form-control" name="company_id" value="{{ $company->company_id }}">
                                    <div class="row g-2 align-items-end">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="chemical">Chemical</label>
                                                <select name="chemical" id="chemical" class="form-select">
                                                    <option value="" selected disabled>Choose...</option>
                                                    @foreach($approved_chemicals as $chemical)
                                                        <option value="{{ $chemical->chemical_id }}">{{ $chemical->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="unit_of_measurement">Unit of Measurement</label>
                                                <input type="text" class="form-control" name="unit_of_measurement"
                                                    placeholder="Unit of Measurement">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-primary" id="btn-submit-chemical">
                                                    Save
                                                    <span class="loader" id="loader"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-sm border-0 mt-4">
                            <div class="card-header bg-primary text-white" id="headingChemicals">
                                <h4 class="card-title mb-0">
                                    <a class="accordion-toggle text-white" data-bs-toggle="collapse" href="#collapseChemicals" aria-expanded="true" aria-controls="collapseChemicals">
                                        Company Chemicals
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseChemicals" class="collapse show" aria-labelledby="headingChemicals" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0" id="tbl-company-chemical">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Chemical</th>
                                                    <th>Unit of Measurement</th>
                                                    <th>Chemical Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($company_chemicals as $chemical)
                                                <tr>
                                                    <td>{{ $chemical->chemical->name }} ({!! $chemical->chemical->formula !!})</td>
                                                    <td>{{ $chemical->unit }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ ($chemical->status == 'active') ? 'success' : 'danger' }}">
                                                            {{ $chemical->status }}
                                                        </span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown d-inline-block" style="position: relative ! important;z-index: 99999999999999;">
                                                            <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                                data-bs-toggle="dropdown" href="#" role="button"
                                                                aria-haspopup="false" aria-expanded="false">
                                                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dLabel11" style="z-index: 99999999999999;">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.view-chemical', ['chemical'=> $chemical->company_chemical_id]) }}">Open
                                                                    Chemical</a>
                                                                <a class="dropdown-item" href="#">Update Chemical</a>
                                                                <a class="dropdown-item" href="#">Delete Chemical</a>
                                                                <hr class="dropdown-divider">
                                                                <a class="dropdown-item" href="#">Setup Price</a>
                                                                <a href="#" class="dropdown-item" onclick='triggerCheckInChemical("{{ $chemical->company_chemical_id }}", "{{ $chemical->chemical_id }}", "{{ $chemical->company_id }}", "{{ $chemical->chemical->name }}")'>Check In Item</a>
                                                                <a href="#" class="dropdown-item" onclick='triggerCheckOutChemical("{{ $chemical->company_chemical_id }}", "{{ $chemical->chemical_id }}", "{{ $chemical->company_id }}", "{{ $chemical->chemical->name }}")'>Check Out Item</a>
                                                                <a href="#" class="dropdown-item">Make Adjustment</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /tableresponsive-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab chemical inventory -->
                    <!-- tab Material Inventory -->
                    <div class="tab-pane p-3" id="materials" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Add New Material</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <form action="" method="post">
                                    <input type="hidden" class="form-control" name="company_id"
                                        value="{{ $company->company_id }}">
                                    <div class="row g-2">
                                        <!-- Material  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Material</label>
                                                <select name="material" id="material" class="form-select">
                                                    <option value="" selected disabled> Choose... </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{ $material->materialID }}"> {{ $material->material
                                                        }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Material ends -->
                                        <!-- Serial Number -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Serial Number(If any)</label>
                                                <input type="text" class="form-control" placeholder="Serial Number"
                                                    name="serial_number">
                                            </div>
                                        </div>
                                        <!-- Serial Number -->
                                        <!-- Unit of measurement -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Unit of Measurement</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Unit of Measurement" name="unit_of_measurement">
                                            </div>
                                        </div>
                                        <!-- Unit of measurement -->
                                        <div class="col-md-3">
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-primary"
                                                    id="btn-submit-material">Save</button><span class="loader"
                                                    id="loader"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Company Materials</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="tbl-company-material">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Material</th>
                                                <th>Serial No.</th>
                                                <th>Unit of Measurement</th>
                                                <th>Material Status</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($companyMaterials as $material)
                                            <tr>
                                                <td>{{ $material->material }}</td>
                                                <td>{{ $material->serial_number }}</td>
                                                <td> {{ $material->unit_of_measure }} </td>
                                                <td><span
                                                        class="badge bg-{{ ($material->company_material_status == 'active')? 'success':'danger'}}">{{
                                                        $material->company_material_status }}</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                            data-bs-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dLabel11">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.view-material', ['material'=> $material->companyMaterialId]) }}">Open
                                                                Material</a>
                                                            <a class="dropdown-item" href="#">Update Material</a>
                                                            <a class="dropdown-item" href="#">Delete Material</a>
                                                            <hr class="dropdown-divider">
                                                            <a class="dropdown-item" href="#"
                                                                onclick='triggerMaterialPrice("{{ $material->companyMaterialId }}")'>Setup
                                                                Price</a>
                                                            <a href="#" class="dropdown-item"
                                                                onclick='triggerCheckIn("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>Check
                                                                In Item</a>
                                                            <a href="#" class="dropdown-item"
                                                                onclick='triggerCheckOut("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>Check
                                                                Out Item</a>
                                                            <a href="#" class="dropdown-item"
                                                                onclick='triggerAdjustment("{{ $material->companyMaterialId }}", "{{ $material->materialID }}", "{{ $material->companyID }}", "{{ $material->material }}")'>Make Adjustment</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="settings" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Company's Personal Information</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <x-validation-errors class="alert" alert />
                                @include('shared.feedback')
                                <form id="general-settings" action="{{route('update-company-details')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="Company name"
                                                name="company_name" value="{{ $company->company_name }}">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Industry</label>
                                                <select name="industry" id="industry" class="form-select">
                                                    <option value="" selected disabled> Choose... </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Industrial Process Used</label>
                                                <select id="industry-process" name="industry_process_used"
                                                    class="form-select">
                                                    <option value="" selected disabled> Choose... </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control"
                                                    placeholder="Example: company@domain.com" name="email"
                                                    value="{{ $company->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Website Address</label>
                                                <input type="url" class="form-control" placeholder=""
                                                    name="website_address" value="{{ $company->website_url}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Primary Phone Number</label>
                                                <input id="mobile_code_primary" type="tel" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="primary_phone_number">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">Secondary Phone Number</label>
                                                <input id="mobile_code_secondary" type="tel" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="secondary_phone_number">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Number Of Employees.</label>
                                                <input type="number" class="form-control" placeholder=""
                                                    name="number_of_employees"
                                                    value="{{$company->number_of_employees}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label for="">Date of Establishment</label>
                                            <input class="form-control" type="date" id="" name="date_of_establishment"
                                                value="{{$company->date_of_establishment}}">
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-md-3 py-3">
                                                <div class="d-flex g-1">
                                                    <button type="button" class="btn btn-primary"
                                                        id="btn-general-settings">Save</button><span class="loader"
                                                        id="loader"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!--end card-body-->
                        </div><!--end card-->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Company's Location</h4>
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <form action="{{route('update-company-location')}}" method="post"
                                    id="location_settings">
                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Country</label>
                                                <select name="country" class="form-select countries" id="countryId">
                                                    <option value="" selected disabled> Choose... </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">State</label>
                                                <select id="" class="form-select states" onchange="toggleLGA(this);"
                                                    id="stateId" name="state">
                                                    <option value="" selected disabled> Choose... </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">City</label>
                                                <select id="lga" class="form-select select-lga cities" id="cityId"
                                                    name="city">
                                                    <option value="" selected disabled> Choose... </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" class="form-control" placeholder="" name="address"
                                                    value="{{$company->address}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label>Geographic Information System(GIS) Location</label>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">ZIP code</label>
                                                <input type="text" class="form-control" placeholder="" name="zip_code"
                                                    value="{{$company->zip_code}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Longitude</label>
                                                <input type="text" class="form-control" placeholder="" name="longitude"
                                                    value="{{$company->longitude}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Latitude</label>
                                                <input type="text" class="form-control" placeholder="" name="latitude"
                                                    value="{{$company->latitude}}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Military Grid Reference System (MGRS) coordinate</label>
                                                <input type="text" class="form-control" placeholder="" name="mgrs"
                                                    value="{{$company->mgrs}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-3 py-3">
                                            <button type="button" class="btn btn-primary"
                                                id="btn-location-settings">Save</button><span class="loader"
                                                id="loader"></span>
                                        </div>
                                    </div>
                                </form>

                            </div><!--end card-body-->
                        </div><!--end card-->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Contact Personnel</h4>
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
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
                                                <input id="mobile_code_contact" type="tel" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="contact_person_phone_number">
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-md-3 py-3">
                                                <button type="button" class="btn btn-primary"
                                                    id="btn_contact_settings">Save</button><span class="loader"
                                                    id="loader"></span>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div><!--end card-body-->
                        </div><!--end card-->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Other Settings</h4>
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse"
                                        name="is_sharable" value="active">
                                    <label class="form-check-label" for="flexSwitchCheckReverse">Do you wish for
                                        your information to be shared with other companies?</label>
                                </div>

                                <div class="form-check form-switch mb-2">
                                    <label>
                                        <input type="checkbox" class="form-check-input toggle-status"
                                            id="settings-switch1" data-company-id="{{ $company->company_id }}" {{
                                            $company->status === 'active' ? 'checked' : '' }}>
                                        Activate or Deactivate Company
                                    </label>
                                    <!-- <input class="form-check-input" type="checkbox" id="settings-switch1">
                    <label class="form-check-label" for="settings-switch1">Activate Company</label> -->
                                </div>
                                <div id="feedback-message" style="margin-top: 10px; color: green; font-weight: bold;">
                                </div>
                                <!--end form-switch-->
                                <div class="mt-2">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!-- <button type="button" class="btn btn-warning">Deactivate Company</button> -->
                                        <button type="button" class="btn btn-danger">Delete Company</button>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->

                    </div>
                </div>
            </div> <!--end col-->
        </div><!--end row-->

    </div><!-- container -->
    <!--Start Rightbar-->
    <!--Start Rightbar/offcanvas-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
        <div class="offcanvas-header border-bottom justify-content-between">
            <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
            <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h6>Account Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch1">
                    <label class="form-check-label" for="settings-switch1">Auto updates</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                    <label class="form-check-label" for="settings-switch2">Location Permission</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch3">
                    <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                </div><!--end form-switch-->
            </div><!--end /div-->
            <h6>General Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch4">
                    <label class="form-check-label" for="settings-switch4">Show me Online</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                    <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch6">
                    <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                </div><!--end form-switch-->
            </div><!--end /div-->
        </div><!--end offcanvas-body-->
    </div>
    <!--end Rightbar/offcanvas-->
    <!--end Rightbar-->

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
                    <button type="button" class="btn btn-primary" id="btn-submit-material-price">Save changes</button>
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
                    <button type="button" class="btn btn-primary" id="btn-submit-check-in">Save changes</button>
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
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out">Save changes</button>
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
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out">Save changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- checkout chemical modal -->
    <div class="modal fade" tabindex="-1" id="checkInChemicalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0">
                                    <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
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
    <div class="modal fade" tabindex="-1" id="checkOutChemicalModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" class="form-control" min="0" name="quantity" value="0" style="pointer-events: none;">
                                    <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
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
                    <button type="button" class="btn btn-primary" id="btn-submit-check-out-chemical">Save changes</button>
                    <span class="loader" id="loader"></span>
                </div>
            </div>
        </div>
    </div>
    @section('styles')
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
    <script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>
    <script src=""></script>

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

    </script>
    <!-- end activate and deactivate -->
     <script src="https://cdn.jsdelivr.net/npm/date-fns@4.1.0/cdn.min.js"></script>
     <!-- water usage -->
      <script>
        const water_usage_date = document.querySelector('#water-usage-form #date')
        function addDate(ele) {
            if (ele.checked) {
                switch (ele.value) {
                    case "daily":
                        water_usage_date.innerHTML = (`<label for="" class="col col-form-label">Date</label>
                                            <input type="date" min="0" class="form-control" name="date">`);
                        break;
                    case "weekly":
                        water_usage_date.innerHTML = (`<label for="example-month-input" class="col col-form-label">Date</label>
                        <input class="form-control" type="week" value="2011-W33" id="example-week-input" name="date">`);
                        break;
                    case "monthly":
                        water_usage_date.innerHTML = `<label for="example-month-input" class="col col-form-label">Date</label>
                                            <input class="form-control" type="month" value="2011-08"
                                                id="example-month-input" name="date">`;
                        break;
                    case "yearly":
                        // Create the select element dynamically
                        const yearlyLabel = `<label for="yearly-select" class="col col-form-label">Year</label>`;
                        const yearlySelect = document.createElement("select");
                        yearlySelect.className = "form-control";
                        yearlySelect.name = "date";
                        yearlySelect.id = "yearly-select";

                        // Populate the select with year options
                        const currentYear = new Date().getFullYear();
                        for (let year = 1900; year <= currentYear; year++) {
                            const option = document.createElement("option");
                            option.value = year;
                            option.textContent = year;
                            if (year == currentYear) {option.setAttribute("selected", true)}
                            yearlySelect.appendChild(option);
                        }

                        // Clear existing content and append new content
                        water_usage_date.innerHTML = yearlyLabel;
                        water_usage_date.appendChild(yearlySelect);
                        break;
                    
                    default:
                        water_usage_date.innerHTML = (`<label for="" class="col col-form-label">Date</label>
                        <input type="date" min="0" class="form-control" name="date">`);
                        break;
                }
            }
        }
        // checkout water
      
        // company material checkout
        let btn_submit_water_usage = document.querySelector('#water-usage-form #btn-submit-water-usage');
        btn_submit_water_usage.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let company_id      = document.querySelector('#water-usage-form input[name="company_id"]').value.trim();
            let volume          = document.querySelector('#water-usage-form input[name="volume"]').value.trim();
            let date_type       = document.querySelector('#water-usage-form input[name="date_type"]:checked').value.trim();
            let date            = document.querySelector('#water-usage-form [name="date"]').value.trim();
            let remark          = document.querySelector('#water-usage-form input[name="remark"]').value.trim();
            if (!company_id) {
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
            if (!volume) {
                Toastify({
                    text: "Volume of water field cannot be empty.",
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
            if (!date_type) {
                Toastify({
                    text: "Date type field cannot be empty.",
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

            let url = "{{ route('company.add-water-usage') }}"
            let formData = new FormData();

            formData.append('company_id', company_id);
            formData.append('volume', volume);
            formData.append('date_type', date_type);
            formData.append('date', date);
            formData.append('remark', remark);
            fetch_cycle('--Create Store Water Usage', url, 'POST', formData).then(result => {
                console.log(result);
                // loader.style.display = 'none';
                let water_usage_tbody = document.querySelector('#water-usage-table')
                water_usage_tbody.innerHTML = '';
                result.water_usage.forEach(data => {
                let parsedDate;
                
                // Check if the date is in ISO week-date format (e.g., "YYYY-Www")
                if (data.date_type === "weekly" && /^\d{4}-W\d{2}$/.test(data.date)) {
                    console.log('got in here');
                    
                    const [year, week] = data.date.split("-W");
                    const januaryFourth = new Date(`${year}-01-04`); // Jan 4 is always in the first ISO week
                    const dayOfWeek = januaryFourth.getDay() || 7; // Ensure Sunday is 7, not 0
                    parsedDate = new Date(januaryFourth);
                    parsedDate.setDate(januaryFourth.getDate() + (week - 1) * 7 - dayOfWeek + 1); // Calculate ISO week start
                } else {
                    parsedDate = new Date(data.date); // Parse other formats normally
                }

                if (isNaN(parsedDate)) {
                    console.error("Invalid date:", data.date);
                    return; // Skip invalid dates
                }

                const options = { year: "numeric", month: "short", day: "numeric" };
                let usage_date = "";

                switch (data.date_type) {
                    case "monthly":
                        usage_date = parsedDate.toLocaleDateString(undefined, { year: "numeric", month: "short" }); // e.g., "Feb 2025"
                        break;
                    case "yearly":
                        usage_date = parsedDate.toLocaleDateString(undefined, { year: "numeric" }); // e.g., "2025"
                        break;
                    case "weekly":
                        const startOfWeek = new Date(parsedDate);
                        const endOfWeek = new Date(startOfWeek);
                        endOfWeek.setDate(startOfWeek.getDate() + 6);
                        usage_date = `${startOfWeek.toLocaleDateString(undefined, options)} - ${endOfWeek.toLocaleDateString(undefined, options)}`;
                        break;
                    default:
                        usage_date = parsedDate.toLocaleDateString(undefined, options); // e.g., "04 Feb 2025"
                        break;
                }

                // Append row to table
                water_usage_tbody.innerHTML += `
                <tr>
                    <td>${data.volume??""}</td>
                    <td>${usage_date??""}</td>
                    <td>${data.remark??""}</td>
                    <td class="text-end">
                        <div class="dropdown d-inline-block">
                            <a class="dropdown-toggle arrow-none" id="dLabel11"
                                data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="dLabel11">
                                <a class="dropdown-item" href="#">Update Material</a>
                                <a class="dropdown-item" href="#">Delete Material</a>
                                <hr class="dropdown-divider">
                            </div>
                        </div>
                    </td>
                </tr>
                `;
            });


            });
        });
        // end water usage
      </script>
         <script>
          // company water sources
            
  // AJAX implementation to store water sources details
  document.querySelector('#btn-submit-water-source').addEventListener('click', function () {
      const company_id = document.querySelector('#waterSourceForm input[name="company_id"]').value.trim();
      const water_source = document.querySelector('#waterSourceForm select[name="water_source"]').value.trim();
      const location = document.querySelector('#waterSourceForm input[name="location"]').value.trim();
      const capacity = document.querySelector('#waterSourceForm input[name="capacity"]').value.trim();

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

      if (!location) {
          Toastify({
              text: "Please provide a location.",
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

      let url = "{{ route('admin.store-company-water-source') }}";
      const formData = new FormData();
    formData.append('company_id', company_id);
    formData.append('water_source_id', water_source);
    formData.append('location', location);
    formData.append('capacity', capacity);

      fetch_cycle('--Save Water sources', url, 'POST', formData).then(result => {
          console.log(result);
        if (result.status === "success") {
            const waterSourceSelect = document.querySelector('#waterSourceForm select[name="water_source"]');
            waterSourceSelect.innerHTML = ""; // Clear existing options

            result.water_sources.forEach(source => {
                const option = document.createElement("option");
                option.value = source.WaterSourcesId;
                option.textContent = source.sources;
                if (result.company_water_sources.includes(source.WaterSourcesId)) {
                    option.selected = true; // Mark as selected if already associated with the company
                }
                waterSourceSelect.appendChild(option);
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
          

        // end company water sources
     </script>
     <!-- water usage -->

     <!-- Chemical  -->
      <script>
        let btn_submit_chemical = document.querySelector('#btn-submit-chemical');
        btn_submit_chemical.addEventListener('click', () => {
            console.log("clicked");
            // Show the loader
            let loader = document.querySelector('#chemical-usage #loader');
            loader.style.display = 'inline-block';

            let company_id = document.querySelector('#chemical-usage input[name="company_id"]').value.trim();
            let chemical = document.querySelector('#chemical-usage select[name="chemical"]').value.trim();
            let unit_of_measurement = document.querySelector('#chemical-usage input[name="unit_of_measurement"]').value.trim();
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
            formData.append('checkOut_chemical_id', checkOut_chemical_id);
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
  


    @endsection
</x-layouts.admin-app>