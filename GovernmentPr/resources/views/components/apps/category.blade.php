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
</x-layouts.admin-app>