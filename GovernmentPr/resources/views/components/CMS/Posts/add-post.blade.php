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

    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">                      
                                            <h4 class="card-title">Custom Styles</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">                                    
                                    <form class="">
                                        <div class="row">
                                            <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Title*</label>
                                            <input type="text" class="form-control" id="username" required="">
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Title*</label>
                                            <input type="text" class="form-control" id="username" required="">
                                        </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">                            
                                                <div class="mb-3">
                                                    <label class="form-label" for="message">Message</label>
                                                    <textarea class="form-control" rows="5" id="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- Page Content-->
            <div class="page-content">
                <div class="container-xxl">
                    <div class="row justify-content-center">                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Quill Editor</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div id="editor">
                                        <p>Hello World!</p>
                                        <p>Some initial <strong>bold</strong> text</p>
                                        <p><br /></p>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->                                                       
                    </div><!--end row-->                    
                </div><!-- container -->
                                        </div>
                                    </form>      
                                </div><!--end card-body--> 
                            </div><!--end card--> 

    </x-layouts.admin-app>