<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['roles'] = Role::where('guard_name', '=', 'web')->get();
        $data['permissions'] = Permission::where('guard_name', '=', 'web')->get();
        $data['guards'] = guard::where('status', '=', 'active')->select('title')->get();
        return view('components.admin.role-management', $data);
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
        // dd($request->guard);
        foreach ($request['guard'] as $key => $guard) {
            # code...
            // dd($guard);
            $validator =Validator::make($request->all(),[
                'role_title' => ['required', 'string', 'min:3', 'max:20', Rule::unique('roles', 'name')->where(function ($query) use ($guard) {
                    return $query->where('guard_name', $guard);
                }),],
                'guard' => ['required', 'array'],
                'guard.*' => ['required', 'string', 'min:3', 'max:20']
            ]);

            if ($validator->fails()) {
                # code...
                return back()->withErrors($validator);
            }            
        }

        // `unique:permissions,name,{$guard},guard_name`,
        foreach ($request['guard'] as $key => $guard) {
            Role::create([
                'name' => $request['role_title'],
                'guard_name' => $guard
            ]);
        }

        return back()->with(['success' => `{$request->role_title} role created successfully.`]);
    }

    public function assign_role_permission(Request $request)
    {
        // dd($request);
        $validator =Validator::make($request->all(),[
            'role' => ['required', 'numeric'],
            'permission' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json(['error' =>  $validator], 400);
        }
        // fetch role
        $role = Role::find($request['role']);
        $permission = Permission::find($request['permission']);
        $role->givePermissionTo($permission);
        return response()->json(['message' =>  'Permission assigned to role successfully.'], 200);
    }

    public function revoke_role_permission(Request $request)
    {
        // dd($request);
        $validator =Validator::make($request->all(),[
            'role' => ['required', 'numeric'],
            'permission' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json(['error' =>  $validator], 400);
        }
        // fetch role
        $role = Role::find($request['role']);
        $permission = Permission::find($request['permission']);
        $role->revokePermissionTo($permission);
        return response()->json(['message' =>  'Permission revoked from role successfully.'], 200);
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
