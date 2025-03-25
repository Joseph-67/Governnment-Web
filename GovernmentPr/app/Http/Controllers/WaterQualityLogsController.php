<?php

namespace App\Http\Controllers;
use App\Models\WaterQualityLogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WaterQualityLogsController extends Controller
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
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'test_date'          => ['required', 'date'],
            'ph_level'           => ['required', 'numeric'],
            'turbidity_level'    => ['required', 'numeric'],
            'contaminants_detected' => ['required', 'string', 'max:255'],
            'test_results'       => ['required', 'string', 'max:255']

        ]);
        if ($validator->fails()) {
            return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
            ], 422);
        }

        $data = [
            'companyID'         => $request->company_id,
            'test_date'          => $request->test_date,
            'ph_level'           => $request->ph_level,
            'turbidity'    => $request->turbidity_level,
            'contaminants'       => $request->contaminants_detected,
            'test_results'       => $request->test_results,
        ];

        $result = WaterQualityLogs::create($data);

        if ($result) {
            return response()->json([
            'status'  => 'success',
            'message' => 'Water quality log added successfully.',
            'data'    => $result,
            ], 200);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to add water quality log.',
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
