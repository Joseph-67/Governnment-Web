<?php

namespace App\Http\Controllers;
use App\Models\QualityControl;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualityControlController extends Controller
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
            'quality_metric' => 'required|string|max:255',
            'acceptable_range' => 'required|string|max:255',
            'measurement_frequency' => 'required|string|max:255',
            'responsible_person' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $qualityControl = QualityControl::create([
                'company_id' => $request->company_id,
                'quality_metric' => $request->quality_metric,
                'acceptable_range' => $request->acceptable_range,
                'measurement_frequency' => $request->measurement_frequency,
                'responsible_person' => $request->responsible_person,
            ]);
           
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create quality control',
                'error' => $e->getMessage(),
            ], 500);
        }
        try {
            $quality_controls_record = QualityControl::where('status', 'active')
            ->where('company_id', $request->company_id)
            ->get();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve quality controls',
            'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Quality control created successfully',
            'quality_controls_record' => $quality_controls_record,
        ], 201);
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
