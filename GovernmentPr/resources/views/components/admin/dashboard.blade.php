<x-layouts.admin-app>
    @section('PageTitle', 'Dashboard')
    @section('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <style>
            #map {
                height: 500px;
                width: 100%;
            }
            #recp_compliance_trend_chart {
                position: relative;
            }

            #recp_compliance_trend_chart .chart-loader {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
                display: none;
            }

        </style>
    @endsection
    @section('scripts')
    <script src="{{ asset('adminAssets/js/industryjson.js') }}"></script>
    <script>
    console.log('Industries:', industries);

    const sectorsContainer = document.getElementById('companies-sector');

    // Generate sectors from industries keys
    let allSectors = Object.keys(industries).map(key => ({
        name: key,
        count: 0  // Total companies across all industries in this sector
    }));

    // Pick 5 random sectors
    const selectedSectors = allSectors.sort(() => 0.5 - Math.random()).slice(0, 5);

    // Track fetch completion
    let fetchPromises = [];

    // Fetch company counts for each industry in the selected sectors
    selectedSectors.forEach(sector => {
        const industriesInSector = industries[sector.name];
        // console.log(sector.name.toLowerCase(), "this sector kenna");
        
        if (!Array.isArray(industriesInSector)) {
            console.warn(`No industries found for sector: ${sector.name}`);
            return;
        }

        industriesInSector.forEach(industry => {
            const fetchPromise = fetch(`/admin/count/companies/${industry.toLowerCase()}`)
                .then(response => response.json())
                .then(data => {

                    const count = data.company_count || 0;
                    sector.count += count;
                })
                .catch(err => {
                    console.error(`Error fetching count for ${industry}:`, err);
                });

            fetchPromises.push(fetchPromise);
        });
    });

    // Once all fetches are done, render total counts per sector
    Promise.all(fetchPromises).then(() => {
        renderSectors();
    });
    const badgeColors = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary'];

    function renderSectors() {
    sectorsContainer.innerHTML = ''; // Clear previous results

    selectedSectors.forEach((sector, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';

        const nameSpan = document.createElement('span');
        nameSpan.textContent = sector.name;

        const countBadge = document.createElement('span');
        const badgeColor = badgeColors[index % badgeColors.length]; // Rotate colors
        countBadge.className = `badge ${badgeColor} rounded-pill`;
        countBadge.textContent = sector.count;

        li.appendChild(nameSpan);
        li.appendChild(countBadge);

        sectorsContainer.appendChild(li);
    });
}

</script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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
                    const [degrees, minutes, seconds, direction] = dmsString.match(regex);
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
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-company");
    const sectorSelect = document.getElementById("sector-filter");
    const regionSelect = document.getElementById("region-filter");
    const complianceSelect = document.getElementById("compliance-filter");
    const clearButton = document.getElementById("clear-filters");

    const tableBody = document.querySelector("tbody");
    const rows = Array.from(tableBody.querySelectorAll("tr"));
    const noResultRow = document.createElement("tr");
    noResultRow.innerHTML = `<td colspan="6" class="text-center text-danger">Company record doesn't exist</td>`;

    function getCellText(row, index) {
        return (row.cells[index]?.textContent || "").trim().toLowerCase();
    }

    function filterTable() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedSector = sectorSelect.value.trim().toLowerCase();
        const selectedRegion = regionSelect.value.trim().toLowerCase();
        const selectedCompliance = complianceSelect.value.trim().toLowerCase();

        tableBody.innerHTML = "";
        let found = false;

        rows.forEach(row => {
            const companyName = getCellText(row, 1);
            const industry = getCellText(row, 2);
            const region = getCellText(row, 3);
            const compliance = getCellText(row, 5);

            const matchesName = !searchTerm || companyName.includes(searchTerm);
            const matchesSector = !selectedSector || industry === selectedSector;
            const matchesRegion = !selectedRegion || region.includes(selectedRegion);
            const matchesCompliance = !selectedCompliance || compliance === selectedCompliance;

            // Show row if it matches all active filters
            if (matchesName && matchesSector && matchesRegion && matchesCompliance) {
                tableBody.appendChild(row);
                found = true;
            }
        });

        if (!found) {
            tableBody.appendChild(noResultRow);
        }
    }

    // Attach filter events
    searchInput.addEventListener("input", filterTable);
    sectorSelect.addEventListener("change", filterTable);
    regionSelect.addEventListener("change", filterTable);
    complianceSelect.addEventListener("change", filterTable);

    // Clear filters
    clearButton.addEventListener("click", function () {
        searchInput.value = "";
        sectorSelect.value = "";
        regionSelect.value = "";
        complianceSelect.value = "";
        tableBody.innerHTML = "";
        rows.forEach(row => tableBody.appendChild(row));
    });
});
</script>
<script>
    const sectorListJS = document.getElementById('sectorListJS');
    const legendContainerJS = document.querySelector("#sectorLegendJS .d-flex");
    const baseColorsJS = ['#0d6efd','#198754','#ffc107','#dc3545','#0dcaf0','#6c757d'];

    // Generate sectors from industries object, each industry will store its count
    let allSectorsJS = Object.keys(industries).map((key, idx) => ({
        name: key,
        industries: industries[key].map(ind => ({ name: ind, count: 0 })),
        baseColor: baseColorsJS[idx % baseColorsJS.length],
        totalCount: 0
    }));

    // Fetch counts per industry and calculate sector total
    function fetchSectorCountsJS() {
        const fetchPromises = [];
        allSectorsJS.forEach(sector => {
            sector.industries.forEach(industryObj => {
                const industry = industryObj.name;
                const promise = fetch(`/admin/count/companies/${industry.toLowerCase()}`)
                    .then(res => res.json())
                    .then(data => {
                        industryObj.count = data.company_count || 0;
                        sector.totalCount += industryObj.count;
                    })
                    .catch(err => console.error(`Error fetching ${industry}:`, err));
                fetchPromises.push(promise);
            });
        });
        return Promise.all(fetchPromises);
    }

    // Adjust color intensity based on fraction
    function adjustColorIntensity(hexColor, fraction) {
        const r = parseInt(hexColor.substring(1,3),16);
        const g = parseInt(hexColor.substring(3,5),16);
        const b = parseInt(hexColor.substring(5,7),16);
        const factor = 0.4 + 0.6 * fraction;
        return `rgb(${Math.min(255,Math.floor(r*factor))},${Math.min(255,Math.floor(g*factor))},${Math.min(255,Math.floor(b*factor))})`;
    }

    // Render sectors with spinners
    function renderSectorsJS() {
        sectorListJS.innerHTML = '';
        legendContainerJS.innerHTML = '';

        allSectorsJS.forEach(sector => {
            // --- Sector List Item ---
            const li = document.createElement('li');
            li.className = 'list-group-item';

            // Header
            const headerDiv = document.createElement('div');
            headerDiv.className = 'd-flex justify-content-between align-items-center sectorHeaderJS';
            headerDiv.setAttribute('data-sector', sector.name.toLowerCase());
            headerDiv.style.cursor = 'pointer';

            const nameSpan = document.createElement('span');
            nameSpan.textContent = sector.name;

            const badge = document.createElement('span');
            badge.className = 'badge rounded-pill d-flex align-items-center justify-content-center';
            badge.style.width = '50px';
            badge.style.height = '25px';
            badge.innerHTML = `<div class="spinner-border spinner-border-sm text-light" role="status"></div>`;

            headerDiv.appendChild(nameSpan);
            headerDiv.appendChild(badge);

            // Progress bar with spinner
            const progressDiv = document.createElement('div');
            progressDiv.className = 'progress mt-1';
            const progressBar = document.createElement('div');
            progressBar.className = 'progress-bar';
            progressBar.style.width = '100%';
            progressBar.innerHTML = `<div class="spinner-border spinner-border-sm text-light" role="status"></div>`;
            progressDiv.appendChild(progressBar);

            // Collapsible industries with spinners
            const ul = document.createElement('ul');
            ul.className = 'list-group mt-2 collapse';
            sector.industries.forEach(industryObj => {
                const indLi = document.createElement('li');
                indLi.className = 'list-group-item d-flex justify-content-between align-items-center small';
                indLi.textContent = industryObj.name;

                const indBadge = document.createElement('span');
                indBadge.className = 'badge rounded-pill d-flex align-items-center justify-content-center';
                indBadge.style.width = '40px';
                indBadge.style.height = '20px';
                indBadge.innerHTML = `<div class="spinner-border spinner-border-sm text-light" role="status"></div>`;

                indLi.appendChild(indBadge);
                ul.appendChild(indLi);
            });

            li.appendChild(headerDiv);
            li.appendChild(progressDiv);
            li.appendChild(ul);
            sectorListJS.appendChild(li);

            // --- Add legend item ---
            const legendDiv = document.createElement('div');
            legendDiv.className = 'd-flex align-items-center gap-2 px-2 py-1 rounded';
            legendDiv.style.backgroundColor = sector.baseColor;
            legendDiv.style.color = '#fff';
            legendDiv.textContent = sector.name;
            legendContainerJS.appendChild(legendDiv);
        });

        attachInteractionsJS();
    }

    // Update the modal with actual counts after fetching
    function updateSectorsWithCountsJS() {
        const maxCount = Math.max(...allSectorsJS.map(s => s.totalCount), 1);

        allSectorsJS.forEach(sector => {
            const li = sectorListJS.querySelector(`.sectorHeaderJS[data-sector="${sector.name.toLowerCase()}"]`).parentElement;
            const badge = li.querySelector('.badge');
            badge.textContent = sector.totalCount;

            const progressBar = li.querySelector('.progress-bar');
            const widthPercent = (sector.totalCount / maxCount) * 100;
            progressBar.style.width = widthPercent + '%';
            progressBar.style.backgroundColor = adjustColorIntensity(sector.baseColor, widthPercent/100);
            progressBar.textContent = sector.totalCount;
            progressBar.setAttribute('data-bs-toggle','tooltip');
            progressBar.setAttribute('data-bs-placement','top');
            progressBar.setAttribute('title', `${sector.totalCount} companies (${widthPercent.toFixed(1)}%)`);

            // Update industry badges
            const ul = li.querySelector('ul');
            sector.industries.forEach((industryObj, idx) => {
                const indBadge = ul.children[idx].querySelector('.badge');
                indBadge.textContent = industryObj.count;
                indBadge.style.backgroundColor = adjustColorIntensity(sector.baseColor, industryObj.count / maxCount);
            });
        });

        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(el => new bootstrap.Tooltip(el));
    }

    // Interactions: toggle collapse on header
    function attachInteractionsJS() {
        document.querySelectorAll(".sectorHeaderJS").forEach(header => {
            header.addEventListener('click', function() {
                const ul = this.nextElementSibling.nextElementSibling; // skip progress bar
                ul.classList.toggle('collapse');
            });
        });
    }

    // Initialize
    renderSectorsJS();
    fetchSectorCountsJS().then(() => updateSectorsWithCountsJS());
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let months = @json($recpTrendMonths);
            let seriesData = @json($recpTrendData);

            const chartContainer = document.querySelector("#recp_compliance_trend_chart");
            const loader = chartContainer.querySelector(".chart-loader");

            const chartOptions = {
                chart: {
                    type: 'area',
                    height: 350,
                    stacked: false,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: { enabled: true, delay: 150 },
                        dynamicAnimation: { enabled: true, speed: 500 }
                    }
                },
                series: [
                    { name: 'Compliant', data: seriesData.compliant },
                    { name: 'Review', data: seriesData.review },
                    { name: 'Non-Compliant', data: seriesData.non_compliant }
                ],
                xaxis: { categories: months },
                yaxis: { title: { text: 'Number of Companies' } },
                colors: ['#28a745', '#ffc107', '#dc3545'],
                tooltip: { shared: true, intersect: false },
                stroke: { curve: 'smooth' },
                legend: { position: 'top' }
            };

            const chart = new ApexCharts(chartContainer, chartOptions);
            chart.render();

            const dropdownItems = document.querySelectorAll(".recp-period");
            const dropdownButton = document.querySelector(".dropdown-toggle");

            dropdownItems.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();
                    const monthsCount = parseInt(this.getAttribute("data-months"));

                    // Update active class
                    dropdownItems.forEach(el => el.classList.remove("active"));
                    this.classList.add("active");

                    // Update button label
                    dropdownButton.innerHTML = `<i class="icofont-calendar fs-5 me-1"></i>${this.textContent} <i class="las la-angle-down ms-1"></i>`;

                    // Show loader
                    loader.style.display = "block";

                    // Fetch updated data from backend
                    fetch(`/admin/recp-trend-data?months=${monthsCount}`)
                        .then(res => res.json())
                        .then(data => {
                            chart.updateOptions({
                                xaxis: { categories: data.months },
                                series: [
                                    { name: 'Compliant', data: data.compliant },
                                    { name: 'Review', data: data.review },
                                    { name: 'Non-Compliant', data: data.non_compliant }
                                ]
                            }, true, true);

                            // Hide loader
                            loader.style.display = "none";
                        })
                        .catch(err => {
                            console.error("Error fetching RECP trend:", err);
                            loader.style.display = "none";
                        });
                });
            });
        });
    </script>

    @endsection
    @section('modals')
<!-- Modal -->
<div class="modal fade" id="companySectorModalJS" tabindex="-1" aria-labelledby="companySectorModalJSLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">All Sectors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul id="sectorListJS" class="list-group"></ul>

                <!-- Legend -->
                <div id="sectorLegendJS" class="mt-3">
                    <h6 class="fw-bold">Legend</h6>
                    <div class="d-flex flex-wrap gap-3"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="clearSectorJS" class="btn btn-outline-danger">Clear Selection</button>
            </div>
        </div>
    </div>
</div>
    @endsection
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Total Companies</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $activeCompanyCount }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-building h1 align-self-center mb-0 text-secondary"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+{{ $newCompanies }}</span>
                            New Companies This Week</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Active Companies</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $approvedCompanies }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-building h1 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+{{ $approvedCompaniesThisWeek }}</span>
                            Active This Week</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Non-Compliant</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $disapprovedCompanies }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-warning-triangle h1 align-self-center mb-0 text-danger"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">+{{ $disapprovedCompaniesThisWeek }}</span>
                            Non-Compliant This Week</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card border-warning">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Pending Audit</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $pendingCompanies }}</h3>
                            </div>
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-task-list h1 align-self-center mb-0 text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 text-truncate text-muted mt-3"><span class="text-warning">+{{ $pendingCompaniesThisWeek }}</span> Pending This Week</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">R.E.C.P Compliance Trend (Last 12 Months)</h4>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-calendar fs-5 me-1"></i>
                                        Last 12 Months<i class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item recp-period" href="#" data-months="3">Last 3 Months</a>
                                        <a class="dropdown-item recp-period" href="#" data-months="6">Last 6 Months</a>
                                        <a class="dropdown-item recp-period" href="#" data-months="12">Last 12 Months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="recp_compliance_trend_chart" class="apex-charts position-relative">
                            <!-- Loader overlay -->
                            <div class="chart-loader position-absolute top-50 start-50 translate-middle" style="z-index:10;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3 text-muted fs-13">
                            This chart shows the monthly compliance trend for Resource Efficient and Cleaner Production (R.E.C.P).
                        </p>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Companies by Sector</h4>
                    </div>
                    <div class="card-body">
                        <div id="companies_by_sector_chart" class="apex-charts mb-3"></div>
                        <ul class="list-group list-group-flush" id="companies-sector">
                        </ul>
                        <button type="button" class="btn btn-outline-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#companySectorModalJS">View Details</button>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-h-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">R.E.C.P Company List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-2 mb-3" method="GET" action="">
                            
                            <div class="col-md-3">
    <input type="text" id="search-company" class="form-control" placeholder="Search Company">
</div>

<div class="col-md-2">
    <select id="sector-filter" class="form-select">
        <option value="">All Sectors</option>
        <option value="Technology">Technology</option>
        <option value="Finance">Finance</option>
        <option value="Healthcare">Healthcare</option>
        <option value="Manufacturing">Manufacturing</option>
        <option value="Retail">Retail</option>
    </select>
</div>

<div class="col-md-2">
    <select id="region-filter" class="form-select">
        <option value="">All Regions</option>
        @php
            $regions = \App\Models\Company::getAllRegions();
        @endphp
        @foreach($regions as $region)
            <option value="{{ $region }}">{{ $region }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-2">
    <select id="compliance-filter" class="form-select">
        <option value="">All Compliance</option>
        <option value="Compliant">Compliant</option>
        <option value="Review">Review</option>
        <option value="Non-Compliant">Non-Compliant</option>
        <option value="N/A">N/A</option>
    </select>
</div>

<div class="col-md-3">
    <button type="button" id="clear-filters" class="btn btn-primary">Clear Filters</button>
</div>

                           
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Company Name</th>
                                        <th class="border-top-0">Industry</th>
                                        <th class="border-top-0">Region</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Compliance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $key = 1;
                                    @endphp
                                    @foreach($recpCompanies as $company)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>{{ $company->company->company_name }}</td>
                                        <td>{{ $company->company->industry }}</td>
                                        <td>{{ $company->company->country }}, {{ $company->company->state }}</td>
                                        <td>
                                            <span class="badge bg-{{ $company->company->status === 'active' ? 'success' : ($company->company->status === 'inactive' ? 'secondary' : 'warning') }}">
                                                {{ $company->company->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $company->status === 'approved' ? 'success' : ($company->status === 'pending' ? 'warning' : 'danger') }}">
                                                {{ $company->status === "approved" ? "Compliant" : ($company->status === "pending" ? "Review" : "Non-compliant") }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($recpCompanies->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No companies found matching the criteria.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $recpCompanies->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="card card-h-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Active Admins</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">User Name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Last Active</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activeAdmins as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td class="text-capitalize">{{ $user->last_name }} {{ $user->first_name }} {{ $user->other_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'N/A' }}</td>
                                        <td>
                                            @if ($user->isOnline())
                                                <span class="badge bg-success">
                                                    Online
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Last seen: {{ optional($user->lastSeen())->diffForHumans() ?? 'Unknown' }}
                                                </span>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p class="m-0 fs-12 fst-italic ps-2 text-muted">User activity updates every 30 minutes.</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
               <div class="col-lg-12">
                <div class="card card-h-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Active Users</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Company</th>
                                        <th class="border-top-0">Last Active</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach($activeUsers as $user)
                                <tr>
                                    <td>{{ $user->company_user_id }}</td>
                                    <td>{{ $user->user->first_name ?? '' }} {{ $user->user->last_name ?? '' }}</td>
                                    <td>{{ $user->user->email ?? 'N/A' }}</td>
                                    <td>{{ $user->company->company_name ?? 'N/A' }}</td>
                                    <td>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'N/A' }}</td>

                                    <td>
                                            @if ($user->isOnline())
                                                <span class="badge bg-success">
                                                    Online
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Last seen: {{ optional($user->lastSeen())->diffForHumans() ?? 'Unknown' }}
                                                </span>

                                            @endif
                                        </td>

                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p class="m-0 fs-12 fst-italic ps-2 text-muted">User activity updates every 5 minutes.</p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Company Compliance by Region</h4>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-location-pin fs-5 me-1"></i>
                                        Nigeria<i class="las la-angle-down ms-1"></i>
                                    </a>
                                @php
                                $regions = \App\Models\Company::getAllRegions();
                                @endphp
                                    <div class="dropdown-menu dropdown-menu-end">
                              @foreach($regions as $region)
                                <a class="dropdown-item" href="#">
                                    {{ $region }}
                                </a>
                            @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <div id="compliance_by_region_chart" class="apex-charts d-block w-90 mx-auto"></div>
                            <hr class="hr-dashed border-secondary w-25 mt-0 mx-auto">
                        </div>
                        <div class="text-center">
                            <h4>Nigeria</h4>
                            <p class="text-muted mt-2">Shows the compliance status of companies in the selected region.</p>
                            <button type="button" class="btn btn-outline-primary px-3 mt-2">View Regional Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Company Distribution Across Regions</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="" id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->

    <!--Start Rightbar-->
    <!--Start Rightbar/offcanvas-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
        <div class="offcanvas-header border-bottom justify-content-between">
            <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
            <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">  
            <h6>Account Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch1">
                    <label class="form-check-label" for="settings-switch1">Auto updates</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                    <label class="form-check-label" for="settings-switch2">Location Permission</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch3">
                    <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                </div><!--end form-switch-->
            </div><!--end /div-->
            <h6>General Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch4">
                    <label class="form-check-label" for="settings-switch4">Show me Online</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                    <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                </div><!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch6">
                    <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                </div><!--end form-switch-->
            </div><!--end /div-->               
        </div><!--end offcanvas-body-->
    </div>
    <!--end Rightbar/offcanvas-->
    <!--end Rightbar-->
</x-layouts.admin-app>