<x-layouts.admin-app>
    @section('styles')
    <link href="{{ asset('adminAssets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
    @endsection

    <div class="container-xxl">
        <x-validation-errors class="alert" alert />
        @include('shared.feedback')

        <!-- Admin Details Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Admin Details</h4>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>

                    <!-- Accordion for Adding Admin -->
                    <div class="accordion" id="adminAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="annualOperationsLogHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#adminCollapse" aria-expanded="false"
                                    aria-controls="adminCollapse">
                                    Add Admin
                                </button>
                            </h2>
                            <div id="adminCollapse" class="accordion-collapse collapse"
                                aria-labelledby="annualOperationsLogHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body bg-white">
                                    <form id="form-validation-2" class="form" action="{{ route('view.details') }}" method="post">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input class="form-control" type="text" name="firstname" placeholder="Enter First Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="LastName" class="form-label">Last Name</label>
                                                <input class="form-control" type="text" name="lastname" placeholder="Enter Last Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="otherName" class="form-label">Other Name</label>
                                                <input class="form-control" type="text" name="othername" placeholder="Enter Other Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="text" name="email" placeholder="example@gmail.com">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                                <input class="form-control" type="text" name="mobileNumber" placeholder="Enter Mobile Number">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                    <!-- Add Admin Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-annual-operations-log">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>

        <!-- Users Details Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Users Details</h4>
                            </div>
                        </div>
                    </div>
                                        <!-- Accordion for Adding Users -->
                                        <div class="accordion" id="usersAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="annualOperationsLogHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#usersCollapse" aria-expanded="false"
                                    aria-controls="usersCollapse">
                                    Add Users
                                </button>
                            </h2>
                            <div id="usersCollapse" class="accordion-collapse collapse"
                                aria-labelledby="annualOperationsLogHeading" data-bs-parent="#operationsAccordion">
                                <div class="accordion-body bg-white">
                                <form id="form-validation-2" class="form" action="{{ route('view.details') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input class="form-control" type="text" name="firstname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="LastName" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="otherName" class="form-label">Other Name</label>
                                    <input class="form-control" type="text" name="othername" placeholder="Enter Other Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="example@gmail.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                                    <input class="form-control" type="text" name="mobileNumber" placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary float-end mt-3">Submit</button>

                            </div>
                        </form>
                                    <!-- Add Users Table -->
                                    <div class="table-responsive mt-4">
                                        <table class="table table-striped mb-0" id="tbl-annual-operations-log">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>

        <!-- User Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Admin Registration</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script src="{{ asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/js/pages/datatable.init.js') }}"></script>
    @endsection
</x-layouts.admin-app>
