<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
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

    function getAvailableProduct($value) {
        $products = Product::where('is_deleted', false)
                    ->where('status', 'available')
                    ->where('company_id', $value)
                    ->get(['product_id', 'name']);

        return response()->json([
            'status' => 'success',
            'products' => $products,
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getProduct($value) {
        $products = Product::with('productCategory')
                    ->where('is_deleted', false)
                    ->where('company_id', $value)
                    ->get();

        return response()->json([
            'status' => 'success',
            'products' => $products,
        ], 200);
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
            'product_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
            'product_quantity_per_unit' => 'nullable|string|max:50',
            'product_unit' => 'nullable|string|max:50',
            'product_category' => 'required|integer|exists:product_categories,product_category_id',
            'description' => 'nullable|string',
            'currency' => 'required|string|max:3',
            'product_price' => 'nullable|numeric|min:0',
            'company_id' => 'required|integer|exists:companies,company_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 'error'], 422);
        }

        try {
            $product = new Product();
            $product->name = $request->product_name;
            $product->quantity_per_unit = $request->product_quantity_per_unit;
            $product->unit = $request->product_unit;
            $product->category_id = $request->product_category;
            $product->description = $request->description;
            $product->currency = $request->currency;
            $product->price = $request->product_price;
            $product->company_id = $request->company_id;
            $product->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create product', 'details' => $e->getMessage(), 'status' => 'error'], 500);
        }

        $products = Product::with('productCategory')->where('company_id', $request->company_id)->where('is_deleted', false)->get();
        return response()->json([
            'message' => 'Product created successfully', 
            'products' => $products,
            'status' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
