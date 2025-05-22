<?php

namespace App\Http\Controllers\AnnualOperation;
use App\Http\Controllers\Controller;

use App\Models\AnnualOperation\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        // dd($request->all());
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'annual_op_metadata_ID' => 'required|integer',
            'annual_operation_activity_title' => 'required|string|max:255',
            'operation_activity' => 'required|integer',
            'activity_start_date' => 'required|date',
            'activity_end_date' => 'required|date|after_or_equal:activity_start_date',
            'Objectives' => 'nullable|string',
            'Description' => 'nullable|string',
            'material_used' => 'nullable|array',
            'material_used.*.material_id' => 'nullable|integer',
            'material_used.*.quantity' => 'nullable|numeric',
            'material_used.*.unit' => 'nullable|string|max:50',
            'chemical_used' => 'nullable|array',
            'chemical_used.*.chemical_id' => 'nullable|integer',
            'chemical_used.*.quantity' => 'nullable|numeric',
            'chemical_used.*.unit' => 'nullable|string|max:50',
            'water_usage' => 'nullable|numeric',
            'energy_usage' => 'nullable|numeric',
            'waste_generated' => 'nullable|array',
            'waste_generated.*.waste_id' => 'nullable|integer',
            'waste_generated.*.quantity' => 'nullable|numeric',
            'waste_generated.*.unit' => 'nullable|string|max:50',
            'Priority' => 'nullable|string|in:Low,Medium,High',
            'Status' => 'nullable|string|in:Pending,In Progress,Completed,Cancelled',
            'Supervisor' => 'nullable|json',
            'Location' => 'nullable|string|max:255',
            'success_criteria' => 'nullable|string',
            'Tags' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status' => 'error',
            'errors' => $validator->errors(),
            ], 422);
        }

        $validatedData = $validator->validated();

        // Map the validated data to the Activity model's attributes
        try {
            $activity = Activity::create([
                'LogID' => $validatedData['annual_op_metadata_ID'],
                'ActivityName' => $validatedData['annual_operation_activity_title'],
                'OperationTypeId' => $validatedData['operation_activity'],
                'ActivityStartDate' => $validatedData['activity_start_date'],
                'ActivityEndDate' => $validatedData['activity_end_date'],
                'Objective' => $validatedData['Objectives'] ?? null,
                'Description' => $validatedData['Description'] ?? null,
                'MaterialUsage' => isset($validatedData['material_used']) ? json_encode($validatedData['material_used']) : null,
                'ChemicalUsage' => isset($validatedData['chemical_used']) ? json_encode($validatedData['chemical_used']) : null,
                'WaterUsage' => $validatedData['water_usage'] ?? null,
                'EnergyUsage' => $validatedData['energy_usage'] ?? null,
                'WasteGenerated' => isset($validatedData['waste_generated']) ? json_encode($validatedData['waste_generated']) : null,
                'Priority' => $validatedData['Priority'] ?? null,
                'Status' => $validatedData['Status'] ?? null,
                'ResponsiblePerson' => $validatedData['Supervisor'] ?? null,
                'Location' => $validatedData['Location'] ?? null,
                'SuccessCriteria' => $validatedData['success_criteria'] ?? null,
                'Tags' => $validatedData['Tags'] ?? null,
            ]);

            
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
