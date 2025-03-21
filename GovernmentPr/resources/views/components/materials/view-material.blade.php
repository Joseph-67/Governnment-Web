<x-layouts.admin-app>
    @section('PageTitle', 'Company Material')
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Material Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Material Name:</h5><span>{{ $company_material->material->material }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Category Name:</h5><span>
                                    @php
                                        $category = DB::table('materials')
                                            ->join('categories', 'materials.categoryID', '=', 'categories.categoryID')
                                            ->where('materials.materialID', '=', $company_material->materialID)
                                            ->first(['category_name']);
                                    @endphp
                                    {{ $category->category_name }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Description:</h5><span>{{ $company_material->material->description }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Latest Material Price:</h5><span>{{ isset($prices->price) ? '₦'.number_format($prices->price, 2) : "" }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Unit Of Measure:</h5><span>{{ $company_material->unit_of_measure }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Serial Number:</h5><span>{{ $company_material->serial_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Metrics</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
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
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Price History</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Price Of Disposal (₦)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($price_history as $priceList)
                                        <tr>
                                            <td>{{ number_format($priceList->price, 2) }}</td>
                                            <td>
                                                @php
                                                    $start = Carbon\Carbon::now();
                                                    $end = Carbon\Carbon::create($priceList->date);
                                                    echo $start->diffForHumans($end);
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Stock Management</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Movement Type</th>
                                        <th class="border-top-0">Calendar Yr.</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stockMovement as $stock)
                                        <tr>
                                            <td>{{ $stock->quantity }}</td>
                                            <td class="text-capitalize">
                                                {{ $stock->movement_type }}
                                                @if ($stock->movement_type == 'in')
                                                    <i class="fas fa-caret-up text-success font-16"></i>
                                                @endif
                                                @if ($stock->movement_type == 'out')
                                                    <i class="fas fa-caret-down text-danger font-16"></i>
                                                @endif
                                            </td>
                                            <td>{{ $stock->calendar_year }}</td>
                                            <td>
                                                @php
                                                    $date = Carbon\Carbon::create($stock->movement_date);
                                                    echo $date->format('l, d F Y');
                                                @endphp
                                            </td>
                                            <td>{{ $stock->remark }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

            // Configure chart options with vibrant colors
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
                gradientToColors: ['#ff5733', '#33ff57', '#3357ff'], // vibrant colors
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
                },
            },
            colors: ['#ff5733', '#33ff57', '#3357ff'], // vibrant colors
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
            stock_analysis(period, "{{ $company_material->companyMaterialId }}");
            });
        });
        // Initialize with default period
        stock_analysis("this_year", "{{ $company_material->companyMaterialId }}");
    </script>

    </script>
    @endsection
</x-layouts.admin-app>
