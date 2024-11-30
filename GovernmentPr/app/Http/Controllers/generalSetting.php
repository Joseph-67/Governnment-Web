<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class generalSetting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('components.admin.settings.general-setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request);
        $request->validate([
            'company_name'=>'required',
            'slogan'=>'required',
            'logo_darkmode'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_lightmode'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'date_of_establishment'=>'required',
            'phone_number'=>'required|nullable:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email_address'=>'required',
            'address'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'mission_statement'=>'required',
            'vision_statement'=>'required',
            'core_values'=>'required',
            'about_company'=>'required',
            'industry'=>'required',
            'organization_type'=>'required',
            'size'=>'required',
            'registration_details'=>'required',
            'abbreviation'=>'nullable',
            'favicon'=>'nullable',
            'instagram_links'=>'nullable',
            'facebook_links'=>'nullable',
            'twitter_links'=>'nullable',
            'websites_url'=>'nullable',
            'certifications'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'brand_color'=>'nullable',
            'brochures'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'corporate_presentations'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'promotional_photos'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'promotional_videos'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


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
