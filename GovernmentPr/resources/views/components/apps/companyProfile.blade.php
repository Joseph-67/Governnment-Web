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
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Develop policy and regulation that deliver economic, human and environmental health gain to your company." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Develop policy and regulation that deliver economic, humanand environmental health gain to your company. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects." name="areas_of_company_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects. </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- environmental health -->
                                            <div class="row tab-pane fade" id="environmental-health">
                                                <div class="col-md-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a minimum 20% reduction in energy consumption within one year." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a minimum 20% reduction in energy consumption within one year. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Double your water productivity within one year." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Double your water productivity within one year. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 50% increase in overall material productivity within one year." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 50% increase in overall material productivity within one year. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve an increase in overall annual financial savings." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve an increase in overall annual financial savings. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Enhance customer satisfaction through improved products, services, and overall experience." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Enhance customer satisfaction through improved products, services, and overall experience. </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-md-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management." name="environment_health_benefit[]">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management. </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- environmental health -->
                                             <!-- Innovation -->
                                             <div class="row tab-pane fade" id="tab-innovation">
                                                <div class="col-md-12">
                                                    <div class="col-md-8">
                                                    <label for="">Key areas for improving performance in your industry.</label>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Key area for improving performance in your industry" name="key_area_for_improvent[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"><button class="btn btn-secondary add_more_key_areas" type="button">  Add </button></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 key-areas-container"></div>

                                                <div class="col-md-12 mt-2">
                                                    <div class="col-md-8">
                                                    <label for="">Highlight innovations that enhance your product's environmental compatibility.</label>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="" name="innovation_that_enhance_product[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"><button class="btn btn-secondary add_more_innovative_changes" type="button">  Add </button></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 product-innovation-container"></div>

                                                <div class="col-md-12 mt-2">
                                                    <div class="col-md-8">
                                                    <label for="">Identify hazarduous materials in your process system that can be reduced, eliminated, or replaced with safer alternatives.</label>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="" name="hazardous_material_in_process[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"><button class="btn btn-secondary add_more_hazardous_material" type="button">  Add </button></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 harzardous-material-container"></div>
                                            </div>
                                             <!-- Innovation -->
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
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Attitudinal change (negligence attitude)." name="house_keeping[]">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"> Attitudinal change (negligence attitude). </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Improved workplace management." name="house_keeping[]">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"> Improved Workplace management. </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Good operating practices(personel practices, waste segregation etc.)." name="house_keeping[]">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"> Good operating practices(personel practices, waste segregation etc.). </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Workers motivation." name="house_keeping[]">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"> Workers motivation. </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Process  Specific Specialization -->
                                                <div class="row mb-2 tab-pane fade "  id="process-specific-optimization">
                                                    <div class="col-md-12 mt-2">
                                                        <div class="col-md-8"><label for=""> List Unit Processes Requiring Intervention (if applicable) </label></div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="" name="unit_process[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3"><button class="btn btn-secondary add_more_unit_process" type="button">  Add </button></div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-12 unit-process-container"></div>
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
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Water recycling flow" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Water recycling flow </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Waste water treatment" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Waste water treatment </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Monitoring of the quality and quantity of wastewater" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Monitoring of the quality and quantity of wastewater </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Using production equipment or technology that supports energy/resource-efficient production" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Using production equipment or technology that supports energy/resource-efficient production </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Use of waste for internal energy sources" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Use of waste for internal energy sources </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Installation of lighting sensor" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Installation of lighting sensor </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Utilization of sunlight for daytime lighting" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Utilization of sunlight for daytime lighting </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Use of enviromentally friendly/renewable energy" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Use of enviromentally friendly/renewable energy </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Recording of fuel usage" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Recording of fuel usage </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Minimize the use of generating sets" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Minimize the use of generating sets </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Substitute high yield pollutant raw materials with other less polluting materials" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Substitute high yield pollutant raw materials with other less polluting materials </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Maintain the unit process/equipment to minimize emission of pollutants" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Maintain the unit process/equipment to minimize emission of pollutants </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Diluting the air pollutants" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Diluting the air pollutants </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Plant flowers and trees around the premises to reduce large number of pollutants in the air" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Plant flowers and trees around the premises to reduce large number of pollutants in the air </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy.)" name="RECP_waste_reduction_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy.) </label>
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
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Landfill" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Landfill </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Recycling" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Recycling </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Waste segregation" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Waste segregation </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Incineration" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Incineration </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Composting" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Composting </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Waste Symbiosis" name="waste_management_methods[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Waste Symbiosis </label>
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
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="High temperature recovery method" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> High temperature recovery method </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Using correct material ratio" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"> Using correct material ratio </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Using standard measuring equipment" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Using standard measuring equipment </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Adequate chemical/ material storage facility" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Adequate chemical/ material storage facility </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Adequate container seal to prevent spill" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Adequate container seal to prevent spill </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Recycling" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Recycling </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Filtration" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Filtration </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Extended Producer Responsibility(EPR)" name="product_recovery_measures[]">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">  Extended Producer Responsibility(EPR)  </label>
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
                                                    <h4 class="card-title">Personal Information</h4>                      
                                                </div><!--end col-->                                                       
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">                       
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First Name</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" value="Rosa">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last Name</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" value="Dodson">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Company Name</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" value="MannatThemes">
                                                    <span class="form-text text-muted font-12">We'll never share your email with anyone else.</span>
                                                </div>
                                            </div>
                
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Contact Phone</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="las la-phone"></i></span>
                                                        <input type="text" class="form-control" value="+123456789" placeholder="Phone" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="las la-at"></i></span>
                                                        <input type="text" class="form-control" value="rosa.dodson@demo.com" placeholder="Email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Website Link</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="la la-globe"></i></span>
                                                        <input type="text" class="form-control" value=" https://mannatthemes.com/" placeholder="Email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">USA</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <select class="form-select">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>USA</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>                                                    
                                        </div><!--end card-body-->                                            
                                    </div><!--end card-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Change Password</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0"> 
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current Password</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" placeholder="Password">
                                                    <a href="#" class="text-primary font-12">Forgot password ?</a>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New Password</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm Password</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" placeholder="Re-Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>   
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Other Settings</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="Email_Notifications" checked>
                                                <label class="form-check-label" for="Email_Notifications">
                                                    Email Notifications
                                                </label>
                                                <span class="form-text text-muted fs-12 mt-0">Do you need them?</span>
                                              </div>
                                              <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="" id="API_Access">
                                                <label class="form-check-label" for="API_Access">
                                                    API Access
                                                </label>
                                                <span class="form-text text-muted font-12 mt-0">Enable/Disable access</span>
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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
    let add_more_key_areas = document.querySelector('.add_more_key_areas')
    add_more_key_areas.addEventListener('click', () => {
        let container = document.querySelector('.key-areas-container')
        container.innerHTML += `
            <div class="row mt-2">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Key area for improving performance in your industry" name="key_area_for_improvent[]">
                    </div>
                </div>
                <div class="col-md-3"><button class="btn btn-danger" onclick="remove_key_area(this)" type="button">  Remove </button></div>
            </div>
        `
    });

    function remove_key_area(ele) {
        let parent = ele.parentElement.parentElement
        parent.remove()
    }

    let add_more_product_innovation = document.querySelector('.add_more_innovative_changes')
    console.log(add_more_product_innovation);
    
    add_more_product_innovation.addEventListener('click', () => {
        // alert('hello')
        let inovationcontainer = document.querySelector('.product-innovation-container')
        inovationcontainer.innerHTML += `
            <div class="row mt-2">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Product's innovation" name="innovation_that_enhance_product[]">
                    </div>
                </div>
                <div class="col-md-3"><button class="btn btn-danger" onclick="remove_product_innovation(this)" type="button">  Remove </button></div>
            </div>
        `
    });

    function remove_product_innovation(ele) {
        let parent = ele.parentElement.parentElement
        parent.remove()
    }

        let add_more_hazardous_material = document.querySelector('.add_more_hazardous_material')
        console.log(add_more_hazardous_material);
        add_more_hazardous_material.addEventListener('click', () => {
            // alert('hello')
            let hazrdouscontainer = document.querySelector('.harzardous-material-container')
            hazrdouscontainer.innerHTML += `
                <div class="row mt-2">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Hazarduous material" name="hazardous_material_in_process[]">
                        </div>
                    </div>
                    <div class="col-md-3"><button class="btn btn-danger" onclick="remove_harzardous_material(this)" type="button">  Remove </button></div>
                </div>
            `
        });

        function remove_harzardous_material(ele) {
            let parent = ele.parentElement.parentElement
            parent.remove()
        }

    let add_more_unit_process = document.querySelector('.add_more_unit_process')
    console.log(add_more_unit_process);
    add_more_unit_process.addEventListener('click', () => {
        // alert('hello')
        let unitProcessContainer = document.querySelector('.unit-process-container')
        unitProcessContainer.innerHTML += `
            <div class="row mt-2">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Unit process" name="unit_process[]">
                    </div>
                </div>
                <div class="col-md-3"><button class="btn btn-danger" onclick="remove_unit_process(this)" type="button">  Remove </button></div>
            </div>
        `
    });

    function remove_unit_process(ele) {
        let parent = ele.parentElement.parentElement
        parent.remove()
    }

    let add_more_problem_and_solution = document.querySelector('.add_more_problem_and_solution')
    console.log(add_more_problem_and_solution);
    add_more_problem_and_solution.addEventListener('click', () => {
        // alert('hello')
        let problemAndSolutionContainer = document.querySelector('.problem-and-solution-container')
        problemAndSolutionContainer.innerHTML += `
            <div class="row mt-2">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Problem summary and solution" name="problem_and_solution[]">
                    </div>
                </div>
                <div class="col-md-3"><button class="btn btn-danger" onclick="remove_problem_and_solution(this)" type="button">  Remove </button></div>
            </div>
        `
    });

    function remove_problem_and_solution(ele) {
        let parent = ele.parentElement.parentElement
        parent.remove()
    }
</script>
@endsection
</x-layouts.admin-app>