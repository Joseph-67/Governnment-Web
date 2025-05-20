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
     * Get all production batch tracking records for a specific company.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function getProductionBatchTrackingByCompany($companyId)
    {
        try {
            $productionBatchTracking = ProductionBatchTracking::where('company_id', $companyId)
                ->with(['product', 'iotDevice', 'auditTrail', 'createdBy'])
                ->get();
            if ($productionBatchTracking->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No production batch tracking records found for the specified company.',
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'production_batch_tracking' => $productionBatchTracking,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve production batch tracking records.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Get all production batch tracking records for a specific product.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function getProductionBatchTrackingByProduct($productId)
    {
        try {
            $productionBatchTracking = ProductionBatchTracking::where('product_id', $productId)
                ->with(['company', 'iotDevice', 'auditTrail', 'createdBy'])
                ->get();
            if ($productionBatchTracking->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No production batch tracking records found for the specified product.',
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'production_batch_tracking' => $productionBatchTracking,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve production batch tracking records.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'batch_name' => 'required|string|max:255|unique:production_batch_tracking,batch_name,NULL,id,company_id,' . $request->company_id,
            'company_id' => 'required|integer|exists:companies,company_id',
            'product' => 'required|integer|exists:products,product_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_quantity' => 'nullable|integer|min:0',
            'defective_quantity' => [
                'nullable',
                'integer',
                'min:0',
                function ($attribute, $value, $fail) use ($request) {
                    if (!is_null($value) && !is_null($request->total_quantity) && $value > $request->total_quantity) {
                        $fail('The defective quantity cannot be greater than the total quantity.');
                    }
                },
            ],
            'yield_percentage' => 'nullable|numeric|min:0|max:100',
            'created_by' => 'required|json',
            'geolocation' => 'nullable|string|max:255',
            'iot_device' => 'nullable|integer|exists:iot_devices,id',
            'predicted_defect_rate' => 'nullable|numeric|min:0|max:100',
            'audit_trail_id' => 'nullable|integer|exists:audit_trails,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $productionBatchTracking = ProductionBatchTracking::create([
                'batch_name' => $request->batch_name,
                'company_id' => $request->company_id,
                'product_id' => $request->product,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_quantity' => $request->total_quantity,
                'defective_quantity' => $request->defective_quantity,
                'yield_percentage' => $request->yield_percentage,
                'created_by' => $request->created_by,
                'geolocation' => $request->geolocation,
                'iot_device_id' => $request->iot_device,
                'predicted_defect_rate' => $request->predicted_defect_rate,
                'audit_trail_id' => $request->audit_trail_id,
                'status' => 'Completed',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create Production Batch Tracking.',
                'error' => $e->getMessage(),
            ], 500);
        }

        // Return the newly created record with relationships
        $productionBatchTracking->load(['product', 'company', 'iotDevice', 'auditTrail', 'createdBy']);

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
