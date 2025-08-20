<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage() {
        $data['roles'] = Role::get();
        $data['guards'] = guard::get();
        return view('components.admin.roles', $data);
    }
    public function index()
    {
        //
        $data['roles'] = Role::get();
        $data['permissions'] = Permission::get();
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
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    'min:3',
                    'max:20',
                    Rule::unique('roles', 'name')->where(function ($query) use ($request) {
                        return $query->where('guard_name', $request->guard_name);
                    }),
                ],
                'guard_name' => ['required', 'string', 'min:3', 'max:20']
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Create Role
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

            return back()->with([
                'success' => "{$role->name} role created successfully."
            ])->withInput();

        } catch (\Illuminate\Database\QueryException $e) {
            // Database-specific errors
            return back()->with([
                'error' => 'Database error: ' . $e->getMessage()
            ])->withInput();

        } catch (\Exception $e) {
            // General errors
            return back()->with([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ])->withInput();
        }
    }


    public function assign_role_permission(Request $request)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
            'permission_id' => 'required|integer|exists:permissions,id',
            'guard_name' => 'required|string',
            'checked' => 'required|boolean',
        ]);

        $role = Role::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);

        try {
            if ($request->checked) {
                // Assign permission
                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            } else {
                // Revoke permission
                if ($role->hasPermissionTo($permission)) {
                    $role->revokePermissionTo($permission);
                }
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Role-Permission sync failed: '.$e->getMessage());
            return response()->json(['success' => false], 500);
        }
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

    public function guard_change(Request $request) {
        // dd($request);
        $validator =Validator::make($request->all(),[
            'guard' => ['required', 'string'],
        ]);
        
        if ($validator->fails()) {
            # code...
            return response()->json($validator, 400);
        }
        $data['roles'] = Role::where('guard_name', '=', $request['guard'])->get();
        $data['permissions'] = Permission::where('guard_name', '=', $request['guard'])->get();
        return response()->json($data, 200);
    }

    public function get_role_permission(Request $request) {
        $data['role_permission'] = DB::table('role_has_permissions')->where('role_id', '=', $request['role_id'])->where('permission_id', '=', $request['permission_id'])->first();
        return response()->json($data, 200);
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
