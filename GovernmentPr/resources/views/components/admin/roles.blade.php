<x-layouts.admin-app>
    @section('PageTitle', 'Roles Management')

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-light shadow-sm border rounded-circle p-2" data-bs-toggle="tooltip" title="Go Back">
                    <i class="fas fa-arrow-left text-primary fs-5"></i>
                </a>
                <h1 class="h3 fw-bold text-dark mb-0">Roles Management</h1>
            </div>
            <button class="btn btn-primary shadow-sm rounded-pill px-4 py-2" data-bs-toggle="modal" data-bs-target="#addRole">
                <i class="fas fa-plus me-2"></i> Add Role
            </button>
        </div>

        <!-- Flash Messages -->
        <x-validation-errors class="alert" alert />
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-pill text-center" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Roles Table -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="bg-light text-secondary small text-uppercase">
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Guard</th>
                                <th>Created</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                                <tr id="roleRow{{ $role->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold text-dark" id="roleName{{ $role->id }}">{{ $role->name }}</td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary fw-semibold" id="roleGuard{{ $role->id }}">
                                            {{ $role->guard_name }}
                                        </span>
                                    </td>
                                    <td>{{ $role->created_at?->diffForHumans() }}</td>
                                    <td class="text-end pe-4">
                                        <button type="button"
                                                class="btn btn-sm btn-outline-primary rounded-pill me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editRoleModal{{ $role->id }}"
                                                data-bs-toggle="tooltip"
                                                title="Edit Role">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger rounded-pill delete-role"
                                                data-id="{{ $role->id }}"
                                                data-bs-toggle="tooltip"
                                                title="Delete Role">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <div class="modal-header bg-light border-0">
                                                <h5 class="modal-title fw-semibold text-dark" id="editRoleModalLabel{{ $role->id }}">
                                                    <i class="fas fa-pen me-2 text-primary"></i>Edit Role
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form id="editRoleForm{{ $role->id }}" data-role-id="{{ $role->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $role->id }}">
                                                <div class="modal-body">
                                                    <div class="alert d-none" id="editRoleAlert{{ $role->id }}"></div>

                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="name" id="edit_role_name_{{ $role->id }}"
                                                            class="form-control rounded-3"
                                                            value="{{ $role->name }}" minlength="3" maxlength="20" required>
                                                        <label for="edit_role_name_{{ $role->id }}">Role Name</label>
                                                    </div>

                                                    <div class="form-floating">
                                                        <select name="guard_name" id="edit_guard_name_{{ $role->id }}" class="form-select rounded-3" required>
                                                            <option value="" disabled>Select Guard</option>
                                                            @foreach($guards as $guard)
                                                                <option value="{{ $guard->title }}" {{ $role->guard_name == $guard->title ? 'selected' : '' }}>
                                                                    {{ ucfirst($guard->title) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="edit_guard_name_{{ $role->id }}">Guard</label>
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-light border rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                                                        <i class="fas fa-save me-2"></i>Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fas fa-shield-alt fa-3x mb-3 text-secondary"></i><br>
                                        <p class="mb-0">No roles found yet.</p>
                                        <small class="text-secondary">Click “Add Role” to create one.</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="addRoleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title fw-semibold text-dark">
                        <i class="fas fa-plus-circle me-2 text-primary"></i> Add New Role
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('admin.store-role') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="role_name" class="form-control rounded-3" placeholder="Role name"
                                   value="{{ old('name') }}" minlength="3" maxlength="20" required>
                            <label for="role_name">Role Name</label>
                        </div>

                        <div class="form-floating">
                            <select name="guard_name" id="guard_name" class="form-select rounded-3" required>
                                <option value="" disabled {{ old('guard_name') ? '' : 'selected' }}>Select Guard</option>
                                @foreach($guards as $guard)
                                    <option value="{{ $guard->title }}" {{ old('guard_name') == $guard->title ? 'selected' : '' }}>
                                        {{ ucfirst($guard->title) }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="guard_name">Guard</label>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light border rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4">
                            <i class="fas fa-save me-2"></i>Save Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Reopen Add Modal on Error -->
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const addModal = new bootstrap.Modal(document.getElementById("addRole"));
                addModal.show();
            });
        </script>
    @endif

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const showToast = (message, type = "success") => {
                    Swal.fire({
                        toast: true,
                        icon: type,
                        title: message,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    });
                };

                async function fetch_cycle(keyArea, url, method = "POST", formData = null) {
                    try {
                        let options = {
                            method,
                            headers: {
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                            }
                        };
                        if (formData) options.body = formData;

                        const response = await fetch(url, options);
                        const data = await response.json();

                        if (!response.ok) throw data;
                        return data;
                    } catch (error) {
                        throw error;
                    }
                }

                // Edit Role
                document.querySelectorAll("[id^='editRoleForm']").forEach(form => {
                    form.addEventListener("submit", e => {
                        e.preventDefault();
                        const roleId = form.dataset.roleId;
                        const formData = new FormData(form);
                        const btn = form.querySelector("button[type='submit']");
                        btn.disabled = true;
                        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Updating...`;

                        fetch_cycle("Update Role", "{{ route('admin.update.role') }}", "POST", formData)
                            .then(res => {
                                document.getElementById(`roleName${roleId}`).textContent = formData.get("name");
                                document.getElementById(`roleGuard${roleId}`).textContent = formData.get("guard_name");
                                showToast(res.success || "Role updated successfully");
                                bootstrap.Modal.getInstance(document.getElementById(`editRoleModal${roleId}`)).hide();
                            })
                            .catch(err => showToast(err.error || "Error updating role", "error"))
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerHTML = `<i class="fas fa-save me-2"></i>Update`;
                            });
                    });
                });

                // Delete Role
                document.querySelectorAll(".delete-role").forEach(btn => {
                    btn.addEventListener("click", () => {
                        const roleId = btn.dataset.id;

                        Swal.fire({
                            title: "Delete Role?",
                            text: "This action cannot be undone.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, Delete",
                            cancelButtonText: "Cancel",
                            confirmButtonColor: "#d33",
                        }).then(result => {
                            if (result.isConfirmed) {
                                const fd = new FormData();
                                fd.append("_token", document.querySelector('meta[name="csrf-token"]').content);
                                fd.append("id", roleId);

                                fetch_cycle("Delete Role", "{{ route('admin.delete.role') }}", "POST", fd)
                                    .then(res => {
                                        document.getElementById(`roleRow${roleId}`).remove();
                                        showToast("Role deleted successfully");
                                    })
                                    .catch(err => showToast("Error deleting role", "error"));
                            }
                        });
                    });
                });

                // Enable tooltips
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(el => new bootstrap.Tooltip(el));
            });
        </script>
    @endsection
</x-layouts.admin-app>
