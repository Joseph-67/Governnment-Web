<?php

namespace App\Http\Controllers;
use App\Models\WaterRecyclingLog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WaterRecyclingLogsController extends Controller
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
        $validator = Validator::make($request->all(), [
            'company_id'         => ['required', 'numeric'],
            'quantity_recycled'  => ['required', 'numeric', 'min:1'],
            'unit_of_water_recycled' => ['required', 'string', 'max:20'],
            'recycling_date'     => ['required', 'date'],
            'method'             => ['nullable', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
            ], 422);
        }

        $data = [
            'companyID'        => $request->company_id,
            'quantity_recycled' => $request->quantity_recycled,
            'unit'              => $request->unit_of_water_recycled,
            'recycling_date'    => $request->recycling_date,
            'method'            => $request->method,
            'status'            => 'active',
        ];

        $result = WaterRecyclingLog::create($data);

        if ($result) {
            return response()->json([
            'status'  => 'success',
            'message' => 'Water recycling log added successfully.',
            'data'    => $result,
            ], 200);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to add water recycling log.',
        ], 500);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
