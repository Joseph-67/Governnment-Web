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
