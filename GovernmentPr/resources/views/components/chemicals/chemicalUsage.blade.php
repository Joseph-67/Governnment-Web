<x-layouts.admin-app>
@section('PageTitle', 'Chemicals')
    @section('styles')
 <!-- App css -->
     <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />


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

    <div class="tab-pane p-3" id="materials" role="tabpanel">
    <x-validation-errors class="alert" alert />
    @include('shared.feedback')
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Create Chemical</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <form method="post" action="{{ route('admin.store-chemical')}}" >
                                    @csrf
                                    <div class="row g-2 align-items-end"> 
                                        <!-- Chemical Name -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Chemical name</label>
                                                <input type="text" class="form-control" placeholder="Chemical Name"
                                                    name="chemical_name">
                                            </div>
                                        </div>
                                         <!-- Chemical Name -->

                                        

                                        <!-- Description -->
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <input type="text" class="form-control" placeholder="Description"
                                                    name="description">
                                            </div>
                                        </div>
                                         <!-- Description -->
                                          <div class="col">
                                            <div class="d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary" id="btn-submit-material">Save</button><span class="loader" id="loader"></span>
                                            </div>
                                          </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Chemicals</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered" id="tbl-company-material">
                                        <thead>
                                        <tr>
                                            <th>Chemical Name</th>
                                            <th>Description</th>
                                            <th>chemical Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chemical as $chemical_detail)
                                            <tr>
                                                <td>{{$chemical_detail -> chemical}}</td>
                                                <td>{{$chemical_detail -> description}}</td>
                                                <td><span class="badge bg-{{ ($chemical_detail -> status == 'active')? 'success':'danger'}}">{{$chemical_detail -> status }}</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                            <a class="dropdown-item" href="#">Update Chemical</a>
                                                            <a class="dropdown-item" href="#">Delete Chemical</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div>
                        </div>
                    </div>
</x-layouts.admin-app>