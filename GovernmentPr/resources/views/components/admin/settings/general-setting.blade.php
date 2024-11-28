<x-layouts.admin-app>
<div class="container-xxl">
    <form action="{{ route('admin.store-settings') }}" method="post">
        @csrf
        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Company\'s Profile') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your company\'s profile information.') }}
            </x-slot>

            <x-slot name="form">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Company name" name="company_name">
                    </div>
                    <div class="col-md-7 mt-2">
                        <input type="text" class="form-control" placeholder="Slogan" aria-label="Last name" name="slogan">
                    </div>
                    <div class="col-md-5 mt-2">
                        <input type="text" class="form-control" placeholder="Abbreviation" name="abbreviation">
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Logo Dark Mode</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="d-grid">
                                    <p class="text-muted">Upload your logo image in dark mode here, Please click "Upload
                                        Image" Button.</p>
                                    <div
                                        class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                    </div>
                                    <input type="file" id="input-file" name="logo_darkmode" accept="image/*"
                                        onchange={handleChange()} hidden />
                                    <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                                </div>
                            </div><!--end card-body-->
                        </div>
                    </div> <!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Logo Light Mode</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-grid">
                                <p class="text-muted">Upload your logo image in light mode here, Please click "Upload
                                    Image" Button.</p>
                                <div
                                    class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                </div>
                                <input type="file" id="input-file" name="logo_lightmode" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                            </div>
                        </div><!--end card-body-->
                    </div> <!--end col-->
                    <div class="col-md-6">
                        <label for="">Favicon</label>
                        <input type="file" class="form-control" name="Favicon">
                    </div>
                    <div class="col-md-6">
                        <label for="">Date of Establishment</label>
                        <input class="form-control" type="date" id="">
                    </div>


            </x-slot>
        </x-form-section>
        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Contact Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your contact information and email address.') }}
            </x-slot>

            <x-slot name="form">
                <div class="row">
                    <div class="col-md-6">
                        <input id="mobile_code_primary" type="tel" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email Address" name="email">
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="" id="" class="form-select countries" id="countryId">
                                <option value="" selected disabled> Choose... </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label for="">State</label>
                            <select name="" id="" class="form-select states" onchange="toggleLGA(this);" id="stateId">
                                <option value="" selected disabled> Choose... </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label for="">City</label>
                            <select name="" id="lga" class="form-select select-lga cities" id="cityId">
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
                    <div class="col-md-4 mt-2">
                        <input type="url" class="form-control" placeholder="Instagram Links" name="instagram_links">
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="url" class="form-control" placeholder="Facebook Links" name="facebook_links">
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="url" class="form-control" placeholder="Twitter Links" name="twitter_links">
                    </div>
                    <div class="col-md-12 mt-2">
                        <input type="url" class="form-control" placeholder="Websites URL" name="websites_URL">
                    </div>
                </div>
            </x-slot>
        </x-form-section>
        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Company Overview') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your company\'s overview information.') }}
            </x-slot>

            <x-slot name="form">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Mission Statement" name="mission_statement">
                    </div>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Vision Statement" name="vision_statement">
                    </div>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Core values" name="core_values">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="">About Company</label>
                        <div class=" pt-0">
                            <div id="editor">
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong></p>
                                <p><br /></p>
                            </div>
                        </div><!--end card-body--> 
                </div>
            </x-slot>
        </x-form-section>
        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Business Details') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your business details.') }}
            </x-slot>
            <x-slot name="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <label for="">Industry</label>
                            <select name="company_type" id="industry" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label for="">Organization Type</label>
                            <select name="company_type" id="" class="form-select">
                                <option value="" disabled selected> Choose... </option>
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                                <option value="n.g.o">N.G.O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="number" class="form-control" placeholder="Size(No.of employees)" min="1" name="size">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" placeholder="Registration details(TIN/VAT)" name="registration_details">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" class="form-control" name="Certification">
                    </div>
                </div>
            </x-slot>
        </x-form-section>


        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Branding and Media Details') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your branding and media details.') }}
            </x-slot>

            <x-slot name="form">
                <div class="row">
                    <div class="col-md-7">
                        <label for="">Brand Colour</label>
                        <input type="color" class="form-control"
                            placeholder="Primary and Secondary colour(e.g HEX,RGB)">
                    </div>
                    <div class="col-md-6 col-lg-6 mt-2">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Brochures</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-grid">
                                <p class="text-muted">Upload your company's brochures here.</p>
                                <div
                                    class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                </div>
                                <input type="file" id="input-file" name="brochures" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                            </div>
                        </div><!--end card-body-->
                    </div> <!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Corporate Presentation</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-grid">
                                <p class="text-muted">Upload your corporate presentation here.</p>
                                <div
                                    class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                </div>
                                <input type="file" id="input-file" name="coroperate_presentation" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                            </div>
                        </div><!--end card-body-->
                    </div> <!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Promotional Photos</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-grid">
                                <p class="text-muted">Upload your company's promotional photos here.</p>
                                <div
                                    class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                </div>
                                <input type="file" id="input-file" name="promotional_photos" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                            </div>
                        </div><!--end card-body-->
                    </div> <!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Promotional Videos</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-grid">
                                <p class="text-muted">Upload your company's promotional videos here.</p>
                                <div
                                    class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                </div>
                                <input type="file" id="input-file" name="promotional_videos" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                            </div>
                        </div><!--end card-body-->
                    </div> <!--end col-->
                </div>
            </x-slot>
        </x-form-section>
        <div class="row justify-content-end">
            <div class="col-md-3 py-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
    @section('styles')
    <link rel="stylesheet" href="{{asset('adminAssets/libs/quill/quill.snow.css')}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    @endsection
    @section('scripts')
    <script src="{{asset('adminAssets/js/pages/file-upload.init.js')}}"></script>
    <script src="{{asset('adminAssets/libs/quill/quill.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/form-editor.init.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="{{ asset('adminAssets/js/location.js') }}"></script>
    <script src="{{ asset('adminAssets/js/industry.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"></script>
    <script>
        // -----Country Code Selection
        let tel_primary = document.querySelector('#mobile_code_primary')
        let tel_secondary = document.querySelector('#mobile_code_secondary')
        let tel_contact = document.querySelector('#mobile_code_contact')
        window.intlTelInput(tel_primary, {
            initialCountry: "ng",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
        window.intlTelInput(tel_contact, {
            initialCountry: "ng",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
    </script>
    @endsection
</x-layouts.admin-app>