<div class="modal fade" id="chemicalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="chemicalModalTitle">Add Chemical</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="chemicalForm" novalidate>
        @csrf
        <input type="hidden" name="operation" id="chemicalOperation" value="add">
        <input type="hidden" name="id" id="chemicalId">
        <input type="hidden" name="chemical_id" id="chemicalIdRef">

        <div class="modal-body" id="chemicalModalBody">
          <!-- Fields dynamically injected here -->
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="chemicalSubmitBtn">
            <span id="chemicalBtnText">Save</span>
            <span id="chemicalBtnLoader" class="spinner-border spinner-border-sm ms-2" role="status" style="display:none;"></span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="checkInModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="inventoryActionForm" action="" method="POST">
      @csrf
      <input type="hidden" name="company_chemical_id">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title"><i class="la la-arrow-down"></i> Check-In Chemical</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Quantity Received</label>
            <input type="number" name="quantity" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Storage Location</label>
            <input type="text" name="to_location" class="form-control" required>
          </div>
          <div class="col-12">
            <label class="form-label">Reference (PO/Batch)</label>
            <input type="text" name="reference_no" class="form-control">
          </div>
          <div class="col-12">
            <label class="form-label">Remarks</label>
            <textarea name="reason" class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success"><i class="la la-save"></i> Record</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="checkOutModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="inventoryActionForm" action="" method="POST">
      @csrf
      <input type="hidden" name="company_chemical_id">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title"><i class="la la-arrow-up"></i> Check-Out Chemical</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Quantity Used</label>
            <input type="number" name="quantity" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Usage Reference (Batch ID)</label>
            <input type="text" name="reference_no" class="form-control">
          </div>
          <div class="col-12">
            <label class="form-label">Remarks</label>
            <textarea name="reason" class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning"><i class="la la-save"></i> Record</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="adjustModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="inventoryActionForm" action="" method="POST">
      @csrf
      <input type="hidden" name="company_chemical_id">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"><i class="la la-sync"></i> Adjust Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">New Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Reason</label>
            <input type="text" name="reason" class="form-control" placeholder="e.g. stock count correction">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary"><i class="la la-save"></i> Apply Adjustment</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="transferModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="inventoryActionForm" action="" method="POST">
      @csrf
      <input type="hidden" name="company_chemical_id">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-white">
          <h5 class="modal-title"><i class="la la-exchange-alt"></i> Transfer Chemical</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">From Location</label>
            <input type="text" name="from_location" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">To Location</label>
            <input type="text" name="to_location" class="form-control" required>
          </div>
          <div class="col-12">
            <label class="form-label">Quantity to Transfer</label>
            <input type="number" name="quantity" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary"><i class="la la-save"></i> Transfer</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="disposeModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="inventoryActionForm" action="" method="POST">
      @csrf
      <input type="hidden" name="company_chemical_id">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title"><i class="la la-trash"></i> Dispose Chemical</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Quantity Disposed</label>
            <input type="number" name="quantity" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Reason</label>
            <input type="text" name="reason" class="form-control" placeholder="Expired / Waste spill">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger"><i class="la la-trash"></i> Confirm Disposal</button>
        </div>
      </div>
    </form>
  </div>
</div>
