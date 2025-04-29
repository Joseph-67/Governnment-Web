<?php

namespace App\Http\Controllers;
use App\Models\CompanyUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyUsersController extends Controller
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
        // dd($request->users);
        $users = json_decode($request->users, true);
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'users' => 'required|json',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        foreach ($users as $user) {
            // dd($user);
            $userValidator = Validator::make($user, [
                'value' => 'required|integer',
                'name' => 'required|string|max:255',
                'avatar' => 'nullable|url',
                'email' => 'required|email|max:255',
                'role' => 'required|in:user,admin', // Adjust roles as necessary
            ]);
    
            if ($userValidator->fails()) {
                return response()->json(['errors' => $userValidator->errors()], 422);
            }
        }

        $assignUsers = new CompanyUsers();
        foreach ($users as $user) {
            // dd($user);
            $assignUsers = new CompanyUsers();
            $assignUsers->company_id = $request->company_id;
            $assignUsers->user_id = $user['value'];
            $assignUsers->save();
        }
        return response()->json([
            'message' => 'Users assigned successfully',
            'data' => $assignUsers
        ], 201);

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
