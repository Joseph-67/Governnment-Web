<x-layouts.admin-app>
    @section('PageTitle', 'Roles Management')

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-circle-left me-1"></i> 
                </a>
                <h1 class="h3 fw-bold text-dark mb-0">Roles Management</h1>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRole">
                <i class="fas fa-plus me-1"></i> Manage Role
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
                            <th scope="col">Role Name</th>
                            <th scope="col">Guard</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr id="roleRow{{ $role->id }}">
                                <td class="row-index">{{ $loop->iteration }}</td>
                                <td class="fw-semibold" id="roleName{{ $role->id }}">{{ $role->name }}</td>
                                <td><span class="badge bg-secondary" id="roleGuard{{ $role->id }}">{{ $role->guard_name }}</span></td>
                                <td>{{ $role->created_at?->diffForHumans() }}</td>
                                <td class="text-end">
                                    <!-- Edit -->
                                    <!-- Edit Button triggers modal -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editRoleModal{{ $role->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Edit Role Modal -->
                                <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content rounded-3 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-semibold" id="editRoleModalLabel{{ $role->id }}">Edit Role</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form id="editRoleForm{{ $role->id }}" data-role-id="{{ $role->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $role->id }}">

                                                <div class="modal-body">
                                                    <div class="alert d-none" id="editRoleAlert{{ $role->id }}"></div>

                                                    <div class="mb-3">
                                                        <label for="edit_role_name_{{ $role->id }}" class="form-label">Role Name</label>
                                                        <input type="text" name="name" id="edit_role_name_{{ $role->id }}"
                                                            value="{{ old('name', $role->name) }}"
                                                            minlength="3" maxlength="20"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="edit_guard_name_{{ $role->id }}" class="form-label">Guard</label>
                                                        <select name="guard_name" id="edit_guard_name_{{ $role->id }}" class="form-select" required>
                                                            <option value="" disabled>Select Guard</option>
                                                            @foreach($guards as $guard)
                                                                <option value="{{ $guard->title }}" {{ $role->guard_name == $guard->title ? 'selected' : '' }}>
                                                                    {{ $guard->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Role</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Delete Button -->
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger delete-role" 
                                            data-id="{{ $role->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    No roles found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="addRoleLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="addRoleLabel">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.store-role') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Role Name</label>
                            <input type="text" name="name" id="role_name" value="{{ old('name') }}" 
                                   minlength="3" maxlength="20"
                                   class="form-control" placeholder="e.g. Admin" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="guard_name" class="form-label">Guard</label>
                            <select name="guard_name" id="guard_name" class="form-select" required>
                                <option value="" disabled {{ old('guard_name') ? '' : 'selected' }}>Select Guard</option>
                                @foreach($guards as $guard)
                                    <option value="{{ $guard->title }}" {{ old('guard_name') == $guard->title ? 'selected' : '' }}>{{ $guard->title }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
    <!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
<!-- edit and delete role -->
        <script>
async function fetch_cycle(keyArea, url, method = "POST", formData = null) {
    try {
        let response = await fetch(url, {
            method: method,
            headers: {
                "Accept": "application/json",
                "X-CSRF-TOKEN": formData ? formData.get("_token") : document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        });

        let data = await response.json();

        if (!response.ok) {
            throw data;
        }

        console.log(`${keyArea} ✅`, data);
        return data;

    } catch (error) {
        console.error(`${keyArea} ❌`, error);
        throw error;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[id^='editRoleForm']").forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            let roleId   = this.getAttribute("data-role-id");
            let formData = new FormData(this);
            let alertBox = document.getElementById(`editRoleAlert${roleId}`);
            alertBox.classList.add("d-none");

            fetch_cycle('--Update Role', "{{ route('admin.update.role') }}", "POST", formData)
                .then(result => {
                    // ✅ Show success
                    alertBox.classList.remove("d-none", "alert-danger");
                    alertBox.classList.add("alert", "alert-success");
                    alertBox.textContent = result.success || "Role updated successfully ✅";

                    // ✅ Update row values dynamically
                    document.getElementById(`roleName${roleId}`).textContent = formData.get("name");
                    document.getElementById(`roleGuard${roleId}`).textContent = formData.get("guard_name");

                    // ✅ Close modal after short delay
                    setTimeout(() => {
                        let modalEl = document.getElementById(`editRoleModal${roleId}`);
                        let modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    }, 800);
                })
                .catch(err => {
                    alertBox.classList.remove("d-none", "alert-success");
                    alertBox.classList.add("alert", "alert-danger");

                    if (err.errors) {
                        alertBox.innerHTML = Object.values(err.errors).flat().join("<br>");
                    } else {
                        alertBox.textContent = err.error || "Something went wrong ❌";
                    }
                });
        });
    });
});


</script>


    @endsection
</x-layouts.admin-app>