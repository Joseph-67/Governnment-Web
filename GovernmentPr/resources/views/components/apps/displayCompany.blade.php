<x-layouts.admin-app>
@section('PageTitle', 'Company')
@section('styles')
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
    <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
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
                            <h4 class="card-title">Company Details</h4>                      
                        </div><!--end col-->
                        <div class="col-auto"> 
                            <a class="btn btn-primary" href="{{ route('admin.create-company') }}"><i class="fas fa-plus me-1"></i> Register Company </a>
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
                                <th>State/Province</th>
                                <th>Date Of Est.</th>
                                <th>G.I.S Location</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $key=> $company)
                                <tr>
                                    <td>{{$company->company_name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->primary_phone_number}}</td>
                                    <td>{{$company->state}}</td>
                                    <td>{{$company->date_of_establishment}}</td>
                                    <td>{{$company->gis_location}}</td>
                                    <td>
                                        <a href="" class="btn btn-link">View</a>
                                        <a href="" class="btn btn-warning">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('admin.create-recp', ['id'=> encrypt($company->company_id)]) }}" class="btn btn-outline-primary">Register RECP</a>
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