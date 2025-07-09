<?php

namespace App\Http\Controllers;
use App\Models\ProductionProcess;
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

    public function getProductionProcessByBatch($batch_id)
    {
        $processes = ProductionProcess::with(['workflow', 'company', 'operator'])
            ->where('batch_id', $batch_id)
            ->get();

        return response()->json([
            'status' => 'success',
            'production_processes' => $processes
        ]);
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
            'company_id' => 'required|exists:companies,company_id',
            'batch_id' => 'required|exists:production_batch_tracking,batch_id',
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

        try {
            $process = ProductionProcess::create([
            'batch_id' => $validated['batch_id'],
            'company_id' => $validated['company_id'],
            'workflow_id' => $validated['workflow'],
            'operator_id' => auth()->user()->id, // Assuming the operator is the authenticated user
            'start_time' => $validated['process_start_date'],
            'end_time' => $validated['process_end_date'],
            'status' => $validated['process_status'],
            'remarks' => $validated['remarks'] ?? null,
            ]);

            $processes = ProductionProcess::with(['workflow', 'company', 'operator'])
            ->where('batch_id', $validated['batch_id'])
            ->get();

            return response()->json([
            'status' => 'success',
            'message' => 'Production process created successfully.',
            'production_processes' => $processes
            ]);
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
    public function update(Request $request)
{
    $validator = Validator::make($request->all(), [
        'process_id' => 'required|exists:ProductionProcesses,process_id',
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

    $process = ProductionProcess::findOrFail($validated['process_id']);
    $process->update([
        'workflow_id' => $validated['workflow'],
        'start_time' => $validated['process_start_date'],
        'end_time' => $validated['process_end_date'],
        'status' => $validated['process_status'],
        'remarks' => $validated['remarks'] ?? null,
    ]);

    $processes = ProductionProcess::with(['operator', 'company', 'workflow'])
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
        $process = ProductionProcess::find($id);
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
