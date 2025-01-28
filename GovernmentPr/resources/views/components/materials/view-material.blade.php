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
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->

                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Material Name:</h5><span>{{ $material->material }}</span>
                            </div><!--end media-body-->
                        </div><!--end media-->

                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Category Name:</h5><span>
                                    @php
                                    $category = DB::table('materials')->join('categories', 'materials.categoryID', '=', 'categories.categoryID')->where('materials.materialID', '=', $material->materialID)->first(['category_name']);
                                    @endphp
                                    {{ $category->category_name }}
                                </span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Description:</h5><span>{{ $material->description }}</span>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Latest Material Price:</h5><span>{{ isset($prices->price) ? '₦'.number_format($prices->price, 2) : "" }}</span>
                            </div><!--end media-body-->
                        </div><!--end media-->
                        
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Unit Of Measure:</h5><span>{{$material -> unit_of_measure}}</span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Serial Number:</h5><span>{{$material -> serial_number}}</span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Metrics</h4>
                            </div><!--end col-->
                            <div class="card-body pt-0">
    <!-- Period Switching Dropdown -->
    <div class="dropdown ms-auto my-3">
    <button class="btn btn-primary dropdown-toggle float-end" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Select Period
    </button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" data-period="this_year">This Year</a></li>
    <li><a class="dropdown-item" data-period="last_year">Last Year</a></li>
    <li><a class="dropdown-item" data-period="monthly">This Month</a></li>
    <li><a class="dropdown-item" data-period="last_week">Last Week</a></li>
    <li><a class="dropdown-item" data-period="previous_day">Previous Day</a></li>
  </ul>
</div>
<div class="btn-group">
<!-- <button id="download-png" class="btn btn-secondary">Download PNG</button>
<button id="download-svg" class="btn btn-secondary">Download SVG</button> -->
<button id="download-csv" class="btn btn-secondary">Download Metrics</button>
</div>

<!-- Label for selected period -->
<div id="selected-period-label" class="mt-2">Selected Period: This Year</div>


    <!-- Chart Container -->
    <div id="reports-bar" class="apex-charts pill-bar"></div>
</div>


                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div id="reports-bar" class="apex-charts pill-bar"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Price History</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
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
                                    @foreach($price_history as $priceList )
                                    <tr>
                                        <td>{{number_format($priceList -> price, 2)}}</td>
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
            </div> <!-- end col -->
            <!--end col-->
            <div class="col-lg-9">
                        <div class="card card-h-100">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Stock Management</h4>
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
                                                <th class="border-top-0">Qauntity</th>
                                                <th class="border-top-0">Movement Type</th>
                                                <th class="border-top-0">Calendar Yr.</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">Remark</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>
                                        <tbody>
                                            @foreach($stockMovement as $stock)
                                            <tr>
                                                <td>{{ $stock->quantity }}</td>
                                                <td class="text-capitalize"> {{ $stock->movement_type }} 
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
                                                <td>
                                                    {{ $stock->remark }}
                                                </td>
                                            </tr>
                                          
                                            <!--end tr-->
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <!--end /div-->
                                <!-- <p class="m-0 fs-12 fst-italic ps-2 text-muted">Last data updated - 13min ago <a href="#!" class="link-danger ms-1 "><i class="align-middle iconoir-refresh"></i></a></p> -->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
        </div> <!-- end row -->
    </div><!-- container -->
    @section('scripts')
    <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <!-- <script src="{{asset('adminAssets/js/pages/analytics-reports.init.js')}}"></script> -->
     <script>
let stock_analysis = async (period, company) => {
    const url = new URL("{{ route('admin.stock-analysis') }}");
    url.searchParams.append("query", period);
    url.searchParams.append("company", company);
    const response = await fetch(url.toString());
    const resp = await response.json();

    const monthlyData = {};
    const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentDay = currentDate.getDate();
    const currentYear = currentDate.getFullYear();
    const lastYear = currentYear - 1; // Calculate last year

    // Dates for last week and previous day
    const lastWeekStartDate = new Date(currentDate);
    lastWeekStartDate.setDate(currentDate.getDate() - currentDate.getDay() - 6);

    const lastWeekEndDate = new Date(currentDate);
    lastWeekEndDate.setDate(currentDate.getDate() - currentDate.getDay());

    const previousDay = new Date(currentDate);
    previousDay.setDate(currentDate.getDate() - 1);

    resp.forEach((item) => {
        const movementDate = new Date(item.movement_date);
        const movementType = item.movement_type;
        const month = movementDate.getMonth();
        const year = movementDate.getFullYear();

        // Filter by period
        if (period === "this_year" && year !== currentYear) return;
        if (period === "last_year" && year !== lastYear) return; // Filter for last year
        if (period === "monthly" && month !== currentMonth) return;
        if (period === "previous_day" && movementDate.toDateString() !== previousDay.toDateString()) return;
        if (period === "last_week" && (movementDate < lastWeekStartDate || movementDate > lastWeekEndDate)) return;

        if (!monthlyData[movementType]) {
            monthlyData[movementType] = new Array(12).fill(0);
        }

        monthlyData[movementType][month] += parseFloat(item.quantity);
    });

    const seriesData = Object.entries(monthlyData).map(([key, data]) => ({
        name: key,
        data: data
    }));

    const chartOptions = {
        series: seriesData,
        chart: {
            toolbar: { show: false },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 292,
            stacked: true,
            offsetX: -15
        },
        colors: ["var(--bs-primary)", "var(--bs-secondary)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "80%",
                columnWidth: "12%",
                borderRadius: [3],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all"
            }
        },
        dataLabels: { enabled: false },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "right",
            markers: {
                width: 12,
                height: 12,
                radius: 3
            }
        },
        grid: {
            show: true,
            strokeDashArray: 3,
            padding: { top: 0, bottom: 0, right: 0 },
            borderColor: "rgba(0,0,0,0.05)",
            xaxis: { lines: { show: true } },
            yaxis: { lines: { show: false } }
        },
        yaxis: { tickAmount: 4 },
        xaxis: {
            axisBorder: { show: false },
            axisTicks: { show: false },
            categories: categories
        }
    };

    const chartContainer = document.querySelector("#reports-bar");
    const chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();

    document.getElementById("download-csv").addEventListener("click", () => {
        downloadCSV(resp, period);
    });
};

const downloadCSV = (data, period) => {
    const csvHeader = "Movement Date,Movement Type,Quantity\n";
    const csvRows = data.map(
        (item) => `${item.movement_date},${item.movement_type},${item.quantity}`
    );
    const csvContent = csvHeader + csvRows.join("\n");

    const blob = new Blob([csvContent], { type: "text/csv" });
    const url = URL.createObjectURL(blob);

    const link = document.createElement("a");
    link.href = url;
    link.download = `stock_analysis_${period}.csv`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

// Add an option for "Last Year" in the dropdown
document.querySelectorAll(".dropdown-item[data-period]").forEach((item) => {
    item.addEventListener("click", (e) => {
        e.preventDefault();
        const period = item.getAttribute("data-period");

        document.getElementById("selected-period-label").textContent = `Selected Period: ${period
            .charAt(0)
            .toUpperCase()}${period.slice(1).replace("_", " ")}`;
        stock_analysis(period, "{{$companyMaterialID}}");
    });
});

// Initial Call
stock_analysis("this_year", "{{$companyMaterialID}}");

     </script>
    @endsection
</x-layouts.admin.app>