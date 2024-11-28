<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = "company_id";
    protected $fillable = [
        'company_name',
        'industry',
        'industry_process',
        'email',
        'primary_phone_number',
        'secondary_phone_number',
        'country',
        'state',
        'city',
        'address',
        'gis_location',
        'website_url',
        'date_of_establishment',
        'number_of_employees',
        'operations_manager',
        'contact_person_full_name',
        'contact_person_position',
        'contact_person_contact_number',
        'is_sharable',
        'status',
        'created_at',
        'updated_at',
    ];
}
