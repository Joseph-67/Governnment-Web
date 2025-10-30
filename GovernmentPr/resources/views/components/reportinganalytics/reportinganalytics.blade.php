<x-layouts.admin-app>
@section('PageTitle', $page_title)
<div class="container-xxl mt-4">
    <h1 class="text-3xl font-bold text-center mb-6">{{ $page_description }}</h1>
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
                    <h2 class="text-xl font-semibold">Summary Report</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Material</h5>
                                    <p class="card-text display-6">
                                        {{ collect($company_materials)->unique('materialID')->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Low Stock</h5>
                                    <p class="card-text display-6">
                                        {{
                                            collect($company_materials)
                                                ->filter(fn($material) => ($material->threshold_quantity ?? 0) > 0 && ($material->threshold_quantity ?? 0) <= 10)
                                                ->unique('materialID')
                                                ->count()
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Out of Stock</h5>
                                    <p class="card-text display-6">
                                        {{
                                            collect($company_materials)
                                                ->filter(fn($material) => ($material->threshold_quantity ?? 0) <= 0)
                                                ->unique('materialID')
                                                ->count()
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Inventory Overview</h4>
                    @php
                        $materialsByName = [];
                        foreach ($company_materials as $material) {
                            $materialId = $material->materialID ?? 0;
                            $materialName = $material->material->material ?? 'Unknown Material';
                            $companyName = $material->company->company_name ?? 'Unknown Company';
                            $quantity = $material->threshold_quantity ?? 0;
                            $unit = $material->unit_of_measure ?? '';
                            $lowStockThreshold = 10;
                            $highStockThreshold = 1000;

                            if ($quantity <= $lowStockThreshold) {
                                $stockStatus = 'low';
                                $stockStatusText = 'Low Stock';
                                $stockStatusClass = 'warning';
                            } elseif ($quantity >= $highStockThreshold) {
                                $stockStatus = 'high';
                                $stockStatusText = 'High Stock';
                                $stockStatusClass = 'info';
                            } else {
                                $stockStatus = 'sufficient';
                                $stockStatusText = 'Sufficient';
                                $stockStatusClass = 'success';
                            }

                            // For progress bar: 0 = 0%, lowStockThreshold = 10%, highStockThreshold = 100%
                            $progress = 0;
                            if ($quantity > 0 && $quantity < $highStockThreshold) {
                                $progress = min(100, max(0, ($quantity / $highStockThreshold) * 100));
                            } elseif ($quantity >= $highStockThreshold) {
                                $progress = 100;
                            }

                            $materialsByName[$materialId]['materialName'] = $materialName;
                            $materialsByName[$materialId]['unit'] = $unit;
                            $materialsByName[$materialId]['companies'][] = [
                                'company' => $companyName,
                                'quantity' => $quantity,
                                'stockStatus' => $stockStatus,
                                'stockStatusText' => $stockStatusText,
                                'stockStatusClass' => $stockStatusClass,
                                'lowStockThreshold' => $lowStockThreshold,
                                'highStockThreshold' => $highStockThreshold,
                                'progress' => $progress,
                            ];
                        }
                    @endphp

                    <div class="accordion" id="inventoryOverviewAccordion">
                        @foreach($materialsByName as $material)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ \Illuminate\Support\Str::slug($material['materialName']) }}">
                                    <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ \Illuminate\Support\Str::slug($material['materialName']) }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ \Illuminate\Support\Str::slug($material['materialName']) }}">
                                        <strong>{{ $material['materialName'] }}</strong>
                                    </button>
                                </h2>
                                <div id="collapse{{ \Illuminate\Support\Str::slug($material['materialName']) }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ \Illuminate\Support\Str::slug($material['materialName']) }}" data-bs-parent="#inventoryOverviewAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group mb-3">
                                            @foreach($material['companies'] as $item)
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                        <span><strong>{{ $item['company'] }}</strong></span>
                                                        <span>
                                                            Quantity: {{ $item['quantity'] }} {{ $material['unit'] }}
                                                            <span class="badge bg-{{ $item['stockStatusClass'] }} ms-2">{{ $item['stockStatusText'] }}</span>
                                                            <small class="text-muted ms-2">
                                                                (Low ≤ {{ $item['lowStockThreshold'] }}, High ≥ {{ $item['highStockThreshold'] }})
                                                            </small>
                                                        </span>
                                                    </div>
                                                    <div class="progress" style="height: 18px;">
                                                        <div class="progress-bar bg-{{ $item['stockStatusClass'] }}"
                                                            role="progressbar"
                                                            style="width: {{ $item['progress'] }}%;"
                                                            aria-valuenow="{{ $item['progress'] }}"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            {{ round($item['progress']) }}%
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
                <!-- Top Used Material Per Month -->
                <div class="col-md-6">
                    <div class="card bg-light shadow-sm h-100 d-flex flex-column">
                        <div class="card-body text-center d-flex flex-column h-100" style="padding: 2.5rem 2rem;">
                            <h5 class="card-title fs-3 mb-4">Top 3 Used Materials Per Month</h5>
                            <ul class="list-group mb-4 flex-grow-1 overflow-auto" style="max-height: 260px;">
                                @php
                                    // Group usage by month and collect all materials for each month
                                    $topMaterialsPerMonth = [];
                                    foreach ($monthlyUsage as $usage) {
                                        $monthKey = \Carbon\Carbon::create($usage->year, $usage->month, 1)->format('F Y');
                                        $material = $usage->material ?? 'Unknown Material';
                                        $company = $usage->company_name ?? 'Unknown Company';
                                        $totalUsed = $usage->total_used ?? 0;
                                        $key = $material . '|' . $company;

                                        if (!isset($topMaterialsPerMonth[$monthKey])) {
                                            $topMaterialsPerMonth[$monthKey] = [];
                                        }
                                        // Sum usage per material per company per month
                                        if (!isset($topMaterialsPerMonth[$monthKey][$key])) {
                                            $topMaterialsPerMonth[$monthKey][$key] = [
                                                'material' => $material,
                                                'company' => $company,
                                                'total_used' => 0,
                                            ];
                                        }
                                        $topMaterialsPerMonth[$monthKey][$key]['total_used'] += $totalUsed;
                                    }
                                @endphp

                                @forelse($topMaterialsPerMonth as $month => $materials)
                                    <li class="list-group-item text-start py-4 px-3" style="font-size: 1.2rem;">
                                        <strong class="text-primary fs-5">{{ $month }}</strong>
                                        <ul class="mb-0 ps-4">
                                            @foreach(collect($materials)->sortByDesc('total_used')->take(3) as $data)
                                                <li style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                                                    {{ $data['material'] }} ({{ $data['company'] }}) –
                                                    <span class="fw-bold text-primary">{{ number_format($data['total_used']) }}</span> units
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted py-4" style="font-size: 1.2rem;">No usage data available</li>
                                @endforelse
                            </ul>
                            <div class="mt-auto">
                                <small class="text-muted fs-6">Showing top 3 materials per month</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Usage Summary -->
                <div class="col-md-6 d-flex flex-column">
                    <div class="card bg-light flex-fill shadow-sm">
                        <div class="card-body d-flex flex-column h-100">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Monthly Usage Summary</h5>
                        @php
                            $uniqueMonths = collect($monthlyUsage)
                                ->map(fn($item) => \Carbon\Carbon::create($item->year, $item->month, 1)->format('F Y'))
                                ->unique();
                        @endphp

                        <span class="badge bg-primary fs-6">{{ $uniqueMonths->count() }} Months</span>

                            </div>

                            <!-- Quick Stats -->
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="card bg-white border-0 shadow-sm h-100">
                                        <div class="card-body text-center p-2">
                                            <h6 class="card-title mb-1 text-muted small">Total Units Used</h6>
                                            <p class="display-6 mb-0 fw-bold text-primary">
                                                {{ number_format($totalUnitsUsed) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card bg-white border-0 shadow-sm h-100">
                                        <div class="card-body text-center p-2">
                                            <h6 class="card-title mb-1 text-muted small">Distinct Materials Used</h6>
                                            <p class="display-6 mb-0 fw-bold text-success">
                                                {{ isset($allMaterials) ? count($allMaterials) : (isset($topMaterials) ? $topMaterials->count() : 0) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Usage Breakdown -->
                            @php
                                $monthlyUsageGrouped = [];
                                foreach ($monthlyUsage as $usage) {
                                    $monthLabel = \Carbon\Carbon::create($usage->year, $usage->month, 1)->format('F Y');
                                    $company = $usage->company_name ?? 'Unknown Company';
                                    $material = $usage->material ?? 'Unknown Material';
                                    $quantity = $usage->total_used ?? 0;
                                    $monthlyUsageGrouped[$monthLabel][$company][$material] = $quantity;
                                }
                            @endphp

                            <div class="mb-3 flex-grow-1 overflow-auto" style="max-height: 180px;">
                                <h6 class="mb-2">Monthly Usage Breakdown</h6>
                                @forelse($monthlyUsageGrouped as $month => $companies)
                                    <div class="mb-2">
                                        <strong class="text-primary">{{ $month }}</strong>
                                        <ul class="list-group list-group-flush">
                                            @foreach($companies as $company => $materials)
                                                <li class="list-group-item py-1 px-2">
                                                    <span class="fw-bold">{{ $company }}</span>
                                                    <ul class="mb-0 ps-3 small">
                                                        @foreach($materials as $material => $qty)
                                                            <li>
                                                                {{ $material }}:
                                                                <span class="text-primary fw-semibold">{{ number_format($qty) }}</span> units
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @empty
                                    <p class="text-muted">No monthly usage data available.</p>
                                @endforelse
                            </div>

                            <!-- Chart -->
                            <div class="mb-0">
                                <h6 class="mb-2">Monthly Usage Chart</h6>
                                <div class="ratio ratio-16x9">
                                    <canvas id="usageChart"></canvas>
                                </div>
                            </div>

                            <!-- Chart Data Prep -->
                            @php
                                $labels = array_keys($monthlyUsageGrouped);
                                $materialSet = [];
                                foreach ($monthlyUsageGrouped as $companies) {
                                    foreach ($companies as $materials) {
                                        foreach ($materials as $material => $qty) {
                                            $materialSet[$material] = true;
                                        }
                                    }
                                }
                                $allMaterials = array_keys($materialSet);

                                $datasets = [];
                                foreach ($allMaterials as $material) {
                                    $data = [];
                                    foreach ($monthlyUsageGrouped as $companies) {
                                        $sum = 0;
                                        foreach ($companies as $materials) {
                                            $sum += $materials[$material] ?? 0;
                                        }
                                        $data[] = $sum;
                                    }
                                    $datasets[] = [
                                        'label' => $material,
                                        'data' => $data,
                                        'backgroundColor' => 'rgba(' . rand(50,200) . ',' . rand(50,200) . ',' . rand(50,200) . ',0.6)',
                                        'borderColor' => 'rgba(0,0,0,0.8)',
                                        'borderWidth' => 1,
                                    ];
                                }
                            @endphp

                        </div>
                    </div>
                </div>
            </div>

                    <h4 class="mt-4">Detailed Usage Log</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Material</th>
                                <th>Quantity Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usageLogs as $log)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($log->date)->format('Y-m-d') }}</td>
                                    <td>{{ $log->company->company_name ?? 'Unknown Company' }}</td>
                                    <td>{{ $log->material->material ?? 'Unknown Material' }}</td>
                                    <td>{{ $log->quantity_used }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">No usage log data available.</td>
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
                                            $restockAlerts = collect($company_materials)
                                                ->filter(function($material) {
                                                    $lowStockThreshold = 10;
                                                    return ($material->threshold_quantity ?? 0) <= $lowStockThreshold;
                                                })
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
                        <!-- Recent Restocking Activities Card -->
                        <div class="col-md-6">
                            <div class="card border-info shadow-sm h-100">
                                <div class="card-header bg-info bg-opacity-25 border-bottom-0">
                                    <h5 class="card-title mb-0 text-info fw-bold">
                                        <i class="bi bi-arrow-repeat me-2"></i>Recent Restocking Activities
                                    </h5>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group list-group-flush">
                                        @php
                                            // $recentRestocking is grouped by company_name
                                        @endphp
                                        @forelse($recentRestocking as $company => $activities)
                                            <li class="list-group-item py-2">
                                                <div class="fw-semibold mb-1 text-primary">{{ $company }}</div>
                                                <ul class="mb-0 ps-3 small">
                                                    @foreach($activities as $activity)
                                                        <li class="mb-1">
                                                            <span class="fw-bold">{{ $activity->material }}</span>:
                                                            <span class="text-success fw-bold">+{{ number_format($activity->quantity) }}</span>
                                                            <span class="text-muted ms-2">
                                                                <i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($activity->created_at)->format('Y-m-d H:i') }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @empty
                                            <li class="list-group-item text-muted text-center py-3">
                                                <i class="bi bi-info-circle me-2"></i>No recent restocking activities.
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Materials Needing Restock</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Material Name</th>
                                
                                <th>Current Stock</th>
                                <th>Reorder Level</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Find materials needing restock (threshold_quantity <= low threshold)
                                $lowStockThreshold = 10;
                                $materialsNeedingRestock = collect($company_materials)
                                    ->filter(function($material) use ($lowStockThreshold) {
                                        return ($material->threshold_quantity ?? 0) <= $lowStockThreshold;
                                    })
                                    ->unique('materialID');
                            @endphp
                            @forelse($materialsNeedingRestock as $material)
                                <tr>
                                    <td>{{ $material->material->material ?? 'Unknown Material' }}</td>
                                    
                                    <td>{{ $material->threshold_quantity ?? 0 }}</td>
                                    <td>{{ $material->material->reorder_level ?? 10 }}</td>
                                   
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted text-center">No materials need restocking.</td>
                                </tr>
                            @endforelse
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
            <div class="mb-4 row g-2 align-items-end">
            <div class="col-md-6">
                <input type="text" id="balanceSearch" class="form-control" placeholder="Search by material or company...">
            </div>
            <div class="col-md-4">
                <select id="balanceCompanyFilter" class="form-select">
                <option value="">All Companies</option>
                @foreach(collect($company_materials)->pluck('company.company_name')->unique()->sort() as $companyName)
                <option value="{{ $companyName }}">{{ $companyName }}</option>
                @endforeach
                </select>
            </div>
            </div>

            <!-- Standardized Summary -->
            <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-light">
                <div class="card-body text-center">
                <h5 class="card-title">Total Materials</h5>
                <p class="card-text display-6" id="balanceTotalMaterials">
                {{ collect($company_materials)->unique('materialID')->count() }}
                </p>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                <div class="card-body text-center">
                <h5 class="card-title">Low Stock</h5>
                <p class="card-text display-6" id="balanceLowStock">
                {{
                    collect($company_materials)
                    ->filter(fn($m) => ($m->threshold_quantity ?? 0) > 0 && ($m->threshold_quantity ?? 0) <= 10)
                    ->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''))
                    ->count()
                }}
                </p>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                <div class="card-body text-center">
                <h5 class="card-title">Critical/Out of Stock</h5>
                <p class="card-text display-6" id="balanceCriticalStock">
                {{
                    collect($company_materials)
                        ->filter(fn($m) => ($m->threshold_quantity ?? 0) <= 0)
                        ->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''))
                        ->count()
                }}
                </p>
                </div>
                </div>
            </div>
            </div>

            <!-- Balance Alert Table -->
            <h4 class="mt-4">Material Balance Alerts</h4>
            <div class="table-responsive">
            <table class="table table-striped" id="balanceAlertTable">
                <thead>
                <tr>
                <th>Material Name</th>
                <th>Company</th>
                <th>Current Stock</th>
                <th>Minimum Balance</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @php
                $uniqueMaterials = collect($company_materials)->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''));
                @endphp
                @foreach($uniqueMaterials as $material)
                @php
                $qty = $material->threshold_quantity ?? 0;
                $min = $material->material->reorder_level ?? 10;
                $status = $qty <= 0 ? 'Critical' : ($qty <= $min ? 'Low' : 'Sufficient');
                $badge = $qty <= 0 ? 'danger' : ($qty <= $min ? 'warning' : 'success');
                @endphp
                <tr>
                <td>{{ $material->material->material ?? 'Unknown Material' }}</td>
                <td>{{ $material->company->company_name ?? 'Unknown Company' }}</td>
                <td>{{ $qty }}</td>
                <td>{{ $min }}</td>
                <td>
                    <span class="badge bg-{{ $badge }}">{{ $status }}</span>
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>

            <!-- Company-Wise Summary -->
            <h4 class="mt-4">Company-Wise Balance Summary</h4>
            <div class="row" id="companySummaryRow">
            @php
                $companyGroups = collect($company_materials)->groupBy(fn($m) => $m->company->company_name ?? 'Unknown Company');
            @endphp
            @foreach($companyGroups as $companyName => $materials)
                @php
                $uniqueCompanyMaterials = $materials->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''));
                $total = $uniqueCompanyMaterials->count();
                $low = $uniqueCompanyMaterials->filter(fn($m) => ($m->threshold_quantity ?? 0) > 0 && ($m->threshold_quantity ?? 0) <= ($m->material->reorder_level ?? 10))->count();
                $critical = $uniqueCompanyMaterials->filter(fn($m) => ($m->threshold_quantity ?? 0) <= 0)->count();
                $sufficient = $uniqueCompanyMaterials->filter(fn($m) => ($m->threshold_quantity ?? 0) > ($m->material->reorder_level ?? 10))->count();
                $percentLow = $total ? round(($low / $total) * 100) : 0;
                $percentCritical = $total ? round(($critical / $total) * 100) : 0;
                $percentSufficient = $total ? round(($sufficient / $total) * 100) : 0;
                @endphp
                <div class="col-md-4 mb-3">
                <div class="card bg-light">
                <div class="card-body text-center">
                <h5 class="card-title">{{ $companyName }}</h5>
                <p class="text-muted mb-1">Critical: {{ $critical }} / {{ $total }}</p>
                <div class="progress mb-2" style="height: 18px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percentCritical }}%;" aria-valuenow="{{ $percentCritical }}" aria-valuemin="0" aria-valuemax="100">{{ $percentCritical }}%</div>
                </div>
                <p class="text-muted mb-1">Low stock: {{ $low }} / {{ $total }}</p>
                <div class="progress mb-2" style="height: 18px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentLow }}%;" aria-valuenow="{{ $percentLow }}" aria-valuemin="0" aria-valuemax="100">{{ $percentLow }}%</div>
                </div>
                <p class="text-muted mb-1">Sufficient: {{ $sufficient }} / {{ $total }}</p>
                <div class="progress" style="height: 18px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentSufficient }}%;" aria-valuenow="{{ $percentSufficient }}" aria-valuemin="0" aria-valuemax="100">{{ $percentSufficient }}%</div>
                </div>
                </div>
                </div>
                </div>
            @endforeach
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
                @php
                $uniqueMaterials = collect($company_materials)->unique('materialID');
                $totalMaterials = $uniqueMaterials->count();
                $highValueThreshold = 1000;
                $highValueMaterials = $uniqueMaterials->filter(function($m) use ($highValueThreshold) {
                    return ($m->threshold_quantity ?? 0) >= $highValueThreshold;
                })->count();
                $underutilizedThreshold = 10;
                $underutilizedMaterials = $uniqueMaterials->filter(function($m) use ($underutilizedThreshold) {
                    return ($m->threshold_quantity ?? 0) <= $underutilizedThreshold;
                })->count();
                @endphp
                <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Materials</h5>
                        <p class="card-text display-6">{{ $totalMaterials }}</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">High-Stock Materials</h5>
                        <p class="card-text display-6">{{ $highValueMaterials }}</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Low-Stock Materials</h5>
                        <p class="card-text display-6">{{ $underutilizedMaterials }}</p>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Graphical Representation -->
                <h4 class="mt-4">Material Distribution by Company</h4>
                @php
                // Prepare data for charts
                $companyMaterialCounts = collect($company_materials)
                    ->groupBy(fn($m) => $m->company->company_name ?? 'Unknown Company')
                    ->map(fn($group) => $group->unique('materialID')->count());

                $materialUsageByCompany = collect($company_materials)
                    ->groupBy(fn($m) => $m->company->company_name ?? 'Unknown Company')
                    ->map(function($group) {
                    return $group->sum(fn($m) => $m->threshold_quantity ?? 0);
                    });

                $materialDetails = collect($company_materials)
                    ->unique(fn($m) => $m->materialID . '-' . ($m->company->company_name ?? ''));
                @endphp
                <div class="row">
                <div class="col-md-6">
                    <canvas id="materialPieChart"></canvas>
                </div>
                <div class="col-md-6" style="height: 400px;">
                    <canvas id="materialBarChart" style="height: 100% !important;"></canvas>
                </div>
                </div>

                <!-- Detailed Table -->
                <h4 class="mt-4">Material Details</h4>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Material Name</th>
                        <th>Company</th>
                        <th>Available Quantity</th>
                        <th>Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($materialDetails as $material)
                        <tr>
                        <td>{{ $material->material->material ?? 'Unknown Material' }}</td>
                        <td>{{ $material->company->company_name ?? 'Unknown Company' }}</td>
                        <td>{{ $material->threshold_quantity ?? 0 }}</td>
                        <td>{{ $material->unit_of_measure ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="8" class="text-muted text-center">No material data available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                </div>
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
                <option value="">All Companies</option>
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
                <thead>
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
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('usageChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasets, JSON_UNESCAPED_SLASHES) !!}
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Material Usage by Material',
                    font: { size: 16 }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    position: 'bottom'
                }
            },
            scales: {
                x: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Units Used'
                    }
                }
            }
        }
    });
});
</script>
<script>
        // Live filtering for Balance Alert Report
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('balanceAlertTable');
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const searchInput = document.getElementById('balanceSearch');
            const companyFilter = document.getElementById('balanceCompanyFilter');

            function filterRows() {
            const search = searchInput.value.trim().toLowerCase();
            const company = companyFilter.value.trim().toLowerCase();

            let total = 0, low = 0, critical = 0;

            rows.forEach(row => {
                const material = row.children[0].textContent.toLowerCase();
                const comp = row.children[1].textContent.toLowerCase();
                const qty = parseInt(row.children[2].textContent, 10);
                const min = parseInt(row.children[3].textContent, 10);

                let show = true;
                if (search && !(material.includes(search) || comp.includes(search))) show = false;
                if (company && comp !== company) show = false;

                row.style.display = show ? '' : 'none';

                if (show) {
                total++;
                if (qty <= 0) critical++;
                else if (qty > 0 && qty <= min) low++;
                }
            });

            // Update summary cards
            document.getElementById('balanceTotalMaterials').textContent = total;
            document.getElementById('balanceLowStock').textContent = low;
            document.getElementById('balanceCriticalStock').textContent = critical;
            }

            searchInput.addEventListener('input', filterRows);
            companyFilter.addEventListener('change', filterRows);
        });
        </script>
      <script>
            document.addEventListener('DOMContentLoaded', function () {
            // Pie Chart: Number of unique materials per company
            const pieCtx = document.getElementById('materialPieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                labels: {!! json_encode($companyMaterialCounts->keys()) !!},
                datasets: [{
                    label: 'Materials per Company',
                    data: {!! json_encode($companyMaterialCounts->values()) !!},
                    backgroundColor: [
                    '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8BC34A', '#E91E63'
                    ]
                }]
                },
                options: {
                plugins: {
                    title: {
                    display: true,
                    text: 'Unique Materials per Company'
                    }
                }
                }
            });

            // Bar Chart: Total available quantity per company
            const barCtx = document.getElementById('materialBarChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                labels: {!! json_encode($materialUsageByCompany->keys()) !!},
                datasets: [{
                    label: 'Total Available Quantity',
                    data: {!! json_encode($materialUsageByCompany->values()) !!},
                    backgroundColor: '#36A2EB'
                }]
                },
                options: {
                plugins: {
                    title: {
                    display: true,
                    text: 'Total Material Quantity by Company'
                    }
                },
                scales: {
                    y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantity'
                    }
                    }
                }
                }
            });
            });
        </script>   
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('customReportTable');
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const materialFilter = document.getElementById('materialFilter');
            const companyFilter = document.getElementById('companyFilter');
            const statusFilter = document.getElementById('statusFilter');
            document.getElementById('filterButton').addEventListener('click', function() {
            const material = materialFilter.value.trim().toLowerCase();
            const company = companyFilter.value.trim().toLowerCase();
            const status = statusFilter.value.trim().toLowerCase();
            rows.forEach(row => {
                const mat = row.getAttribute('data-material').toLowerCase();
                const comp = row.getAttribute('data-company').toLowerCase();
                const stat = row.getAttribute('data-status').toLowerCase();
                let show = true;
                if (material && mat !== material) show = false;
                if (company && comp !== company) show = false;
                if (status && stat !== status) show = false;
                row.style.display = show ? '' : 'none';
            });
            });
        });

        function exportToCSV() {
            const table = document.getElementById('customReportTable');
            let csv = [];
            const rows = table.querySelectorAll('tr');
            for (let row of rows) {
            let cols = Array.from(row.querySelectorAll('th,td')).map(td => `"${td.innerText.replace(/"/g, '""')}"`);
            csv.push(cols.join(','));
            }
            const blob = new Blob([csv.join('\n')], { type: 'text/csv' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'custom_report.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function generateChart() {
            const chartContainer = document.getElementById('chartContainer');
            chartContainer.style.display = 'block';
            const ctx = document.getElementById('customReportChart').getContext('2d');
            // Gather visible rows for chart data
            const rows = Array.from(document.querySelectorAll('#customReportTable tbody tr')).filter(r => r.style.display !== 'none');
            const labels = rows.map(r => r.children[0].innerText + ' (' + r.children[1].innerText + ')');
            const data = rows.map(r => parseInt(r.children[2].innerText, 10));
            if (window.customReportChartInstance) window.customReportChartInstance.destroy();
            window.customReportChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                label: 'Stock Quantity',
                data: data,
                backgroundColor: '#36A2EB'
                }]
            },
            options: {
                scales: {
                y: { beginAtZero: true }
                }
            }
            });
        }
    
    function generateChart() {
        const chartContainer = document.getElementById('chartContainer');
        chartContainer.style.display = 'block';
        const ctx = document.getElementById('customReportChart').getContext('2d');
        // Gather visible rows for chart data
        const rows = Array.from(document.querySelectorAll('#customReportTable tbody tr')).filter(r => r.style.display !== 'none');
        const labels = rows.map(r => r.children[0].innerText + ' (' + r.children[1].innerText + ')');
        const data = rows.map(r => parseInt(r.children[2].innerText, 10));
        if (window.customReportChartInstance) window.customReportChartInstance.destroy();
        window.customReportChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
            label: 'Stock Quantity',
            data: data,
            backgroundColor: '#36A2EB'
            }]
        },
        options: {
            plugins: {
            title: {
                display: true,
                text: 'Material Stock by Company'
            }
            },
            scales: {
            y: { beginAtZero: true }
            }
        }
        });
    }
    
        </script>     
@endsection
</x-layouts.admin-app>
