<x-layouts.admin-app>
    @section('PageTitle', 'Register Company Category')

    <div class="container-xxl">
        <x-validation-errors class="alert" alert />
        @include('shared.feedback')

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Setup Category</h4>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <form action="{{ route('admin.store-category') }}" method="post">
                    @csrf
                    <div class="row g-2 align-items-end">
                        <!-- Category Title -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_title">Category Title</label>
                                <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category title">
                            </div>
                        </div>

                        <!-- Category Description -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_description">Category Description</label>
                                <input type="text" class="form-control" id="category_description" name="category_description" placeholder="Category description">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary" id="btn-submit">Save</button>
                                <span class="loader" id="loader"></span>
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
                </div>
            </div>
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
                        @foreach($categoryList as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td class="text-end">
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
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
    </div>
    @section('modals')
        
    @endsection
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function deleteCategory(id, name) {
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
                        fetch(`/admin/delete-category/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', }
                        })
                        .then(response => {
                            if (response.ok) {
                                location.reload(); // Reload the page to reflect changes
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting the category.',
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
                        console.log('Category deleted');
                        Swal.fire(
                            'Deleted!',
                            'The category has been deleted.',
                            'success'
                        );
                    }
                });

            }
        </script>
    @endsection
</x-layouts.admin-app>