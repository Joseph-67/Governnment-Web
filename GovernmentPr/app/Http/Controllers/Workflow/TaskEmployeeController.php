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
                $validator = Validator::make($request->all(), [
                    'company_id'     => 'required|integer|exists:companies,company_id',
                    'task_id'        => 'required|integer|exists:company_stage_tasks,stage_task_id',
                    'employee_ids'   => 'required|array',
                    'employee_ids.*' => 'integer|exists:company_employees,EmployeeID',
                    'assigned_at'    => 'nullable|date',
                    'assignment_note'=> 'nullable|string'
                ]);

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

                try {
                    $created = [];
                    foreach ($request->employee_ids as $employeeId) {
                        $existing = TaskEmployee::where('task_id', $request->task_id)
                            ->where('employee_id', $employeeId)
                            ->first();

                        if (!$existing) {
                            $created[] = TaskEmployee::create([
                                'company_id' => $request->company_id,
                                'task_id'    => $request->task_id,
                                'employee_id'=> $employeeId,
                                'assigned_at'=> $request->assigned_at,
                                'comments'   => $request->assignment_note,
                            ]);
                        }
                    }

                    return response()->json([
                        'status'        => 'success',
                        'message'       => 'Task Employees assigned successfully.',
                        'task_employees'=> $created
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'Failed to create TaskEmployee.',
                        'error'   => $e->getMessage()
                    ], 500);
                }
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
