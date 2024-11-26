<x-layouts.admin-app>
@section('PageTitle', 'Register Company')
<div class="container-xxl"> 
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
                <input type="text" class="form-control" placeholder="Company name">
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Industry</label>
                    <select name="" id="industry" class="form-select">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Example: company@domain.com">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Primary Phone Number</label>
                    <input type="tel" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Secondary Phone Number</label>
                    <input type="tel" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Contact Person</label>
                    <input type="tel" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Website Address</label>
                    <input type="url" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">Number Of Employees.</label>
                    <input type="url" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <label for="">Date of Establishment</label>
                <input class="form-control" type="date" id="">
            </div>
        </div>
        </x-slot>
    </x-form-section>
<!-- End Basic Profile -->
<x-section-border />
<!-- Location Details -->
<x-form-section>
    <x-slot name="title">
        {{ __('Company\'s Loaction') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your company\'s address information.') }}
    </x-slot>
    <x-slot name="form">
        <div class="row">
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
                    <select name=""  id="lga" class="form-select select-lga cities" id="cityId">
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
    </x-slot>
</x-form-section>
</div>

@section('scripts')
<script src="{{ asset('adminAssets/js/location.js') }}"></script>
<script src="{{ asset('adminAssets/js/industry.js') }}"></script>
@endsection
</x-layouts.admin-app>