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
            Rule::unique('company_stage_tasks', 'task_name')
                ->where(fn($query) => $query
                ->where('company_stage_id', $request->input('stage_id'))
                ->where('company_id', $request->input('company_id'))
                ->where('is_deleted', false)
                ),
            ],
            'task_description' => 'nullable|string',
            'stage_id' => 'required|exists:company_stages,stage_id',
            'supervisor_ids' => 'nullable|array',
            'supervisor_ids.*' => 'integer|exists:company_employees,EmployeeID',
            'task_due_date' => 'nullable|date',
            'task_priority' => 'nullable|in:low,medium,high',
            'task_status' => 'nullable|in:pending,completed,overdue,in_progress,cancelled',
            'task_tag_ids' => 'nullable|array',
            'task_tag_ids.*' => 'integer|exists:tags,tagID',
            'company_id' => 'required|exists:companies,company_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        try {
            $validated = $validator->validated();

            $stageTask = CompanyStageTask::create([
                'company_id'         => $validated['company_id'],
                'company_stage_id'   => $validated['stage_id'],
                'task_name'          => $validated['task_title'],
                'description'        => $validated['task_description'] ?? null,
                'due_date'           => $validated['task_due_date'] ?? null,
                'priority'           => $validated['task_priority'] ?? null,
                'status'             => $validated['task_status'] ?? null,
                'supervisor_ids'     => json_encode($validated['supervisor_ids'] ?? []),
                'task_tag_ids'       => json_encode($validated['task_tag_ids'] ?? []),
                'created_by'         => auth()->id(),
                'guard'              => auth()->check() ? auth()->guard()->getName() : null,
            ]);

            $allTasks = CompanyStageTask::where([
                    ['company_id', '=', $validated['company_id']],
                    ['company_stage_id', '=', $validated['stage_id']],
                    ['is_deleted', '=', false],
                ])
                ->get();

            return response()->json([
                'status'    => 'success',
                'message'   => 'Stage task created successfully',
                'data'      => $stageTask,
                'all_tasks' => $allTasks,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create task. Please try again.',
                'error'   => $e->getMessage(),
            ], 500);
        }

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