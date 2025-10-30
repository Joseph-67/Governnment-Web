<x-layouts.admin-app>
    @section('PageTitle', 'Waste Management & Categories')

    @section('styles')
        <!-- Icons / DataTables / Toastify -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="{{ asset('adminAssets/css/toastify.css') }}">

        <style>
            :root{
                --primary-500: #0072ff;
                --accent-500: #00c6ff;
                --muted: #6c757d;
                --card-radius: 14px;
            }

            /* Page background */
            body {
                background: linear-gradient(180deg, #f6fbff 0%, #eef9ff 100%);
                min-height: 100vh;
            }

            /* Header */
            .wm-header {
                background: linear-gradient(90deg, var(--accent-500), var(--primary-500));
                border-radius: var(--card-radius);
                color: #fff;
                padding: 1.6rem;
                position: relative;
                overflow: hidden;
            }
            .wm-header .hero-ill {
                position: absolute;
                right: 0;
                top: 0;
                height: 100%;
                width: 320px;
                opacity: 0.16;
                background: url('https://images.unsplash.com/photo-1581579185735-8b6b38d0e3b0?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&s=2a09c9b6a1c6b31acebb0d2f6e0b69c8') center/cover no-repeat;
            }

            .card-wm {
                border: none;
                border-radius: var(--card-radius);
                box-shadow: 0 10px 30px rgba(12, 32, 85, 0.06);
                overflow: hidden;
                transition: transform .15s ease, box-shadow .15s ease;
            }
            .card-wm:hover{
                transform: translateY(-6px);
                box-shadow: 0 16px 40px rgba(12,32,85,0.08);
            }

            /* Tabs */
            .nav-wm .nav-link {
                border-radius: 10px;
                padding: .7rem 1rem;
                color: var(--primary-500);
                margin-right: .5rem;
            }
            .nav-wm .nav-link.active {
                background: linear-gradient(90deg,var(--accent-500),var(--primary-500));
                color: #fff;
                box-shadow: 0 8px 18px rgba(0,114,255,0.12);
            }

            /* Empty state */
            .empty-state {
                text-align: center;
                padding: 2.2rem;
                color: var(--muted);
            }
            .empty-state img { max-width: 220px; opacity: .92; }

            /* FAB for mobile */
            .fab {
                position: fixed;
                right: 20px;
                bottom: 20px;
                z-index: 2000;
                width: 56px;
                height: 56px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(90deg,var(--accent-500),var(--primary-500));
                color: #fff;
                box-shadow: 0 10px 30px rgba(0,114,255,0.18);
                border: none;
            }
            .fab:focus { outline: 3px solid rgba(0,114,255,0.18); }

            /* Toggle dark */
            .dark-mode {
                --bg: #0b1220;
                --panel: #0f1724;
                --muted: #9aa4b2;
                color-scheme: dark;
            }

            /* Responsive tweaks */
            @media (max-width: 768px) {
                .wm-header { padding: 1.2rem; }
                .wm-header .hero-ill { display: none; }
                .nav-wm .nav-link { padding: .55rem .8rem; font-size: .95rem; }
            }

            /* Table focus */
            table.dataTable tbody tr:focus-within,
            table.dataTable tbody tr:hover {
                background: rgba(0,114,255,0.03);
            }

            /* Modal polished */
            .modal-content { border-radius: 12px; overflow: hidden; }
            .btn-gradient {
                background: linear-gradient(90deg,var(--accent-500),var(--primary-500));
                color: #fff;
                border: none;
            }
            .btn-outline-muted { border: 1px solid #e6eef8; color: var(--muted); background: transparent; }
        </style>
    @endsection

    {{-- PAGE CONTENT --}}
    <div class="container py-4">
        <div class="wm-header mb-4 d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div>
                <h2 class="mb-1 fw-bold"><i class="bi bi-recycle me-2"></i> Waste Management</h2>
                <p class="mb-0 opacity-85">Manage waste categories and individual waste items — track quantities, units and categories in one place.</p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="form-check form-switch me-2">
                    <input class="form-check-input" type="checkbox" id="darkModeToggle" aria-label="Toggle dark mode">
                    <label class="form-check-label text-white ms-2" for="darkModeToggle">Dark</label>
                </div>
                <button class="btn btn-outline-light btn-sm" id="helpBtn"><i class="bi bi-question-circle me-1"></i> Help</button>
            </div>

            <div class="hero-ill" aria-hidden="true"></div>
        </div>

        <div class="card card-wm p-3">
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                <ul class="nav nav-pills nav-wm" id="wmTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="items-tab" data-bs-toggle="pill" data-bs-target="#items" type="button" role="tab" aria-controls="items" aria-selected="true">
                            <i class="bi bi-box-seam me-1"></i> Waste Items
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="categories-tab" data-bs-toggle="pill" data-bs-target="#categories" type="button" role="tab" aria-controls="categories" aria-selected="false">
                            <i class="bi bi-list-ul me-1"></i> Categories
                        </button>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <div class="d-none d-md-block">
                        <input class="form-control form-control-sm" id="globalSearch" placeholder="Search items or categories..." aria-label="Search">
                    </div>
                    <button class="btn btn-gradient btn-sm" id="openAddBtn"><i class="bi bi-plus-lg me-1"></i> Add</button>
                </div>
            </div>

            <div class="tab-content" id="wmTabContent">
                {{-- WASTE ITEMS TAB --}}
                <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="items-tab">
                    <div class="table-responsive">
                        <table id="tbl-waste-items" class="table table-hover align-middle w-100">
                            <thead>
                                <tr>
                                    <th>Waste Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="empty-state d-none" id="emptyItems">
                            <img src="https://undraw.co/illustrations/undraw_waste.svg" alt="No waste items">
                            <h5 class="mt-3">No waste items yet</h5>
                            <p>Create waste items to start tracking materials and quantities.</p>
                            <button class="btn btn-gradient" id="addItemEmpty">Add Waste Item</button>
                        </div>
                    </div>
                </div>

                {{-- CATEGORIES TAB --}}
                <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                    <div class="table-responsive">
                        <table id="tbl-waste-categories" class="table table-hover align-middle w-100">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th class="text-center">Subcategories</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="empty-state d-none" id="emptyCategories">
                            <img src="https://undraw.co/illustrations/undraw_folder.svg" alt="No categories">
                            <h5 class="mt-3">No categories found</h5>
                            <p>Add categories to organize waste items more effectively.</p>
                            <button class="btn btn-gradient" id="addCategoryEmpty">Add Category</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-4 text-center text-muted">
            ♻️ Built for sustainable operations · Waste Management System • {{ date('Y') }}
        </footer>
    </div>

    {{-- MODALS --}}
    @section('modals')
        <!-- Add / Edit Waste Item Modal -->
        <div class="modal fade" id="modalWasteItem" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-white">
                        <h5 class="modal-title" id="modalWasteItemTitle"><i class="bi bi-box-seam me-2"></i> <span>Add Waste Item</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="formWasteItem" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="waste_id" id="waste_item_id">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Waste Name <span class="text-danger">*</span></label>
                                    <input type="text" name="waste_name" id="waste_item_name" class="form-control" required>
                                    <div class="invalid-feedback">Please enter a waste name.</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="waste_category_id" id="waste_item_category" class="form-select" required>
                                        <option value="" disabled selected>Select category</option>
                                        @foreach($wasteCategories as $cat)
                                            <option value="{{ $cat->waste_category_id }}">{{ $cat->waste_category_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Choose a category.</div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" min="0" step="any" name="quantity" id="waste_item_quantity" class="form-control" required>
                                    <div class="invalid-feedback">Enter quantity.</div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Unit <span class="text-danger">*</span></label>
                                    <input type="text" name="unit" id="waste_item_unit" class="form-control" placeholder="e.g. kg" required>
                                    <div class="invalid-feedback">Specify a unit.</div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Sub Category</label>
                                    <select name="waste_sub_category_id" id="waste_item_subcategory" class="form-select">
                                        <option value="">-- optional --</option>
                                        @foreach($wasteSubCategories as $sub)
                                            <option value="{{ $sub->waste_sub_category_id }}">{{ $sub->waste_sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="waste_item_description" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-muted" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-gradient" id="submitWasteItemBtn"><i class="bi bi-save me-1"></i> Save Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add / Edit Category Modal -->
        <div class="modal fade" id="modalCategory" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-white">
                        <h5 class="modal-title"><i class="bi bi-list-ul me-2"></i> <span id="modalCategoryTitle">Add Category</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="formCategory" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="category_id" id="category_id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="category_name" id="category_name" class="form-control" required>
                                <div class="invalid-feedback">Category name required.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="category_description" id="category_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-muted" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-gradient" id="submitCategoryBtn"><i class="bi bi-save me-1"></i> Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('adminAssets/js/toastify.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // ROUTE NAMES ASSUMPTION:
            // GET list:       route('admin.get-waste-items') -> returns { data: [...] }
            // GET categories: route('admin.get-waste-categories') -> returns { data: [...] }
            // POST store item: route('admin.store-waste-item')
            // POST store category: route('admin.store-waste-category')
            // GET edit item: /admin/edit-waste-item/{id}
            // GET edit category: /admin/edit-waste-category/{id}
            // DELETE item: /admin/delete-waste-item/{id}
            // DELETE category: /admin/delete-waste-category/{id}

            let itemsTable, categoriesTable;

            document.addEventListener('DOMContentLoaded', () => {
                // DARK MODE TOGGLE (persisted)
                const darkToggle = document.getElementById('darkModeToggle');
                const savedDark = localStorage.getItem('wm_dark') === '1';
                if (savedDark) document.documentElement.classList.add('dark-mode'), darkToggle.checked = true;
                darkToggle.addEventListener('change', e => {
                    if (e.target.checked) {
                        document.documentElement.classList.add('dark-mode');
                        localStorage.setItem('wm_dark', '1');
                    } else {
                        document.documentElement.classList.remove('dark-mode');
                        localStorage.removeItem('wm_dark');
                    }
                });

                // Initialize DataTables
                itemsTable = $('#tbl-waste-items').DataTable({
                    ajax: { url: "{{ route('admin.get-waste-items') }}", dataSrc: 'data' },
                    columns: [
                        { data: 'name' },
                        { data: 'category_name' },
                        { data: 'quantity' },
                        { data: 'unit' },
                        {
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            className: 'text-end',
                            render: function(id, type, row) {
                                return `
                                    <div class="d-inline-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" onclick="openEditItem(${id})" aria-label="Edit ${row.name}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="confirmDeleteItem(${id}, '${row.name}')" aria-label="Delete ${row.name}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>`;
                            }
                        }
                    ],
                    responsive: true,
                    initComplete: function(settings, json) {
                        toggleEmptyState('#emptyItems', json.data && json.data.length > 0);
                    }
                });

                categoriesTable = $('#tbl-waste-categories').DataTable({
                    ajax: { url: "{{ route('admin.get-waste-categories') }}", dataSrc: 'data' },
                    columns: [
                        { data: 'name' },
                        { data: 'description' },
                        { data: 'sub_count', className: 'text-center' },
                        {
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            className: 'text-end',
                            render: function(id, type, row) {
                                return `
                                    <div class="d-inline-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" onclick="openEditCategory(${id})" aria-label="Edit ${row.name}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="confirmDeleteCategory(${id}, '${row.name}')" aria-label="Delete ${row.name}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>`;
                            }
                        }
                    ],
                    responsive: true,
                    initComplete: function(settings, json) {
                        toggleEmptyState('#emptyCategories', json.data && json.data.length > 0);
                    }
                });

                // Global search wired to both tables
                $('#globalSearch').on('input', function(){
                    itemsTable.search(this.value).draw();
                    categoriesTable.search(this.value).draw();
                });

                // Open Add modal depending on active tab
                document.getElementById('openAddBtn').addEventListener('click', () => {
                    const activeTab = document.querySelector('.nav-wm .nav-link.active').id;
                    if (activeTab === 'categories-tab') openAddCategory();
                    else openAddItem();
                });

                // Small-screen FAB opens the active add
                const fab = document.createElement('button');
                fab.className = 'fab d-md-none';
                fab.innerHTML = '<i class="bi bi-plus-lg"></i>';
                fab.setAttribute('aria-label','Quick add');
                document.body.appendChild(fab);
                fab.addEventListener('click', () => {
                    const activeTab = document.querySelector('.nav-wm .nav-link.active').id;
                    if (activeTab === 'categories-tab') openAddCategory();
                    else openAddItem();
                });

                // Empty-state add buttons
                document.getElementById('addItemEmpty').addEventListener('click', openAddItem);
                document.getElementById('addCategoryEmpty').addEventListener('click', openAddCategory);

                // Form submissions
                document.getElementById('formWasteItem').addEventListener('submit', submitItemForm);
                document.getElementById('formCategory').addEventListener('submit', submitCategoryForm);

                // Basic bootstrap validation styling
                Array.from(document.querySelectorAll('.needs-validation')).forEach(form => {
                    form.addEventListener('submit', ev => {
                        if (!form.checkValidity()) {
                            ev.preventDefault();
                            ev.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });

                // Help button
                document.getElementById('helpBtn').addEventListener('click', () => {
                    Swal.fire({
                        title: 'Waste Management Help',
                        html: '<p class="text-start">Use the <strong>Waste Items</strong> tab to manage individual waste records. Use <strong>Categories</strong> to group items logically (e.g. Recyclables, Organic).</p><ul class="text-start"><li>Add items quickly with the <em>Add</em> button or FAB.</li><li>Edit and delete with the action buttons.</li><li>Use the search box to filter both tables.</li></ul>',
                        icon: 'info',
                        width: 600
                    });
                });

                // Support keyboard access: open Add with Ctrl+N
                document.addEventListener('keydown', (e)=>{
                   if (e.ctrlKey && e.key.toLowerCase()==='n') {
                       document.getElementById('openAddBtn').click();
                       e.preventDefault();
                   }
                });
            });

            /* ---------- Helpers ---------- */
            function toggleEmptyState(selector, hasData) {
                const el = document.querySelector(selector);
                if (!el) return;
                el.classList.toggle('d-none', hasData);
            }

            function showToast(msg, success = true) {
                Toastify({ text: msg, duration: 3000, backgroundColor: success ? "#28a745" : "#dc3545" }).showToast();
            }

            /* ---------- Items CRUD ---------- */
            function openAddItem() {
                document.getElementById('modalWasteItemTitle').innerText = 'Add Waste Item';
                document.getElementById('submitWasteItemBtn').innerHTML = '<i class="bi bi-save me-1"></i> Save Item';
                document.getElementById('formWasteItem').reset();
                document.getElementById('waste_item_id').value = '';
                new bootstrap.Modal(document.getElementById('modalWasteItem')).show();
            }

            async function openEditItem(id) {
                try {
                    const res = await fetch(`/admin/edit-waste-item/${id}`);
                    const { success, data } = await res.json();
                    if (!success) return showToast('Failed to load item', false);
                    document.getElementById('modalWasteItemTitle').innerText = 'Edit Waste Item';
                    document.getElementById('submitWasteItemBtn').innerHTML = '<i class="bi bi-save me-1"></i> Update Item';

                    document.getElementById('waste_item_id').value = data.id;
                    document.getElementById('waste_item_name').value = data.name;
                    document.getElementById('waste_item_category').value = data.category_id ?? '';
                    document.getElementById('waste_item_subcategory').value = data.sub_category_id ?? '';
                    document.getElementById('waste_item_quantity').value = data.quantity;
                    document.getElementById('waste_item_unit').value = data.unit;
                    document.getElementById('waste_item_description').value = data.description || '';

                    new bootstrap.Modal(document.getElementById('modalWasteItem')).show();
                } catch (err) {
                    showToast('Unable to fetch item', false);
                }
            }

            async function submitItemForm(e) {
                e.preventDefault();
                const form = e.target;
                if (!form.checkValidity()) return;

                const formData = new FormData(form);
                const id = formData.get('waste_id');
                const isUpdate = !!id;
                const url = isUpdate ? `/admin/update-waste-item/${id}` : "{{ route('admin.store-waste-item') }}";
                const method = isUpdate ? 'POST' : 'POST'; // change to PUT if your backend requires it

                try {
                    const res = await fetch(url, {
                        method,
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                        body: formData
                    });
                    const data = await res.json();
                    if (res.ok && data.success) {
                        showToast(data.message || (isUpdate ? 'Updated' : 'Saved'));
                        itemsTable.ajax.reload();
                        new bootstrap.Modal(document.getElementById('modalWasteItem')).hide();
                    } else {
                        showToast(data.message || 'Save failed', false);
                    }
                } catch (err) {
                    showToast('Error saving item', false);
                }
            }

            function confirmDeleteItem(id, name) {
                Swal.fire({
                    title: `Delete "${name}"?`,
                    text: 'This cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel'
                }).then(async (res) => {
                    if (!res.isConfirmed) return;
                    try {
                        const resp = await fetch(`/admin/delete-waste-item/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                        });
                        const d = await resp.json();
                        if (resp.ok && d.success) {
                            showToast(d.message || 'Deleted');
                            itemsTable.ajax.reload();
                        } else showToast(d.message || 'Delete failed', false);
                    } catch {
                        showToast('Error deleting', false);
                    }
                });
            }

            /* ---------- Categories CRUD ---------- */
            function openAddCategory() {
                document.getElementById('modalCategoryTitle').innerText = 'Add Category';
                document.getElementById('formCategory').reset();
                document.getElementById('category_id').value = '';
                new bootstrap.Modal(document.getElementById('modalCategory')).show();
            }

            async function openEditCategory(id) {
                try {
                    const res = await fetch(`/admin/edit-waste-category/${id}`);
                    const { success, data } = await res.json();
                    if (!success) return showToast('Failed to load category', false);

                    document.getElementById('modalCategoryTitle').innerText = 'Edit Category';
                    document.getElementById('category_id').value = data.id;
                    document.getElementById('category_name').value = data.name;
                    document.getElementById('category_description').value = data.description || '';

                    new bootstrap.Modal(document.getElementById('modalCategory')).show();
                } catch {
                    showToast('Unable to fetch category', false);
                }
            }

            async function submitCategoryForm(e) {
                e.preventDefault();
                const form = e.target;
                if (!form.checkValidity()) return;

                const formData = new FormData(form);
                const id = formData.get('category_id');
                const isUpdate = !!id;
                const url = isUpdate ? `/admin/update-waste-category/${id}` : "{{ route('admin.store-waste-category') }}";

                try {
                    const res = await fetch(url, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                        body: formData
                    });
                    const data = await res.json();
                    if (res.ok && data.success) {
                        showToast(data.message || (isUpdate ? 'Category updated' : 'Category created'));
                        categoriesTable.ajax.reload();
                        itemsTable.ajax.reload(); // in case category name changes
                        new bootstrap.Modal(document.getElementById('modalCategory')).hide();
                    } else {
                        showToast(data.message || 'Save failed', false);
                    }
                } catch {
                    showToast('Error saving category', false);
                }
            }

            function confirmDeleteCategory(id, name) {
                Swal.fire({
                    title: `Delete category "${name}"?`,
                    text: 'All linked subcategories/items might be affected.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel'
                }).then(async (res) => {
                    if (!res.isConfirmed) return;
                    try {
                        const resp = await fetch(`/admin/delete-waste-category/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                        });
                        const d = await resp.json();
                        if (resp.ok && d.success) {
                            showToast(d.message || 'Deleted');
                            categoriesTable.ajax.reload();
                            itemsTable.ajax.reload();
                        } else showToast(d.message || 'Delete failed', false);
                    } catch {
                        showToast('Error deleting', false);
                    }
                });
            }
        </script>
    @endsection
</x-layouts.admin-app>
