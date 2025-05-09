<?php

namespace App\Http\Controllers;

use App\Models\WasteCategory;
use Illuminate\Http\Request;

class WasteCategoryController extends Controller
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
        $data['wasteCategoryList'] = WasteCategory::get();
        return view("components.apps.waste_category", $data);
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
            'waste_category_name' => 'required|string|max:255|unique:waste_categories,waste_category_name',
            'waste_category_description' => 'nullable|string|max:255',
        ]);

        $result = WasteCategory::create([
            'waste_category_name' => $request->waste_category_name,
            'waste_category_description' => $request->waste_category_description,
        ]);

        if ($result) {
            return back()->with(['success' => 'Waste Category added successfully']);
        } else {
            return back()->with(['error' => 'Waste Category failed to create']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WasteCategory  $wasteCategory
     * @return \Illuminate\Http\Response
     */
    public function show(WasteCategory $wasteCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WasteCategory  $wasteCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(WasteCategory $wasteCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WasteCategory  $wasteCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WasteCategory $wasteCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WasteCategory  $wasteCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WasteCategory $wasteCategory)
    {
        //
    }
}
