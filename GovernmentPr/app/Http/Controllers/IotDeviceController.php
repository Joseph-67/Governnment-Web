<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IotDevice;
use Illuminate\Support\Facades\Validator;


class IotDeviceController extends Controller
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
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'device_name' => 'required|string|max:255',
            'device_location' => 'required|string|max:255',
            'last_maintenance_date' => 'nullable|date'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $iotDevice = new IotDevice();
        $iotDevice->device_name = $request->device_name;
        $iotDevice->company_id = $request->company_id;
        $iotDevice->device_location = $request->device_location;
        $iotDevice->last_maintenance_date = $request->last_maintenance_date;
        $iotDevice->status = 'Active';
        $iotDevice->save();
        return response()->json([
            'status' => 'success',
            'message' => 'IotDevice created successfully',
            'iotDevice' => $iotDevice
        ], 201);
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
