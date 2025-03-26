<?php

namespace App\Http\Controllers;

use App\Models\OperationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OperationCategoryController extends Controller
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('operation_categories')->where(function ($query) use ($request) {
                return $query->where('company_id', $request->company_id);
            })],
            'description' => ['nullable', 'string'],
            'company_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $operationCategory = OperationCategory::create($request->only(['name', 'description', 'company_id']));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Operation Category', 'message' => $e->getMessage()], 500);
        }
        $operationCategories = OperationCategory::where('is_delete', false)->get();
        return response()->json(['status' => 'success', 'message' => 'Operation Category created successfully', 'operation_categories' => $operationCategories], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationCategory $operationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationCategory $operationCategory)
    {
        //
    }
}
