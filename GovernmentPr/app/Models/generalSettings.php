<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generalSettings extends Model
{
    use HasFactory;
    protected $table="general_settings";
    protected $primaryKey='settings_id';
    protected $fillable=[
        'company_name',
        'logo_darkmode',
        'logo_lightmode',
        'date_of_establishment',
        'phone_number',
        'email_address',
        'address',
        'country',
        'state',
        'city',
        'mission_statement',
        'vision_statement',
        'core_values',
        'about_company',
        'industry',
        'organization_type',
        'size',
        'registration_details',
        'abbreviation',
        'favicon',
        'instagram_links',
        'facebook_links',
        'twitter_links',
        'websites_url',
        'certifications',
        'brand_color',
        'brochures',
        'corperate_presentations',
        'promotional_photos',
        'promotional_videos',
        'status'
    ];
}
