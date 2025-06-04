<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\CompanyWaste;
use Illuminate\Http\Request;
use App\Models\WasteCategory;

class CategoryController extends Controller
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
        try {
            $data = [
            'categoryList' => category::all(),
            'wasteList' => WasteCategory::all(),
            ];
            return view("components.apps.category", $data);
        } catch (\Exception $e) {
            return back()->with(['error' => 'An error occurred while loading the data: ' . $e->getMessage()]);
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
        //
        $request->validate([
            'category_title' => 'required|max:255|unique:categories,category_name',
            'category_description' => 'nullable|max:255',
        ]);

        $result = category::create([
            'category_name' => $request->category_title,
            'category_description' => $request->category_description,
        ]);

        if ($result) {
            # code...
            return back()->with(['success' => 'Category added successfully']);
        } else {
            # code...
            return back()->with(['error' => 'Category failed to create']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $category = category::find($id);
        if ($category) {
            // $category->category_status = 'inactive';
            // $category->save();
            // $category->delete(); // Soft delete the category
            $category->forceDelete(); // Permanently delete the category

            $category = category::get();
            return response()->json([
                'status' => 'success',
                'categories' => $category,
                'message' => 'Category deleted successfully']);
        } else {
            return back()->with(['error' => 'Category not found']);
        }
    }
}
