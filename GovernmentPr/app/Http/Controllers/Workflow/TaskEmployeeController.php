<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;

use App\Models\Workflow\TaskEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskEmployeeController extends Controller
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
            'task_id' => 'required|integer|exists:tasks,id',
            'employee_id' => 'required|integer|exists:employees,id',
            'assigned_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $taskEmployee = TaskEmployee::create([
            'task_id' => $request->input('task_id'),
            'employee_id' => $request->input('employee_id'),
            'assigned_at' => $request->input('assigned_at'),
        ]);

        return response()->json(['data' => $taskEmployee], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskEmployee $taskEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskEmployee $taskEmployee)
    {
        //
    }
}
