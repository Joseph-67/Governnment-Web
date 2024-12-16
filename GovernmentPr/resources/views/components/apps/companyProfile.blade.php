<x-layouts.admin-app>

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
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="quality policy" name="policy[]" {{(in_array('quality policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Quality policy </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="environmental policy" name="policy[]" {{(in_array("environmental policy", array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Enviromental Policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="health and safety policy" name="policy[]" {{(in_array('health and safety policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Health and safety policy. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="human resource policy" name="policy[]" {{(in_array('human resource policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Human resource policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="data protection policy" name="policy[]" {{(in_array('data protection policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Data protection policy. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="cooperate social responsibility policy" name="policy[]" {{(in_array('cooperate social responsibility policy', array_column($company_policies->toArray(), 'policy_title')))? "checked": ""}}>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Cooperate social reponsibility policy. </label>
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
                                            <!-- Policy -->
                                             <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="business growth" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Business growth </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="customer satisfaction" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Customer satisfaction. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="material optimization" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Material optimization. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="waste minimization" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Waste minimization. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="measurable and timely targets" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Measurable & timely targets. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="innovation" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Innovation. </label>
                                                </div>
                                            </div>
                                            <x-section-border />
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="sustainability" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Sustainability. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="employee management" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Employee management. </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="market expansion" name="objective[]">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> Market expansion. </label>
                                                </div>
                                            </div>
                                             </div>
                                            <!-- End Policy -->
                                        </div><!--end card-body-->                                            
                                    </div><!--end card-->
                                </div>
                                <div class="tab-pane p-3" id="objectives" role="tabpanel">

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

</x-layouts.admin-app>