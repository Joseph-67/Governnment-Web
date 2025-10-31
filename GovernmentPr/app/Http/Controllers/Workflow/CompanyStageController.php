<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;

use App\Models\CompanyStage;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CompanyStageController extends Controller
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
     * Get all stages for a given workflow.
     */
    
    public function getStagesByWorkflow($workflowId)
    {
        $stages = CompanyStage::where('workflow_id', $workflowId)
            ->orderBy('sequence')
            ->get(['stage_id', 'name', 'description', 'sequence', 'status']);

        return response()->json([
            'status' => 'success',
            'stages' => $stages
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'stage_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('company_stages', 'name')->where(function ($query) use ($request) {
                    return $query->where('workflow_id', $request->workflow_id);
                }),
            ],
            'workflow_id' => 'required|exists:company_workflows,workflow_id',
            'company_id' => 'required|exists:companies,company_id',
            'stage_description' => 'nullable|string|max:1000',
            'stage_sequence_order' => 'required|integer|min:0',
            'stage_status' => [
                'required',
                'string',
                Rule::in(['Pending', 'In Progress', 'Completed', 'Cancelled']),
            ],
            // Add other fields and rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        // Map request fields to model fields
        $companyStage = CompanyStage::create([
            'company_id'   => $validated['company_id'],
            'workflow_id'  => $validated['workflow_id'],
            'name'         => $validated['stage_name'],
            'description'  => $validated['stage_description'] ?? null,
            'sequence'     => $validated['stage_sequence_order'],
            'status'       => $validated['stage_status'],
        ]);

        $allStages = CompanyStage::where('workflow_id', $validated['workflow_id'])
        ->orderBy('sequence')
        ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Company stage created successfully.',
            'stages' => $allStages
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $companyStage = CompanyStage::with('tasks')->find($id);
        if (!$companyStage) {
            return response()->json(['status' => 'error', 'message' => 'Company stage not found.'], 404);
        }
        return response()->json([
            'status' => 'success',
            'company_stage' => $companyStage,
            'message' => 'Company stage retrieved successfully.'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStage $companyStage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'stage_id' => 'required|exists:company_stages,stage_id',
            'stage_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('company_stages', 'name')->ignore($request->stage_id, 'stage_id')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
            'company_id' => 'required|exists:companies,company_id',
            'stage_description' => 'nullable|string|max:1000',
            'stage_sequence_order' => 'required|integer|min:0',
            'stage_status' => [
                'required',
                'string',
                Rule::in(['pending', 'in_progress', 'completed', 'cancelled', 'halted']),
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        // try {
            $validated = $validator->validated();

        try {
            // Find the company stage by ID
            $companyStage = CompanyStage::find($validator->validated()['stage_id']);
            // Update the company stage with validated data
            $companyStage->name = $validator->validated()['stage_name'];
            $companyStage->description = $validator->validated()['stage_description'] ?? null;
            $companyStage->sequence = $validator->validated()['stage_sequence_order'];
            $companyStage->status = $validator->validated()['stage_status'];
            $companyStage->save();

            // Get all stages for the workflow after update
            $allStages = CompanyStage::where('workflow_id', $companyStage->workflow_id)
                ->orderBy('sequence')
                ->get();
                
            // Return a success response with the updated stages
            return response()->json([
                'status' => 'success',
                'message' => 'Company stage updated successfully.',
                'stages' => $allStages
            ] , 200);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error', 
            'message' => 'Failed to update company stage.',
            'error' => $e->getMessage()
            ], 500);
        }
    }

/**
     * Update the estimated time for the specified resource.
     */
    public function updateEstimatedTime(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'stage_id' => 'required|exists:company_stages,stage_id',
            'estimated_time' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        // Find the company stage by ID
        $companyStage = CompanyStage::find($validator->validated()['stage_id']);

        try {
            // Update the estimated time
            $companyStage->estimated_time = $validator->validated()['estimated_time'];
            $companyStage->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Estimated time updated successfully.',
                'company_stage' => $companyStage
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Failed to update estimated time.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStage $companyStage)
    {
        //
    }
    
}
