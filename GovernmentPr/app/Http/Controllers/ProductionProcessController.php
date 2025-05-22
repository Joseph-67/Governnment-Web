<?php

namespace App\Http\Controllers;
use App\Models\productionprocess;
use App\Models\ProductionBatchTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductionProcessController extends Controller
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
    'company_id' => 'required|integer|exists:companies,company_id',
    'batch_id' => 'required|exists:production_batch_tracking,batch_id', // ✅ corrected table
    'operation_type' => 'required|string|max:255',
    'process_start_date' => 'required|date',
    'process_end_date' => 'required|date|after:process_start_date',
    'operator' => 'required|exists:users,id',
    'process_status' => 'required|string|in:Pending,In Progress,Completed',
    'remarks' => 'nullable|string|max:1000'
]);

if ($validator->fails()) {
    return response()->json([
        'status' => 'error',
        'message' => $validator->errors(),
    ], 422);
}

try {
    $productionProcess = productionprocess::create([
        'company_id' => $request->company_id,
        'batch_id' => $request->batch_id,
        'operation_type' => $request->operation_type,
        'start_time' => $request->process_start_date,
        'end_time' => $request->process_end_date,
        'operator_id' => $request->operator,
        'status' => $request->process_status ?? 'Completed',
        'remarks' => $request->remarks
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Production process created successfully.',
        'data' => $productionProcess
    ], 201);
} catch (\Exception $e) {
    return response()->json([
        'status' => 'error',
        'message' => 'Failed to create production process.',
        'error' => $e->getMessage()
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
