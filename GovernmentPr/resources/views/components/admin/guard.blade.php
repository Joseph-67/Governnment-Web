<x-layouts.admin-app>
    @section('PageTitle', 'Guards Management')

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <h1 class="h3 fw-bold text-dark mb-0">Guards Management</h1>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuard">
                <i class="fas fa-plus me-1"></i> Add Guard
            </button>
        </div>

        <!-- Table -->
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Guard Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guards as $guard)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $guard->title }}</td>
                                <td>{{ $guard->description ?? '—' }}</td>
                                <td>{{ $guard->created_at?->format('d M Y') }}</td>
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
                                                onclick="return confirm('Are you sure you want to delete this guard?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No guards found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Guard Modal -->
    <div class="modal fade" id="addGuard" tabindex="-1" aria-labelledby="addGuardLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="addGuardLabel">Add New Guard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.store-guard') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Guard Name</label>
                            <input type="text" name="title" id="title" 
                                   class="form-control" placeholder="e.g. web, api, admin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Guard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin-app>
