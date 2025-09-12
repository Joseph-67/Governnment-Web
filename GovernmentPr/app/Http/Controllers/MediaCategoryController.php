<?php

namespace App\Http\Controllers;

use App\Models\MediaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|string|max:255|unique:media_categories,name']);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ], 422);
        }
        $category = MediaCategory::create(['name' => $request->name]);
        return response()->json(['success' => true, 'category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MediaCategory $mediaCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaCategory $mediaCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaCategory $mediaCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $category = MediaCategory::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true]);
    }
}
