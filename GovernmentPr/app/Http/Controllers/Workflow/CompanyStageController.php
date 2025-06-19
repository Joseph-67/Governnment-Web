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
        ->where('is_deleted', false)    
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
                    return $query->where('workflow_id', $request->workflow_id)->where('company_id', $request->company_id)
                        ->where('is_deleted', false); // Ensure the stage name is unique within the same workflow and company
                }),
            ],
            'workflow_id' => 'required|exists:company_workflows,workflow_id',
            'company_id' => 'required|exists:companies,company_id',
            'stage_description' => 'nullable|string|max:1000',
            'stage_sequence_order' => 'required|integer|min:0',
            'stage_status' => [
                'required',
                'string',
                Rule::in(['pending', 'in_progress', 'completed', 'cancelled']),
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
        ->where('is_deleted', false)
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
    public function show(CompanyStage $companyStage)
    {
        //
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
    public function update(Request $request, CompanyStage $companyStage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStage $companyStage, $stage_id)
    {
        $companyStage = CompanyStage::findOrFail($stage_id);
        // Soft delete the stage
        $companyStage->is_deleted = true;
        $companyStage->deleted_at = now(); // Set the deleted_at timestamp
        $companyStage->status = 'cancelled'; // Optionally update the status to 'cancelled'
        $companyStage->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Company stage deleted successfully.'
        ]);
    }
    
}
