<?php

namespace App\Http\Controllers;

use App\Models\WasteSubCategories;
use App\Models\WasteCategories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WasteSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource (for DataTables or page view).
     */
    public function index(Request $request)
    {
        // AJAX request → return JSON for DataTable
        if ($request->ajax()) {
            $data = WasteSubCategories::with('category')
                ->orderBy('waste_sub_category_id', 'desc')
                ->get()
                ->map(function ($subcat) {
                    return [
                        'waste_sub_category_id' => $subcat->waste_sub_category_id,
                        'name' => $subcat->waste_sub_category_name,
                        'description' => $subcat->waste_sub_category_description,
                        'category_name' => $subcat->category ? $subcat->category->waste_category_name : 'N/A',
                    ];
                });

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        }
    }

    /**
     * Store a newly created subcategory.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'waste_sub_category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('waste_sub_categories', 'waste_sub_category_name')
                    ->where(fn($q) => $q->where('waste_category_id', $request->waste_category_id))
            ],
            'waste_category_id' => 'required|integer|exists:waste_categories,waste_category_id',
            'waste_sub_category_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $subcat = WasteSubCategories::create([
            'waste_sub_category_name' => $request->waste_sub_category_name,
            'waste_sub_category_description' => $request->waste_sub_category_description,
            'waste_category_id' => $request->waste_category_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Waste Subcategory created successfully!',
            'data' => $subcat
        ]);
    }

    /**
     * Display a single subcategory.
     */
    public function show($id)
    {
        $subcat = WasteSubCategories::with('category')->find($id);

        if (!$subcat) {
            return response()->json(['status' => 'error', 'message' => 'Subcategory not found.'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $subcat]);
    }

    /**
     * Update an existing subcategory.
     */
    public function update(Request $request, $id)
    {
        $subcat = WasteSubCategories::find($id);

        if (!$subcat) {
            return response()->json(['status' => 'error', 'message' => 'Subcategory not found.'], 404);
        }

        $validator = \Validator::make($request->all(), [
            'waste_sub_category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('waste_sub_categories', 'waste_sub_category_name')
                    ->where(fn($q) => $q->where('waste_category_id', $request->waste_category_id))
                    ->ignore($subcat->waste_sub_category_id, 'waste_sub_category_id'),
            ],
            'waste_category_id' => 'required|integer|exists:waste_categories,waste_category_id',
            'waste_sub_category_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $subcat->update([
            'waste_sub_category_name' => $request->waste_sub_category_name,
            'waste_sub_category_description' => $request->waste_sub_category_description,
            'waste_category_id' => $request->waste_category_id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Waste Subcategory updated successfully.']);
    }

    /**
     * Remove the specified subcategory.
     */
    public function destroy($id)
    {
        $subcat = WasteSubCategories::find($id);

        if (!$subcat) {
            return response()->json(['status' => 'error', 'message' => 'Subcategory not found.'], 404);
        }

        $subcat->delete();

        return response()->json(['status' => 'success', 'message' => 'Subcategory deleted successfully.']);
    }

    /**
     * Get all subcategories belonging to a specific category (for dropdown use).
     */
    public function getByCategory($categoryId)
    {
        $subcats = WasteSubCategories::where('waste_category_id', $categoryId)->get();

        return response()->json([
            'status' => 'success',
            'data' => $subcats
        ]);
    }
}
