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
    // Validate request inputs
    $validated = $request->validate([
        'company_id'         => 'required|integer|exists:companies,company_id',
        'batch_id'           => 'required|exists:production_batch_tracking,batch_id',
        'operation_type'     => 'required|string|max:255',
        'process_start_date' => 'required|date',
        'process_end_date'   => 'required|date|after_or_equal:process_start_date',
        'operator'           => 'required|exists:users,id',
        'process_status'     => 'required|string|in:Pending,In Progress,Completed',
        'remarks'            => 'nullable|string|max:1000'
    ]);
       

    try {
        // Create new production process record
        $productionProcess = productionprocess::create([
            'company_id'    => $validated['company_id'],
            'batch_id'      => $validated['batch_id'],
            'operation_type'=> $validated['operation_type'],
            'start_time'    => $validated['process_start_date'],
            'end_time'      => $validated['process_end_date'],
            'operator_id'   => $validated['operator'],
            'status'        => $validated['process_status'],
            'remarks'       => $validated['remarks'] ?? null,
        ]);

      

    } catch (\Throwable $e) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to create production process.',
            'error'   => $e->getMessage()
        ], 500);
    }

      // Retrieve all production processes for the batch
        $productionProcesses = productionprocess::where('batch_id', $validated['batch_id'])
            ->with(['operator', 'company'])
            ->get();

      return response()->json([
    'status' => 'success',
    'message' => 'Production process created successfully.',
    'production_processes' => $productionProcesses
], 201);


}

public function getByBatch($batch_id)
{
    $processes = productionprocess::where('batch_id', $batch_id)
        ->with(['operator', 'company'])
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
