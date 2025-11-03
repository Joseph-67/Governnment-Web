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
                    <input name="unit_of_measurement" class="form-control" value="${data.unit || ''}" pattern="[A-Za-z/²³°%]+[A-Za-z/²³°%\\s]*" title="Unit should contain only letters and common symbols (/, ², ³, °, %)">
                    <div class="invalid-feedback">Unit should contain only letters and symbols (e.g., kg, m², L/min, °C).</div>
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

    // Add real-time validation for unit field to prevent numbers
    $(document).on('input', 'input[name="unit_of_measurement"]', function(e) {
        const input = e.target;
        const value = input.value;
        
        // Remove any digits from the input
        const cleanValue = value.replace(/[0-9]/g, '');
        
        if (value !== cleanValue) {
            input.value = cleanValue;
            
            // Show temporary feedback
            input.classList.add('is-invalid');
            
            // Remove existing feedback
            const existingFeedback = input.parentNode.querySelector('.invalid-feedback.temp-feedback');
            if (existingFeedback) {
                existingFeedback.remove();
            }
            
            // Add temporary feedback
            const feedback = document.createElement('div');
            feedback.className = 'invalid-feedback temp-feedback';
            feedback.textContent = 'Numbers are not allowed in unit field';
            input.parentNode.appendChild(feedback);
            
            // Remove the error styling after 2 seconds
            setTimeout(() => {
                input.classList.remove('is-invalid');
                if (feedback.parentNode) {
                    feedback.remove();
                }
            }, 2000);
        }
    });

    // Additional validation on blur to ensure proper format
    $(document).on('blur', 'input[name="unit_of_measurement"]', function(e) {
        const input = e.target;
        const value = input.value.trim();
        
        // Check if value contains only valid characters
        const validPattern = /^[A-Za-z/²³°%\s]+$/;
        
        if (value && !validPattern.test(value)) {
            input.classList.add('is-invalid');
            
            // Remove existing feedback
            const existingFeedback = input.parentNode.querySelector('.invalid-feedback.validation-feedback');
            if (existingFeedback) {
                existingFeedback.remove();
            }
            
            // Add validation feedback
            const feedback = document.createElement('div');
            feedback.className = 'invalid-feedback validation-feedback';
            feedback.textContent = 'Unit should contain only letters and symbols (e.g., kg, m², L/min, °C)';
            input.parentNode.appendChild(feedback);
        } else {
            input.classList.remove('is-invalid');
            const feedback = input.parentNode.querySelector('.invalid-feedback.validation-feedback');
            if (feedback) {
                feedback.remove();
            }
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
                                <li><a class="dropdown-item materialAdjustBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}" data-material-id="${row.material_id}">
                                    <i class="la la-sync text-primary"></i> Adjustment</a></li>
                                <li><a class="dropdown-item materialTransferBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}" data-material-id="${row.material_id}">
                                    <i class="la la-exchange-alt text-secondary"></i> Transfer</a></li>
                                <li><a class="dropdown-item materialDisposeBtn" data-id="${row.company_material_id}" data-name="${row.name}" data-unit="${row.unit}" data-material-id="${row.material_id}">
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

        // Adjustment button handler (following chemical pattern)
        $(document).on('click', '.materialAdjustBtn', function() {
            const modal = $('#materialAdjustmentModal');
            const companyMaterialId = $(this).data('id');
            const materialId = $(this).data('material-id');
            const materialName = $(this).data('name');
            const unit = $(this).data('unit');
            
            console.log('Material adjustment clicked:', {
                companyMaterialId, materialId, materialName, unit
            });
            
            // Populate modal fields
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#adjustmentMaterialName').val(materialName);
            modal.find('#materialAdjustmentUnit').val(unit);
            modal.find('#adjustmentTotalQty').val('Loading...');
            modal.find('#adjustmentBatchQty').val('');
            modal.find('#materialAdjustmentBatch').html('<option value="">Loading batches...</option>');
            
            // Reset form
            modal.find('form')[0].reset();
            modal.find('form').removeClass('was-validated');
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#adjustmentMaterialName').val(materialName);
            modal.find('#materialAdjustmentUnit').val(unit);
            
            // Set default date
            modal.find('[name=transaction_date]').val(new Date().toISOString().slice(0, 10));
            
            // Load batches and total quantity
            loadMaterialAdjustmentBatches(companyMaterialId, unit);
            
            modal.modal('show');
        });

        // Transfer button handler (following chemical pattern)
        $(document).on('click', '.materialTransferBtn', function() {
            const modal = $('#materialTransferModal');
            const companyMaterialId = $(this).data('id');
            const materialId = $(this).data('material-id');
            const materialName = $(this).data('name');
            const unit = $(this).data('unit');
            
            console.log('Material transfer clicked:', {
                companyMaterialId, materialId, materialName, unit
            });
            
            // Populate modal fields
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#transferMaterialName').val(materialName);
            modal.find('#transferMaterialUnit').val(unit);
            modal.find('#materialTransferAvailableQty').val('');
            modal.find('#transferMaterialQuantity').val('');
            modal.find('#transferMaterialToLocation').val('');
            modal.find('#materialTransferBatch').html('<option value="">Loading batches...</option>');
            
            // Reset form
            modal.find('form')[0].reset();
            modal.find('form').removeClass('was-validated');
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#transferMaterialName').val(materialName);
            modal.find('#transferMaterialUnit').val(unit);
            
            // Set default date
            modal.find('[name=transaction_date]').val(new Date().toISOString().slice(0, 10));
            
            // Load batches for transfer
            loadMaterialTransferBatches(companyMaterialId, unit);
            
            modal.modal('show');
        });

        // Disposal button handler (following chemical pattern)
        $(document).on('click', '.materialDisposeBtn', function() {
            const modal = $('#materialDisposalModal');
            const companyMaterialId = $(this).data('id');
            const materialId = $(this).data('material-id');
            const materialName = $(this).data('name');
            const unit = $(this).data('unit');
            
            console.log('Material disposal clicked:', {
                companyMaterialId, materialId, materialName, unit
            });
            
            // Populate modal fields
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#disposalMaterialName').val(materialName);
            modal.find('#disposalMaterialUnit').val(unit);
            modal.find('#disposalMaterialBatch').html('<option value="">Loading batches...</option>');
            
            // Clear form validation and reset specific fields (don't reset entire form)
            modal.find('form').removeClass('was-validated');
            modal.find('input[type="number"]').val('');
            modal.find('textarea').val('');
            modal.find('select:not(#materialDisposalMethod)').each(function() {
                this.selectedIndex = 0;
            });
            
            // Populate fields
            modal.find('[name=company_material_id]').val(companyMaterialId);
            modal.find('[name=material_id]').val(materialId);
            modal.find('#disposalMaterialName').val(materialName);
            modal.find('#disposalMaterialUnit').val(unit);
            
            // Set default date
            modal.find('[name=disposal_date]').val(new Date().toISOString().slice(0, 10));
            
            // Show modal
            modal.modal('show');
            
            // Load batches dynamically
            const batchSelect = modal.find('#disposalMaterialBatch');
            const quantityInput = modal.find('#disposalMaterialQuantity');
            let batchData = {};
            
            // Add available quantity display helper
            const addAvailableQtyHelper = () => {
                const existingHelper = modal.find('#disposalAvailableQtyHelper');
                if (existingHelper.length === 0) {
                    const helper = $(`
                        <div id="disposalAvailableQtyHelper" class="mt-2">
                            <small class="text-muted">
                                <i class="la la-info-circle"></i> 
                                <span id="disposalAvailableQtyText">Select a batch to see available quantity</span>
                            </small>
                        </div>
                    `);
                    quantityInput.parent().append(helper);
                }
            };
            
            addAvailableQtyHelper();
            
            fetch(`/admin/material-batches/${companyMaterialId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(res => res.json())
            .then(data => {
                batchSelect.html('<option value="">Select Batch</option>');
                if (data.status === 'success' && data.batches && data.batches.length > 0) {
                    data.batches.forEach(batch => {
                        batchData[batch.batch_no] = batch;
                        batchSelect.append(`<option value="${batch.batch_no}">${batch.batch_no}</option>`);
                    });
                    batchSelect.prop('disabled', false);
                    
                    // Add batch selection handler for disposal
                    batchSelect.off('change.disposal').on('change.disposal', function() {
                        const selectedBatch = $(this).val();
                        const helperText = modal.find('#disposalAvailableQtyText');
                        
                        if (selectedBatch && companyMaterialId) {
                            helperText.html('<i class="la la-spinner la-spin"></i> Loading available quantity...');
                            
                            fetch(`/admin/material-batch-quantity/${companyMaterialId}?batch_no=${selectedBatch}`, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    const availableQty = data.available_balance;
                                    const unit = modal.find('#disposalMaterialUnit').val() || 'units';
                                    helperText.html(`Available in batch <strong>${selectedBatch}</strong>: <span class="text-success">${availableQty} ${unit}</span>`);
                                    
                                    // Set max attribute on quantity input
                                    quantityInput.attr('max', availableQty);
                                    quantityInput.attr('placeholder', `Max: ${availableQty} ${unit}`);
                                } else {
                                    helperText.html('<span class="text-warning">Error loading quantity</span>');
                                }
                            })
                            .catch(err => {
                                console.error('Error loading batch quantity:', err);
                                helperText.html('<span class="text-danger">Error loading quantity</span>');
                            });
                        } else {
                            helperText.text('Select a batch to see available quantity');
                            quantityInput.removeAttr('max');
                            quantityInput.attr('placeholder', 'Enter quantity to dispose');
                        }
                    });
                } else {
                    batchSelect.html('<option value="">No batches available</option>');
                    batchSelect.prop('disabled', true);
                }
            })
            .catch(err => {
                console.error('Error loading batches:', err);
                batchSelect.html('<option value="">Error loading batches</option>');
                batchSelect.prop('disabled', true);
            });
            
            // Load disposal methods
            const methodSelect = modal.find('#materialDisposalMethod');
            
            // Always load disposal methods when modal opens
            methodSelect.html('<option value="">Loading disposal methods...</option>');
            methodSelect.prop('disabled', true);
            
            console.log('Loading disposal methods...');
            console.log('Method select element:', methodSelect);
            console.log('Method select length:', methodSelect.length);
            
            fetch('/admin/disposal-methods', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(resp => {
                if (!resp.ok) {
                    throw new Error(`HTTP ${resp.status}: ${resp.statusText}`);
                }
                return resp.json();
            })
            .then(data => {
                console.log('Disposal methods response:', data);
                console.log('Response structure analysis:', {
                    status: data.status,
                    hasData: !!data.data,
                    dataType: typeof data.data,
                    dataLength: data.data ? data.data.length : 'N/A',
                    firstItem: data.data && data.data.length > 0 ? data.data[0] : 'No items',
                    allKeys: data.data && data.data.length > 0 ? Object.keys(data.data[0]) : 'No keys'
                });
                
                if (data.status == 'success' && data.data && data.data.length > 0) {
                    // Clear loading message and populate with actual methods
                    methodSelect.html('<option value="">Select Method</option>');
                    
                    console.log('Processing disposal methods:', data.data);
                    
                    data.data.forEach((method, index) => {
                        console.log(`Processing method ${index + 1}:`, method);
                        
                        // Try different possible ID field names
                        let methodId = method.id || method.disposal_method_id || method.method_id || method.ID;
                        
                        // If still no ID, use the array index + 1 as fallback
                        if (!methodId) {
                            methodId = index + 1;
                            console.warn(`No ID found for method, using index: ${methodId}`, method);
                        }
                        
                        // Ensure methodId is a number
                        methodId = parseInt(methodId, 10);
                        if (isNaN(methodId)) {
                            console.error('Invalid method ID after parsing:', method);
                            return;
                        }
                        
                        // Try different possible name field names
                        const methodName = method.method_name || method.name || method.disposal_method || method.title || `Method ${methodId}`;
                        
                        // Use jQuery to append option
                        const optionHtml = `<option value="${methodId}" data-method-id="${methodId}">${methodName}</option>`;
                        methodSelect.append(optionHtml);
                        
                        console.log('Successfully added option:', {
                            id: methodId,
                            name: methodName,
                            html: optionHtml
                        });
                    });
                    
                    methodSelect.prop('disabled', false);
                    console.log('Disposal methods loaded successfully. Total options:', methodSelect.find('option').length);
                    console.log('Final select HTML:', methodSelect.html());
                    console.log('All options:', methodSelect.find('option').map(function() { return {value: this.value, text: this.text}; }).get());
                } else {
                    console.warn('No disposal methods found in response, creating defaults...');
                    
                    // Create default disposal methods automatically
                    createDefaultDisposalMethods().then(() => {
                        // Retry loading after creating defaults
                        setTimeout(() => {
                            console.log('Retrying disposal methods load after creating defaults...');
                            refreshDisposalMethods();
                        }, 1000);
                    });
                    
                    // Show fallback methods immediately
                    const fallbackMethods = [
                        { id: 1, name: 'Recycling' },
                        { id: 2, name: 'Incineration' },
                        { id: 3, name: 'Landfill' },
                        { id: 4, name: 'Third-party Contractor' }
                    ];
                    
                    let fallbackHtml = '<option value="">Select Method (Using Defaults)</option>';
                    fallbackMethods.forEach(method => {
                        fallbackHtml += `<option value="${method.id}" data-fallback="true">${method.name}</option>`;
                    });
                    
                    methodSelect.html(fallbackHtml);
                    methodSelect.prop('disabled', false);
                    
                    console.log('Added fallback disposal methods');
                }
            })
            .catch(err => {
                console.error('Error loading disposal methods:', err);
                
                // Show detailed error information
                console.error('Fetch error details:', {
                    message: err.message,
                    stack: err.stack,
                    url: '/admin/disposal-methods',
                    timestamp: new Date().toISOString()
                });
                
                // Provide fallback options if API fails
                methodSelect.empty();
                
                const fallbackMethods = [
                    { id: 1, name: 'Recycling' },
                    { id: 2, name: 'Incineration' },
                    { id: 3, name: 'Landfill' },
                    { id: 4, name: 'Third-party Contractor' }
                ];
                
                // Add default option and fallback methods using jQuery
                let fallbackHtml = '<option value="">Select Method (Fallback)</option>';
                
                fallbackMethods.forEach(method => {
                    fallbackHtml += `<option value="${method.id}" data-fallback="true">${method.name}</option>`;
                });
                
                methodSelect.html(fallbackHtml);
                
                console.log('Added fallback disposal methods');
                methodSelect.prop('disabled', false);
                
                Swal.fire({
                    icon: 'warning',
                    title: 'API Connection Issue',
                    html: `
                        <p>Could not load disposal methods from server.</p>
                        <p><strong>Error:</strong> ${err.message}</p>
                        <p>Using fallback options. Please verify with administrator.</p>
                    `,
                    confirmButtonText: 'Continue with Fallback'
                });
            });
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
            const quantityHelpText = modal.find('#quantityHelpText');
            
            let batchData = {};
            let totalAvailableQuantity = 0;
            
            // Show total available quantity initially
            availableQtyField.val('Loading...');
            quantityHelpText.text('Loading total available quantity...');
            
            // Fetch batches from API
            console.log('🔍 Fetching batches for material:', companyMaterialId);
            fetch(`/admin/material-batches/${companyMaterialId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                console.log('📡 Batch API response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('📦 Batches API response:', data);
                
                availableQtyField.val(data.available_balance || 0);
                batchSelect.html('<option value="">Select Batch (Required)</option>');
                
                if (data.status === 'success' && data.batches && data.batches.length > 0) {
                    data.batches.forEach(batch => {
                        batchData[batch.batch_no] = batch;
                        batchSelect.append(`<option value="${batch.batch_no}">${batch.batch_no}</option>`);
                    });
                    availableQtyField.val(`${data.available_balance} ${unit}`);
                    quantityHelpText.text(`Total available across all batches (${data.batches.length} batches)`);
                } else {
                    batchSelect.html('<option value="">No batches available</option>');
                    availableQtyField.val('0 ' + unit);
                    quantityHelpText.text('No batches found');
                }
            })
            .catch(err => {
                console.error('Error loading batches:', err);
                batchSelect.html('<option value="">Error loading batches</option>');
                availableQtyField.val('Error loading');
                quantityHelpText.text('Error loading batch data');
            });
            
            // Handle batch selection - get batch-specific quantity like chemicals
            batchSelect.off('change').on('change', function() {
                const batchNo = $(this).val();
                
                if (batchNo && batchData[batchNo]) {
                    // Get batch-specific quantity
                    fetch(`/admin/material-batch-quantity/${companyMaterialId}?batch_no=${batchNo}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            const batchQuantity = data.available_balance;
                            availableQtyField.val(`${batchQuantity} ${unit}`);
                            quantityHelpText.html(`Available in batch <strong>${batchNo}</strong>`);
                            checkoutUnit.val(unit);
                            
                            // Store batch quantity for validation
                            modal.data('current-batch-qty', batchQuantity);
                            modal.data('current-batch-no', batchNo);
                            
                            // Update quantity input max value
                            modal.find('#checkoutQty').attr('max', batchQuantity);
                        }
                    })
                    .catch(err => {
                        console.error('Error getting batch quantity:', err);
                        availableQtyField.val('Error loading batch quantity');
                    });
                } else {
                    // No batch selected - clear stored data
                    modal.removeData('current-batch-qty');
                    modal.removeData('current-batch-no');
                    
                    availableQtyField.val('Select a batch to see available quantity');
                    quantityHelpText.text('Select a batch to see available quantity');
                    checkoutUnit.val(unit);
                    
                    // Remove max limit
                    modal.find('#checkoutQty').removeAttr('max');
                }
            });
            
            // Validate quantity against available stock with batch requirement
            modal.find('#checkoutQty').off('input').on('input', function() {
                const batchNo = batchSelect.val();
                const requestedQty = parseFloat($(this).val());
                const qtyInput = $(this);
                
                // Remove any existing feedback
                qtyInput.removeClass('is-invalid is-valid');
                qtyInput.siblings('.invalid-feedback.qty-validation').remove();
                qtyInput.siblings('.valid-feedback.qty-validation').remove();
                
                // First check if batch is selected (required)
                if (!batchNo) {
                    if (requestedQty > 0) {
                        qtyInput[0].setCustomValidity('Please select a batch first');
                        qtyInput.addClass('is-invalid');
                        
                        const feedback = $(`
                            <div class="invalid-feedback qty-validation">
                                <i class="la la-exclamation-triangle"></i> 
                                Please select a batch before entering quantity
                            </div>
                        `);
                        qtyInput.after(feedback);
                    } else {
                        qtyInput[0].setCustomValidity('');
                    }
                    return;
                }
                
                // Store batch quantity when batch is selected to avoid repeated API calls
                const storedBatchQty = modal.data('current-batch-qty');
                const storedBatchNo = modal.data('current-batch-no');
                
                // Validate against stored batch quantity
                if (batchNo && storedBatchNo === batchNo && storedBatchQty && !isNaN(requestedQty) && requestedQty > 0) {
                    const batchAvailableQty = parseFloat(storedBatchQty);
                    
                    if (requestedQty > batchAvailableQty) {
                        // Exceeds batch stock
                        qtyInput[0].setCustomValidity(`Quantity cannot exceed batch stock (${batchAvailableQty})`);
                        qtyInput.addClass('is-invalid');
                        
                        const feedback = $(`
                            <div class="invalid-feedback qty-validation">
                                <i class="la la-exclamation-triangle"></i> 
                                Maximum in this batch: <strong>${batchAvailableQty} ${unit}</strong>
                                <br>You're requesting <strong>${isNaN(requestedQty - batchAvailableQty) ? '0.00' : (requestedQty - batchAvailableQty).toFixed(2)} ${unit}</strong> more than available in this batch.
                            </div>
                        `);
                        qtyInput.after(feedback);
                    } else {
                        // Valid quantity
                        qtyInput[0].setCustomValidity('');
                        qtyInput.addClass('is-valid');
                        
                        const remaining = batchAvailableQty - requestedQty;
                        const feedback = $(`
                            <div class="valid-feedback qty-validation">
                                <i class="la la-check-circle"></i> 
                                Valid quantity from batch <strong>${batchNo}</strong>
                                <br>Remaining in batch: <strong>${isNaN(remaining) ? '0.00' : remaining.toFixed(2)} ${unit}</strong>
                            </div>
                        `);
                        qtyInput.after(feedback);
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
// Global function for loading material adjustment batches (chemical-style)
async function loadMaterialAdjustmentBatches(companyMaterialId, unit) {
    try {
        console.log('🔄 Loading adjustment batches for material:', companyMaterialId);
        
        const batchSelect = document.getElementById('materialAdjustmentBatch');
        const totalQtyInput = document.getElementById('adjustmentTotalQty');
        const batchQtyInput = document.getElementById('adjustmentBatchQty');
        
        if (!batchSelect || !totalQtyInput || !batchQtyInput) {
            console.error('❌ Adjustment batch elements not found');
            return;
        }
        
        // Reset and disable while loading
        batchSelect.innerHTML = '<option value="">Loading batches...</option>';
        batchSelect.disabled = true;
        totalQtyInput.value = 'Loading...';
        batchQtyInput.value = '';
        
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
        console.log('📦 Adjustment batches API response:', data);
        
        // Use chemical-style simple approach
        totalQtyInput.value = data.available_balance || 0;
        batchSelect.innerHTML = '<option value="">Select Batch (Required)</option>';
        
        if (data.status === 'success' && data.batches && data.batches.length > 0) {
            let batchData = {};
            data.batches.forEach(batch => {
                batchData[batch.batch_no] = batch;
                const option = document.createElement('option');
                option.value = batch.batch_no;
                option.textContent = batch.batch_no;
                batchSelect.appendChild(option);
            });
            totalQtyInput.value = `${data.available_balance} ${unit}`;
            batchQtyInput.value = 'Select batch first';
            batchSelect.disabled = false;
            
            // Store for later use
            window.materialAdjustmentBatchData = batchData;
            window.materialAdjustmentTotalQty = data.available_balance;
            window.materialAdjustmentBatchCount = data.batches.length;
        } else {
            batchSelect.innerHTML = '<option value="">No batches available</option>';
            batchSelect.disabled = true;
            totalQtyInput.value = `0 ${unit}`;
            batchQtyInput.value = 'No batches available';
        }
        
    } catch (error) {
        console.error('❌ Failed to load adjustment batches:', error);
        
        const batchSelect = document.getElementById('materialAdjustmentBatch');
        const totalQtyInput = document.getElementById('adjustmentTotalQty');
        const batchQtyInput = document.getElementById('adjustmentBatchQty');
        
        if (batchSelect && totalQtyInput && batchQtyInput) {
            batchSelect.innerHTML = '<option value="">Error loading batches</option>';
            batchSelect.disabled = true;
            totalQtyInput.value = 'Error loading data';
            batchQtyInput.value = 'Error loading data';
        }
        
        if (typeof toastr !== 'undefined') {
            toastr.error('Failed to load batches for adjustment.');
        }
    }
}

// Global function for loading material transfer batches (chemical-style)
async function loadMaterialTransferBatches(companyMaterialId, unit) {
    try {
        console.log('🔄 Loading transfer batches for material:', companyMaterialId);
        
        const batchSelect = document.getElementById('materialTransferBatch');
        const availableQtyInput = document.getElementById('materialTransferAvailableQty');
        
        if (!batchSelect || !availableQtyInput) {
            console.error('❌ Transfer batch elements not found');
            return;
        }
        
        // Reset and disable while loading
        batchSelect.innerHTML = '<option value="">Loading batches...</option>';
        batchSelect.disabled = true;
        availableQtyInput.value = 'Loading...';
        
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
        console.log('📦 Transfer batches API response:', data);
        
        batchSelect.innerHTML = '<option value="">Select Batch (Required)</option>';
        
        if (data.status === 'success' && data.batches && data.batches.length > 0) {
            let batchData = {};
            
            console.log('🔍 Raw batch data from API:', data.batches);
            
            data.batches.forEach(batch => {
                const availableQty = parseFloat(batch.available_quantity) || 0;
                
                console.log(`📦 Processing batch ${batch.batch_no}:`, {
                    raw_available_quantity: batch.available_quantity,
                    parsed_available_quantity: availableQty
                });
                
                batchData[batch.batch_no] = {
                    batch_no: batch.batch_no,
                    available_quantity: availableQty,
                    unit: unit
                };
                
                const option = document.createElement('option');
                option.value = batch.batch_no;
                option.textContent = `${batch.batch_no} (${availableQty} ${unit})`;
                batchSelect.appendChild(option);
            });
            
            // Show total available quantity initially (will change to batch-specific when batch is selected)
            availableQtyInput.value = `Total: ${data.available_balance || 0} ${unit}`;
            batchSelect.disabled = false;
            
            // Store batch data globally for easy access
            window.materialTransferBatchData = batchData;
            
            console.log('📦 Final stored batch data:', batchData);
        } else {
            batchSelect.innerHTML = '<option value="">No batches available</option>';
            batchSelect.disabled = true;
            availableQtyInput.value = `0 ${unit}`;
        }
        
    } catch (error) {
        console.error('❌ Failed to load transfer batches:', error);
        
        const batchSelect = document.getElementById('materialTransferBatch');
        const availableQtyInput = document.getElementById('materialTransferAvailableQty');
        
        if (batchSelect && availableQtyInput) {
            batchSelect.innerHTML = '<option value="">Error loading batches</option>';
            batchSelect.disabled = true;
            availableQtyInput.value = 'Error loading data';
        }
        
        if (typeof toastr !== 'undefined') {
            toastr.error('Failed to load batches for transfer.');
        }
    }
}

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
                    option.textContent = `${batch.batch_no} (${Math.round(batch.available_quantity)} available) - ${batch.check_in_date}`;
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
    
    // Handle material adjustment batch selection (chemical-style)
    $(document).on('change', '#materialAdjustmentBatch', function() {
        const batchNo = $(this).val();
        const totalQtyInput = document.getElementById('adjustmentTotalQty');
        const totalQtyLabel = document.getElementById('adjustmentQtyLabel');
        const totalQtyHelpText = document.getElementById('adjustmentQtyHelpText');
        const batchQtyInput = document.getElementById('adjustmentBatchQty');
        const adjustmentQtyInput = document.getElementById('materialAdjustmentQuantity');
        const unit = document.getElementById('materialAdjustmentUnit').value || '';
        
        if (batchNo && window.materialAdjustmentBatchData && window.materialAdjustmentBatchData[batchNo]) {
            // Get batch-specific quantity via API like chemicals do
            const companyMaterialId = $('[name=company_material_id]').val();
            
            fetch(`/admin/material-batch-quantity/${companyMaterialId}?batch_no=${batchNo}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const availableQty = data.available_balance;
                    
                    // Switch to batch-specific display
                    totalQtyLabel.textContent = 'Available Quantity';
                    totalQtyInput.value = `${availableQty} ${unit}`;
                    totalQtyHelpText.innerHTML = `Available in batch <strong>${batchNo}</strong>`;
                    
                    // Update batch quantity field
                    batchQtyInput.value = `${availableQty} available`;
                    
                    console.log('📊 Adjustment batch selected:', {
                        batchNo: batchNo,
                        availableQty: availableQty
                    });
                }
            })
            .catch(err => {
                console.error('Error getting batch quantity for adjustment:', err);
                batchQtyInput.value = 'Error loading batch quantity';
            });
        } else {
            // Reset to total quantity display
            const totalAvailable = window.materialAdjustmentTotalQty || 0;
            const totalBatches = window.materialAdjustmentBatchCount || 0;
            
            totalQtyLabel.textContent = 'Total Available Quantity';
            totalQtyInput.value = `${totalAvailable} ${unit}`;
            totalQtyHelpText.textContent = `Total across all batches (${totalBatches} batches)`;
            
            // Reset batch quantity field
            batchQtyInput.value = 'Select batch first';
        }
        
        // Clear adjustment quantity when batch changes
        if (adjustmentQtyInput) {
            adjustmentQtyInput.value = '';
            adjustmentQtyInput.classList.remove('is-invalid', 'is-valid');
            
            // Remove any existing feedback
            const feedback = adjustmentQtyInput.parentNode.querySelector('.invalid-feedback.qty-validation, .valid-feedback.qty-validation');
            if (feedback) {
                feedback.remove();
            }
        }
    });
    
    // Validate adjustment quantity
    $(document).on('input', '#materialAdjustmentQuantity', function() {
        const batchSelect = document.getElementById('materialAdjustmentBatch');
        const adjustmentType = document.getElementById('materialAdjustmentType').value;
        const requestedQty = parseFloat(this.value);
        const qtyInput = this;
        
        // Remove any existing feedback
        qtyInput.classList.remove('is-invalid', 'is-valid');
        const existingFeedback = qtyInput.parentNode.querySelector('.invalid-feedback.qty-validation, .valid-feedback.qty-validation');
        if (existingFeedback) {
            existingFeedback.remove();
        }
        
        // Check if batch is selected
        if (!batchSelect.value) {
            if (requestedQty > 0) {
                qtyInput.setCustomValidity('Please select a batch first');
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = '<i class="la la-exclamation-triangle"></i> Please select a batch before entering quantity';
                qtyInput.parentNode.appendChild(feedback);
            } else {
                qtyInput.setCustomValidity('');
            }
            return;
        }
        
        // Check if adjustment type is selected
        if (!adjustmentType) {
            if (requestedQty > 0) {
                qtyInput.setCustomValidity('Please select adjustment type first');
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = '<i class="la la-exclamation-triangle"></i> Please select adjustment type first';
                qtyInput.parentNode.appendChild(feedback);
            } else {
                qtyInput.setCustomValidity('');
            }
            return;
        }
        
        // Validate against batch quantity for decrease
        if (adjustmentType === 'decrease' && batchSelect.value && !isNaN(requestedQty)) {
            // Get current batch quantity from the displayed value
            const totalQtyInput = document.getElementById('adjustmentTotalQty');
            const currentQtyText = totalQtyInput.value;
            const availableQty = parseFloat(currentQtyText.split(' ')[0]) || 0;
            
            if (requestedQty > availableQty) {
                qtyInput.setCustomValidity(`Cannot decrease more than available quantity (${availableQty})`);
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = `<i class="la la-exclamation-triangle"></i> Maximum decrease: <strong>${isNaN(availableQty) ? '0.00' : availableQty.toFixed(2)}</strong><br>You're trying to decrease by <strong>${isNaN(requestedQty - availableQty) ? '0.00' : (requestedQty - availableQty).toFixed(2)}</strong> more than available.`;
                qtyInput.parentNode.appendChild(feedback);
            } else if (requestedQty > 0) {
                qtyInput.setCustomValidity('');
                qtyInput.classList.add('is-valid');
                
                const remaining = availableQty - requestedQty;
                const feedback = document.createElement('div');
                feedback.className = 'valid-feedback qty-validation';
                feedback.innerHTML = `<i class="la la-check-circle"></i> Valid ${adjustmentType}. Remaining after adjustment: <strong>${isNaN(remaining) ? '0.00' : remaining.toFixed(2)}</strong>`;
                qtyInput.parentNode.appendChild(feedback);
            } else {
                qtyInput.setCustomValidity('');
            }
        } else if (adjustmentType === 'increase' && requestedQty > 0) {
            qtyInput.setCustomValidity('');
            qtyInput.classList.add('is-valid');
            
            // Get current batch quantity from the displayed value
            const totalQtyInput = document.getElementById('adjustmentTotalQty');
            const currentQtyText = totalQtyInput.value;
            const availableQty = parseFloat(currentQtyText.split(' ')[0]) || 0;
            const newTotal = availableQty + requestedQty;
            
            const feedback = document.createElement('div');
            feedback.className = 'valid-feedback qty-validation';
            feedback.innerHTML = `<i class="la la-check-circle"></i> Valid ${adjustmentType}. New quantity after adjustment: <strong>${isNaN(newTotal) ? '0.00' : newTotal.toFixed(2)}</strong>`;
            qtyInput.parentNode.appendChild(feedback);
        } else {
            qtyInput.setCustomValidity('');
        }
    });
    
    // Trigger validation when adjustment type changes
    $(document).on('change', '#materialAdjustmentType', function() {
        const qtyInput = document.getElementById('materialAdjustmentQuantity');
        if (qtyInput && qtyInput.value) {
            $(qtyInput).trigger('input');
        }
    });

    // Handle material transfer batch selection (chemical-style)
    $(document).on('change', '#materialTransferBatch', function() {
        const batchNo = $(this).val();
        const availableQtyInput = document.getElementById('materialTransferAvailableQty');
        const transferQtyInput = document.getElementById('transferMaterialQuantity');
        const unit = document.getElementById('transferMaterialUnit').value || '';
        
        console.log('🔄 Batch selection changed:', batchNo);
        
        if (batchNo && window.materialTransferBatchData && window.materialTransferBatchData[batchNo]) {
            // Get batch-specific quantity from cached data
            const batchData = window.materialTransferBatchData[batchNo];
            const availableQty = batchData.available_quantity;
            
            console.log('📊 Using cached batch data:', batchData);
            
            // Update available quantity display to show ONLY the batch-specific quantity
            availableQtyInput.value = `${availableQty} ${unit}`;
            
            // Update quantity input constraints
            if (transferQtyInput) {
                transferQtyInput.max = availableQty;
                transferQtyInput.placeholder = `Max: ${availableQty} ${unit}`;
            }
            
            console.log('✅ Updated display to batch-specific quantity:', availableQty);
            
        } else if (batchNo) {
            // Fallback: fetch batch quantity via API if not in cache
            console.log('⚠️ Batch data not in cache, fetching from API...');
            
            const companyMaterialId = $('[name=company_material_id]').val();
            availableQtyInput.value = 'Loading...';
            
            fetch(`/admin/material-batch-quantity/${companyMaterialId}?batch_no=${batchNo}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const availableQty = parseFloat(data.available_balance) || 0;
                    
                    // Update available quantity display to show batch-specific quantity
                    availableQtyInput.value = `${availableQty} ${unit}`;
                    
                    if (transferQtyInput) {
                        transferQtyInput.max = availableQty;
                        transferQtyInput.placeholder = `Max: ${availableQty} ${unit}`;
                    }
                    
                    console.log('✅ Updated from API - batch quantity:', availableQty);
                } else {
                    availableQtyInput.value = 'Error loading quantity';
                }
            })
            .catch(err => {
                console.error('❌ Error fetching batch quantity:', err);
                availableQtyInput.value = 'Error loading quantity';
            });
            
        } else {
            // No batch selected - reset to initial state
            availableQtyInput.value = 'Select batch first';
            if (transferQtyInput) {
                transferQtyInput.removeAttribute('max');
                transferQtyInput.placeholder = 'Enter quantity';
            }
            console.log('🔄 Reset to initial state - no batch selected');
        }
        
        // Clear transfer quantity when batch changes
        if (transferQtyInput) {
            transferQtyInput.value = '';
            transferQtyInput.classList.remove('is-invalid', 'is-valid');
            
            // Remove any existing feedback
            const feedback = transferQtyInput.parentNode.querySelector('.invalid-feedback.qty-validation, .valid-feedback.qty-validation');
            if (feedback) {
                feedback.remove();
            }
        }
    });

    // Validate transfer quantity (chemical-style)
    $(document).on('input', '#transferMaterialQuantity', function() {
        const batchSelect = document.getElementById('materialTransferBatch');
        const requestedQty = parseFloat(this.value);
        const qtyInput = this;
        
        // Remove any existing feedback
        qtyInput.classList.remove('is-invalid', 'is-valid');
        const existingFeedback = qtyInput.parentNode.querySelector('.invalid-feedback.qty-validation, .valid-feedback.qty-validation');
        if (existingFeedback) {
            existingFeedback.remove();
        }
        
        // Check if batch is selected
        if (!batchSelect.value) {
            if (requestedQty > 0) {
                qtyInput.setCustomValidity('Please select a batch first');
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = '<i class="la la-exclamation-triangle"></i> Please select a batch before entering quantity';
                qtyInput.parentNode.appendChild(feedback);
            } else {
                qtyInput.setCustomValidity('');
            }
            return;
        }
        
        // Get current batch quantity from the available quantity display
        if (batchSelect.value && !isNaN(requestedQty) && requestedQty > 0) {
            const availableQtyInput = document.getElementById('materialTransferAvailableQty');
            const availableQtyText = availableQtyInput.value || '';
            
            // Parse available quantity more safely
            let availableQty = 0;
            if (availableQtyText && availableQtyText !== 'Select batch first' && availableQtyText !== 'Error loading batch quantity') {
                const qtyMatch = availableQtyText.match(/^(\d+(?:\.\d+)?)/);
                availableQty = qtyMatch ? parseFloat(qtyMatch[1]) : 0;
            }
            
            const batchNo = batchSelect.value || 'undefined';
            
            if (availableQty <= 0) {
                qtyInput.setCustomValidity('No quantity available in selected batch');
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = '<i class="la la-exclamation-triangle"></i> No quantity available in selected batch';
                qtyInput.parentNode.appendChild(feedback);
            } else if (requestedQty > availableQty) {
                qtyInput.setCustomValidity(`Cannot transfer more than available quantity (${availableQty})`);
                qtyInput.classList.add('is-invalid');
                
                const feedback = document.createElement('div');
                feedback.className = 'invalid-feedback qty-validation';
                feedback.innerHTML = `<i class="la la-exclamation-triangle"></i> Maximum available: <strong>${isNaN(availableQty) ? '0.00' : availableQty.toFixed(2)}</strong><br>You're trying to transfer <strong>${isNaN(requestedQty - availableQty) ? '0.00' : (requestedQty - availableQty).toFixed(2)}</strong> more than available.`;
                qtyInput.parentNode.appendChild(feedback);
            } else {
                qtyInput.setCustomValidity('');
                qtyInput.classList.add('is-valid');
                
                const remaining = availableQty - requestedQty;
                const feedback = document.createElement('div');
                feedback.className = 'valid-feedback qty-validation';
                feedback.innerHTML = `<i class="la la-check-circle"></i> Valid transfer from batch <strong>${batchNo}</strong>. Remaining: <strong>${isNaN(remaining) ? '0.00' : remaining.toFixed(2)}</strong>`;
                qtyInput.parentNode.appendChild(feedback);
            }
        } else {
            qtyInput.setCustomValidity('');
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
                                                        <div class="col-6 text-warning"><strong>${isNaN(shortage) ? '0.00' : shortage.toFixed(2)} ${unit}</strong></div>
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
                                                                <strong>Option 2:</strong> Check-in ${isNaN(shortage) ? '0.00' : shortage.toFixed(2)} more ${unit} first
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            `,
                                            width: '500px',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            confirmButtonText: `<i class="la la-check"></i> Use ${availableBalance} ${unit}`,
                                            denyButtonText: `<i class="la la-plus"></i> Check-In ${isNaN(shortage) ? '0.00' : shortage.toFixed(2)} More`,
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
                    
                    // Clear any cached batch data to force fresh reload
                    window.materialAdjustmentBatchData = null;
                    window.materialAdjustmentTotalQty = null;
                    window.materialAdjustmentBatchCount = null;
                    
                    // Clear any checkout modal batch data if it exists
                    if (window.materialCheckoutBatchData) {
                        window.materialCheckoutBatchData = null;
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
                    
                    // Refresh the materials table
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                    
                    // Clear any cached batch data to force fresh reload
                    window.materialAdjustmentBatchData = null;
                    window.materialAdjustmentTotalQty = null;
                    window.materialAdjustmentBatchCount = null;
                    
                    // Clear any checkout modal batch data if it exists
                    if (window.materialCheckoutBatchData) {
                        window.materialCheckoutBatchData = null;
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
    
    // Material Adjustment Form Handler (following chemical pattern)
    const materialAdjustmentForm = document.querySelector("#materialAdjustmentForm");
    if (materialAdjustmentForm) {
        materialAdjustmentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            materialAdjustmentForm.classList.add('was-validated');

            if (!materialAdjustmentForm.checkValidity()) {
                return;
            }

            const formData = new FormData(materialAdjustmentForm);
            
            // Debug form data
            console.log('Material adjustment form data:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            fetch(`{{ route('admin.save-company-material-adjustment') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(async res => {
                console.log('Adjustment response status:', res.status);
                
                const responseText = await res.text();
                console.log('Adjustment raw response:', responseText);
                
                if (!res.ok) {
                    if (res.status === 422) {
                        try {
                            const errorData = JSON.parse(responseText);
                            console.log('Adjustment validation errors:', errorData);
                            
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
                        return { status: 'success', message: 'Material adjustment recorded successfully' };
                    }
                    throw new Error('Invalid JSON response from server');
                }
            })
            .then(data => {
                console.log('Adjustment response:', data);
                
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Adjustment Applied',
                        text: data.message || 'Material adjustment recorded successfully.'
                    });
                    $('#materialAdjustmentModal').modal('hide');
                    
                    // Refresh the materials table
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                    
                    // Clear any cached batch data to force fresh reload
                    window.materialAdjustmentBatchData = null;
                    window.materialAdjustmentTotalQty = null;
                    window.materialAdjustmentBatchCount = null;
                    
                    // Clear any checkout modal batch data if it exists
                    if (window.materialCheckoutBatchData) {
                        window.materialCheckoutBatchData = null;
                    }
                    
                    materialAdjustmentForm.reset();
                    materialAdjustmentForm.classList.remove('was-validated');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Something went wrong.'
                    });
                }
            })
            .catch(err => {
                console.error('Adjustment error:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Request Failed',
                    text: `Error: ${err.message}`
                });
            });
        });
    }
    
    // Material Transfer Form Handler (following chemical pattern)
    const materialTransferForm = document.querySelector("#materialTransferForm");
    if (materialTransferForm) {
        materialTransferForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            materialTransferForm.classList.add('was-validated');

            if (!materialTransferForm.checkValidity()) {
                return;
            }

            const formData = new FormData(materialTransferForm);
            
            // Debug form data
            console.log('Material transfer form data:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            fetch(`{{ route('admin.save-company-material-transfer') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(async res => {
                console.log('Transfer response status:', res.status);
                
                const responseText = await res.text();
                console.log('Transfer raw response:', responseText);
                
                if (!res.ok) {
                    if (res.status === 422) {
                        try {
                            const errorData = JSON.parse(responseText);
                            console.log('Transfer validation errors:', errorData);
                            
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
                        return { status: 'success', message: 'Material transfer completed successfully' };
                    }
                    throw new Error('Invalid JSON response from server');
                }
            })
            .then(data => {
                console.log('Transfer response:', data);
                
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Transfer Completed',
                        text: data.message || 'Material transfer completed successfully.'
                    });
                    $('#materialTransferModal').modal('hide');
                    
                    // Refresh the materials table
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                    
                    // Clear any cached batch data to force fresh reload
                    window.materialAdjustmentBatchData = null;
                    window.materialAdjustmentTotalQty = null;
                    window.materialAdjustmentBatchCount = null;
                    window.materialTransferBatchData = null;
                    
                    // Clear any checkout modal batch data if it exists
                    if (window.materialCheckoutBatchData) {
                        window.materialCheckoutBatchData = null;
                    }
                    
                    materialTransferForm.reset();
                    materialTransferForm.classList.remove('was-validated');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Something went wrong.'
                    });
                }
            })
            .catch(err => {
                console.error('Transfer error:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Request Failed',
                    text: `Error: ${err.message}`
                });
            });
        });
    }
    
    // Material Disposal Form Handler (following chemical pattern)
    const materialDisposalForm = document.querySelector("#materialDisposalForm");
    if (materialDisposalForm) {
        materialDisposalForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            materialDisposalForm.classList.add('was-validated');

            if (!materialDisposalForm.checkValidity()) {
                return;
            }

            // Additional validation for disposal method
            const disposalMethodField = materialDisposalForm.querySelector('[name="method"]');
            const batchNoField = materialDisposalForm.querySelector('[name="batch_no"]');
            const reasonField = materialDisposalForm.querySelector('[name="reason"]');
            
            const disposalMethod = disposalMethodField ? disposalMethodField.value : '';
            const batchNo = batchNoField ? batchNoField.value : '';
            const reason = reasonField ? reasonField.value : '';
            
            console.log('Validation check:', {
                disposalMethod: disposalMethod,
                batchNo: batchNo,
                reason: reason,
                disposalMethodType: typeof disposalMethod,
                isDisposalMethodEmpty: !disposalMethod || disposalMethod === '',
                isDisposalMethodNaN: isNaN(disposalMethod)
            });
            
            if (!disposalMethod || disposalMethod === '' || disposalMethod === 'Loading disposal methods...' || disposalMethod === 'No disposal methods available' || disposalMethod === 'Error loading disposal methods') {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select a valid disposal method before submitting.'
                });
                return;
            }
            
            if (!batchNo || batchNo === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select a batch before submitting.'
                });
                return;
            }
            
            if (!reason || reason === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select a disposal reason before submitting.'
                });
                return;
            }

            // Create FormData and ensure method is sent as a number
            const formData = new FormData(materialDisposalForm);
            
            // Convert method to number if it exists
            const methodValue = disposalMethodField.value;
            if (methodValue && methodValue !== '') {
                // Remove the string value and add as number
                formData.delete('method');
                const methodNumber = parseInt(methodValue, 10);
                if (!isNaN(methodNumber)) {
                    formData.append('method', methodNumber.toString());
                    console.log('Method converted to number:', methodNumber);
                } else {
                    console.error('Method value is not a valid number:', methodValue);
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Disposal Method',
                        text: 'The selected disposal method is invalid. Please try selecting again.'
                    });
                    return;
                }
            }
            
            // Debug form data
            console.log('Material disposal form data (after processing):');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value} (type: ${typeof value})`);
            }
            
            // Additional debugging for disposal method
            const methodField = materialDisposalForm.querySelector('[name="method"]');
            console.log('Disposal method debugging:', {
                field: methodField,
                originalValue: methodField ? methodField.value : 'Field not found',
                selectedIndex: methodField ? methodField.selectedIndex : 'No field',
                processedValue: formData.get('method'),
                allOptions: methodField ? Array.from(methodField.options).map(opt => ({
                    value: opt.value, 
                    text: opt.text, 
                    selected: opt.selected,
                    valueType: typeof opt.value
                })) : 'No options'
            });

            fetch(`{{ route('admin.save-company-material-disposal') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(async res => {
                console.log('Disposal response status:', res.status);
                
                const responseText = await res.text();
                console.log('Disposal raw response:', responseText);
                
                if (!res.ok) {
                    if (res.status === 422) {
                        try {
                            const errorData = JSON.parse(responseText);
                            console.log('Disposal validation errors:', errorData);
                            
                            // Handle specific disposal quantity error
                            if (errorData.message && errorData.message.includes('exceeds available batch stock') && errorData.batch_balance !== undefined) {
                                const requestedQty = formData.get('quantity');
                                const availableQty = errorData.batch_balance;
                                const batchNo = formData.get('batch_no');
                                const unit = materialDisposalForm.querySelector('#disposalMaterialUnit').value || 'units';
                                
                                Swal.fire({
                                    icon: "warning",
                                    title: "Insufficient Stock for Disposal",
                                    html: `
                                        <div class="text-start">
                                            <p><strong>Batch:</strong> ${batchNo}</p>
                                            <p><strong>Available Stock:</strong> <span class="text-success">${availableQty} ${unit}</span></p>
                                            <p><strong>Requested Disposal:</strong> <span class="text-danger">${requestedQty} ${unit}</span></p>
                                            <p><strong>Excess Amount:</strong> <span class="text-warning">${(parseFloat(requestedQty) - parseFloat(availableQty)).toFixed(2)} ${unit}</span></p>
                                            <hr>
                                            <p class="text-muted"><small>Please reduce the disposal quantity to ${availableQty} ${unit} or less.</small></p>
                                        </div>
                                    `,
                                    showCancelButton: true,
                                    confirmButtonText: 'Adjust Quantity',
                                    cancelButtonText: 'Cancel',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Auto-fill with maximum available quantity
                                        const quantityInput = materialDisposalForm.querySelector('[name="quantity"]');
                                        if (quantityInput) {
                                            quantityInput.value = availableQty;
                                            quantityInput.focus();
                                            quantityInput.select();
                                        }
                                    }
                                });
                                return;
                            }
                            
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
                        return { status: 'success', message: 'Material disposal recorded successfully' };
                    }
                    throw new Error('Invalid JSON response from server');
                }
            })
            .then(data => {
                console.log('Disposal response:', data);
                
                if (data.status === 'success') {
                    // Show simple success message with just the disposed quantity
                    const disposalDetails = data.disposal_details;
                    let successMessage = data.message || 'Material disposal recorded successfully.';
                    
                    if (disposalDetails) {
                        const unit = materialDisposalForm.querySelector('#disposalMaterialUnit').value || 'units';
                        const materialName = materialDisposalForm.querySelector('#disposalMaterialName').value || 'Material';
                        successMessage = `${disposalDetails.quantity_disposed} ${unit} of ${materialName} disposed successfully.`;
                    }
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Disposal Recorded',
                        text: successMessage,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('#materialDisposalModal').modal('hide');
                    
                    // Refresh the materials table
                    if ($.fn.DataTable.isDataTable('#materialTable')) {
                        $('#materialTable').DataTable().ajax.reload(null, false);
                    }
                    
                    // Clear any cached batch data to force fresh reload
                    window.materialAdjustmentBatchData = null;
                    window.materialAdjustmentTotalQty = null;
                    window.materialAdjustmentBatchCount = null;
                    window.materialTransferBatchData = null;
                    
                    // Clear any checkout modal batch data if it exists
                    if (window.materialCheckoutBatchData) {
                        window.materialCheckoutBatchData = null;
                    }
                    
                    materialDisposalForm.reset();
                    materialDisposalForm.classList.remove('was-validated');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Something went wrong.'
                    });
                }
            })
            .catch(err => {
                console.error('Disposal error:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Request Failed',
                    text: `Error: ${err.message}`
                });
            });
        });
    }
    
    // Add real-time validation for disposal quantity
    $(document).on('input', '#disposalMaterialQuantity', function() {
        const quantityInput = $(this);
        const requestedQty = parseFloat(quantityInput.val());
        const batchSelect = $('#disposalMaterialBatch');
        const selectedBatch = batchSelect.val();
        
        // Remove existing validation feedback
        quantityInput.removeClass('is-invalid is-valid');
        quantityInput.siblings('.invalid-feedback.qty-validation, .valid-feedback.qty-validation').remove();
        
        if (!selectedBatch || !requestedQty || isNaN(requestedQty)) {
            return;
        }
        
        // Get available quantity for the selected batch
        const companyMaterialId = $('[name="company_material_id"]').val();
        if (companyMaterialId && selectedBatch) {
            fetch(`/admin/material-batch-quantity/${companyMaterialId}?batch_no=${selectedBatch}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const availableQty = parseFloat(data.available_balance);
                    const unit = $('#disposalMaterialUnit').val() || 'units';
                    
                    if (requestedQty > availableQty) {
                        // Show error
                        quantityInput.addClass('is-invalid');
                        const excess = (requestedQty - availableQty).toFixed(2);
                        const feedback = $(`
                            <div class="invalid-feedback qty-validation">
                                <i class="la la-exclamation-triangle"></i> 
                                <strong>Exceeds available stock!</strong><br>
                                Available: <strong>${availableQty} ${unit}</strong><br>
                                Excess: <strong>${excess} ${unit}</strong>
                            </div>
                        `);
                        quantityInput.after(feedback);
                    } else if (requestedQty > 0) {
                        // Show success
                        quantityInput.addClass('is-valid');
                        const remaining = (availableQty - requestedQty).toFixed(2);
                        const feedback = $(`
                            <div class="valid-feedback qty-validation">
                                <i class="la la-check-circle"></i> 
                                Valid disposal quantity<br>
                                Remaining after disposal: <strong>${remaining} ${unit}</strong>
                            </div>
                        `);
                        quantityInput.after(feedback);
                    }
                }
            })
            .catch(err => {
                console.error('Error validating disposal quantity:', err);
            });
        }
    });
    
    // Validate quantity when batch changes
    $(document).on('change', '#disposalMaterialBatch', function() {
        const quantityInput = $('#disposalMaterialQuantity');
        if (quantityInput.val()) {
            quantityInput.trigger('input');
        }
    });
    
    // Add event listener for refresh button
    $(document).on('click', '#refreshDisposalMethodsBtn', function() {
        console.log('🔄 Manual refresh button clicked');
        refreshDisposalMethods();
    });
    
    // Add event listener for disposal method selection debugging
    $(document).on('change', '#materialDisposalMethod', function() {
        const selectedValue = $(this).val();
        const selectedText = $(this).find('option:selected').text();
        const selectedOption = $(this).find('option:selected')[0];
        
        console.log('Disposal method changed:', {
            value: selectedValue,
            text: selectedText,
            type: typeof selectedValue,
            isNumber: !isNaN(selectedValue) && selectedValue !== '',
            parsedInt: parseInt(selectedValue, 10),
            option: selectedOption,
            isFallback: selectedOption ? selectedOption.hasAttribute('data-fallback') : false
        });
    });
    
    // Test disposal methods API on page load
    function testDisposalMethodsAPI() {
        console.log('🔍 Testing disposal methods API...');
        
        const startTime = performance.now();
        
        fetch('/admin/disposal-methods', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(resp => {
            const endTime = performance.now();
            const duration = Math.round(endTime - startTime);
            
            console.log(`📡 API Response received in ${duration}ms:`, {
                status: resp.status,
                statusText: resp.statusText,
                ok: resp.ok,
                headers: Object.fromEntries(resp.headers.entries())
            });
            
            if (!resp.ok) {
                throw new Error(`HTTP ${resp.status}: ${resp.statusText}`);
            }
            
            return resp.json();
        })
        .then(data => {
            console.log('📊 Disposal methods API test result:', data);
            
            if (data.status === 'success' && data.data && Array.isArray(data.data)) {
                console.log(`✅ Disposal methods API is working. Found ${data.data.length} methods:`);
                data.data.forEach((method, index) => {
                    console.log(`  ${index + 1}. ID: ${method.id}, Name: ${method.method_name}`);
                });
            } else {
                console.warn('⚠️ Disposal methods API returned unexpected data structure:', data);
            }
        })
        .catch(err => {
            console.error('❌ Disposal methods API test failed:', {
                error: err.message,
                stack: err.stack,
                url: '/admin/disposal-methods'
            });
        });
    }
    
    // Run API test when page loads
    $(document).ready(function() {
        testDisposalMethodsAPI();
        
        // Also test if we can create some default disposal methods
        setTimeout(() => {
            checkAndCreateDisposalMethods();
        }, 2000);
        
        // Add a simple test button to console for manual testing
        console.log('💡 Manual test commands available:');
        console.log('  - testDisposalMethodsAPI() : Test the API');
        console.log('  - refreshDisposalMethods() : Refresh disposal methods');
        console.log('  - createDefaultDisposalMethods() : Create default methods');
        console.log('  - checkAndCreateDisposalMethods() : Check and create if needed');
    });
    
    // Function to check and create disposal methods if none exist
    function checkAndCreateDisposalMethods() {
        fetch('/admin/disposal-methods', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(resp => resp.json())
        .then(data => {
            if (data.status === 'success' && (!data.data || data.data.length === 0)) {
                console.log('🔧 No disposal methods found. Creating default methods...');
                createDefaultDisposalMethods();
            }
        })
        .catch(err => {
            console.error('Error checking disposal methods:', err);
        });
    }
    
    // Manual refresh function for disposal methods
    window.refreshDisposalMethods = function() {
        console.log('🔄 Manually refreshing disposal methods...');
        
        const methodSelect = $('#materialDisposalMethod');
        if (methodSelect.length === 0) {
            console.error('❌ Disposal method select not found');
            return;
        }
        
        methodSelect.html('<option value="">Refreshing disposal methods...</option>');
        methodSelect.prop('disabled', true);
        
        fetch('/admin/disposal-methods', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(resp => {
            if (!resp.ok) {
                throw new Error(`HTTP ${resp.status}: ${resp.statusText}`);
            }
            return resp.json();
        })
        .then(data => {
            console.log('🔄 Manual refresh result:', data);
            
            if (data.status === 'success' && data.data && data.data.length > 0) {
                methodSelect.html('<option value="">Select Method</option>');
                
                data.data.forEach(method => {
                    const methodId = parseInt(method.id, 10);
                    if (!isNaN(methodId)) {
                        const optionHtml = `<option value="${methodId}">${method.method_name}</option>`;
                        methodSelect.append(optionHtml);
                    }
                });
                
                methodSelect.prop('disabled', false);
                console.log('✅ Disposal methods refreshed successfully');
                
                Swal.fire({
                    icon: 'success',
                    title: 'Refreshed',
                    text: `Loaded ${data.data.length} disposal methods`,
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                throw new Error('No disposal methods found');
            }
        })
        .catch(err => {
            console.error('❌ Manual refresh failed:', err);
            methodSelect.html('<option value="">Error loading methods</option>');
            
            Swal.fire({
                icon: 'error',
                title: 'Refresh Failed',
                text: err.message,
                confirmButtonText: 'OK'
            });
        });
    };
    
    // Helper function to create default disposal methods if none exist
    function createDefaultDisposalMethods() {
        console.log('Creating default disposal methods...');
        
        const defaultMethods = [
            { method_name: 'Recycling', description: 'Material recycling' },
            { method_name: 'Incineration', description: 'Controlled burning' },
            { method_name: 'Landfill', description: 'Landfill disposal' },
            { method_name: 'Third-party Contractor', description: 'External disposal service' }
        ];
        
        const promises = defaultMethods.map((method, index) => {
            const formData = new FormData();
            formData.append('method_name', method.method_name);
            formData.append('description', method.description);
            
            return fetch('/admin/disposal-methods/store', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(resp => resp.json())
            .then(data => {
                console.log('Created disposal method:', data);
                return data;
            })
            .catch(err => {
                console.error('Failed to create disposal method:', err);
                return null;
            });
        });
        
        return Promise.all(promises);
    }
});
</script>