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
                                <a class="btn btn-primary" href="{{ route('admin.create-company') }}"><i
                                        class="fas fa-plus me-1"></i> Register Company </a>
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
                                    @foreach($companies as $key=> $company)
                                    <tr>
                                        <td>{{$company->company_name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->primary_phone_number}}</td>
                                        <td>{{$company->country}}</td>
                                        <td>{{$company->state}}</td>
                                        <td>
                                            @php
                                            $date = Carbon\Carbon::create($company->date_of_establishment);
                                            echo $date->format('l, d F Y');
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
                                                        href="{{ route('admin.show-company', ['company'=> encrypt($company->company_id)]) }}">Open
                                                        Company</a>

                                                    <a class="dropdown-item" href="#"
                                                        onclick="assignUsersToCompany('{{ $company->company_id }}', '{{ $company->company_name }}')"
                                                        data-bs-toggle="modal" data-bs-target="#assignUserModal"
                                                        data-company-id="{{ $company->company_id }}"
                                                        data-company-name="{{ $company->company_name }}">Assign Users to
                                                        Company</a>
                                                    <form
                                                        action="{{ route('admin.show-company', ['company'=> encrypt($company->company_id)]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this company?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Delete
                                                            Company</button>
                                                    </form>
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
        <!-- modalmodal to assign users -->
        <!-- Modal -->
        <div class="modal fade" id="assignUserModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Users to <span id="modalCompanyName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="assignUserForm" method="POST" action="">
                            @csrf
                            <!-- <input type="hidden" class="form-control" id="company_id" name="company_id" readonly> -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" readonly>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" form="assignUserForm">Assign</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    <!-- end modal -->
    </div><!-- container -->
    @section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let assignModal = document.getElementById("assignUserModal");

            assignModal.addEventListener("show.bs.modal", function (event) {
                let button = event.relatedTarget; // Button that triggered the modal
                if (!button) return;

                let companyName = button.getAttribute("data-company-name");
                let companyId = button.getAttribute("data-company-id");

                // Update the input fields dynamically
                let companyInput = document.getElementById("company_name");
                if (companyInput) {
                    companyInput.value = companyName;
                }

                let companyIdInput = document.getElementById("company_id");
                if (companyIdInput) {
                    companyIdInput.value = companyId;
                }
            });
        });
    </script>

    @endsection
</x-layouts.admin-app>