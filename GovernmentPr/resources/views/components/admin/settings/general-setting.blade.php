<x-layouts.admin-app>
<x-validation-errors class="alert" alert />
@include('shared.feedback')
<div class="container-xxl">

    <form action="{{ route('admin.store-settings') }}" method="post" enctype="multipart/form-data">
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
                        <label for="">Logo Dark Mode</label>
                        <input type="file" id="input-file" name="logo_dark_mode" multiple accept="image/*" />
                    </div> <!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Logo Light Mode</label>
                        <input type="file" id="input-file" name="logo_light_mode" multiple accept="image/*" />
                    </div> <!--end col-->
                    <div class="col-md-6">
                        <label for="">Favicon</label>
                        <input type="file" id="input-file" name="logo_light_mode" accept="image/*" />
                    </div>
                    <div class="col-md-6 mt-3">
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
                        <input id="mobile_code_primary" type="tel" class="form-control" placeholder="Primary Phone Number">
                        <input type="hidden" name="primary_phone_number">
                    </div>
                    <div class="col-md-6">
                    <input id="mobile_code_secondary" type="tel" class="form-control" placeholder="Secondary Phone Number">
                    <input type="hidden" name="secondary_phone_number">
                    </div>
                    <div class="col-md-12 mt-2">
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
                            <div id="editor"></div>
                            <textarea name="about_company" id="" style="display: none"></textarea>
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
                    <div class="col-md-6 mt-2">
                        <label for="">Certifications</label>
                        <input type="file" id="input-file" name="certifications" multiple accept="image/*" />
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
                <div class="col-md-3">
                        <label for="">Brand Colour</label>
                        <input type="color" class="form-control"
                            placeholder="Primary and Secondary colour(e.g HEX,RGB)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Brochures</label>
                        <input type="file" id="input-file" name="brochures" multiple accept="image/*" />
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                    <label for="">Corporate Presentation</label>
                    <input type="file" id="input-file" name="corporate_presentation" multiple accept="image/*" />
                                </div><!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                    <label for="">Promotional Photos</label>
                    <input type="file" id="input-file" name="promotional_photos" multiple accept="image/*" />
                                </div><!--end col-->
                    <div class="col-md-6 col-lg-6 mt-2">
                        <label for="">Promotional Videos</label>
                        <input type="file" id="input-file" name="promotional_videos" multiple accept="image/*" />
                     </div><!--end col-->
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
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
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
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // -----Country Code Selection
        let tel_primary = document.querySelector('#mobile_code_primary')
        let tel_secondary = document.querySelector('#mobile_code_secondary')
        window.intlTelInput(tel_primary, {
            initialCountry: "ng",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });
        window.intlTelInput(tel_secondary, {
            initialCountry: "ng",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
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
        let inputElement = document.querySelectorAll('input[type="file"]')
        console.log(inputElement);
        inputElement.forEach(element => {
            let pond = FilePond.create(element, {
                storeAsFile: true,
            });
        });
    </script>
    <script>
        let about_company = document.querySelector('textarea[name="about_company"]')
        let content = quill.root
        console.log(content);
        
        quill.on('text-change', () => {
            console.log(content.innerHTML);
            about_company.value = content.innerHTML
        });
    </script>
    @endsection
</x-layouts.admin-app>