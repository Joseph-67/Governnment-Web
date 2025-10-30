    <x-layouts.admin-app>
    @section('PageTitle', 'Reporting Analytics')

    <div class="container">
        <h2 class="mb-4">Inventory Reporting Analytics</h2>

        {{-- Company Selection Dropdown --}}
        <form method="GET" action="" class="mb-4">
            <div class="mb-3">
                <label for="company" class="form-label">Select Company</label>
                <select name="company" id="company" class="form-select" onchange="this.form.submit()">
                    @foreach($userCompanies as $company)
                        <option value="{{ $company->company_id }}" {{ $selectedCompany == $company->company_id ? 'selected' : '' }}>
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- Nav Tabs --}}
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
            {{-- Summary Report Tab --}}
            <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="summary-tab">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Summary Report</div>
                    <div class="card-body">
                        <h5 class="card-title">Recent Restocking</h5>
                        <ul class="list-group mb-3">
                            @forelse($recentRestocking as $record)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $record->material }}
                                    <span class="badge bg-success rounded-pill">{{ $record->quantity }}</span>
                                    <small class="text-muted">{{ $record->created_at }}</small>
                                </li>
                            @empty
                                <li class="list-group-item">No restocking records found for this company.</li>
                            @endforelse
                        </ul>
                        <h5 class="card-title">Stock Withdrawals</h5>
                        <ul class="list-group mb-3">
                            @forelse($stockWithdrawals as $record)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $record->material }}
                                    <span class="badge bg-danger rounded-pill">{{ $record->quantity }}</span>
                                    <small class="text-muted">{{ $record->created_at }}</small>
                                </li>
                            @empty
                                <li class="list-group-item">No withdrawal records found for this company.</li>
                            @endforelse
                        </ul>
                        <h5 class="card-title">Low Stock Alerts</h5>
                        <ul class="list-group">
                            @forelse($lowStockAlerts as $record)
                                <li class="list-group-item">
                                    {{ $record->material }} - 
                                    <span class="text-warning">Current: {{ $record->current_quantity }}</span>,
                                    <span class="text-danger">Reorder Level: {{ $record->threshold_quantity }}</span>
                                </li>
                            @empty
                                <li class="list-group-item">No low stock alerts for this company.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Usage Report Tab --}}
            <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">Usage Report</div>
                    <div class="card-body">
                        {{-- Example Table --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Material</th>
                                    <th>Quantity Used</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stockWithdrawals as $record)
                                    <tr>
                                        <td>{{ $record->material }}</td>
                                        <td>{{ $record->quantity }}</td>
                                        <td>{{ $record->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No usage data available.</td>
                                    </tr>
                                @endforelse
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
            <div class="row mb-4 g-4">

                <!-- Restock Alerts Card -->
                <div class="col-md-6">
                    <div class="card border-warning shadow-sm h-100">
                        <div class="card-header bg-warning bg-opacity-25 border-bottom-0">
                            <h5 class="card-title mb-0 text-warning fw-bold">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>Restock Alerts
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group list-group-flush">
                                @php
                                    $lowStockThreshold = 10;
                                    $restockAlerts = collect($company_materials)
                                        ->filter(fn($m) => ($m->threshold_quantity ?? 0) <= $lowStockThreshold)
                                        ->unique('materialID');
                                @endphp

                                @forelse($restockAlerts as $material)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                        <span>
                                            <strong>{{ $material->material->material ?? 'Unknown Material' }}</strong>
                                            <span class="badge bg-{{ ($material->threshold_quantity ?? 0) == 0 ? 'danger' : 'warning' }} ms-2">
                                                {{ ($material->threshold_quantity ?? 0) == 0 ? 'Urgent' : 'Low' }}
                                            </span>
                                            <span class="ms-2 text-primary">
                                                {{ $material->company->company_name ?? 'Unknown Company' }}
                                            </span>
                                        </span>
                                        <span class="text-muted small">
                                            {{ $material->threshold_quantity ?? 0 }} in stock
                                        </span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted text-center py-3">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>No materials need restocking.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Recently Restocked Items -->
                <div class="col-md-6">
                    <div class="card border-success shadow-sm h-100">
                        <div class="card-header bg-success bg-opacity-25 border-bottom-0">
                            <h5 class="card-title mb-0 text-success fw-bold">
                                <i class="bi bi-arrow-repeat me-2"></i>Recently Restocked
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group list-group-flush">
                                @php
                                    $recentRestocks = collect($restocks ?? [])->take(5);
                                @endphp

                                @forelse($recentRestocks as $restock)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                        <span>
                                            <strong>{{ $restock->material->material ?? 'Unknown Material' }}</strong>
                                            <span class="text-muted small ms-2">+{{ $restock->quantity }} units</span>
                                        </span>
                                        <span class="badge bg-light text-dark">
                                            {{ $restock->created_at->diffForHumans() }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted text-center py-3">
                                        <i class="bi bi-clock-history me-2"></i>No recent restocks recorded.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Stock Forecast -->
                <div class="col-md-12">
                    <div class="card border-info shadow-sm">
                        <div class="card-header bg-info bg-opacity-25 border-bottom-0">
                            <h5 class="card-title mb-0 text-info fw-bold">
                                <i class="bi bi-graph-down me-2"></i>Stock Forecast
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <table class="table table-sm table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Company</th>
                                        <th>Current Stock</th>
                                        <th>Avg. Usage/Week</th>
                                        <th>Est. Weeks Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $forecasts = collect($company_materials)->map(function($m) {
                                            $avgUsage = $m->average_usage ?? 5; // assume from past records
                                            $weeksLeft = $avgUsage > 0 ? floor(($m->threshold_quantity ?? 0) / $avgUsage) : '∞';
                                            return [
                                                'material' => $m->material->material ?? 'Unknown',
                                                'company' => $m->company->company_name ?? 'Unknown',
                                                'stock' => $m->threshold_quantity ?? 0,
                                                'usage' => $avgUsage,
                                                'weeksLeft' => $weeksLeft
                                            ];
                                        });
                                    @endphp

                                    @forelse($forecasts as $f)
                                        <tr>
                                            <td>{{ $f['material'] }}</td>
                                            <td class="text-primary">{{ $f['company'] }}</td>
                                            <td>{{ $f['stock'] }}</td>
                                            <td>{{ $f['usage'] }}</td>
                                            <td>
                                                <span class="badge bg-{{ $f['weeksLeft'] <= 1 ? 'danger' : ($f['weeksLeft'] <= 3 ? 'warning' : 'success') }}">
                                                    {{ $f['weeksLeft'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-3">
                                                <i class="bi bi-bar-chart me-2"></i>No forecast data available.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Summary Stats -->
                <div class="col-md-12">
                    <div class="card border-dark shadow-sm">
                        <div class="card-header bg-light border-bottom-0">
                            <h5 class="card-title mb-0 text-dark fw-bold">
                                <i class="bi bi-clipboard-data me-2"></i>Summary Statistics
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            @php
                                $urgentCount = $restockAlerts->where('threshold_quantity', 0)->count();
                                $lowCount = $restockAlerts->where('threshold_quantity', '>', 0)->count();
                                $healthyCount = collect($company_materials)->count() - ($urgentCount + $lowCount);
                            @endphp

                            <div class="row text-center">
                                <div class="col-md-4">
                                    <h4 class="text-danger">{{ $urgentCount }}</h4>
                                    <p class="small text-muted">Urgent Restocks</p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-warning">{{ $lowCount }}</h4>
                                    <p class="small text-muted">Low Stock Items</p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-success">{{ $healthyCount }}</h4>
                                    <p class="small text-muted">Healthy Stock</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- row -->
        </div> <!-- card-body -->
    </div> <!-- card -->
</div>

            {{-- Balance Alert Report Tab --}}
            <div class="tab-pane fade" id="balance" role="tabpanel" aria-labelledby="balance-tab">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">Balance Alert Report</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Material</th>
                                    <th>Current Quantity</th>
                                    <th>Reorder Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lowStockAlerts as $record)
                                    <tr>
                                        <td>{{ $record->material }}</td>
                                        <td>{{ $record->current_quantity }}</td>
                                        <td>{{ $record->threshold_quantity }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No balance alerts for this company.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Detailed Resource Report -->
<div class="tab-pane fade" id="detailed" role="tabpanel" aria-labelledby="detailed-tab">
    <div class="card shadow-lg mb-4">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Detailed Resource Report</h2>
        </div>
        <div class="card-body">

            <!-- Overview Section -->
            @php
                $uniqueMaterials = collect($company_materials)->unique('materialID');
                $totalMaterials = $uniqueMaterials->count();

                $highValueThreshold = 1000; 
                $highValueMaterials = $uniqueMaterials->filter(fn($m) => ($m->threshold_quantity ?? 0) >= $highValueThreshold)->count();

                $lowValueThreshold = 10; 
                $lowValueMaterials = $uniqueMaterials->filter(fn($m) => ($m->threshold_quantity ?? 0) <= $lowValueThreshold)->count();

                // Top 10 materials by total quantity
                $materialTotals = collect($company_materials)
                    ->groupBy(fn($m) => $m->material->material ?? 'Unknown Material')
                    ->map(fn($group) => $group->sum(fn($m) => $m->threshold_quantity ?? 0))
                    ->sortDesc()
                    ->take(10);
            @endphp

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Materials</h5>
                            <p class="card-text display-6 fw-bold">{{ $totalMaterials }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">High-Stock Materials</h5>
                            <p class="card-text display-6 fw-bold text-success">{{ $highValueMaterials }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Low-Stock Materials</h5>
                            <p class="card-text display-6 fw-bold text-danger">{{ $lowValueMaterials }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Material Chart -->
            <h4 class="mt-4">Top 10 Materials by Quantity</h4>
            <div class="mb-4" style="height: 400px;">
                <canvas id="materialDetailChart" style="height: 100% !important;"></canvas>
            </div>

            <!-- Detailed Table -->
            <h4 class="mt-4">Material Details</h4>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Material Name</th>
                            <th>Company</th>
                            <th>Available Quantity</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($uniqueMaterials as $material)
                            <tr>
                                <td>{{ $material->material->material ?? 'Unknown Material' }}</td>
                                <td>{{ $material->company->company_name ?? 'Unknown Company' }}</td>
                                <td>
                                    <span class="fw-bold {{ ($material->threshold_quantity ?? 0) <= $lowValueThreshold ? 'text-danger' : '' }}">
                                        {{ $material->threshold_quantity ?? 0 }}
                                    </span>
                                </td>
                                <td>{{ $material->unit_of_measure ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted text-center">
                                    <i class="bi bi-info-circle me-2"></i>No material data available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



            <!-- Custom Report -->
<div class="tab-pane fade" id="custom" role="tabpanel" aria-labelledby="custom-tab">
    <div class="card shadow-lg mb-4">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Custom Report</h2>
        </div>
        <div class="card-body">

            <!-- Filters Section -->
            <h4>Filters</h4>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="materialFilter" class="form-label">Material</label>
                    <select id="materialFilter" class="form-select">
                        <option value="">All Materials</option>
                        @foreach(collect($company_materials)->pluck('material.material')->unique()->sort() as $materialName)
                            <option value="{{ $materialName }}">{{ $materialName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="companyFilter" class="form-label">Company</label>
                    <select id="companyFilter" class="form-select">
                        @foreach(collect($company_materials)->pluck('company.company_name')->unique()->sort() as $companyName)
                            <option value="{{ $companyName }}">{{ $companyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="statusFilter" class="form-label">Stock Status</label>
                    <select id="statusFilter" class="form-select">
                        <option value="">All</option>
                        <option value="in">In Stock</option>
                        <option value="low">Low Stock</option>
                        <option value="out">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button id="filterButton" class="btn btn-primary w-100">Apply Filters</button>
                </div>
            </div>

            <!-- Report Results -->
            <h4 class="mt-4">Report Results</h4>
            <div class="table-responsive">
                <table class="table table-striped" id="customReportTable">
                    <thead class="table-light">
                        <tr>
                            <th>Material Name</th>
                            <th>Company</th>
                            <th>Stock Quantity</th>
                            <th>Status</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $customRows = collect($company_materials)
                                ->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''));
                        @endphp
                        @foreach($customRows as $row)
                            @php
                                $qty = $row->threshold_quantity ?? 0;
                                $min = $row->material->reorder_level ?? 10;

                                if ($qty <= 0) {
                                    $status = 'Out of Stock';
                                    $badge = 'danger';
                                    $statusVal = 'out';
                                } elseif ($qty > 0 && $qty <= $min) {
                                    $status = 'Low Stock';
                                    $badge = 'warning';
                                    $statusVal = 'low';
                                } else {
                                    $status = 'In Stock';
                                    $badge = 'success';
                                    $statusVal = 'in';
                                }
                            @endphp
                            <tr data-material="{{ $row->material->material ?? '' }}"
                                data-company="{{ $row->company->company_name ?? '' }}"
                                data-status="{{ $statusVal }}">
                                <td>{{ $row->material->material ?? 'Unknown Material' }}</td>
                                <td>{{ $row->company->company_name ?? 'Unknown Company' }}</td>
                                <td>{{ $qty }}</td>
                                <td><span class="badge bg-{{ $badge }}">{{ $status }}</span></td>
                                <td>{{ $row->unit_of_measure ?? '-' }}</td>
                            </tr>
                        @endforeach
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
    @section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data from Blade for Top 10 Materials
        const materialLabels = @json($materialTotals->keys());
        const materialQuantities = @json($materialTotals->values());

        // Bar Chart: Top 10 Materials by Quantity
        new Chart(document.getElementById('materialDetailChart'), {
            type: 'bar',
            data: {
                labels: materialLabels,
                datasets: [{
                    label: 'Total Quantity',
                    data: materialQuantities,
                    backgroundColor: '#59a14f'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.formattedValue;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { autoSkip: false, maxRotation: 45, minRotation: 45 }
                    },
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Quantity' }
                    }
                }
            }
        });
    });
</script>


<script>
    // ===== FILTERING =====
    document.getElementById('filterButton').addEventListener('click', function () {
        const materialFilter = document.getElementById('materialFilter').value.toLowerCase();
        const companyFilter = document.getElementById('companyFilter').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;

        document.querySelectorAll("#customReportTable tbody tr").forEach(row => {
            const material = row.getAttribute('data-material').toLowerCase();
            const company = row.getAttribute('data-company').toLowerCase();
            const status = row.getAttribute('data-status');

            let visible = true;

            if (materialFilter && !material.includes(materialFilter)) visible = false;
            if (companyFilter && !company.includes(companyFilter)) visible = false;
            if (statusFilter && status !== statusFilter) visible = false;

            row.style.display = visible ? "" : "none";
        });
    });

    // ===== EXPORT TO CSV =====
    function exportToCSV() {
        let rows = document.querySelectorAll("#customReportTable tr");
        let csv = [];

        rows.forEach(row => {
            let cols = row.querySelectorAll("td, th");
            let rowData = [];
            cols.forEach(col => rowData.push(col.innerText));
            csv.push(rowData.join(","));
        });

        let csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
        let downloadLink = document.createElement("a");
        downloadLink.download = "custom_report.csv";
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.click();
    }

    // ===== CHART VISUALIZATION =====
    let customChart; // global variable

    function generateChart() {
        const rows = document.querySelectorAll("#customReportTable tbody tr");
        const labels = [];
        const quantities = [];

        rows.forEach(row => {
            if (row.style.display !== "none") { // include only visible rows
                labels.push(row.cells[0].innerText + " (" + row.cells[1].innerText + ")");
                quantities.push(parseInt(row.cells[2].innerText));
            }
        });

        // Show chart container
        document.getElementById("chartContainer").style.display = "block";

        // Destroy old chart if exists
        if (customChart) {
            customChart.destroy();
        }

        const ctx = document.getElementById("customReportChart").getContext("2d");
        customChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Stock Quantity",
                    data: quantities,
                    backgroundColor: "rgba(54, 162, 235, 0.6)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: "Custom Report - Stock Quantity per Material & Company",
                        font: { size: 16 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ": " + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: "Quantity" }
                    },
                    x: {
                        title: { display: true, text: "Material (Company)" }
                    }
                }
            }
        });
    }
</script>


    @endsection
    </x-layouts.admin-app>
