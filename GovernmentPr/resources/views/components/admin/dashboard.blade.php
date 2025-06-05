<x-layouts.admin-app>
    @section('PageTitle', 'Dashboard')
            <div class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Total Companies</p>
                                        <h3 class="mt-2 mb-0 fw-bold">1,024</h3>
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
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+12</span>
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
                                        <h3 class="mt-2 mb-0 fw-bold">872</h3>
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
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+8</span>
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
                                        <h3 class="mt-2 mb-0 fw-bold">152</h3>
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
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">+5</span>
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
                                        <h3 class="mt-2 mb-0 fw-bold">37</h3>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-task-list h1 align-self-center mb-0 text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-warning">+3</span> Pending This Week</p>
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
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Technology
                                        <span class="badge bg-primary rounded-pill">320</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Finance
                                        <span class="badge bg-success rounded-pill">210</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Healthcare
                                        <span class="badge bg-info rounded-pill">185</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Manufacturing
                                        <span class="badge bg-warning rounded-pill">140</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Retail
                                        <span class="badge bg-danger rounded-pill">95</span>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-outline-primary w-100 mt-3">View Details</button>
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
                                                <th class="border-top-0">Registration No.</th>
                                                <th class="border-top-0">Sector</th>
                                                <th class="border-top-0">Region</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Compliance</th>
                                                <th class="border-top-0">Licence Expiry</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Acme Corp</td>
                                                <td>REG-202301</td>
                                                <td>Technology</td>
                                                <td>Nairobi</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td><span class="badge bg-success">Compliant</span></td>
                                                <td>2025-12-31</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Beta Finance</td>
                                                <td>REG-202302</td>
                                                <td>Finance</td>
                                                <td>Mombasa</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td><span class="badge bg-warning">Review</span></td>
                                                <td>2024-09-15</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>HealthPlus</td>
                                                <td>REG-202303</td>
                                                <td>Healthcare</td>
                                                <td>Kisumu</td>
                                                <td><span class="badge bg-danger">Non-Compliant</span></td>
                                                <td><span class="badge bg-danger">Non-Compliant</span></td>
                                                <td>2024-06-30</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ManuFact</td>
                                                <td>REG-202304</td>
                                                <td>Manufacturing</td>
                                                <td>Nakuru</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td><span class="badge bg-success">Compliant</span></td>
                                                <td>2026-01-20</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Retailers Inc</td>
                                                <td>REG-202305</td>
                                                <td>Retail</td>
                                                <td>Eldoret</td>
                                                <td><span class="badge bg-secondary">Inactive</span></td>
                                                <td><span class="badge bg-secondary">N/A</span></td>
                                                <td>2023-11-10</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <th class="border-top-0">User Name</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Company</th>
                                                <th class="border-top-0">Role</th>
                                                <th class="border-top-0">Last Active</th>
                                                <th class="border-top-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Jane Doe</td>
                                                <td>jane@example.com</td>
                                                <td>Acme Corp</td>
                                                <td>Admin</td>
                                                <td>2 min ago</td>
                                                <td><span class="badge bg-success">Online</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>John Smith</td>
                                                <td>john@example.com</td>
                                                <td>Beta Finance</td>
                                                <td>Auditor</td>
                                                <td>10 min ago</td>
                                                <td><span class="badge bg-warning">Idle</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Mary Johnson</td>
                                                <td>mary@example.com</td>
                                                <td>HealthPlus</td>
                                                <td>User</td>
                                                <td>30 min ago</td>
                                                <td><span class="badge bg-secondary">Offline</span></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Alex Lee</td>
                                                <td>alex@example.com</td>
                                                <td>ManuFact</td>
                                                <td>User</td>
                                                <td>5 min ago</td>
                                                <td><span class="badge bg-success">Online</span></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Grace Kim</td>
                                                <td>grace@example.com</td>
                                                <td>Retailers Inc</td>
                                                <td>Manager</td>
                                                <td>1 hour ago</td>
                                                <td><span class="badge bg-secondary">Offline</span></td>
                                            </tr>
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
                                                Nairobi<i class="las la-angle-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Nairobi</a>
                                                <a class="dropdown-item" href="#">Mombasa</a>
                                                <a class="dropdown-item" href="#">Kisumu</a>
                                                <a class="dropdown-item" href="#">Nakuru</a>
                                                <a class="dropdown-item" href="#">Eldoret</a>
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
                                    <h4>Nairobi</h4>
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
                                        <h4 class="card-title">Sector Distribution Across Regions</h4>
                                    </div>
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icofont-calendar fs-5 me-1"></i>
                                                This Year<i class="las la-angle-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">This Year</a>
                                                <a class="dropdown-item" href="#">Last Year</a>
                                                <a class="dropdown-item" href="#">Last 5 Years</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div id="map_2" style="height:320px"></div>
                                    </div>
                                    <div class="col-lg-4 align-self-center">
                                        <div class="d-flex align-items-center my-3">
                                            <span class="badge bg-primary me-2" style="width:20px;height:20px;">&nbsp;</span>
                                            <div>
                                                <h5 class="mb-1">Technology</h5>
                                                <p class="text-muted mb-0">Nairobi: 120</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center my-3">
                                            <span class="badge bg-success me-2" style="width:20px;height:20px;">&nbsp;</span>
                                            <div>
                                                <h5 class="mb-1">Finance</h5>
                                                <p class="text-muted mb-0">Mombasa: 80</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center my-3">
                                            <span class="badge bg-info me-2" style="width:20px;height:20px;">&nbsp;</span>
                                            <div>
                                                <h5 class="mb-1">Healthcare</h5>
                                                <p class="text-muted mb-0">Kisumu: 60</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center my-3">
                                            <span class="badge bg-warning me-2" style="width:20px;height:20px;">&nbsp;</span>
                                            <div>
                                                <h5 class="mb-1">Manufacturing</h5>
                                                <p class="text-muted mb-0">Nakuru: 45</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center my-3">
                                            <span class="badge bg-danger me-2" style="width:20px;height:20px;">&nbsp;</span>
                                            <div>
                                                <h5 class="mb-1">Retail</h5>
                                                <p class="text-muted mb-0">Eldoret: 30</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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