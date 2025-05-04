<x-layouts.admin-app>
    @section('PageTitle', $pageTitle)
    @section('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <link rel="stylesheet" href="{{ asset('adminAssets/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminAssets/css/dataTables.bootstrap.min.css') }}">
        <style>
            #map{
                height: 500px;
                width: 100%;
            }
        </style>
        <style>
        table {
            width: 100%; /* Allows table to take full width of the container */
            border-collapse: collapse;
            table-layout: auto; /* Ensures columns stretch based on content */
        }
        th, td {
            /* border: 1px solid #ddd; */
            text-align: left;
            padding: 8px;
            vertical-align: top; /* Aligns content to the top for better readability */
            min-width: 250px;
        }
        th {
            /* background-color: #f4f4f4; */
            font-weight: bold;
            font-size: 14px;
        }
        td, th {
            word-wrap: break-word; /* Allows long words to break onto the next line */
            overflow-wrap: break-word;
        }
        .w-450{
            min-width: 500px;
        }
        </style>

    @endsection
    @section('scripts')
    <!-- DataTables and Bootstrap JavaScript -->
    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- map -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- XLSX Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        let getMap = async () => {
            const url = new URL("{{ route('admin.get-all-companies') }}");
            console.log(url.toString());

            try {
                const response = await fetch(url.toString());
                if (!response.ok) throw new Error("Failed to fetch data");
                const resp = await response.json();
                console.log(resp);

                // Initialize the map
                const map = L.map("map").setView([9.0820, 8.6753], 6);

                // Add OpenStreetMap tile layer
                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    attribution: "&copy; OpenStreetMap contributors",
                }).addTo(map);

                function parseDMS(dmsString) {
                    const regex = /(\d+)[º°](\d+)'(\d+(?:\.\d+)?)"?([NSEW])/;
                    const [, degrees, minutes, seconds, direction] = dmsString.match(regex);
                    return dmsToDecimal(
                        parseFloat(degrees),
                        parseFloat(minutes),
                        parseFloat(seconds),
                        direction
                    );
                }
                const locations = resp.filter(
                (company) => company.latitude !== null && company.longitude !== null && company.latitude >= -90 && company.latitude <= 90 && company.longitude >= -180 && company.longitude <= 180) // Filter out invalid entries
                .map((company) => ({
                    lat: company.latitude ?? 0,     // Use the value or default to 0
                    lng: company.longitude ?? 0,   // Use the value or default to 0
                    title: company.company_name || 'Unknown Company ', // Default title if name is missing
                    address: company.state+company.address || 'No Address Provided', // Include address if available
                    description: company.industry || 'No Description Available', // Include description if available
                }));

                console.log(locations);
                
                let location =[
                    // { lat: 4.21494, lng: -46.40625, title: "Afdin Petroleum lpg" },
                    // { lat: 11.994609, lng: 8.58308, title: "Petrogas" },
                    // { lat: 6.5244, lng: 3.3792, title: "Lagos" },
                    // { lat: 7.3775, lng: 3.9470, title: "Ibadan" },
                    // { lat: 11.1247, lng: 7.7254, title: "Zaria" },
                    // { lat: 9.1099, lng: 7.4042, title: "Gwarinpa" },
                    // { lat: 9.0228, lng: 7.5702, title: "Nyanya" },
                ];

                // Add markers to the map
                locations.forEach((location) => {
                    L.marker([location.lat, location.lng])
                        .addTo(map)
                        .bindPopup(
                            `
                                <b>${location.title}</b><br>
                                <i>Address:</i> ${location.address}<br>
                                <i>Description:</i> ${location.description}
                            `
                        )
                        .openPopup();
                });
            } catch (error) {
                console.error("Error loading map data:", error);
            }
        };

        // Call the function
        getMap();
    </script>
    <!-- end map -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const country = 'Nigeria'; // Replace with the desired country
            fetch(`/admin/companies-state/?country=${encodeURIComponent(country)}`)
            .then(response => response.json())
            .then(data => {
                console.log(`Companies Data for ${country}:`, data);
                // Process and display the data as needed
                const companies = data.companies;
                console.log(`Companies for ${country}:`, companies);
                const carouselInner = document.querySelector('.carousel-inner');
                companies.forEach((company, index) => {
                    console.log(`Company ${index + 1}:`, company);
                    // Create carousel items dynamically
                    // Create a new carousel item every 5 companies
                    
                    if (index % 4 === 0) {
                        const carouselItem = document.createElement('div');
                        carouselItem.classList.add('carousel-item');
                        if (index === 0) carouselItem.classList.add('active');
                        const row = document.createElement('div');
                        row.classList.add('row');
                        carouselItem.appendChild(row);
                        carouselInner.appendChild(carouselItem);
                    }

                    const activeRow = carouselInner.querySelector('.carousel-item.active:last-child .row') || carouselInner.querySelector('.carousel-item:last-child .row');
                    const col = document.createElement('div');
                    col.classList.add('col-md-3', 'mb-3');
                    const card = document.createElement('div');
                    card.classList.add('card');
                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card-body');
                    const cardTitle = document.createElement('h5');
                    cardTitle.classList.add('card-title');
                    cardTitle.textContent = company.state;
                    const cardCompanyCount = document.createElement('p');
                    cardCompanyCount.classList.add('card-text');
                    cardCompanyCount.textContent = `Number of Companies: ${company.company_count}`;
                    cardBody.appendChild(cardTitle);
                    cardBody.appendChild(cardCompanyCount);
                    card.appendChild(cardBody);
                    col.appendChild(card);
                    activeRow.appendChild(col);
                });
            })
            .catch(error => {
                console.error(`Error fetching companies data for ${country}:`, error);
            });
        });
    </script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Integrate DataTables library for advanced features
            let companyTable = $('#companiesTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
                language: {
                    search: "Filter records:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries"
                }
            });
        // Add any additional DataTables configuration here
            // For example, you can set the page length, order, etc.
            companyTable.page.len(10).draw(); // Set default page length to 10
            companyTable.order([0, 'asc']).draw(); // Order by the first column (index 0) in ascending order

    });
    </script>
    <!-- excel table -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const downloadExcelButton = document.getElementById('downloadExcelButton');
            downloadExcelButton.addEventListener('click', async function (e) {
            e.preventDefault();

            try {
                // Fetch all records from the server
                const response = await fetch("{{ route('admin.get-all-companies') }}");
                if (!response.ok) throw new Error("Failed to fetch data");
                const allRecords = await response.json();

                // Prepare data for Excel
                const headers = [
                "Company Name", "Industry Sector", "Email", "Website", "Primary Phone", "Secondary Phone",
                "Country", "State/Province", "Address", "Longitude", "Latitude", "Date Of Est.",
                "Number of Employees", "Industrial Process Used", "Assigned Manager", "Position",
                "Contact Personnel", "Policy Alignment", "RECP Strategy", "Housekeeping Measures",
                "Unit Process Intervention", "Problem Summary", "Solution Summary", "Product Recovery Measures",
                "Performance Improvement Areas", "Innovative Changes", "Water Conservation Methods",
                "Water Sources", "Waste Management Methods", "RECP Measures", "Willingness to Collaborate",
                "Contact Company", "Validation Status"
                ]; // Ensure headers match the fields in the data array
                const data = [headers];

                allRecords.forEach(record => {
                data.push([
                    record.company_name || "N/A",
                    record.industry || "N/A",
                    record.email || "N/A",
                    record.website || "N/A",
                    record.primary_phone_number || "N/A",
                    record.secondary_phone_number || "N/A",
                    record.country || "N/A",
                    record.state || "N/A",
                    record.address || "N/A",
                    record.longitude || "N/A",
                    record.latitude || "N/A",
                    record.date_of_establishment || "N/A",
                    record.number_of_employees || "N/A",
                    record.industry_process || "N/A",
                    record.operations_manager || "N/A",
                    record.position || "N/A",
                    `${record.contact_person_full_name || "N/A"} (${record.contact_person_position || "N/A"})`,
                    record.contact_person_contact_number || "N/A",
                    record.policy_alignment || "N/A",
                    record.recp_strategy || "N/A",
                    record.housekeeping_measures || "N/A",
                    record.unit_process_intervention || "N/A",
                    record.problem_summary || "N/A",
                    record.solution_summary || "N/A",
                    record.product_recovery_measures || "N/A",
                    record.performance_improvement_areas || "N/A",
                    record.innovative_changes || "N/A",
                    record.water_conservation_methods || "N/A",
                    record.water_sources || "N/A",
                    record.waste_management_methods || "N/A",
                    record.recp_measures || "N/A",
                    record.willingness_to_collaborate || "N/A",
                    record.contact_company || "N/A",
                    record.validation_status || "N/A"
                ]);
                });

                // Generate Excel file
                const workbook = XLSX.utils.book_new();
                const worksheet = XLSX.utils.aoa_to_sheet(data);
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Companies Report');

                const excelFile = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });
                const blob = new Blob([s2ab(excelFile)], { type: 'application/octet-stream' });

                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'Companies_Report.xlsx';
                link.click();
            } catch (error) {
                console.error("Error downloading Excel file:", error);
            }
            });

            function s2ab(s) {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
            }
        });
    </script>
    @endsection
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Header -->
                <div class="header-title">
                    <h3>{{ $pageTitle }}</h3>
                    <p>Welcome to the Companies Report section. Here you can find detailed analytics and insights about various companies.</p>
                </div>
                <!-- End Page Header -->
            </div>
        </div>
        <div id="companyCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner"></div>
            <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="" id="map"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Managed Companies</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <a href="" class="btn btn-success" id="downloadExcelButton">
                                    <i class="fas fa-file-excel"></i> Download Excel
                                </a>
                            </div>
                        </div><!--end row-->
                    </div><!--end card-header-->
                    <div class="pt-0 guard-table-section">
                    <div class="container-fluid">
                        <div class="overflow-x-auto rounded-lg" style="overflow-x:auto;">
                                <table class="min-w-full table table-light table-bordered table-auto" id="companiesTable">
                                    <thead class="table-dark text-center align-middle" style="position: sticky; top: 0; z-index: 1;">
                                        <tr>
                                            <th rowspan="2" class="">Company Name</th>
                                            <th rowspan="2">Industry Sector</th>
                                            <th rowspan="2">Email</th>
                                            <th rowspan="2">Website</th>
                                            <th colspan="2" class="text-center">Phone No.</th>
                                            <th rowspan="2">Country</th>
                                            <th rowspan="2">State/Province</th>
                                            <th rowspan="2">Address</th>
                                            <th colspan="2" class="text-center">GPS</th>
                                            <th rowspan="2">Date Of Est.</th>
                                            <th rowspan="2">Number of Employees</th>
                                            <th rowspan="2">Industrial Process Used</th>
                                            <th rowspan="2">Assigned Environmental/Operations/Energy Manager</th>
                                            <th rowspan="2">Position within the Organization</th>
                                            <th rowspan="2">Contact Personnel</th>
                                            <th colspan="7" class="text-center">Industrial Sector Objectives</th>
                                            <th rowspan="2" class="w-450">Does the company foresee RECP processes increasing resource use efficiency?</th>
                                            <th rowspan="2" class="w-450">It has been proven that the application of RECP methodologies provides several economic, environmental and social benefits</th>
                                            <th colspan="8" class="w-450">Gains from RECP methodologies</th>
                                            <th rowspan="2" class="w-450">Company's policy alignment with RECP strategy</th>
                                            <th colspan="6" class="">Policy Areas</th>
                                            <th colspan="9" class="">Objective Areas</th>
                                            <th rowspan="2" class="w-450">Good housekeeping measures usually consist of simple actions which can be implemented with little or no capital expenditure, it can also result in high savings of water, raw materials and finished products</th>
                                            <th colspan="5" class="w-450">Housekeeping Options</th>
                                            <th rowspan="2" class="w-450">This option describes a specific process intervention opportunity that best fit into your production process based on your local condition. However, this may not necessarily be and advantager for every industry within your sector. In making this critical desition, it is important to consider the following: Cost Benefit analysis, Improvements in product quality, Increase in overall yield. Please rate how best you understand your internal production process?</th>
                                            <th rowspan="2" class="w-450">Unit processes requiring intervention</th>
                                            <th rowspan="2" class="w-450">Problem summary and solutions</th>
                                            <th rowspan="2" class="w-450">Some of the most important industrial materials are the input raw materials and finished products. These products must be properly utilized with the aid of RECP, in order to save money and prevent threat to public health. Do your process support product recovery measures?</th>
                                            <th colspan="8">Product Recovery Measures Used</th>
                                            <th rowspan="2" class="w-450">Equipment/Machinery and Training can save costly reworking, product loss and money, while reducing negative environmental impact</th>
                                            <th rowspan="2" class="w-450">Changing the composition of the product can reduce the amount of waste resulting from the product use.</th>
                                            <th rowspan="2" class="w-450">Areas that can enhance work performance in your sector</th>
                                            <th rowspan="2" class="w-450">Innovative changes in product that can help to improve the environmental compatibility of product life cycle</th>
                                            <th rowspan="2" class="w-450">Reducing/eliminating hazardous materials that enter the production process can help to eliminate the discharge/emission of toxic waste into the environment</th>
                                            <th rowspan="2" class="w-450">List 3-5 modern technology you may likely recommend for your operation, if any.</th>
                                            @foreach ($all_water_questions as $question)
                                                <th rowspan="2">{{ $question->question ?? '' }}</th>
                                            @endforeach
                                            <th colspan="{{ $total_water_conservation_methods }}" class="w-450">Water Conservation Opportunities Beneficial to Company Process</th>
                                            <th colspan="{{ $total_water_sources }}" class="w-450">Water Sources</th>
                                            <th colspan="3">Water Usage Data</th>
                                            <th rowspan="2" class="w-450">Air Emission Quality Management. Emission of greenhouse gases and other toxic chemicals are the major causes of air pollution and climate change.</th>
                                            <th rowspan="2" class="w-450">It is very important for industries to put measures in a place to control air pollution and minimize climate change</th>
                                            <th colspan="9" class="w-450">Please select the options that you apply or wish that you apply in you local process condition</th>
                                            <th rowspan="2">Unit Process of Water Balance</th>
                                            <th rowspan="2">Unit process of chemical balance</th>
                                            <th rowspan="2">Unit process/ Solid or semi-solid</th>
                                            <th rowspan="2">Unit process and raw materials susceptible to air pollution</th>
                                            <th rowspan="2">Describe your Process flow/Unit operations</th>
                                            <th rowspan="2" class="w-450">List any hazardous material that can be reduced, eliminated, or replaced with less hazardous material in your process system, if any.</th>
                                            <th colspan="{{ ($total_materials*2) + ($total_chemicals*2) }}">Resources Consumed in the Last Two Years</th>
                                            <th rowspan="2">Quantity of waste generated by the company in year</th>
                                            <th rowspan="2">Wastewater Analysis</th>
                                            <th rowspan="2">Emission /Air Quality & Noise</th>
                                            <th colspan="6">Method used for managing waste by company</th>
                                            <th colspan="15">RECP measures in place in company.</th>
                                            <th rowspan="2">willingness to collaborate with the project for an in-depth assessment and study of adopting the RECP methodology</th>
                                            <th rowspan="2">Contact Company</th>
                                            <th rowspan="2">_validation_status</th>
                                        </tr>
                                        <tr>
                                            <th>Primary</th>
                                            <th>Secondary</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th class="">To develop policy and regulation that deliver economic, human and environmental health gains to your company.</th>
                                            <th class="">To offer standard accreditation and certification capacity building ISO 15000 and 14000 series to your enterprise</th>
                                            <th class="w-450">To impact RECP technical training (including all support resource packages, toolkits and learning materials) to various staff and employees of Nigerian's industrial and manufacturing sector</th>
                                            <th class="w-450">To strengthen internal capacity of RECP training anD related technical assistance to you enterprise on a long term and ultimately commercial sustainable basis</th>
                                            <th class="w-450">To create awareness and demonstrate pilot programs on RECP to improve productive use of manufacturing inputs (water, chemicals, & materials), waste/emission minimization in your industrial sector within the scope of regulatory compliance and increased competitiveness </th>
                                            <th class="w-450">To increase the up-take of RECP implementation and associated investment through a limited financial investment assistance package for participating RECP pilot companies</th>
                                            <th class="w-450">To transfer the cost-saving benefits of RECP to your industrial manufacturing sector through increased access to financial mechanisms (commercial & Government) needed for the financing of RECP projects</th>
                                            <th class="">Reduction / energy saving by at least 20% in 1 year.</th>
                                            <th class="">40% reduction of Co2 in 1.5 years</th>
                                            <th class="">Increase in your water productivity by 100% in 1 year</th>
                                            <th class="">Increase in your material productivity by 50% in 1 year</th>
                                            <th class="">Obtain an ISO 14000 series certification</th>
                                            <th class="">Increase in overall financial annual savings</th>
                                            <th class="">Improved customeer satisfaction</th>
                                            <th>Sustainability</th>
                                            <th>Quality Policy</th>
                                            <th>Environmental Policy</th>
                                            <th>Health & Safety Policy</th>
                                            <th>Human Resource Policy</th>
                                            <th>Data Protection Policy</th>
                                            <th>Cooperate Social Responsibility Policy</th>
                                            <th>Business Growth</th>
                                            <th>Customer Satisfaction</th>
                                            <th>Material Optimization</th>
                                            <th>Waste Minimization</th>
                                            <th>Measurable & Timely Targets</th>
                                            <th>Innovation</th>
                                            <th>Sustainability</th>
                                            <th>Employee Management</th>
                                            <th>Market Expansion</th>
                                            <th>Attitudinal change (negligence attitude).</th>
                                            <th>Good operating practices(personel practices, waste segregation etc.).</th>
                                            <th>Workers motivation.</th>
                                            <th>Improved Workplace management.</th>
                                            <th>Others</th>
                                            <th>High temperature recovery method</th>
                                            <th>Using standard measuring equipment</th>
                                            <th>Adequate container seal to prevent spill</th>
                                            <th>Filtration</th>
                                            <th>Using correct material ratio</th>
                                            <th>Adequate chemical/ material storage facility</th>
                                            <th>Recycling</th>
                                            <th>Extended Producer Responsibility(EPR)</th>
                                            @foreach ($all_water_conservation_methods as $method)
                                                <th>{{ $method->method ?? '' }}</th>
                                            @endforeach
                                            @foreach ($all_water_sources as $source)
                                                <th>{{ $source->sources ?? '' }}</th>
                                            @endforeach
                                            @if($all_water_sources->count() > 0)
                                            @php
                                            $currentYear = date('Y');
                                            for ($i = 0; $i < 3; $i++) {
                                                $year = $currentYear - $i;
                                                echo "<th>{$year}</th>";
                                            }
                                            @endphp
                                            @endif
                                            <th>To minimize the use of generating sets</th>
                                            <th>Switch off electrical appliances when not in use</th>
                                            <th>Use energy efficient devices</th>
                                            <th class="w-450">Substitute high yield pollutant raw materials with other less polluting materials</th>
                                            <th class="w-450">Fuel substituting (petrol and diesel can be replaced with compressed Natural Gas, solar and wind energy)</th>
                                            <th>Maintain the unit process/equipment to minimize emission to pollutants</th>
                                            <th>Diluting the air pollutants</th>
                                            <th class="w-450">Plant flowers and trees around the premises to reduce large number of pollutants in the air</th>
                                            <th>Others</th>
                                            @foreach ($all_materials as $material)
                                            @php
                                            $lastTwoYears = [date('Y'), date('Y') - 1];
                                            @endphp
                                                <th>{{ $material->material }} (in Year {{ $lastTwoYears['0'] }})</th>
                                                <th>{{ $material->material }} (in Year {{ $lastTwoYears['1'] }})</th>
                                            @endforeach
                                            @foreach ($all_chemicals as $chemical)
                                            @php
                                            $lastTwoYears = [date('Y'), date('Y') - 1];
                                            @endphp
                                                <th>{{ $chemical->name }} (in Year {{ $lastTwoYears['0'] }})</th>
                                                <th>{{ $chemical->name }} (in Year {{ $lastTwoYears['1'] }})</th>
                                            @endforeach
                                            <th>Landfill</th>
                                            <th>Recycling</th>
                                            <th>Incineration</th>
                                            <th>Composting</th>
                                            <th>Waste segregation</th>
                                            <th>Waste Symbiosis</th>
                                            <th>Water recycling flow</th>
                                            <th>Wastewater treatment</th>
                                            <th>Monitoring of the quality and quantity of wastewater</th>
                                            <th>Using production equipment or technology that supports energy-efficient production</th>
                                            <th>Use of waste for internal energy sources</th>
                                            <th>Installation of lighting sensors</th>
                                            <th>Utilization of sunlight for daytime lighting</th>
                                            <th>Use of environmentally friendly/renewable energy</th>
                                            <th>Recording of fuel usage</th>
                                            <th>Minimize the use of generating sets</th>
                                            <th>Substitute high yield pollutant raw materials with other less polluting materials</th>
                                            <th>Maintain the unit process/equipment to minimize emission of pollutants</th>
                                            <th>Diluting the air pollutants</th>
                                            <th>Plant flowers and trees around the premises to reduce large number of pollutants in the air</th>
                                            <th>Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach($companies as $company)
                                            <tr>
                                                <td>{{ $company->company_name ?? 'N/A' }}</td>
                                                <td>{{ $company->industry ?? 'N/A' }}</td>
                                                <td>{{ $company->email ?? 'N/A' }}</td>
                                                <td>{{ $company->website ?? 'N/A' }}</td>
                                                <td>{{ $company->primary_phone_number ?? 'N/A' }}</td>
                                                <td>{{ $company->secondary_phone_number ?? 'N/A' }}</td>
                                                <td>{{ $company->country ?? 'N/A' }}</td>
                                                <td>{{ $company->state ?? 'N/A' }}</td>
                                                <td>{{ $company->address ?? 'N/A' }}</td>
                                                <td>{{ $company->longitude ?? 'N/A' }}</td>
                                                <td>{{ $company->latitude ?? 'N/A' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($company->date_of_establishment)->format('l, d F Y') ?? 'N/A' }}</td>
                                                <td>{{ $company->number_of_employees ?? 'N/A' }}</td>
                                                <td>{{ $company->industry_process ?? 'N/A' }}</td>
                                                <td>{{ $company->operations_manager ?? 'N/A' }}</td>
                                                <td>{{ $company->position ?? 'N/A' }}</td>
                                                <td>
                                                    <div>{{ $company->contact_person_full_name ?? 'N/A' }}</div>
                                                    <div>{{ $company->contact_person_position ?? 'N/A' }}</div>
                                                    <div>{{ $company->contact_person_contact_number ?? 'N/A' }}</div> 
                                                </td>
                                                @php
                                                $industrial_sector_objectives = [
                                                    'To develop policy and regulation that deliver economic, human and environmental health gains to your company.',
                                                    'To offer standard accreditation and certification capacity building ISO 15000 and 14000 series to your enterprise',
                                                    'To impact RECP technical training (including all support resource packages, toolkits and learning materials) to various staff and employees of Nigerian\'s industrial and manufacturing sector',
                                                    'To strengthen internal capacity of RECP training anD related technical assistance to you enterprise on a long term and ultimately commercial sustainable basis',
                                                    'To create awareness and demonstrate pilot programs on RECP to improve productive use of manufacturing inputs (water, chemicals, & materials), waste/emission minimization in your industrial sector within the scope of regulatory compliance and increased competitiveness ',
                                                    'To increase the up-take of RECP implementation and associated investment through a limited financial investment assistance package for participating RECP pilot companies',
                                                    'To transfer the cost-saving benefits of RECP to your industrial manufacturing sector through increased access to financial mechanisms (commercial & Government) needed for the financing of RECP projects'
                                                ];
                                                @endphp
                                                @foreach ($industrial_sector_objectives as $objective)
                                                    @php
                                                        // Fetch the objective value from the database
                                                        $objectiveValue = DB::table('recp_areas_of_benefits')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('benefit_title', $objective)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $objectiveValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                @php
                                                $gains_from_recp = [
                                                    'Reduction / energy saving by at least 20% in 1 year.',
                                                    '40% reduction of Co2 in 1.5 years',
                                                    'Increase in your water productivity by 100% in 1 year',
                                                    'Increase in your material productivity by 50% in 1 year',
                                                    'Obtain an ISO 14000 series certification',
                                                    'Increase in overall financial annual savings',
                                                    'Improved customeer satisfaction'
                                                ];
                                                @endphp
                                                @foreach ($gains_from_recp as $gain)
                                                    @php
                                                        // Fetch the gain value from the database
                                                        $gainValue = DB::table('recp_human_and_environmental_health_benefits')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('environmental_benefit_title', $gain)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $gainValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                @php
                                                $company_policies = [
                                                    'Quality Policy',
                                                    'Environmental Policy',
                                                    'Health & Safety Policy',
                                                    'Human Resource Policy',
                                                    'Data Protection Policy',
                                                    'Cooperate Social Responsibility Policy'
                                                    ];
                                                $company_objectives = [
                                                    'Business Growth',
                                                    'Customer Satisfaction',
                                                    'Material Optimization',
                                                    'Waste Minimization',
                                                    'Measurable & Timely Targets',
                                                    'Innovation',
                                                    'Sustainability',
                                                    'Employee Management',
                                                    'Market Expansion'
                                                ];
                                                @endphp
                                                @foreach ($company_policies as $policy)
                                                    @php
                                                        // Fetch the policy value from the database
                                                        $policyValue = DB::table('policies')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('policy_title', $policy)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $policyValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                @foreach ($company_objectives as $objective)
                                                    @php
                                                        // Fetch the objective value from the database
                                                        $objectiveValue = DB::table('company_objectives')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('objective_title', $objective)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $objectiveValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                @php
                                                $attitudinal_changes = [
                                                    'Attitudinal change (negligence attitude).',
                                                    'Good operating practices(personel practices, waste segregation etc.).',
                                                    'Workers motivation.',
                                                    'Improved Workplace management.',
                                                    'Others'
                                                ];
                                                @endphp

                                                @foreach ($attitudinal_changes as $change)
                                                    @php
                                                        // Fetch the change value from the database
                                                        $changeValue = DB::table('recp_house_keep_practices')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('practice_title', $change)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $changeValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                @php
                                                $unit_process_intervention = DB::table('recp_unit_of_processes')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->get();
                                                @endphp
                                                <td>
                                                    <ol>
                                                        @foreach ($unit_process_intervention as $process)
                                                            <li>{{ $process->unit_process_title ?? 'N/A' }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                @php
                                                $problem_solution = DB::table('recp_problem_and_solutions')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->get();
                                                @endphp
                                                <td>
                                                    <ol>
                                                        @foreach ($problem_solution as $solution)
                                                            <li>
                                                                <dl>
                                                                    <dt>Problem Summary</dt>
                                                                    <dd>
                                                                        {{ $solution->problem_title ?? 'N/A' }}
                                                                    </dd>
                                                                    <dt>Solution</dt>
                                                                    <dd>
                                                                        {{ $solution->solution_title ?? 'N/A' }}
                                                                    </dd>
                                                                </dl>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td>N/A</td>
                                                @php
                                                $product_recovery_measures = [
                                                    'High temperature recovery method',
                                                    'Using standard measuring equipment',
                                                    'Adequate container seal to prevent spill',
                                                    'Filtration',
                                                    'Using correct material ratio',
                                                    'Adequate chemical/ material storage facility',
                                                    'Recycling',
                                                    'Extended Producer Responsibility(EPR)',
                                                ];
                                                @endphp
                                                @foreach ($product_recovery_measures as $measure)
                                                    @php
                                                        // Fetch the measure value from the database
                                                        $measureValue = DB::table('recp_product_recovery_methods')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('recovery_method_title', $measure)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $measureValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                @php
                                                $performance_improvement_areas = DB::table('recp_areas_of_improvements')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->get();
                                                @endphp
                                                <td>
                                                    <ol>
                                                        @foreach ($performance_improvement_areas as $key_area)
                                                            <li>{{ $key_area->area_title ?? 'N/A' }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                @php
                                                $innovative_change = DB::table('recp_innovation_areas')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->get();
                                                @endphp
                                                <td>
                                                    <ol>
                                                        @foreach ($innovative_change as $key_area)
                                                            <li>{{ $key_area->innovation_area_title ?? 'N/A' }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                @foreach($all_water_questions as $question)
                                                    @php
                                                        // Fetch the question value from the database
                                                        $questionValue = DB::table('company_water_questions')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('questionID', $question->questionId)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $questionValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                @foreach ($all_water_conservation_methods as $method)
                                                    @php
                                                        // Fetch the method value from the database
                                                        $methodValue = DB::table('company_water_conservation_opportunities')
                                                                        ->where('companyID', $company->company_id)
                                                                        ->where('conservation_id', $method->WaterConservationMethodId)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $methodValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                @foreach ($all_water_sources as $source)
                                                    @php
                                                        // Fetch the source value from the database
                                                        $sourceValue = DB::table('company_water_sources')
                                                                        ->where('companyID', $company->company_id)
                                                                        ->where('WaterSources_id', $source->WaterSourcesId)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $sourceValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                @if($all_water_sources->count() > 0)
                                                @php
                                                $currentYear = date('Y');
                                                for ($i = 0; $i < 3; $i++) {
                                                    $year = $currentYear - $i;
                                                    $sumValue = DB::table('water_stock_movements')
                                                                    ->where('company_id', $company->company_id)
                                                                    ->whereYear('movement_date', $year)
                                                                    ->where('movement_type', 'out')
                                                                    ->sum('volume');
                                                    echo "<td>{$sumValue}</td>";
                                                }
                                                @endphp
                                                @endif
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                    @php
                                                    $waterBalance = DB::table('water_stock_movements')
                                                        ->where('company_id', $company->company_id) // Filter by company ID
                                                        ->selectRaw('
                                                            SUM(CASE WHEN movement_type = "in" THEN volume ELSE 0 END) -
                                                            SUM(CASE WHEN movement_type = "out" THEN volume ELSE 0 END) as balance
                                                        ')
                                                        ->value('balance'); // Retrieve the balance directly as a scalar value

                                                    // If there's no result, ensure the balance defaults to 0
                                                    $waterBalance = $waterBalance ?? 0
                                                    @endphp
                                                <td>
                                                    {{ $waterBalance }} (ltr)
                                                </td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>
                                                    <ol>
                                                    @php
                                                    $company_operation_types = DB::table('operation_types')
                                                        ->where('company_id', $company->company_id)
                                                        ->orderBy('sequence_order', 'ASC')
                                                        ->get(['operation_type_id', 'name']);
                                                    @endphp
                                                    @foreach ($company_operation_types as $operation_type)
                                                        <li>
                                                            {{ $operation_type ? $operation_type->name : 'No' }}
                                                        </li>
                                                    @endforeach
                                                    </ol>
                                                </td>
                                                <td>N/A</td>
                                                @foreach ($all_materials as $material)
                                                    @php
                                                    $lastTwoYears = [date('Y'), date('Y') - 1];
                                                    foreach ($lastTwoYears as $year) {
                                                        $materialUsage = \App\Models\stock_movement::where('companyID', $company->company_id) // Filter by company ID
                                                            ->where('materialID', $material->materialID) // Filter by material ID
                                                            ->whereYear('movement_date', $year) // Filter by year
                                                            ->where('movement_type', 'out') // Only "out" movements
                                                            ->sum('quantity'); // Sum the quantity for the given filters

                                                        // Display the result
                                                        echo "<td>{$materialUsage}</td>";
                                                    }

                                                    @endphp
                                                @endforeach
                                                @foreach ($all_chemicals as $chemical)
                                                    @php
                                                    $lastTwoYears = [date('Y'), date('Y') - 1];
                                                    foreach ($lastTwoYears as $year) {
                                                        $chemicalUsage = DB::table('chemical_stock_movements')
                                                            ->where('company_id', $company->company_id) // Filter by company ID
                                                            ->where('chemical_id', $chemical->chemical_id) // Filter by chemical ID
                                                            ->whereYear('movement_date', $year) // Filter by year
                                                            ->where('movement_type', 'out') // Only "out" movements
                                                            ->sum('quantity'); // Sum the quantity for the given filters

                                                        // Display the result
                                                        echo "<td>{$chemicalUsage}</td>";
                                                    }

                                                    @endphp
                                                @endforeach
                                                <th>N/A</th>
                                                <th>N/A</th>
                                                <th>N/A</th>
                                                @php
                                                $waste_management_methods = [
                                                    'Landfill',
                                                    'Recycling',
                                                    'Incineration',
                                                    'Composting',
                                                    'Waste segregation',
                                                    'Waste Symbiosis',
                                                    ];
                                                @endphp
                                                @foreach ($waste_management_methods as $method)
                                                    @php
                                                        // Fetch the method value from the database
                                                        $methodValue = DB::table('recp_waste_management_methods')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('management_method_title', $method)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $methodValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                @php
                                                $recp_measures = [
                                                    'Water recycling flow',
                                                    'Waste water treatment.',
                                                    'Monitoring of the quality and quantity of wastewater',
                                                    'Using production equipment or technology that supports energy/resource-efficient production',
                                                    'Use of waste for internal energy sources',
                                                    'Installation of lighting sensor',
                                                    'Utilization of sunlight for daytime lighting',
                                                    'Use of enviromentally friendly/renewable energy',
                                                    'Recording of fuel usage',
                                                    'Minimize the use of generating sets',
                                                    'Substitute high yield pollutant raw materials with other less polluting materials',
                                                    'Maintain the unit process/equipment to minimize emission of pollutants',
                                                    'Diluting the air pollutants',
                                                    'Plant flowers and trees around the premises to reduce large number of pollutants in the air',
                                                    'Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy)'
                                                ];
                                                @endphp
                                                @foreach ($recp_measures as $measure)
                                                    @php
                                                        // Fetch the measure value from the database
                                                        $measureValue = DB::table('recp_waste_reduction_measures')
                                                                            ->where('companyID', $company->company_id)
                                                                            ->where('waste_reduction_title', $measure)->first();
                                                    @endphp

                                                    <td>
                                                        {{ $measureValue ? '✔️' : '❌' }}
                                                    </td>
                                                @endforeach
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>
    </div>
</x-layouts.admin-app>
