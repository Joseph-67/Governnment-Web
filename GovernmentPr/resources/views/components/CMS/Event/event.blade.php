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

      <!-- Page Content-->
      <!-- <div class="page-content"> -->
                <div class="container-xxl"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Events & News</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto">     
                                        <a class="nav-link" href="{{route('CMS.add-event')}}">     
                                            <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add Event</button>
                                        </a>                 
                                                          
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header--> 
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-light">
                                              <tr>
                                                <th>ID</th>
                                                <th>Event title</th>
                                                <th>Category</th>
                                                <th>Post date</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th>Status</th>
                                                <th class="text-end">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#546987</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Bata Shoes</span>
                                                            <span class="text-muted font-13">size-08 (Model 2024)</span> 
                                                        </p>
                                                    </td>
                                                    <td>General</td>
                                                    <td>15/08/2023</td>
                                                    <td>15/08/2023</td>
                                                    <td>UPI</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td><a href="ecommerce-order-details.html">#362514</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Morden Chair</span>
                                                            <span class="text-muted font-13">Size-Mediam (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>22/09/2023</td>
                                                    <td>Banking</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td>$630</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#215487</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Reebok Shoes</span>
                                                            <span class="text-muted font-13">size-08 (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>31/12/2023</td>
                                                    <td>Paypal</td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger"><i class="fas fa-xmark me-1"></i> Cancle</span>
                                                    </td>
                                                    <td>$450</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#326598</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Cosco Vollyboll</span>
                                                            <span class="text-muted font-13">size-04 (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>05/01/2024</td>
                                                    <td>UPI</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td>$880</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>                                                                                 
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#369852</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Royal Purse</span>
                                                            <span class="text-muted font-13">Pure Lether 100%</span> 
                                                        </p>
                                                    </td>
                                                    <td>20/02/2024</td>
                                                    <td>BTC</td>
                                                    <td>
                                                        <span class="badge bg-secondary-subtle text-secondary"><i class="fas fa-clock me-1"></i> Pendding</span>
                                                    </td>
                                                    <td>$520</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#987456</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Bata Shoes</span>
                                                            <span class="text-muted font-13">size-08 (Model 2024)</span> 
                                                        </p>
                                                    </td>
                                                    <td>15/08/2023</td>
                                                    <td>UPI</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td>$390</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#159753</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Morden Chair</span>
                                                            <span class="text-muted font-13">Size-Mediam (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>22/09/2023</td>
                                                    <td>Banking</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td>$630</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#852456</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Reebok Shoes</span>
                                                            <span class="text-muted font-13">size-08 (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>31/12/2023</td>
                                                    <td>Paypal</td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger"><i class="fas fa-xmark me-1"></i> Cancle</span>
                                                    </td>
                                                    <td>$450</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#154863</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Cosco Vollyboll</span>
                                                            <span class="text-muted font-13">size-04 (Model 2021)</span> 
                                                        </p>
                                                    </td>
                                                    <td>05/01/2024</td>
                                                    <td>UPI</td>
                                                    <td>
                                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-check me-1"></i> Completed</span>
                                                    </td>
                                                    <td>$880</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>                                                                                 
                                                <tr>
                                                    <td><a href="ecommerce-order-details.html">#625877</a></td>
                                                    <td>
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <span class="d-block align-middle mb-0 product-name text-body">Royal Purse</span>
                                                            <span class="text-muted font-13">Pure Lether 100%</span> 
                                                        </p>
                                                    </td>
                                                    <td>20/02/2024</td>
                                                    <td>BTC</td>
                                                    <td>
                                                        <span class="badge bg-secondary-subtle text-secondary"><i class="fas fa-clock me-1"></i> Pendding</span>
                                                    </td>
                                                    <td>$520</td>
                                                    <td class="text-end">                                                       
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->                                       
                </div><!-- container -->
                
</x-layouts.admin-app>