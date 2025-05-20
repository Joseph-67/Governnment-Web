<?php

namespace App\Http\Controllers\AnnualOperation;
use App\Http\Controllers\Controller;

use App\Models\AnnualOperation\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get activities filtered by metadata.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getActivitiesByMetadata(Request $request, $metadataId)
    {
        try {
            $activities = Activity::query()
            ->where('LogID', $metadataId)
            ->where('is_deleted', false)
            ->with('operationType')
            ->get();

            return response()->json([
            'status' => 'success',
            'data' => $activities,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve activities.',
            'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'LogID' => 'required|integer',
            'ActivityName' => 'required|string|max:255',
            'OperationTypeId' => 'required|integer',
            'ActivityStartDate' => 'required|date',
            'ActivityEndDate' => 'required|date|after_or_equal:ActivityStartDate',
            'Objective' => 'nullable|string',
            'Description' => 'nullable|string',
            'MaterialUsage' => 'nullable|string',
            'ChemicalUsage' => 'nullable|string',
            'WaterUsage' => 'nullable|string',
            'Priority' => 'nullable|integer',
            'Tags' => 'nullable|string',
        ]);

        try {
            $activity = Activity::create($validatedData);

            return response()->json([
                'status' => 'success',
                'data' => $activity,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create activity.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnnualOperation\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnnualOperation\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnnualOperation\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnnualOperation\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
