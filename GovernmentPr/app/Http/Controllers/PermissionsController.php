<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    //
    public function store(Request $request) {
        foreach ($request['guard'] as $key => $guard) {
            # code...
            $validator =Validator::make($request->all(),[
                'permission_title' => ['required', 'string', 'min:3', 'max:20', `unique:permissions,name,{$guard},guard_name`],
                'guard' => ['required', 'array'],
                'guard.*' => ['required', 'string', 'min:3', 'max:20']
            ]);

            if ($validator->fails()) {
                # code...
                return back()->withErrors($validator);
            }
            
        }
    }


}
