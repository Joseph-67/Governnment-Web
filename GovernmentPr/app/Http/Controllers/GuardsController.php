<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guard;

class GuardsController extends Controller
{
    //
    public function store(Request $request) {
        $request->validate([
            'guard_title' => ['required', 'string', 'min:3', 'max:20', 'unique:guards,title'],
        ]);

        guard::create([
            'title' => $request['guard_title'],
        ]);

        return back()->with(['success'=> "{$request->guard_title} Guard created successfully."]);
    }
}
