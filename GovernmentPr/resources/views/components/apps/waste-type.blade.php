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
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);">
                <div class="d-flex align-items-center gap-2">
                    <h2 class="card-title mb-0">
                        <i class="bi bi-recycle me-2"></i>
                        Waste Type Management
                    </h2>
                </div>
                <button type="button"
                    class="btn d-flex align-items-center gap-1 shadow-lg"
                    data-bs-toggle="modal"
                    data-bs-target="#wasteTypeModal"
                    aria-label="Set Up Waste Type"
                    title="Add a new waste type"
                    style="
                        background: linear-gradient(90deg, #00c6ff 0%, #0072ff 100%);
                        color: #fff;
                        box-shadow: 0 4px 18px 0 rgba(0,114,255,0.18);
                        transition: transform 0.15s, box-shadow 0.15s;
                    "
                    onmouseover="this.style.transform='scale(1.04)';this.style.boxShadow='0 6px 24px 0 rgba(0,114,255,0.25)';"
                    onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 18px 0 rgba(0,114,255,0.18)';"
                >
                    <span style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background: linear-gradient(135deg, #fff 0%, #e0f7fa 100%);
                        border-radius: 50%;
                        width: 1.5rem;
                        height: 1.5rem;
                        margin-right: 0.5rem;
                        box-shadow: 0 2px 8px 0 rgba(0,198,255,0.10);
                    ">
                        <i class="bi bi-plus-circle fs-2" style="color: #0072ff;"></i>
                    </span>
                    Set Up Waste Type
                </button>
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle rounded-3 overflow-hidden shadow-sm mb-0" style="background: #fff;">
                        <thead class="table-primary text-white" style="background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);">
                            <tr style="font-size: 1.05rem;">
                                <th class="fw-semibold py-3 px-4">Waste Type</th>
                                <th class="fw-semibold py-3 px-4">Description</th>
                                <th class="fw-semibold py-3 px-4">Date Created</th>
                                <th class="fw-semibold py-3 px-4 text-center">Actions</th>
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
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-success text-white rounded-top-4">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="wasteTypeModalLabel">
                        <i class="bi bi-plus-circle"></i>
                        Set Up Waste Type
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="waste-type-form" action="{{ route('admin.store-waste-type') }}" class="needs-validation" novalidate autocomplete="off">
                    <div class="modal-body bg-light rounded-bottom-4">
                        <div class="row g-4">
                            <!-- Waste Category -->
                            <div class="col-md-6">
                                <label for="waste_category" class="form-label fw-semibold">Waste Category <span class="text-danger">*</span></label>
                                <select class="form-select shadow-sm border-primary" id="waste_category" name="waste_category" required>
                                    <option value="">Select category</option>
                                    @foreach($wasteCategories as $category)
                                        <option value="{{ $category->waste_category_id }}"
                                            {{ old('waste_category_id', $selectedCategoryId ?? '') == $category->waste_category_id ? 'selected' : '' }}>
                                            {{ $category->waste_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a waste category.</div>
                            </div>
                            <!-- Waste Sub Category -->
                            <div class="col-md-6">
                                <label for="waste_sub_category_id" class="form-label fw-semibold">Waste Sub Category <span class="text-danger">*</span></label>
                                <select class="form-select shadow-sm border-primary" id="waste_sub_category_id" name="waste_sub_category" required>
                                    <!-- Options populated dynamically -->
                                </select>
                                <div class="invalid-feedback">Please select a sub category.</div>
                            </div>
                            <!-- Waste Title -->
                            <div class="col-md-8">
                                <label for="WasteTitle" class="form-label fw-semibold">Waste Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm border-primary" id="WasteTitle" name="waste_title" placeholder="Enter waste title" required>
                                <div class="invalid-feedback">Waste title is required.</div>
                            </div>
                            <!-- Waste Source -->
                            <div class="col-md-4">
                                <label for="WasteSource" class="form-label fw-semibold">Waste Source</label>
                                <select class="form-select shadow-sm border-primary" id="WasteSource" name="waste_source">
                                    <option value="">Select waste source</option>
                                    @foreach($wasteSources as $source)
                                        <option value="{{ $source->waste_source_id }}">{{ $source->waste_source_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Quantity -->
                            <div class="col-md-4">
                                <label for="Quantity" class="form-label fw-semibold">Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control shadow-sm border-primary" id="Quantity" name="quantity" placeholder="Enter quantity" min="0" required>
                                <div class="invalid-feedback">Please enter a valid quantity.</div>
                            </div>
                            <!-- Unit -->
                            <div class="col-md-2">
                                <label for="Unit" class="form-label fw-semibold">Unit <span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm border-primary" id="Unit" name="unit" placeholder="e.g. kg, tons" required>
                                <div class="invalid-feedback">Unit is required.</div>
                            </div>
                            <!-- Date Generated -->
                            <div class="col-md-3">
                                <label for="DateGenerated" class="form-label fw-semibold">Date Generated <span class="text-danger">*</span></label>
                                <input type="date" class="form-control shadow-sm border-primary" id="DateGenerated" name="date_generated" required>
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>
                            <!-- Disposal Date -->
                            <div class="col-md-3">
                                <label for="DisposalDate" class="form-label fw-semibold">Disposal Date</label>
                                <input type="date" class="form-control shadow-sm border-primary" id="DisposalDate" name="disposal_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0 rounded-bottom-4 d-flex justify-content-end">
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
