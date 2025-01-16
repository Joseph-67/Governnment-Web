<x-layouts.admin-app>
<div class="container py-7">
  <h2 class="text-uppercase text-letter-spacing-xs my-0 text-dark font-weight-bold">
    Our Team Members <i class="ion-ios-body pl-1 text-primary op-8 z-index-1"></i>
  </h2>
  <hr class="hr-primary w-15 hr-xl ml-0 mb-5">
  <div class="row mb-5">
    <div class="col-md-6 order-md-2">
    <label for="">Upload Profile Picture</label>
        <input type="file" id="input-file" name="upload-profile-picture[]" multiple accept="image/*"/>
    </div>
    <div class="col-md-6 flex-valign text-md-right">
      <input type="text" class="form-control" placeholder="Full Name" name="full_name">
        <div class="col-md-12 mt-2">
            <input type="email" class="form-control" placeholder="Email Address" name="email">
        </div>
        <div class="col-md-12 mt-2">
                        <input id="mobile_code_primary" type="tel" class="form-control" placeholder="Phone Number">
                      <input type="hidden" name="phone_number">
                    </div>
        <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Address" name="address">
    </div>
    <div class="col-md-12 mt-2">
                        <div class="">
                            <label for="">Department</label>
                            <select name="company_type" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                                <option value="human_resources(HR)_and_administration">Human Resources (HR) and Administration</option>
                                <option value="finance_and_accounting">Finance and Accounting</option>
                                <option value="sales_marketing">Sales Marketing</option>
                                <option value="operations_and_supply_chain">Operations and Supply Chain</option>
                                <option value="customer_service_and_support">Customer Services and Support</option>
                                <option value="information_technology(IT)_and_risk_management">Information Technology (IT) and Risk Management</option>
                                <option value="legal_and_compliance">Legal and Compliance</option>
                                <option value="product_development_and_engineering">Product Development and Engineering</option>
                                <option value="procurement_and_purchasing">Procurement and Purchasing</option>
                                <option value="business_development_and_strategy">Business Development and Strategy</option>
                                <option value="public_relation(PR)and_communications">Public Relation (PR) and Communications</option>
                                <option value="research_and_development(R&D)">Research and Development (R&D)</option>
                                <option value="executive_leadership">Executive Leadership</option>
                            </select>
                    </div>
    </div>
    <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Job Title" name="job_title">
    </div>                  
    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" id="input-file" name="certifications[]" multiple accept="image/*" />
                    </div> <!--end col-->
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-6 text-md-right">
        <label for="">Upload Profile Picture</label>
        <input type="file" id="input-file" name="upload-profile-picture[]" multiple accept="image/*"/>
    </div> <!--end col-->
    <div class="col-md-6 flex-valign">
      <h5 class="my-0 font-weight-normal"></h5>
      <hr class="hr-primary w-70 ml-0 mb-3">
      <input type="text" class="form-control" placeholder="Full Name" name="full_name">
        <div class="col-md-12 mt-2">
            <input type="email" class="form-control" placeholder="Email Address" name="email">
        </div>
        <div class="col-md-12 mt-2">
                        <input id="mobile_code_primary" type="tel" class="form-control" placeholder="Phone Number">
                      <input type="hidden" name="phone_number">
                    </div>
        <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Address" name="address">
    </div>
    <div class="col-md-12 mt-2">
                        <div class="">
                            <label for="">Department</label>
                            <select name="company_type" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                                <option value="Human Resources (HR) and Administration">Human Resources (HR) and Administration</option>
                                <option value="Finance and Accounting">Finance and Accounting</option>
                                <option value="Sales Marketing">Sales Marketing</option>
                                <option value="Operations and Supply Chain">Operations and Supply Chain</option>
                                <option value="Customer Services and Support">Customer Services and Support</option>
                                <option value="Information Technology (IT) and Risk Management">Information Technology (IT) and Risk Management</option>
                                <option value="Legal and compliance">Legal and compliance</option>
                                <option value="Product Development and Engineering">Product Development and Engineering</option>
                                <option value="Procurement and Purchasing">Procurement and Purchasing</option>
                                <option value="Business Development and Strategy">Business Development and Strategy</option>
                                <option value="Public Relation (PR) and Communications">Public Relation (PR) and Communications</option>
                                <option value="Research and Development (R&D)">Research and Development (R&D)</option>
                                <option value="Executive Leadership">Executive Leadership</option>
                            </select>
                    </div>
    </div>
    <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Job Title" name="job_title">
    </div>
    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" id="input-file" name="certifications[]" multiple accept="image/*" />
                    </div> <!--end col-->
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-6 order-md-2">
    <label for="">Upload Profile Picture</label>
        <input type="file" id="input-file" name="upload-profile-picture[]" multiple accept="image/*"/>
</div>
    <div class="col-md-6 flex-valign text-md-right">
      <hr class="hr-primary w-70 ml-0 ml-md-auto mr-md-0 mb-3">
      <input type="text" class="form-control" placeholder="Full Name" name="full_name">
        <div class="col-md-12 mt-2">
            <input type="email" class="form-control" placeholder="Email Address" name="email">
        </div>
        <div class="col-md-12 mt-2">
                        <input id="mobile_code_primary" type="tel" class="form-control" placeholder="Phone Number">
                      <input type="hidden" name="phone_number">
                    </div>
        <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Address" name="address">
    </div>
    <div class="col-md-12 mt-2">
                        <div class="">
                            <label for="">Department</label>
                            <select name="company_type" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                                <option value="Human Resources (HR) and Administration">Human Resources (HR) and Administration</option>
                                <option value="Finance and Accounting">Finance and Accounting</option>
                                <option value="Sales Marketing">Sales Marketing</option>
                                <option value="Operations and Supply Chain">Operations and Supply Chain</option>
                                <option value="Customer Services and Support">Customer Services and Support</option>
                                <option value="Information Technology (IT) and Risk Management">Information Technology (IT) and Risk Management</option>
                                <option value="Legal and compliance">Legal and compliance</option>
                                <option value="Product Development and Engineering">Product Development and Engineering</option>
                                <option value="Procurement and Purchasing">Procurement and Purchasing</option>
                                <option value="Business Development and Strategy">Business Development and Strategy</option>
                                <option value="Public Relation (PR) and Communications">Public Relation (PR) and Communications</option>
                                <option value="Research and Development (R&D)">Research and Development (R&D)</option>
                                <option value="Executive Leadership">Executive Leadership</option>
                            </select>
                    </div>
    </div>
    <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Job Title" name="job_title">
    </div>
    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" id="input-file" name="certifications[]" multiple accept="image/*" />
                    </div> <!--end col-->
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-6 text-md-right">
    <label for="">Upload Profile Picture</label>
        <input type="file" id="input-file" name="upload-profile-picture[]" multiple accept="image/*"/>
</div>
    <div class="col-md-6 flex-valign">
      <hr class="hr-primary w-70 ml-0 mb-3">
      <input type="text" class="form-control" placeholder="Full Name" name="full_name">
        <div class="col-md-12 mt-2">
            <input type="email" class="form-control" placeholder="Email Address" name="email">
        </div>
        <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Address" name="address">
    </div>
    <div class="col-md-12 mt-2">
                        <div class="">
                            <label for="">Department</label>
                            <select name="company_type" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                                <option value="Human Resources (HR) and Administration">Human Resources (HR) and Administration</option>
                                <option value="Finance and Accounting">Finance and Accounting</option>
                                <option value="Sales Marketing">Sales Marketing</option>
                                <option value="Operations and Supply Chain">Operations and Supply Chain</option>
                                <option value="Customer Services and Support">Customer Services and Support</option>
                                <option value="Information Technology (IT) and Risk Management">Information Technology (IT) and Risk Management</option>
                                <option value="Legal and compliance">Legal and compliance</option>
                                <option value="Product Development and Engineering">Product Development and Engineering</option>
                                <option value="Procurement and Purchasing">Procurement and Purchasing</option>
                                <option value="Business Development and Strategy">Business Development and Strategy</option>
                                <option value="Public Relation (PR) and Communications">Public Relation (PR) and Communications</option>
                                <option value="Research and Development (R&D)">Research and Development (R&D)</option>
                                <option value="Executive Leadership">Executive Leadership</option>
                            </select>
                    </div>
    </div>
    <div class="col-md-12 mt-2">
        <input type="text" class="form-control" placeholder="Job Title" name="job_title">
    </div>
    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" id="input-file" name="certifications[]" multiple accept="image/*" />
                    </div> <!--end col-->
    </div>
  </div>
</div>
</x-layouts.admin-app>