<x-layouts.admin-app>
    @section('PageTitle', 'Waste Management')

    @section('styles')
        <!-- Icons, DataTables and Toastify -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="{{ asset('adminAssets/css/toastify.css') }}">

        <style>
            :root {
                --primary: #0072ff;
                --accent: #00c6ff;
                --muted: #6c757d;
                --card-radius: 14px;
            }


            .wm-hero {
                background: linear-gradient(90deg, var(--accent), var(--primary));
                color: #fff;
                border-radius: var(--card-radius);
                padding: 1.6rem;
                position: relative;
                overflow: hidden;
                margin-bottom: 1.5rem;
            }

            .wm-hero .illustration {
                position: absolute;
                right: 1rem;
                /* top: 0;
                bottom: 0; */
                width: 320px;
                background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&s=2b3f5b6e5a1bbd9ad3f2db9e1e0f1c77') center/cover no-repeat;
                opacity: 0.18;
            }

            .card-wm {
                border: none;
                border-radius: var(--card-radius);
                box-shadow: 0 10px 30px rgba(12, 32, 85, 0.06);
                overflow: hidden;
            }
            .nav-wm .nav-link { border-radius: 10px; padding: .5rem .9rem; color: var(--primary); }
            .nav-wm .nav-link.active { background: linear-gradient(90deg,var(--accent),var(--primary)); color: #fff; box-shadow: 0 8px 18px rgba(0,114,255,0.12); }

            .empty-state { text-align:center; padding: 2rem; color: var(--muted); }
            .empty-state img { max-width: 220px; opacity: .96; }

            .fab { position: fixed; right: 20px; bottom: 20px; z-index: 2000; width:56px; height:56px; border-radius:50%; display:flex; align-items:center; justify-content:center; background: linear-gradient(90deg,var(--accent),var(--primary)); color:#fff; box-shadow:0 10px 30px rgba(0,114,255,0.18); border:none; }

            .btn-gradient { background: linear-gradient(90deg,var(--accent),var(--primary)); color: #fff; border: none; }
            .btn-outline-muted { border: 1px solid #e6eef8; color: var(--muted); background: transparent; }

            /* responsive */
            @media (max-width: 768px) {
                .wm-hero .illustration { display: none; }
                #globalSearch { display: none; }
            }

            /* DataTable hover */
            table.dataTable tbody tr:hover { background: rgba(0,114,255,0.03); }

            /* Modal */
            .modal-content { border-radius: 12px; overflow: hidden; }
        </style>
    @endsection

    {{-- PAGE CONTENT --}}
    <div class="container py-4">
        <div class="wm-hero d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div>
                <h2 class="mb-1 fw-bold"><i class="bi bi-recycle me-2"></i> Waste Management</h2>
                <p class="mb-0 opacity-85">Manage categories and waste items in one place — track quantities, assign categories, and keep your records tidy.</p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="form-check form-switch me-2">
                    <input class="form-check-input" type="checkbox" id="darkModeToggle" aria-label="Toggle dark mode">
                    <label class="form-check-label text-white ms-2" for="darkModeToggle">Dark</label>
                </div>

                <button class="btn btn-light btn-sm" id="helpBtn"><i class="bi bi-question-circle me-1"></i> Help</button>
            </div>

            <div class="illustration" aria-hidden="true"></div>
        </div>

        <div class="card card-wm p-3">
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                <ul class="nav nav-pills nav-wm" id="wasteMgmtTabs" role="tablist">
                    <!-- Waste Items -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="waste-items-tab" data-bs-toggle="pill" data-bs-target="#waste-items" type="button" role="tab" aria-controls="waste-items" aria-selected="true">
                            <i class="la la-box me-1"></i> Waste Items
                        </button>
                    </li>

                    <!-- Disposal Methods -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disposal-methods-tab" data-bs-toggle="pill" data-bs-target="#disposal-methods" type="button" role="tab" aria-controls="disposal-methods" aria-selected="false">
                            <i class="la la-recycle me-1"></i> Disposal Methods
                        </button>
                    </li>

                    <!-- Waste Categories -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="waste-categories-tab" data-bs-toggle="pill" data-bs-target="#waste-categories" type="button" role="tab" aria-controls="waste-categories" aria-selected="false">
                            <i class="la la-list-ul me-1"></i> Waste Categories
                        </button>
                    </li>

                    <!-- Waste Subcategories -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="waste-subcategories-tab" data-bs-toggle="pill" data-bs-target="#waste-subcategories" type="button" role="tab" aria-controls="waste-subcategories" aria-selected="false">
                            <i class="la la-tags me-1"></i> Waste Subcategories
                        </button>
                    </li>
                </ul>

                <!-- Search and Add -->
                <div class="d-flex align-items-center gap-2">
                    <div class="d-none d-md-block">
                        <input class="form-control form-control-sm" id="globalSearch" placeholder="Search items or categories..." aria-label="Search">
                    </div>
                    <button class="btn btn-gradient btn-sm" id="openAddBtn">
                        <i class="la la-plus me-1"></i> Add
                    </button>
                </div>
            </div>

            <!-- TAB CONTENT -->
            <div class="tab-content" id="wmTabContent">
                {{-- WASTE ITEMS TAB --}}
                <div class="tab-pane fade show active" id="waste-items" role="tabpanel" aria-labelledby="waste-items-tab">
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
                            <img src="{{ asset('adminAssets/images/illustrate/addItem.svg') }}" alt="No waste items">
                            <h5 class="mt-3">No waste items yet</h5>
                            <p>Create waste items to start tracking materials and quantities.</p>
                            <button class="btn btn-gradient" id="addItemEmpty">Add Waste Item</button>
                        </div>
                    </div>
                </div>

                {{-- DISPOSAL METHODS TAB --}}
                <div class="tab-pane fade" id="disposal-methods" role="tabpanel" aria-labelledby="disposal-methods-tab">
                    <div class="table-responsive">
                        <table id="tbl-disposal-methods" class="table table-hover align-middle w-100">
                            <thead>
                                <tr>
                                    <th>Method Name</th>
                                    <th>Description</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="empty-state d-none" id="emptyDisposals">
                            <img src="{{ asset('adminAssets/images/illustrate/disposal.svg') }}" alt="No disposal methods">
                            <h5 class="mt-3">No disposal methods defined</h5>
                            <p>Add disposal methods to manage waste handling properly.</p>
                            <button class="btn btn-gradient" id="addDisposalEmpty">Add Method</button>
                        </div>
                    </div>
                </div>

                {{-- CATEGORIES TAB --}}
                <div class="tab-pane fade" id="waste-categories" role="tabpanel" aria-labelledby="waste-categories-tab">
                    <div class="table-responsive">
                        <table id="tbl-waste-categories" class="table table-hover align-middle w-100">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th class="text-center">Subcategories</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="empty-state d-none" id="emptyCategories">
                            <img src="{{ asset('adminAssets/images/illustrate/addFolder.svg') }}" alt="No categories">
                            <h5 class="mt-3">No categories found</h5>
                            <p>Add categories to organize waste items more effectively.</p>
                            <button class="btn btn-gradient" id="addCategoryEmpty">Add Category</button>
                        </div>
                    </div>
                </div>

                {{-- SUBCATEGORIES TAB --}}
                <div class="tab-pane fade" id="waste-subcategories" role="tabpanel" aria-labelledby="waste-subcategories-tab">
                    <div class="table-responsive">
                        <table id="tbl-waste-subcategories" class="table table-hover align-middle w-100">
                            <thead>
                                <tr>
                                    <th>Subcategory</th>
                                    <th>Parent Category</th>
                                    <th>Description</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                        <div class="empty-state d-none" id="emptySubcategories">
                            <img src="{{ asset('adminAssets/images/illustrate/addFolder.svg') }}" alt="No subcategories">
                            <h5 class="mt-3">No subcategories available</h5>
                            <p>Add subcategories to further organize your waste types.</p>
                            <button class="btn btn-gradient" id="addSubcategoryEmpty">Add Subcategory</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="mt-4 text-center text-muted">♻️ Built for sustainable operations · Waste Management System • {{ date('Y') }}</footer>
    </div>

    {{-- MODALS --}}
    @section('modals')
<!-- Waste Item Modal -->
<div class="modal fade" id="modalWasteItem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWasteItemTitle">
                    <i class="la la-box me-2"></i>
                    <span>Add Waste Item</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formWasteItem" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="waste_item_id" id="waste_item_id">

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
                                @foreach($wasteCategories as $category)
                                    <option value="{{ $category->waste_category_id }}">{{ $category->waste_category_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Choose a category.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Quantity per Unit <span class="text-danger">*</span></label>
                            <input type="number" min="0" step="any" name="quantity_per_unit" id="waste_item_quantity" class="form-control" required>
                            <div class="invalid-feedback">Enter quantity.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Unit <span class="text-danger">*</span></label>
                            <input type="text" name="unit" id="waste_item_unit" class="form-control" placeholder="e.g. kg" required>
                            <div class="invalid-feedback">Unit required.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Subcategory</label>
                            <select name="waste_subcategory_id" id="waste_item_subcategory" class="form-select">
                                <option value="">-- optional --</option>
                                @foreach($wasteSubCategories as $subcategory)
                                    <option value="{{ $subcategory->waste_sub_category_id }}">{{ $subcategory->waste_sub_category_name }}</option>
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
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="la la-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-gradient" id="btnSaveWasteItem">
                        <i class="la la-save me-1"></i> Save Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="modalWasteCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWasteCategoryTitle">
                    <i class="la la-list-ul me-2"></i>
                    <span>Add Waste Category</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formWasteCategory" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="waste_category_id" id="waste_category_id">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="waste_category_name" id="waste_category_name" class="form-control" required>
                        <div class="invalid-feedback">Category name required.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="waste_category_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="la la-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-gradient" id="btnSaveWasteCategory">
                        <i class="la la-save me-1"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Waste Subcategory Modal -->
<div class="modal fade" id="modalWasteSubcategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWasteSubcategoryTitle">
                    <i class="la la-tags me-2"></i>
                    <span>Add Waste Subcategory</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formWasteSubcategory" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="waste_subcategory_id" id="waste_subcategory_id">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Parent Category <span class="text-danger">*</span></label>
                        <select name="waste_category_id" id="subcategory_category_id" class="form-select" required>
                            <option value="" disabled selected>Select parent category</option>
                            @foreach($wasteCategories as $category)
                                <option value="{{ $category->waste_category_id }}">{{ $category->waste_category_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Select a parent category.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subcategory Name <span class="text-danger">*</span></label>
                        <input type="text" name="waste_subcategory_name" id="waste_subcategory_name" class="form-control" required>
                        <div class="invalid-feedback">Subcategory name required.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="waste_subcategory_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="la la-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-gradient" id="btnSaveWasteSubcategory">
                        <i class="la la-save me-1"></i> Save Subcategory
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Waste Disposal Method Modal -->
<div class="modal fade" id="modalWasteDisposal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWasteDisposalTitle">
                    <i class="la la-recycle me-2"></i>
                    <span>Add Disposal Method</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formWasteDisposal" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="waste_disposal_id" id="waste_disposal_id">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Method Name <span class="text-danger">*</span></label>
                        <input type="text" name="method_name" id="waste_disposal_name" class="form-control" required>
                        <div class="invalid-feedback">Disposal method name required.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Applicable Category</label>
                        <select name="waste_category_id" id="waste_disposal_category" class="form-select">
                            <option value="">-- optional --</option>
                            @foreach($wasteCategories as $category)
                                <option value="{{ $category->waste_category_id }}">{{ $category->waste_category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="waste_disposal_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="la la-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-gradient" id="btnSaveWasteDisposal">
                        <i class="la la-save me-1"></i> Save Method
                    </button>
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
let itemsTable, categoriesTable, subcategoriesTable, methodsTable;

/* -------------------- INIT -------------------- */
document.addEventListener('DOMContentLoaded', () => {
    initDarkMode();
    initTables();
    initGlobalSearch();
    initButtons();
    initForms();
    initHelp();
});

/* -------------------- DARK MODE -------------------- */
function initDarkMode() {
    const toggle = document.getElementById('darkModeToggle');
    const saved = localStorage.getItem('wm_dark') === '1';
    if (saved) document.documentElement.classList.add('dark-mode');
    if (toggle) toggle.checked = saved;
    toggle?.addEventListener('change', e => {
        document.documentElement.classList.toggle('dark-mode', e.target.checked);
        e.target.checked ? localStorage.setItem('wm_dark', '1') : localStorage.removeItem('wm_dark');
    });
}

/* -------------------- DATATABLES -------------------- */
function initTables() {
    // Waste Items
    itemsTable = $('#tbl-waste-items').DataTable({
        ajax: { url: "{{ route('admin.get-waste-items') }}", dataSrc: 'data' },
        columns: [
            { data: 'name' },
            { data: 'category_name' },
            { data: 'subcategory_name' },
            { data: 'quantity' },
            { data: 'unit' },
            {
                data: 'id', orderable: false, className: 'text-end',
                render: (id, type, row) => actionButtons(id, row.name, 'item')
            }
        ],
        responsive: true,
        initComplete: (s, json) => toggleEmptyState('#emptyItems', json.data?.length > 0)
    });

    // Waste Categories
    categoriesTable = $('#tbl-waste-categories').DataTable({
        ajax: { url: "{{ route('admin.get-waste-categories') }}", dataSrc: 'data' },
        columns: [
            { data: 'name' },
            { data: 'description' },
            { data: 'sub_count', className: 'text-center' },
            {
                data: 'id', orderable: false, className: 'text-end',
                render: (id, type, row) => actionButtons(id, row.name, 'category')
            }
        ],
        responsive: true,
        initComplete: (s, json) => toggleEmptyState('#emptyCategories', json.data?.length > 0)
    });

    // Waste Subcategories
    subcategoriesTable = $('#tbl-waste-subcategories').DataTable({
        ajax: { url: "{{ route('admin.get-waste-subcategories') }}", dataSrc: 'data' },
        columns: [
            { data: 'name' },
            { data: 'category_name' },
            { data: 'description' },
            {
                data: 'id', orderable: false, className: 'text-end',
                render: (id, type, row) => actionButtons(id, row.name, 'subcategory')
            }
        ],
        responsive: true,
        initComplete: (s, json) => toggleEmptyState('#emptySubcategories', json.data?.length > 0)
    });

    // Disposal Methods
    methodsTable = $('#tbl-disposal-methods').DataTable({
        ajax: { url: "{{ route('admin.get-disposal-methods') }}", dataSrc: 'data' },
        columns: [
            { data: 'method_name' },
            { data: 'description' },
            { data: 'safety_level' },
            {
                data: 'id', orderable: false, className: 'text-end',
                render: (id, type, row) => actionButtons(id, row.method_name, 'method')
            }
        ],
        responsive: true,
        initComplete: (s, json) => toggleEmptyState('#emptyMethods', json.data?.length > 0)
    });
}

/* -------------------- GLOBAL SEARCH -------------------- */
function initGlobalSearch() {
    $('#globalSearch').on('input', function () {
        const q = this.value;
        itemsTable.search(q).draw();
        categoriesTable.search(q).draw();
        subcategoriesTable.search(q).draw();
        methodsTable.search(q).draw();
    });
}

/* -------------------- ADD BUTTON HANDLER -------------------- */
function initButtons() {
    const addBtn = document.getElementById('openAddBtn');
    addBtn?.addEventListener('click', () => {
        const activeTab = document.querySelector('.nav-wm .nav-link.active')?.id;
        switch (activeTab) {
            case 'waste-categories-tab': return openAddCategory();
            case 'waste-subcategories-tab': return openAddSubcategory();
            case 'disposal-methods-tab': return openAddMethod();
            default: return openAddItem();
        }
    });

    // Floating action button for mobile
    const fab = document.createElement('button');
    fab.className = 'fab d-md-none';
    fab.innerHTML = '<i class="la la-plus"></i>';
    fab.onclick = () => addBtn?.click();
    document.body.appendChild(fab);
}

/* -------------------- FORM SETUP -------------------- */
function initForms() {
    document.getElementById('formWasteItem')?.addEventListener('submit', submitItemForm);
    document.getElementById('formCategory')?.addEventListener('submit', submitCategoryForm);
    document.getElementById('formSubcategory')?.addEventListener('submit', submitSubcategoryForm);
    document.getElementById('formMethod')?.addEventListener('submit', submitMethodForm);

    Array.from(document.querySelectorAll('.needs-validation')).forEach(f => {
        f.addEventListener('submit', e => {
            if (!f.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            f.classList.add('was-validated');
        });
    });
}

/* -------------------- HELP MODAL -------------------- */
function initHelp() {
    document.getElementById('helpBtn')?.addEventListener('click', () => {
        Swal.fire({
            title: 'Waste Management Help',
            html: `
                <p class="text-start">
                    <strong>Waste Items</strong> → individual tracked items<br>
                    <strong>Categories</strong> → broad groups like Organic, Plastic<br>
                    <strong>Subcategories</strong> → finer divisions (e.g. PET, LDPE)<br>
                    <strong>Disposal Methods</strong> → define safe disposal or recycling methods
                </p>
                <ul class="text-start">
                    <li>Use the Add button to create new records.</li>
                    <li>Edit or delete using the Actions column.</li>
                    <li>Use the global search bar to find anything quickly.</li>
                </ul>`,
            icon: 'info', width: 600
        });
    });
}

/* -------------------- HELPERS -------------------- */
function toggleEmptyState(selector, hasData) {
    const el = document.querySelector(selector);
    if (el) el.classList.toggle('d-none', hasData);
}

function showToast(msg, success = true) {
    Toastify({
        text: msg, duration: 3000,
        backgroundColor: success ? "#198754" : "#dc3545"
    }).showToast();
}

function escapeHtml(t) {
    return t ? t.replace(/[&<>"']/g, m => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[m])) : '';
}

function actionButtons(id, name, type) {
    const safe = escapeHtml(name);
    return `
        <div class="d-inline-flex gap-1">
            <button class="btn btn-sm btn-outline-primary" onclick="openEdit('${type}', ${id})" aria-label="Edit ${safe}">
                <i class="la la-edit"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="confirmDelete('${type}', ${id}, '${safe}')" aria-label="Delete ${safe}">
                <i class="la la-trash"></i>
            </button>
        </div>`;
}

/* -------------------- GENERIC CRUD HANDLERS -------------------- */
async function openEdit(type, id) {
    const modalMap = {
        item: '#modalWasteItem',
        category: '#modalCategory',
        subcategory: '#modalSubcategory',
        method: '#modalMethod'
    };
    const urlMap = {
        item: `/admin/edit-waste-item/${id}`,
        category: `/admin/edit-waste-category/${id}`,
        subcategory: `/admin/edit-waste-subcategory/${id}`,
        method: `/admin/edit-disposal-method/${id}`
    };

    try {
        const res = await fetch(urlMap[type]);
        const { success, data } = await res.json();
        if (!success) return showToast(`Failed to load ${type}`, false);

        switch (type) {
            case 'item':
                fillItemModal(data, true); break;
            case 'category':
                fillCategoryModal(data, true); break;
            case 'subcategory':
                fillSubcategoryModal(data, true); break;
            case 'method':
                fillMethodModal(data, true); break;
        }

        new bootstrap.Modal(document.querySelector(modalMap[type])).show();
    } catch {
        showToast(`Error loading ${type}`, false);
    }
}

function confirmDelete(type, id, name) {
    Swal.fire({
        title: `Delete ${type} "${name}"?`,
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete'
    }).then(async r => {
        if (!r.isConfirmed) return;
        const urlMap = {
            item: `/admin/delete-waste-item/${id}`,
            category: `/admin/delete-waste-category/${id}`,
            subcategory: `/admin/delete-waste-subcategory/${id}`,
            method: `/admin/delete-disposal-method/${id}`
        };
        try {
            const res = await fetch(urlMap[type], {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message || 'Deleted');
                reloadTables();
            } else showToast(data.message || 'Delete failed', false);
        } catch {
            showToast('Error deleting', false);
        }
    });
}

function reloadTables() {
    itemsTable?.ajax.reload();
    categoriesTable?.ajax.reload();
    subcategoriesTable?.ajax.reload();
    methodsTable?.ajax.reload();
}

/* -------------------- MODAL POPULATION -------------------- */
function fillItemModal(d, isEdit) {
    document.getElementById('modalWasteItemTitle').innerText = isEdit ? 'Edit Waste Item' : 'Add Waste Item';
    document.getElementById('waste_item_id').value = d.id || '';
    document.getElementById('waste_item_name').value = d.name || '';
    document.getElementById('waste_item_category').value = d.category_id || '';
    document.getElementById('waste_item_subcategory').value = d.sub_category_id || '';
    document.getElementById('waste_item_quantity').value = d.quantity || '';
    document.getElementById('waste_item_unit').value = d.unit || '';
    document.getElementById('waste_item_description').value = d.description || '';
    document.getElementById('submitWasteItemBtn').innerHTML = `<i class="la la-save me-1"></i> ${isEdit ? 'Update Item' : 'Save Item'}`;
}

function fillCategoryModal(d, isEdit) {
    document.getElementById('modalCategoryTitle').innerText = isEdit ? 'Edit Category' : 'Add Category';
    document.getElementById('category_id').value = d.id || '';
    document.getElementById('category_name').value = d.name || '';
    document.getElementById('category_description').value = d.description || '';
}

function fillSubcategoryModal(d, isEdit) {
    document.getElementById('modalSubcategoryTitle').innerText = isEdit ? 'Edit Subcategory' : 'Add Subcategory';
    document.getElementById('subcategory_id').value = d.id || '';
    document.getElementById('subcategory_name').value = d.name || '';
    document.getElementById('subcategory_category').value = d.category_id || '';
    document.getElementById('subcategory_description').value = d.description || '';
}

function fillMethodModal(d, isEdit) {
    document.getElementById('modalMethodTitle').innerText = isEdit ? 'Edit Disposal Method' : 'Add Disposal Method';
    document.getElementById('method_id').value = d.id || '';
    document.getElementById('method_name').value = d.method_name || '';
    document.getElementById('method_description').value = d.description || '';
    document.getElementById('method_safety_level').value = d.safety_level || '';
}

/* -------------------- OPEN ADD FUNCTIONS -------------------- */
function openAddItem() { fillItemModal({}, false); new bootstrap.Modal('#modalWasteItem').show(); }
function openAddCategory() { fillCategoryModal({}, false); new bootstrap.Modal('#modalCategory').show(); }
function openAddSubcategory() { fillSubcategoryModal({}, false); new bootstrap.Modal('#modalSubcategory').show(); }
function openAddMethod() { fillMethodModal({}, false); new bootstrap.Modal('#modalMethod').show(); }

/* -------------------- FORM SUBMISSIONS -------------------- */
async function submitItemForm(e) { await submitForm(e, 'item'); }
async function submitCategoryForm(e) { await submitForm(e, 'category'); }
async function submitSubcategoryForm(e) { await submitForm(e, 'subcategory'); }
async function submitMethodForm(e) { await submitForm(e, 'method'); }

async function submitForm(e, type) {
    e.preventDefault();
    const form = e.target;
    if (!form.checkValidity()) return;

    const formData = new FormData(form);
    const idField = {
        item: 'waste_item_id', category: 'category_id',
        subcategory: 'subcategory_id', method: 'method_id'
    }[type];
    const id = formData.get(idField);
    const isUpdate = !!id;

    const urlMap = {
        item: isUpdate ? `/admin/update-waste-item/${id}` : "{{ route('admin.store-waste-item') }}",
        category: isUpdate ? `/admin/update-waste-category/${id}` : "{{ route('admin.store-waste-category') }}",
        subcategory: isUpdate ? `/admin/update-waste-subcategory/${id}` : "{{ route('admin.store-waste-subcategory') }}",
        method: isUpdate ? `/admin/update-disposal-method/${id}` : "{{ route('admin.store-disposal-method') }}"
    };

    try {
        const res = await fetch(urlMap[type], {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: formData
        });
        const data = await res.json();
        if (data.success) {
            showToast(data.message || `${type} saved`);
            reloadTables();
            bootstrap.Modal.getInstance(form.closest('.modal')).hide();
        } else showToast(data.message || 'Save failed', false);
    } catch {
        showToast('Error saving data', false);
    }
}
</script>



    @endsection
</x-layouts.admin-app>
