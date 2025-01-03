<x-layouts.admin-app>
@section('PageTitle', 'Company Profile')
@section('styles')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
@endsection
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="d-flex align-items-center flex-row flex-wrap">
                                    <div class="">
                                        <h5 class="fw-semibold fs-22 mb-1 text-uppercase">{{ $company->company_name }}</h5>                                                        
                                        <p class="mb-0 text-muted fw-medium">{{ $company->industry }}</p>
                                        <p class="mb-0 text-muted fw-medium">{{ $company->address }}, <br>{{ $company->city }}, {{ $company->state }}, {{ $company->country }}.</p>                                                        
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            
                            <div class="col-lg-1 ms-auto align-self-center">
                                <div class="d-flex justify-content-center">
                                    <div class="border-dashed rounded border-theme-color p-2 me-2 flex-grow-1 flex-basis-0">
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
                                <a href="#" class="float-end text-muted d-inline-flex text-decoration-underline"><i class="iconoir-edit-pencil fs-18 me-1"></i>Edit</a>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                          
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <p class="text-muted fw-medium mb-1">
                        This section displays the personal information you’ve provided to us. Please review the details below to ensure they’re accurate and up-to-date.
                        </p>
                        <p class="text-muted fw-medium mb-3">
                        If you need to make any changes, simply click the "Edit" button. Your privacy is important to us, and all your information is securely stored in compliance with our [Privacy Policy].
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-transparent border border-light text-gray-700 fs-12 fw-medium mb-1">{{ $company->industry_process }}</span>
                        </div>
                        @php
                        $est_date = Carbon\Carbon::parse($company->date_of_establishment);
                        @endphp
                        <ul class="list-unstyled mb-0">                                        
                            <li class=""><i class="las la-birthday-cake me-2 text-secondary fs-22 align-middle"></i> <b> Establishment Date </b> : {{ $est_date->format('d M Y') }}</li>
                            <!-- <li class="mt-2"><i class="las la-briefcase me-2 text-secondary fs-22 align-middle"></i> <b> Industry </b> : {{ $company->industry }}</li> -->
                            <!-- <li class="mt-2"><i class="las la-university me-2 text-secondary fs-22 align-middle"></i> <b> Education </b> : Stanford Univercity</li> -->
                            <!-- <li class="mt-2"><i class="las la-language me-2 text-secondary fs-22 align-middle"></i> <b> Languages </b> : English, French, Spanish</li> -->
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b> Primary Phone </b> : {{ $company->primary_phone_number }}</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b> Secondary Phone </b> : {{ $company->secondary_phone_number }}</li>
                            <li class="mt-2"><i class="las la-envelope me-2 text-secondary fs-22 align-middle me-2"></i> <b> Email </b> : {{ $company->email }}</li>
                            <li class="mt-2"><i class="las la-link text-secondary fs-22 align-middle me-2"></i> <b> Website </b> : <a href="{{ $company->website_url }}">{{ $company->website_url }}</a></li>
                            <li class="mt-2"><i class="las la-map-marked text-secondary fs-22 align-middle me-2"></i> <b> G.I.S Location </b> : {{ $company->gis_location }}</li>
                        </ul>       
                    </div><!--end card-body--> 
                </div><!--end card--> 

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Extra</h4>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                          
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <p class="text-muted fw-medium mb-1">
                        <!-- This section displays the personal information you’ve provided to us. Please review the details below to ensure they’re accurate and up-to-date. -->
                        </p>
                        <ul class="list-unstyled mb-0">
                            <li class="text-capitalize"><i class="las la-user-alt me-2 text-secondary fs-22 align-middle"></i> <b> Enviromental Operations Manager </b> : {{ $company->operations_manager }}</li>
                            <li class="mt-2 text-capitalize"><i class="las la-user-alt me-2 text-secondary fs-22 align-middle"></i> <b> Contact Person </b> : {{ $company->contact_person_full_name }}</li>
                            <li class="mt-2 text-capitalize"><i class="las la-briefcase me-2 text-secondary fs-22 align-middle"></i> <b> Position </b> : {{ $company->contact_person_position }}</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b> Mobile </b> : {{ $company->contact_person_contact_number }}</li>
                        </ul>       
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
                        <div class="col-md-8">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#policy" role="tab" aria-selected="true">Policies & Objectives</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" data-bs-toggle="tab" href="#recp" role="tab" aria-selected="false">R.E.C.P</a>
                                </li>                                                
                                <li class="nav-item">
                                    <a class="nav-link fw-medium" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a>
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
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <!-- Policy -->
                                             <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="quality-policy" value="quality policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'quality policy')" name="policy[]" {{(in_array('quality policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="quality-policy">Quality policy </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="environmental-policy" value="environmental policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'environmental policy')" name="policy[]" {{(in_array("environmental policy", array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="environmental-policy">Enviromental Policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="health-and-safety-policy" value="health and safety policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'health and safety policy')" name="policy[]" {{(in_array('health and safety policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="health-and-safety-policy">Health and safety policy. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="human-resource-policy" value="human resource policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'human resource policy')" name="policy[]" {{(in_array('human resource policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="human-resource-policy">Human resource policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="data-protection-policy" value="data protection policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'data protection policy')" name="policy[]" {{(in_array('data protection policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="data-protection-policy">Data protection policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="cooperate-social-responsibility-policy" value="cooperate social responsibility policy" onchange="ChangePolicy(this, '{{$company->company_id}}', 'cooperate social responsibility policy')" name="policy[]" {{(in_array('cooperate social responsibility policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="cooperate-social-responsibility-policy">Cooperate social reponsibility policy. </label>
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
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <!-- objective -->
                                             <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="business-growth" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'business growth')" value="business growth" name="objective[]" {{(in_array("business growth", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="business-growth"> Business growth </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="customer-satisfaction" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'customer satisfaction')" value="customer satisfaction" name="objective[]" {{(in_array("customer satisfaction", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="customer-satisfaction"> Customer satisfaction. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="material-optimization" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'material optimization')" value="material optimization" name="objective[]" {{(in_array("material optimization", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="material-optimization"> Material optimization. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="waste-minimization" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'waste minimization')" value="waste minimization" name="objective[]" {{(in_array("waste minimization", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="waste-minimization"> Waste minimization. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="measurable-and-timely-targets" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'measurable and timely targets')" value="measurable and timely targets" name="objective[]" {{(in_array("measurable and timely targets", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="measurable-and-timely-targets"> Measurable & timely targets. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="innovation" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'innovation')" value="innovation" name="objective[]" {{(in_array("innovation", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="innovation"> Innovation. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sustainability" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'sustainability')" value="sustainability" name="objective[]" {{(in_array("sustainability", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="sustainability"> Sustainability. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="employee-management" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'employee management')" value="employee management" name="objective[]" {{(in_array("employee management", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="employee-management"> Employee management. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="market-expansion" onchange="ChangeObjectives(this, '{{$company->company_id}}', 'market expansion')" value="market expansion" name="objective[]" {{(in_array("market expansion", array_column($company_objectives->toArray(), 'objective_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="market-expansion"> Market expansion. </label>
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
                                        and Cleaner Production (RECP) focus on optimizing energy and resource use while minimizing waste. 
                                        These practices help businesses reduce costs, enhance sustainability, and lower environmental impacts. 
                                        The benefits include cost savings, compliance with regulations, improved competitiveness, and positive 
                                        contributions to Nigeria's economic growth and environmental protection. Adopting IEE and RECP strategies 
                                        enables industries to operate more efficiently and sustainably, fostering a cleaner, greener future.</p>
                                        <!-- this projct -->
                                    <div class="card">
                                        <!-- card header -->
                                        <div class="card-header">
                                            <ul class="nav nav-tabs card-header-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="true" href="#this-project" data-bs-toggle="tab">This Project</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#environmental-health" data-bs-toggle="tab">Human and Environmental Health/Business Benefits</a>
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
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `Develop policy and regulation that deliver economic, human and environmental health gain to your company.`)" value="Develop policy and regulation that deliver economic, human and environmental health gain to your company." name="areas_of_company_benefit[]" {{(in_array("Develop policy and regulation that deliver economic, human and environmental health gain to your company.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Develop policy and regulation that deliver economic, humanand environmental health gain to your company. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.`)" value="To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise." name="areas_of_company_benefit[]" {{(in_array("To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector.`)" value="To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector." name="areas_of_company_benefit[]" {{(in_array("To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.`)" value="To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes." name="areas_of_company_benefit[]" {{(in_array("To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.`)" value="To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector." name="areas_of_company_benefit[]" {{(in_array("To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.`)" value="To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs." name="areas_of_company_benefit[]" {{(in_array("To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.`)" value="To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects." name="areas_of_company_benefit[]" {{(in_array("To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.", array_column($company_benefits->toArray(), 'benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects. </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- environmental health -->
                                                <div class="row tab-pane fade" id="environmental-health">
                                                    <div class="col-md-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a minimum 20% reduction in energy consumption within one year.`)" value="Achieve a minimum 20% reduction in energy consumption within one year." name="environment_health_benefit[]" {{(in_array("Achieve a minimum 20% reduction in energy consumption within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Achieve a minimum 20% reduction in energy consumption within one year. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.`)" value="Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months." name="environment_health_benefit[]" {{(in_array("Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Double your water productivity within one year.`)" value="Double your water productivity within one year." name="environment_health_benefit[]" {{(in_array("Double your water productivity within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Double your water productivity within one year. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 50% increase in overall material productivity within one year.`)" value="Achieve a 50% increase in overall material productivity within one year." name="environment_health_benefit[]" {{(in_array("Achieve a 50% increase in overall material productivity within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Achieve a 50% increase in overall material productivity within one year. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.`)" value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices." name="environment_health_benefit[]" {{(in_array("Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve an increase in overall annual financial savings.`)" value="Achieve an increase in overall annual financial savings." name="environment_health_benefit[]" {{(in_array("Achieve an increase in overall annual financial savings.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Achieve an increase in overall annual financial savings. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Enhance customer satisfaction through improved products, services, and overall experience.`)" value="Enhance customer satisfaction through improved products, services, and overall experience." name="environment_health_benefit[]" {{(in_array("Enhance customer satisfaction through improved products, services, and overall experience.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Enhance customer satisfaction through improved products, services, and overall experience. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-md-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.`)" value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management." name="environment_health_benefit[]" {{(in_array("Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management. </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- environmental health -->
                                                <!-- Innovation -->
                                                <div class="row tab-pane fade g-2" id="tab-innovation">
                                                    <div class="col-md-12">
                                                        <div class="col-md-8">
                                                        <label for="">Key areas for improving performance in your industry.</label>
                                                        </div>
                                                        <div class="col-md-12 key-areas-container">
                                                                @foreach($company_areas_of_improvement as $keyArea)
                                                                    <div class="row g-2 my-1">
                                                                        <div class="col-md-9">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" value="{{ $keyArea->area_title }}" placeholder="Key area for improving performance in your industry" onblur='update_key_area("{{$company->company_id}}", "{{ $keyArea->improvementAreaID }}", this)'>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_key_area(this, "{{ $keyArea->improvementAreaID }}")' type="button">  <i class="iconoir-trash"></i> </button></div>
                                                                    </div>
                                                                @endforeach
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Key area for performance improvement" id="key_area_for_improvent">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"><button class="btn btn-outline-primary btn-sm add_more_key_areas" type="button">  <i class="iconoir-plus fs-4"></i> </button></div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="col-md-8">
                                                        <label for="">Highlight innovations that enhance your product's environmental compatibility.</label>
                                                        </div>
                                                        <div class="col-md-12 product-innovation-container">
                                                            @foreach($company_product_innovation as $productInnovation)
                                                                <div class="row g-2 my-1">
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" value="{{ $productInnovation->innovation_area_title }}" placeholder="Key innovation that enhance your product's environmental compatibility" onblur='update_product_innovation("{{$company->company_id}}", "{{ $productInnovation->innovationAreaID }}", this)'>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_product_innovation(this, "{{ $productInnovation->innovationAreaID }}")' type="button">  <i class="iconoir-trash"></i> </button></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Key innovation that enhance your product's environmental compatibility" id="key_product_innovation">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"><button class="btn btn-outline-primary btn-sm add_more_key_innovation" type="button">  <i class="iconoir-plus fs-4"></i> </button></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="col-md-8">
                                                        <label for="">Identify hazarduous materials in your process system that can be reduced, eliminated, or replaced with safer alternatives.</label>
                                                        </div>
                                                        <div class="col-md-12 hazarduous-material-container">
                                                            @foreach($company_hazarduous_material as $hazarduousMaterial)
                                                                <div class="row g-2 my-1">
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" value="{{ $hazarduousMaterial->material_title }}" placeholder="Key innovation that enhance your product's environmental compatibility" onblur='update_hazarduous_material("{{$company->company_id}}", "{{ $hazarduousMaterial->hazarduousMaterialID }}", this)'>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_harzardous_material(this, "{{ $hazarduousMaterial->hazarduousMaterialID }}")' type="button">  <i class="iconoir-trash"></i> </button></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Hazarduous material " id="hazarduous_material">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"><button class="btn btn-outline-primary btn-sm add_more_hazardous_material" type="button">  <i class="iconoir-plus fs-4"></i> </button></div>
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
                                                    <a class="nav-link active" aria-current="true" href="#tab-housekeeping" data-bs-toggle="tab">Good Housekeeping</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#process-specific-optimization" data-bs-toggle="tab">Process Specific Optimization</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#process-waste-reduction-measures" data-bs-toggle="tab">Waste Reduction Measures</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#waste-management-method" data-bs-toggle="tab">Waste Management & Disposal Methods</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#product-recovery" data-bs-toggle="tab">Product Recovery Measures</a>
                                                </li>
                                            </ul>                               
                                        </div><!--end card-header-->
                                        <div class="card-body pt-2">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab-housekeeping">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Attitudinal change (negligence attitude).`)" value="Attitudinal change (negligence attitude)." name="house_keeping[]" {{(in_array("Attitudinal change (negligence attitude).", array_column($company_house_keeping->toArray(), 'practice_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Attitudinal change (negligence attitude). </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Improved workplace management.`)" value="Improved workplace management." name="house_keeping[]" {{(in_array("Improved workplace management.", array_column($company_house_keeping->toArray(), 'practice_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Improved Workplace management. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Good operating practices(personel practices, waste segregation etc.).`)" value="Good operating practices(personel practices, waste segregation etc.)." name="house_keeping[]" {{(in_array("Good operating practices(personel practices, waste segregation etc.).", array_column($company_house_keeping->toArray(), 'practice_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Good operating practices(personel practices, waste segregation etc.). </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Workers motivation.`)" value="Workers motivation." name="house_keeping[]" {{(in_array("Workers motivation.", array_column($company_house_keeping->toArray(), 'practice_title')))? "checked": ""}}>
                                                            <label class="form-check-label" for=""> Workers motivation. </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Process  Specific Specialization -->
                                                <div class="row g-2 tab-pane fade "  id="process-specific-optimization">
                                                    <div class="col-md-12">
                                                        <div class="col-md-8">
                                                        <label for="">List Unit Processes Requiring Intervention (if applicable)</label>
                                                        </div>
                                                        <div class="col-md-12 unit-process-container">
                                                            @foreach($company_unit_process as $unitProcess)
                                                                <div class="row g-2 my-1">
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" value="{{ $unitProcess->unit_process_title }}" placeholder="Unit process" onblur='update_unit_process("{{$company->company_id}}", "{{ $unitProcess->unitProcessID }}", this)'>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3"><button class="btn btn-outline-danger" onclick='remove_unit_process(this, "{{ $unitProcess->unitProcessID }}")' type="button">  <i class="iconoir-trash"></i> </button></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Unit process" id="unit_process">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"><button class="btn btn-outline-primary btn-sm add_more_unit_process" type="button">  <i class="iconoir-plus fs-4"></i> </button></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="col-md-8">
                                                            <label for=""> Problem Summary and Suggested Solutions. </label>
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="" name="problem_and_solution[]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3"><button class="btn btn-secondary add_more_problem_and_solution" type="button">  Add </button></div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-md-12 problem-and-solution-container"></div>
                                                </div>
                                                <!-- Process specific specialization -->
                                                <!-- waste reduction measures -->
                                                <div class="tab-pane fade" id="process-waste-reduction-measures">
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Water recycling flow.`)" id="" value="Water recycling flow." name="RECP_waste_reduction_measures[]" {{(in_array("Water recycling flow.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Water recycling flow. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Waste water treatment.`)" value="Waste water treatment." name="RECP_waste_reduction_measures[]" {{(in_array("Waste water treatment.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Waste water treatment. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Monitoring of the quality and quantity of waste water.`)" value="Monitoring of the quality and quantity of waste water." name="RECP_waste_reduction_measures[]" {{(in_array("Monitoring of the quality and quantity of waste water.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Monitoring of the quality and quantity of wastewater. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Using production equipment or technology that supports energy/resource-efficient production.`)" value="Using production equipment or technology that supports energy/resource-efficient production." name="RECP_waste_reduction_measures[]" {{(in_array("Using production equipment or technology that supports energy/resource-efficient production.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Using production equipment or technology that supports energy/resource-efficient production. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of waste for internal energy sources.`)" value="Use of waste for internal energy sources." name="RECP_waste_reduction_measures[]" {{(in_array("Use of waste for internal energy sources.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Use of waste for internal energy sources. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Installation of lighting sensor.`)" value="Installation of lighting sensor." name="RECP_waste_reduction_measures[]" {{(in_array("Installation of lighting sensor.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Installation of lighting sensor. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Utilization of sunlight for daytime lighting.`)" value="Utilization of sunlight for daytime lighting." name="RECP_waste_reduction_measures[]" {{(in_array("Utilization of sunlight for daytime lighting.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Utilization of sunlight for daytime lighting. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of enviromentally friendly/renewable energy.`)" value="Use of enviromentally friendly/renewable energy." name="RECP_waste_reduction_measures[]" {{(in_array("Use of enviromentally friendly/renewable energy.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Use of enviromentally friendly/renewable energy. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Recording of fuel usage.`)" value="Recording of fuel usage." name="RECP_waste_reduction_measures[]" {{(in_array("Recording of fuel usage.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Recording of fuel usage. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Minimize the use of generating sets.`)" value="Minimize the use of generating sets." name="RECP_waste_reduction_measures[]" {{(in_array("Minimize the use of generating sets.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Minimize the use of generating sets. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Substitute high yield pollutant raw materials with other less polluting materials.`)" value="Substitute high yield pollutant raw materials with other less polluting materials." name="RECP_waste_reduction_measures[]" {{(in_array("Substitute high yield pollutant raw materials with other less polluting materials.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Substitute high yield pollutant raw materials with other less polluting materials. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Maintain the unit process/equipment to minimize emission of pollutants.`)" value="Maintain the unit process/equipment to minimize emission of pollutants." name="RECP_waste_reduction_measures[]" {{(in_array("Maintain the unit process/equipment to minimize emission of pollutants.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Maintain the unit process/equipment to minimize emission of pollutants. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Diluting the air pollutants.`)" value="Diluting the air pollutants." name="RECP_waste_reduction_measures[]" {{(in_array("Diluting the air pollutants.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Diluting the air pollutants. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Plant flowers and trees around the premises to reduce large number of pollutants in the air.`)" value="Plant flowers and trees around the premises to reduce large number of pollutants in the air." name="RECP_waste_reduction_measures[]"  {{(in_array("Plant flowers and trees around the premises to reduce large number of pollutants in the air.", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Plant flowers and trees around the premises to reduce large number of pollutants in the air. </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).`)" value="Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy)." name="RECP_waste_reduction_measures[]"  {{(in_array("Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).", array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy). </label>
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
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Landfill`)" value="Landfill" name="waste_management_methods[]" {{(in_array("Landfill", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Landfill </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Recycling`)" value="Recycling" name="waste_management_methods[]" {{(in_array("Recycling", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Recycling </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste segregation`)" value="Waste segregation" name="waste_management_methods[]" {{(in_array("Waste segregation", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Waste segregation </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Incineration`)" value="Incineration" name="waste_management_methods[]" {{(in_array("Incineration", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Incineration </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Composting`)" value="Composting" name="waste_management_methods[]" {{(in_array("Composting", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Composting </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste Symbiosis`)" value="Waste Symbiosis" name="waste_management_methods[]" {{(in_array("Waste Symbiosis", array_column($company_management_measures->toArray(), 'management_method_title')))? "checked": ""}}>
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
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `High temperature recovery method`)" value="High temperature recovery method" name="product_recovery_measures[]" {{(in_array("High temperature recovery method", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> High temperature recovery method </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using correct material ratio`)" value="Using correct material ratio" name="product_recovery_measures[]" {{(in_array("Using correct material ratio", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for=""> Using correct material ratio </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using standard measuring equipment`)" value="Using standard measuring equipment" name="product_recovery_measures[]" {{(in_array("Using standard measuring equipment", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Using standard measuring equipment </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate chemical/ material storage facility`)" value="Adequate chemical/ material storage facility" name="product_recovery_measures[]" {{(in_array("Adequate chemical/ material storage facility", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Adequate chemical/ material storage facility </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate container seal to prevent spill`)" value="Adequate container seal to prevent spill" name="product_recovery_measures[]" {{(in_array("Adequate container seal to prevent spill", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Adequate container seal to prevent spill </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Recycling`)" value="Recycling" name="product_recovery_measures[]" {{(in_array("Recycling", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Recycling </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Filtration`)" value="Filtration" name="product_recovery_measures[]" {{(in_array("Filtration", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Filtration </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="" onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Extended Producer Responsibility(EPR)`)" value="Extended Producer Responsibility(EPR)" name="product_recovery_measures[]" {{(in_array("Extended Producer Responsibility(EPR)", array_column($company_product_recovery_measures->toArray(), 'recovery_method_title')))? "checked": ""}}>
                                                                <label class="form-check-label" for="">  Extended Producer Responsibility(EPR)  </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--  -->
                                            </div>
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
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">                       
                                        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Company name" name="company_name">
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
                    <select name="" id="industry-process" name="industry_process_used" class="form-select">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Example: company@domain.com" name="email">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Website Address</label>
                    <input type="url" class="form-control" placeholder="" name="website_address">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Primary Phone Number</label>
                    <input id="mobile_code_primary" type="tel" class="form-control" placeholder="">
                    <input type="hidden" name="primary_phone_number">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Secondary Phone Number</label>
                    <input id="mobile_code_secondary" type="tel" class="form-control" placeholder="" >
                    <input type="hidden" name="secondary_phone_number">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">Number Of Employees.</label>
                    <input type="number" class="form-control" placeholder="" name="number_of_employees">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <label for="">Date of Establishment</label>
                <input class="form-control" type="date" id="" name="date_of_establishment">
            </div>
        </div>                                                  
                                        </div><!--end card-body-->                                            
                                    </div><!--end card-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Company's Location</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0"> 
                                        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">Country</label>
                    <select name="country" id="" class="form-select countries" id="countryId">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">State</label>
                    <select id="" class="form-select states" onchange="toggleLGA(this);" id="stateId" name="state">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">City</label>
                    <select id="lga" class="form-select select-lga cities" id="cityId" name="city">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" placeholder="" name="address">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Geographic Information System(GIS) Location</label>
                    <input type="text" class="form-control" placeholder="" name="gis_location">
                </div>
            </div>
        </div>  
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Other Settings</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Full Name Of Enviromental Operations Specialist or Manager" name="enviromental_operations_manager">
            </div>
            <div class="col-md-6 mt-2">
                <input type="text" class="form-control" placeholder="Full Name Of Contact Person" name="contact_person_name">
            </div>
            <div class="col-md-6 mt-2">
                <input type="text" class="form-control" placeholder="Office Position of Contact Person" name="contact_person_position">
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Contact Personnel Phone Number</label>
                    <input id="mobile_code_contact" type="tel" class="form-control" placeholder="" >
                    <input type="hidden" name="contact_person_phone_number">
                </div>
            </div>
            <div class="col-md-12 mt-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse" name="is_sharable" value="active">
                    <label class="form-check-label" for="flexSwitchCheckReverse">Do you wish for your information to be shared with other companies</label>
                </div>
            </div>
            <div class="col-md-12 mt-md-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-warning">Deactivate Company</button>
                 <button type="button" class="btn btn-danger">Delete Company</button>
            </div>
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
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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

@section('styles')
<link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>
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
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
                credentials: 'same-origin',
                body: formData
            }).then(async (response) => {
                let data = await response.json()
                console.log("--policy", data);
                if (data.status == 'success'){
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

                if(data.status == 'error'){
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
        }else{
            if (confirm("Do you want to remove this policy?")) {
                let uri = "{{ route('admin.remove-company-policy') }}";
            let formData = new FormData();
            formData.append('company', company)
            formData.append('policy', policy)
            let response = await fetch(uri, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
                credentials: 'same-origin',
                body: formData
            }).then(async (response) => {
                let data = await response.json()
                console.log("--objective", data);
                if (data.status == 'success'){
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

                if(data.status == 'error'){
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
        }else{
            if (confirm("Do you want to remove this policy?")) {
                let uri = "{{ route('admin.remove-company-objective') }}";
            let formData = new FormData();
            formData.append('company', company)
            formData.append('objective', objective)
            let response = await fetch(uri, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--benefit", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove this area of benefit?")) {
            let uri = "{{ route('admin.remove-recp-project') }}";
        let formData = new FormData();
        formData.append('company', company)
        formData.append('areas_of_company_benefit', benefit)
        let response = await fetch(uri, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--benefit", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove this benefit?")) {
            let uri = "{{ route('admin.remove-recp-environmental') }}";
        let formData = new FormData();
        formData.append('company', company)
        formData.append('enviromental_benefit_title', benefit)
        let response = await fetch(uri, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--house keeping", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove House keeping?")) {
            let uri = "{{ route('admin.remove-house-keeping') }}";
        let formData = new FormData();
        formData.append('company', company)
        formData.append('house_keeping_title', house_keeping)
        let response = await fetch(uri, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--Wate Reduction Measure", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove this waste reduction measure?")) {
            let uri = "{{ route('admin.remove-waste-reduction-measure') }}";
            let formData = new FormData();
            formData.append('company', company)
            formData.append('waste_reduction_measure', measure)
            let response = await fetch(uri, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--Waste Disposal Method", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove waste management method?")) {
            let uri = "{{ route('admin.remove-waste-disposal-method') }}";
            let formData = new FormData();
            formData.append('company', company)
            formData.append('waste_management_method', disposal_method)
            let response = await fetch(uri, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: formData
        }).then(async (response) => {
            let data = await response.json()
            console.log("--product recovery measure", data);
            if (data.status == 'success'){
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

            if(data.status == 'error'){
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
    }else{
        if (confirm("Do you want to remove product recovery measure?")) {
            let uri = "{{ route('admin.remove-product-recovery-measure') }}";
            let formData = new FormData();
            formData.append('company', company)
            formData.append('product_recovery_measure', measure)
            let response = await fetch(uri, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
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
    if(!key_area_value){
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
            container.innerHTML ="";
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
    if(!key_product_innovation_value){
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
            container.innerHTML ="";
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
    if(!hazarduous_material_value){
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
            container.innerHTML ="";
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
    if(!unit_process_value){
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
            container.innerHTML ="";
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

// ***** Udate ******//
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
// end hazarduous material

async function fetch_cycle(subject, url, method, form_data) {
    try {
        let response = await fetch(url, {
            method: method,
            headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}',},
            credentials: 'same-origin',
            body: form_data
        });

        let data = await response.json();

        // feedback
        if (data.status == 'success'){
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
        }else if(data.status == 'error'){
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
        console.error('Fetch error:', error);
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
@endsection
</x-layouts.admin-app>