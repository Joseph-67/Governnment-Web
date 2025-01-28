<x-layouts.admin-app>
<div class="container-xl py-lg-5">
   <div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Our Team Members</h4>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body pt-0">
                <div class="row mb-5">
                    <div class="col-md-6 order-md-2">
                        <div class="frame">
                            <div class="center">
                                <div class="title">
                                    <h1>Upload Profile Picture</h1>
                                </div>
                                <div class="dropzone">
                                    <img
                                        src="http://100dayscss.com/codepen/upload.svg"
                                        class="upload-icon"
                                    />
                                    <input type="file" class="upload-input" class="filepond" />
                                </div>
                                <button
                                    type="button"
                                    class="btn"
                                    name="uploadbutton"
                                ></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 flex-valign text-md-right">
                        <div class="row">
                        <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email Address"
                                name="email"
                            />
                        </div>
                        <div class="col-md-12 mt-1">
                            <div class="">
                                <div class="col-md-12 mt-1">
                                    <input
                                        id="mobile_code_primary"
                                        type="tel"
                                        class="form-control"
                                        placeholder="Phone Number"
                                    />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Address"
                                    name="address"
                                />
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="">
                                    <label for="">Department</label>
                                    <select name="company_type" class="form-select">
                                        <option value="" disabled selected>
                                            Choose...
                                        </option>
                                        <option
                                            value="human_resources(HR)_and_administration"
                                        >
                                            Human Resources (HR) and Administration
                                        </option>
                                        <option value="finance_and_accounting">
                                            Finance and Accounting
                                        </option>
                                        <option value="sales_marketing">
                                            Sales Marketing
                                        </option>
                                        <option value="operations_and_supply_chain">
                                            Operations and Supply Chain
                                        </option>
                                        <option
                                            value="customer_service_and_support"
                                        >
                                            Customer Services and Support
                                        </option>
                                        <option
                                            value="information_technology(IT)_and_risk_management"
                                        >
                                            Information Technology (IT) and Risk
                                            Management
                                        </option>
                                        <option value="legal_and_compliance">
                                            Legal and Compliance
                                        </option>
                                        <option
                                            value="product_development_and_engineering"
                                        >
                                            Product Development and Engineering
                                        </option>
                                        <option value="procurement_and_purchasing">
                                            Procurement and Purchasing
                                        </option>
                                        <option
                                            value="business_development_and_strategy"
                                        >
                                            Business Development and Strategy
                                        </option>
                                        <option
                                            value="public_relation(PR)and_communications"
                                        >
                                            Public Relation (PR) and Communications
                                        </option>
                                        <option
                                            value="research_and_development(R&D)"
                                        >
                                            Research and Development (R&D)
                                        </option>
                                        <option value="executive_leadership">
                                            Executive Leadership
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Job Title"
                                    name="job_title"
                                />
                            </div>
                            <div class="col-md-6 col-lg-6 mt-2">
                                <label for="">Certifications</label>
                                <input
                                    type="file"
                                    id="input-file"
                                    class="filepond"
                                    name="certifications[]"
                                    multiple
                                    accept="image/*"
                                />
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body pt-0">
                <div class="row mb-5">
                    <div class="col-md-6 text-md-right">
                        <div class="frame">
                            <div class="center">
                                <div class="title">
                                    <h1>Upload Profile Picture</h1>
                                </div>
                                <div class="dropzone">
                                    <img
                                        src="http://100dayscss.com/codepen/upload.svg"
                                        class="upload-icon"
                                    />
                                    <input type="file" class="upload-input" class="filepond" />
                                </div>
                                <button
                                    type="button"
                                    class="btn"
                                    name="uploadbutton"
                                ></button>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6 flex-valign">
                        <div class="row">
                        <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                    </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email Address"
                                name="email"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <div class="col-md-12 mt-2">
                                    <input
                                        id="mobile_code_primary"
                                        type="tel"
                                        class="form-control"
                                        placeholder="Phone Number"
                                    />
                                </div>
                                </div>
                            </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Address"
                                name="address"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <label for="">Department</label>
                                <select name="company_type" class="form-select">
                                    <option value="" disabled selected>
                                        Choose...
                                    </option>
                                    <option
                                        value="human_resources(HR)_and_administration"
                                    >
                                        Human Resources (HR) and Administration
                                    </option>
                                    <option value="finance_and_accounting">
                                        Finance and Accounting
                                    </option>
                                    <option value="sales_marketing">
                                        Sales Marketing
                                    </option>
                                    <option value="operations_and_supply_chain">
                                        Operations and Supply Chain
                                    </option>
                                    <option value="customer_service_and_support">
                                        Customer Services and Support
                                    </option>
                                    <option
                                        value="information_technology(IT)_and_risk_management"
                                    >
                                        Information Technology (IT) and Risk
                                        Management
                                    </option>
                                    <option value="legal_and_compliance">
                                        Legal and Compliance
                                    </option>
                                    <option
                                        value="product_development_and_engineering"
                                    >
                                        Product Development and Engineering
                                    </option>
                                    <option value="procurement_and_purchasing">
                                        Procurement and Purchasing
                                    </option>
                                    <option
                                        value="business_development_and_strategy"
                                    >
                                        Business Development and Strategy
                                    </option>
                                    <option
                                        value="public_relation(PR)and_communications"
                                    >
                                        Public Relation (PR) and Communications
                                    </option>
                                    <option value="research_and_development(R&D)">
                                        Research and Development (R&D)
                                    </option>
                                    <option value="executive_leadership">
                                        Executive Leadership
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Job Title"
                                name="job_title"
                            />
                        </div>
                        <div class="col-md-6 col-lg-6 mt-2">
                            <label for="">Certifications</label>
                            <input
                                type="file"
                                id="input-file"
                                class="filepond"
                                name="certifications[]"
                                multiple
                                accept="image/*"
                            />
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body pt-0">
                <div class="row mb-5">
                    <div class="col-md-6 order-md-2">
                        <div class="frame">
                            <div class="center">
                                <div class="title">
                                    <h1>Upload Profile Picture</h1>
                                </div>
                                <div class="dropzone">
                                    <img
                                        src="http://100dayscss.com/codepen/upload.svg"
                                        class="upload-icon"
                                    />
                                    <input type="file" class="upload-input" class="filepond" />
                                </div>
                                <button
                                    type="button"
                                    class="btn"
                                    name="uploadbutton"
                                ></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 flex-valign text-md-right">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                    </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email Address"
                                name="email"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <div class="col-md-12 mt-2">
                                    <input
                                        id="mobile_code_primary"
                                        type="tel"
                                        class="form-control"
                                        placeholder="Phone Number"
                                    />
                                </div>
                                </div>
                            </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Address"
                                name="address"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <label for="">Department</label>
                                <select name="company_type" class="form-select">
                                    <option value="" disabled selected>
                                        Choose...
                                    </option>
                                    <option
                                        value="human_resources(HR)_and_administration"
                                    >
                                        Human Resources (HR) and Administration
                                    </option>
                                    <option value="finance_and_accounting">
                                        Finance and Accounting
                                    </option>
                                    <option value="sales_marketing">
                                        Sales Marketing
                                    </option>
                                    <option value="operations_and_supply_chain">
                                        Operations and Supply Chain
                                    </option>
                                    <option value="customer_service_and_support">
                                        Customer Services and Support
                                    </option>
                                    <option
                                        value="information_technology(IT)_and_risk_management"
                                    >
                                        Information Technology (IT) and Risk
                                        Management
                                    </option>
                                    <option value="legal_and_compliance">
                                        Legal and Compliance
                                    </option>
                                    <option
                                        value="product_development_and_engineering"
                                    >
                                        Product Development and Engineering
                                    </option>
                                    <option value="procurement_and_purchasing">
                                        Procurement and Purchasing
                                    </option>
                                    <option
                                        value="business_development_and_strategy"
                                    >
                                        Business Development and Strategy
                                    </option>
                                    <option
                                        value="public_relation(PR)and_communications"
                                    >
                                        Public Relation (PR) and Communications
                                    </option>
                                    <option value="research_and_development(R&D)">
                                        Research and Development (R&D)
                                    </option>
                                    <option value="executive_leadership">
                                        Executive Leadership
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Job Title"
                                name="job_title"
                            />
                        </div>
                        <div class="col-md-6 col-lg-6 mt-2">
                            <label for="">Certifications</label>
                            <input
                                type="file"
                                id="input-file"
                                class="filepond"
                                name="certifications[]"
                                multiple
                                accept="image/*"
                            />
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body pt-0">
                <div class="row mb-5">
                    <div class="col-md-6 text-md-right">
                        <div class="frame">
                            <div class="center">
                                <div class="title">
                                    <h1>Upload Profile Picture</h1>
                                </div>
                                <div class="dropzone">
                                    <img
                                        src="http://100dayscss.com/codepen/upload.svg"
                                        class="upload-icon"
                                    />
                                    <input type="file" class="upload-input" class="filepond" />
                                </div>
                                <button
                                    type="button"
                                    class="btn"
                                    name="uploadbutton"
                                ></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 flex-valign">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                    </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email Address"
                                name="email"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Address"
                                name="address"
                            />
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <div class="col-md-12 mt-2">
                                    <input
                                        id="mobile_code_primary"
                                        type="tel"
                                        class="form-control"
                                        placeholder="Phone Number"
                                    />
                                </div>
                                </div>
                            </div>
                        <div class="col-md-12 mt-2">
                            <div class="">
                                <label for="">Department</label>
                                <select name="company_type" class="form-select">
                                    <option value="" disabled selected>
                                        Choose...
                                    </option>
                                    <option
                                        value="human_resources(HR)_and_administration"
                                    >
                                        Human Resources (HR) and Administration
                                    </option>
                                    <option value="finance_and_accounting">
                                        Finance and Accounting
                                    </option>
                                    <option value="sales_marketing">
                                        Sales Marketing
                                    </option>
                                    <option value="operations_and_supply_chain">
                                        Operations and Supply Chain
                                    </option>
                                    <option value="customer_service_and_support">
                                        Customer Services and Support
                                    </option>
                                    <option
                                        value="information_technology(IT)_and_risk_management"
                                    >
                                        Information Technology (IT) and Risk
                                        Management
                                    </option>
                                    <option value="legal_and_compliance">
                                        Legal and Compliance
                                    </option>
                                    <option
                                        value="product_development_and_engineering"
                                    >
                                        Product Development and Engineering
                                    </option>
                                    <option value="procurement_and_purchasing">
                                        Procurement and Purchasing
                                    </option>
                                    <option
                                        value="business_development_and_strategy"
                                    >
                                        Business Development and Strategy
                                    </option>
                                    <option
                                        value="public_relation(PR)and_communications"
                                    >
                                        Public Relation (PR) and Communications
                                    </option>
                                    <option value="research_and_development(R&D)">
                                        Research and Development (R&D)
                                    </option>
                                    <option value="executive_leadership">
                                        Executive Leadership
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Job Title"
                                name="job_title"
                            />
                        </div>
                        <div class="col-md-6 col-lg-6 mt-2">
                            <label for="">Certifications</label>
                            <input
                                type="file"
                                id="input-file"
                                class="filepond"
                                name="certifications[]"
                                multiple
                                accept="image/*"
                            />
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="row justify-content-end">
            <div class="col-md-3 py-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@section('styles')
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"        rel="stylesheet"

    />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <style>
      .iti{
        width: 100%;
      }
    </style>
  @endsection

  @section('script')
  
  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
     // -----Country Code Selection
     let tel_primary = document.querySelector('#mobile_code_primary')
        window.intlTelInput(tel_primary, {
            initialCountry: "ng",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });

    tel_primary.addEventListener("blur", function () {
        const fullPhoneNumber = primary.getNumber(); // Gets the full number in E.164 format
        console.log("Full phone number:", fullPhoneNumber);
        document.querySelector('input[name="primary_phone_number"]').value = fullPhoneNumber
    });

</script>
<script>
  
// We register the plugins required to do 
// image previews, cropping, resizing, etc.
FilePond.registerPlugin(
  FilePondPluginFileValidateType,
  FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageResize,
  FilePondPluginImageTransform,
  FilePondPluginImageEdit
);

// Select the file input and use 
// create() to turn it into a pond
FilePond.create(
  document.querySelector('input'),
  {
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

// How to use with Pintura Image Editor:
// https://pqina.nl/pintura/docs/latest/getting-started/installation/filepond/
</script>
</x-layouts.admin-app>