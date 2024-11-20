<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
class PagesController extends Controller
{
    //
    public function index()
    {
        //
        return view('components.CMS.pages');
    }
}
