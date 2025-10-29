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
                    <select name="chemical" class="form-control" required value="${data.chemical || ''}">
                    <option value="" disabled ${!data.chemical ? 'selected' : ''}>Select Chemical</option>
                    @foreach($approved_chemicals as $chemical)
                        <option value="{{ $chemical->chemical_id }}" ${data.chemical == '{{ $chemical->name }}' ? 'selected' : ''}>{{ $chemical->name }}</option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">Please enter the chemical name.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Quantity/Unit</label>
                    <input name="quantity" type="number" step="0.01" class="form-control" required value="${data.quantity || ''}">
                    <div class="invalid-feedback">Please enter a quantity.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Unit</label>
                    <input name="unit" class="form-control" value="${data.unit || ''}">
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
            } else {
                showToast(data.message || 'Operation failed', 'danger');
            }
        } catch (err) {
            console.error(err);
            showToast('An error occurred', 'danger');
        } finally {
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';
            btn.disabled = false;
        }
    });

</script>