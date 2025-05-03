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
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
            vertical-align: top; /* Aligns content to the top for better readability */
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        td, th {
            word-wrap: break-word; /* Allows long words to break onto the next line */
            overflow-wrap: break-word;
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
        // Add event listener for row click to display company details
        function CompanyData(company_name, industry, email, primary_phone_number, country, state, city, address, zip_code, date_of_establishment, number_of_employees, created_at) {
            this.company_name = company_name;
            this.industry = industry;
            this.email = email;
            this.primary_phone_number = primary_phone_number;
            this.country = country;
            this.state = state;
            this.city = city;
            this.address = address;
            this.zip_code = zip_code;
            this.date_of_establishment = date_of_establishment;
            this.number_of_employees = number_of_employees;
            this.created_at = created_at;
        }

        // Fetch company data from the server
        let companies = @json($companies);
        // Example: Display company names in the console
        console.log(`Companies full details:`, companies);
        
        companies.forEach(company => {
            console.log(`Company Name: ${company}`);
            
            const row = `
                <tr>
                    <td>${company->company_name ?? 'N/A' }}</td>
                    <td>${company->industry ?? 'N/A' }}</td>
                    <td>${company->email ?? 'N/A' }}</td>
                    <td>${company->website ?? 'N/A' }}</td>
                    <td>${company->primary_phone_number ?? 'N/A' }}</td>
                    <td>${company->secondary_phone_number ?? 'N/A' }}</td>
                    <td>${company->country ?? 'N/A' }}</td>
                    <td>${company->state ?? 'N/A' }}</td>
                    <td>${company->address ?? 'N/A' }}</td>
                    <td>${company->longitude ?? 'N/A' }}</td>
                    <td>${company->latitude ?? 'N/A' }}</td>
                    <td>${company->date_of_establishment ?? 'N/A' }}</td>
                    <td>${company->number_of_employees ?? 'N/A' }}</td>
                    <td>${company->industrial_process ?? 'N/A' }}</td>
                    <td>${company->environmental_manager ?? 'N/A' }}</td>
                    <td>${company->position ?? 'N/A' }}</td>
                    <td>${company->contact_person ?? 'N/A' }}</td>
                    <td>${company->objectives ?? 'N/A' }</td>
                    <td>${company->recp_foresee ?? 'N/A' }</td>
                    <td>${company->recp_benefits ?? 'N/A' }</td>
                    <td>${company->gains ?? 'N/A' }</td>
                    <td>${company->policy_objectives ?? 'N/A' }</td>
                    <td>${company->good_housekeeping ?? 'N/A' }</td>
                    <td>${company->process_intervention ?? 'N/A' }</td>
                    <td>${company->unit_process ?? 'N/A' }</td>
                    <td>${company->problem_solution ?? 'N/A' }</td>
                    <td>${company->product_recovery ?? 'N/A' }</td>
                    <td>${company->recovery_measures ?? 'N/A' }</td>
                    <td>${company->training_needs ?? 'N/A' }</td>
                    <td>${company->innovative_changes ?? 'N/A' }</td>
                    <td>${company->hazardous_materials ?? 'N/A' }</td>
                    <td>${company->water_usage ?? 'N/A' }</td>
                    <td>${company->air_emission ?? 'N/A' }</td>
                    <td>${company->waste_management ?? 'N/A' }</td>
                </tr>
            `;
            companyTable.clear()
            companyTable.row.add($(row)).draw();
        });
    });
    </script>
    <!-- excel table -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const downloadExcelButton = document.getElementById('downloadExcelButton');
            downloadExcelButton.addEventListener('click', function (e) {
                e.preventDefault();

                const table = document.getElementById('companiesTabl');
                const rows = Array.from(table.rows);
                const data = rows.map(row => Array.from(row.cells).map(cell => cell.innerText));

                const workbook = XLSX.utils.book_new();
                const worksheet = XLSX.utils.aoa_to_sheet(data);
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Companies Report');

                const excelFile = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });
                const blob = new Blob([s2ab(excelFile)], { type: 'application/octet-stream' });

                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'Companies_Report.xlsx';
                link.click();
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
    <div class="container mt-5">
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
                <div class="card">
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
                    <div class="card-body pt-0 guard-table-section">
                    <div class="container mx-auto">
                            <div class="overflow-x-auto shadow rounded-lg" style="overflow-x:auto;">
                                <table class="min-w-full bg-whit divide-y divide-gray-200 table table-bordered" id="companiesTabl">
                                    <thead class="bg-gray-100">
                                    <tr class="">
                                        <th rowspan="2">Company Name</th>
                                        <th rowspan="2">Industry Sector</th>
                                        <th rowspan="2">Email</th>
                                        <th rowspan="2">Website</th>
                                        <th colspan="2">Phone No.</th>
                                        <th rowspan="2">Country</th>
                                        <th rowspan="2">State/Province</th>
                                        <th rowspan="2">Address</th>
                                        <th colspan="2">Global Positioning system(GPS)</th>
                                        <th rowspan="2">Date Of Est.</th>
                                        <th rowspan="2">Number of Employees</th>
                                        <th rowspan="2">Industrial Process Used</th>
                                        <th rowspan="2">Assigned Environmental/Operations/Energy Manager</th>
                                        <th rowspan="2">Position within the Organization</th>
                                        <th rowspan="2">Contact Personel</th>
                                        <th colspan="7">Objectives for the benefit of industrial sector</th>
                                        <th rowspan="2">Does company foresee RECP processes increasing resource use efficiency ( energy productivity, materials productivity and water productivity ) while reducing pollution ( carbon intensity, wastewater intensity and waste intensity)?</th>
                                        <th rowspan="2">It has been proven that the application of RECP methodologies provides several economic, environmental and social benefits</th>
                                        <th colspan="8">List the gains company foresee becasue of the willingness to apply the RECP methodologies.</th>
                                        <th rowspan="2">For effective management and performance, the company's policy should be in line with continuous application of an integrated preventive environmental strategy applied to products, process and servises, targeted to the overall increase in efficiency and reduction of risk to human and environment.</th>
                                        <th colspan="6">The area(s) that company's policy and objective should reflect</th>
                                        <th rowspan="2">Good housekeeping measures usually consist of simple actions which can be implemented with little or no capital expenditure, it can also result in high savings of water, raw materials and finished products</th>
                                        <th colspan="5">good housekeeping options that company practice</th>
                                        <th rowspan="2">specific process intervention opportunity that best fit into company production process based on local condition.</th>
                                        <th rowspan="2">Because you best understand your process, kindly list all the unit process in your company that needs intervention, if any. Kindly use a seperate sheet of paper and attach as annex if need be.</th>
                                        <th rowspan="2">Summarize the problem and suggest any possible/ appropriate solution</th>
                                        <th rowspan="2">Some of the most important industrial materials are the input raw materials and finished products. These products must be properly utilized with the aid of RECP, in order to save money and prevent threat to public health. Do your process support product recovery measures?</th>
                                        <th rowspan="2">Some of the most important industrial materials are the input raw materials and finished products. These products must be properly utilized with the aid of RECP, in order to save money and prevent threat to public health. Do your process support product recovery measures?/Yes</th>
                                        <th rowspan="2">Some of the most important industrial materials are the input raw materials and finished products. These products must be properly utilized with the aid of RECP, in order to save money and prevent threat to public health. Do your process support product recovery measures?/No</th>
                                        <th rowspan="2">Select the product recovery measures that you use to intend to use?</th>
                                        <th colspan="8">Select the product recovery measures that you use to intend to use?</th>
                                        <th rowspan="2">Equipment/Machinery and Training can save costly reworking, product loss and money, while reducing negative environmental impact</th>
                                        <th rowspan="2">Changing the composition of the product can reduce the amount of waste resulting from the product use.</th>
                                        <th rowspan="2">List 3-5 training needs/areas that can enhance work performance in your sector</th>
                                        <th rowspan="2">State any innovative change in your product that can help to improve the environmental compatibility of your product life cycle</th>
                                        <th rowspan="2">Reducing/eliminating hazardous materials that enter the production process can help to eliminate the discharge/emission of toxic waste into the environment</th>
                                        <th rowspan="2">List 3-5 modern technology you may likely recommend for your operation, if any.</th>
                                        <th rowspan="2">Most industrial manufacturing process need water in almost every stage. Is the statement true for your sector?</th>
                                        <th rowspan="2">Using water more efficiently guarantees less costly production and ensures against water shortages that could interrupt production</th>
                                        <th rowspan="2">Select the water conservation opportunity that is applicable or beneficial to your process.</th>
                                        <th colspan="8">Select the water conservation opportunity that is applicable or beneficial to your process</th>
                                        <th colspan="{{ $total_water_sources }}">Indicate your water source(s) and quantity used in the last 3 years</th>
                                        <th colspan="3">Water Usage</th>
                                        <th rowspan="2">Air Emission Quality Management. Emission of greenhouse gases and other toxic chemicals are the major causes of air pollution and climate change.</th>
                                        <th rowspan="2">It is very important for industries to put measures in a place to control air pollution and minimize climate change</th>
                                        <th colspan="9">Please select the options that you apply or wish that you apply in you local process condition</th>
                                        <th rowspan="2">Unit Process of Water Balance</th>
                                        <th rowspan="2">Unit process of chemical balance</th>
                                        <th rowspan="2">Unit process/ Solid or semi-solid</th>
                                        <th rowspan="2">Unit process and raw materials susceptible to air pollution</th>
                                        <th rowspan="2">Describe your Process flow/Unit operations</th>
                                        <th rowspan="2">List any hazardous material that can be reduced, eliminated, or replaced with less hazardous material in your process system, if any.</th>
                                        <th colspan="{{ $total_materials*2 }}">Resources Consumed in the Last Two Years</th>
                                        <th rowspan="2">Quantity of waste generated by the company in year</th>
                                        <th rowspan="2">Wastewater Analysis</th>
                                        <th rowspan="2">Emission /Air Quality & Noise</th>
                                        <th colspan="4">Method used for managing waste by company</th>
                                        <th colspan="">RECP measures in place in company.</th>
                                        <th rowspan="2">willingness to collaborate with the project for an in-depth assessment and study of adopting the RECP methodology</th>
                                        <th rowspan="2">Contact Company</th>
                                        <th rowspan="2">_validation_status</th>
                                    </tr>
                                    <tr>
                                        <th>Primary</th>
                                        <th>Secondary</th>
                                        <th>Longitude(Lon)</th>
                                        <th>Latitude(Lat)</th>
                                        <th>To develop policy and regulation that deliver economic, human and environmental health gains to your company.</th>
                                        <th>Retrieving data. Wait a few seconds and try to cut or copy again.</th>
                                        <th>To impact RECP technical training (including all support resource packages, toolkits and learning materials) to various staff and employees of Nigerian's industrial and manufacturing sector</th>
                                        <th>To strengthen internal capacity of RECP training anD related technical assistance to you enterprise on a long term and ultimately commercial sustainable basis</th>
                                        <th>To create awareness and demonstrate pilot programs on RECP to improve productive use of manufacturing inputs (water, chemicals, & materials), waste/emission minimization in your industrial sector within the scope of regulatory compliance and increased competitiveness </th>
                                        <th>To increase the up-take of RECP implementation and associated investment through a limited financial investment assistance package for participating RECP pilot companies</th>
                                        <th>To transfer the cost-saving benefits of RECP to your industrial manufacturing sector through increased access to financial mechanisms (commercial & Government) needed for the financing of RECP projects</th>
                                        <th>Reduction / energy saving by at least 20% in 1 year.</th>
                                        <th>40% reduction of Co2 in 1.5 years</th>
                                        <th>Increase in your water productivity by 100% in 1 year</th>
                                        <th>Increase in your material productivity by 50% in 1 year</th>
                                        <th>Obtain an ISO 14000 series certification</th>
                                        <th>Increase in overall financial annual savings</th>
                                        <th>Improved customeer satisfaction</th>
                                        <th>Others</th>
                                        <th>Material optimization</th>
                                        <th>Waste minimization</th>
                                        <th>Measurable and timely targets </th>
                                        <th>Innovation</th>
                                        <th> Sustainability</th>
                                        <th>Human/environmental health</th>
                                        <th>Attitudinal change (negligence attitude)</th>
                                        <th>Improved workplace management</th>
                                        <th>Good operating practices (personnel practices, waste segregation etc.)</th>
                                        <th>Workers motivation</th>
                                        <th>Others</th>
                                        <th>High temperature recovery method</th>
                                        <th>Using correct material ratio</th>
                                        <th>Using standard measuring equipment</th>
                                        <th>Adequate chemical/material storage facility</th>
                                        <th>Adequate container seal to prevent spill</th>
                                        <th>Recycling</th>
                                        <th>Filtration</th>
                                        <th>Others</th>
                                        <th>Establishment of a serious recycling measure</th>
                                        <th>Using brooms or cloths to remove as much solid or semi-solid waste as possible from the floors or machinery before rinsing them down with water</th>
                                        <th>Dry clean-up method</th>
                                        <th>Installation of self-closing taps and water meters to control water consumption</th>
                                        <th>Timely identification and repair of broken pipes and leakages</th>
                                        <th>Prevention of loose valves or hoses from being left running without attention</th>
                                        <th>The use of automatic shutoffs/flow limits where necessary</th>
                                        <th>Others</th>
                                        @foreach ($all_water_sources as $source)
                                            <th>{{ $source->sources }}</th>
                                        @endforeach
                                        <th>Water Consumption (Year 1)</th>
                                        <th>Water Consumption (Year 2)</th>
                                        <th>Water Consumption (Year 3)</th>
                                        <th>To minimize the use of generating sets</th>
                                        <th>Switch off electrical appliances when not in use</th>
                                        <th>Use energy efficient devices</th>
                                        <th>Substitute high yield pollutant raw materials with other less polluting materials</th>
                                        <th>Fuel substituting (petrol and diesel can be replaced with compressed Natural Gas, solar and wind energy)</th>
                                        <th>Maintain the unit process/equipment to minimize emission to pollutants</th>
                                        <th>Diluting the air pollutants</th>
                                        <th>Plant flowers and trees around the premises to reduce large number of pollutants in the air</th>
                                        <th>Others</th>
                                        @foreach ($all_materials as $material)
                                            <th>{{ $material->material }} (Year 1)</th>
                                            <th>{{ $material->material }} (Year 2)</th>
                                        @endforeach
                                        <th>Landfill</th>
                                        <th>Recycling</th>
                                        <th>Incineration</th>
                                        <th>Composting</th>
                                        <th>Water recycling flow</th>
                                        <th>Wastewater treatment</th>
                                        <th>Monitoring of the quality and quantity of wastewater</th>
                                        <th>Using production equipment or technology that supports energy-efficient production</th>
                                        <th>Use of waste for internal energy sources</th>
                                        <th>Installation of lighting sensors</th>
                                        <th>Utilization of sunlight for daytime lighting</th>
                                        <th>Use of environmentally friendly/renewable energy</th>
                                        <th>Recording of fuel usage</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-whit divide-y divide-gray-200">
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
                                            <td>{{ $company->contact_person ?? 'N/A' }}</td>
                                            <!-- Add other fields as necessary -->
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
