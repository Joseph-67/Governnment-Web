<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;

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
        $data['title'] = 'Pages';
        $data['description'] = 'Manage your pages here.';
        $data['keywords'] = 'pages, manage, CMS';

        return view('components.CMS.pages/index', $data);
    }
    public function create()
    {
        //
        $title = 'Create Page';
        $description = 'Create a new page for your website.';
        $keywords = 'create, page, CMS';
        return view('components.CMS.pages.create', compact('title', 'description', 'keywords'));
    }
}
