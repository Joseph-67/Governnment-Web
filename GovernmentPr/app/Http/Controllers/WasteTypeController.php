<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteType;
use App\Models\WasteCategory;
use App\Models\WasteSubCategories;
use App\Models\WasteSources;
use Illuminate\Support\Facades\Validator;



class WasteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $data['wasteCategories'] = WasteCategory::select('waste_category_id', 'waste_category_name')->get();

    // Include waste_category_id so subcategories can be filtered in the frontend
    $data['wasteSubCategories'] = WasteSubCategories::select('waste_sub_category_id', 'waste_sub_category_name', 'waste_category_id')->get();

    $data['wasteSources'] = WasteSources::select('waste_source_id', 'waste_source_name')->get();

    return view('components.apps.waste-type', $data);
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
        'waste_title' => 'required|string|max:255',
        'waste_category' => 'required|exists:waste_categories,waste_category_id',
        'waste_sub_category' => 'required|exists:waste_sub_categories,waste_sub_category_id',
        'waste_source' => 'required|exists:waste_sources,waste_source_id',
        'quantity' => 'required|numeric',
        'unit' => 'required|string|max:50',
        'date_generated' => 'required|date',
        'disposal_date' => 'nullable|date',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
        ], 422);
    }

    try {
        $wasteType = WasteType::create([
            'WasteTitle' => $request->waste_title,
            'waste_category_id' => $request->waste_category,
            'waste_sub_category_id' => $request->waste_sub_category,
            'waste_source_id' => $request->waste_source,
            'Quantity' => $request->quantity,
            'Unit' => $request->unit,
            'DateGenerated' => $request->date_generated,
            'DisposalDate' => $request->disposal_date,
            'status' => 'active',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to create waste type: ' . $e->getMessage(),
        ], 500);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Waste type created successfully.',
        'data' => $wasteType,
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
