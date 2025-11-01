<?php

namespace App\Http\Controllers;

use App\Models\ChemicalStockMovement;
use App\Models\CompanyChemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChemicalStockMovementController extends Controller
{
    /**
     * Get total chemical movement for a specific type.
     */
    private function getTotal($companyChemicalId, $type)
    {
        return ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('transaction_type', $type)
            ->sum('quantity');
    }

    public function getChemicalBalance($companyChemicalId)
    {
        $totalIn = $this->getTotal($companyChemicalId, 'checkin');
        $totalOut = $this->getTotal($companyChemicalId, 'checkout');
        $totalTransfer = $this->getTotal($companyChemicalId, 'transfer');
        $totalAdjust = $this->getTotal($companyChemicalId, 'adjustment');
        $totalDisposed = $this->getTotal($companyChemicalId, 'disposal');

        // Balance formula: (checkin + adjustment) - (checkout + transfer + disposal)
        return ($totalIn + $totalAdjust) - ($totalOut + $totalTransfer + $totalDisposed);
    }

    private function getTotalByBatchgetTotal($companyChemicalId, $type, $batch_no)
    {
        return ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('transaction_type', $type)
            ->where('batch_number', $batch_no)
            ->sum('quantity');
    }
    public function getChemicalBalanceByBatch($companyChemicalId, $batch_no)
    {
        $totalIn = $this->getTotalByBatchgetTotal($companyChemicalId, 'checkin', $batch_no);
        $totalOut = $this->getTotalByBatchgetTotal($companyChemicalId, 'checkout', $batch_no);
        $totalTransfer = $this->getTotalByBatchgetTotal($companyChemicalId, 'transfer', $batch_no);
        $totalAdjust = $this->getTotalByBatchgetTotal($companyChemicalId, 'adjustment', $batch_no);
        $totalDisposed = $this->getTotalByBatchgetTotal($companyChemicalId, 'disposal', $batch_no);

        // Balance formula: (checkin + adjustment) - (checkout + transfer + disposal)
        return ($totalIn + $totalAdjust) - ($totalOut + $totalTransfer + $totalDisposed);
    }
    /**
     * ✅ Check-in operation
     */
    public function store_chemical_checkin(Request $request)
    {
        return $this->storeMovement($request, 'checkin');
    }

    /**
     * ✅ Check-out operation
     */
    public function store_chemical_checkout(Request $request)
    {
        return $this->storeMovement($request, 'checkout');
    }

    /**
     * ✅ Adjustment operation
     */
    public function store_chemical_adjustment(Request $request)
    {
        return $this->storeMovement($request, 'adjustment');
    }

    /**
     * ✅ Transfer operation (e.g., between departments)
     */
    public function store_chemical_transfer(Request $request)
    {
        return $this->storeMovement($request, 'transfer');
    }

    /**
     * ✅ Disposal operation (e.g., expired, spillage, waste)
     */
    public function store_chemical_disposal(Request $request)
    {
        return $this->storeMovement($request, 'disposal');
    }

    /**
     * 🌍 Generic handler for all chemical stock movements
     */
    private function storeMovement(Request $request, $movementType)
    {
        $validator = Validator::make($request->all(), [
            'company_chemical_id'  => ['required', 'numeric'],
            'chemical_id'          => ['required', 'numeric'],
            'company_id'           => ['required', 'numeric'],
            'quantity'             => ['required', 'numeric', 'min:0.001'],
            'transaction_date'     => ['required', 'date'],
            'remarks'              => ['nullable', 'string', 'min:3'],
            'source_location'      => ['nullable', 'string'],
            'destination_location' => ['nullable', 'string'],
            'batch_no'             => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $companyChemicalId = $request->company_chemical_id;
        $quantity = $request->quantity;
        $batchNo = $request->batch_no?:"DEFAULT";
        $availableBalance = $this->getChemicalBalance($companyChemicalId);
        $year = Carbon::parse($request->transaction_date)->year;
        $guard = auth()->user() ? auth()->getDefaultDriver() : 'system';

        // dd($batchNo);
        // 🔍 For outflow actions — ensure sufficient balance
        if (in_array($movementType, ['checkout', 'transfer', 'disposal'])) {
            $availableBatchBalance = $batchNo 
                ? $this->getChemicalBalanceByBatch($companyChemicalId, $batchNo)
                : $availableBalance;

            if ($quantity > $availableBatchBalance) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Insufficient stock for this operation.',
                    'available_balance' => $availableBatchBalance
                ], 400);
            }
        }

        if (in_array($movementType, ['adjustment']) && isset($request->adjustment_type)) {
            // dd($quantity, $request->adjustment_type);
            # code...
            if ($request->adjustment_type === 'decrease' && $quantity > $availableBalance) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Insufficient stock for this adjustment.',
                    'available_balance' => $availableBalance
                ], 400);
            }
            $quantity = $request->adjustment_type === 'decrease' ? -abs($quantity) : abs($quantity);
        }

        // 🧾 Store transaction
        $movement = ChemicalStockMovement::create([
            'company_id'          => $request->company_id,
            'chemical_id'         => $request->chemical_id,
            'company_chemical_id' => $companyChemicalId,
            'batch_number'        => $batchNo,
            'transaction_type'    => $movementType,
            'adjustment_type'     => $movementType === 'adjustment' ? $request->adjustment_type : null,
            'quantity'            => $quantity,
            // 'unit'                => $request->unit,
            'source_location'     => $request->source_location,
            'destination_location'=> $request->destination_location,
            'remarks'             => $request->remarks,
            'reason'              => $request->reason,
            'reference_id'        => $request->input('reference_id'),
            'reference_type'      => $request->input('reference_type'),
            'performed_by'        => auth()->id(),
            'disposal_method_id' => $request->input('disposal_method'),
            'guard'               => $guard,
            'transaction_date'    => $request->transaction_date,
            'calendar_year'       => $year,
        ]);

        return $movement
            ? response()->json([
                'status' => 'success',
                'message' => ucfirst($movementType) . ' recorded successfully.',
                'current_balance' => $this->getChemicalBalance($companyChemicalId)
            ])
            : response()->json(['status' => 'error', 'message' => 'Transaction failed.'], 500);
    }


    /**
     * 📊 Get chemical stock movement report (by time period)
     */
    public function getChemicalStockAnalysis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'period' => 'nullable|string|in:today,this_week,last_week,this_month,last_month,this_year,last_year',
            'company_chemical_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ]);
        }

        $period = $request->query('period');
        $id = $request->query('company_chemical_id');
        $movements = ChemicalStockMovement::where('company_chemical_id', $id);

        switch ($period) {
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
                break;
        }

        $data = $movements->orderBy('movement_date', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'total' => $data->sum('quantity'),
            'movements' => $data
        ]);
    }

    public function getBatches(Request $request, $company_id)
    {
        $chemicalId = $request->query('chemical_id');

        // ✅ Validate input
        if (!$chemicalId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Missing chemical_id parameter.'
            ], 400);
        }

        // ✅ Fetch distinct batch numbers (avoid duplicates)
        $batches = ChemicalStockMovement::where('company_id', $company_id)
            ->where('company_chemical_id', $chemicalId)
            ->whereNotNull('batch_number')
            ->where('batch_number', '!=', 'DEFAULT')
            ->select('batch_number as batch_no')
            ->distinct()
            ->orderBy('batch_no', 'asc')
            ->get();

        $availableBalance = $this->getChemicalBalance($chemicalId);

        // ✅ Return structured JSON response
        return response()->json([
            'status' => 'success',
            'count' => $batches->count(),
            'batches' => $batches,
            'available_balance' => $availableBalance
        ]);
    }

    public function getBatchAvailableQuantity(Request $request, $company_id) {
        $batch_no = $request->query('batch_no');
        $company_chemical_id = $request->query('company_chemical_id');
        if (!$batch_no || !$company_chemical_id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Missing batch_no or company_chemical_id parameter.'
            ], 400);
        }
        $balance = $this->getChemicalBalanceByBatch($company_chemical_id, $batch_no);
        return response()->json([
            'status' => 'success',
            'batch_no' => $batch_no,
            'available_balance' => $balance
        ]);
    }
}
