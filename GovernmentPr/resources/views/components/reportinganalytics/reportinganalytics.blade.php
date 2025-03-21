<x-layouts.admin-app>
@section('PageTitle', 'Reporting and Analytics')
<div class="container-xxl mt-4">
    <h1 class="text-3xl font-bold text-center mb-6">Reporting & Analytics</h1>
    <ul class="nav nav-tabs justify-content-center mb-4" id="reportTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="summary-tab" data-bs-toggle="tab" data-bs-target="#summary" type="button" role="tab">Summary Report</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage" type="button" role="tab">Usage Report</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="restocking-tab" data-bs-toggle="tab" data-bs-target="#restocking" type="button" role="tab">Restocking Report</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="balance-tab" data-bs-toggle="tab" data-bs-target="#balance" type="button" role="tab">Balance Alert Report</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="detailed-tab" data-bs-toggle="tab" data-bs-target="#detailed" type="button" role="tab">Detailed Resource Report</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="custom-tab" data-bs-toggle="tab" data-bs-target="#custom" type="button" role="tab">Custom Report</button>
        </li>
    </ul>

    <div class="tab-content" id="reportTabsContent">
        <!-- Summary Report -->
        <div class="tab-pane fade show active" id="summary" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Inventory Summary Report</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Products</h5>
                                    <p class="card-text display-6">1,245</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Low Stock</h5>
                                    <p class="card-text display-6">58</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Out of Stock</h5>
                                    <p class="card-text display-6">12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Inventory Overview</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Stock Quantity</th>
                                <th>Reorder Level</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product A</td>
                                <td>Category 1</td>
                                <td>120</td>
                                <td>50</td>
                                <td><span class="badge bg-success">In Stock</span></td>
                            </tr>
                            <tr>
                                <td>Product B</td>
                                <td>Category 2</td>
                                <td>10</td>
                                <td>30</td>
                                <td><span class="badge bg-warning">Low Stock</span></td>
                            </tr>
                            <tr>
                                <td>Product C</td>
                                <td>Category 3</td>
                                <td>0</td>
                                <td>20</td>
                                <td><span class="badge bg-danger">Out of Stock</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 <!-- Usage Report -->
 <div class="tab-pane fade" id="usage" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Usage Report</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Top Used Products</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">Product A - 150 units</li>
                                        <li class="list-group-item">Product B - 120 units</li>
                                        <li class="list-group-item">Product C - 90 units</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Monthly Usage Summary</h5>
                                    <p class="text-muted">This month: 1,245 units</p>
                                    <canvas id="usageChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Detailed Usage Log</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Quantity Used</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-03-01</td>
                                <td>Product A</td>
                                <td>15</td>
                                <td>Operations</td>
                            </tr>
                            <tr>
                                <td>2023-03-02</td>
                                <td>Product B</td>
                                <td>10</td>
                                <td>Sales</td>
                            </tr>
                            <tr>
                                <td>2023-03-03</td>
                                <td>Product C</td>
                                <td>5</td>
                                <td>Marketing</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<!-- Restocking Report -->
<div class="tab-pane fade" id="restocking" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Restocking Report</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Restock Alerts</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">Product B - Needs restock (10 in stock)</li>
                                        <li class="list-group-item">Product C - Needs urgent restock (0 in stock)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Recent Restocking Activities</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">Product A - 50 units restocked on 2023-03-01</li>
                                        <li class="list-group-item">Product B - 30 units restocked on 2023-02-25</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Products Needing Restock</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Reorder Level</th>
                                <th>Last Restocked</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product B</td>
                                <td>Category 2</td>
                                <td>10</td>
                                <td>30</td>
                                <td>2023-02-25</td>
                            </tr>
                            <tr>
                                <td>Product C</td>
                                <td>Category 3</td>
                                <td>0</td>
                                <td>20</td>
                                <td>2023-02-15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Balance Alert Report -->
        <div class="tab-pane fade" id="balance" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Balance Alert Report</h2>
                </div>
                <div class="card-body">
                    <!-- Search and Filter Section -->
                    <div class="mb-4">
                        <input type="text" class="form-control mb-2" placeholder="Search by product name...">
                        <select class="form-select" aria-label="Filter by category">
                            <option selected>Filter by Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>

                    <!-- Critical Alerts Section -->
                    <h4 class="mt-4">Critical Balance Alerts</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Minimum Balance</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product D</td>
                                <td>Category 1</td>
                                <td>5</td>
                                <td>20</td>
                                <td><span class="badge bg-danger">Critical</span></td>
                            </tr>
                            <tr>
                                <td>Product E</td>
                                <td>Category 2</td>
                                <td>15</td>
                                <td>30</td>
                                <td><span class="badge bg-warning">Low</span></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Category-Wise Summary -->
                    <h4 class="mt-4">Category-Wise Balance Summary</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Category 1</h5>
                                    <p class="text-muted">Low stock: 2 products</p>
                                    <progress class="progress-bar" value="20" max="100"></progress>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Category 2</h5>
                                    <p class="text-muted">Critical stock: 1 product</p>
                                    <progress class="progress-bar" value="50" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Detailed Resource Report -->
        <div class="tab-pane fade" id="detailed" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Detailed Resource Report</h2>
                </div>
                <div class="card-body">
                    <!-- Overview Section -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Resources</h5>
                                    <p class="card-text display-6">1,432</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">High-Value Resources</h5>
                                    <p class="card-text display-6">245</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Underutilized Resources</h5>
                                    <p class="card-text display-6">58</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Graphical Representation -->
                    <h4 class="mt-4">Resource Distribution</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="resourcePieChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="resourceUsageBarChart"></canvas>
                        </div>
                    </div>

                    <!-- Detailed Table -->
                    <h4 class="mt-4">Resource Details</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Resource Name</th>
                                <th>Category</th>
                                <th>Available Quantity</th>
                                <th>Last Usage Date</th>
                                <th>Supplier</th>
                                <th>Purchase Date</th>
                                <th>Stock Lifespan (Days)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Resource A</td>
                                <td>Category 1</td>
                                <td>120</td>
                                <td>2023-03-01</td>
                                <td>Supplier A</td>
                                <td>2022-12-01</td>
                                <td>180</td>
                            </tr>
                            <tr>
                                <td>Resource B</td>
                                <td>Category 2</td>
                                <td>30</td>
                                <td>2023-02-25</td>
                                <td>Supplier B</td>
                                <td>2022-11-15</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <td>Resource C</td>
                                <td>Category 3</td>
                                <td>45</td>
                                <td>2023-03-10</td>
                                <td>Supplier C</td>
                                <td>2023-01-10</td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Custom Report -->
        <div class="tab-pane fade" id="custom" role="tabpanel">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h2 class="text-xl font-semibold">Custom Report</h2>
                </div>
                <div class="card-body">
                    <!-- Filters Section -->
                    <h4>Filters</h4>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="categoryFilter" class="form-label">Category</label>
                            <select id="categoryFilter" class="form-select">
                                <option value="">All Categories</option>
                                <option value="Category 1">Category 1</option>
                                <option value="Category 2">Category 2</option>
                                <option value="Category 3">Category 3</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="statusFilter" class="form-label">Stock Status</label>
                            <select id="statusFilter" class="form-select">
                                <option value="">All</option>
                                <option value="In Stock">In Stock</option>
                                <option value="Low Stock">Low Stock</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="dateRange" class="form-label">Date Range</label>
                            <input type="date" id="startDate" class="form-control mb-2" placeholder="Start Date">
                            <input type="date" id="endDate" class="form-control" placeholder="End Date">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button id="filterButton" class="btn btn-primary w-100">Apply Filters</button>
                        </div>
                    </div>

                    <!-- Report Results -->
                    <h4 class="mt-4">Report Results</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="customReportTable">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Stock Quantity</th>
                                    <th>Status</th>
                                    <th>Last Used</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dynamically populated rows -->
                                <tr>
                                    <td>Product A</td>
                                    <td>Category 1</td>
                                    <td>120</td>
                                    <td><span class="badge bg-success">In Stock</span></td>
                                    <td>2023-03-01</td>
                                    <td>Operations</td>
                                </tr>
                                <tr>
                                    <td>Product B</td>
                                    <td>Category 2</td>
                                    <td>10</td>
                                    <td><span class="badge bg-warning">Low Stock</span></td>
                                    <td>2023-03-02</td>
                                    <td>Sales</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4">
                        <button class="btn btn-success me-2" onclick="exportToCSV()">Export to CSV</button>
                        <button class="btn btn-info" onclick="generateChart()">Visualize Report</button>
                    </div>

                    <!-- Visualization Section -->
                    <div class="mt-4" id="chartContainer" style="display:none;">
                        <canvas id="customReportChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<!-- detailed resource -->
<script>
    // Example Chart Scripts
    const ctx1 = document.getElementById('resourcePieChart').getContext('2d');
    const ctx2 = document.getElementById('resourceUsageBarChart').getContext('2d');

    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Category 1', 'Category 2', 'Category 3'],
            datasets: [{
                label: 'Resource Distribution',
                data: [500, 600, 332],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Resource A', 'Resource B', 'Resource C'],
            datasets: [{
                label: 'Usage Trends',
                data: [150, 100, 90],
                backgroundColor: '#36A2EB'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<!-- custom -->
<script>
    // Example JavaScript for dynamic filtering and chart generation
    document.getElementById('filterButton').addEventListener('click', function() {
        const category = document.getElementById('categoryFilter').value;
        const status = document.getElementById('statusFilter').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        console.log('Filters Applied:', { category, status, startDate, endDate });
        // AJAX call or filter logic to update the table
    });

    function exportToCSV() {
        console.log('Exporting data to CSV...');
        // Implement CSV export logic
    }

    function generateChart() {
        const chartContainer = document.getElementById('chartContainer');
        chartContainer.style.display = 'block';
        const ctx = document.getElementById('customReportChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    label: 'Stock Quantity',
                    data: [120, 10, 0],
                    backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
@endsection
</x-layouts.admin-app>
