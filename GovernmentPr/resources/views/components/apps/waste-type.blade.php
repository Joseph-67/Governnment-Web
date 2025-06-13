<x-layouts.admin-app>
    @section('PageTitle', 'Waste Type')
    @section('styles')
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/dataTables.bootstrap5.min.css') }}">
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    @endsections
    <div class="container py-5">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-recycle me-2"></i>Waste Type Management
                    </h3>
                    <button class="btn btn-success px-4 py-2 fw-semibold shadow" data-bs-toggle="modal" data-bs-target="#wasteTypeModal">
                        <i class="bi bi-plus-circle me-1"></i> Set Up Waste Type
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle rounded-3 overflow-hidden shadow-sm">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>Waste Type</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Waste Type Modal -->
    <div class="modal fade" id="wasteTypeModal" tabindex="-1" aria-labelledby="wasteTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold" id="wasteTypeModalLabel">
                        <i class="bi bi-plus-circle me-2"></i>Set Up Waste Type
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="waste-type-form" action="" method="POST">
                    @csrf
                    <div class="modal-body bg-light">
                        <div class="row">
                            <!-- Waste Category -->
                            <div class="mb-3 col-6">
                                <label for="waste_category_id" class="form-label fw-semibold text-primary">Waste Category</label>
                                <select class="form-select rounded-pill shadow-sm" id="waste_category" name="waste_category" required>
                                    <option value="">Select category</option>
                                    @foreach($wasteCategories as $category)
                                        <option value="{{ $category->waste_category_id }}"
                                            {{ old('waste_category_id', $selectedCategoryId ?? '') == $category->waste_category_id ? 'selected' : '' }}>
                                            {{ $category->waste_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Waste Sub Category -->
                            <div class="mb-3 col-6">
                                <label for="waste_sub_category_id" class="form-label fw-semibold text-primary">Waste Sub Category</label>
                                <select class="form-select rounded-pill shadow-sm" id="waste_sub_category_id" name="waste_sub_category" required>
                                    <!-- <option value="">Please select a category first...</option> -->
                                </select>
                            </div>
                            <!-- Waste Source -->
                            <div class="mb-3 col-6">
                                <label for="WasteSource" class="form-label fw-semibold text-primary">Waste Source</label>
                                <select class="form-select rounded-pill shadow-sm" id="WasteSource" name="waste_source">
                                    <option value="">Select waste source</option>
                                    @foreach($wasteSources as $source)
                                        <option value="{{ $source->waste_source_id }}">{{ $source->waste_source_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Waste Title -->
                            <div class="mb-3 col-6">
                                <label for="WasteTitle" class="form-label fw-semibold text-primary">Waste Title</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="WasteTitle" name="waste_title" placeholder="Enter waste title" required>
                            </div>
                            <!-- Quantity -->
                            <div class="mb-3 col-6">
                                <label for="Quantity" class="form-label fw-semibold text-primary">Quantity</label>
                                <input type="number" class="form-control rounded-pill shadow-sm" id="Quantity" name="quantity" placeholder="Enter quantity" required>
                            </div>
                            <!-- Unit -->
                            <div class="mb-3 col-6">
                                <label for="Unit" class="form-label fw-semibold text-primary">Unit</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="Unit" name="unit" placeholder="e.g. kg, tons" required>
                            </div>
                            <!-- Date Generated -->
                            <div class="mb-3 col-6">
                                <label for="DateGenerated" class="form-label fw-semibold text-primary">Date Generated</label>
                                <input type="date" class="form-control rounded-pill shadow-sm" id="DateGenerated" name="date_generated" required>
                            </div>
                            <!-- Disposal Date -->
                            <div class="mb-3 col-6">
                                <label for="DisposalDate" class="form-label fw-semibold text-primary">Disposal Date</label>
                                <input type="date" class="form-control rounded-pill shadow-sm" id="DisposalDate" name="disposal_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Save Waste Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <!-- JS Script -->
     <!-- filter sub category -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('waste_category');
            const subCategorySelect = document.getElementById('waste_sub_category_id');
            const allSubCategories = @json($wasteSubCategories);
    
            function updateSubCategories(categoryId) {
                subCategorySelect.innerHTML = '';
                if (!categoryId) {
                    subCategorySelect.innerHTML = '<option value="">Please select a category first</option>';
                    return;
                }
                const matchingSubs = allSubCategories.filter(sub => sub.waste_category_id == categoryId);
                if (matchingSubs.length > 0) {
                    subCategorySelect.innerHTML = '<option value="">Select sub category</option>';
                    matchingSubs.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.waste_sub_category_id;
                        option.textContent = sub.waste_sub_category_name;
                        subCategorySelect.appendChild(option);
                    });
                } else {
                    subCategorySelect.innerHTML = '<option value="">No subcategories available</option>';
                }
            }
    
            categorySelect.addEventListener('change', function () {
                updateSubCategories(this.value);
            });
    
            // Preselect values if editing
            const preselectedCategory = categorySelect.value;
            const preselectedSub = "{{ old('waste_sub_category', $selectedSubCategoryId ?? '') }}";
            if (preselectedCategory) {
                updateSubCategories(preselectedCategory);
                setTimeout(() => {
                    Array.from(subCategorySelect.options).forEach(opt => {
                        if (opt.value === preselectedSub) {
                            opt.selected = true;
                        }
                    });
                }, 50);
            } else {
                subCategorySelect.innerHTML = '<option value="">Please Wait....</option>';
            }
        });
    </script>
    <script>
        
    </script>

    <!-- DataTables CDN -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/toastify.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/js/pages/datatable.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
</x-layouts.admin-app>
