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
                        <h5 class="mb-0">Current Stock Balance: {{ $balance }} {{$CompanyChemical->unit}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
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
            const lastYear = currentYear - 1;

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

                if (period === "this_year" && year !== currentYear) return;
                if (period === "last_year" && year !== lastYear) return;
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

        document.querySelectorAll(".dropdown-item[data-period]").forEach((item) => {
            item.addEventListener("click", (e) => {
                e.preventDefault();
                const period = item.getAttribute("data-period");

                document.getElementById("selected-period-label").textContent = `Selected Period: ${period.charAt(0).toUpperCase()}${period.slice(1).replace("_", " ")}`;
                stock_analysis(period, "{{ $CompanyChemical->company_chemical_id }}");
            });
        });

        stock_analysis("this_year", "{{ $CompanyChemical->company_chemical_id }}");
</script>
@endsection                
</x-layouts.admin-app>
