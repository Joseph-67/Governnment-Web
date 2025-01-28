<x-layouts.admin-app>
    @section('styles')
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    @endsection
<div class="container-xxl"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Admin Details</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus me-1"></i>Add Admin</button>
 
                                            <!-- <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> Invite User</button>            -->
                                        </div><!--end col-->
                                    </div><!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        
                                        <table class="table mb-0" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Mobile Nmber</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <!-- <div class="d-flex align-items-center">                                                            <dclass="flex-grow-1 text-truncate"> 
                                                                <h6 class="m-0">Ralph Denton</h6>                                                                                          
                                                            
                                                        </div> -->
                                                    </td>
                                                    
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <!-- <span class="badge rounded text-secondary bg-secondary-subtle">Inactive</span> -->
                                                </td>
                                                    <td class="text-end">                                                       
                                                        <!-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a> -->
                                                    </td>
                                                </tr>  
                                                                                    
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->                                     
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Users Details</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <!-- <button class="btn bg-primary-subtle text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus me-1"></i> Add User</button>   -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus me-1"></i>Add User</button>
                                            <!-- <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> Invite User</button>            -->
                                        </div><!--end col-->
                                    </div><!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                    <table class="table mb-0" id="datatable_1">
                                            <thead class="table-light">
                                              <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Mobile Nmber</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <!-- <div class="d-flex align-items-center">                                                            <dclass="flex-grow-1 text-truncate"> 
                                                                <h6 class="m-0">Ralph Denton</h6>                                                                                          
                                                            
                                                        </div> -->
                                                    </td>
                                                    
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <!-- <span class="badge rounded text-secondary bg-secondary-subtle">Inactive</span> -->
                                                </td>
                                                    <td class="text-end">                                                       
                                                        <!-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a> -->
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
               <!--user Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="form-validation-2" class="form">
            <div class="row g-3">
            <div class="col-md-6">
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input class="form-control" type="text" id="firstname" placeholder="Enter First Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="LastName" class="form-label">Last Name</label>
                                                        <input class="form-control" type="text" id="lastname" placeholder="Enter Last Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="otherName" class="form-label">Other Name</label>
                                                        <input class="form-control" type="text" id="othername" placeholder="Enter Other Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="text" id="email" placeholder="example@gmail.com">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                                                    <input class="form-control" type="text" id="mobileNumber" placeholder="Enter Mobile Number">
                                                    </div>

                                                       </div>
                                                       <button type="submit" class="btn btn-primary float-end mt-3">Submit</button>

                                                </form><!--end form-->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
    <!-- admin modal start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Admin Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-validation-2" class="form">
            <div class="row g-3">
            <div class="col-md-6">
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input class="form-control" type="text" id="firstname" placeholder="Enter First Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="LastName" class="form-label">Last Name</label>
                                                        <input class="form-control" type="text" id="lastname" placeholder="Enter Last Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="otherName" class="form-label">Other Name</label>
                                                        <input class="form-control" type="text" id="othername" placeholder="Enter Other Name">
                                                      
                                                    </div>
                                                    <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="text" id="email" placeholder="example@gmail.com">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                                                    <input class="form-control" type="text" id="mobileNumber" placeholder="Enter Mobile Number">
                                                    </div>

                                                       </div>
                                                       <button type="submit" class="btn btn-primary float-end mt-3">Submit</button>

                                                </form><!--end form-->
        
      
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>
<!-- admin modal end-->
                @section('scripts')
                <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
                <script src="{{asset('adminAssets/js/pages/datatable.init.js"')}}></script>
                @endsection
    </x-layouts.admin-app>