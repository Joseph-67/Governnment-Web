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

            {{-- Restocking Report Tab --}}
            <div class="tab-pane fade" id="restocking" role="tabpanel" aria-labelledby="restocking-tab">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">Restocking Report</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Material</th>
                                    <th>Quantity Restocked</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentRestocking as $record)
                                    <tr>
                                        <td>{{ $record->material }}</td>
                                        <td>{{ $record->quantity }}</td>
                                        <td>{{ $record->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No restocking data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
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

            {{-- Detailed Resource Report Tab --}}
            <div class="tab-pane fade" id="detailed" role="tabpanel" aria-labelledby="detailed-tab">
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">Detailed Resource Report</div>
                    <div class="card-body">
                        {{-- Placeholder for detailed resource data --}}
                        <p>Detailed resource report content goes here.</p>
                    </div>
                </div>
            </div>

            {{-- Custom Report Tab --}}
            <div class="tab-pane fade" id="custom" role="tabpanel" aria-labelledby="custom-tab">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">Custom Report</div>
                    <div class="card-body">
                        {{-- Placeholder for custom report filters and results --}}
                        <p>Custom report content goes here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layouts.admin-app>
