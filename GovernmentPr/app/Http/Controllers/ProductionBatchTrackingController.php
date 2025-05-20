<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionBatchTracking;
use App\Models\Company;
use App\Models\Product;
use App\Models\IotDevice;
use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ProductionBatchTrackingController extends Controller
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
            'batch_name' => 'required|string|max:255',
            'company_id' => 'required',
            'product' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_quantity' => 'nullable|integer',
            'defective_quantity' => [
                'nullable',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if (!is_null($value) && !is_null($request->total_quantity) && $value > $request->total_quantity) {
                        $fail('The defective quantity cannot be greater than the total quantity.');
                    }
                },
            ],
            'yield_percentage' => 'nullable|numeric|min:0|max:100',
            'created_by' => 'required',
            'geolocation' => 'nullable|string|max:255',
            'iot_device' => 'nullable',
            'predicted_defect_rate' => 'nullable|numeric|min:0|max:100',
            'audit_trail_id' => 'nullable',

        ]);
          if ($validator->fails()) {
            return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
            ], 422);
        }
        try {
            $productionBatchTracking = new ProductionBatchTracking();
            $productionBatchTracking->batch_name = $request->batch_name;
            $productionBatchTracking->company_id = $request->company_id;
            $productionBatchTracking->product_id = $request->product;
            $productionBatchTracking->start_date = $request->start_date;
            $productionBatchTracking->end_date = $request->end_date;
            $productionBatchTracking->total_quantity = $request->total_quantity;
            $productionBatchTracking->defective_quantity = $request->defective_quantity;
            $productionBatchTracking->yield_percentage = $request->yield_percentage;
            $productionBatchTracking->created_by = $request->created_by;
            $productionBatchTracking->geolocation = $request->geolocation;
            $productionBatchTracking->iot_device_id = $request->iot_device;
            $productionBatchTracking->predicted_defect_rate = $request->predicted_defect_rate;
            $productionBatchTracking->audit_trail_id = $request->audit_trail_id;
            $productionBatchTracking->status = 'Completed';
            $productionBatchTracking->save();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create Production Batch Tracking.',
            'error' => $e->getMessage(),
            ], 500);
        }
            try {
            $productionBatchTracking = ProductionBatchTracking::where('status', 'completed')
            ->where('company_id', $request->company_id)
            ->with('product') // Eager load the related product
            ->get();
        } catch (\Exception $e) {
            return response()->json([
            'status'  => 'error',
            'message' => 'An error occurred while retrieving production batch tracking.',
            'error'   => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Production Batch Tracking created successfully',
            'productionBatchTracking' => $productionBatchTracking
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
