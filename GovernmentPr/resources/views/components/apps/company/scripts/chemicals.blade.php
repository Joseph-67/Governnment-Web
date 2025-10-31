<script>
    // Open modal dynamically
    function openChemicalModal(operation, data = {}) {
        const modal = document.querySelector('#chemicalModal');
        const title = modal.querySelector('#chemicalModalTitle');
        const body = modal.querySelector('#chemicalModalBody');
        const form = modal.querySelector('#chemicalForm');

        form.reset();
        form.classList.remove('was-validated');
        form.operation.value = operation;

        let html = '';

        if (operation === 'add' || operation === 'edit') {
            title.textContent = operation === 'add' ? 'Add Chemical' : 'Edit Chemical';
            html = `
            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <select name="chemical" class="form-control" required>
                        <option value="" disabled ${!data.chemical ? 'selected' : ''}>Select Chemical</option>
                        @foreach($approved_chemicals as $chemical)
                            <option value="{{ $chemical->chemical_id }}" ${data.chemical == '{{ $chemical->name }}' ? 'selected' : ''}>{{ $chemical->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Please select a chemical.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Quantity/Unit</label>
                    <input name="quantity_per_unit" type="number" step="0.01" class="form-control" required value="${data.quantity || ''}">
                    <div class="invalid-feedback">Please enter a quantity.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Unit</label>
                    <input name="unit_of_measurement" class="form-control" value="${data.unit || ''}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Hazardous?</label>
                    <select name="is_hazardous" class="form-select">
                        <option value="0" ${data.is_hazardous == 0 ? 'selected' : ''}>No</option>
                        <option value="1" ${data.is_hazardous == 1 ? 'selected' : ''}>Yes</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Reorder Level</label>
                    <input name="reorder_level" type="number" step="0.01" class="form-control" value="${data.threshold || ''}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Safety Stock</label>
                    <input name="safety_stock" type="number" step="0.01" class="form-control" value="${data.max_threshold || ''}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Storage Location</label>
                    <input name="storage_location" class="form-control" value="${data.storage_location || ''}">
                </div>
            </div>
            `;
            if (operation === 'edit') form.id.value = data.id || '';
        }

        if (operation === 'checkin' || operation === 'checkout') {
            title.textContent = operation === 'checkin' ? 'Check-In Chemical' : 'Check-Out Chemical';
            html = `
                <div class="mb-3">
                    <label>Chemical Name</label>
                    <input type="text" class="form-control" value="${data.name}" disabled>
                </div>
                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                    <div class="invalid-feedback">Please enter a quantity.</div>
                </div>
                <div class="mb-3">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" required value="${new Date().toISOString().slice(0,10)}">
                    <div class="invalid-feedback">Please select a date.</div>
                </div>
            `;
            form.chemical_id.value = data.id || '';
        }

        body.innerHTML = html;
        new bootstrap.Modal(modal).show();
    }

    // Get data from table row
    function getChemicalData(element) {
        const tr = element.closest('tr');
        return {
            id: tr.dataset.id,
            name: tr.dataset.name,
            type: tr.dataset.type,
            quantity: tr.dataset.quantity,
            unit: tr.dataset.unit,
            is_hazardous: tr.dataset.is_hazardous,
            storage_location: tr.dataset.storage_location,
            sds_url: tr.dataset.sds_url
        };
    }

    // Submit form with AJAX + spinner + validation
    document.querySelector('#chemicalForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;

        form.classList.remove('was-validated');
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            showToast('Please fill all required fields correctly', 'danger');
            return;
        }

        const btn = document.querySelector('#chemicalSubmitBtn');
        const btnText = document.querySelector('#chemicalBtnText');
        const btnLoader = document.querySelector('#chemicalBtnLoader');
        btnText.style.display = 'none';
        btnLoader.style.display = 'inline-block';
        btn.disabled = true;

        const operation = form.operation.value;
        let url = '';
        switch (operation) {
            case 'add':
                url = "{{ route('admin.store-company-chemical') }}"; break;
            case 'edit':
                url = `/save-company-chemical/${form.id.value}`; break;
            case 'checkin':
                url = "{{ route('admin.save-company-chemical-check-in') }}"; break;
            case 'checkout':
                url = "{{ route('admin.save-company-chemical-check-out') }}"; break;
        }

        try {
            const res = await fetch(url, {
                method: 'POST',
                body: new FormData(form),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const data = await res.json();

            if (data.status === 'success') {
                renderChemicalTable(data.company_chemical, form.id.value || form.chemical_id.value);
                showToast(`${operation.charAt(0).toUpperCase() + operation.slice(1)} successful`, 'success');
                bootstrap.Modal.getInstance(document.querySelector('#chemicalModal')).hide();
            } 
            else if (data.status === 'error') {
                // Clear previous validation errors
                form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                form.querySelectorAll('.invalid-feedback.dynamic').forEach(el => el.remove());

                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        console.log(data.errors[field][0]);
                        showToast(data.errors[field][0], 'danger');
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const feedback = document.createElement('div');
                            feedback.className = 'invalid-feedback dynamic';
                            feedback.textContent = data.errors[field][0];
                            input.parentNode.appendChild(feedback);
                        }
                    });

                    showToast(data.message || 'Validation failed. Please check highlighted fields.', 'danger');
                } else {
                    showToast(data.message || 'An unexpected error occurred.', 'danger');
                }
            } 
            else {
                showToast(data.message || 'Operation failed', 'danger');
            }

        } catch (err) {
            console.error(err);
            showToast('A network or server error occurred', 'danger');
        } finally {
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';
            btn.disabled = false;
        }
    });
</script>
<script>
    // datatable
    $(document).ready(function() {
        const table = $('#chemicalTable').DataTable({
            processing: true,
            ajax: {
                url: `{{ route('admin.get-company-chemicals', ['id' => $company->company_id]) }}`,
                dataSrc: 'company_chemicals'
            },
            columns: [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'name' },
                { data: 'type' },
                { data: 'quantity' },
                { data: 'unit' },
                { data: 'reorder_level' },
                { data: 'safety_level' },
                { data: 'hazardous' },
                { data: 'storage_location' },
                { data: 'updated_at' },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: (data, type, row) => `
                        <div class="dropdown text-center">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="la la-cogs"></i> Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item viewChemicalBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-eye text-info"></i> View Details</a></li>
                                <li><a class="dropdown-item chemicalCheckinBtn" data-id="${row.company_chemical_id}" data-name="${row.name}" data-unit="${row.unit}" data-chemical-id="${row.chemical_id}">
                                    <i class="la la-arrow-down text-success"></i> Check-In</a></li>
                                <li><a class="dropdown-item chemicalCheckoutBtn" data-id="${row.company_chemical_id}" data-name="${row.name}" data-unit="${row.unit}" data-chemical-id="${row.chemical_id}">
                                    <i class="la la-arrow-up text-warning"></i> Check-Out</a></li>
                                <li><a class="dropdown-item chemicalAdjustBtn" data-id="${row.company_chemical_id}" data-name="${row.name}" data-unit="${row.unit}" data-chemical-id="${row.chemical_id}">
                                    <i class="la la-sync text-primary"></i> Adjustment</a></li>
                                <li><a class="dropdown-item chemicalTransferBtn" data-id="${row.company_chemical_id}" data-name="${row.name}" data-unit="${row.unit}" data-chemical-id="${row.chemical_id}">
                                    <i class="la la-exchange-alt text-secondary"></i> Transfer</a></li>
                                <li><a class="dropdown-item chemicalDisposeBtn" data-id="${row.company_chemical_id}" data-name="${row.name}" data-unit="${row.unit}" data-chemical-id="${row.chemical_id}">
                                    <i class="la la-trash text-danger"></i> Disposal</a></li>
                            </ul>
                        </div>
                    `
                },
                { data: 'company_chemical_id', visible: false },
                { data: 'chemical_id', visible: false },
            ],
            responsive: true,
        });

        // 🔹 Action button handlers
        $(document).on('click', '.chemicalCheckinBtn', function() {
            $('#chemicalCheckInModal [name=company_chemical_id]').val($(this).data('id'));
            $('#chemicalCheckInModal [name=chemical_id]').val($(this).data('chemical-id'));
            $('#chemicalCheckInModal [name=chemical_name]').val($(this).data('name'));
            $('#chemicalCheckInModal [name=unit]').val($(this).data('unit'));
            $('#chemicalCheckInModal').modal('show');
        });

        $(document).on('click', '.chemicalCheckoutBtn', function() {
            const modal = $('#chemicalCheckoutModal');
            const companyId = {{ $company->company_id }};
            
            // Extract chemical data from button
            const companyChemicalId = $(this).data('id');
            const chemicalId = $(this).data('chemical-id');
            const chemicalName = $(this).data('name');
            const unit = $(this).data('unit');

            // Populate modal fields
            modal.find('[name=company_chemical_id]').val(companyChemicalId);
            modal.find('[name=chemical_id]').val(chemicalId);
            modal.find('#checkInChemicalName').val(chemicalName);
            modal.find('[name=unit]').val(unit);
            modal.find('#checkoutUnit').val(unit);
            modal.find('#availableQty').val('');
            modal.find('#checkoutQty').val('');
            modal.find('#chemicalCheckoutBatch').html('<option value="">Loading batches...</option>');

            // Show modal
            modal.modal('show');

            // Load batches dynamically
            const batchSelect = modal.find('#chemicalCheckoutBatch');
            const availableQtyField = modal.find('#availableQty');
            const checkoutUnit = modal.find('#checkoutUnit');
            let batchData = {};

            fetch(`{{ route('admin.get-chemical-batches', ['company_id' => '__CID__']) }}`
                .replace('__CID__', companyId) + `?chemical_id=${companyChemicalId}`)
                .then(res => res.json())
                .then(data => {
                    availableQtyField.val(data.available_balance || 0);
                    batchSelect.html('<option value="">Select Batch</option>');
                    if (data.status === 'success' && data.batches.length > 0) {
                        data.batches.forEach(batch => {
                            batchData[batch.batch_no] = batch;
                            batchSelect.append(`<option value="${batch.batch_no}">${batch.batch_no}</option>`);
                        });
                        availableQtyField.val(data.available_balance || 0);
                    } else {
                        batchSelect.html('<option value="">No batches available</option>');
                    }
                })
                .catch(err => console.error('Error loading batches:', err));

            // When batch changes, show available qty
            batchSelect.off('change').on('change', function() {
                const batchNo = $(this).val();
                if (batchData[batchNo]) {
                    fetch(`{{ route('admin.get-batch-available-quantity', ['company_id' => '__CID__']) }}`
                    .replace('__CID__', companyId) + `?company_chemical_id=${companyChemicalId}&batch_no=${batchNo}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success' && data.available_balance !== undefined) {
                            availableQtyField.val(data.available_balance || 0);
                        } else {
                            availableQtyField.val(data.available_balance || 0);
                        }
                    })
                    .catch(err => console.error('Error loading batches:', err));
                    availableQtyField.val(batchData[batchNo].available_quantity || 0);
                    checkoutUnit.val(batchData[batchNo].unit || unit);
                } else {
                    availableQtyField.val('');
                }
            });
        });


        $(document).on('click', '.chemicalAdjustBtn', function() {
            // $('#chemicalAdjustmentModal [name=company_chemical_id]').val($(this).data('id'));
            // $('#chemicalAdjustmentModal [name=chemical_name]').val($(this).data('name'));
            // $('#chemicalAdjustmentModal [name=unit]').val($(this).data('unit'));
            // $('#chemicalAdjustmentModal').modal('show');

            const modal = $('#chemicalAdjustmentModal');
            const companyId = {{ $company->company_id }};
            
            // Extract chemical data from button
            const companyChemicalId = $(this).data('id');
            const chemicalId = $(this).data('chemical-id');
            const chemicalName = $(this).data('name');
            const unit = $(this).data('unit');

            // Populate modal fields
            modal.find('[name=company_chemical_id]').val(companyChemicalId);
            modal.find('[name=chemical_id]').val(chemicalId);
            modal.find('#adjustmentChemicalName').val(chemicalName);
            modal.find('[name=unit]').val(unit);
            modal.find('#chemicalAdjustmentUnit').val(unit);
            modal.find('#availableQty').val('');
            modal.find('#chemicalAdjustmentQty').val('');
            modal.find('#chemicalAdjustmentBatch').html('<option value="">Loading batches...</option>');

            // Show modal
            modal.modal('show');

            // Load batches dynamically
            const batchSelect = modal.find('#chemicalAdjustmentBatch');
            const availableQtyField = modal.find('#chemicalAdjustmentQty');
            const adjustmentUnit = modal.find('#chemicalUnit');
            let batchData = {};

            fetch(`{{ route('admin.get-chemical-batches', ['company_id' => '__CID__']) }}`
                .replace('__CID__', companyId) + `?chemical_id=${companyChemicalId}`)
                .then(res => res.json())
                .then(data => {
                    availableQtyField.val(data.available_balance || 0);
                    batchSelect.html('<option value="">Select Batch</option>');
                    if (data.status === 'success' && data.batches.length > 0) {
                        data.batches.forEach(batch => {
                            batchData[batch.batch_no] = batch;
                            batchSelect.append(`<option value="${batch.batch_no}">${batch.batch_no}</option>`);
                        });
                        availableQtyField.val(data.available_balance || 0);
                    } else {
                        batchSelect.html('<option value="">No batches available</option>');
                    }
                })
                .catch(err => console.error('Error loading batches:', err));

            // When batch changes, show available qty
            batchSelect.off('change').on('change', function() {
                const batchNo = $(this).val();
                if (batchData[batchNo]) {
                    fetch(`{{ route('admin.get-batch-available-quantity', ['company_id' => '__CID__']) }}`
                    .replace('__CID__', companyId) + `?company_chemical_id=${companyChemicalId}&batch_no=${batchNo}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success' && data.available_balance !== undefined) {
                            availableQtyField.val(data.available_balance || 0);
                        } else {
                            availableQtyField.val(data.available_balance || 0);
                        }
                    })
                    .catch(err => console.error('Error loading batches:', err));
                    availableQtyField.val(batchData[batchNo].available_quantity || 0);
                    checkoutUnit.val(batchData[batchNo].unit || unit);
                } else {
                    availableQtyField.val('');
                }
            });
        });

        $(document).on('click', '.chemicalTransferBtn', function() {
            // $('#chemicalTransferModal [name=company_chemical_id]').val($(this).data('id'));
            // $('#chemicalTransferModal [name=chemical_name]').val($(this).data('name'));
            // $('#chemicalTransferModal [name=unit]').val($(this).data('unit'));
            // $('#chemicalTransferModal').modal('show');
            const modal = $('#chemicalTransferModal');
            const companyId = {{ $company->company_id }};
            
            // Extract chemical data from button
            const companyChemicalId = $(this).data('id');
            const chemicalId = $(this).data('chemical-id');
            const chemicalName = $(this).data('name');
            const unit = $(this).data('unit');

            // Populate modal fields
            modal.find('[name=company_chemical_id]').val(companyChemicalId);
            modal.find('[name=chemical_id]').val(chemicalId);
            modal.find('#transferChemicalName').val(chemicalName);
            modal.find('[name=unit]').val(unit);
            modal.find('#chemicalTransferUnit').val(unit);
            modal.find('#chemicalTransferAvailableQty').val('');
            modal.find('#chemicalTransferBatch').html('<option value="">Loading batches...</option>');

            // Show modal
            modal.modal('show');

            // Load batches dynamically
            const batchSelect = modal.find('#chemicalTransferBatch');
            const availableQtyField = modal.find('#chemicalTransferAvailableQty');
            const transferUnit = modal.find('#chemicalUnit');
            let batchData = {};

            fetch(`{{ route('admin.get-chemical-batches', ['company_id' => '__CID__']) }}`
                .replace('__CID__', companyId) + `?chemical_id=${companyChemicalId}`)
                .then(res => res.json())
                .then(data => {
                    batchSelect.html('<option value="">Select Batch</option>');
                    if (data.status === 'success' && data.batches.length > 0) {
                        availableQtyField.val(data.available_balance || 0);
                        data.batches.forEach(batch => {
                            batchData[batch.batch_no] = batch;
                            batchSelect.append(`<option value="${batch.batch_no}">${batch.batch_no}</option>`);
                            availableQtyField.val(data.available_balance || 0);
                        });
                    } else {
                        batchSelect.html('<option value="">No batches available</option>');
                    }
                })
                .catch(err => console.error('Error loading batches:', err));
            // When batch changes, show available qty
            batchSelect.off('change').on('change', function() {
                const batchNo = $(this).val();
                if (batchData[batchNo]) {
                    fetch(`{{ route('admin.get-batch-available-quantity', ['company_id' => '__CID__']) }}`
                    .replace('__CID__', companyId) + `?company_chemical_id=${companyChemicalId}&batch_no=${batchNo}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success' && data.available_balance !== undefined) {
                            availableQtyField.val(data.available_balance || 0);
                        } else {
                            availableQtyField.val(data.available_balance || 0);
                        }
                    })
                    .catch(err => console.error('Error loading batches:', err));
                    availableQtyField.val(batchData[batchNo].available_quantity || 0);
                    transferUnit.val(batchData[batchNo].unit || unit);
                } else {
                    availableQtyField.val('');
                }
            });

        });

        $(document).on('click', '.chemicalDisposeBtn', function() {
            $('#chemicalDisposalModal [name=company_chemical_id]').val($(this).data('id'));
            $('#chemicalDisposalModal [name=chemical_name]').val($(this).data('name'));
            $('#chemicalDisposalModal').modal('show');
        });

        // 🔹 Form submissions
        $('form.inventoryActionForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(res) {
                    toastr.success(res.message || 'Action recorded successfully');
                    $('.modal').modal('hide');
                    table.ajax.reload();
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Auto-generate Batch Number
        document.getElementById('generateBatchBtn').addEventListener('click', function () {
            const chemicalId = document.getElementById('checkInChemicalName').value;
            const date = new Date();
            const ymd = `${date.getFullYear()}${(date.getMonth()+1).toString().padStart(2,'0')}${date.getDate().toString().padStart(2,'0')}`;
            const rand = Math.floor(100 + Math.random() * 900);
            const batchNo = `BCH-${chemicalId || 'GEN'}-${ymd}-${rand}`;
            document.getElementById('batchNo').value = batchNo;
        });

        // Validate and Submit Check-in Form
        const checkInForm = document.getElementById('chemicalCheckInForm');
        checkInForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!checkInForm.checkValidity()) {
                e.stopPropagation();
                checkInForm.classList.add('was-validated');
                return;
            }

            const formData = new FormData(checkInForm);

            fetch(`{{ route('admin.save-company-chemical-check-in') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Check-In Successful',
                        text: 'Chemical batch recorded successfully.'
                    });
                    $('#chemicalCheckInModal').modal('hide');
                    $('#chemicalTable').DataTable().ajax.reload();
                    checkInForm.reset();
                    checkInForm.classList.remove('was-validated');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Something went wrong.'
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Unable to process your request right now.'
                });
            });
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const chemicalCheckoutForm = document.querySelector("#chemicalCheckoutForm");

    // 🧾 Handle form submission
    chemicalCheckoutForm.addEventListener("submit", e => {
        e.preventDefault();
        e.stopPropagation();
        chemicalCheckoutForm.classList.add("was-validated");

        if (!chemicalCheckoutForm.checkValidity()) return;

        const formData = new FormData(chemicalCheckoutForm);
        // formData.append("chemical_id", chemicalId);
        // formData.append("company_id", companyId);

        const url = `{{ route('admin.save-company-chemical-check-out') }}`;

        fetch(url, {
            method: "POST",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "Checkout Recorded",
                    text: data.message || "Chemical checkout completed successfully!"
                });
                bootstrap.Modal.getInstance(document.getElementById("chemicalCheckoutModal")).hide();
                chemicalCheckoutForm.reset();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data.message || "Failed to save checkout."
                });
            }
        })
        .catch(err => console.error('Checkout error:', err));
    });
});
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {

        const adjustChemical = document.getElementById('adjustmentChemicalName');
        const adjustBatch = document.getElementById('chemicalAdjustmentBatch');
        const adjustCurrentQty = document.getElementById('chemicalAdjustmentQty');
        const adjustUnit = document.getElementById('adjustUnit');
        const adjustQuantity = document.getElementById('adjustQuantity');


        // Validate adjustment quantity for decrease
        const adjustType = document.getElementById('adjustType');
        adjustQuantity.addEventListener('input', function () {
            const maxQty = parseFloat(adjustCurrentQty.value || 0);
            const adjustVal = parseFloat(this.value || 0);
            if (adjustType.value === 'decrease' && adjustVal > maxQty) {
                this.setCustomValidity('Cannot decrease beyond available quantity');
            } else {
                this.setCustomValidity('');
            }
        });

        // Submit adjustment
        const form = document.getElementById('chemicalAdjustmentForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);
            fetch(`{{ route('admin.save-company-chemical-adjustment') }}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire('Adjustment Successful', 'Inventory updated successfully.', 'success');
                    $('#chemicalAdjustmentModal').modal('hide');
                    $('#chemicalTable').DataTable().ajax.reload();
                    form.reset();
                    form.classList.remove('was-validated');
                } else {
                    Swal.fire('Error', data.message || 'Unable to complete adjustment.', 'error');
                }
            })
            .catch(() => Swal.fire('Server Error', 'Unable to process request.', 'error'));
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const transferChemical = document.getElementById('transferChemical');
    const transferBatch = document.getElementById('transferBatch');
    const transferFromLocation = document.getElementById('transferFromLocation');
    const transferUnit = document.getElementById('transferUnit');
    const transferQuantity = document.getElementById('transferQuantity');

    // Submit transfer form
    const form = document.getElementById('chemicalTransferForm');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        const formData = new FormData(form);
        fetch(`{{ route('admin.save-company-chemical-transfer') }}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire('Transfer Successful', 'Chemical transferred successfully.', 'success');
                $('#chemicalTransferModal').modal('hide');
                $('#chemicalTable').DataTable().ajax.reload();
                form.reset();
                form.classList.remove('was-validated');
            } else {
                Swal.fire('Error', data.message || 'Transfer failed.', 'error');
            }
        })
        .catch(() => Swal.fire('Server Error', 'Unable to complete request.', 'error'));
    });
});
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const disposalChemical = document.getElementById('disposalChemical');
        const disposalBatch = document.getElementById('disposalBatch');
        const disposalLocation = document.getElementById('disposalLocation');
        const disposalQuantity = document.getElementById('disposalQuantity');
        const disposalUnit = document.getElementById('disposalUnit');

        // Load batches for selected chemical
        disposalChemical.addEventListener('change', function () {
            const chemicalId = this.value;
            if (!chemicalId) return;

            fetch(``)
                .then(res => res.json())
                .then(data => {
                    disposalBatch.innerHTML = `<option value="">Select Batch</option>`;
                    if (data.status === 'success' && data.batches.length > 0) {
                        disposalBatch.removeAttribute('disabled');
                        data.batches.forEach(batch => {
                            disposalBatch.innerHTML += `
                                <option value="${batch.batch_no}" 
                                    data-location="${batch.storage_location}" 
                                    data-qty="${batch.remaining_quantity}" 
                                    data-unit="${batch.unit}">
                                    ${batch.batch_no} — ${batch.remaining_quantity} ${batch.unit} (${batch.storage_location})
                                </option>`;
                        });
                    } else {
                        disposalBatch.setAttribute('disabled', true);
                        Swal.fire('No Batches Found', 'No available batches for this chemical.', 'info');
                    }
                });
        });

        // Auto-fill details on batch select
        disposalBatch.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            disposalLocation.value = selected.dataset.location || '';
            disposalUnit.value = selected.dataset.unit || '';
            disposalQuantity.max = selected.dataset.qty || 0;
        });

        // Validate disposal quantity
        disposalQuantity.addEventListener('input', function () {
            const maxQty = parseFloat(this.max);
            if (parseFloat(this.value) > maxQty) {
                this.setCustomValidity('Cannot dispose more than available quantity');
            } else {
                this.setCustomValidity('');
            }
        });

        // Submit disposal
        const form = document.getElementById('chemicalDisposalForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);
            fetch(``, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire('Disposal Recorded', 'Chemical successfully disposed.', 'success');
                    $('#chemicalDisposalModal').modal('hide');
                    $('#chemicalTable').DataTable().ajax.reload();
                    form.reset();
                    form.classList.remove('was-validated');
                } else {
                    Swal.fire('Error', data.message || 'Failed to record disposal.', 'error');
                }
            })
            .catch(() => Swal.fire('Server Error', 'Unable to complete disposal.', 'error'));
        });
    });
</script>