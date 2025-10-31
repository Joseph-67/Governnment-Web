<x-layouts.admin-app>
    @section('PageTitle', 'Guards Management')

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-circle-left me-1"></i> 
                </a>
                <h1 class="h3 fw-bold text-dark mb-0">Guards Management</h1>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuard">
                <i class="fas fa-plus me-1"></i> Add Guard
            </button>
        </div>
        <x-validation-errors class="alert" alert />
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                            <th scope="col">Guard Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guards as $guard)
                            <tr id="guard-row-{{ $guard->guard_id }}">
                                <td class="row-index">{{ $loop->iteration }}</td>
                                <td class="fw-semibold guardName">{{ $guard->title }}</td>
                                <td>
                                    <span class="badge {{ $guard->status ? 'bg-success' : 'bg-danger' }} guardStatus">
                                        {{ $guard->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $guard->created_at?->diffForHumans() }}</td>
                                <td class="text-end">
                                    <!-- Edit -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editGuardModal{{ $guard->guard_id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Edit Guard Modal -->
                                    <div class="modal fade" id="editGuardModal{{ $guard->guard_id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-3 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-semibold">Edit Guard</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <form class="edit-guard-form"
                                        data-id="{{ $guard->guard_id }}"
                                        data-url="/admin/guard/{{ $guard->guard_id }}">
                                        @csrf
                                        <div class="modal-body">
                                            <!-- Alert on top -->
                                            <div class="alert editGuardAlert d-none mb-3"></div>

                                            <div class="mb-3">
                                                <label class="form-label">Guard Name</label>
                                                <input type="text" name="title" class="form-control" value="{{ $guard->title }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select name="status" class="form-select">
                                                    <option value="1" {{ $guard->status ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !$guard->status ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update Guard</button>
                                        </div>
                                    </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete -->
                                    <form action="{{ route('guards.destroy', $guard->guard_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    >
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>

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
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                   class="form-control @error('title') border-danger @enderror" placeholder="e.g. web, api, admin" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
    @section('scripts')
    <script>
      document.querySelectorAll('.edit-guard-form').forEach(form => {
    form.addEventListener('submit', async e => {
        e.preventDefault();

        const id = form.dataset.id;
        const url = form.dataset.url;
        const alertBox = form.querySelector('.editGuardAlert');
        alertBox.classList.add('d-none');

        const formData = new FormData(form);

        try {
            const res = await fetch(url, {
                method: 'POST', // keep POST
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': formData.get('_token') },
                body: formData
            });

            const data = await res.json();

            if (res.ok && data.success) {
                // Show success message on top
                alertBox.classList.remove('d-none', 'alert-danger');
                alertBox.classList.add('alert', 'alert-success');
                alertBox.textContent = data.message || 'Guard updated successfully ✅';

                // Update table row live
                const row = document.querySelector(`#guard-row-${id}`);
                if (row) {
                    row.querySelector('.guardName').textContent = formData.get('title');
                    const statusBadge = row.querySelector('.guardStatus');
                    statusBadge.textContent = formData.get('status') == 1 ? 'Active' : 'Inactive';
                    statusBadge.className = formData.get('status') == 1 ? 'badge bg-success guardStatus' : 'badge bg-danger guardStatus';
                }

                // Close modal after short delay
                setTimeout(() => bootstrap.Modal.getInstance(form.closest('.modal')).hide(), 800);
            } else {
                throw data;
            }
        } catch (err) {
            alertBox.classList.remove('d-none', 'alert-success');
            alertBox.classList.add('alert', 'alert-danger');
            alertBox.textContent = err.message || err.error || 'Something went wrong ❌';
        }
    });
});


    </script>
    @endsection
</x-layouts.admin-app>
