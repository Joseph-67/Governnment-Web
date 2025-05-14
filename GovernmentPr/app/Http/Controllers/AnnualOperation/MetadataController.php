<?php

namespace App\Http\Controllers\AnnualOperation;
use App\Http\Controllers\Controller;

use App\Models\AnnualOperation\Metadatata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;




class MetadataController extends Controller
{

    /**
     * Get all annual operation metadata.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMetadataByCompany($companyId)
    {
        try {
            $metadata = Metadatata::where('company_id', $companyId)->where('is_deleted', '0')->get();

            if ($metadata->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No metadata found for the specified company.',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => $metadata,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve metadata.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
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
            'prepared_by' =>  'required|json',
            'status' => [
                'required',
                Rule::in(['Draft', 'Published', 'Archived']),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $annualOperations =  Metadatata::create([
                'company_id' => $request->company_id,
                'OperationName' => $request->operation_name,
                'year' => $request->calendar_year,
                'annual_no_of_operation' => $request->operation_per_year,
                'PreparedBy' => $request->prepared_by,
                'DateCreated' => now(),
                'LastUpdated' => now(),
                'is_deleted' => false,
                'Status' => $request->status,
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
