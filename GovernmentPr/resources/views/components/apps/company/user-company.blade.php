<x-layouts.admin-app>
    @section('PageTitle', 'Company')
    @section('styles')
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    @endsection
    @section('scripts')
    <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
    <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
    <script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>
    @endSection
    <div class="container-xxl">
        <x-validation-errors class="alert" alert />
        @include('shared.feedback')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Managed Companies</h4>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0 guard-table-section">
                        <div class="table-responsive">
                            <table class="table mb-0 guard-table" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Country</th>
                                        <th>State/Province</th>
                                        <th>Date Of Est.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($company_user as $key=> $company)
                                    <tr>
                                        <td>{{$company->company->company_name ?? 'N/A'}}</td>
                                        <td>{{$company->company->email ?? 'N/A'}}</td>
                                        <td>{{$company->company->primary_phone_number ?? 'N/A'}}</td>
                                        <td>{{$company->company->country ?? 'N/A'}}</td>
                                        <td>{{$company->company->state ?? 'N/A'}}</td>
                                        <td>
                                        @php
                                            $dateString = optional($company->company)->date_of_establishment;
                                            echo $dateString ? \Carbon\Carbon::create($dateString)->format('l, d F Y') : 'N/A';
                                        @endphp
                                    </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                    data-bs-toggle="dropdown" href="#" role="button"
                                                    aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item"
                                                        href="{{ route('company.show-company', ['company'=> encrypt($company->company_id)]) }}">Open
                                                        Company</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
      
    </div><!-- container -->
</x-layouts.admin-app>