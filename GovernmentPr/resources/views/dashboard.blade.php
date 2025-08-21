<x-layouts.admin-app>
@section('PageTitle', 'Waste Reduction Dashboard')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
<style>
    .thumb-xl { width: 60px; height: 60px; }
    .card:hover { transform: translateY(-3px); transition: 0.3s; }
</style>
@endsection

<div class="container-xxl">
    @php
        $companiesData = \App\Models\CompanyUsers::getCompaniesWithEfficiencyForUser(auth()->id());
        $totalManaged = count($companiesData);
        $auditedCount = $companiesData->filter(fn($c) => $c['status'] === 'approved')->count();
        $disapprovedCount = $companiesData->filter(fn($c) => $c['status'] === 'disapproved')->count();
        $pendingCount = $companiesData->filter(fn($c) => $c['status'] === 'pending')->count();
        $wasteReduction = $companiesData->avg('efficiency') ?? 0; // average waste reduction %
    @endphp

    <!-- Metric Cards -->
    <div class="row g-4">
        @php
            $cards = [
                ['title'=>'Managed Companies','value'=>$totalManaged,'week'=>\App\Models\CompanyUsers::countCompaniesThisWeekForUser(auth()->id()),'icon'=>'iconoir-building','color'=>'secondary'],
                ['title'=>'Audited','value'=>$auditedCount,'week'=>\App\Models\CompanyUsers::AuditedThisWeekForUser(auth()->id())->count(),'icon'=>'iconoir-task-list','color'=>'success'],
                ['title'=>'Non-Compliant','value'=>$disapprovedCount,'week'=>\App\Models\CompanyUsers::DisapprovedThisWeekForUser(auth()->id())->count(),'icon'=>'iconoir-warning-triangle','color'=>'danger'],
                ['title'=>'Pending Audit','value'=>$pendingCount,'week'=>\App\Models\CompanyUsers::PendingThisWeekForUser(auth()->id())->count(),'icon'=>'iconoir-clock','color'=>'warning'],
                ['title'=>'Waste Reduction','value'=>round($wasteReduction,1),'week'=>'+1% This Year','icon'=>'fas fa-recycle','color'=>'info'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="col-md-6 col-lg-4">
            <div class="card border-{{ $card['color'] }}">
                <div class="card-body">
                    <div class="row d-flex justify-content-between align-items-center pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-1 fw-semibold fs-5">{{ $card['title'] }}</p>
                            <h3 class="mt-1 mb-0 fw-bold text-{{ $card['color'] }}" data-target="{{ $card['value'] }}">0 @if($card['title']=='Waste Reduction') % @endif</h3>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto border border-{{ $card['color'] }}">
                                <i class="{{ $card['icon'] }} h1 align-self-center mb-0 text-{{ $card['color'] }}"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-muted mt-3">
                        <span class="fw-bold text-{{ $card['color'] }}">{{ $card['week'] }}</span> @if($card['title'] != 'Waste Reduction')This Week @endif

                    </p>

                    @if($card['title'] == 'Waste Reduction')
                    <div class="progress mt-2" style="height:6px;">
                        <div class="progress-bar bg-{{ $card['color'] }}" role="progressbar" style="width:0%;"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Charts Row -->
    <div class="row mt-4 g-4">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header"><h4 class="card-title mb-0">Waste Efficiency by Company</h4></div>
                <div class="card-body"><div id="waste-efficiency-bar"></div></div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header"><h4 class="card-title mb-0">Waste Efficiency Distribution</h4></div>
                <div class="card-body"><div id="waste-efficiency-pie"></div></div>
            </div>
        </div>
    </div>

    <!-- Companies Table -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title mb-0">Companies Managed</h4></div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th class="text-end">Status</th>
                                    <th class="text-end">Last Audited</th>
                                    <th class="text-end">Waste Efficiency</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companiesData as $company)
                                <tr>
                                    <td>{{ $company['company_name'] ?? '-' }}</td>
                                    <td>{{ $company['email'] ?? '-' }}</td>
                                    <td class="text-end">
                                        @if($company['status'] === 'approved')<span class="badge bg-success">Compliant</span>
                                        @elseif($company['status'] === 'pending')<span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($company['status'] === 'disapproved')<span class="badge bg-danger">Non-Compliant</span>
                                        @else <span class="badge bg-secondary">Not Registered</span>@endif
                                    </td>
                                    <td class="text-end">{{ $company['last_audited'] ? \Carbon\Carbon::parse($company['last_audited'])->format('Y-m-d') : '-' }}</td>
                                    <td class="text-end">{{ $company['efficiency'] ?? '0' }}%</td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">No companies found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    // Animate counters & progress bars
    document.querySelectorAll('[data-target]').forEach(el => {
        const target = parseFloat(el.dataset.target);
        let count = 0;
        const step = () => {
            count += target/60;
            if(count < target){ el.textContent = count.toFixed(1) + (el.textContent.includes('%') ? '%' : ''); requestAnimationFrame(step);}
            else { el.textContent = target + (el.textContent.includes('%') ? '%' : ''); }
        };
        step();
    });

    document.querySelectorAll('.progress-bar').forEach((bar,i)=>{
        const target = parseFloat(document.querySelectorAll('[data-target]')[i].dataset.target) || 0;
        bar.style.width = target + '%';
    });

    // Charts
    const companies = @json($companiesData->pluck('company_name'));
    const efficiencies = @json($companiesData->pluck('efficiency'));

    const colors = ['#28a745','#17a2b8','#ffc107','#dc3545','#6f42c1','#fd7e14'];

    // Bar Chart
    new ApexCharts(document.querySelector("#waste-efficiency-bar"), {
        chart:{type:'bar',height:320},
        series:[{name:'Waste Efficiency (%)',data:efficiencies}],
        xaxis:{categories:companies},
        yaxis:{title:{text:'Waste Efficiency (%)'},max:100},
        colors:colors,
        plotOptions:{bar:{columnWidth:'50%'}},
        dataLabels:{enabled:true},
        tooltip:{y:{formatter:val=>val+'%'}}
    }).render();

    // Pie Chart
    new ApexCharts(document.querySelector("#waste-efficiency-pie"),{
        chart:{type:'pie',height:320},
        series:efficiencies,
        labels:companies,
        legend:{position:'bottom'},
        colors:colors,
        tooltip:{y:{formatter:val=>val+'%'}},
        plotOptions:{pie:{expandOnClick:true}}
    }).render();

});
</script>
@endsection
</x-layouts.admin-app>
