<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\FileUpload;


class generalSetting extends FileUpload
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
        // dd($request);
        $request->validate([
            'company_name'=>'required',
            'slogan'=>'required',
            'abbreviation'=>'nullable',
            'registration_number'=>'nullable',
            'logo_dark_mode'=>'nulable|array',
            'logo_light_mode'=>'nullable|array',
            'logo_dark_mode.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_light_mode.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'date_of_establishment'=>'nullable|date|before:now',
            
            // contact info
            'primary_phone_number'=>'required|numeric|regex:/^(\+?[1-9][0-9]{1,14})$/|phone:*',
            'secondary_phone_number'=>'nullable|numeric|regex:/^(\+?[1-9][0-9]{1,14})$/|phone:*',
            'email'=>'required',
            'country'=>'required',
            'state'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
            // links
            'instagram_links'=>'nullable|url',
            'facebook_links'=>'nullable|url',
            'twitter_links'=>'nullable|url',
            'websites_url'=>'nullable|url',
            // company overview
            'mission_statement'=>'nullable',
            'vision_statement'=>'nullable',
            'core_values'=>'nullable|array',
            'core_values.*'=>'nullable|string',
            'about_company'=>'nullable',
            // company info
            'industry'=>'required|string',
            'organization_type'=>'required',
            'number_of_employees'=>'nullable',
            'favicon'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'certifications'=>'nullable|array',
            'certifications.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'brand_color'=>'nullable',
            'brochures'=>'nullable|array',
            'brochures.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'corporate_presentations'=>'nullable|array',
            'corporate_presentations.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'promotional_photos'=>'nullable|array',
            'promotional_photos.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'promotional_videos'=>'nullable|array',
            'promotional_videos.*'=>'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
