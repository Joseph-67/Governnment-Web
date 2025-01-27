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
                                <h5 class="m-0">Latest Material Price:</h5><span>₦{{number_format($prices->price, 2)}}</span>
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
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" data-period="this_year">This Year</a></li>
        <li><a class="dropdown-item" href="#" data-period="last_week">Last Week</a></li>
        <li><a class="dropdown-item" href="#" data-period="previous_day">Previous Day</a></li>
        <li><a class="dropdown-item" href="#" data-period="monthly">This Month</a></li>
    </ul>
</div>
<div class="btn-group">
    <button class="btn btn-secondary" id="download-csv">Download CSV</button>
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

    // Process data for the chart
    const monthlyData = {};
    const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Get the current date
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth(); // 0 for Jan, 1 for Feb, etc.
    const currentDay = currentDate.getDate();
    const currentWeek = getWeekNumber(currentDate);

    // Get the start and end date of last week (Previous Monday to Sunday)
    const lastWeekStartDate = new Date(currentDate);
    const lastWeekEndDate = new Date(currentDate);

    // Set last week's start date to the last Monday
    lastWeekStartDate.setDate(currentDate.getDate() - currentDate.getDay() - 6); // Last Monday
    // Set last week's end date to the last Sunday
    lastWeekEndDate.setDate(currentDate.getDate() - currentDate.getDay()); // Last Sunday

    resp.forEach((item) => {
        const movementDate = new Date(item.movement_date);
        const movementType = item.movement_type;
        const month = movementDate.getMonth(); // Get the month of the stock movement
        const day = movementDate.getDate();
        const week = getWeekNumber(movementDate);

        // Filter data for the selected period
        if (period === "this_year" && movementDate.getFullYear() !== currentDate.getFullYear()) {
            return; // Skip data that is not for the current year
        }
        if (period === "monthly" && month !== currentMonth) {
            return; // Skip data that is not for this month
        }
        if (period === "previous_day" && day !== currentDay - 1) {
            return; // Skip data that is not for the previous day
        }
        if (period === "last_week" && (movementDate < lastWeekStartDate || movementDate > lastWeekEndDate)) {
            return; // Skip data that is not for the last week
        }

        // Initialize movementType if not already initialized
        if (!monthlyData[movementType]) {
            monthlyData[movementType] = new Array(12).fill(0);
        }

        // Accumulate data for the selected period
        monthlyData[movementType][month] += parseFloat(item.quantity);
    });

    const seriesData = Object.entries(monthlyData).map(([key, data]) => ({
        name: key,
        data: data
    }));

    // Chart configuration
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

    // Reinitialize and render the chart after re-fetching data
    const chartContainer = document.querySelector("#reports-bar");
    const chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();

    // Reattach event listeners for download buttons
    reattachDownloadListeners(chart, resp);
};

// Function to attach download button listeners
function reattachDownloadListeners(chart, resp) {
    document.getElementById("download-png").addEventListener("click", () => chart.exportChart({ type: "png" }));
    document.getElementById("download-svg").addEventListener("click", () => chart.exportChart({ type: "svg" }));
    document.getElementById("download-csv").addEventListener("click", () => {
        const csvData = resp.map(item => ({
            Date: item.movement_date,
            Type: item.movement_type,
            Quantity: item.quantity
        }));
        downloadCSV(csvData, "stock_analysis.csv");
    });
}

// Helper Function to Download CSV
function downloadCSV(data, filename) {
    const csvRows = [
        ["Date", "Type", "Quantity"],
        ...data.map(row => [row.Date, row.Type, row.Quantity])
    ];
    const csvContent = csvRows.map(e => e.join(",")).join("\n");
    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Get week number from date
function getWeekNumber(date) {
    const currentDate = new Date(date);
    const startDate = new Date(currentDate.getFullYear(), 0, 1);
    const days = Math.floor((currentDate - startDate) / (1000 * 60 * 60 * 24));
    return Math.ceil((days + startDate.getDay() + 1) / 7);
}

// Handle Period Switching
document.querySelectorAll(".dropdown-item[data-period]").forEach(item => {
    item.addEventListener("click", (e) => {
        e.preventDefault();
        const period = item.getAttribute("data-period");

        // Update selected period label
        document.getElementById("selected-period-label").textContent = `Selected Period: ${period.charAt(0).toUpperCase() + period.slice(1).replace("_", " ")}`;
        
        // Fetch and display stock data for the selected period
        stock_analysis(period, "{{$companyMaterialID}}");
    });
});

// Initial Call (first load)
stock_analysis("this_year", "{{$companyMaterialID}}");

     </script>
    @endsection
</x-layouts.admin.app>