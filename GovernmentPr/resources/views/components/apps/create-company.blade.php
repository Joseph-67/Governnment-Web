<x-layouts.admin-app>
@section('PageTitle', 'Register Company')
@section('styles')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
@endsection
<div class="container-xxl"> 
    <x-validation-errors class="alert" alert />
    @include('shared.feedback')
    <form action="{{route('admin.store-company')}}" method="post">
        @csrf
    <!-- Basic Profile -->
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
        </x-slot>
    </x-form-section>
<!-- End Basic Profile -->
<x-section-border />
<!-- Location Details -->
<x-form-section>
    <x-slot name="title">
        {{ __('Company\'s Location') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your company\'s address information.') }}
    </x-slot>
    <x-slot name="form">
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
    </x-slot>
    
</x-form-section>
<!-- End Location Details -->
<x-section-border />
<x-form-section>
    <x-slot name="title">
        {{ __('Company\'s Policy, Objectives and Target') }}
    </x-slot>
    <x-slot name="description">
        {{ __('For effective management and performance, the company\'s policy should deliver economic, human, and environmental health gains.') }}
    </x-slot>
    <x-slot name="form">
        <div class="row">
            <h5>Organization Policy</h5>
            <p>Select the area(s) your company policy imply.</p>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="quality policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Quality policy </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="environmental policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Enviromental Policy. </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="health and safety policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Health and safety policy. </label>
                </div>
            </div>
            <x-section-border />
            <div class="col-md-4 mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="human resource policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Human resource policy. </label>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="data protection policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Data protection policy. </label>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="cooperate social responsibility policy" name="policy[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Cooperate social reponsibility policy. </label>
                </div>
            </div>
            
            <h5 class="mt-4">Organization Objective</h5>
            <p>Select the area(s) your company objective imply.</p>
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
            <x-section-border />
            <div class="col-md-4 mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="hman enviromental health" name="objective[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Human environmental health. </label>
                </div>
            </div>
        </div>
    </x-slot>
</x-form-section>
<x-section-border />
<x-form-section>
    <x-slot name="title">
        {{ __('Additional Informations') }}
    </x-slot>
    <x-slot name="description">
        {{ __('') }}
    </x-slot>
    <x-slot name="form">
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

@section('scripts')
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