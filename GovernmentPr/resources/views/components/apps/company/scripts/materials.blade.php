<script>
    // Open modal dynamically
    function openMaterialModal(operation, data = {}) {
        const modal = document.querySelector('#materialModal');
        const title = modal.querySelector('#materialModalTitle');
        const body = modal.querySelector('#materialModalBody');
        const form = modal.querySelector('#materialForm');

        form.reset();
        form.classList.remove('was-validated');
        form.operation.value = operation;

        let html = '';

        if (operation === 'add' || operation === 'edit') {
            title.textContent = operation === 'add' ? 'Add Material' : 'Edit Material';
            html = `
            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <select name="material" class="form-control" required>
                        <option value="" disabled ${!data.material ? 'selected' : ''}>Select Material</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->materialID }}" ${data.material == '{{ $material->material }}' ? 'selected' : ''}>{{ $material->material }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Please select a material.</div>
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
                    <select name="hazardous" class="form-select">
                        <option value="0" ${data.hazardous == 0 ? 'selected' : ''}>No</option>
                        <option value="1" ${data.hazardous == 1 ? 'selected' : ''}>Yes</option>
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

        body.innerHTML = html;
        new bootstrap.Modal(modal).show();
    }

    // Submit form with AJAX + spinner + validation
    document.querySelector('#materialForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;

        form.classList.remove('was-validated');
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return;
        }

        const btn = document.querySelector('#materialSubmitBtn');
        const btnText = document.querySelector('#materialBtnText');
        const btnLoader = document.querySelector('#materialBtnLoader');
        btnText.style.display = 'none';
        btnLoader.style.display = 'inline-block';
        btn.disabled = true;

        const operation = form.operation.value;
        let url = '';
        switch (operation) {
            case 'add':
                url = "{{ route('admin.store-company-material') }}"; 
                break;
            case 'edit':
                url = `/save-company-material/${form.id.value}`; 
                break;
        }

        try {
            const res = await fetch(url, {
                method: 'POST',
                body: new FormData(form),
                headers: { 
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            if (!res.ok) {
                if (res.status === 422) {
                    const errorData = await res.json();
                    // Handle validation errors
                    if (errorData.errors) {
                        Object.keys(errorData.errors).forEach(field => {
                            const input = form.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                const feedback = document.createElement('div');
                                feedback.className = 'invalid-feedback dynamic';
                                feedback.textContent = errorData.errors[field][0];
                                input.parentNode.appendChild(feedback);
                            }
                        });
                    }
                    return;
                }
                throw new Error(`HTTP error! status: ${res.status}`);
            }

            let data;
            try {
                const responseText = await res.text();
                if (!responseText.trim()) {
                    data = { status: 'success', message: 'Material saved successfully' };
                } else {
                    data = JSON.parse(responseText);
                }
            } catch (parseError) {
                if (res.status === 200) {
                    data = { status: 'success', message: 'Material saved successfully' };
                } else {
                    throw new Error('Server returned invalid JSON response');
                }
            }

            if (data.status === 'success') {
                // Refresh the DataTable
                if ($.fn.DataTable.isDataTable('#materialTable')) {
                    $('#materialTable').DataTable().ajax.reload(null, false);
                }
                
                // Show success message
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message || 'Material saved successfully',
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else if (typeof toastr !== 'undefined') {
                    toastr.success(data.message || 'Material saved successfully');
                } else {
                    alert(data.message || 'Material saved successfully');
                }
                
                // Hide modal and reset form
                const modalElement = document.querySelector('#materialModal');
                if (modalElement) {
                    const modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                }
                form.reset();
                form.classList.remove('was-validated');
            }

        } catch (err) {
            console.error('Request failed:', err);
            
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Request Failed',
                    text: `Unable to process request: ${err.message}`
                });
            } else if (typeof toastr !== 'undefined') {
                toastr.error(`Request failed: ${err.message}`);
            } else {
                alert(`Request failed: ${err.message}`);
            }
        } finally {
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';
            btn.disabled = false;
        }
    });
</script>

<script>
    $(document).ready(function() {
        const table = $('#materialTable').DataTable({
            processing: true,
            ajax: {
                url: `{{ route('admin.get-company-materials', ['id' => $company->company_id]) }}`,
                dataSrc: 'company_materials'
            },
            columns: [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'name' },
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
                                <li><a class="dropdown-item viewMaterialBtn" data-id="${row.company_material_id}">
                                    <i class="la la-eye text-info"></i> View Details</a></li>
                                <li><a class="dropdown-item materialCheckinBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}" data-material-id="${row.material_id}">
                                    <i class="la la-arrow-down text-success"></i> Check-In</a></li>
                                <li><a class="dropdown-item materialCheckoutBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}" data-material-id="${row.material_id}">
                                    <i class="la la-arrow-up text-warning"></i> Check-Out</a></li>
                                <li><a class="dropdown-item materialAdjustBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}">
                                    <i class="la la-sync text-primary"></i> Adjustment</a></li>
                                <li><a class="dropdown-item materialTransferBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}">
                                    <i class="la la-exchange-alt text-secondary"></i> Transfer</a></li>
                                <li><a class="dropdown-item materialDisposeBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}">
                                    <i class="la la-trash text-danger"></i> Disposal</a></li>
                            </ul>
                        </div>
                    `
                },
                { data: 'company_material_id', visible: false },
                { data: 'material_id', visible: false },
            ],
            responsive: true,
        });

        // Check-in button handler (following chemical pattern)
        $(document).on('click', '.materialCheckinBtn', function() {
            $('#materialCheckInModal [name=checkIn_material_id]').val($(this).data('id'));
            $('#materialCheckInModal [name=material_id]').val($(this).data('material-id'));
            $('#materialCheckInModal [name=material_name]').val($(this).data('name'));
            $('#materialCheckInModal [name=unit]').val($(this).data('unit'));
            $('#materialCheckInModal').modal('show');
        });

        // Checkout button handler (following chemical pattern)
        $(document).on('click', '.materialCheckoutBtn', function() {
            const modal = $('#materialCheckoutModal');
            const companyMaterialId = $(this).data('id');
            const materialId = $(this).data('material-id');
            const materialName = $(this).data('name');
            const unit = $(this).data('unit');
            const companyId = {{ $company->company_id }};
            
            console.log('Material checkout clicked:', {
                companyMaterialId, materialId, materialName, unit
            });
            
            // Populate modal fields (using correct field names for StockMovementController)
            modal.find('[name=checkOut_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#checkInMaterialName').val(materialName);
            modal.find('[name=unit]').val(unit);
            modal.find('#checkoutUnit').val(unit);
            modal.find('#availableQty').val('');
            modal.find('#checkoutQty').val('');
            modal.find('#materialCheckoutBatch').html('<option value="">Loading batches...</option>');
            
            // Set default date
            modal.find('[name=date]').val(new Date().toISOString().slice(0, 10));
            
            // Check current stock balance before showing modal
            fetch(`/admin/material-balance/${companyMaterialId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(balanceData => {
                console.log('Current material balance:', balanceData);
                
                if (balanceData.balance <= 0) {
                    Swal.fire({
                        icon: "warning",
                        title: "No Stock Available",
                        html: `
                            <p><strong>Current Balance:</strong> ${balanceData.balance}</p>
                            <p>This material has no available stock for checkout.</p>
                            <br>
                            <p><strong>Solution:</strong> Check-in materials first to add stock.</p>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Open Check-In',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Open check-in modal instead
                            $('#materialCheckInModal [name=checkIn_material_id]').val(companyMaterialId);
                            $('#materialCheckInModal [name=material_id]').val(materialId);
                            $('#materialCheckInModal [name=material_name]').val(materialName);
                            $('#materialCheckInModal [name=unit]').val(unit);
                            $('#materialCheckInModal').modal('show');
                        }
                    });
                    return;
                }
                
                // If balance is positive, show checkout modal
                modal.modal('show');
            })
            .catch(err => {
                console.error('Error checking balance:', err);
                // Show modal anyway if balance check fails
                modal.modal('show');
            });
            
            // Load batches dynamically
            const batchSelect = modal.find('#materialCheckoutBatch');
            const availableQtyField = modal.find('#availableQty');
            const checkoutUnit = modal.find('#checkoutUnit');
            
            let batchData = {};
            
            // Fetch batches from API
            fetch(`/admin/material-batches/${companyMaterialId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Batches loaded:', data);
                
                batchSelect.html('<option value="">Select Batch</option>');
                
                if (data.status === 'success' && data.batches && data.batches.length > 0) {
                    data.batches.forEach(batch => {
                        // Validate that batch belongs to the correct material
                        if (batch.material_id == materialId) {
                            batchData[batch.batch_id] = {
                                available_quantity: batch.available_quantity,
                                unit: unit,
                                original_quantity: batch.original_quantity,
                                material_id: batch.material_id,
                                company_material_id: batch.company_material_id
                            };
                            
                            batchSelect.append(`
                                <option value="${batch.batch_id}" data-material-id="${batch.material_id}">
                                    ${batch.batch_no} (${batch.available_quantity} available) - ${batch.check_in_date}
                                </option>
                            `);
                        } else {
                            console.warn('Batch material mismatch:', {
                                batchMaterialId: batch.material_id,
                                expectedMaterialId: materialId,
                                batchId: batch.batch_id
                            });
                        }
                    });
                    
                    // If no valid batches found after filtering
                    if (batchSelect.children().length === 1) { // Only the default option
                        batchSelect.html('<option value="">No valid batches available for this material</option>');
                    }
                } else {
                    batchSelect.html('<option value="">No batches available</option>');
                }
            })
            .catch(err => {
                console.error('Error loading batches:', err);
                batchSelect.html('<option value="">Error loading batches</option>');
            });
            
            // Handle batch selection
            batchSelect.off('change').on('change', function() {
                const batchNo = $(this).val();
                const selectedOption = $(this).find('option:selected');
                
                if (batchNo && batchData[batchNo]) {
                    // Double-check material ID match
                    const batchMaterialId = selectedOption.data('material-id') || batchData[batchNo].material_id;
                    
                    if (batchMaterialId && batchMaterialId != materialId) {
                        // Material mismatch detected
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Batch Selection',
                            html: `
                                <div class="text-start">
                                    <p><strong>⚠️ Material Mismatch Detected!</strong></p>
                                    <p>The selected batch does not belong to the current material.</p>
                                    <hr>
                                    <p><strong>Current Material ID:</strong> ${materialId}</p>
                                    <p><strong>Batch Material ID:</strong> ${batchMaterialId}</p>
                                    <p><strong>Material Name:</strong> ${materialName}</p>
                                    <hr>
                                    <p class="text-danger">This could indicate a data integrity issue. Please contact your administrator.</p>
                                </div>
                            `,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#dc3545'
                        });
                        
                        // Reset selection
                        $(this).val('');
                        availableQtyField.val('');
                        checkoutUnit.val(unit);
                        return;
                    }
                    
                    // Show the actual available quantity from the batch
                    availableQtyField.val(batchData[batchNo].available_quantity || 0);
                    checkoutUnit.val(batchData[batchNo].unit || unit);
                } else {
                    availableQtyField.val('');
                    checkoutUnit.val(unit);
                }
            });
            
            // Validate quantity against available stock with enhanced feedback
            modal.find('#checkoutQty').off('input').on('input', function() {
                const batchNo = batchSelect.val();
                const requestedQty = parseFloat($(this).val());
                const availableQty = parseFloat(availableQtyField.val());
                const qtyInput = $(this);
                
                // Remove any existing feedback
                qtyInput.removeClass('is-invalid is-valid');
                qtyInput.siblings('.invalid-feedback.qty-validation').remove();
                qtyInput.siblings('.valid-feedback.qty-validation').remove();
                
                if (batchNo && batchData[batchNo] && !isNaN(requestedQty) && !isNaN(availableQty)) {
                    if (requestedQty > availableQty) {
                        // Exceeds available stock
                        qtyInput[0].setCustomValidity(`Quantity cannot exceed available stock (${availableQty})`);
                        qtyInput.addClass('is-invalid');
                        
                        const feedback = $(`
                            <div class="invalid-feedback qty-validation">
                                <i class="la la-exclamation-triangle"></i> 
                                Maximum available: <strong>${availableQty} ${unit}</strong>
                                <br>You're requesting <strong>${(requestedQty - availableQty)} ${unit}</strong> more than available.
                            </div>
                        `);
                        qtyInput.after(feedback);
                    } else if (requestedQty > 0) {
                        // Valid quantity
                        qtyInput[0].setCustomValidity('');
                        qtyInput.addClass('is-valid');
                        
                        const remaining = availableQty - requestedQty;
                        const feedback = $(`
                            <div class="valid-feedback qty-validation">
                                <i class="la la-check-circle"></i> 
                                Valid quantity. Remaining after checkout: <strong>${remaining} ${unit}</strong>
                            </div>
                        `);
                        qtyInput.after(feedback);
                    } else {
                        qtyInput[0].setCustomValidity('');
                    }
                } else {
                    qtyInput[0].setCustomValidity('');
                }
            });
            
            // Also validate on batch selection change
            batchSelect.off('change.validation').on('change.validation', function() {
                modal.find('#checkoutQty').trigger('input');
            });
        });
    });
</script>

<script>
// Global function for loading material batches
async function loadMaterialBatches(companyMaterialId) {
    try {
        console.log('🔄 Loading batches for material:', companyMaterialId);
        
        const batchSelect = document.getElementById('checkoutMaterialBatch');
        const availableQtyInput = document.getElementById('availableMaterialQty');
        
        if (!batchSelect || !availableQtyInput) {
            console.error('❌ Batch select elements not found');
            return;
        }
        
        // Reset and disable while loading
        batchSelect.innerHTML = '<option value="">Loading batches...</option>';
        batchSelect.disabled = true;
        availableQtyInput.value = '';
        
        const response = await fetch(`/admin/material-batches/${companyMaterialId}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('📦 Batches loaded:', data);
        
        if (data.status === 'success' && data.batches) {
            // Clear loading message
            batchSelect.innerHTML = '<option value="">Select Batch</option>';
            
            if (data.batches.length === 0) {
                batchSelect.innerHTML = '<option value="MANUAL">No batches available - Manual Entry</option>';
                batchSelect.disabled = false;
                availableQtyInput.value = 'No stock tracking';
            } else {
                // Populate batches
                data.batches.forEach(batch => {
                    const option = document.createElement('option');
                    option.value = batch.batch_id;
                    option.textContent = `${batch.batch_no} (${batch.available_quantity} available) - ${batch.check_in_date}`;
                    option.dataset.availableQty = batch.available_quantity;
                    option.dataset.originalQty = batch.original_quantity;
                    batchSelect.appendChild(option);
                });
                
                // Add manual entry option
                const manualOption = document.createElement('option');
                manualOption.value = 'MANUAL';
                manualOption.textContent = 'Manual Entry (No batch tracking)';
                batchSelect.appendChild(manualOption);
                
                batchSelect.disabled = false;
                availableQtyInput.value = 'Select batch first';
            }
        } else {
            batchSelect.innerHTML = '<option value="MANUAL">Manual Entry (No batch tracking)</option>';
            batchSelect.disabled = false;
            availableQtyInput.value = 'No batch tracking';
        }
        
    } catch (error) {
        console.error('❌ Failed to load batches:', error);
        
        const batchSelect = document.getElementById('checkoutMaterialBatch');
        const availableQtyInput = document.getElementById('availableMaterialQty');
        
        if (batchSelect && availableQtyInput) {
            batchSelect.innerHTML = '<option value="MANUAL">Manual Entry (Error loading batches)</option>';
            batchSelect.disabled = false;
            availableQtyInput.value = 'Error loading data';
        }
        
        if (typeof toastr !== 'undefined') {
            toastr.warning('Failed to load batches. Manual entry enabled.');
        }
    }
}

// Batch selection handler
$(document).ready(function() {
    // Handle batch selection change
    $(document).on('change', '#checkoutMaterialBatch', function() {
        const selectedOption = this.options[this.selectedIndex];
        const availableQtyInput = document.getElementById('availableMaterialQty');
        const checkoutQtyInput = document.getElementById('checkoutMaterialQty');
        
        if (selectedOption.value === 'MANUAL') {
            availableQtyInput.value = 'Manual entry - no limit';
            checkoutQtyInput.removeAttribute('max');
            checkoutQtyInput.placeholder = 'Enter quantity';
        } else if (selectedOption.value && selectedOption.dataset.availableQty) {
            const availableQty = parseFloat(selectedOption.dataset.availableQty);
            availableQtyInput.value = `${availableQty} available`;
            
            // Set max attribute for quantity input
            checkoutQtyInput.max = availableQty;
            checkoutQtyInput.placeholder = `Max: ${availableQty}`;
            
            console.log('📊 Batch selected:', {
                batchId: selectedOption.value,
                availableQty: availableQty,
                originalQty: selectedOption.dataset.originalQty
            });
        } else {
            availableQtyInput.value = 'Select batch first';
            checkoutQtyInput.removeAttribute('max');
            checkoutQtyInput.placeholder = '';
        }
    });
    
    // Validate checkout quantity against available quantity
    $(document).on('input', '#checkoutMaterialQty', function() {
        const batchSelect = document.getElementById('checkoutMaterialBatch');
        const selectedOption = batchSelect.options[batchSelect.selectedIndex];
        
        if (selectedOption.value !== 'MANUAL' && selectedOption.value && selectedOption.dataset.availableQty) {
            const availableQty = parseFloat(selectedOption.dataset.availableQty);
            const requestedQty = parseFloat(this.value);
            
            if (requestedQty > availableQty) {
                this.setCustomValidity(`Quantity cannot exceed available stock (${availableQty})`);
                this.classList.add('is-invalid');
                
                // Show error feedback
                let feedback = this.parentNode.querySelector('.invalid-feedback.qty-error');
                if (!feedback) {
                    feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback qty-error';
                    this.parentNode.appendChild(feedback);
                }
                feedback.textContent = `Maximum available: ${availableQty}`;
            } else {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
                
                // Remove error feedback
                const feedback = this.parentNode.querySelector('.invalid-feedback.qty-error');
                if (feedback) {
                    feedback.remove();
                }
            }
        } else {
            // Manual entry - no validation
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            
            // Remove error feedback
            const feedback = this.parentNode.querySelector('.invalid-feedback.qty-error');
            if (feedback) {
                feedback.remove();
            }
        }
    });
});
</script>

<script>
// Material Checkout Form Handler (following chemical pattern)
document.addEventListener("DOMContentLoaded", () => {
    const materialCheckoutForm = document.querySelector("#materialCheckoutForm");
    
    if (materialCheckoutForm) {
        // Handle form submission
        materialCheckoutForm.addEventListener("submit", e => {
            e.preventDefault();
            e.stopPropagation();
            materialCheckoutForm.classList.add("was-validated");
            
            if (!materialCheckoutForm.checkValidity()) return;
            
            const formData = new FormData(materialCheckoutForm);
            
            // Add batch validation before submission
            const selectedBatch = materialCheckoutForm.querySelector('#materialCheckoutBatch').value;
            if (selectedBatch && selectedBatch !== 'MANUAL') {
                formData.set('batch_no', selectedBatch);
                
                // Validate material ID match one more time
                const materialIdFromForm = formData.get('material_id');
                const batchSelect = materialCheckoutForm.querySelector('#materialCheckoutBatch');
                const selectedOption = batchSelect.options[batchSelect.selectedIndex];
                const batchMaterialId = selectedOption.getAttribute('data-material-id');
                
                if (batchMaterialId && batchMaterialId !== materialIdFromForm) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Material Validation Failed',
                        text: 'The selected batch does not belong to the current material. Please refresh the page and try again.',
                        confirmButtonColor: '#dc3545'
                    });
                    return;
                }
            }
            
            // Debug form data
            console.log('Material checkout form data:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }
            
            fetch("{{ route('admin.save-company-material-check-out') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(async res => {
                console.log('Raw response status:', res.status);
                console.log('Raw response headers:', res.headers);
                
                // Get the response text first
                const responseText = await res.text();
                console.log('Raw response text:', responseText);
                
                // Check if response is ok
                if (!res.ok) {
                    if (res.status === 422 || res.status === 400) {
                        // Try to parse as JSON for validation errors
                        try {
                            const errorData = JSON.parse(responseText);
                            console.log('Validation errors:', errorData);
                            
                            if (errorData.errors) {
                                // Check for balance error specifically
                                if (errorData.errors.balance_error) {
                                    const availableBalance = errorData.available_balance || 0;
                                    const errorMessage = errorData.errors.balance_error[0];
                                    
                                    // Get current requested quantity from form
                                    const checkoutForm = document.getElementById('materialCheckoutForm');
                                    const requestedQty = checkoutForm.querySelector('[name="quantity"]').value;
                                    const materialName = checkoutForm.querySelector('[name="material_name"]').value;
                                    const unit = checkoutForm.querySelector('[name="unit"]').value;
                                    
                                    if (availableBalance <= 0) {
                                        // No stock available - suggest check-in
                                        Swal.fire({
                                            icon: "warning",
                                            title: "No Stock Available",
                                            html: `
                                                <div class="text-start">
                                                    <p><strong>Material:</strong> ${materialName}</p>
                                                    <p><strong>Available Stock:</strong> <span class="text-danger">${availableBalance} ${unit}</span></p>
                                                    <p><strong>Requested:</strong> ${requestedQty} ${unit}</p>
                                                    <hr>
                                                    <p class="text-muted">${errorMessage}</p>
                                                    <p><strong>Solution:</strong> Check-in materials first to add stock.</p>
                                                </div>
                                            `,
                                            showCancelButton: true,
                                            confirmButtonText: '<i class="la la-plus"></i> Check-In Materials',
                                            cancelButtonText: 'Cancel',
                                            confirmButtonColor: '#28a745'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Close checkout modal and open check-in modal
                                                bootstrap.Modal.getInstance(document.getElementById("materialCheckoutModal")).hide();
                                                
                                                const companyMaterialId = checkoutForm.querySelector('[name="checkOut_material_id"]').value;
                                                const materialId = checkoutForm.querySelector('[name="material_id"]').value;
                                                
                                                // Populate and show check-in modal
                                                $('#materialCheckInModal [name=checkIn_material_id]').val(companyMaterialId);
                                                $('#materialCheckInModal [name=material_id]').val(materialId);
                                                $('#materialCheckInModal [name=material_name]').val(materialName);
                                                $('#materialCheckInModal [name=unit]').val(unit);
                                                $('#materialCheckInModal').modal('show');
                                            }
                                        });
                                    } else {
                                        // Stock available but insufficient - suggest adjustment
                                        const shortage = parseFloat(requestedQty) - parseFloat(availableBalance);
                                        
                                        Swal.fire({
                                            icon: "warning",
                                            title: "⚠️ Quantity Exceeds Available Stock",
                                            html: `
                                                <div class="alert alert-warning text-start mb-3">
                                                    <h6 class="mb-2"><i class="la la-info-circle"></i> Stock Summary</h6>
                                                    <div class="row">
                                                        <div class="col-6"><strong>Available:</strong></div>
                                                        <div class="col-6 text-success"><strong>${availableBalance} ${unit}</strong></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6"><strong>Requested:</strong></div>
                                                        <div class="col-6 text-danger"><strong>${requestedQty} ${unit}</strong></div>
                                                    </div>
                                                    <div class="row border-top pt-2 mt-2">
                                                        <div class="col-6"><strong>Shortage:</strong></div>
                                                        <div class="col-6 text-warning"><strong>${shortage.toFixed(2)} ${unit}</strong></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="text-start">
                                                    <p><strong>📦 Material:</strong> ${materialName}</p>
                                                    <p class="text-muted small">${errorMessage}</p>
                                                    
                                                    <div class="mt-3">
                                                        <h6><i class="la la-lightbulb"></i> Quick Solutions:</h6>
                                                        <div class="d-grid gap-2">
                                                            <div class="p-2 border rounded bg-light">
                                                                <strong>Option 1:</strong> Use maximum available (${availableBalance} ${unit})
                                                            </div>
                                                            <div class="p-2 border rounded bg-light">
                                                                <strong>Option 2:</strong> Check-in ${shortage.toFixed(2)} more ${unit} first
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            `,
                                            width: '500px',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            confirmButtonText: `<i class="la la-check"></i> Use ${availableBalance} ${unit}`,
                                            denyButtonText: `<i class="la la-plus"></i> Check-In ${shortage.toFixed(2)} More`,
                                            cancelButtonText: '<i class="la la-times"></i> Cancel',
                                            confirmButtonColor: '#28a745',
                                            denyButtonColor: '#007bff',
                                            cancelButtonColor: '#6c757d'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Set quantity to available balance and highlight the change
                                                const qtyInput = checkoutForm.querySelector('[name="quantity"]');
                                                qtyInput.value = availableBalance;
                                                qtyInput.classList.add('is-valid');
                                                qtyInput.focus();
                                                
                                                // Update available quantity display
                                                const availableQtyInput = checkoutForm.querySelector('#availableQty');
                                                if (availableQtyInput) {
                                                    availableQtyInput.value = `${availableBalance} available`;
                                                }
                                                
                                                // Show success toast
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 4000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                    }
                                                });
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: `✅ Quantity adjusted to ${availableBalance} ${unit}`,
                                                    text: 'You can now proceed with checkout'
                                                });
                                            } else if (result.isDenied) {
                                                // Open check-in modal with suggested quantity
                                                bootstrap.Modal.getInstance(document.getElementById("materialCheckoutModal")).hide();
                                                
                                                const companyMaterialId = checkoutForm.querySelector('[name="checkOut_material_id"]').value;
                                                const materialId = checkoutForm.querySelector('[name="material_id"]').value;
                                                
                                                // Populate check-in modal with suggested quantity
                                                $('#materialCheckInModal [name=checkIn_material_id]').val(companyMaterialId);
                                                $('#materialCheckInModal [name=material_id]').val(materialId);
                                                $('#materialCheckInModal [name=material_name]').val(materialName);
                                                $('#materialCheckInModal [name=unit]').val(unit);
                                                $('#materialCheckInModal [name=quantity]').val(Math.ceil(shortage)); // Suggest at least the shortage amount
                                                $('#materialCheckInModal').modal('show');
                                                
                                                // Show helpful toast
                                                setTimeout(() => {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 5000,
                                                        timerProgressBar: true
                                                    });
                                                    Toast.fire({
                                                        icon: 'info',
                                                        title: `💡 Suggested check-in: ${Math.ceil(shortage)} ${unit}`,
                                                        text: 'This will give you enough stock for your checkout'
                                                    });
                                                }, 500);
                                            }
                                        });
                                    }
                                    return;
                                }
                                
                                // Handle other validation errors
                                let errorMessage = 'Validation failed:\n';
                                Object.keys(errorData.errors).forEach(field => {
                                    errorMessage += `${field}: ${errorData.errors[field][0]}\n`;
                                });
                                
                                Swal.fire({
                                    icon: "error",
                                    title: "Validation Error",
                                    text: errorMessage
                                });
                                return;
                            }
                        } catch (parseError) {
                            console.error('Failed to parse validation error response:', parseError);
                        }
                    }
                    throw new Error(`HTTP ${res.status}: ${responseText}`);
                }
                
                // Try to parse as JSON
                try {
                    return JSON.parse(responseText);
                } catch (parseError) {
                    console.error('Failed to parse JSON response:', parseError);
                    // If we got a 200 but invalid JSON, assume success
                    if (res.status === 200) {
                        return { status: 'success', message: 'Material checkout completed successfully' };
                    }
                    throw new Error('Invalid JSON response from server');
                }
            })
            .then(data => {
                console.log('Checkout response:', data);
                
                if (data.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Checkout Recorded",
                        text: data.message || "Material checkout completed successfully!"
                    });
                    bootstrap.Modal.getInstance(document.getElementById("materialCheckoutModal")).hide();
                    materialCheckoutForm.reset();
                    materialCheckoutForm.classList.remove("was-validated");
                    
                    // Refresh the materials table
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.message || "Failed to save checkout."
                    });
                }
            })
            .catch(err => {
                console.error('Checkout error:', err);
                Swal.fire({
                    icon: "error",
                    title: "Request Failed",
                    text: `Error: ${err.message}`
                });
            });
        });
    }
    
    // Material Check-In Form Handler (following chemical pattern)
    const materialCheckInForm = document.querySelector("#materialCheckInForm");
    if (materialCheckInForm) {
        materialCheckInForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!materialCheckInForm.checkValidity()) {
                e.stopPropagation();
                materialCheckInForm.classList.add('was-validated');
                return;
            }

            const formData = new FormData(materialCheckInForm);
            
            // Debug form data
            console.log('Material check-in form data:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            fetch(`{{ route('admin.save-company-material-check-in') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(async res => {
                console.log('Check-in response status:', res.status);
                
                const responseText = await res.text();
                console.log('Check-in raw response:', responseText);
                
                if (!res.ok) {
                    if (res.status === 422) {
                        try {
                            const errorData = JSON.parse(responseText);
                            console.log('Check-in validation errors:', errorData);
                            
                            if (errorData.errors) {
                                let errorMessage = 'Validation failed:\n';
                                Object.keys(errorData.errors).forEach(field => {
                                    errorMessage += `${field}: ${errorData.errors[field][0]}\n`;
                                });
                                
                                Swal.fire({
                                    icon: "error",
                                    title: "Validation Error",
                                    text: errorMessage
                                });
                                return;
                            }
                        } catch (parseError) {
                            console.error('Failed to parse validation error response:', parseError);
                        }
                    }
                    throw new Error(`HTTP ${res.status}: ${responseText}`);
                }
                
                try {
                    return JSON.parse(responseText);
                } catch (parseError) {
                    if (res.status === 200) {
                        return { status: 'success', message: 'Material check-in recorded successfully' };
                    }
                    throw new Error('Invalid JSON response from server');
                }
            })
            .then(data => {
                console.log('Check-in response:', data);
                
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Check-In Successful',
                        text: data.message || 'Material batch recorded successfully.'
                    });
                    $('#materialCheckInModal').modal('hide');
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                    materialCheckInForm.reset();
                    materialCheckInForm.classList.remove('was-validated');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Something went wrong.'
                    });
                }
            })
            .catch(err => {
                console.error('Check-in error:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Request Failed',
                    text: `Error: ${err.message}`
                });
            });
        });
    }
    
    // Auto-generate Material Batch Number (following chemical pattern)
    const generateMaterialBatchBtn = document.getElementById('generateMaterialBatchBtn');
    if (generateMaterialBatchBtn) {
        generateMaterialBatchBtn.addEventListener('click', function () {
            const materialId = document.getElementById('checkInMaterialName').value;
            const date = new Date();
            const ymd = `${date.getFullYear()}${(date.getMonth()+1).toString().padStart(2,'0')}${date.getDate().toString().padStart(2,'0')}`;
            const rand = Math.floor(100 + Math.random() * 900);
            const batchNo = `MAT-${materialId || 'GEN'}-${ymd}-${rand}`;
            document.getElementById('materialBatchNo').value = batchNo;
        });
    }
});
</script>