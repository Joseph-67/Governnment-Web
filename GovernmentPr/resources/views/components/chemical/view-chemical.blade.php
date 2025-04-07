<x-layouts.admin-app>
@section('PageTitle', 'Company Profile')
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="py-2">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-long-arrow-alt-left"></i>
                Back
            </a>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white" data-bs-toggle="collapse" data-bs-target="#chemicalDetails" aria-expanded="true" aria-controls="chemicalDetails">
                    <h3 class="card-title mb-0">{{ $CompanyChemical->company->company_name }}</h3>
                </div>
                <div id="chemicalDetails" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-capitalize"><strong>Chemical Name:</strong> {{ $CompanyChemical->chemical->name }}</p>
                                <p class="text-capitalize"><strong>Chemical Category:</strong> {{ $CompanyChemical->chemical->chemical_category }}</p>
                                <p><strong>Chemical Description:</strong> {{ $CompanyChemical->chemical->description }}</p>
                                <p><strong>Chemical Formula:</strong> {!! $CompanyChemical->chemical->formula !!}</p>
                                <p><strong>Chemical CAS:</strong> {{ $CompanyChemical->chemical->cas_number }}</p>
                                <p class="text-capitalize"><strong>Chemical Hazard:</strong> {{ $CompanyChemical->chemical->hazard_information }}</p>
                                <p class="text-capitalize"><strong>Chemical First Aid:</strong> {{ $CompanyChemical->chemical->first_aid }}</p>
                                <p class="text-capitalize"><strong>Chemical Accidental Release:</strong> {{ $CompanyChemical->chemical->accidental_release }}</p>
                                <p><strong>Chemical Storage Handling:</strong> {{ $CompanyChemical->chemical->storage_handling }}</p>
                                <p class="text-capitalize"><strong>Chemical Disposal:</strong> {{ $CompanyChemical->chemical->disposal }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white" data-bs-toggle="collapse" data-bs-target="#transactionDetails" aria-expanded="true" aria-controls="transactionDetails">
                    <h3 class="card-title mb-0">Check In and Check Out Transactions</h3>
                </div>
                <div id="transactionDetails" class="collapse show">
                    <div class="card-body">
                    <div class="dropdown ms-auto my-3">
                            <a href="#" class="btn bt btn-light dropdown-toggle float-end" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                                <i class="icofont-calendar fs-5 me-1"></i> This Year<i class="las la-angle-down ms-1"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" data-period="this_week">This Week</a></li>
                                <li><a class="dropdown-item" data-period="last_week">Last Week</a></li>
                                <li><a class="dropdown-item" data-period="this_month">This Month</a></li>
                                <li><a class="dropdown-item" data-period="last_month">Last Month</a></li>
                                <li><a class="dropdown-item" data-period="this_year">This Year</a></li>
                                <li><a class="dropdown-item" data-period="last_year">Last Year</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button id="download-csv" class="btn btn-primary">Download Metrics</button>
                        </div>
                        <div id="selected-period-label" class="mt-2">Selected Period: This Year</div>
                        <div id="reports-bar" class="apex-charts pill-bar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning text-white" data-bs-toggle="collapse" data-bs-target="#stockTransactions" aria-expanded="true" aria-controls="stockTransactions">
                    <h3 class="card-title mb-0">Chemical Stock Transactions</h3>
                </div>
                <div id="stockTransactions" class="collapse show">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Quantity ({{$CompanyChemical->unit}})</th>
                                    <th class="border-top-0">Movement Type</th>
                                    <th class="border-top-0">Calendar Yr.</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CompanyChemical->stockMovements as $transaction)
                                <tr>
                                <td>{{ $transaction->quantity }}</td>
                                <td class="text-capitalize"> 
                                    {{ $transaction->movement_type }} 
                                    @if ($transaction->movement_type == 'in')
                                        <i class="fas fa-caret-up text-success font-16"></i>
                                    @endif
                                    @if ($transaction->movement_type == 'out')
                                        <i class="fas fa-caret-down text-danger font-16"></i>
                                    @endif
                                </td>
                                <td>{{ $transaction->calendar_year }}</td>
                                <td>
                                    @php
                                        $date = Carbon\Carbon::create($transaction->movement_date);
                                        echo $date->format('l, d F Y');
                                    @endphp
                                </td>
                                <td>{{ $transaction->remark }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="table-responsive mt-4">
                            <table class="table table-striped mb-0" id="tbl-chemical-management-records">
                                <tbody>
                                    <tr>
                                        <td>Chemical Balance</td>
                                        <td>Total Chemical Inflow: {{ $availableChemicalInflowBalance }} {{ $CompanyChemical->unit }}</td>
                                        <td>Total Chemical Outflow: {{ $availableChemicalOutflowBalance }} {{ $CompanyChemical->unit }}</td>
                                        <td>Total Chemical Recycled: {{ $availableChemicalAdjustmentBalance }} {{ $CompanyChemical->unit }}</td>
                                        <td>Total Balance: {{ $availableChemicalBalance }} {{ $CompanyChemical->unit }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-outline-primary btn-sm">View Details</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
const stock_analysis = async (period, company_chemical_id) => {
    const url = new URL("{{ route('admin.chemical-stock-analysis') }}");
    url.searchParams.append("period", period);
    url.searchParams.append("company_chemical_id", company_chemical_id);

    const response = await fetch(url.toString());
    if (response.status === 404) {
        document.querySelector("#reports-bar").innerHTML = "<p>No data available for the selected period.</p>";
        return;
    }
    const resp = await response.json();

    const analysisData = {};
    let categories = [];
    const currentDate = new Date();

    // Generate categories based on period
    if (period === "this_month") {
        const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
        categories = Array.from({ length: daysInMonth }, (_, i) => `${i + 1}`);
    } else if (period === "last_month") {
        const lastMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
        const lastMonthDays = new Date(lastMonth.getFullYear(), lastMonth.getMonth() + 1, 0).getDate();
        categories = Array.from({ length: lastMonthDays }, (_, i) => `${i + 1}`);
    } else if (period === "this_week" || period === "last_week") {
        const weekStart = new Date(currentDate);
        weekStart.setDate(currentDate.getDate() - (period === "last_week" ? currentDate.getDay() + 7 : currentDate.getDay()));
        weekStart.setHours(0, 0, 0, 0);
        categories = Array.from({ length: 7 }, (_, i) => {
            const day = new Date(weekStart);
            day.setDate(weekStart.getDate() + i);
            return day.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
        });
    } else if (period === "this_year" || period === "last_year") {
        categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    }

    // Process data
    resp.forEach((item) => {
        const movementDate = new Date(item.movement_date);
        const movementType = item.movement_type;

        let categoryIndex;
        if (period === "this_month" || period === "last_month") {
            categoryIndex = movementDate.getDate() - 1;
        } else if (period === "this_week" || period === "last_week") {
            const formattedDate = movementDate.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
            categoryIndex = categories.indexOf(formattedDate);
        } else {
            categoryIndex = movementDate.getMonth();
        }

        if (!analysisData[movementType]) {
            analysisData[movementType] = Array(categories.length).fill(0);
        }

        analysisData[movementType][categoryIndex] += parseFloat(item.quantity);
    });

    // Prepare chart series
    const seriesData = Object.entries(analysisData).map(([key, data]) => ({
        name: key,
        data: data,
    }));

    // Configure chart options with site-matching color gradients
    const chartOptions = {
        series: seriesData,
        chart: {
            toolbar: { show: false },
            type: "bar",
            stacked: true,
            height: 300,
        },
        xaxis: {
            categories: categories,
        },
        legend: {
            position: "top",
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.25,
                gradientToColors: ['#17a2b8', '#28a745', '#ffc107'], // site-matching colors
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
            },
        },
        colors: ['#17a2b8', '#28a745', '#ffc107'], // site-matching colors
    };

    // Render chart
    const chartContainer = document.querySelector("#reports-bar");
    chartContainer.innerHTML = "";
    const chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
}

document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault();
        const period = event.target.getAttribute('data-period');
        document.getElementById('selected-period-label').innerText = `Selected Period: ${event.target.innerText}`;
        stock_analysis(period, "{{ $CompanyChemical->company_chemical_id }}");
    });
});
// Initialize with default period
stock_analysis("this_year", "{{ $CompanyChemical->company_chemical_id }}");

</script>
@endsection                
</x-layouts.admin-app>
