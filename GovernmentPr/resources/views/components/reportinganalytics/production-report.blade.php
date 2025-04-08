<x-layouts.admin-app>
@section('PageTitle', $page_title)
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Page Header -->
            <div class="header-title">
                <h3>Advanced Production Overview</h3>
                <p>Analyze and compare production metrics and waste data across multiple companies.</p>
            </div>

            <!-- Company Selection -->
            <div class="">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companySelect">Company</label>
                            <select id="companySelect" class="form-control" multiple>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <label class="mb-2">Calendar Year</label>
                        <select name="" id="calendar-year" class="form-select">
                            <option selected disabled> Choose... </option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button id="searchButton" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- Fancy Card -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm bg-primary text-white position-relative">
                        <div class="card-body">
                            <h5 class="card-title">Welcome to the Production Report</h5>
                            <p class="card-text">Select a company from the dropdown above to view detailed production metrics and analytics. Use the options to switch between companies and explore their performance data.</p>
                        </div>
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="closeCard(this)" style="background-color: white; border-radius: 50%;"></button>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div id="companyTabsContent" class="d-none">
                <!-- Company A -->
                <div class="" id="company1" role="tabpanel" aria-labelledby="company1-tab">
                    <h5>Production Overview - Company A</h5>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Units Produced</h5>
                                    <p class="card-text display-4">20,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Units Left to Produce</h5>
                                    <p class="card-text display-4">5,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Production Rate</h5>
                                    <p class="card-text display-4">500/day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Efficiency Rate</h5>
                                    <p class="card-text display-4">90%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts for Company A -->
                    <div class="row mb-4">
                        <div class="col-md-6 chart-container">
                            <h5>Waste Distribution</h5>
                            <canvas id="companyAWasteChart"></canvas>
                        </div>
                        <div class="col-md-6 chart-container">
                            <div class="">
                                <h5>Waste Breakdown (Material, Defective, Packaging)</h5>
                                <canvas id="productWasteBreakdownChart"></canvas>
                            </div>
                            <div class="">
                                <h5>Production Trends</h5>
                                <canvas id="companyATrendChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(5px);
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    }
    .header-title {
        font-size: 24px;
        /* color: #333; */
        font-weight: 700;
        margin-bottom: 20px;
    }
    .company-tabs .nav-link.active {
        background-color: #007bff;
        color: white !important;
        border-radius: 5px;
    }
    .chart-container {
        margin-bottom: 30px;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Waste Distribution Chart for Company A
    var ctxWasteA = document.getElementById('companyAWasteChart').getContext('2d');
    new Chart(ctxWasteA, {
        type: 'pie',
        data: {
            labels: ['Material Loss', 'Defects', 'Packaging Waste'],
            datasets: [{
                data: [1200, 800, 500],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true
        }
    });

    // Production Trends for Company A
    var ctxTrendA = document.getElementById('companyATrendChart').getContext('2d');
    new Chart(ctxTrendA, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Production Output',
                data: [5000, 6000, 5500, 7000],
                fill: false,
                borderColor: '#36A2EB',
                tension: 0.1
            }, {
                label: 'Waste Generated',
                data: [300, 400, 350, 450],
                fill: false,
                borderColor: '#FF6384',
                tension: 0.1
            }]
        },
        options: {
            responsive: true
        }
    });

            // Product Waste Breakdown (Stacked Bar Chart)
            var ctx2 = document.getElementById('productWasteBreakdownChart').getContext('2d');
        var productWasteBreakdownChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    label: 'Material Loss',
                    data: [1500, 800, 500],
                    backgroundColor: '#FF6384',
                    stack: 'stack1',
                }, {
                    label: 'Defective Products',
                    data: [500, 200, 150],
                    backgroundColor: '#36A2EB',
                    stack: 'stack1',
                }, {
                    label: 'Packaging Waste',
                    data: [300, 100, 50],
                    backgroundColor: '#FFCE56',
                    stack: 'stack1',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' units';
                            }
                        }
                    }
                }
            }
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Selectr('#companySelect', {
            multiple: false,
            placeholder: "Select companies",
            render: {
                option: function (data, escape) {
                    return `<span>${escape(data.text)}</span>`; // Custom option rendering
                },
                item: function (data, escape) {
                    return `<span>${escape(data.text)}</span>`; // Custom item rendering (selected items)
                }
            }
        });

        new Selectr('#calendar-year', {
            multiple: false,
        });
    });

</script>
<script>
    function closeCard(button) {
        const card = button.closest('.card');
        card.style.transition = 'opacity 0.3s';
        card.style.opacity = 0;
        setTimeout(() => card.remove(), 300);
    }

    document.getElementById('companySelect').addEventListener('change', function () {
    const selectedValue = this.value; // Get the selected value
    console.log("Selected Company ID:", selectedValue);

    // Optional: Perform actions based on the selected value
    if (selectedValue) {
        // Example: Show a section or make an API call
        console.log("Company ID selected: " + selectedValue);
    }
});


</script>
@endsection

</x-layouts.admin-app>