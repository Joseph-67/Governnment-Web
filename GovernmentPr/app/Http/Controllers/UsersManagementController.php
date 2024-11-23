<?php

namespace App\Http\Controllers;

use App\Models\usersManagement;
use Illuminate\Http\Request;

class UsersManagementController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function show(usersManagement $usersManagement)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(usersManagement $usersManagement)
    {
        //
    }

    public function show_usersmanagement() {
        return view('components.admin.users-management');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usersManagement $usersManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(usersManagement $usersManagement)
    {
        //
    }
}
