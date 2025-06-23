<?php

namespace App\Http\Controllers;


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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_stage_id' => 'required|exists:company_stages,id',
            'supervisor_ids' => 'nullable|array',
            'supervisor_ids.*' => 'exists:company_employees,id',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|in:low,medium,high',
            'status' => 'nullable|in:pending,completed,overdue',
            'task_tag_ids' => 'nullable|array',
            'task_tag_ids.*' => 'exists:task_tags,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $stageTask = CompanyStageTask::create([
            'company_id' => $request->input('company_id'),
            'company_stage_id' => $request->input('company_stage_id'),
            'task_name' => $request->input('name'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status'),
            'supervisor_ids' => $request->input('supervisor_ids') ? json_encode($request->input('supervisor_ids')) : null,
            'task_tag_ids' => $request->input('task_tag_ids') ? json_encode($request->input('task_tag_ids')) : null,
            
        ]);

        return response()->json(['message' => 'Stage task created successfully', 'data' => $stageTask], 201);
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