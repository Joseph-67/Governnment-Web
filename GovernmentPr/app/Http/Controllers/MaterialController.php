<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\category;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $data['categories'] = category::get();
        $data['Material'] = material::join('categories', 'categories.categoryID', '=', 'materials.categoryID')->select('materialID', 'material', 'description','status', 'category_name')->get();
        return view('components.materials.material', $data); 
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
        $request->validate([
            'material_name'     => 'required|max:255|unique:materials,material',
            'category'          => 'required|max:255',
            'description'       => 'nullable|max:255'
        ]);

        $material = new Material();

        $material -> categoryID     =   $request-> category;
        $material -> material       =   $request-> material_name;
        $material -> description    =   $request-> description;
        $material -> status         =   "1";
        $material -> save();

        return back()->with(['success' => 'Material added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         // dd($id);
         $material = material::find($id);
         if ($material) {
             $material->forceDelete(); // Permanently delete the category
 
             $material = material::get();
             return response()->json([
                 'status' => 'success',
                 'materials' => $material,
                 'message' => 'Material deleted successfully']);
         } else {
             return back()->with(['error' => 'Material not found']);
         }
    }
}
