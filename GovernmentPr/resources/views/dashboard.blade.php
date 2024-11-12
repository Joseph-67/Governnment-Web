<x-app-layout>
   <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">                        
                <div class="col-md-12 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title">Top Country</h4>                      
                                </div><!--end col-->
                            </div>  <!--end row-->                                  
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="d-flex align-items-center border-dashed-bottom py-3">
                                <img src="assets/images/flags/us_flag.jpg" class="thumb-sm align-self-center rounded-circle" alt="...">
                                <div class="flex-grow-1 ms-2">
                                    <h5 class="m-0">35,365</h5>
                                    <p class="text-muted mb-0">USA . Last Month
                                        <span class="text-success">2.5% <i class="mdi mdi-arrow-up"></i></span>
                                    </p>
                                </div><!--end media-body-->
                            </div><!--end media--> 
                            <div class="d-flex align-items-center border-dashed-bottom py-3">
                                <img src="assets/images/flags/germany_flag.jpg" class="thumb-sm align-self-center rounded-circle" alt="...">
                                <div class="flex-grow-1 ms-2">
                                    <h5 class="m-0">24,865</h5>
                                    <p class="text-muted mb-0">Germany . Last Month
                                        <span class="text-success">1.2% <i class="mdi mdi-arrow-up"></i></span>
                                    </p>
                                </div><!--end media-body-->
                            </div><!--end media-->  
                            <div class="d-flex align-items-center border-dashed-bottom py-3">
                                <img src="assets/images/flags/spain_flag.jpg" class="thumb-sm align-self-center rounded-circle" alt="...">
                                <div class="flex-grow-1 ms-2">
                                    <h5 class="m-0">18,369</h5>
                                    <p class="text-muted mb-0">Spain . Last Month
                                        <span class="text-success">0.8% <i class="mdi mdi-arrow-up"></i></span>
                                    </p>
                                </div><!--end media-body-->
                            </div><!--end media-->
                            <div class="d-flex align-items-center pt-3">
                                <img src="assets/images/flags/baha_flag.jpg" class="thumb-sm align-self-center rounded-circle" alt="...">
                                <div class="flex-grow-1 ms-2">
                                    <h5 class="m-0">11,325</h5>
                                    <p class="text-muted mb-0">Bahamas . Last Month
                                        <span class="text-success">2.5% <i class="mdi mdi-arrow-up"></i></span>
                                    </p>
                                </div><!--end media-body-->
                            </div><!--end media--> 
                        </div><!--end card-body--> 
                    </div><!--end card-->                             
                </div> <!--end col--> 
                <div class="col-md-12 col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title">Metrics</h4>                      
                                </div><!--end col-->
                                <div class="col-auto"> 
                                    <div class="dropdown">
                                        <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icofont-calendar fs-5 me-1"></i> This Year<i class="las la-angle-down ms-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Last Week</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">This Year</a>
                                        </div>
                                    </div>               
                                </div><!--end col-->
                            </div>  <!--end row-->                                  
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div id="reports-bar" class="apex-charts pill-bar"></div>
                        </div><!--end card-body--> 
                    </div><!--end card-->                             
                </div> <!--end col-->           
            </div><!--end row-->  
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title">Visits Details</h4>                      
                                </div><!--end col-->
                            </div>  <!--end row-->                                  
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                      <tr>
                                        <th>URL</th>
                                        <th class="text-end">Views</th>
                                        <th class="text-end">Uniques</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>htpps:/</td>
                                            <td class="text-end">9.2k</td>
                                            <td class="text-end">7.9k</td>
                                        </tr>
                                        <tr>
                                            <td>.com/dashboard</td>
                                            <td class="text-end">7.7k</td>
                                            <td class="text-end">6.2k</td>
                                        </tr>
                                        <tr>
                                            <td>.com/ecommerce-index</td>
                                            <td class="text-end">6.8k</td>
                                            <td class="text-end">5.5k</td>
                                        </tr> 
                                        <tr>
                                            <td>.com/apps/projects-overview</td>
                                            <td class="text-end">5k</td>
                                            <td class="text-end">4.9k</td>
                                        </tr>  
                                        <tr>
                                            <td>.com/blog/crypto/exchange</td>
                                            <td class="text-end">4.3k</td>
                                            <td class="text-end">3.3k</td>
                                        </tr>                                                                                    
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title">By Social Media</h4>                      
                                </div><!--end col-->
                            </div>  <!--end row-->                                  
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                      <tr>
                                        <th>Source</th>
                                        <th class="text-end">Views</th>
                                        <th class="text-end">Uniques</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Twitter</td>
                                            <td class="text-end">9.2k</td>
                                            <td class="text-end">7.9k</td>
                                        </tr>
                                        <tr>
                                            <td>Facebook</td>
                                            <td class="text-end">7.7k</td>
                                            <td class="text-end">6.2k</td>
                                        </tr>
                                        <tr>
                                            <td>Instagram</td>
                                            <td class="text-end">6.8k</td>
                                            <td class="text-end">5.5k</td>
                                        </tr> 
                                        <tr>
                                            <td>LinkedIn</td>
                                            <td class="text-end">5k</td>
                                            <td class="text-end">4.9k</td>
                                        </tr>  
                                        <tr>
                                            <td>WhatsApp</td>
                                            <td class="text-end">4.3k</td>
                                            <td class="text-end">3.3k</td>
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
        <!--Start Footer-->
        
        <footer class="footer text-center text-sm-start d-print-none">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0 rounded-bottom-0">
                            <div class="card-body">
                                <p class="text-muted mb-0">
                                    ©
                                    <script> document.write(new Date().getFullYear()) </script>
                                    Rizz
                                    <span
                                        class="text-muted d-none d-sm-inline-block float-end">
                                        Crafted with
                                        <i class="iconoir-heart text-danger"></i>
                                        by Mannatthemes</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!--end footer-->
    </div>
    <!-- end page content -->
</x-app-layout>
