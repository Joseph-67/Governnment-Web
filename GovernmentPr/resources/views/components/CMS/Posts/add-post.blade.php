<x-layouts.admin-app>
    @section('styles')
 <!-- App css -->
     <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

     <link rel="stylesheet" href="{{asset('adminAssets/libs/quill/quill.snow.css')}}">
     <link rel="shortcut icon" href="{{asset('adminAssets/images/favicon.ico')}}">

     <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/libs/vanillajs-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />

       
    <link href="{{asset('adminAssets/libs/uppy/uppy.min.css')}}" rel="stylesheet" type="text/css " />

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
    <script src="{{asset('adminAssets/libs/quill/quill.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/form-editor.init.js')}}"></script>
        <script src="{{asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/uppy/uppy.legacy.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/file-upload.init.js')}}"></script>
        <script src="{{asset('adminAssets/js/app.js')}}"></script>

        <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/vanillajs-datepicker/js/datepicker-full.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/moment.js')}}"></script>
        <script src="{{asset('adminAssets/libs/imask/imask.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    @endsection

    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6">
                            
    <x-validation-errors class="alert" alert />
    @include('shared.feedback') 
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Create Post</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <form action="{{ route('admin.store-post')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Post Title*</label>
                                            <input type="text" class="form-control" name="title" id="" aria-describedby="emailHelp" placeholder="">
                                        </div>
                                        <!-- <div class="mb-3"> 
                                            <label for="" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div> -->

                                        <div class="row justify-content-center">                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Post Body</h4>                      
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

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">Add Post Tag</label>
                        <select class="form-select" name="tag" id="exampleFormControlSelect1">
                        <option>select tag</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">Add Post Category</label>
                        <select class="form-select" name="category" id="exampleFormControlSelect1">
                        <option>select category</option>
                        </select>
                    </div>
                                         
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Upload Post</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div id="drag-drop-area"></div>    

                                <div class="col-md-12">
                                    <label class="mb-2 mt-4">Created At</label>
                                    <input class="form-control mb-3" type="date" name="date">
                                </div>  
                                </div><!--end card-body-->
                            </div><!--end card--> 
                        </div> <!--end col-->                                                      
                    </div><!--end row-->

                        <div class="card-body pb-2">
                                    <div class="d-flex flex-wrap gap-2 ">
                                      <button type="submit" class="btn btn-outline-primary w-50">Submit</button>
                                    </div>
                                </div><!--end card-body--> 
                </form>              
    </x-layouts.admin-app>