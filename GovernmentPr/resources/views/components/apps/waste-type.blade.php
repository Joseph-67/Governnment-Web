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

    @endsection
    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h3 class="card-title mb-0 fw-bold">
                        <i class="bi bi-recycle me-2"></i>
                        Waste Type Management
                    </h3>
                </div>
                <button type="button" class="btn btn-success rounded-pill px-4 d-flex align-items-center shadow"
                    data-bs-toggle="modal" data-bs-target="#wasteTypeModal" aria-label="Set Up Waste Type"
                    title="Add a new waste type">
                    <i class="bi bi-plus-circle me-2 fs-5"></i>
                    Set Up Waste Type
                </button>
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle rounded-3 overflow-hidden shadow-sm mb-0">
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

    @section('modals')
    <!-- Modal for Adding Waste Type -->
    <div class="modal fade" id="wasteTypeModal" tabindex="-1" aria-labelledby="wasteTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="wasteTypeModalLabel">
                <i class="bi bi-plus-circle"></i>
                Set Up Waste Type
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="waste-type-form" action = "{{ route('admin.store-waste-type') }}" class="needs-validation" novalidate>
                <div class="modal-body bg-light">
                <div class="row g-3">
                    <!-- Waste Category -->
                    <div class="col-md-6">
                    <label for="waste_category" class="form-label">Waste Category</label>
                    <select class="form-select shadow-sm" id="waste_category" name="waste_category" required>
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
                    <div class="col-md-6">
                    <label for="waste_sub_category_id" class="form-label">Waste Sub Category</label>
                    <select class="form-select shadow-sm" id="waste_sub_category_id" name="waste_sub_category" required>
                        <!-- Options populated dynamically -->
                    </select>
                    </div>
                    <!-- Waste Title -->
                    <div class="col-md-8">
                    <label for="WasteTitle" class="form-label">Waste Title</label>
                    <input type="text" class="form-control shadow-sm" id="WasteTitle" name="waste_title" placeholder="Enter waste title" required>
                    </div>
                    <!-- Waste Source -->
                    <div class="col-md-4">
                    <label for="WasteSource" class="form-label">Waste Source</label>
                    <select class="form-select shadow-sm" id="WasteSource" name="waste_source">
                        <option value="">Select waste source</option>
                        @foreach($wasteSources as $source)
                        <option value="{{ $source->waste_source_id }}">{{ $source->waste_source_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <!-- Quantity -->
                    <div class="col-md-4">
                    <label for="Quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control shadow-sm" id="Quantity" name="quantity" placeholder="Enter quantity" min="0" required>
                    </div>
                    <!-- Unit -->
                    <div class="col-md-2">
                    <label for="Unit" class="form-label">Unit</label>
                    <input type="text" class="form-control shadow-sm" id="Unit" name="unit" placeholder="e.g. kg, tons" required>
                    </div>
                    <!-- Date Generated -->
                    <div class="col-md-3">
                    <label for="DateGenerated" class="form-label fw-semibold text-primary">Date Generated</label>
                    <input type="date" class="form-control shadow-sm" id="DateGenerated" name="date_generated" required>
                    </div>
                    <!-- Disposal Date -->
                    <div class="col-md-3">
                    <label for="DisposalDate" class="form-label">Disposal Date</label>
                    <input type="date" class="form-control shadow-sm" id="DisposalDate" name="disposal_date">
                    </div>
                </div>
                </div>
                <div class="modal-footer bg-light border-0 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4 fw-semibold shadow-sm">
                        <i class="bi bi-save me-2"></i>Save Waste Type
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End of Modal -->
    @endsection

    @section('scripts')
    <!-- JS Script -->
     <script>
        async function submitWasteTypeForm(event) {
            event.preventDefault();
            console.log('Form submitted:', event.target);
            const formData = new FormData(event.target);
            const formUrl = event.target.action || null;
            if (!formUrl) {
                Toastify({
                    text: "Form action URL is not set.",
                    backgroundColor: "#dc3545",
                    duration: 4000
                }).showToast();
                return;
            }
            // Validate form data
            try {
                const response = await fetch(formUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    // Assuming the response contains a success message or data
                    console.log("Record added successfully:", result);
                    // Show success message
                    console.log("Form submitted successfully");
                    if (result.success) {
                        Toastify({
                            text: result.message || "Record added successfully!",
                            backgroundColor: "#28a745",
                            duration: 3000
                        }).showToast();
                        form.reset();
                    } else {
                        Toastify({
                            text: result.message || "Record added successfully!",
                            backgroundColor: "#28a745",
                            duration: 3000
                        }).showToast();
                    }

                    // Optionally, close modal and refresh table here
                    // $('#wasteTypeModal').modal('hide');
                    // You may want to reload the table data here
                } else {
                    let errorMsg = "Failed to add waste type.";
                    if (result.errors) {
                        errorMsg = Object.values(result.errors).flat().join('\n');
                    }
                    Toastify({
                        text: errorMsg,
                        backgroundColor: "#dc3545",
                        duration: 4000
                    }).showToast();
                }
            } catch (error) {
                Toastify({
                    text: "An error occurred. Please try again.",
                    backgroundColor: "#dc3545",
                    duration: 4000
                }).showToast();
            }
            
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('waste-type-form').addEventListener('submit', submitWasteTypeForm);
        });
     </script>
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
