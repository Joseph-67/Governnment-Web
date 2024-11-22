<x-layouts.admin-app>
@section('PageTitle', 'Security & Permissions')
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
    <script>
        // new Selectr("#guardSelect",{taggable:!0,tagSeperators:[",","|"]}), new Selectr("#guardSelect2",{taggable:!0,tagSeperators:[",","|"]})
        new TomSelect('#guardSelect2',{maxItems: 5});
        new TomSelect('#guardSelect',{maxItems: 5});

        // function to update role permission
        async function updateRolePermission(checkbox, role_id, permission_id) {
            console.log(role_id, permission_id);
            if (checkbox.checked) {
                let url = "{{ route('admin.update.permission-role') }}";
                let formData = new FormData()
                formData.append('role', role_id)
                formData.append('permission', permission_id)
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    credentials: "same-origin",
                    body: formData
                })
                .then(async (response) => {
                    let data = await response.json();
                    console.log(data.message);
                    
                })
                .catch((err) => {
                    console.log("--ERROR: ", err);
                })
            }else{
                let url = "{{ route('admin.revoke.permission-role') }}";
                let formData = new FormData()
                formData.append('role', role_id)
                formData.append('permission', permission_id)
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    credentials: "same-origin",
                    body: formData
                })
                .then(async (response) => {
                    let data = await response.json();
                    console.log(data.message);
                    
                })
                .catch((err) => {
                    console.log("--ERROR: ", err);
                })
            }

        }

        function changeGuard(select) {
            select.addEventListener('change', async () => {
                let guard = select.value
                console.log('change detected', guard);
                let url = "{{ route('admin.guard-change') }}"
                let formData = new FormData()
                formData.append('guard', guard)
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                        {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        credentials: "same-origin",
                        
                    },
                    credentials: 'same-origin',
                    body: formData
                }).then(async (response) => {
                    let data = await response.json()
                    console.log(data);
                    if (data.roles) {
                            let thead = document.querySelector('.guard-table thead tr')
                            let tbody = document.querySelector('.guard-table tbody')
                            thead.innerHTML = `<th> ACTIONS </th>`
                            data.roles.forEach(role => {  thead.innerHTML+= `<th>${role.name}</th>`; })
                            tbody.innerHTML = ""
                            let tr = document.createElement('tr')
                            tbody.appendChild(tr)
                            data.permissions.forEach(async (permission) => { 
                                let url = ""
                                let response = fetch(url, {
                                    method: "POST",
                                    headers: 
                                })
                                document.querySelector('.guard-table tbody tr').innerHTML+= `
                                <td>${permission.name}</td> <td> 
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" {{ (isset($role_permission->permission_id) !="")? "checked":""}} onclick='updateRolePermission(this, "{{$role->id}}", "{{$permission->id}}")'>
                                    </div>
                                </td>`;
                            })
                    }
                }).catch((err) => {
                    console.log("--ERROR: ", err);
                });
            })
        }
    </script>
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
                                            <h4 class="card-title">Custom Role  Permission</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <button class="btn bg-primary-subtle text-primary" data-bs-toggle="modal" data-bs-target="#addRole"><i class="fas fa-plus me-1"></i> Add Role</button>  
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermission"><i class="fas fa-plus me-1"></i> Add Permission </button>
                                            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addGuard"><i class="fas fa-plus me-1"></i> Add Guard </button>
                                            <select name="" onclick="changeGuard(this)" class="form-select col-3" style="width: auto ! important; display: inline;">
                                                <option value="" disabled> Select guard... </option>
                                                @foreach($guards as $guard)
                                                <option value="{{$guard->title}}" {{ ($guard->title == 'web')? "selected":"" }}>{{$guard->title}}</option>
                                                @endforeach
                                            </select>
                                        </div><!--end col-->
                                    </div><!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0 guard-table-section">
                                    <div class="table-responsive">
                                        <table class="table mb-0 guard-table" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th>ACTIONS</th>
                                                @foreach($roles as $role)
                                                <th>{{$role->name}}</th>
                                                @endforeach
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{$permission->name}}</td>
                                                    @foreach($roles as $role)
                                                        @php
                                                            // Fetching data
                                                            $role_permission = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->where('permission_id', '=', $permission->id)->first();
                                                        @endphp
                                                        <td>
                                                            <div class="form-check form-switch">
                                                              <input class="form-check-input" type="checkbox" role="switch" {{ (isset($role_permission->permission_id) !="")? "checked":""}} onclick='updateRolePermission(this, "{{$role->id}}", "{{$permission->id}}")'>
                                                            </div>
                                                        </td>
                                                    @endforeach
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