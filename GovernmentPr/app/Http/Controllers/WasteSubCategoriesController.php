<?php

namespace App\Http\Controllers;

use App\Models\WasteSubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        $data['WasteSubCategoryList'] = WasteSubCategories::get();
        return view("components.apps.waste_sub_category", $data);
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
        $validator = \Validator::make($request->all(), [
            'waste_sub_category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('waste_sub_categories', 'waste_sub_category_id')->where(function ($query) use ($request) {
                    return $query->where('waste_category_id', $request->waste_category_id);
                }),
            ],
            'waste_sub_category_description' => 'nullable|string',
            'waste_category_id' => 'required|integer|exists:waste_categories,waste_category_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()
            ], 422);
        }

        try {
            $result = WasteSubCategories::create([
            'waste_sub_category_name' => $request->waste_sub_category_name,
            'waste_sub_category_description' => $request->waste_sub_category_description,
            'waste_category_id' => $request->waste_category_id,
            ]);
            return response()->json(['success' => true, 'message' => 'Waste Sub Category added successfully']);
        } catch (\Exception $e) {
            return response()->json([
            'success' => false, 
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
    public function getWasteSubCategories($value)
    {
        try {
            $wasteSubCategories = WasteSubCategories::where('waste_category_id', $value)->get();
            // dd($wasteSubCategories);
            return response()->json(['success' => true, 'wasteSubCategory' => $wasteSubCategories]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch Waste Sub Categories: ' . $e->getMessage()
            ], 500);
        }
    }
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
