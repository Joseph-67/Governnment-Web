<x-layouts.admin-app>
    @section('PageTitle', 'Company Material')
    <div class="container-xxl">
        <div class="row justify-content-center">
        <div class="py-2">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-long-arrow-alt-left"></i>
                Back
            </a>
        </div>
            <!-- Material Details -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="card shadow-sm bg-light">
                <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">Material Details</h4>
                </div>
                <div class="card-body">
                @foreach([
                    'Material Name' => $company_material->material->material,
                    'Category Name' => DB::table('materials')
                    ->join('categories', 'materials.categoryID', '=', 'categories.categoryID')
                    ->where('materials.materialID', '=', $company_material->materialID)
                    ->first(['category_name'])->category_name ?? 'N/A',
                    'Description' => $company_material->material->description,
                    'Latest Material Price' => isset($prices->price) ? '₦' . number_format($prices->price, 2) : 'N/A',
                    'Unit Of Measure' => $company_material->unit_of_measure,
                    'Serial Number' => $company_material->serial_number
                ] as $label => $value)
                    <div class="d-flex align-items-center border-bottom py-2">
                    <div class="flex-grow-1">
                        <h6 class="mb-0 text-muted">{{ $label }}:</h6>
                        <span class="fw-bold">{{ $value }}</span>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
            </div>

            <!-- Metrics -->
            <div class="col-12 col-md-6 col-lg-9 mb-3">
            <div class="card shadow-sm bg-light">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Metrics</h4>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="icofont-calendar fs-5 me-1"></i> This Year
                    </button>
                    <ul class="dropdown-menu">
                    @foreach(['this_week' => 'This Week', 'last_week' => 'Last Week', 'this_month' => 'This Month', 'last_month' => 'Last Month', 'this_year' => 'This Year', 'last_year' => 'Last Year'] as $period => $label)
                        <li><a class="dropdown-item" data-period="{{ $period }}">{{ $label }}</a></li>
                    @endforeach
                    </ul>
                </div>
                </div>
                <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                    <button id="download-csv" class="btn btn-primary mb-2 mb-md-0">Download Metrics</button>
                    <div id="selected-period-label" class="text-muted">Selected Period: This Year</div>
                </div>
                <div id="reports-bar" class="apex-charts"></div>
                </div>
            </div>
            </div>
        </div>

        <div class="row">
            <!-- Price History -->
            <div class="col-lg-3">
                <div class="card shadow-sm bg-light">
                    <div class="card-header bg-warning text-white">
                        <h4 class="card-title mb-0">Price History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>Price (₦)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($price_history as $priceList)
                                        <tr>
                                            <td>{{ number_format($priceList->price, 2) }}</td>
                                            <td>{{ Carbon\Carbon::create($priceList->date)->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">No price history available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Management -->
            <div class="col-lg-9">
                <div class="card shadow-sm bg-light">
                    <div class="card-header bg-danger text-white">
                        <h4 class="card-title mb-0">Stock Management</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Movement Type</th>
                                        <th>Calendar Yr.</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stockMovement as $stock)
                                        <tr>
                                            <td>{{ $stock->quantity }}</td>
                                            <td class="text-capitalize">
                                                {{ $stock->movement_type }}
                                                @if ($stock->movement_type == 'in')
                                                    <i class="fas fa-caret-up text-success"></i>
                                                @elseif ($stock->movement_type == 'out')
                                                    <i class="fas fa-caret-down text-danger"></i>
                                                @endif
                                            </td>
                                            <td>{{ $stock->calendar_year }}</td>
                                            <td>{{ Carbon\Carbon::create($stock->movement_date)->format('l, d F Y') }}</td>
                                            <td>{{ $stock->remark }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No stock movement data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-muted d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Material Balance:</strong>
                            <span>Total Inflow: {{ $availableMaterialInflowBalance }} {{ $company_material->unit_of_measure }}</span> |
                            <span>Total Outflow: {{ $availableMaterialOutflowBalance }} {{ $company_material->unit_of_measure }}</span> |
                            <span>Adjustments: {{ $availableMaterialAdjustmentBalance }} {{ $company_material->unit_of_measure }}</span> |
                            <span>Balance: {{ $availableMaterialBalance }} {{ $company_material->unit_of_measure }}</span>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary btn-sm">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script src="{{ asset('adminAssets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
const stock_analysis = async (period, material_id) => {
    const url = new URL("{{ route('admin.material-stock-analysis') }}");
    url.searchParams.append("period", period);
    url.searchParams.append("company_material_id", material_id);

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
                gradientToColors: ['#ff5733', '#33ff57', '#3357ff'], // site-matching colors
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
            },
        },
        colors: ['#ff5733', '#33ff57', '#3357ff'], // site-matching colors
    };

    // Render chart
    const chartContainer = document.querySelector("#reports-bar");
    chartContainer.innerHTML = "";
    const chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
}

// Handle dropdown clicks
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault();
        const period = event.target.getAttribute('data-period');
        document.getElementById('selected-period-label').innerText = `Selected Period: ${event.target.innerText}`;
        stock_analysis(period, "{{ $company_material->companyMaterialId }}");
    });
});

// Initialize with default period
stock_analysis("this_year", "{{ $company_material->companyMaterialId }}");
</script>

    
    <!-- dowload metrics -->
    <script>
        document.getElementById('download-csv').addEventListener('click', () => {
            const rows = [
            ["Quantity", "Movement Type", "Calendar Yr.", "Date", "Remark"],
            ...Array.from(document.querySelectorAll('.col-lg-9 table tbody tr')).map(row => 
                Array.from(row.querySelectorAll('td')).map(cell => cell.innerText)
            )
            ];

            const csvContent = rows.map(e => e.join(",")).join("\n");
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);

            const link = document.createElement("a");
            link.setAttribute("href", url);
            link.setAttribute("download", "material_stock_movement.csv");
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
   
    @endsection
</x-layouts.admin-app>
