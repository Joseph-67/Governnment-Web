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
