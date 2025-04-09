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
                                <form method="post" action="{{ route('admin.store-chemical') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-2 align-items-end">
                                        <!-- Chemical Name -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="chemical_name">Chemical Name</label>
                                                <input type="text" class="form-control" id="chemical_name" placeholder="Chemical Name" name="chemical_name" required>
                                            </div>
                                        </div>
                                        <!-- Chemical Name -->

                                        <!-- Chemical Category -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="chemical_category">Chemical Category</label>
                                                <select class="form-control" id="chemical_category" name="chemical_category" required>
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->categoryID }}" class="text-capitalize">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Chemical Category -->

                                        <!-- Chemical Image -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="chemical_image">Chemical Image</label>
                                                <input type="file" class="form-control" id="chemical_image" name="chemical_image" accept="image/*">
                                            </div>
                                        </div>
                                        <!-- Chemical Image -->

                                        <!-- CAS No -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cas_no">CAS No</label>
                                                <input type="text" class="form-control" id="cas_no" placeholder="CAS No" name="cas_no">
                                            </div>
                                        </div>
                                        <!-- CAS No -->

                                        <!-- EC No -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ec_no">EC No</label>
                                                <input type="text" class="form-control" id="ec_no" placeholder="EC No" name="ec_no" >
                                            </div>
                                        </div>
                                        <!-- EC No -->

                                        <!-- REACH Registration No -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="reach_registration_no">REACH Registration No</label>
                                                <input type="text" class="form-control" id="reach_registration_no" placeholder="REACH Registration No" name="reach_registration_no">
                                            </div>
                                        </div>
                                        <!-- REACH Registration No -->

                                        <!-- GHS Classification -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ghs_classification">GHS Classification</label>
                                                <input type="text" class="form-control" id="ghs_classification" placeholder="GHS Classification" name="ghs_classification">
                                            </div>
                                        </div>
                                        <!-- GHS Classification -->

                                        <!-- Description -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" placeholder="Description" name="description" rows="3" ></textarea>
                                            </div>
                                        </div>
                                        <!-- Description -->

                                        <!-- Formula -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="formula">Formula</label>
                                                <input type="text" class="form-control" id="formula" placeholder="Formula" name="formula">
                                            </div>
                                        </div>
                                        <!-- Formula -->

                                        <!-- Hazard Information -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hazard_information">Hazard Information</label>
                                                <textarea class="form-control" id="hazard_information" placeholder="Hazard Information" name="hazard_information" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- Hazard Information -->

                                        <!-- First Aid -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_aid">First Aid</label>
                                                <textarea class="form-control" id="first_aid" placeholder="First Aid" name="first_aid" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- First Aid -->

                                        <!-- Fire Fighting -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fire_fighting">Fire Fighting</label>
                                                <textarea class="form-control" id="fire_fighting" placeholder="Fire Fighting" name="fire_fighting" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- Fire Fighting -->

                                        <!-- Accidental Release -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="accidental_release">Accidental Release</label>
                                                <textarea class="form-control" id="accidental_release" placeholder="Accidental Release" name="accidental_release" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- Accidental Release -->

                                        <!-- Storage Handling -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="storage_handling">Storage Handling</label>
                                                <textarea class="form-control" id="storage_handling" placeholder="Storage Handling" name="storage_handling" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- Storage Handling -->

                                        <!-- Disposal -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="disposal">Disposal</label>
                                                <textarea class="form-control" id="disposal" placeholder="Disposal" name="disposal" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- Disposal -->

                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary" id="btn-submit-chemical">Save</button>
                                                <span class="loader" id="loader"></span>
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
                                            <th>Category</th>
                                            <th>CAS No</th>
                                            <th>EC No</th>
                                            <th>REACH Registration No</th>
                                            <th>GHS Classification</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chemical as $chemical_detail)
                                            <tr>
                                                <td>{{$chemical_detail->name}}({!! $chemical_detail->formula !!})</td>
                                                <td>{{$chemical_detail->chemicalCategory->category_name}}</td>
                                                <td>{{$chemical_detail->cas_number}}</td>
                                                <td>{{$chemical_detail->ec_number}}</td>
                                                <td>{{$chemical_detail->reach_registration_number}}</td>
                                                <td>{{$chemical_detail->ghs_classification}}</td>
                                                <td>{{$chemical_detail->description}}</td>
                                                <td><span class="badge bg-{{ ($chemical_detail->status == 'active') ? 'success' : 'danger' }}">{{$chemical_detail->status}}</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                            <a class="dropdown-item" href="#">Update Chemical</a>
                                                            <a class="dropdown-item" href="#" onclick="deleteChemical('{{ $chemical_detail->chemicalID }}', '{{ $chemical_detail->chemical }}')">Delete Chemical</a>
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
        <script>
                function deleteChemicals(id, name) {
                    // Use a fancy popup (e.g., SweetAlert2)
                    Swal.fire({
                        title: `Are you sure you want to delete ${name}?`,
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform delete action here
                            fetch(`/admin/delete-chemical/${id}`, {
                                method: 'DELETE',
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', }
                            })
                            .then(response => {
                                if (response.ok) {
                                    location.reload(); // Reload the page to reflect changes
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was an issue deleting the chemical.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire(
                                    'Error!',
                                    'An unexpected error occurred.',
                                    'error'
                                );
                            });
                            console.log('Chemical deleted');
                            Swal.fire(
                                'Deleted!',
                                'The chemical has been deleted.',
                                'success'
                            );
                        }
                    });
    
                }
            </script>
    @endsection
</x-layouts.admin-app>