<x-layouts.admin-app>
    @section('PageTitle', 'Permissions Management')

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-circle-left me-1"></i> 
                </a>
                <h1 class="h3 fw-bold text-dark mb-0">Permissions Management</h1>
            </div>
            <button class="btn btn-primary d-flex align-items-center gap-2" 
                    data-bs-toggle="modal" 
                    data-bs-target="#addPermission">
                <i class="fas fa-plus"></i> Add Permission
            </button>
        </div>
        <x-validation-errors class="alert" alert />
        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{-- Bootstrap Icons if available --}}
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Table -->
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Permission Name</th>
                            <th scope="col">Guard</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td><span class="badge bg-secondary">{{ $permission->guard_name }}</span></td>
                                <td>{{ $permission->created_at?->diffForHumans() }}</td>
                                <td class="text-end">
                                    <!-- Edit -->
                                    <a href="" 
                                       class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- Delete -->
                                    <form action="" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this permission?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No permissions found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermission" tabindex="-1" aria-labelledby="addPermissionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="addPermissionLabel">Add New Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.store-permission') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control" placeholder="e.g. create-posts" required>
                        </div>
                        <div class="mb-3">
                            <label for="guard_name" class="form-label">Guard</label>
                            <select name="guard_name" id="guard_name" class="form-select">
                                <option value="" disabled selected>Select Guard</option>
                                @foreach($guards as $guard)
                                    <option value="{{ $guard->title }}">{{ $guard->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin-app>
