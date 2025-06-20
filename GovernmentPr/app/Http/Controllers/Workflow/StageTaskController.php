<?php

namespace App\Http\Controllers;

use App\Models\StageTask;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\HRMS\CompanyEmployees;
use App\Models\CompanyStage;
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
            'assigned_to' => 'nullable|exists:company_employees,id',
            'due_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $stageTask = StageTask::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'company_stage_id' => $request->input('company_stage_id'),
            'assigned_to' => $request->input('assigned_to'),
            'due_date' => $request->input('due_date'),
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