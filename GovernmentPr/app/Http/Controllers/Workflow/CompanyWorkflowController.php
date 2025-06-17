<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;

use App\Models\CompanyWorkflow;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CompanyWorkflowController extends Controller
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
        // Validate the request data
        // Server-side validation using Validator
        $validator = \Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'workflow_name' => 'required|string|max:255',
            'workflow_description' => 'nullable|string',
            'workflow_status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        try {
            $data = [
                'company_id' => $validator->validated()['company_id'],
                'workflow_name' => $validator->validated()['workflow_name'],
                'description' => $validator->validated()['workflow_description'] ?? null,
                'created_by' => auth(auth()->getDefaultDriver())->id(), // Get user id based on the current guard
                'guard' => auth()->getDefaultDriver(), // Get the guard of the authenticated user
                'status' => $validator->validated()['workflow_status'],
            ];
            $companyWorkflow = CompanyWorkflow::create($data);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create company workflow.',
                'error' => $e->getMessage()
            ], 500);
        }

        // Return a success response
        // Return a success response with the created company workflow
        $allCompanyWorkflows = CompanyWorkflow::where('company_id', $request->company_id)->get();

        return response()->json([
            'status' => 'success',
            'workflows' => $allCompanyWorkflows
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyWorkflow $companyWorkflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyWorkflow $companyWorkflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyWorkflow $companyWorkflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyWorkflow $companyWorkflow)
    {
        //
    }
}
