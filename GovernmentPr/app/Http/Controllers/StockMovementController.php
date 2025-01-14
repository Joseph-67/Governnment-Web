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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'checkIn_material_id'   =>  ['required', 'numeric'],
            'quantity'              =>  ['required', 'numeric'],
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
                'message' => 'Material added successfully.',
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
