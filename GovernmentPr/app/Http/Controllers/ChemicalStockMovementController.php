<?php

namespace App\Http\Controllers;

use App\Models\ChemicalStockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Carbon\Carbon;
class ChemicalStockMovementController extends WaterStockMovementController
// use App\Http\Controllers\WaterStockMovementController;
// use App\Http\Controllers\ChemicalStockMovementController;
{

    public function getTotalCheckIn($companyChemicalId)
    {
        $totalCheckIn = ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('movement_type', 'in')->sum('quantity');
        return $totalCheckIn;
    }

    public function getTotalTransfer($companyChemicalId)
    {
        $totalTransfer = ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('movement_type', 'transfer')->sum('quantity');
        return $totalTransfer;
    }

    public function getTotalAdjustment($companyChemicalId)
    {
        $totalAdjustment = ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('movement_type', 'adjustment')->sum('quantity');
        return $totalAdjustment;
    }

    public function getTotalCheckOut($companyChemicalId)
    {
        $totalCheckOut = ChemicalStockMovement::where('company_chemical_id', $companyChemicalId)
            ->where('movement_type', 'out')->sum('quantity');
        return $totalCheckOut;
    }

    public function getChemicalBalance($companyChemicalId) {
        $balance = $this->getTotalCheckIn($companyChemicalId) - $this->getTotalTransfer($companyChemicalId) + $this->getTotalAdjustment($companyChemicalId) - $this->getTotalCheckOut($companyChemicalId);
        return $balance; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_chemical_checkin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checkIn_chemical_id'   =>  ['required', 'numeric'],
            'chemical_id'           =>  ['required', 'numeric'],
            'company_id'            =>  ['required', 'numeric'],
            'quantity'              =>  ['required', 'numeric', 'min:1'],
            'date'                  =>  ['required', 'date'],
            'remark'                =>  ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        if (!empty($request['date'])) {
            $year = Carbon::parse($request->input('date'))->year;
        }

        $result = ChemicalStockMovement::create([
            'company_chemical_id'  => $request['checkIn_chemical_id'],
            'chemical_id'         => $request['chemical_id'],
            'company_id'          => $request['company_id'],
            'movement_type'      => 'in',
            'quantity'           => $request['quantity'],
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
        ]);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Chemical checked in successfully.',
            ]);
        } else {
            $validator->errors()->add('creation_error', 'Chemical failed to check in.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    public function store_chemical_checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checkout_chemical_id' => ['required', 'numeric'],
            'chemical_id'          => ['required', 'numeric'],
            'company_id'           => ['required', 'numeric'],
            'quantity'             => ['required', 'numeric', 'min:1'],
            'date'                 => ['required', 'date'],
            'remark'               => ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $availableBalance = $this->getChemicalBalance($request['checkout_chemical_id']);

        if ($availableBalance <= 0) {
            $validator->errors()->add('balance_error', 'No chemical stock is available. The balance is 0.');
            return response()->json([
            'status' => 'error',
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
            'available_balance' => $availableBalance
            ], 400);
        } elseif ($request['quantity'] > $availableBalance) {
            $validator->errors()->add('balance_error', 'The quantity demanded exceeds the available chemical stock balance.');
            return response()->json([
            'status' => 'error',
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
            'available_balance' => $availableBalance
            ], 400);
        }

        if (!empty($request['date'])) {
            $year = Carbon::parse($request->input('date'))->year;
        }

        $result = ChemicalStockMovement::create([
            'company_chemical_id'  => $request['checkout_chemical_id'],
            'chemical_id'         => $request['chemical_id'],
            'company_id'          => $request['company_id'],
            'movement_type'      => 'out',
            'quantity'           => $request['quantity'],
            'calendar_year'      => $year,
            'movement_date'      => $request['date'],
            'remark'             => $request['remark'],
        ]);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Chemical checked out successfully.',
            ]);
        } else {
            $validator->errors()->add('creation_error', 'Chemical failed to check out.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChemicalStockMovement  $chemicalStockMovement
     * @return \Illuminate\Http\Response
     */
    public function getChemicalStockAnalysis(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'period' => 'nullable|string|in:today,this_week,last_week,this_month,last_month,this_year,last_year',
            'company_chemical_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $query = $request->query('period');
        $companyChemicalId = $request->query('company_chemical_id');
        // dd($query);
        
        $movements = ChemicalStockMovement::where('company_chemical_id', $companyChemicalId);

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
