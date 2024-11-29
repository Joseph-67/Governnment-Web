<?php

namespace App\Http\Controllers;

use App\Models\addPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AddPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('components.CMS.Posts.add-post');
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
            'title' => required,
            'tag' => nullable,
            'category' => nullable,
            'author' => nullable,
            'date'  => 'required|date|after_or_equal:today|date_format:m/d/Y',
            'logo_darkmode'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_lightmode'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addPost  $addPost
     * @return \Illuminate\Http\Response
     */
    public function show(addPost $addPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addPost  $addPost
     * @return \Illuminate\Http\Response
     */
    public function edit(addPost $addPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addPost  $addPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addPost $addPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addPost  $addPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(addPost $addPost)
    {
        //
    }
}
