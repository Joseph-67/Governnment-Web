<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteItem;
use App\Models\WasteSubCategories;
use Illuminate\Support\Facades\Validator;



class WasteItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Include waste_category_id so subcategories can be filtered in the frontend
    $data['wasteSubCategories'] = WasteSubCategories::select('waste_sub_category_id', 'waste_sub_category_name', 'waste_category_id')->get();
    return view('components.apps.waste-item', $data);
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
    $validator = Validator::make($request->all(), [
        'waste_name' => 'required|string|max:255',
        'waste_sub_category' => 'required',
        'quantity' => 'required|numeric',
        'unit' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:500',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
        ], 422);
    }

    try {
        $wasteItem = WasteItem::create([
            'name' => $request->waste_name,
            'description' => $request->description,
            'waste_sub_category_id' => $request->waste_sub_category,
            'quantity_per_unit' => $request->quantity,
            'unit' => $request->unit,
            'Status' => 'active',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to create waste type.',
            'error' => $e->getMessage(),
        ], 500);
    }


    return response()->json([
        'status' => 'success',
        'message' => 'Waste type created successfully.',
        'wasteType' => $wasteType,
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
