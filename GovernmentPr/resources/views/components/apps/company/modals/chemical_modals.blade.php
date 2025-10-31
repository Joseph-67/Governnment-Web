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

<!-- Chemical Check-in Modal -->
<div class="modal fade" id="chemicalCheckInModal" tabindex="-1" aria-labelledby="chemicalCheckInLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="chemicalCheckInLabel"><i class="la la-plus-circle me-1"></i> Chemical Check-In</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="chemicalCheckInForm" class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Chemical</label>
                            <input type="text" name="chemical_name" id="checkInChemicalName" class="form-control" readonly>
                            <input type="hidden" name="company_chemical_id">
                            <input type="hidden" name="chemical_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" min="0.01" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" name="unit" class="form-control" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <div class="input-group">
                                <input type="text" name="batch_no" id="batchNo" class="form-control" placeholder="Auto-generated or enter manually">
                                <button type="button" class="btn btn-outline-secondary" id="generateBatchBtn"><i class="la la-refresh"></i> Generate</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Source</label>
                            <input type="text" name="source" class="form-control" placeholder="e.g., Supplier name or location">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date Received</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2" placeholder="Additional notes..."></textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="la la-save me-1"></i> Save Check-In</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Chemical Checkout Modal -->
<div class="modal fade" id="chemicalCheckoutModal" tabindex="-1" aria-labelledby="chemicalCheckoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="chemicalCheckoutLabel">
                    <i class="la la-minus-circle me-1"></i> Chemical Checkout
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="chemicalCheckoutForm" class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="row g-3">

                        <!-- Chemical -->
                        <div class="col-md-6">
                            <label class="form-label">Chemical</label>
                            <input type="text" name="chemical_name" id="checkInChemicalName" class="form-control" readonly>
                            <input type="hidden" name="company_chemical_id">
                            <input type="hidden" name="chemical_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <select name="batch_no" id="chemicalCheckoutBatch" class="form-select">
                                <option value="">Select Batch</option>
                            </select>
                        </div>

                        <!-- Available Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Available Quantity</label>
                            <input type="text" name="available_quantity" id="availableQty" class="form-control" readonly placeholder="Select batch first">
                        </div>

                        <!-- Checkout Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Checkout</label>
                            <input type="number" name="quantity" id="checkoutQty" class="form-control" min="0.01" step="0.01" required>
                            <div class="invalid-feedback">Enter a valid quantity within available limit.</div>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="checkoutUnit" name="unit" class="form-control" readonly>
                        </div>

                        <!-- Usage Reason -->
                        <div class="col-md-6">
                            <label class="form-label">Usage Reason</label>
                            <select name="usage_reason" class="form-select" required>
                                <option value="">Select Reason</option>
                                <option value="production">Used in Production</option>
                                <option value="transfer">Transferred to Another Site</option>
                                <option value="research">Used for Research</option>
                                <option value="spill">Spill / Loss</option>
                                <option value="expired">Expired / Disposal</option>
                            </select>
                        </div>

                        <!-- Checkout Date -->
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2" placeholder="Notes about this checkout..."></textarea>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning"><i class="la la-save me-1"></i> Confirm Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Chemical Adjustment Modal -->
<div class="modal fade" id="chemicalAdjustmentModal" tabindex="-1" aria-labelledby="chemicalAdjustmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="chemicalAdjustmentLabel">
                    <i class="la la-balance-scale me-1"></i> Inventory Adjustment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="chemicalAdjustmentForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Chemical -->
                        <div class="col-md-6">
                            <label class="form-label">Chemical</label>
                            <input type="text" name="chemical_name" id="adjustmentChemicalName" class="form-control" readonly>
                            <input type="hidden" name="company_chemical_id">
                            <input type="hidden" name="chemical_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <select name="batch_no" id="chemicalAdjustmentBatch" class="form-select">
                                <option value="">Select Batch</option>
                            </select>
                        </div>

                        <!-- Current Qty -->
                        <div class="col-md-6">
                            <label class="form-label">Current Quantity</label>
                            <input type="text" id="chemicalAdjustmentQty" class="form-control" readonly placeholder="Select batch first">
                        </div>

                        <!-- Adjustment Type -->
                        <div class="col-md-6">
                            <label class="form-label">Adjustment Type</label>
                            <select name="adjustment_type" id="adjustType" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="increase">Increase</option>
                                <option value="decrease">Decrease</option>
                            </select>
                        </div>

                        <!-- Adjustment Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Adjust</label>
                            <input type="number" name="quantity" id="adjustQuantity" class="form-control" min="0.01" step="0.01" required>
                            <div class="invalid-feedback">Enter a valid positive quantity.</div>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="adjustUnit" name="unit" class="form-control" readonly>
                        </div>

                        <!-- Reason -->
                        <div class="col-md-6">
                            <label class="form-label">Adjustment Reason</label>
                            <select name="reason" class="form-select" required>
                                <option value="">Select Reason</option>
                                <option value="audit_correction">Audit Correction</option>
                                <option value="spillage">Spillage / Loss</option>
                                <option value="data_error">Data Entry Error</option>
                                <option value="damage">Damaged Chemical</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <!-- Transaction date -->
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2" placeholder="Explain the adjustment..."></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info text-white"><i class="la la-check-circle me-1"></i> Apply Adjustment</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Chemical Transfer Modal -->
<div class="modal fade" id="chemicalTransferModal" tabindex="-1" aria-labelledby="chemicalTransferLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="chemicalTransferLabel">
                    <i class="la la-exchange-alt me-1"></i> Transfer Chemical
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="chemicalTransferForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Chemical -->
                        <div class="col-md-6">
                            <label class="form-label">Chemical</label>
                            <input type="text" name="chemical_name" id="transferChemicalName" class="form-control" readonly>
                            <input type="hidden" name="company_chemical_id">
                            <input type="hidden" name="chemical_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <select name="batch_no" id="chemicalTransferBatch" class="form-select">
                                <option value="">Select Batch</option>
                            </select>
                        </div>

                        <!-- From Location -->
                        <div class="col-md-6">
                            <label class="form-label">From Location</label>
                            <input type="text" id="transferFromLocation" class="form-control" name="" placeholder="Auto-filled">
                        </div>

                        <!-- To Location -->
                        <div class="col-md-6">
                            <label class="form-label">To Location</label>
                            <input type="text" name="to_location" id="transferToLocation" class="form-control" required>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Transfer</label>
                            <input type="number" name="transfer_quantity" id="transferQuantity" class="form-control" min="0.01" step="0.01" required>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="transferUnit" name="unit" class="form-control" readonly>
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2" placeholder="Reason for transfer..."></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="la la-share me-1"></i> Execute Transfer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Dispose Chemical Modal -->
<!-- Chemical Disposal Modal -->
<div class="modal fade" id="chemicalDisposalModal" tabindex="-1" aria-labelledby="chemicalDisposalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="chemicalDisposalLabel">
                    <i class="la la-trash-alt me-1"></i> Dispose Chemical
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="chemicalDisposalForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Chemical -->
                        <div class="col-md-6">
                            <label class="form-label">Chemical</label>
                            <input type="text" name="chemical_name" id="checkInChemicalName" class="form-control" readonly>
                            <input type="hidden" name="company_chemical_id">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <select name="batch_no" id="disposalBatch" class="form-select" required disabled>
                                <option value="">Select Batch</option>
                            </select>
                        </div>

                        <!-- Current Location -->
                        <div class="col-md-6">
                            <label class="form-label">Storage Location</label>
                            <input type="text" id="disposalLocation" name="storage_location" class="form-control" readonly>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Dispose</label>
                            <input type="number" name="quantity" id="disposalQuantity" class="form-control" min="0.01" step="0.01" required>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="disposalUnit" class="form-control" readonly>
                        </div>

                        <!-- Disposal Reason -->
                        <div class="col-md-6">
                            <label class="form-label">Reason</label>
                            <select name="reason" class="form-select" required>
                                <option value="">Select Reason</option>
                                <option value="Expired">Expired</option>
                                <option value="Contaminated">Contaminated</option>
                                <option value="Damaged">Damaged</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Method of Disposal -->
                        <div class="col-md-6">
                            <label class="form-label">Disposal Method</label>
                            <select name="method" class="form-select" required>
                                <option value="">Select Method</option>
                                <option value="Neutralization">Neutralization</option>
                                <option value="Incineration">Incineration</option>
                                <option value="Recycling">Recycling</option>
                                <option value="Third-party Contractor">Third-party Contractor</option>
                            </select>
                        </div>

                        <!-- Disposal Date -->
                        <div class="col-md-6">
                            <label class="form-label">Disposal Date</label>
                            <input type="date" name="disposal_date" class="form-control" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2" placeholder="Add any notes or observations..."></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger text-white">
                        <i class="la la-trash me-1"></i> Dispose
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

