<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guard;

class GuardsController extends Controller
{
    //
    public function index() {
        $data['guards'] = guard::get();
        return view('components.admin.guard', $data);
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:20', 'unique:guards,title'],
        ]);

        guard::create([
            'title' => $request['title'],
        ]);

        return back()->with(['success'=> "{$request->guard_title} Guard created successfully."])->withInput();
    }
 public function update(Request $request, $id)
{
    $request->validate([
        'title' => ['required', 'string', 'min:3', 'max:20', "unique:guards,title,{$id},guard_id"],
        'status' => ['required', 'boolean']
    ]);

    $guard = Guard::findOrFail($id);
    $guard->title = $request->title;
    $guard->status = $request->status;
    $guard->save();

    return response()->json([
        'success' => true,
        'message' => "Guard \"{$guard->title}\" updated successfully.",
        'data' => [
            'id' => $guard->guard_id,
            'title' => $guard->title,
            'status' => $guard->status
        ]
    ]);
}


}

