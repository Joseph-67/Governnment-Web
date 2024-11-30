<x-layouts.admin-app>
@section('PageTitle', 'Register Company')
@section('styles')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
@endsection
<div class="container-xxl"> 
    <h2>RECP Registration</h2>
    <p>"Improving Nigerian's Industrial Energy Performance and Resource Efficient Cleaner Production through Programmatic Approaches and the Promotion of Innovatin in Clean Technology Solutions" is set to achieve the following objectives.</p>
    <x-validation-errors class="alert" alert />
    @include('shared.feedback')
    <form action="{{route('admin.store-company')}}" method="post">
        @csrf
    <!-- Basic Profile -->
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('General Knowledge of Nigeria IEE RECP Concept/Benefit') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Please select area(s) of benefit to your company.') }}
        </x-slot>
        <x-slot name="form">
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Develop policy and regulation that deliver economic, humanand environmental health gain to your company." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Develop policy and regulation that deliver economic, humanand environmental health gain to your company. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Develop policy and regulation that deliver economic, humanand environmental health gain to your company." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects. </label>
                </div>
            </div>
        </div>
        </x-slot>
    </x-form-section>
<!-- End Basic Profile -->
<x-section-border />
    <!-- Basic Profile -->
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('Human and Enviromental Health/Business Benefits') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Please select/or list the gains you forsee for your company because of your willigness to apply the RECP methodologies.') }}
        </x-slot>
        <x-slot name="form">
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a minimum 20% reduction in energy consumption within one year." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a minimum 20% reduction in energy consumption within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.</label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Double your water productivity within one year." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Double your water productivity within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 50% increase in overall material productivity within one year." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 50% increase in overall material productivity within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve an increase in overall annual financial savings." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve an increase in overall annual financial savings. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Enhance customer satisfaction through improved products, services, and overall experience." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Enhance customer satisfaction through improved products, services, and overall experience. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management." name="aeas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management. </label>
                </div>
            </div>
        </div>
        </x-slot>
    </x-form-section>
<!-- End Basic Profile -->
<x-section-border />
</form>
</div>
</x-layouts.admin-app>