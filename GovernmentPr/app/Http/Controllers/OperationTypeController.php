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
            'name' => ['required', 'string', 'max:255', 'unique:operation_types,name'],
            'description' => ['nullable', 'string'],
            'company_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $operationType = OperationType::create($request->only(['name', 'description', 'company_id']));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Operation Type', 'message' => $e->getMessage()], 500);
        }
        $operationType = OperationType::where('is_delete', false)->get();
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
    public function update(Request $request, OperationType $operationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationType $operationType)
    {
        //
    }
}
