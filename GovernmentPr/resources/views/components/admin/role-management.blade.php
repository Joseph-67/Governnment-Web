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

                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="guard_name" value="{{ $guard->title }}">

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
                                                            data-permission="{{ $permission->guard_id }}" 
                                                            data-guard="{{ $guard->title }}">
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles->where('guard_name', $guard->title) as $role)
                                                <tr>
                                                    <td class="text-start fw-semibold">
                                                        {{ $role->name }}
                                                    </td>
                                                    @foreach($permissions->where('guard_name', $guard->title) as $permission)
                                                    <td>
                                                            <input type="checkbox"
                                                                class="form-check-input role-permission"
                                                                name="permissions[{{ $role->id }}][]"
                                                                value="{{ $permission->id }}"
                                                                data-role="{{ $role->id }}"
                                                                data-permission="{{ $permission->id }}"
                                                                data-guard="{{ $guard }}"
                                                                >
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Submit -->
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Column toggle by permission
            document.querySelectorAll('.permission-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    let permId = this.dataset.permission;
                    let guard = this.dataset.guard;
                    document.querySelectorAll(`.role-permission[data-permission="${permId}"][data-guard="${guard}"]`)
                        .forEach(cb => cb.checked = this.checked);
                });
            });

            // Row toggle by role
            document.querySelectorAll('.role-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    let roleId = this.dataset.role;
                    let guard = this.dataset.guard;
                    document.querySelectorAll(`.role-permission[data-role="${roleId}"][data-guard="${guard}"]`)
                        .forEach(cb => cb.checked = this.checked);
                });
            });
        });
    </script>
    @endpush
</x-layouts.admin-app>
