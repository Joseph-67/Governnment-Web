<?php

namespace App\Http\Controllers;

use App\Models\WasteSubCategories;
use Illuminate\Http\Request;

class WasteSubCategoriesController extends Controller
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
        $request->validate([
            'waste_sub_category_name' => 'required|string|max:255|unique:waste_sub_categories,waste_sub_category_name',
            'waste_sub_category_description' => 'nullable|string|max:255',
            'waste_category_id' => 'required|exists:waste_categories,waste_category_id',
        ]);

        try {
            $result = WasteSubCategories::create([
                'waste_sub_category_name' => $request->waste_sub_category_name,
                'waste_sub_category_description' => $request->waste_sub_category_description,
                'waste_category_id' => $request->waste_category_id,
            ]);
            return response()->json(['success' => true, 'message' => 'Waste Sub Category added successfully']);
        } catch (\Exception $e) {
            return response()->json(['
            success' => false, 
            'message' => 'Failed to create Waste Sub Category: ' . $e->getMessage()
        ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WasteSubCategories  $wasteSubCategories
     * @return \Illuminate\Http\Response
     */
    public function show(WasteSubCategories $wasteSubCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WasteSubCategories  $wasteSubCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(WasteSubCategories $wasteSubCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WasteSubCategories  $wasteSubCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WasteSubCategories $wasteSubCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WasteSubCategories  $wasteSubCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(WasteSubCategories $wasteSubCategories)
    {
        //
    }
}
