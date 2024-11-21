<x-layouts.admin-app>
    @section('styles')
 <!-- App css -->
     <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

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
    <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    @endsection

    <div class="container-xxl">
    <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Featured Post</p>
                                        <h3 class="mt-2 mb-0 fw-bold">24k</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-hexagon-dice h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">8.5%</span>
                                    New Sessions Today</p>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Draft</p>
                                        <h3 class="mt-2 mb-0 fw-bold">00:18</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-clock h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">1.5%</span>
                                    Weekly Avg.Sessions</p>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14"> Trash
                                            </p>
                                        <h3 class="mt-2 mb-0 fw-bold">36.45%</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-percentage-circle h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">8%</span>
                                   Up Bounce Rate Weekly</p>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="clearfix">
                    <div class="btn-group float-end ms-2">
                        <button type="button" class="btn btn-primary me-0 overflow-hidden">
                        Add New Post
                          <input type="file" name="file" class="overflow-hidden position-absolute top-0 start-0 opacity-0"/>
                        </button>
                       
                        <!-- <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="las la-angle-down"></i>
                        </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="las la-file-upload fs-16 me-1 align-text-bottom"></i> Upload File</a>
                            <a class="dropdown-item" href="#"><i class="las la-cloud-upload-alt fs-16 me-1 align-text-bottom"></i>Upload Folder</a>
                        </div> -->
                    </div>
                <div class="clearfix">
                    <div class="btn-group float-end ms-2">
                        <button type="button" class="btn btn-secondary me-0 overflow-hidden">
                        Add New Category
                          <input type="file" name="file" class="overflow-hidden position-absolute top-0 start-0 opacity-0"/>
                        </button>
                    </div>
                <div class="clearfix">
                    <div class="btn-group float-end ms-2">
                        <button type="button" class="btn btn-success me-0 overflow-hidden">
                        Add New Tag
                          <input type="file" name="file" class="overflow-hidden position-absolute top-0 start-0 opacity-0"/>
                        </button>
                    </div>
                    <ul class="nav nav-tabs my-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold active py-2" data-bs-toggle="tab" href="#documents" role="tab" aria-selected="true"><i class="fa-regular fa-folder-open me-1"></i> All Posts <span class="badge rounded text-blue bg-blue-subtle ms-1">32</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#images" role="tab" aria-selected="false"><i class="fa-regular fa-image me-1"></i> Categories <span class="badge rounded text-blue bg-blue-subtle ms-1">85</span></a>
                        </li>                                                
                        <li class="nav-item">
                            <a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#audio" role="tab" aria-selected="false"><i class="fa-solid fa-headphones me-1"></i> Tags <span class="badge rounded text-blue bg-blue-subtle ms-1">21</span></a>
                        </li>
                    </ul>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Files</h4>                      
                            </div><!--end col-->
                            <div class="col-auto"> 
                                <div class="dropdown">
                                    <a href="#" class="text-body text-decoration-underline">
                                        View All
                                    </a>
                                </div>               
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="documents" role="tabpanel">
                                <div class="table-responsive browser_users">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0 text-end">Last Modified</th>
                                                <th class="border-top-0 text-end">Size</th>
                                                <th class="border-top-0 text-end">Members</th>
                                                <th class="border-top-0 text-end">Action</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">payment.pdf</a>
                                                </td>
                                                <td class="text-end">18 Jul 2024</td>                                   
                                                <td class="text-end"> 2.3 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">statement.pdf</a>
                                                </td>
                                                <td class="text-end">08 Dec 2024</td>                                   
                                                <td class="text-end"> 3.7 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-10.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">idcard.pdf</a>
                                                </td>
                                                <td class="text-end">30 Nov 2024</td>                                   
                                                <td class="text-end"> 1.5 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                  
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">invoice.pdf</a>
                                                </td>
                                                <td class="text-end">09 Sep 2024</td>                                   
                                                <td class="text-end"> 3.2 MB</td>
                                                <td class="text-end">
                                                    -
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">tutorial.pdf</a>
                                                </td>
                                                <td class="text-end">14 Aug 2024</td>                                   
                                                <td class="text-end"> 12.7 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                  
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                    </div>
                                                    <a href="#" class="text-body">project.pdf</a>
                                                </td>
                                                <td class="text-end">12 Aug 2024</td>                                   
                                                <td class="text-end"> 5.2 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->     
                                                                         
                                        </tbody>
                                    </table> <!--end table-->                                               
                                </div><!--end /div--> 
                            </div>
                            <div class="tab-pane" id="images" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0 text-end">Last Modified</th>
                                                <th class="border-top-0 text-end">Size</th>
                                                <th class="border-top-0 text-end">Members</th>
                                                <th class="border-top-0 text-end">Action</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img52315.jpeg</a>
                                                </td>
                                                <td class="text-end">18 Jul 2024</td>                                   
                                                <td class="text-end"> 2.3 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img63695.jpeg</a>
                                                </td>
                                                <td class="text-end">08 Dec 2024</td>                                   
                                                <td class="text-end"> 3.7 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-10.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img00021.jpeg</a>
                                                </td>
                                                <td class="text-end">30 Nov 2024</td>                                   
                                                <td class="text-end"> 1.5 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                  
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img36251.jpeg</a>
                                                </td>
                                                <td class="text-end">09 Sep 2024</td>                                   
                                                <td class="text-end"> 3.2 MB</td>
                                                <td class="text-end">
                                                    -
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img362511.jpeg</a>
                                                </td>
                                                <td class="text-end">14 Aug 2024</td>                                   
                                                <td class="text-end"> 12.7 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                  
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                    </div>
                                                    <a href="#" class="text-body">img963852.jpeg</a>
                                                </td>
                                                <td class="text-end">12 Aug 2024</td>                                   
                                                <td class="text-end"> 5.2 MB</td>
                                                <td class="text-end">
                                                    <div class="img-group d-flex justify-content-end">
                                                        <a class="user-avatar position-relative d-inline-block" href="#">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>
                                                        <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                        </a>                 
                                                    </div>
                                                </td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->                                                                                     
                                        </tbody>
                                    </table> <!--end table-->                                               
                                </div><!--end /div--> 
                            </div>                                                
                            <div class="tab-pane" id="audio" role="tabpanel">                                           
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0 text-end">Last Modified</th>
                                                <th class="border-top-0 text-end">Size</th>
                                                <th class="border-top-0 text-end">Action</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio52315..</a>
                                                </td>
                                                <td class="text-end">18 Jul 2024</td>                                   
                                                <td class="text-end"> 2.3 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio63695..</a>
                                                </td>
                                                <td class="text-end">08 Dec 2024</td>                                   
                                                <td class="text-end"> 3.7 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio00021..</a>
                                                </td>
                                                <td class="text-end">30 Nov 2024</td>                                   
                                                <td class="text-end"> 1.5 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio36251..</a>
                                                </td>
                                                <td class="text-end">09 Sep 2024</td>                                   
                                                <td class="text-end"> 3.2 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio362511..</a>
                                                </td>
                                                <td class="text-end">14 Aug 2024</td>                                   
                                                <td class="text-end"> 12.7 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->  
                                            <tr>                                                        
                                                <td>
                                                    <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                        <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                    </div>
                                                    <a href="#" class="text-body">audio963852..</a>
                                                </td>
                                                <td class="text-end">12 Aug 2024</td>                                   
                                                <td class="text-end"> 5.2 MB</td>
                                                <td class="text-end">   
                                                    <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                    <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr><!--end tr-->                                                                                     
                                        </tbody>
                                    </table> <!--end table-->                                               
                                </div><!--end /div--> 
                            </div>
                        </div>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                                                                                                     
        </div><!--end row-->                     
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

</x-layouts.admin-app>