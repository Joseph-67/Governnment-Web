<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;

use App\Models\Workflow\TaskSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Get all schedules for a specific task.
     *
     * @param int $taskId
     * @return \Illuminate\Http\Response
     */
    public function getSchedulesByTask($taskId)
    {
        $schedules = TaskSchedule::where('task_id', $taskId)
        ->with(['recurrenceRule'])
        ->get();
        return response()->json([
            'task_schedules' => $schedules,
            'message' => 'Task schedules retrieved successfully.',
            'status' => 'success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|integer|exists:companies,company_id',
            'task_id' => 'required|integer|exists:company_stage_tasks,stage_task_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed', 'cancelled']),
            ],
            'is_recurrence' => 'boolean',
            'recurrence_rule_id' => 'nullable|integer|exists:recurrence_rules,recurrence_rule_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $taskSchedule = TaskSchedule::create([
            'task_id' => $request->input('task_id'),
            'start_time' => $request->input('start_date'),
            'end_time' => $request->input('end_date'),
            'status' => $request->input('status'),
            'is_recurrence' => $request->input('is_recurrence', false),
            'recurrence_rule_id' => $request->input('recurrence_rule_id', null),
            'company_id' => $request->input('company_id'), // Assuming the user is
        ]);

        return response()->json([
            'message' => 'Task schedule created successfully.',
            'task_schedule' => $taskSchedule,
            'status' => 'success'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskSchedule $taskSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskSchedule $taskSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskSchedule $taskSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskSchedule $taskSchedule)
    {
        //
    }
}
