<?php

namespace App\Http\Controllers;

use App\Models\OperationType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OperationTypeController extends Controller
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

    public function get_operation_types($value)
    {
        $operation_types = OperationType::where('is_delete', false)->where('company_id', $value)->orderBy('sequence_order', 'ASC')->get(['operation_type_id', 'name', 'sequence_order', 'description', 'company_id']);
        return response()->json([
                    'status' => 'success',
                    'operation_types' => $operation_types
                ], 200);
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('operation_types')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
            'sequence_order'    => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
            'company_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $operationType = OperationType::create($request->only(['name', 'sequence_order', 'description', 'company_id','sequence_order']));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Operation Type', 'message' => $e->getMessage()], 500);
        }
        $operationType = OperationType::where('is_delete', false)->where('company_id', $request->company_id)->orderBy('sequence_order', 'ASC')->get();
        return response()->json(['status' => 'success', 'message' => 'Operation Type created successfully', 'operation_types' => $operationType], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function show(OperationType $operationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationType $operationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operation_type_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('operation_types', 'name')
                ->ignore($request->operation_type_id, 'operation_type_id') // Ignore current record
                ->where(function ($query) use ($request) { // Pass $request using use()
                    $query->where('company_id', $request->company_id); // Scope by company_id
                }),
            ],
            'operation_type_sequence_order'    => ['required', 'numeric'],
            'operation_type_description' => ['nullable', 'string'],
            'company_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $operationType = OperationType::find($request->operation_type_id);
            if (!$operationType) {
                return response()->json(['status' => 'error', 'message' => 'Operation Type not found'], 404);
            }
            
            $operationType->name = $request->operation_type_name;
            $operationType->sequence_order = $request->operation_type_sequence_order;
            $operationType->description = $request->operation_type_description;
            $operationType->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Operation Type', 'message' => $e->getMessage()], 500);
        }
        $operationType = OperationType::where('is_delete', false)->where('company_id', $request->company_id)->orderBy('sequence_order', 'ASC')->get();
        return response()->json(['status' => 'success', 'message' => 'Operation Type updated successfully', 'operation_types' => $operationType], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationType $operationType)
{
    if ($operationType) {
        $operationType->forceDelete(); // Force delete
        $operationTypes = OperationType::all(); // Renamed for clarity
        return response()->json([
            'status' => 'success',
            'message' => 'Operation Type deleted successfully',
            'operation_types' => $operationTypes
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Operation Type not found'
        ], 404);
    }
}

}
