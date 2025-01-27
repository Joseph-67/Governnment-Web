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
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-calendar fs-5 me-1"></i> This Year<i
                                            class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div><!--end col-->
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
        let stock_analysis = async (searchTerm, company) => {
            const url = new URL("{{ route('admin.stock-analysis') }}");
            url.searchParams.append("query", searchTerm);
            url.searchParams.append("company", company);
            console.log(url.toString());
            const response = await fetch(url.toString());
            const resp = await response.json();
            console.log(resp);
            
            // Assuming `resp` contains `seriesData` and `categories` for the chart
            const monthlyData = {};
            const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            // Aggregate quantities by month and movement type
            resp.forEach((item) => {
            const month = new Date(item.movement_date).getMonth(); // 0-based index
            const movementType = item.movement_type;

            if (!monthlyData[movementType]) {
                monthlyData[movementType] = new Array(12).fill(0);
            }

            monthlyData[movementType][month] += parseFloat(item.quantity);
        });

        // Build the series
        const seriesData = Object.entries(monthlyData).map(([key, data]) => ({
            name: key, // 'in' or 'out'
            data: data
        }));


        // Define the chart configuration dynamically
        var chart = {
            series: seriesData, // Dynamically map the series
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
            legend: { show: false },
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
                categories: categories // Dynamically map the categories
            }
        };

        // Render the chart
        (chart = new ApexCharts(document.querySelector("#reports-bar"), chart)).render();

        }

        const currentYear = new Date().getFullYear();
        stock_analysis(currentYear, "{{$companyMaterialID}}");
     </script>
    @endsection
</x-layouts.admin.app>