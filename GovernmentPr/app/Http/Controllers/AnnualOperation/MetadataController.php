<?php

namespace App\Http\Controllers;

use App\Models\AnnualOperation\Metadatata;
use Illuminate\Http\Request;

class MetadataController extends Controller
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
    public function store_metadata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'operation_name' => 'required|string|max:255',
            'calendar_year' => 'required|integer',
            'operation_per_year' => 'nullable|integer',
            'prepared_by' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $annualOperationsLog = AnnualOperationsLog::findOrFail($request->annual_operations_log_id);
            $annualOperationsLog->metadata()->create([
                'key' => $request->metadata_key,
                'value' => $request->metadata_value,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to store metadata.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Metadata stored successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnnualOperation\Metadatata  $metadatata
     * @return \Illuminate\Http\Response
     */
    public function show(Metadatata $metadatata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnnualOperation\Metadatata  $metadatata
     * @return \Illuminate\Http\Response
     */
    public function edit(Metadatata $metadatata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnnualOperation\Metadatata  $metadatata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metadatata $metadatata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnnualOperation\Metadatata  $metadatata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metadatata $metadatata)
    {
        //
    }
}
