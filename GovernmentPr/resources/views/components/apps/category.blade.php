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
                        <form action="{{ route('admin.store-waste-category') }}" method="post">
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
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('modals')
        <!-- Subcategories Modal -->
        <div class="modal fade" id="subcategoriesModal" tabindex="-1" aria-labelledby="subcategoriesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subcategoriesModalLabel">
                            Subcategories for 
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="waste_category_id" id="waste_category_id" value="">
                            <div class="row g-2 align-items-end">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subcategory_name" class="form-label">Subcategory Name</label>
                                        <input type="text" class="form-control" id="subcategory_name" name="waste_sub_category_name" placeholder="Subcategory name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subcategory_description" class="form-label">Subcategory Description</label>
                                        <input type="text" class="form-control" id="subcategory_description" name="waste_sub_category_description" placeholder="Subcategory description">
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Add Subcategory</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Subcategory Name</th>
                                        <th>Subcategory Description</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory->waste_sub_category_name }}</td>
                                            <td>{{ $subcategory->waste_sub_category_description }}</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-warning me-2" type="button" onclick='editSubcategory({{ $subcategory->id }})'>
                                                    <i class="las la-edit me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" type="button" onclick='deleteSubcategory({{ $subcategory->id }}, "{{ $subcategory->waste_sub_category_name }}")'>
                                                    <i class="las la-trash-alt me-1"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            function openSubcategoriesModal(wasteCategoryID, wasteCategoryName) {
                const modal = new bootstrap.Modal(document.getElementById('subcategoriesModal'));
                document.getElementById('subcategoriesModalLabel').textContent = `Subcategories for Waste Category: ${wasteCategoryName}`;
                document.getElementById('waste_category_id').value = wasteCategoryID;
                fetch(`/admin/get-subcategories/${wasteCategoryID}`)
                    .then(response => response.json())
                    .then(data => {
                        const tbody = document.querySelector('#subcategoriesModal table tbody');
                        tbody.innerHTML = ''; // Clear existing rows
                        data.forEach(subcategory => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${subcategory.waste_sub_category_name}</td>
                                <td>${subcategory.waste_sub_category_description}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning me-2" type="button" onclick='editSubcategory(${subcategory.id})'>
                                        <i class="las la-edit me-1"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button" onclick='deleteSubcategory(${subcategory.id}, "${subcategory.waste_sub_category_name}")'>
                                        <i class="las la-trash-alt me-1"></i> Delete
                                    </button>
                                </td>
                            `;
                            tbody.appendChild(row);
                        });
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'Failed to fetch subcategories.', 'error');
                    });
                modal.show();
            }
            document.getElementById('btn-submit').addEventListener('click', function() {
                document.getElementById('loader').style.display = 'inline-block';
            });
            document.querySelector('#subcategoriesModal form').addEventListener('submit', function (e) {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);

                fetch('/admin/store-waste-subcategory', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success!', 'Subcategory added successfully.', 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to add subcategory.', 'error');
                    }
                })
                .catch(() => {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                });
            });
        </script>
    @endsection
</x-layouts.admin-app>
