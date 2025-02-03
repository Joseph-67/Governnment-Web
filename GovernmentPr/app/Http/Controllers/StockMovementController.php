<?php

namespace App\Http\Controllers;

use App\Models\stock_movement;
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
    public function getTotalCheckIn($companyMaterialId)
    {
        //
        $totalCheckIn = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'in')->sum('quantity');
        return $totalCheckIn;
    }

    public function getTotalTransfer($companyMaterialId)
    {
        //
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'transfer')->sum('quantity');
        return $totalTransfer;
    }

    public function getTotalAdjustment($companyMaterialId)
    {
        //
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'adjustment')->sum('quantity');
        return $totalAdjustment;
    }

    public function getTotalCheckOut($companyMaterialId)
    {
        //
        $totalCheckOut = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'out')->sum('quantity');
        return $totalCheckOut;
    }

    public function getBalance($companyMaterialId) {
        $balance = $this->getTotalCheckIn($companyMaterialId) - $this->getTotalTransfer($companyMaterialId) + $this->getTotalAdjustment($companyMaterialId) - $this->getTotalCheckOut($companyMaterialId);
        return $balance; 
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

    public function store_chemical_checkin(Request $request)
    {
        //
        // dd($request);
        $validator = Validator::make($request->all(), [
            'checkIn_chemical_id'   =>  ['required', 'numeric'],
            'chemical_id'           =>  ['required', 'numeric'],
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
            'companyChemicalId'  => $request['checkIn_chemical_id'],
            'chemicalID'        => $request['chemical_id'],
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
                'message' => 'Chemical checked in successfully.',
                // 'company_material_price' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Chemical failed to check in.');
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

        $availableBalance = $this->getBalance($request['checkOut_material_id']);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock_movement  $stock_movement
     * @return \Illuminate\Http\Response
     */
    public function show(stock_movement $stock_movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock_movement  $stock_movement
     * @return \Illuminate\Http\Response
     */
    public function edit(stock_movement $stock_movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock_movement  $stock_movement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock_movement $stock_movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock_movement  $stock_movement
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock_movement $stock_movement)
    {
        //
    }
}
