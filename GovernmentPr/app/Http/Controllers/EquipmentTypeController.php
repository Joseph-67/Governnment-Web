<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EquipmentTypeController extends Controller
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
            'equipment_type_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('equipment_types', 'name')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->input('company_id'));
                }),
            ],
            'equipment_type_description' => 'nullable|string|max:500',
            'company_id' => 'required|integer|exists:companies,company_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status' => 'error',
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $equipmentType = new EquipmentType();
            $equipmentType->name = $request->input('equipment_type_name');
            $equipmentType->description = $request->input('equipment_type_description');
            $equipmentType->company_id = $request->input('company_id');
            $equipmentType->save();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create equipment type.',
            'error' => $e->getMessage(),
            ], 500);
        }

        $activeEquipmentTypes = EquipmentType::where('company_id', $request->input('company_id'))
        ->active()
        ->get(['equipment_type_id', 'name']);
        return response()->json([
            'status' => 'success',
            'message' => 'Equipment type created successfully.',
            'equipment_types' => $activeEquipmentTypes,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentType $equipmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentType $equipmentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'equipment_type_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('equipment_types', 'name')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->input('company_id'))
                                 ->where('equipment_type_id', '!=', $request->input('equipment_type_id'));
                }),
            ],
            'equipment_type_description' => 'nullable|string|max:500',
            'company_id' => 'required|integer|exists:companies,company_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $equipmentType = EquipmentType::findOrFail($request->input('equipment_type_id'));
            $equipmentType->name = $request->input('name');
            $equipmentType->description = $request->input('description');
            $equipmentType->company_id = $request->input('company_id');
            $equipmentType->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update equipment type.',
                'error' => $e->getMessage(),
            ], 500);
        }

        $activeEquipmentTypes = EquipmentType::where('company_id', $request->input('company_id'))
            ->active()
            ->get(['equipment_type_id', 'name']);
        return response()->json([
            'status' => 'success',
            'message' => 'Equipment type updated successfully.',
            'equipment_types' => $activeEquipmentTypes,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentType $equipmentType)
    {
        //
    }
}
