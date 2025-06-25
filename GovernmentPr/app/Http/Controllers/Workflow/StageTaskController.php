<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\HRMS\CompanyEmployees;
use App\Models\CompanyStage;
use App\Models\CompanyStageTask;
use App\Models\TaskTag;
use App\Models\Company;

class StageTaskController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'task_title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('company_stage_tasks', 'task_name')->where(function ($query) use ($request) {
                    return $query->where('company_stage_id', $request->input('stage_id'))
                                 ->where('company_id', $request->input('company_id'))
                                 ->where('is_deleted', false);
                }),
            ],
            'description' => 'nullable|string',
            'stage_id' => 'required|exists:company_stages,stage_id',
            'supervisor_ids' => 'nullable|array',
            'supervisor_ids.*' => 'exists:company_employees,EmployeeID',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|in:low,medium,high',
            'status' => 'nullable|in:pending,completed,overdue',
            'task_tag_ids' => 'nullable|array',
            'task_tag_ids.*' => 'exists:tags,tagID',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        $stageTask = CompanyStageTask::create([
            'company_id' => $validated['company_id'],
            'company_stage_id' => $validated['stage_id'],
            'task_name' => $validated['task_title'],
            'description' => $validated['description'] ?? null,
            'due_date' => $validated['due_date'] ?? null,
            'priority' => $validated['priority'] ?? null,
            'status' => $validated['status'] ?? null,
            'supervisor_ids' => isset($validated['supervisor_ids']) ? json_encode($validated['supervisor_ids']) : null,
            'task_tag_ids' => isset($validated['task_tag_ids']) ? json_encode($validated['task_tag_ids']) : null,
            'created_by' => auth()->id(),
            'guard' => auth()->user()->getGuardName(),
        ]);

        $allTasks = CompanyStageTask::where('company_id', $validated['company_id'])
            ->where('company_stage_id', $validated['stage_id'])
            ->where('is_deleted', false)
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Stage task created successfully',
            'data' => $stageTask,
            'all_tasks' => $allTasks
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StageTask $stageTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StageTask $stageTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StageTask $stageTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StageTask $stageTask)
    {
        //
    }
}