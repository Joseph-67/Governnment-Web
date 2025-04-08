<?php

namespace App\Http\Controllers;

use App\Models\EquipmentLog;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EquipmentLogController extends Controller
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
            'company_id'        => 'required|integer|exists:companies,company_id',
            'equipment_name'    => 'required|string|max:255',
            'equipment_code'    => 'required|string|max:255|unique:equipment_logs,equipment_code',
            'equipment_type'    => 'required|integer|exists:equipment_types,equipment_type_id',
            'equipment_model'   => 'nullable|string|max:255',
            'equipment_serial_number' => 'nullable|string|max:255',
            'equipment_brand'   => 'nullable|string|max:255',
            'equipment_capacity' => 'nullable|string|max:255',
            'equipment_location' => 'required|string|max:255',
            'equipment_condition' => 'nullable|string|max:255',
            'equipment_status'  => 'required|string|max:255',
            'purchase_date'     => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $equipmentLog = EquipmentLog::create([
            'company_id' => $request->input('company_id'),
            'equipment_name' => $request->input('equipment_name'),
            'equipment_code' => $request->input('equipment_code'),
            'equipment_type_id' => $request->input('equipment_type'),
            'equipment_model' => $request->input('equipment_model'),
            'equipment_serial_number' => $request->input('equipment_serial_number'),
            'equipment_brand' => $request->input('equipment_brand'),
            'equipment_capacity' => $request->input('equipment_capacity'),
            'equipment_location' => $request->input('equipment_location'),
            'equipment_condition' => $request->input('equipment_condition'),
            'equipment_status' => $request->input('equipment_status'),
            'purchase_date' => $request->input('purchase_date'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'error' => 'An error occurred while processing your request.', 'details' => $e->getMessage()], 500);
        }

        // Fetch all equipment logs where company_id matches the request and equipment is active
        $allEquipmentLogs = EquipmentLog::where('company_id', $request->input('company_id'))
                        ->where('is_deleted', false)
                        ->with('equipmentType')
                        ->get();
        // Return a success response
        return response()->json(['status' => 'success', 'message' => 'Equipment log created successfully.', 'equipment_logs' => $allEquipmentLogs], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentLog  $equipmentLog
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentLog $equipmentLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentLog  $equipmentLog
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentLog $equipmentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentLog  $equipmentLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentLog $equipmentLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentLog  $equipmentLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentLog $equipmentLog)
    {
        //
    }
}
