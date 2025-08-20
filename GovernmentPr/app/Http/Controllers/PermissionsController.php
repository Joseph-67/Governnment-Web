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
                Rule::unique('permissions', 'name')->where(function ($query) use ($request) {
                    return $query->where('guard_name', $request->guard_name);
                }),
            ],
            'guard_name' => ['required', 'string', 'min:3', 'max:20']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create new permission
        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        return back()->with([
            'success' => "{$request->name} permission created successfully."
        ])->withInput();

    } catch (\Illuminate\Database\QueryException $e) {
        // Handles DB errors specifically
        return back()->with([
            'error' => 'Database error: ' . $e->getMessage()
        ])->withInput();

    } catch (\Exception $e) {
        // Handles any other errors
        return back()->with([
            'error' => 'Something went wrong: ' . $e->getMessage()
        ])->withInput();
    }
}



}
