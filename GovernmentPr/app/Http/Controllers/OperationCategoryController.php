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
    public function getOperationCategories($value)
    {
        $operationCategories = OperationCategory::where('is_delete', false)
            ->where('company_id', $value)
            ->get(['operation_category_id', 'name', 'description']);

        return response()->json([
            'status' => 'success',
            'operation_categories' => $operationCategories,
        ], 200);
    }

    
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
            'name' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('operation_categories')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                })
            ],
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
        $operationCategories = OperationCategory::where('is_delete', false)->where('company_id', $request->company_id)->get();
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
    public function update(Request $request)
    {
        //
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'operation_category_name' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('operation_categories', 'name')
                ->ignore($request->operation_category_id, 'operation_category_id')
                ->where(function ($query) use ($request) {
                    $query->where('company_id', $request->company_id);
                }),
            ],
            'operation_category_description' => ['nullable', 'string'],
            'company_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        try {
            $operationCategory = OperationCategory::find($request->operation_category_id);
            if (!$operationCategory) {
                return response()->json(['status' => 'error', 'message' => 'Operation Category not found'], 404);
            }

            $operationCategory->name = $request->operation_category_name;
            $operationCategory->description = $request->operation_category_description;
            $operationCategory->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Operation Category', 'message' => $e->getMessage()], 500);
        }
        $operationCategories = OperationCategory::where('is_delete', false)->where('company_id', $request->company_id)->get();
        return response()->json(['status' => 'success', 'message' => 'Operation Category updated successfully', 'operation_categories' => $operationCategories], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationCategory  $operationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operationCategory = OperationCategory::find($id); // Use the $id directly
        if ($operationCategory) {
            $operationCategory->forceDelete(); // Permanently delete the category
    
            $operationCategories = OperationCategory::all(); // use plural for clarity
            return response()->json([
                'status' => 'success',
                'operation_categories' => $operationCategories,
                'message' => 'Operation Category deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Operation Category not found'
            ], 404); // return proper JSON error
        }
    }
       
    
    
}
