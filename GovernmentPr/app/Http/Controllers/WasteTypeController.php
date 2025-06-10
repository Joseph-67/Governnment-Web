<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteType;
use App\Models\WasteCategory;
use App\Models\WasteSubCategories;
use App\Models\WasteSources;

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
