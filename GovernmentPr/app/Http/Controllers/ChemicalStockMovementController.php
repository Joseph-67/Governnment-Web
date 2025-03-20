<?php

namespace App\Http\Controllers;

use App\Models\ChemicalStockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Carbon\Carbon;
class ChemicalStockMovementController extends Controller
{

    public function getTotalCheckIn($companyChemicalId)
    {
        $totalCheckIn = ChemicalStockMovement::where('companyChemicalId', $companyChemicalId)
            ->where('movement_type', 'in')->sum('quantity');
        return $totalCheckIn;
    }

    public function getTotalTransfer($companyChemicalId)
    {
        $totalTransfer = ChemicalStockMovement::where('companyChemicalId', $companyChemicalId)
            ->where('movement_type', 'transfer')->sum('quantity');
        return $totalTransfer;
    }

    public function getTotalAdjustment($companyChemicalId)
    {
        $totalAdjustment = ChemicalStockMovement::where('companyChemicalId', $companyChemicalId)
            ->where('movement_type', 'adjustment')->sum('quantity');
        return $totalAdjustment;
    }

    public function getTotalCheckOut($companyChemicalId)
    {
        $totalCheckOut = ChemicalStockMovement::where('companyChemicalId', $companyChemicalId)
            ->where('movement_type', 'out')->sum('quantity');
        return $totalCheckOut;
    }

    public function getBalance($companyChemicalId) {
        $balance = $this->getTotalCheckIn($companyChemicalId) - $this->getTotalTransfer($companyChemicalId) + $this->getTotalAdjustment($companyChemicalId) - $this->getTotalCheckOut($companyChemicalId);
        return $balance; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
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

        $balance = $this->getBalance($request['checkout_chemical_id']);
        if ($balance < $request['quantity']) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Insufficient inventory balance.',
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
    public function show(ChemicalStockMovement $chemicalStockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChemicalStockMovement  $chemicalStockMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(ChemicalStockMovement $chemicalStockMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChemicalStockMovement  $chemicalStockMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChemicalStockMovement $chemicalStockMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChemicalStockMovement  $chemicalStockMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChemicalStockMovement $chemicalStockMovement)
    {
        //
    }
}
