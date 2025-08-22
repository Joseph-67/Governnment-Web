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
                            <tr  id="permission-row-{{ $permission->id }}" data-permission-row="{{ $permission->id }}">
                                <td class="row-index">{{ $loop->iteration }}</td>
                                <td class="permissionName">{{ $permission->name }}</td>
                                <td><span class="badge bg-secondary permissionGuard">{{ $permission->guard_name }}</span></td>
                                <td>{{ $permission->created_at?->diffForHumans() }}</td>
                                <td class="text-end">
                                    <!-- Edit -->
                                    <!-- Edit -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editPermissionModal{{ $permission->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Edit Permission Modal -->
                <div class="modal fade" id="editPermissionModal{{ $permission->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-3 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold">Edit Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="edit-permission-form"
                            data-id="{{ $permission->id }}"
                            data-url="{{ route('admin.update-permission', $permission->id) }}">
                        @csrf
                        <div class="modal-body">
                                                    <div class="alert editPermissionAlert d-none"></div>

                        <div class="mb-3">
                            <label class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Guard</label>
                            <select name="guard_name" class="form-select">
                            @foreach($guards as $guard)
                                <option value="{{ $guard->title }}" {{ $permission->guard_name == $guard->title ? 'selected' : '' }}>
                                {{ $guard->title }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Permission</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>


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
    @section('scripts')
       <script>
async function fetch_cycle(keyArea, url, method = "POST", formData = null) {
  const headers = {
    "Accept": "application/json",
    "X-Requested-With": "XMLHttpRequest"
  };

  const opts = { method, headers, credentials: "same-origin" };

  if (formData) {
    // ensure CSRF token is present (from @csrf in the form)
    if (!formData.has("_token")) {
      // fallback if form lost the token; you can inject it server-side into a JS var if you prefer
      formData.append("_token", "{{ csrf_token() }}");
    }
    opts.body = formData;
  }

  const res = await fetch(url, opts);

  // Try JSON first; if it fails, read as text so we can show something useful
  let data, text;
  try {
    data = await res.json();
  } catch (_) {
    try { text = await res.text(); } catch (_) {}
  }

  if (!res.ok) {
    const msg = (data && (data.error || data.message)) || text || `${res.status} ${res.statusText}`;
    const err = { status: res.status, message: msg, errors: data && data.errors ? data.errors : null };
    console.error(`${keyArea} ❌`, err);
    throw err;
  }

  console.log(`${keyArea} ✅`, data);
  return data;
}

document.addEventListener("DOMContentLoaded", () => {
  // Single delegated handler for all edit permission forms
  document.addEventListener("submit", function (e) {
    const form = e.target.closest(".edit-permission-form");
    if (!form) return;

    e.preventDefault();

    const id       = form.dataset.id;
    const url      = form.dataset.url; // reliable route URL from Blade
    const formData = new FormData(form);
    const alertBox = form.querySelector(".editPermissionAlert");

    if (alertBox) alertBox.classList.add("d-none");

    fetch_cycle("--Update Permission", url, "POST", formData)
      .then(result => {
        // Show success
        if (alertBox) {
          alertBox.classList.remove("d-none", "alert-danger");
          alertBox.classList.add("alert", "alert-success");
          alertBox.textContent = result.message || "Permission updated successfully ✅";
        }

        // Update the row live
        const row = document.getElementById(`permission-row-${id}`);
        if (row) {
          const name  = formData.get("name");
          const guard = formData.get("guard_name");
          const nameCell  = row.querySelector(".permissionName");
          const guardCell = row.querySelector(".permissionGuard");
          if (nameCell)  nameCell.textContent = name;
          if (guardCell) guardCell.textContent = guard;
        }

        // Close the modal after a short delay
        setTimeout(() => {
          const modalEl = form.closest(".modal");
          if (modalEl) {
            const instance = bootstrap.Modal.getInstance(modalEl);
            if (instance) instance.hide();
          }
        }, 800);
      })
      .catch(err => {
        // Show detailed error in the modal
        if (alertBox) {
          alertBox.classList.remove("d-none", "alert-success");
          alertBox.classList.add("alert", "alert-danger");

          if (err.errors) {
            alertBox.innerHTML = Object.values(err.errors).flat().join("<br>");
          } else {
            alertBox.textContent = err.message || "Something went wrong ❌";
          }
        }
      });
  });
});
</script>

    @endsection
</x-layouts.admin-app>
