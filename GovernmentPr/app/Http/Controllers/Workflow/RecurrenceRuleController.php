<?php

namespace App\Http\Controllers\Workflow;
use App\Http\Controllers\Controller;

use App\Models\Workflow\RecurrenceRule;
use Illuminate\Http\Request;

class RecurrenceRuleController extends Controller
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
     * Get all recurrence rules for a specific company.
     *
     * @param int $companyId
     * @return \Illuminate\Http\Response
     */
    public function getRecurrenceRulesByCompany($companyId)
    {
        $rules = RecurrenceRule::where('company_id', $companyId)->get();
        return response()->json([
            'recurrence_rules' => $rules,
            'message' => 'Recurrence rules retrieved successfully.',
            'status' => 'success'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RecurrenceRule $recurrenceRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecurrenceRule $recurrenceRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecurrenceRule $recurrenceRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecurrenceRule $recurrenceRule)
    {
        //
    }
}
