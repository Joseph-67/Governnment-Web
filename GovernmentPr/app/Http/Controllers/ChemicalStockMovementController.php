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
            'company_chemical_id' => ['required', 'numeric'],
            'chemical_id'         => ['required', 'numeric'],
            'company_id'          => ['required', 'numeric'],
            'quantity'            => ['required', 'numeric', 'min:0.001'],
            'date'                => ['required', 'date'],
            'remark'              => ['nullable', 'string', 'min:3'],
            'source'              => ['nullable', 'string'],
            'destination_location'=> ['nullable', 'string'],
            'batch_no'            => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $companyChemicalId = $request->input('company_chemical_id');
        $availableBalance = $this->getChemicalBalance($companyChemicalId);
        $quantity = $request->input('quantity');
        $year = Carbon::parse($request->input('date'))->year;
        $guard = Auth::getDefaultDriver();

        // Validate for outflow actions
        if (in_array($movementType, ['checkout', 'transfer', 'disposal']) && $quantity > $availableBalance) {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient stock for this operation.',
                'available_balance' => $availableBalance
            ], 400);
        }

        $result = ChemicalStockMovement::create([
            'company_chemical_id' => $companyChemicalId,
            'chemical_id' => $request->chemical_id,
            'company_id' => $request->company_id,
            'transaction_type' => $movementType,
            'batch_number' => $request->batch_no,
            'quantity' => $quantity,
            'calendar_year' => $year,
            'transaction_date' => $request->date,
            'source_location' => $request->source,
            'destination_location' => $request->destination_location,
            'batch_no' => $request->batch_no,
            'remark' => $request->remark,
            'guard' => $guard,
            'performed_by' => auth()->id(),
        ]);

        return $result
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
}
