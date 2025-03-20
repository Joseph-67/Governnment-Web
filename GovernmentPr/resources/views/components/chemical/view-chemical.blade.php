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
                        <canvas id="transactionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    var ctx = document.getElementById('transactionChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Check In', 'Check Out'],
            datasets: [{
                label: 'Transactions',
                data: [{{ $CompanyChemical->check_in }}, {{ $CompanyChemical->check_out }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection                
</x-layouts.admin-app>
