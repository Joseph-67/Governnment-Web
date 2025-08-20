<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\guard;

class PermissionsController extends Controller
{
    //
    public function index() {
        $data['permissions'] = Permission::get();
        $data['guards'] = guard::get();
        return view('components.admin.permission', $data);
    }

    public function store(Request $request) {
        // dd($request->guard);
        foreach ($request['guard'] as $key => $guard) {
            # code...
            // dd($guard);
            $validator =Validator::make($request->all(),[
                'permission_title' => ['required', 'string', 'min:3', 'max:20', Rule::unique('permissions', 'name')->where(function ($query) use ($guard) {
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
            Permission::create([
                'name' => $request['permission_title'],
                'guard_name' => $guard
            ]);
        }

        return back()->with(['success' => `{$request->permission_title} permission created successfully`]);
    }


}
