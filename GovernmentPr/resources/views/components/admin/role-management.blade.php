<x-layouts.admin-app>
    @section('styles')
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
    @endsection
    @section('scripts')
    <script src="{{asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
    <script>
        // new Selectr("#guardSelect",{taggable:!0,tagSeperators:[",","|"]}), new Selectr("#guardSelect2",{taggable:!0,tagSeperators:[",","|"]})
        new TomSelect('#guardSelect2',{maxItems: 5});
        new TomSelect('#guardSelect',{maxItems: 5});
    </script>
    <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
    @endsection

                <div class="container-xxl"> 
                <x-validation-errors class="alert" alert />
                @include('shared.feedback')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Roles Details</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <button class="btn bg-primary-subtle text-primary" data-bs-toggle="modal" data-bs-target="#addRole"><i class="fas fa-plus me-1"></i> Add Role</button>  
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermission"><i class="fas fa-plus me-1"></i> Add Permission </button>
                                            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addGuard"><i class="fas fa-plus me-1"></i> Add Guard </button>
                                        </div><!--end col-->
                                    </div><!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>Roal</th>
                                                <th>Last activity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <img src="assets/images/users/avatar-1.jpg" class="me-2 thumb-md align-self-center rounded" alt="...">
                                                            <div class="flex-grow-1 text-truncate"> 
                                                                <h6 class="m-0">Unity Pugh</h6>
                                                                <a href="#" class="fs-12 text-primary">dummy@gmail.com</a>                                                                                           
                                                            </div><!--end media body-->
                                                        </div>
                                                    </td>
                                                    <td>#9958</td>
                                                    <td><a href="#" class="text-body text-decoration-underline">Manager</a></td>
                                                    <td>Today, 02:30pm</td>
                                                    <td><span class="badge rounded text-success bg-success-subtle">Active</span></td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                                                                                                  
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->                                     
                </div><!-- container -->
                
                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom justify-content-between">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
                <!--end Rightbar/offcanvas-->
                <!--end Rightbar-->
    
             <!-- role -->
            <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRole" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form action="{{route('admin.store-role')}}" method="post">
                @csrf
                    <div class="modal-header">
                        <h6 class="modal-title m-0">Add New Role</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><!--end modal-header-->
                    <div class="modal-body">
                        <div class="row">
                            <label for="inputTaskTitle" class="col-sm-3 col-form-label text-end fw-medium">Role Title :</label>
                            <div class="col-sm-9 mb-2">
                              <input type="text" class="form-control" id="inputTaskTitle" name="role_title">
                            </div><!--end col-->
                        </div><!--end row-->                                                      
                        <div class="row">
                            <label class="col-sm-3 col-form-label text-end fw-medium">Guard:</label>
                            <div class="col-sm-9">
                                <select id="guardSelect" multiple name="guard[]">
                                    @foreach($guards as $guard)
                                    <option value="{{ $guard->title }}">{{ $guard->title }}</option>
                                    @endforeach
                                </select>          
                            </div> <!-- end col --> 
                        </div><!--end row-->                                                      
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>                                
                    </div><!--end modal-footer-->
                </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div><!--end modal-->
        <!-- Permission -->
        <div class="modal fade" id="addPermission" tabindex="-1" role="dialog" aria-labelledby="addPermission" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form action="{{route('admin.store-permission')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title m-0">Add New Permission</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><!--end modal-header-->
                    <div class="modal-body">
                        <div class="row">
                            <label for="inputTaskTitle" class="col-sm-3 col-form-label text-end fw-medium">Permission Title :</label>
                            <div class="col-sm-9 mb-2">
                              <input type="text" class="form-control" id="inputTaskTitle" name="permission_title">
                            </div><!--end col-->
                        </div><!--end row-->                                                      
                        <div class="row">
                            <label for="inputTaskTitle" class="col-sm-3 col-form-label text-end fw-medium">Guard :</label>
                            <div class="col-sm-9">
                                <select id="guardSelect2" multiple name="guard[]">
                                    <option value="" disabled>Choose...</option>
                                    @foreach($guards as $guard)
                                    <option value="{{ $guard->title }}">{{ $guard->title }}</option>
                                    @endforeach
                                </select>         
                            </div><!--end col-->
                        </div><!--end row-->                                                      
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>                                
                    </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div><!--end modal-->
        <!-- end permission -->
        <!-- Guard -->
        <div class="modal fade" id="addGuard" tabindex="-1" role="dialog" aria-labelledby="addGuard" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.store-guard')}}" method="post">
                        @csrf
                    <div class="modal-header">
                        <h6 class="modal-title m-0">Add New Guard</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><!--end modal-header-->
                    <div class="modal-body">
                        <div class="row">
                            <label for="inputTaskTitle" class="col-sm-3 col-form-label text-end fw-medium">Guard Title :</label>
                            <div class="col-sm-9 mb-2">
                              <input type="text" class="form-control" id="inputTaskTitle" name="guard_title">
                            </div><!--end col-->
                        </div><!--end row-->                                                     
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>                                
                    </div><!--end modal-footer-->
                    </form> <!-- guard creation form ends -->
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div><!--end modal-->
        </x-layouts.admin-app>