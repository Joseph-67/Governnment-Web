<div class="modal fade" id="materialModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="materialModalTitle">Add Material</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="materialForm" novalidate>
        @csrf
        <input type="hidden" name="operation" id="materialOperation" value="add">
        <input type="hidden" name="id" id="materialId">
        <input type="hidden" name="material_id" id="materialIdRef">

        <div class="modal-body" id="materialModalBody">
          <!-- Fields dynamically injected here -->
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="materialSubmitBtn">
            <span id="materialBtnText">Save</span>
            <span id="materialBtnLoader" class="spinner-border spinner-border-sm ms-2" role="status" style="display:none;"></span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Material Check-in Modal -->
<div class="modal fade" id="materialCheckInModal" tabindex="-1" aria-labelledby="materialCheckInLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="materialCheckInLabel"><i class="la la-plus-circle me-1"></i> Material Check-In</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="materialCheckInForm" class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Material</label>
                            <input type="text" name="material_name" id="checkInMaterialName" class="form-control" readonly>
                            <input type="hidden" name="checkIn_material_id">
                            <input type="hidden" name="material_id">
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
                                <input type="text" name="batch_no" id="materialBatchNo" class="form-control" placeholder="Auto-generated or enter manually">
                                <button type="button" class="btn btn-outline-secondary" id="generateMaterialBatchBtn"><i class="la la-refresh"></i> Generate</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Source</label>
                            <input type="text" name="source" class="form-control" placeholder="e.g., Supplier name or location">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date Received</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remark" class="form-control" rows="2" placeholder="Additional notes..."></textarea>
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

<!-- Material Checkout Modal -->
<div class="modal fade" id="materialCheckoutModal" tabindex="-1" aria-labelledby="materialCheckoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="materialCheckoutLabel">
                    <i class="la la-minus-circle me-1"></i> Material Checkout
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="materialCheckoutForm" class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="row g-3">

                        <!-- Material -->
                        <div class="col-md-6">
                            <label class="form-label">Material</label>
                            <input type="text" name="material_name" id="checkInMaterialName" class="form-control" readonly>
                            <input type="hidden" name="checkOut_material_id">
                            <input type="hidden" name="material_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Batch (Required) -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No <span class="text-danger">*</span></label>
                            <select name="batch_no" id="materialCheckoutBatch" class="form-select" required>
                                <option value="">Select Batch (Required)</option>
                            </select>
                            <div class="invalid-feedback">Please select a batch for checkout.</div>
                        </div>

                        <!-- Available Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Available Quantity</label>
                            <input type="text" name="available_quantity" id="availableQty" class="form-control" readonly placeholder="Loading total quantity...">
                            <small class="text-muted" id="quantityHelpText">Total available across all batches</small>
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
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remark" class="form-control" rows="2" placeholder="Notes about this checkout..."></textarea>
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

<!-- Material Adjustment Modal -->
<div class="modal fade" id="materialAdjustmentModal" tabindex="-1" aria-labelledby="materialAdjustmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="materialAdjustmentLabel">
                    <i class="la la-balance-scale me-1"></i> Inventory Adjustment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="materialAdjustmentForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Material -->
                        <div class="col-md-6">
                            <label class="form-label">Material</label>
                            <input type="text" name="material_name" id="adjustmentMaterialName" class="form-control" readonly>
                            <input type="hidden" name="company_material_id">
                            <input type="hidden" name="material_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Available Quantity -->
                        <div class="col-md-6">
                            <label class="form-label" id="adjustmentQtyLabel">Total Available Quantity</label>
                            <input type="text" id="adjustmentTotalQty" class="form-control" readonly placeholder="Loading...">
                            <small class="text-muted" id="adjustmentQtyHelpText">Total across all batches</small>
                        </div>

                        <!-- Batch (Required) -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No <span class="text-danger">*</span></label>
                            <select name="batch_no" id="materialAdjustmentBatch" class="form-select" required>
                                <option value="">Select Batch (Required)</option>
                            </select>
                            <div class="invalid-feedback">Please select a batch for adjustment.</div>
                        </div>

                        <!-- Batch Current Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Batch Current Quantity</label>
                            <input type="text" id="adjustmentBatchQty" class="form-control" readonly placeholder="Select batch first">
                            <small class="text-muted">Current quantity in selected batch</small>
                        </div>

                        <!-- Adjustment Type -->
                        <div class="col-md-6">
                            <label class="form-label">Adjustment Type</label>
                            <select name="adjustment_type" id="materialAdjustmentType" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="increase">Increase</option>
                                <option value="decrease">Decrease</option>
                            </select>
                        </div>

                        <!-- Adjustment Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Adjust</label>
                            <input type="number" name="quantity" id="materialAdjustmentQuantity" class="form-control" min="0.01" step="0.01" required>
                            <div class="invalid-feedback">Enter a valid positive quantity.</div>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="materialAdjustmentUnit" name="unit" class="form-control" readonly>
                        </div>

                        <!-- Reason -->
                        <div class="col-md-6">
                            <label class="form-label">Adjustment Reason</label>
                            <select name="reason" class="form-select" required>
                                <option value="">Select Reason</option>
                                <option value="audit_correction">Audit Correction</option>
                                <option value="spillage">Spillage / Loss</option>
                                <option value="data_error">Data Entry Error</option>
                                <option value="damage">Damaged Material</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <!-- Transaction date -->
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-6">
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

<!-- Material Transfer Modal -->
<div class="modal fade" id="materialTransferModal" tabindex="-1" aria-labelledby="materialTransferLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="materialTransferLabel">
                    <i class="la la-exchange-alt me-1"></i> Transfer Material
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="materialTransferForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Material -->
                        <div class="col-md-6">
                            <label class="form-label">Material</label>
                            <input type="text" name="material_name" id="transferMaterialName" class="form-control" readonly>
                            <input type="hidden" name="company_material_id">
                            <input type="hidden" name="material_id">
                            <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No <span class="text-danger">*</span></label>
                            <select name="batch_no" id="materialTransferBatch" class="form-select" required>
                                <option value="">Select Batch (Required)</option>
                            </select>
                            <div class="invalid-feedback">Please select a batch for transfer.</div>
                        </div>

                        <!-- From Location -->
                        <div class="col-md-6">
                            <label class="form-label">From Location</label>
                            <input type="text" id="transferMaterialFromLocation" class="form-control" readonly placeholder="Current location">
                        </div>

                        <!-- To Location -->
                        <div class="col-md-6">
                            <label class="form-label">To Location</label>
                            <input type="text" name="to_location" id="transferMaterialToLocation" class="form-control" required placeholder="Enter destination location">
                            <div class="invalid-feedback">Please enter the destination location.</div>
                        </div>

                        <!-- Available Qty -->
                        <div class="col-md-4">
                            <label class="form-label">Available Qty</label>
                            <input type="text" id="materialTransferAvailableQty" class="form-control" readonly placeholder="Select batch first">
                            <small class="text-muted">Quantity in selected batch</small>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-4">
                            <label class="form-label">Quantity to Transfer</label>
                            <input type="number" name="quantity" id="transferMaterialQuantity" class="form-control" min="0.01" step="0.01" required>
                            <div class="invalid-feedback">Enter a valid quantity within available limit.</div>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-4">
                            <label class="form-label">Unit</label>
                            <input type="text" id="transferMaterialUnit" name="unit" class="form-control" readonly>
                        </div>

                        <!-- Transaction date -->
                        <div class="col-md-6">
                            <label class="form-label">Transfer Date</label>
                            <input type="date" name="transaction_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="col-md-6">
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

<!-- Material Disposal Modal -->
<div class="modal fade" id="materialDisposalModal" tabindex="-1" aria-labelledby="materialDisposalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="materialDisposalLabel">
                    <i class="la la-trash-alt me-1"></i> Dispose Material
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="materialDisposalForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3">

                        <!-- Material -->
                        <div class="col-md-6">
                            <label class="form-label">Material</label>
                            <input type="text" name="material_name" id="disposalMaterialName" class="form-control" readonly>
                            <input type="hidden" name="company_material_id">
                        </div>

                        <!-- Batch -->
                        <div class="col-md-6">
                            <label class="form-label">Batch No</label>
                            <select name="batch_no" id="disposalMaterialBatch" class="form-select" required disabled>
                                <option value="">Select Batch</option>
                            </select>
                        </div>

                        <!-- Current Location -->
                        <div class="col-md-6">
                            <label class="form-label">Storage Location</label>
                            <input type="text" id="disposalMaterialLocation" name="storage_location" class="form-control" readonly>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-6">
                            <label class="form-label">Quantity to Dispose</label>
                            <input type="number" name="quantity" id="disposalMaterialQuantity" class="form-control" min="0.01" step="0.01" required>
                        </div>

                        <!-- Unit -->
                        <div class="col-md-6">
                            <label class="form-label">Unit</label>
                            <input type="text" id="disposalMaterialUnit" class="form-control" readonly>
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
                            <div class="input-group">
                                <select name="method" id="materialDisposalMethod" class="form-select" required>
                                    <option value="">Loading disposal methods...</option>
                                </select>
                                <button type="button" class="btn btn-outline-secondary" id="refreshDisposalMethodsBtn" title="Refresh disposal methods">
                                    <i class="la la-refresh"></i>
                                </button>
                            </div>
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