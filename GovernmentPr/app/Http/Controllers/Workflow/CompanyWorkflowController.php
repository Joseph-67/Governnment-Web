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
     * Get all workflows for a given company.
     */
    public function getWorkflows($company_id)
    {
        $validator = Validator::make(['company_id' => $company_id], [
            'company_id' => 'required|integer|exists:companies,company_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        // Fetch workflows with dynamic creator details
        $workflows = CompanyWorkflow::where('company_id', $company_id)
            ->select('workflow_id', 'company_id', 'workflow_name', 'description', 'created_by', 'guard', 'status', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($workflow) {
                // Fetch the creator details dynamically
                $workflow->creator = $this->fetchCreator($workflow->guard, $workflow->created_by);
                return $workflow;
            });

        return response()->json([
            'status' => 'success',
            'workflows' => $workflows
        ]);
    }

    private function fetchCreator(string $guard, int $creatorId): ?object
    {
        // Define guard-to-table mapping
        $tableMapping = [
            'admin' => 'admins',
            'employee' => 'company_employees',
            'web' => 'users',
        ];

        if (!isset($tableMapping[$guard])) {
            \Log::warning("Invalid guard '{$guard}' for creator ID: {$creatorId}");
            return null;
        }

        // Fetch creator details from the appropriate table
        return \DB::table($tableMapping[$guard])
            ->where('id', $creatorId)
            ->select('id', 'email', 'profile_photo_path', 'first_name', 'last_name', 'other_name')
            ->first();
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
            'workflow_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('company_workflows')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
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
            'message' => 'Company workflow created successfully.',
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
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'workflow_name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('company_workflows')->where(function ($query) use ($companyWorkflow) {
                return $query->where('company_id', $companyWorkflow->company_id);
            })->ignore($companyWorkflow->workflow_id, 'workflow_id'),
            ],
            'workflow_description' => 'nullable|string',
            'workflow_status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $companyWorkflow->workflow_name = $validator->validated()['workflow_name'];
            $companyWorkflow->description = $validator->validated()['workflow_description'] ?? null;
            $companyWorkflow->status = $validator->validated()['workflow_status'];
            $companyWorkflow->save();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to update company workflow.',
            'error' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Company workflow updated successfully.',
            'workflow' => $companyWorkflow
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyWorkflow $companyWorkflow, $id)
    {
        //
        // Validate the ID
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:company_workflows,workflow_id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        // Find the company workflow by ID
        $companyWorkflow = CompanyWorkflow::find($id);
        if (!$companyWorkflow) {
            return response()->json([
                'status' => 'error',
                'message' => 'Company workflow not found.'
            ], 404);
        }
        // Attempt to delete the company workflow
        // Attempt to delete the company workflow
        // Use try-catch to handle any exceptions during deletion
        try {
            $companyWorkflow->delete();
            // $allCompanyWorkflows = CompanyWorkflow::where('company_id', $companyWorkflow->company_id)->get();
            return response()->json([
                'status' => 'success',
                // 'workflows' => $allCompanyWorkflows,
                'message' => 'Company workflow deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete company workflow.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
