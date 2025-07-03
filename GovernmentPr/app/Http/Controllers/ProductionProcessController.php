<?php

namespace App\Http\Controllers;
use App\Models\productionprocess;
use App\Models\ProductionBatchTracking;
use App\Models\CompanyWorkflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    
 public function store(Request $request)
{
    $validated = $request->validate([
        'company_id'         => 'required|integer|exists:companies,company_id',
        'batch_id'           => 'required|exists:production_batch_tracking,batch_id',
        'workflow'           => 'required|string|max:255',
        'process_start_date' => 'required|date',
        'process_end_date'   => 'required|date|after_or_equal:process_start_date',
        'operator'           => 'required|exists:users,id',
        'process_status'     => 'required|string|in:Pending,In Progress,Completed',
        'remarks'            => 'nullable|string|max:1000'
    ]);

    try {
        productionprocess::create([
            'company_id'    => $validated['company_id'],
            'batch_id'      => $validated['batch_id'],
            'workflow_id'   => $validated['workflow'],
            'start_time'    => $validated['process_start_date'],
            'end_time'      => $validated['process_end_date'],
            'operator_id'   => $validated['operator'],
            'status'        => $validated['process_status'],
            'remarks'       => $validated['remarks'] ?? null,
        ]);

        $processes = productionprocess::with(['operator', 'company', 'workflow'])
            ->where('batch_id', $validated['batch_id'])
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Production process created successfully.',
            'production_processes' => $processes
        ], 201);

    } catch (\Throwable $e) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to create production process.',
            'error'   => $e->getMessage()
        ], 500);
    }
}


public function getByBatch($batch_id)
{
    $processes = productionprocess::with(['workflow', 'company', 'operator'])
        ->where('batch_id', $batch_id)
        ->get();

    return response()->json([
        'status' => 'success',
        'production_processes' => $processes
    ]);
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
    public function update(Request $request)
{
    $validator = Validator::make($request->all(), [
        'process_id' => 'required|exists:productionprocesses,process_id',
        'workflow' => 'required|exists:company_workflows,workflow_id',
        'process_start_date' => 'required|date',
        'process_end_date' => 'required|date|after_or_equal:process_start_date',
        'process_status' => ['required', Rule::in(['Pending', 'In Progress', 'Completed'])],
        'remarks' => 'nullable|string|max:1000'
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    }

    $validated = $validator->validated();

    $process = productionprocess::findOrFail($validated['process_id']);
    $process->update([
        'workflow_id' => $validated['workflow'],
        'start_time' => $validated['process_start_date'],
        'end_time' => $validated['process_end_date'],
        'status' => $validated['process_status'],
        'remarks' => $validated['remarks'] ?? null,
    ]);

    $processes = productionprocess::with(['operator', 'company', 'workflow'])
        ->where('batch_id', $process->batch_id)
        ->get();

    return response()->json([
        'status' => 'success',
        'message' => 'Production process updated successfully.',
        'production_processes' => $processes
    ]);
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
        // Validate the ID
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:productionprocesses,process_id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        // Find the production process by ID
        $process = productionprocess::find($id);
        if (!$process) {
            return response()->json([
            'status' => 'error',
            'message' => 'Production process not found.'
            ], 404);
        }
        // Attempt to delete the production process
        try {
            $process->delete();
            return response()->json([
            'status' => 'success',
            'message' => 'Production process deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to delete production process.',
            'error' => $e->getMessage()
            ], 500);
        }
        
    }
}
