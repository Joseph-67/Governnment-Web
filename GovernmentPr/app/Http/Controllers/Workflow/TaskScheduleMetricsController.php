<?php

namespace App\Http\Controllers\Workflow;

use App\Models\Workflow\TaskScheduleMetrics;
use App\Models\Workflow\CompanyStageTask;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TaskScheduleMetricsController extends Controller
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
    public function getMetricsByTask($task_schedule_id)
{
    $taskScheduleMetrics = TaskScheduleMetrics::where('task_schedule_id', $task_schedule_id)->get();

    return response()->json([
        'status' => 'success',
        'task_schedule_metrics' => $taskScheduleMetrics
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
        //
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'company_id' => ['required', 'exists:companies,company_id'],
            'task_schedule_id' => ['required', 'exists:task_schedules,task_schedule_id'],
            'expected_chemical_quantity' => ['required', 'numeric', 'min:0'],
            'expected_material_quantity' => ['required', 'numeric', 'min:0'],
            'expected_water_quantity' => ['required', 'numeric', 'min:0'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $taskScheduleMetric = TaskScheduleMetrics::create([
            'company_id' => $request->company_id,
            'task_schedule_id' => $request->task_schedule_id,
            'expected_chemical_quantity' => $request->expected_chemical_quantity,
            'expected_material_quantity' => $request->expected_material_quantity,
            'expected_water_quantity' => $request->expected_water_quantity,
            'status' => $request->status ?? 'active'
            ]);

            return response()->json([
            'status' => 'success',
            'message' => 'Task Metric created successfully.',
            'task_schedule_metrics' => $taskScheduleMetric
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create Task Schedule Metric.',
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
