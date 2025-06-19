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
        <table class="table table-hover align-middle shadow-sm" id="tbl-waste-types">
    <thead class="table-primary text-white">
        <tr>
            <th>Waste Name</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Sub Category</th>
        <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
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
                <form id="waste-type-form" action="{{ route('admin.store-waste-item') }}" class="needs-validation" novalidate autocomplete="off">
                    <div class="modal-body bg-light rounded-bottom-4">
                        <div class="row g-4">
                            <!-- Waste Name -->
                            <div class="col-md-6">
                                <label for="WasteName" class="form-label fw-semibold">Waste Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm border-primary" id="waste_name" name="waste_name" placeholder="Enter waste name" required>
                            </div>
                          
                            <!-- Waste Sub Category -->
                            <div class="col-md-6">
                                <label for="waste_sub_category_id" class="form-label fw-semibold">Waste Sub Category <span class="text-danger">*</span></label>
                                <select class="form-select shadow-sm border-primary" id="waste_sub_category_id" name="waste_sub_category" required>
                                    <option selected disabled>Select sub category</option>
                                    @foreach($wasteSubCategories as $subCategory)
                                        <option value="{{ $subCategory->waste_sub_category_id }}">{{ $subCategory->waste_sub_category_name }}</option>
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
                            <div class="col-md-4">
                                <label for="Unit" class="form-label fw-semibold">Unit <span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-sm border-primary" id="Unit" name="unit" placeholder="e.g. kg, tons" required>
                            </div>
                            <!-- Description -->
                            <div class="col-md-4">
                                <label for="Description" class="form-label fw-semibold">Description</label>
                                <textarea class="form-control shadow-sm border-primary" id="Description" name="description" rows="3" placeholder="Enter a brief description"></textarea>

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
    let wasteTypeTable;

    document.addEventListener('DOMContentLoaded', function () {
        wasteTypeTable = $('#tbl-waste-types').DataTable({
            ajax: {
                url: "{{ route('admin.get-waste-items') }}",
                dataSrc: 'data'
            },
            columns: [
                { data: 'name', title: 'Waste Name' },
                { data: 'quantity', title: 'Quantity' },
                { data: 'unit', title: 'Unit' },
                { data: 'sub_category', title: 'Sub Category' },
                {
                    data: 'id',
                    className: 'text-center',
                    render: function (data) {
                        return `
                            <button class="btn btn-sm btn-primary me-1" onclick="editWasteItem(${data})">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteWasteItem(${data})">
                                <i class="bi bi-trash"></i>
                            </button>`;
                    }
                }
            ]
        });

        document.getElementById('waste-type-form').addEventListener('submit', submitWasteTypeForm);
    });

    async function submitWasteTypeForm(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (response.ok && result.success) {
                Toastify({
                    text: result.message || "Added successfully!",
                    backgroundColor: "#28a745",
                    duration: 3000
                }).showToast();

                wasteTypeTable.row.add(result.data).draw(false);
                form.reset();
            } else {
                let errorMsg = result.message || "Failed to add.";
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
                text: "Error occurred. Try again.",
                backgroundColor: "#dc3545",
                duration: 4000
            }).showToast();
        }
    }

    function deleteWasteItem(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            fetch(`/admin/waste-item/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(result => {
                Toastify({
                    text: result.message || "Deleted successfully!",
                    backgroundColor: "#28a745",
                    duration: 3000
                }).showToast();
                wasteTypeTable.ajax.reload(null, false);
            })
            .catch(() => {
                Toastify({
                    text: "Failed to delete.",
                    backgroundColor: "#dc3545",
                    duration: 4000
                }).showToast();
            });
        }
    }

    function editWasteItem(id) {
        alert("Edit feature not yet implemented for ID: " + id);
    }
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
