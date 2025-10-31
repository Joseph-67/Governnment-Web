<?php

namespace App\Http\Controllers;

use App\Models\stock_movement;
// use App\Http\Controllers\ChemicalStockMovementController;
use Illuminate\Http\Request;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

class StockMovementController extends ChemicalStockMovementController
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
        ->where('movement_type', 'in')->sum('quantity');
        return $totalCheckIn;
    }

    public function getMaterialTotalTransfer($companyMaterialId)
    {
        //
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'transfer')->sum('quantity');
        return $totalTransfer;
    }

    public function getMaterialTotalAdjustment($companyMaterialId)
    {
        //
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'adjustment')->sum('quantity');
        return $totalAdjustment;
    }

    public function getMaterialTotalCheckOut($companyMaterialId)
    {
        //
        $totalCheckOut = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'out')->sum('quantity');
        return $totalCheckOut;
    }

    public function getMaterialBalance($companyMaterialId) {
        $balance = $this->getMaterialTotalCheckIn($companyMaterialId) - $this->getMaterialTotalTransfer($companyMaterialId) + $this->getMaterialTotalAdjustment($companyMaterialId) - $this->getMaterialTotalCheckOut($companyMaterialId);
        return $balance; 
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
            $year = Carbon::parse($request->input('dateInput'))->year;
        }
        $result = stock_movement::create([
            'companyMaterialId'  => $request['checkIn_material_id'],
            'materialID'        => $request['material_id'],
            'companyID'         => $request['company_id'],
            'quantity'           => $request['quantity'],
            'movement_type'      => 'in',
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
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
            // Extract batch ID from batch_no (format: BATCH-{stockID})
            $batchId = str_replace('BATCH-', '', $request['batch_no']);
            
            $batchMovement = stock_movement::where('stockID', $batchId)
                ->where('companyMaterialId', $request['checkOut_material_id'])
                ->where('materialID', $request['material_id'])
                ->where('movement_type', 'in')
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
            $year = Carbon::parse($request->input('dateInput'))->year;
        }
        $result = stock_movement::create([
            'companyMaterialId'  => $request['checkOut_material_id'],
            'materialID'        => $request['material_id'],
            'companyID'         => $request['company_id'],
            'quantity'           => $request['quantity'],
            'movement_type'      => 'out',
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
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
                ->select('stockID', 'movement_date', 'quantity', 'remark', 'materialID')
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
            
            $processedBatches = $batches->map(function ($batch) use (&$remainingBalance, $companyMaterial) {
                $checkInQty = floatval($batch->quantity);
                $batchId = 'BATCH-' . $batch->stockID;
                
                // Distribute remaining balance using FIFO (First In, First Out) approach
                // The most recent batches get the remaining balance first
                $availableQty = min($checkInQty, $remainingBalance);
                $remainingBalance = max(0, $remainingBalance - $checkInQty);
                
                return [
                    'batch_id' => $batchId,
                    'batch_no' => $batchId,
                    'check_in_date' => $batch->movement_date ? $batch->movement_date->format('Y-m-d') : null,
                    'original_quantity' => $checkInQty,
                    'available_quantity' => $availableQty,
                    'remarks' => $batch->remark,
                    'material_id' => $batch->materialID, // Include material ID for validation
                    'company_material_id' => $companyMaterial->companyMaterialId
                ];
            })
            ->filter(function ($batch) {
                return $batch['available_quantity'] > 0;
            });

            return response()->json([
                'status' => 'success',
                'batches' => $processedBatches->values(),
                'total_balance' => $currentBalance,
                'debug' => [
                    'total_check_in' => $totalCheckIn,
                    'total_check_out' => $totalCheckOut,
                    'total_transfer' => $totalTransfer,
                    'total_adjustment' => $totalAdjustment,
                    'calculated_balance' => $currentBalance
                ]
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
}
