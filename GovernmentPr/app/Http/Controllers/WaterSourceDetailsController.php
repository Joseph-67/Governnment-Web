<?php

namespace App\Http\Controllers;
use App\Models\WaterSourceDetails;
use App\Models\WaterSources;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class WaterSourceDetailsController extends Controller
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
        $validator = Validator::make($request->all(), [
            'company_id'       => ['required', 'numeric'],
            'location'         => ['required', 'string', 'max:255'],
            'capacity'         => ['nullable', 'numeric', 'min:1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $result = WaterSourceDetails::create([
            'companyID'          => $request->company_id,
            'company_water_source_id'    => $request->water_source_id,
            'location'        => $request->location,
            'capacity'        => $request->capacity,
            'status'          => "active",
        ]);

        if ($result) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Water source details added successfully.',
                'data'    => $result
            ], 200);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to add water source details.',
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
