<x-layouts.admin-app>
    @section('PageTitle', 'Roles & Permissions Matrix by Guard')

    <div class="container py-5">
        <!-- Navigation Links -->
        <div class="d-flex gap-3 mb-4">
            <a href="{{ route('admin.roles') }}" class="btn btn-outline-primary">
                <i class="fas fa-users-cog me-1"></i> Manage Roles
            </a>
            <a href="{{ route('admin.permissions') }}" class="btn btn-outline-success">
                <i class="fas fa-key me-1"></i> Manage Permissions
            </a>
            <a href="{{ route('admin.guards') }}" class="btn btn-outline-dark">
                <i class="fas fa-shield-alt me-1"></i> Manage Guards
            </a>
        </div>

        <!-- Guard Tabs -->
        <ul class="nav nav-tabs mb-3" id="guardTabs" role="tablist">
            @foreach($guards as $guard)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                            id="tab-{{ $guard->title }}" 
                            data-bs-toggle="tab" 
                            data-bs-target="#guard-{{ $guard->title }}" 
                            type="button" role="tab">
                        <i class="fas fa-shield-alt me-1"></i> {{ ucfirst($guard->title) }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Guard Content -->
        <div class="tab-content">
            @foreach($guards as $guard)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                     id="guard-{{ $guard->title }}" 
                     role="tabpanel">

                    <div class="card shadow border-0 mb-4">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-4">Assign Permissions ({{ ucfirst($guard->title) }} Guard)</h5>

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-start">Role \ Permission</th>
                                            @foreach($permissions->where('guard_name', $guard->title) as $permission)
                                                <th>
                                                    {{ $permission->name }}
                                                    <input type="checkbox" 
                                                           class="form-check-input permission-toggle" 
                                                           data-permission="{{ $permission->id }}" 
                                                           data-guard="{{ $guard->title }}">
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles->where('guard_name', $guard->title) as $role)
                                            <tr>
                                                <td class="text-start fw-semibold">
                                                    <input type="checkbox" 
                                                           class="form-check-input me-2 role-toggle"
                                                           data-role="{{ $role->id }}"
                                                           data-guard="{{ $guard->title }}">
                                                    <span class="role-name">{{ $role->name }}</span>
                                                </td>
                                                @foreach($permissions->where('guard_name', $guard->title) as $permission)
                                                    <td>
                                                        <input type="checkbox"
                                                               class="form-check-input role-permission"
                                                               name="permissions[{{ $role->id }}][]"
                                                               value="{{ $permission->id }}"
                                                               data-role="{{ $role->id }}"
                                                               data-permission="{{ $permission->id }}"
                                                               data-guard="{{ $guard->title }}">
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Overlay Spinner -->
    <div id="spinnerOverlay" 
         style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(255,255,255,0.6);z-index:9999;align-items:center;justify-content:center;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    @section('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', () => {

        const spinnerOverlay = document.getElementById('spinnerOverlay');
        let spinnerTimer = null;

        function showOverlaySpinner() {
            spinnerTimer = setTimeout(() => {
                spinnerOverlay.style.display = "flex";
            }, 400);
        }
        function hideOverlaySpinner() {
            clearTimeout(spinnerTimer);
            spinnerOverlay.style.display = "none";
        }

        function showToast(message, type = "info", duration = 3000) {
            let colors = {
                info: "bg-warning text-dark",
                success: "bg-success text-white",
                error: "bg-danger text-white"
            };

            let toast = document.createElement("div");
            toast.className = `toast align-items-center border-0 show position-fixed bottom-0 end-0 m-3 ${colors[type]}`;
            toast.role = "alert";
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
            document.body.appendChild(toast);

            if (type !== "info") {
                setTimeout(() => {
                    toast.classList.remove("show");
                    toast.classList.add("fade");
                    setTimeout(() => toast.remove(), 500);
                }, duration);
            }

            toast.querySelector("button").addEventListener("click", () => toast.remove());
            return toast;
        }

        function updateRowToggle(roleId, guard) {
            let rowCbs = document.querySelectorAll(`.role-permission[data-role="${roleId}"][data-guard="${guard}"]`);
            let rowToggle = document.querySelector(`.role-toggle[data-role="${roleId}"][data-guard="${guard}"]`);
            if (!rowToggle) return;
            rowToggle.checked = [...rowCbs].every(cb => cb.checked);
        }

        function updateColToggle(permId, guard) {
            let colCbs = document.querySelectorAll(`.role-permission[data-permission="${permId}"][data-guard="${guard}"]`);
            let colToggle = document.querySelector(`.permission-toggle[data-permission="${permId}"][data-guard="${guard}"]`);
            if (!colToggle) return;
            colToggle.checked = [...colCbs].every(cb => cb.checked);
        }

        // Handle individual permission
        document.querySelectorAll('.role-permission').forEach(cb => {
            cb.addEventListener('change', function() {
                let roleId = this.dataset.role;
                let permId = this.dataset.permission;
                let guard = this.dataset.guard;
                let checked = this.checked;

                let row = cb.closest("tr");
                let roleNameSpan = row.querySelector(".role-name");

                row.style.opacity = "0.5";
                row.style.pointerEvents = "none";
                cb.disabled = true;

                let spinner = roleNameSpan.querySelector(".spinner-border");
                if (!spinner) {
                    spinner = document.createElement("span");
                    spinner.className = "spinner-border spinner-border-sm ms-2";
                    spinner.style.width = "1rem";
                    spinner.style.height = "1rem";
                    spinner.role = "status";
                    spinner.innerHTML = '<span class="visually-hidden">Loading...</span>';
                    roleNameSpan.appendChild(spinner);
                }

                showOverlaySpinner();
                let savingToast = showToast("Saving...", "info", 0);

                fetch("{{ route('admin.update.permission-role') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        role_id: roleId,
                        permission_id: permId,
                        guard_name: guard,
                        checked: checked
                    })
                })
                .then(res => res.json())
                .then(data => {
                    savingToast.remove();
                    if (data.success) {
                        showToast("Saved successfully ✅", "success");
                    } else {
                        showToast("Failed to save ❌", "error");
                        cb.checked = !checked;
                    }
                })
                .catch(err => {
                    savingToast.remove();
                    showToast("Error saving ❌", "error");
                    cb.checked = !checked;
                })
                .finally(() => {
                    spinner.remove();
                    row.style.opacity = "1";
                    row.style.pointerEvents = "auto";
                    cb.disabled = false;
                    hideOverlaySpinner();
                    updateRowToggle(roleId, guard);
                    updateColToggle(permId, guard);
                });
            });
        });

        // Column toggle
        document.querySelectorAll('.permission-toggle').forEach(toggle => {
            toggle.addEventListener('change', function() {
                let permId = this.dataset.permission;
                let guard = this.dataset.guard;
                document.querySelectorAll(`.role-permission[data-permission="${permId}"][data-guard="${guard}"]`)
                    .forEach(cb => {
                        cb.checked = this.checked;
                        cb.dispatchEvent(new Event('change'));
                    });
            });
        });

        // Row toggle
        document.querySelectorAll('.role-toggle').forEach(toggle => {
            toggle.addEventListener('change', function() {
                let roleId = this.dataset.role;
                let guard = this.dataset.guard;
                document.querySelectorAll(`.role-permission[data-role="${roleId}"][data-guard="${guard}"]`)
                    .forEach(cb => {
                        cb.checked = this.checked;
                        cb.dispatchEvent(new Event('change'));
                    });
            });
        });

        // Initialize toggles
        document.querySelectorAll('.role-toggle').forEach(rt => updateRowToggle(rt.dataset.role, rt.dataset.guard));
        document.querySelectorAll('.permission-toggle').forEach(pt => updateColToggle(pt.dataset.permission, pt.dataset.guard));

    });
    </script>
    @endsection
</x-layouts.admin-app>
