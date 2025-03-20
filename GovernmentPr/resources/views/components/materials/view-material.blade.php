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
                                <h5 class="m-0">Material Name:</h5><span>{{ $material->material }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Category Name:</h5><span>
                                    @php
                                        $category = DB::table('materials')
                                            ->join('categories', 'materials.categoryID', '=', 'categories.categoryID')
                                            ->where('materials.materialID', '=', $material->materialID)
                                            ->first(['category_name']);
                                    @endphp
                                    {{ $category->category_name }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Description:</h5><span>{{ $material->description }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Latest Material Price:</h5><span>{{ isset($prices->price) ? '₦'.number_format($prices->price, 2) : "" }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Unit Of Measure:</h5><span>{{ $material->unit_of_measure }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Serial Number:</h5><span>{{ $material->serial_number }}</span>
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
                                <li><a class="dropdown-item" data-period="last_week">Last Week</a></li>
                                <li><a class="dropdown-item" data-period="previous_day">Previous Day</a></li>
                                <li><a class="dropdown-item" data-period="monthly">This Month</a></li>
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
        const fetchChemicalStockAnalysis = async (query, companyChemicalId) => {
    const url = new URL("{{ route('admin.chemical-stock-analysis') }}"); // Replace with actual route
    url.searchParams.append("query", query);
    url.searchParams.append("company_chemical_id", companyChemicalId);

    try {
        const response = await fetch(url.toString());
        if (!response.ok) {
            throw new Error("Failed to fetch data");
        }
        return await response.json();
    } catch (error) {
        console.error("Error fetching stock data:", error);
        return [];
    }
};

const analyzeStockData = (data) => {
    const monthlyData = {
        checkin: new Array(12).fill(0),
        checkout: new Array(12).fill(0),
    };

    data.forEach((item) => {
        const movementDate = new Date(item.movement_date);
        const month = movementDate.getMonth(); // 0 = January, 11 = December

        if (item.movement_type === "checkin") {
            monthlyData.checkin[month] += parseFloat(item.quantity);
        } else if (item.movement_type === "checkout") {
            monthlyData.checkout[month] += parseFloat(item.quantity);
        }
    });

    return monthlyData;
};

const renderStockChart = (monthlyData) => {
    const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const seriesData = [
        { name: "Checked In", data: monthlyData.checkin },
        { name: "Checked Out", data: monthlyData.checkout },
    ];

    const chartOptions = {
        series: seriesData,
        chart: {
            type: "bar",
            height: 350,
            stacked: true,
            toolbar: { show: false },
        },
        colors: ["#0d6efd", "#dc3545"], // Blue for checkin, red for checkout
        plotOptions: {
            bar: {
                columnWidth: "50%",
                borderRadius: 5,
            },
        },
        xaxis: {
            categories: categories,
            title: { text: "Months" },
        },
        yaxis: {
            title: { text: "Quantity" },
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
        },
    };

    const chartContainer = document.querySelector("#stock-analysis-chart");
    chartContainer.innerHTML = ""; // Clear previous chart
    const chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
};

const initializeStockAnalysis = async () => {
    const query = "this_year"; // Adjust based on selected query
    const companyChemicalId = "{{ $companyChemicalID }}"; // Replace with dynamic ID if needed

    const data = await fetchChemicalStockAnalysis(query, companyChemicalId);
    const monthlyData = analyzeStockData(data);
    renderStockChart(monthlyData);
};

// Run the analysis on page load
initializeStockAnalysis();

// Optionally add event listeners for user interaction (e.g., dropdown menu for queries)
document.querySelectorAll(".dropdown-item[data-query]").forEach((item) => {
    item.addEventListener("click", (e) => {
        e.preventDefault();
        const query = item.getAttribute("data-query");
        document.getElementById("selected-query-label").textContent = `Selected Query: ${query}`;
        fetchChemicalStockAnalysis(query, "{{ $companyChemicalID }}")
            .then(analyzeStockData)
            .then(renderStockChart);
    });
});

    </script>
    @endsection
</x-layouts.admin-app>
