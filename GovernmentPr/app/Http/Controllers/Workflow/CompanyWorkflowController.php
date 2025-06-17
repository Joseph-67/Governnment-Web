<?php

namespace App\Http\Controllers;

use App\Models\CompanyWorkflow;
use Illuminate\Http\Request;

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
        //
        // Server-side validation using Validator
        $validator = \Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'workflow_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|integer',
            'guard' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $companyWorkflow = CompanyWorkflow::create($validator->validated());

        return response()->json($companyWorkflow, 201);
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
