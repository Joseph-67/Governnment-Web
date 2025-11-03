<?php

namespace App\Http\Controllers;

use App\Models\stock_movement;
// use App\Http\Controllers\ChemicalStockMovementController;
use Illuminate\Http\Request;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMaterialTotalCheckIn($companyMaterialId)
    {
        //
        $totalCheckIn = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'in')
        ->where('status', 'active')
        ->sum('quantity');
        return $totalCheckIn ?: 0;
    }

    public function getMaterialTotalTransfer($companyMaterialId)
    {
        //
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'transfer')
        ->where('status', 'active')
        ->sum('quantity');
        return $totalTransfer ?: 0;
    }

    public function getMaterialTotalAdjustment($companyMaterialId)
    {
        //
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'adjustment')
        ->where('status', 'active')
        ->sum('quantity');
        return $totalAdjustment ?: 0;
    }

    public function getMaterialTotalCheckOut($companyMaterialId)
    {
        //
        $totalCheckOut = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'out')
        ->where('status', 'active')
        ->sum('quantity');
        return $totalCheckOut ?: 0;
    }

    public function getMaterialTotalDisposal($companyMaterialId)
    {
        //
        $totalDisposal = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'disposal')
        ->where('status', 'active')
        ->sum('quantity');
        return $totalDisposal ?: 0;
    }

    public function getMaterialBalance($companyMaterialId) {
        $balance = $this->getMaterialTotalCheckIn($companyMaterialId) - $this->getMaterialTotalTransfer($companyMaterialId) + $this->getMaterialTotalAdjustment($companyMaterialId) - $this->getMaterialTotalCheckOut($companyMaterialId) - $this->getMaterialTotalDisposal($companyMaterialId);
        return $balance; 
    }

    /**
     * Get material balance for a specific batch (following chemical pattern)
     */
    public function getMaterialBalanceByBatch($companyMaterialId, $batchNo)
    {
        $totalIn = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNo)
            ->where('movement_type', 'in')
            ->where('status', 'active')
            ->sum('quantity') ?: 0;
            
        $totalOut = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNo)
            ->where('movement_type', 'out')
            ->where('status', 'active')
            ->sum('quantity') ?: 0;
            
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNo)
            ->where('movement_type', 'transfer')
            ->where('status', 'active')
            ->sum('quantity') ?: 0;
            
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNo)
            ->where('movement_type', 'adjustment')
            ->where('status', 'active')
            ->sum('quantity') ?: 0;

        $totalDisposal = stock_movement::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNo)
            ->where('movement_type', 'disposal')
            ->where('status', 'active')
            ->sum('quantity') ?: 0;

        // Balance formula: (checkin + adjustment) - (checkout + transfer + disposal)
        return ($totalIn + $totalAdjustment) - ($totalOut + $totalTransfer + $totalDisposal);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_checkin(Request $request)
    {
        //
        // dd($request);
        $validator = Validator::make($request->all(), [
            'checkIn_material_id'   =>  ['required', 'numeric'],
            'material_id'           =>  ['required', 'numeric'],
            'company_id'            =>  ['required', 'numeric'],
            'quantity'              =>  ['required', 'numeric', 'min:1'],
            'date'                  =>  ['required', 'date'],
            'batch_no'              =>  ['nullable', 'string'],
            'source'                =>  ['nullable', 'string'],
            'remark'                =>  ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        if (!empty($request['date'])) {
            # code...
            // Extract the year using Carbon
            $year = Carbon::parse($request['date'])->year;
        }
        $result = stock_movement::create([
            'companyMaterialId'  => $request['checkIn_material_id'],
            'materialID'        => $request['material_id'],
            'companyID'         => $request['company_id'],
            'quantity'           => $request['quantity'],
            'batch_number'      => $request['batch_no'],
            'source'            => $request['source'],
            'movement_type'      => 'in',
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
            'status'            => 'active'
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Material checked in successfully.',
                // 'company_material_price' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material failed to check in.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }


    public function store_checkout(Request $request)
    {
        //
        // dd($request);
        $validator = Validator::make($request->all(), [
            'checkOut_material_id'   =>  ['required', 'numeric'],
            'material_id'           =>  ['required', 'numeric'],
            'company_id'            =>  ['required', 'numeric'],
            'quantity'              =>  ['required', 'numeric', 'min:1'],
            'date'                  =>  ['required', 'date'],
            'batch_no'              =>  ['nullable', 'string'], // Batch selection
            'usage_reason'          =>  ['nullable', 'string'],
            'remark'                =>  ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        // Validate that the company material exists and belongs to the correct material
        $companyMaterial = \App\Models\CompanyMaterial::where('companyMaterialId', $request['checkOut_material_id'])
            ->where('materialID', $request['material_id'])
            ->first();
            
        if (!$companyMaterial) {
            $validator->errors()->add('material_mismatch', 'Invalid material selection. The selected material does not match the company material.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

        // If batch is selected, validate that it belongs to the correct material
        if (!empty($request['batch_no']) && $request['batch_no'] !== 'MANUAL') {
            // Check if batch exists for this material using batch_number field
            $batchMovement = stock_movement::where('batch_number', $request['batch_no'])
                ->where('companyMaterialId', $request['checkOut_material_id'])
                ->where('materialID', $request['material_id'])
                ->where('movement_type', 'in')
                ->where('status', 'active')
                ->first();
                
            if (!$batchMovement) {
                $validator->errors()->add('batch_mismatch', 'Invalid batch selection. The selected batch does not belong to this material.');
                return response()->json([
                    'status' => 'error',
                    'message'   => 'Validation failed.',
                    'errors'    => $validator->errors(),
                ], 400);
            }
        }

        $availableBalance = $this->getMaterialBalance($request['checkOut_material_id']);
        if ($availableBalance <= 0) {
            # code...
            $validator->errors()->add('balance_error', 'No stock is available. The balance is 0.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
                'available_balance' => $availableBalance
            ], 400);
        }
        elseif ($request['quantity'] > $availableBalance) {
            # code...
            $validator->errors()->add('balance_error', 'The quantity demanded exceeds the available stock balance.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
                'available_balance' => $availableBalance
            ], 400);
        }

        if (!empty($request['date'])) {
            # code...
            // Extract the year using Carbon
            $year = Carbon::parse($request['date'])->year;
        }
        $result = stock_movement::create([
            'companyMaterialId'  => $request['checkOut_material_id'],
            'materialID'        => $request['material_id'],
            'companyID'         => $request['company_id'],
            'quantity'           => $request['quantity'],
            'batch_number'      => $request['batch_no'],
            'usage_reason'      => $request['usage_reason'],
            'movement_type'      => 'out',
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
            'status'            => 'active'
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Material checked out successfully.',
                // 'company_material_price' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material failed to check out.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    public function getMaterialBatches($companyMaterialId)
    {
        try {
            // Get current balance first
            $currentBalance = $this->getMaterialBalance($companyMaterialId);
            
            // Get the company material info to validate material ID
            $companyMaterial = \App\Models\CompanyMaterial::find($companyMaterialId);
            if (!$companyMaterial) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Company material not found.'
                ], 404);
            }
            
            // Get all check-in movements (batches) for this specific material only
            $batches = stock_movement::where('companyMaterialId', $companyMaterialId)
                ->where('materialID', $companyMaterial->materialID) // Ensure batch belongs to correct material
                ->where('movement_type', 'in')
                ->where('status', 'active')
                ->select('stockID', 'movement_date', 'quantity', 'remark', 'materialID', 'batch_number')
                ->orderBy('movement_date', 'desc')
                ->get();

            if ($batches->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'batches' => []
                ]);
            }

            // Calculate total check-in and check-out quantities
            $totalCheckIn = $this->getMaterialTotalCheckIn($companyMaterialId);
            $totalCheckOut = $this->getMaterialTotalCheckOut($companyMaterialId);
            $totalTransfer = $this->getMaterialTotalTransfer($companyMaterialId);
            $totalAdjustment = $this->getMaterialTotalAdjustment($companyMaterialId);
            
            // Calculate remaining balance to distribute among batches
            $remainingBalance = $currentBalance;
            
            // Calculate remaining balance to distribute among batches
            $remainingBalance = $currentBalance;
            
            // Use original FIFO method that was working
            $remainingBalance = $currentBalance;
            
            // Calculate remaining balance to distribute among batches
            $remainingBalance = $currentBalance;
            
            // Get all distinct batches (following chemical pattern)
            $distinctBatches = stock_movement::where('companyMaterialId', $companyMaterialId)
                ->where('materialID', $companyMaterial->materialID)
                ->whereNotNull('batch_number')
                ->where('status', 'active')
                ->select('batch_number')
                ->distinct()
                ->get();

            // If no batches with batch_number, fall back to original check-in records
            if ($distinctBatches->isEmpty()) {
                // Use FIFO approach but distribute the FULL calculated balance (including adjustments)
                $remainingBalance = $currentBalance; // This is 400 (includes adjustments)
                $totalOriginalQuantity = $batches->sum('quantity'); // This is 200 (original check-ins)
                
                $processedBatches = $batches->map(function ($batch) use (&$remainingBalance, $companyMaterial, $totalOriginalQuantity, $currentBalance) {
                    $checkInQty = floatval($batch->quantity);
                    $batchId = 'BATCH-' . $batch->stockID;
                    
                    // If total balance exceeds original quantity, distribute proportionally
                    if ($currentBalance > $totalOriginalQuantity && $totalOriginalQuantity > 0) {
                        // Calculate proportional share of the total balance
                        $proportionalShare = ($checkInQty / $totalOriginalQuantity) * $currentBalance;
                        $availableQty = $proportionalShare;
                    } else {
                        // Standard FIFO distribution
                        $availableQty = min($checkInQty, $remainingBalance);
                    }
                    
                    $remainingBalance = max(0, $remainingBalance - $availableQty);
                    
                    return [
                        'batch_id' => $batchId,
                        'batch_no' => $batchId,
                        'check_in_date' => $batch->movement_date ? $batch->movement_date->format('Y-m-d') : null,
                        'original_quantity' => $checkInQty,
                        'available_quantity' => $availableQty,
                        'calculation_method' => $currentBalance > $totalOriginalQuantity ? 'proportional_distribution' : 'fifo',
                        'remarks' => $batch->remark,
                        'material_id' => $batch->materialID,
                        'company_material_id' => $companyMaterial->companyMaterialId
                    ];
                });
            } else {
                // Use chemical-style batch calculation
                $processedBatches = $distinctBatches->map(function ($batchRecord) use ($companyMaterialId, $companyMaterial) {
                    $batchNo = $batchRecord->batch_number;
                    
                    // Get batch balance using chemical-style method
                    $availableQty = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
                    $availableQty = max(0, $availableQty);
                    
                    // Get original check-in info for this batch
                    $originalCheckIn = stock_movement::where('companyMaterialId', $companyMaterialId)
                        ->where('batch_number', $batchNo)
                        ->where('movement_type', 'in')
                        ->where('status', 'active')
                        ->first();
                    
                    return [
                        'batch_id' => $batchNo,
                        'batch_no' => $batchNo,
                        'check_in_date' => $originalCheckIn ? $originalCheckIn->movement_date : null,
                        'original_quantity' => $originalCheckIn ? floatval($originalCheckIn->quantity) : 0,
                        'available_quantity' => $availableQty, // Real calculated balance including adjustments
                        'remarks' => $originalCheckIn ? $originalCheckIn->remark : '',
                        'material_id' => $companyMaterial->materialID,
                        'company_material_id' => $companyMaterial->companyMaterialId
                    ];
                });
            }
            
            $processedBatches = $processedBatches->filter(function ($batch) {
                return $batch['available_quantity'] > 0;
            });

            // Return format with available quantities for transfer modal
            $simpleBatches = $processedBatches->map(function ($batch) {
                return [
                    'batch_no' => $batch['batch_no'],
                    'available_quantity' => $batch['available_quantity']
                ];
            });

            return response()->json([
                'status' => 'success',
                'count' => $simpleBatches->count(),
                'batches' => $simpleBatches->values(),
                'available_balance' => $currentBalance
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch batches.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getMaterialBalanceAPI($companyMaterialId)
    {
        try {
            $balance = $this->getMaterialBalance($companyMaterialId);
            
            return response()->json([
                'status' => 'success',
                'balance' => $balance,
                'company_material_id' => $companyMaterialId
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch balance.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getBatchAvailableQuantity(Request $request, $companyMaterialId) 
    {
        $batchNo = $request->query('batch_no');
        
        if (!$batchNo || !$companyMaterialId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Missing batch_no or company_material_id parameter.'
            ], 400);
        }
        
        $balance = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
        
        return response()->json([
            'status' => 'success',
            'batch_no' => $batchNo,
            'available_balance' => $balance
        ]);
    }

    /**
     * Store material adjustment (following chemical pattern)
     */
    public function store_material_adjustment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_material_id'  => ['required', 'numeric'],
            'material_id'          => ['required', 'numeric'],
            'company_id'           => ['required', 'numeric'],
            'quantity'             => ['required', 'numeric', 'min:0.001'],
            'adjustment_type'      => ['required', 'string', 'in:increase,decrease'],
            'batch_no'             => ['required', 'string'],
            'reason'               => ['required', 'string'],
            'transaction_date'     => ['required', 'date'],
            'remarks'              => ['nullable', 'string', 'min:3'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $companyMaterialId = $request->company_material_id;
        $quantity = $request->quantity;
        $adjustmentType = $request->adjustment_type;
        $batchNo = $request->batch_no;
        $availableBalance = $this->getMaterialBalance($companyMaterialId);
        $year = Carbon::parse($request->transaction_date)->year;

        // For decrease adjustments, validate sufficient balance
        if ($adjustmentType === 'decrease' && $quantity > $availableBalance) {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient stock for this adjustment.',
                'available_balance' => $availableBalance
            ], 400);
        }

        // Set quantity as negative for decrease adjustments
        $adjustedQuantity = $adjustmentType === 'decrease' ? -abs($quantity) : abs($quantity);

        // Store the adjustment as a stock movement
        $result = stock_movement::create([
            'companyMaterialId'  => $companyMaterialId,
            'materialID'         => $request->material_id,
            'companyID'          => $request->company_id,
            'quantity'           => $adjustedQuantity,
            'batch_number'       => $batchNo,
            'source'             => $request->reason, // Store reason in source field
            'usage_reason'       => $adjustmentType . ' adjustment', // Store adjustment type
            'movement_type'      => 'adjustment',
            'calendar_year'      => $year,
            'movement_date'      => $request->transaction_date,
            'remark'             => $request->remarks,
            'status'             => 'active'
        ]);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => ucfirst($adjustmentType) . ' adjustment recorded successfully.',
                'current_balance' => $this->getMaterialBalance($companyMaterialId)
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Adjustment failed to record.'
            ], 500);
        }
    }

    /**
     * Store material transfer (following chemical pattern)
     */
    public function store_material_transfer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_material_id'  => ['required', 'numeric'],
            'material_id'          => ['required', 'numeric'],
            'company_id'           => ['required', 'numeric'],
            'quantity'             => ['required', 'numeric', 'min:0.001'],
            'batch_no'             => ['required', 'string'],
            'to_location'          => ['required', 'string', 'min:3'],
            'transaction_date'     => ['required', 'date'],
            'remarks'              => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $companyMaterialId = $request->company_material_id;
        $quantity = $request->quantity;
        $batchNo = $request->batch_no;
        
        // Validate batch belongs to this material
        $companyMaterial = \App\Models\CompanyMaterial::where('companyMaterialId', $companyMaterialId)
            ->where('materialID', $request->material_id)
            ->first();
            
        if (!$companyMaterial) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid material selection.',
                'errors' => ['material_mismatch' => ['The selected material does not match the company material.']]
            ], 422);
        }

        // Check batch-specific balance
        $batchBalance = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
        
        if ($batchBalance <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No stock available in the selected batch.',
                'errors' => ['batch_balance_error' => ['The selected batch has no available stock for transfer.']],
                'batch_balance' => $batchBalance
            ], 422);
        }

        if ($quantity > $batchBalance) {
            return response()->json([
                'status' => 'error',
                'message' => 'Transfer quantity exceeds available batch stock.',
                'errors' => ['quantity_error' => ["Cannot transfer {$quantity} units. Only {$batchBalance} units available in this batch."]],
                'batch_balance' => $batchBalance
            ], 422);
        }

        $year = Carbon::parse($request->transaction_date)->year;

        // Store the transfer as a stock movement (negative quantity for outgoing transfer)
        $result = stock_movement::create([
            'companyMaterialId'  => $companyMaterialId,
            'materialID'         => $request->material_id,
            'companyID'          => $request->company_id,
            'quantity'           => $quantity, // Positive quantity for transfer out
            'batch_number'       => $batchNo,
            'source'             => $request->to_location, // Store destination in source field
            'usage_reason'       => 'transfer_out', // Mark as transfer
            'movement_type'      => 'transfer',
            'calendar_year'      => $year,
            'movement_date'      => $request->transaction_date,
            'remark'             => $request->remarks,
            'status'             => 'active'
        ]);

        if ($result) {
            $newBalance = $this->getMaterialBalance($companyMaterialId);
            $newBatchBalance = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
            
            return response()->json([
                'status' => 'success',
                'message' => "Material transfer completed successfully. {$quantity} units transferred to {$request->to_location}.",
                'transfer_details' => [
                    'quantity_transferred' => $quantity,
                    'destination' => $request->to_location,
                    'batch_no' => $batchNo,
                    'remaining_in_batch' => $newBatchBalance,
                    'total_remaining' => $newBalance
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Transfer failed to record.'
            ], 500);
        }
    }

    public function MaterialStockAnalysis(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'period' => 'nullable|string|in:today,this_week,last_week,this_month,last_month,this_year,last_year',
            'company_material_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        // dd($request);
        $query = $request->query('period');
        $company = $request->query('company_material_id');

        $movements = stock_movement::where('companyMaterialId', $company);

        switch ($query) {
            case 'today':
            $movements->whereDate('movement_date', Carbon::today());
            break;
            case 'this_week':
            $movements->whereBetween('movement_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            break;
            case 'last_week':
            $movements->whereBetween('movement_date', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
            break;
            case 'this_month':
            $movements->whereMonth('movement_date', Carbon::now()->month)
                      ->whereYear('movement_date', Carbon::now()->year);
            break;
            case 'last_month':
            $movements->whereMonth('movement_date', Carbon::now()->subMonth()->month)
                      ->whereYear('movement_date', Carbon::now()->subMonth()->year);
            break;
            case 'this_year':
            $movements->whereYear('movement_date', Carbon::now()->year);
            break;
            case 'last_year':
            $movements->whereYear('movement_date', Carbon::now()->subYear()->year);
            // dd($movements);
            break;
        }

        if ($movements->doesntExist()) {
            return response()->json(['message' => 'No movements found for the given parameters.'], 404);
        }
        // dd($movements->get());
        return response()->json($movements->get());
    }

    /**
     * Store material disposal (following chemical pattern)
     */
    public function store_material_disposal(Request $request)
    {
        // Log incoming request data for debugging
        \Log::info('Material disposal request data:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'company_material_id'  => ['required', 'numeric'],
            'material_id'          => ['nullable', 'numeric'],
            'company_id'           => ['nullable', 'numeric'],
            'quantity'             => ['required', 'numeric', 'min:0.001'],
            'batch_no'             => ['required', 'string'],
            'reason'               => ['required', 'string'],
            'method'               => ['required', 'integer', 'min:1'], // Must be positive integer
            'disposal_date'        => ['required', 'date'],
            'remarks'              => ['nullable', 'string'],
        ], [
            'method.required' => 'Please select a disposal method.',
            'method.integer' => 'Invalid disposal method selected. Please select a valid method from the dropdown.',
            'method.min' => 'Invalid disposal method selected. Please select a valid method from the dropdown.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $companyMaterialId = $request->company_material_id;
        $quantity = $request->quantity;
        $batchNo = $request->batch_no;
        
        // Validate disposal method exists if provided
        if ($request->method) {
            $disposalMethod = \App\Models\DisposalMethod::find($request->method);
            if (!$disposalMethod) {
                \Log::warning('Invalid disposal method ID provided:', ['method_id' => $request->method]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid disposal method selected.',
                    'errors' => ['method' => ['The selected disposal method does not exist in the database.']]
                ], 422);
            }
            \Log::info('Valid disposal method found:', ['method' => $disposalMethod->toArray()]);
        }
        
        // Validate batch belongs to this material
        $companyMaterial = \App\Models\CompanyMaterial::find($companyMaterialId);
        if (!$companyMaterial) {
            return response()->json([
                'status' => 'error',
                'message' => 'Company material not found.',
                'errors' => ['material_error' => ['The selected material does not exist.']]
            ], 422);
        }

        // Check batch-specific balance
        $batchBalance = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
        
        if ($batchBalance <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No stock available in the selected batch.',
                'errors' => ['batch_balance_error' => ['The selected batch has no available stock for disposal.']],
                'batch_balance' => $batchBalance
            ], 422);
        }

        if ($quantity > $batchBalance) {
            return response()->json([
                'status' => 'error',
                'message' => 'Disposal quantity exceeds available batch stock.',
                'errors' => ['quantity_error' => ["Cannot dispose {$quantity} units. Only {$batchBalance} units available in this batch."]],
                'batch_balance' => $batchBalance
            ], 422);
        }

        $year = Carbon::parse($request->disposal_date)->year;

        // Handle disposal method - ensure it's a valid integer or null
        $disposalMethodId = null;
        if ($request->method && $request->method !== '' && is_numeric($request->method)) {
            $disposalMethodId = (int) $request->method;
        }

        // Store the disposal as a stock movement (positive quantity for disposal out)
        $result = stock_movement::create([
            'companyMaterialId'  => $companyMaterialId,
            'materialID'         => $companyMaterial->materialID,
            'companyID'          => $companyMaterial->companyID,
            'quantity'           => $quantity, // Positive quantity for disposal out
            'batch_number'       => $batchNo,
            'source'             => $request->reason, // Store disposal reason in source field
            'usage_reason'       => 'disposal: ' . ($request->method ?: 'manual'), // Store disposal method
            'movement_type'      => 'disposal',
            'disposal_method_id' => $disposalMethodId, // Store disposal method ID (nullable)
            'calendar_year'      => $year,
            'movement_date'      => $request->disposal_date,
            'remark'             => $request->remarks,
            'status'             => 'active'
        ]);

        if ($result) {
            $newBalance = $this->getMaterialBalance($companyMaterialId);
            $newBatchBalance = $this->getMaterialBalanceByBatch($companyMaterialId, $batchNo);
            
            // Get disposal method name for better message
            $disposalMethodName = 'Unknown Method';
            if ($disposalMethodId) {
                $disposalMethod = \App\Models\DisposalMethod::find($disposalMethodId);
                $disposalMethodName = $disposalMethod ? $disposalMethod->method_name : "Method ID {$disposalMethodId}";
            }
            
            return response()->json([
                'status' => 'success',
                'message' => "Material disposal recorded successfully. {$quantity} units disposed via {$disposalMethodName}.",
                'disposal_details' => [
                    'quantity_disposed' => $quantity,
                    'disposal_method_id' => $disposalMethodId,
                    'disposal_method_name' => $disposalMethodName,
                    'disposal_reason' => $request->reason,
                    'batch_no' => $batchNo,
                    'remaining_in_batch' => $newBatchBalance,
                    'total_remaining' => $newBalance
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Disposal failed to record.'
            ], 500);
        }
    }
}
