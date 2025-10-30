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
                                <li><a class="dropdown-item checkinBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-arrow-down text-success"></i> Check-In</a></li>
                                <li><a class="dropdown-item checkoutBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-arrow-up text-warning"></i> Check-Out</a></li>
                                <li><a class="dropdown-item adjustBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-sync text-primary"></i> Adjustment</a></li>
                                <li><a class="dropdown-item transferBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-exchange-alt text-secondary"></i> Transfer</a></li>
                                <li><a class="dropdown-item disposeBtn" data-id="${row.company_chemical_id}">
                                    <i class="la la-trash text-danger"></i> Disposal</a></li>
                            </ul>
                        </div>
                    `
                }
            ],
            responsive: true,
        });

        // 🔹 Action button handlers
        $(document).on('click', '.checkinBtn', function() {
            $('#checkInModal [name=company_chemical_id]').val($(this).data('id'));
            $('#checkInModal').modal('show');
        });

        $(document).on('click', '.checkoutBtn', function() {
            $('#checkOutModal [name=company_chemical_id]').val($(this).data('id'));
            $('#checkOutModal').modal('show');
        });

        $(document).on('click', '.adjustBtn', function() {
            $('#adjustModal [name=company_chemical_id]').val($(this).data('id'));
            $('#adjustModal').modal('show');
        });

        $(document).on('click', '.transferBtn', function() {
            $('#transferModal [name=company_chemical_id]').val($(this).data('id'));
            $('#transferModal').modal('show');
        });

        $(document).on('click', '.disposeBtn', function() {
            $('#disposeModal [name=company_chemical_id]').val($(this).data('id'));
            $('#disposeModal').modal('show');
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
