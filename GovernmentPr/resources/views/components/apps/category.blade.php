<x-layouts.admin-app>
@section('PageTitle', 'Register Company')
<div class="container-xxl"> 
    <x-validation-errors class="alert" alert />
    @include('shared.feedback')
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-title">Setup Category</h4>
                </div><!--end col-->
            </div> <!--end row-->
        </div><!--end card-header-->
        <div class="card-body pt-0">
            <form action="{{ route('admin.store-category') }}" method="post">
                @csrf
                <div class="row g-2 align-items-end">
                    <!-- Material  -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Category Title</label>
                            <input type="text" class="form-control" placeholder="Category title"
                                name="category_title">
                        </div>
                    </div>
                    <!-- Material ends -->
                        <!-- Serial Number -->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Category Description</label>
                            <input type="text" class="form-control" placeholder="Category description"
                                name="category_description">
                        </div>
                    </div>
                        <!-- Serial Number -->
                        <!-- Unit of measurement -->
                        <div class="col">
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary" id="btn-submit">Save</button><span class="loader" id="loader"></span>
                        </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Category</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered" id="tbl-company-material">
                                        <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categoryList as $category_list)
                                            <tr>
                                                <td>{{ $category_list -> category_name }}</td>
                                                <td>{{$category_list -> category_description  }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                            <a class="dropdown-item" href="#">Open Category</a>
                                                            <a class="dropdown-item" href="#">Update Category</a>
                                                            <a class="dropdown-item" href="#">Delete Category</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Setup Price</a>
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
</x-layouts.admin-app>