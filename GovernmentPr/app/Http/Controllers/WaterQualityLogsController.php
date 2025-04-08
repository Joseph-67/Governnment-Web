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
            'turbidity'    => ['required', 'numeric'],
            'parameter_tested'=> ['required', 'string', 'max:255'],
            'contaminants_detected' => ['required', 'string', 'max:255'],
            'result'       => ['required', 'string', 'max:255'],
            'deviation_detected' => ['required', 'string', 'max:255'],
            'corrective_action' => ['nullable', 'string', 'max:255']

        ]);
        if ($validator->fails()) {
            return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $WaterQualityLogs =WaterQualityLogs::create([
            'companyID'         => $request->company_id,
            'test_date'          => $request->test_date,
            'parameter_tested' => $request->parameter_tested,
            'ph_level'           => $request->ph_level,
            'turbidity'             => $request->turbidity,
            'deviation_detected' => $request->deviation_detected,
            'corrective_actions' => $request->corrective_action,
            'contaminants'       => $request->contaminants_detected,
            'test_results'       => $request->result,
            'status'            => 'active'
            ])  ;

            
        } catch (\Exception $e) {
            return response()->json([
            'status'  => 'error',
            'message' => 'An error occurred while adding the water quality log.',
            'error'   => $e->getMessage(),
            ], 500);
        }
        try {
            $water_quality_logs = WaterQualityLogs::where('status', 'active')
            ->where('companyID', $request->company_id)
            ->get();
        } catch (\Exception $e) {
            return response()->json([
            'status'  => 'error',
            'message' => 'An error occurred while retrieving water quality logs.',
            'error'   => $e->getMessage(),
            ], 500);
        }
        
            return response()->json([
            'status'  => 'success',
            'message' => 'Water quality log added successfully.',
            'water_quality_logs'    => $water_quality_logs,
            ], 200);
        

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
