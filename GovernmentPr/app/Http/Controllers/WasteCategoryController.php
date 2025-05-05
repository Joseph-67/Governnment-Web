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
            'waste_name' => 'required|string|max:255',
            'waste_description' => 'nullable|string',
        ]);

        WasteCategory::create($request->all());

        return redirect()->route('waste-categories.index')->with('success', 'Waste category created successfully.');
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
