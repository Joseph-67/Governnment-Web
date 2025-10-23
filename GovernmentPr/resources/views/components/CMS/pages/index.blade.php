<x-layouts.admin-app>
    @section('styles')
        <link href="{{ asset('adminAssets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
    @endsection

    {{-- ✅ Set dynamic page title for browser tab --}}
    @section('PageTitle', $title ?? 'Manage Pages')

    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                {{-- ✅ Safe dynamic heading and meta info --}}
                <h1>{{ $title ?? 'Manage Pages' }}</h1>
                <p>{{ $description ?? 'View, create, edit, and manage all pages in your system.' }}</p>
                <p>Keywords: {{ $keywords ?? 'pages, admin, cms, management' }}</p>

                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <p>Welcome to the Pages Management section. Here you can create, edit, and manage your pages.</p>
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create New Page</a>
                        </div>

                        <div class="col-auto">
                            <p>List of pages will be displayed here.</p>

                            <div class="table-responsive">
                                <table class="table mb-0 checkbox-all" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Updated</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $page)
                                            <tr data-id="{{ $loop->iteration }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ $page->slug }}</td>
                                                <td>Published</td>
                                                <td>Admin</td>
                                                <td>{{ $page?->updated_at?->diffForHumans()?? 'Not updated yet.' }}</td>

                                                <td>
                                                    <a href="{{ route('admin.pages.edit', ['page' => $page->page_id]) }}" class="btn btn-sm btn-info">Edit</a>
                                                    <button 
                                                        class="btn btn-sm btn-danger delete-btn" 
                                                        data-url="{{ route('admin.pages.destroy', $page->page_id) }}">
                                                        Delete
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
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('adminAssets/js/pages/datatable.init.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.body.addEventListener("click", async function (e) {
                if (!e.target.classList.contains("delete-btn")) return;

                e.preventDefault();

                const button = e.target;
                const row = button.closest("tr");
                const deleteUrl = button.dataset.url;

                if (!deleteUrl) {
                    console.error("Missing data-url attribute on delete button.");
                    return;
                }

                const result = await Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                });

                if (!result.isConfirmed) return;

                button.disabled = true;
                button.innerText = "Deleting...";

                try {
                    const response = await fetch(deleteUrl, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        Toastify({
                            text: data.message || "Item deleted successfully!",
                            duration: 4000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true
                        }).showToast();

                        row?.remove();
                    } else {
                        throw new Error(data.message || "Failed to delete item.");
                    }
                } catch (error) {
                    Toastify({
                        text: error.message,
                        duration: 5000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#F44336",
                        stopOnFocus: true
                    }).showToast();
                } finally {
                    button.disabled = false;
                    button.innerText = "Delete";
                }
            });
        });
        </script>
    @endsection
</x-layouts.admin-app>
