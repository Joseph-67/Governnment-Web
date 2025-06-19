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
    $data['wasteSubCategories'] = WasteSubCategories::select('waste_sub_category_id', 'waste_sub_category_name')->get();
    $data['wasteItems'] = WasteItem::with('wasteSubCategory')->get();
    return view('components.apps.waste-item', $data);
}
public function data()
{
    try {
        $items = WasteItem::with('wasteSubCategory')->latest()->get();

        $formatted = $items->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'quantity' => $item->quantity_per_unit,
                'unit' => $item->unit,
                'sub_category' => $item->wasteSubCategory->waste_sub_category_name ?? '-',
            ];
        });

        return response()->json(['data' => $formatted]);
    } catch (\Exception $e) {
        return response()->json(['data' => [], 'error' => $e->getMessage()], 500);
    }
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
    $validated = $request->validate([
        'waste_name' => 'required|string|max:255',
        'waste_sub_category' => 'required|exists:waste_sub_categories,waste_sub_category_id',
        'quantity' => 'required|numeric|min:0',
        'unit' => 'required|string|max:50',
        'description' => 'nullable|string|max:1000',
    ]);

    $item = WasteItem::create([
        'name' => $validated['waste_name'],
        'waste_sub_category_id' => $validated['waste_sub_category'],
        'quantity_per_unit' => $validated['quantity'],
        'unit' => $validated['unit'],
        'description' => $validated['description'] ?? null,
    ]);

    $item->load('wasteSubCategory');

    return response()->json([
        'success' => true,
        'message' => 'Waste item saved successfully.',
        'data' => [
            'id' => $item->id,
            'name' => $item->name,
            'quantity' => $item->quantity_per_unit,
            'unit' => $item->unit,
            'sub_category' => $item->wasteSubCategory->waste_sub_category_name ?? '-'
        ]
    ]);
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
