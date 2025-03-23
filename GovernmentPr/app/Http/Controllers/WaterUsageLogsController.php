<?php

namespace App\Http\Controllers;
use App\Models\WaterSources;
use App\Models\WaterUsageLogs;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class WaterUsageLogsController extends Controller
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
        $data['waterSources'] = WaterSources::where('status', 'active')->get(['WaterSourcesId',  'sources']);

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
          //
          $validator = Validator::make($request->all(), [
            'company_id'       => ['required', 'numeric'],
            'quantity_used'     => ['required', 'string', 'max:255'],
            'unit_of_water_measured'     => ['required', 'string', 'max:255'],
            'date'     => ['required', 'string', 'max:255'],
            'purpose'     => ['nullable', 'string', 'max:255'],

            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $result = WaterUsageLogs::create([
            'companyID'          => $request->company_id,
            'WaterSourcesId'    => $request->water_source_id,
            'quantity_used'        => $request->quantity_used,
            'unit_of_water_measured'                 => $request->unit_of_water_measured,
            'date'        => $request->date,
            'purpose'        => $request->purpose,   
            'status'          => "active",
        ]);

        if ($result) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Water usage logs added successfully.',
                'data'    => $result
            ], 200);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to add water usage logs.',
            ], 500);
        }
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
