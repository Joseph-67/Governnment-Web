<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\WasteCategory;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    /**
     * Display a listing of the waste items.
     */
    public function index()
    {
        // Get all categories for dropdowns
        $data['wasteCategories'] = WasteCategory::all();
        $data['wasteSubCategories'] = [];
        return view('components.waste.index', $data);
    }

    /**
     * Fetch all waste data for DataTables or AJAX requests.
     */
    public function getAll()
    {
        $wastes = Waste::with('category')->latest()->get()->map(function ($waste) {
            return [
                'id' => $waste->waste_id,
                'name' => $waste->waste_name,
                'quantity' => $waste->quantity,
                'unit' => $waste->unit,
                'category_name' => $waste->category->waste_category_name ?? 'N/A',
                'description' => $waste->description,
            ];
        });

        return response()->json(['data' => $wastes]);
    }

    /**
     * Store a newly created waste item.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'waste_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'description' => 'nullable|string',
            'waste_category_id' => 'required|exists:waste_categories,waste_category_id',
        ], [
            'waste_name.required' => 'Waste name is required.',
            'quantity.required' => 'Quantity cannot be empty.',
            'unit.required' => 'Please specify a unit (e.g. kg, tons).',
            'waste_category_id.required' => 'You must select a category.',
        ]);

        if ($validated->fail()) {
            return response()->json([
                'success' => false,
                'errors' => $validated->errors(),
            ], 422);
        }

        try {
            //code...
            $waste = Waste::create($validated);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Error creating waste item: ' . $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Waste item added successfully!',
            'data' => $waste,
        ]);
    }

    /**
     * Display the specified waste item.
     */
    public function show(Waste $waste)
    {
        return response()->json($waste);
    }

    /**
     * Show the form for editing a waste item.
     */
    public function edit(Waste $waste)
    {
        $categories = WasteCategory::all();
        return view('admin.waste-edit', compact('waste', 'categories'));
    }

    /**
     * Update the specified waste item.
     */
    public function update(Request $request, Waste $waste)
    {
        $validated = $request->validate([
            'waste_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'description' => 'nullable|string',
            'waste_category_id' => 'required|exists:waste_categories,waste_category_id',
        ]);

        $waste->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Waste item updated successfully!',
            'data' => $waste,
        ]);
    }

    /**
     * Remove the specified waste item.
     */
    public function destroy(Waste $waste)
    {
        $waste->delete();

        return response()->json([
            'success' => true,
            'message' => 'Waste item deleted successfully!',
        ]);
    }
}
