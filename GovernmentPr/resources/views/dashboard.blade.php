<x-layouts.admin-app>
    @section('PageTitle', 'Dashboard')
    @section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
    @endsection
    <div class="container-xxl">
        <div class="row justify-content-start">
            <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                    <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Managed Companies</p>
                    <h3 class="mt-2 mb-0 fw-bold">
                        {{ \App\Models\CompanyUsers::countCompaniesForUser(auth()->id()) }}
                    </h3>
                    </div>
                    <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                        <i class="iconoir-building h1 align-self-center mb-0 text-secondary"></i>
                    </div>
                    </div>
                </div>
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+12</span> This Week</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                    <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">R.E.C.P Audited</p>
                    <h3 class="mt-2 mb-0 fw-bold">872</h3>
                    </div>
                    <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                        <i class="iconoir-task-list h1 align-self-center mb-0 text-success"></i>
                    </div>
                    </div>
                </div>
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+8</span> Audited This Week</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                    <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Non-Compliant</p>
                    <h3 class="mt-2 mb-0 fw-bold">152</h3>
                    </div>
                    <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                        <i class="iconoir-warning-triangle h1 align-self-center mb-0 text-danger"></i>
                    </div>
                    </div>
                </div>
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">+5</span> This Week</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4">
            <div class="card border-warning">
                <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                    <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Pending Audit</p>
                    <h3 class="mt-2 mb-0 fw-bold">37</h3>
                    </div>
                    <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                        <i class="iconoir-clock h1 align-self-center mb-0 text-warning"></i>
                    </div>
                    </div>
                </div>
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-warning">+3</span> Pending This Week</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-success shadow-sm rounded-3">
                <div class="card-body">
                    <div class="row d-flex justify-content-between align-items-center border-dashed-bottom pb-3">
                    <div class="col-9">
                        <p class="text-dark mb-1 fw-semibold fs-5">Energy Saving</p>
                        <h3 id="energy-percentage" class="mt-1 mb-0 fw-bold text-success">0%</h3>
                    </div>
                    <div class="col-3">
                        <div
                        class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto border border-success"
                        style="height: 60px; width: 60px; transition: transform 0.2s ease;"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Energy savings have increased by 2% this year!"
                        onmouseover="this.style.transform='scale(1.1)';"
                        onmouseout="this.style.transform='scale(1)';"
                        >
                        <i class="fas fa-lightbulb h1 align-self-center mb-0 text-success" aria-label="Lightbulb icon representing energy saving"></i>
                        </div>
                    </div>
                    </div>
                    <p class="mb-0 text-muted mt-3 text-truncate">
                    <span class="text-success fw-bold">+2%</span> This Year
                    </p>
                    <!-- <div class="progress mt-3" style="height: 5px;">
                    <div
                        class="progress-bar bg-success"
                        role="progressbar"
                        style="width: 0%; transition: width 1s ease;"
                        aria-valuenow="18"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    ></div>
                    </div> -->
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
            <div class="card border-info">
                <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                    <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Waste Reduction</p>
                    <h3 class="mt-2 mb-0 fw-bold">12%</h3>
                    </div>
                    <div class="col-3 align-self-center">
                        <div
                        class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto border border-info"
                        style="height: 60px; width: 60px; transition: transform 0.2s ease;"
                        onmouseover="this.style.transform='scale(1.1)';"
                        onmouseout="this.style.transform='scale(1)';"
                        >
                        <i class="fas fa-recycle h1 align-self-center mb-0 text-info"></i>
                        </div>
                    </div>
                </div>
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-info">+1%</span> This Year</p>
                </div>
            </div>
            </div>
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Waste Efficiency by Company</h4>
                    </div>
                    <div class="card-body">
                        <div id="energy-efficiency-histogram"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Energy Efficiency Distribution</h4>
                    </div>
                    <div class="card-body">
                        <div id="energy-efficiency-pie"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title mb-0">Companies Managed</h4>
                </div>
                <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Company Name</th>
                        <th>Industry</th>
                        <th class="text-end">Status</th>
                        <th class="text-end">Last Audited</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Alpha Corp</td>
                        <td>Manufacturing</td>
                        <td class="text-end"><span class="badge bg-success">Compliant</span></td>
                        <td class="text-end">2024-06-01</td>
                        </tr>
                        <tr>
                        <td>Beta Ltd</td>
                        <td>Energy</td>
                        <td class="text-end"><span class="badge bg-warning">Pending</span></td>
                        <td class="text-end">2024-05-20</td>
                        </tr>
                        <tr>
                        <td>Gamma Inc</td>
                        <td>Technology</td>
                        <td class="text-end"><span class="badge bg-danger">Non-Compliant</span></td>
                        <td class="text-end">2024-05-15</td>
                        </tr>
                        <tr>
                        <td>Delta LLC</td>
                        <td>Logistics</td>
                        <td class="text-end"><span class="badge bg-success">Compliant</span></td>
                        <td class="text-end">2024-06-03</td>
                        </tr>
                        <tr>
                        <td>Epsilon PLC</td>
                        <td>Retail</td>
                        <td class="text-end"><span class="badge bg-success">Compliant</span></td>
                        <td class="text-end">2024-05-28</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div><!-- container -->  
        @section('scripts')
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Example data
                const companies = ['Alpha Corp', 'Beta Ltd', 'Gamma Inc', 'Delta LLC', 'Epsilon PLC', 'Zeta Group'];
                const efficiencies = [78, 65, 92, 55, 80, 70];

                // Histogram (Bar Chart)
                var histogramOptions = {
                    chart: { type: 'bar', height: 320 },
                    series: [{
                        name: 'Efficiency (%)',
                        data: efficiencies
                    }],
                    xaxis: { categories: companies },
                    yaxis: { title: { text: 'Efficiency (%)' }, max: 100 },
                    colors: ['#28a745'],
                    plotOptions: {
                        bar: { columnWidth: '50%' }
                    },
                    dataLabels: { enabled: true }
                };
                var histogramChart = new ApexCharts(document.querySelector("#energy-efficiency-histogram"), histogramOptions);
                histogramChart.render();

                // Pie Chart
                var pieOptions = {
                    chart: { type: 'pie', height: 320 },
                    series: efficiencies,
                    labels: companies,
                    legend: { position: 'bottom' },
                    colors: ['#28a745', '#17a2b8', '#ffc107', '#dc3545', '#6f42c1', '#fd7e14']
                };
                var pieChart = new ApexCharts(document.querySelector("#energy-efficiency-pie"), pieOptions);
                pieChart.render();
            });
            </script>

            <script>
            // Update percentage and progress bar with animation
            document.addEventListener("DOMContentLoaded", function () {
                const percentageElement = document.getElementById("energy-percentage");
                const progressBar = document.querySelector(".progress-bar");

                let percentage = 0;
                const targetPercentage = 18;

                const interval = setInterval(() => {
                percentage++;
                percentageElement.textContent = percentage + "%";
                progressBar.style.width = percentage + "%";

                if (percentage >= targetPercentage) clearInterval(interval);
                }, 50);

                // Initialize Bootstrap tooltip
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
            </script>

        @endsection 
</x-layouts.admin-app>
