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
    <form action="{{route('admin.store-company-recp')}}" method="post">
        @csrf
        <input type="hidden" name="company_id" value="{{ $companyID }}">
    <!-- Basic Profile -->
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('General Knowledge of Nigeria IEE RECP Concept/Benefit') }}
        </x-slot>
        <x-slot name="description">
            {{ __("In Nigeria, Industrial Energy Efficiency (IEE) and Resource Efficiency and Cleaner Production (RECP) focus on optimizing energy and resource use while minimizing waste. These practices help businesses reduce costs, enhance sustainability, and lower environmental impacts. The benefits include cost savings, compliance with regulations, improved competitiveness, and positive contributions to Nigeria's economic growth and environmental protection. Adopting IEE and RECP strategies enables industries to operate more efficiently and sustainably, fostering a cleaner, greener future.") }}
        </x-slot>
        <x-slot name="form">
        <h5 class="">This Project</h5>
        <p> The initiative to enhance Nigeria's industrial energy performance and promote resource-efficient, cleaner production through programmatic approaches and the adoption of innovative, clean technology solutions aims to achieve the following objectives: </p>
        <p> <i>Select the area(s) of utmost benefit to your company</i> </p>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Develop policy and regulation that deliver economic, humanand environmental health gain to your company." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Develop policy and regulation that deliver economic, humanand environmental health gain to your company. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Develop policy and regulation that deliver economic, humanand environmental health gain to your company." name="areas_of_company_benefit[]">
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
        <x-section-border />
        <h5 class="mt-3">Human and Enviromental Health/Business Benefits</h5>
        <p> It has been proven that applying RECP methodologies yields numerous economic, environmental, and social benefits. </p>
        <p> <i>Please select/or list the gains you forsee for your company because of your willigness to apply the RECP methodologies.</i> </p>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a minimum 20% reduction in energy consumption within one year." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a minimum 20% reduction in energy consumption within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 40% reduction in CO<sub>2</sub> emissions within 18 months.</label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Double your water productivity within one year." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Double your water productivity within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve a 50% increase in overall material productivity within one year." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve a 50% increase in overall material productivity within one year. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve an increase in overall annual financial savings." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve an increase in overall annual financial savings. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Enhance customer satisfaction through improved products, services, and overall experience." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Enhance customer satisfaction through improved products, services, and overall experience. </label>
                </div>
            </div>
            <div class="col-md-12 mt-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management." name="areas_of_company_benefit[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management. </label>
                </div>
            </div>
        </div>
        <x-section-border />
        <h5 class="mt-3">Innovation</h5>
        <div class="row mb-2">
            <div class="col-md-12 mt-2">
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
        </x-slot>
    </x-form-section>

<x-section-border />
<!-- Basic Profile -->
<x-form-section submit="">
    <x-slot name="title">
        {{ __('Resource Efficiency & Cleaner Production Opportunities') }}
    </x-slot>
    <x-slot name="description">
        {{ __('
            Resource Efficiency and Cleaner Production (RECP) focus on optimizing the use of resources while minimizing waste and environmental impacts throughout production processes. By adopting these strategies, industries can enhance productivity, reduce costs, and achieve sustainability goals.
            ') }}
    </x-slot>
    <x-slot name="form">
        <h5>Good Housekeeping</h5>
        <p>Good housekeeping measures typically involve simple attitude changes that require minimal or no capital investment. These actions can lead to significant savings in water, raw materials, and finished products.</p>
        <p><i>Please select the good housekeeping practices implemented in your company.</i></p>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Attitudinal change (negligence attitude)." name="house_keeping[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Attitudinal change (negligence attitude). </label>
                </div>
            </div>
            <div class="col-md-12 mt-2">
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
            <div class="col-md-12 mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="Workers motivation." name="house_keeping[]">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Workers motivation. </label>
                </div>
            </div>
        </div>
        <x-section-border />
        <h5 class="mt-3">Process Specific Optimization</h5>
        <p>This option outlines a specific process intervention opportunity tailored to your production process and local conditions. When making this critical decision, it is essential to consider the following:</p>
        <ul>
            <li>Cost-Benefit analysis</li>
            <li>Improvements in product quality</li>
            <li>Increase in overall yield</li>
        </ul>
        <div class="row mb-2">
        <div class="col-md-12 mt-2">
            <div class="col-md-8">
                <label for=""> List Unit Processes Requiring Intervention (if applicable) </label>
                </div>
                <div class="row mt-1">
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
        <x-section-border />
        <h5 class="mt-3">Process Waste Reduction Measures</h5>
        <p> Select all applicable RECP waste reduction measures currently implemented in your company </p>
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
        <p class = "mt-2"> Select all waste management and disposal methods used in your company. </p>
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
        <x-section-border />
        <h5 class="mt-3">Product Recovery Measures</h5>
        <p> Key industrial materials include raw materials and finished products. Proper utilization of these products is essential to save costs and protect public health. </p>
        <p> <i>Select product recovery measures.</i> </p>
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