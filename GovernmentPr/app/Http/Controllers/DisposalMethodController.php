<?php

namespace App\Http\Controllers;

use App\Models\DisposalMethod;
use Illuminate\Http\Request;

class DisposalMethodController extends Controller
{
    /**
     * Display all disposal methods (for DataTables or API).
     */
    public function index()
    {
        $methods = DisposalMethod::orderBy('created_at', 'desc')->get();
        // dd($methods);
        return response()->json([
            'status' => 'success',
            'data' => $methods
        ]);
    }

    /**
     * Store a newly created disposal method.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'method_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'safety_level' => 'nullable|string|max:50'
        ]);

        $method = DisposalMethod::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Disposal method added successfully.',
            'data' => $method
        ]);
    }

    /**
     * Show a single disposal method (for editing).
     */
    public function show($id)
    {
        $method = DisposalMethod::findOrFail($id);
        return response()->json($method);
    }

    /**
     * Update a disposal method.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'method_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'safety_level' => 'nullable|string|max:50'
        ]);

        $method = DisposalMethod::findOrFail($id);
        $method->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Disposal method updated successfully.',
            'data' => $method
        ]);
    }

    /**
     * Delete a disposal method.
     */
    public function destroy($id)
    {
        $method = DisposalMethod::findOrFail($id);
        $method->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Disposal method deleted successfully.'
        ]);
    }
}
