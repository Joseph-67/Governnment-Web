<?php

namespace App\Http\Controllers;

use App\Models\addPost;
use Illuminate\Http\Request;
use App\Models\guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

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
