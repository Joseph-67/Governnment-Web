<?php

namespace App\Http\Controllers;

use App\Models\Chemicals;
use Illuminate\Http\Request;
use App\Models\Category;

class ChemicalsController extends Controller
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
        $data['categories'] = Category::all();
        $data['chemical'] = Chemicals::get();
        return view('components.chemical.create-chemical', $data);
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
            'chemical_name' => 'required|unique:chemicals,name',
            'chemical_category' => 'required',
            'chemical_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cas_no' => 'nullable',
            'ec_no' => 'nullable',
            'reach_registration_no' => 'nullable',
            'ghs_classification' => 'nullable',
            'description' => 'nullable',
            'formula' => 'nullable',
            'hazard_information' => 'nullable',
            'first_aid' => 'nullable',
            'fire_fighting' => 'nullable',
            'accidental_release' => 'nullable',
            'storage_handling' => 'nullable',
            'disposal' => 'nullable',
        ]);

        $chemical = new Chemicals();
        $chemical->name = $request->chemical_name;
        $chemical->chemical_category = $request->chemical_category;

        if ($request->hasFile('chemical_image')) {
            $imagePath = $request->file('chemical_image')->store('chemical_images', 'public');
            $chemical->chemical_image = $imagePath;
        }

        $chemical->cas_number = $request->cas_no;
        $chemical->description = $request->description;
        $chemical->ec_number = $request->ec_no;
        $chemical->reach_registration_number = $request->reach_registration_no;
        $chemical->ghs_classification = $request->ghs_classification;
        $chemical->formula = $request->formula;
        $chemical->hazard_information = $request->hazard_information;
        $chemical->first_aid = $request->first_aid;
        $chemical->fire_fighting = $request->fire_fighting;
        $chemical->accidental_release = $request->accidental_release;
        $chemical->storage_handling = $request->storage_handling;
        $chemical->disposal = $request->disposal;

        $chemical->save();

        return back()->with('success', 'Chemical created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function show(Chemicals $chemicals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function edit(Chemicals $chemicals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chemicals $chemicals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chemicals $chemicals)
    {
        //
    }
}
