<x-layouts.admin-app>
    @section('PageTitle', 'Register Company Category')

    <div class="container-xxl">
        <x-validation-errors class="alert" alert />
        @include('shared.feedback')

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setup Category</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.store-category') }}" method="post">
                            @csrf
                            <div class="row g-2 align-items-end">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_title" class="form-label">Category Title</label>
                                        <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_description" class="form-label">Category Description</label>
                                        <input type="text" class="form-control" id="category_description" name="category_description" placeholder="Category description">
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" id="btn-submit">Save</button>
                                    <span class="loader" id="loader"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered mb-0 table-centered" id="tbl-company-material">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoryList as $category)
                                <tr>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_description }}</td>
                                    <td class="text-end">
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Open Category</a>
                                                <a class="dropdown-item" href="#">Update Category</a>
                                                <a class="dropdown-item" href="#" onclick='deleteCategory("{{$category->categoryID}}", "{{$category->category_name}}")'>Delete Category</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Setup Price</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setup Waste Category</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.store-waste-category') }}" method="post">
                            @csrf
                            <div class="row g-2 align-items-end">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="waste_name" class="form-label">Waste Name</label>
                                        <input type="text" class="form-control" id="waste_name" name="waste_category_name" placeholder="Waste name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waste_description" class="form-label">Waste Description</label>
                                        <input type="text" class="form-control" id="waste_description" name="waste_category_description" placeholder="Waste description">
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" id="btn-submit-waste">Save</button>
                                    <span class="loader" id="loader-waste"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-centered" id="tbl-waste-category">
                        <thead>
                            <tr>
                                <th>Waste Name</th>
                                <th>Waste Description</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wasteList as $waste)
                                <tr>
                                    <td>{{ $waste->waste_name }}</td>
                                    <td>{{ $waste->waste_description }}</td>
                                    <td class="text-end">
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Open Waste</a>
                                                <a class="dropdown-item" href="#">Update Waste</a>
                                                <a class="dropdown-item" href="#" onclick='deleteCategory("{{$waste->wasteID}}", "{{$waste->waste_name}}")'>Delete Waste</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('modals')
    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function deleteCategory(id, name) {
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
                        fetch(`/admin/delete-category/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                        })
                        .then(response => {
                            if (response.ok) {
                                location.reload();
                            } else {
                                Swal.fire('Error!', 'There was an issue deleting the category.', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                        });
                    }
                });
            }
        </script>
    @endsection
</x-layouts.admin-app>
