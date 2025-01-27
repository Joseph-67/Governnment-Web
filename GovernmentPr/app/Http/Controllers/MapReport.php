<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class MapReport extends Controller
{
    //
    public function show_all_companies()  {
        // $data['company']                            =   Company::where('status')->first();
        return view('components.map.show-map');
    }

    public function get_all_companies(Request $request)  {
        $company =   Company::where('status', 'active')->get();
        return response()->json($company, 200);;
    }
}
