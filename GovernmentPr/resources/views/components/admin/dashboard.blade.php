<x-layouts.admin-app>
    @section('PageTitle', 'Dashboard')
    @section('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <style>
            #map {
                height: 500px;
                width: 100%;
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

        if (!Array.isArray(industriesInSector)) {
            console.warn(`No industries found for sector: ${sector.name}`);
            return;
        }

        industriesInSector.forEach(industry => {
            const fetchPromise = fetch(`/admin/count/companies/${industry}`)
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

    @endsection
    @section('modals')
        <!-- Modal -->
        <div class="modal fade" id="companySectorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Companies Sector</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Here you can view the details of companies by sector.</p>
                <ul class="list-group">

                </ul>
                <p class="mt-3">This modal provides an overview of the number of companies in each sector. You can click on a sector to view more details.</p>
                <p class="text-muted">Note: The data is dynamically generated based on the current company records.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
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
                                        <a class="dropdown-item" href="#">Last 3 Months</a>
                                        <a class="dropdown-item" href="#">Last 6 Months</a>
                                        <a class="dropdown-item" href="#">Last 12 Months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="recp_compliance_trend_chart" class="apex-charts"></div>
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
                        <button type="button" class="btn btn-outline-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#companySectorModal">View Details</button>
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
                                <input type="text" name="company" class="form-control" placeholder="Search Company" value="{{ request('company') }}">
                            </div>
                            <div class="col-md-2">
                                <select name="sector" class="form-select">
                                    <option value="">All Sectors</option>
                                    <option value="Technology" {{ request('sector') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Finance" {{ request('sector') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="Healthcare" {{ request('sector') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Manufacturing" {{ request('sector') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Retail" {{ request('sector') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="region" class="form-select">
                                    <option value="">All Regions</option>
                                    <option value="Nairobi" {{ request('region') == 'Nairobi' ? 'selected' : '' }}>Nairobi</option>
                                    <option value="Mombasa" {{ request('region') == 'Mombasa' ? 'selected' : '' }}>Mombasa</option>
                                    <option value="Kisumu" {{ request('region') == 'Kisumu' ? 'selected' : '' }}>Kisumu</option>
                                    <option value="Nakuru" {{ request('region') == 'Nakuru' ? 'selected' : '' }}>Nakuru</option>
                                    <option value="Eldoret" {{ request('region') == 'Eldoret' ? 'selected' : '' }}>Eldoret</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="compliance" class="form-select">
                                    <option value="">All Compliance</option>
                                    <option value="Compliant" {{ request('compliance') == 'Compliant' ? 'selected' : '' }}>Compliant</option>
                                    <option value="Review" {{ request('compliance') == 'Review' ? 'selected' : '' }}>Review</option>
                                    <option value="Non-Compliant" {{ request('compliance') == 'Non-Compliant' ? 'selected' : '' }}>Non-Compliant</option>
                                    <option value="N/A" {{ request('compliance') == 'N/A' ? 'selected' : '' }}>N/A</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary">Clear Filters</button>
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