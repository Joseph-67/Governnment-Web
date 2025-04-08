<?php

namespace App\Http\Controllers;

use App\Models\WasteDisposal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WasteDisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.companyProfile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Implementation for creating a new resource
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
            'waste_type' => 'required|string|max:255',
            'operation' => 'required|integer',
            'waste_item' => 'required|integer',
            'quantity_disposed' => 'required|numeric|min:0',
            'disposal_method' => 'required|string|max:255',
            'calendar_year' => 'required|integer',
            'disposal_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $wasteDisposal = WasteDisposal::create([
            'waste_type' => $request->waste_type,
            'company_id' => $request->company_id,
            'operation_id' => $request->operation,
            'company_waste_id' => $request->waste_item,
            'quantity' => $request->quantity_disposed,
            'disposal_method' => $request->disposal_method,
            'calendar_year_id' => $request->calendar_year,
            'disposal_date' => $request->disposal_date,
            'status' => 'active',
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create waste disposal record.',
            'error' => $e->getMessage(),
            ], 500);
        }

        try {
            $waste_disposals = WasteDisposal::where('status', 'active')
            ->with(['operation', 'companyWaste', 'calendarYear'])
            ->where('company_id', $request->company_id)
            ->where('status', 'active')
            ->get();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve waste disposal records.',
            'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Waste disposal record created successfully.',
            'waste_disposals' => $waste_disposals,
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
        // Implementation for showing a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Implementation for editing a specific resource
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
        // Implementation for updating a specific resource
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Implementation for deleting a specific resource
    }
}
