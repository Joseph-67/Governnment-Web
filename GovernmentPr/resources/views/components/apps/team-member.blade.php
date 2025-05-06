<x-layouts.admin-app>
<div class="container-xl py-lg-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Team Member Information</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" id="mobile_code_primary" class="form-control" placeholder="Enter Phone Number" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="executive_management">Executive Management</option>
                                        <option value="human_resource">Human Resource</option>
                                        <option value="finance_and_accounting">Finance and Accounting</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sales">Sales</option>
                                        <option value="operations">Operations</option>
                                        <option value="information_technology">Information Technology</option>
                                        <option value="product_development_engineering">Product Development/Engineering</option>
                                        <option value="customer_service_support">Customer Service/Support</option>
                                        <option value="legal_and_compliance">Legal and Compliance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" id="job_title" class="form-control" placeholder="Enter Job Title" name="job_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" id="profile_picture" class="filepond" name="profile_picture" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certifications">Certifications</label>
                                    <input type="file" id="certifications" name="certifications[]" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card mt-4">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" id="mobile_code_primary" class="form-control" placeholder="Enter Phone Number" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="executive_management">Executive Management</option>
                                        <option value="human_resource">Human Resource</option>
                                        <option value="finance_and_accounting">Finance and Accounting</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sales">Sales</option>
                                        <option value="operations">Operations</option>
                                        <option value="information_technology">Information Technology</option>
                                        <option value="product_development_engineering">Product Development/Engineering</option>
                                        <option value="customer_service_support">Customer Service/Support</option>
                                        <option value="legal_and_compliance">Legal and Compliance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" id="job_title" class="form-control" placeholder="Enter Job Title" name="job_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" id="profile_picture" class="filepond" name="profile_picture" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certifications">Certifications</label>
                                    <input type="file" id="certifications" name="certifications[]" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" id="mobile_code_primary" class="form-control" placeholder="Enter Phone Number" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="executive_management">Executive Management</option>
                                        <option value="human_resource">Human Resource</option>
                                        <option value="finance_and_accounting">Finance and Accounting</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sales">Sales</option>
                                        <option value="operations">Operations</option>
                                        <option value="information_technology">Information Technology</option>
                                        <option value="product_development_engineering">Product Development/Engineering</option>
                                        <option value="customer_service_support">Customer Service/Support</option>
                                        <option value="legal_and_compliance">Legal and Compliance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" id="job_title" class="form-control" placeholder="Enter Job Title" name="job_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" id="profile_picture" class="filepond" name="profile_picture" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certifications">Certifications</label>
                                    <input type="file" id="certifications" name="certifications[]" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" id="mobile_code_primary" class="form-control" placeholder="Enter Phone Number" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="executive_management">Executive Management</option>
                                        <option value="human_resource">Human Resource</option>
                                        <option value="finance_and_accounting">Finance and Accounting</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sales">Sales</option>
                                        <option value="operations">Operations</option>
                                        <option value="information_technology">Information Technology</option>
                                        <option value="product_development_engineering">Product Development/Engineering</option>
                                        <option value="customer_service_support">Customer Service/Support</option>
                                        <option value="legal_and_compliance">Legal and Compliance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" id="job_title" class="form-control" placeholder="Enter Job Title" name="job_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" id="profile_picture" class="filepond" name="profile_picture" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certifications">Certifications</label>
                                    <input type="file" id="certifications" name="certifications[]" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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