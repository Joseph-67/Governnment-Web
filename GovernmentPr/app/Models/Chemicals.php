<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemicals extends Model
{
    use HasFactory;
    protected $primaryKey="chemical_id";
    protected $fillable=[
        'name',
        'chemical_category_id',
        'chemical_image',
        'cas_number',
        'ec_number',
        'reach_registration_number',
        'ghs_classification',
        'description',
        'formula',
        'hazard_information',
        'first_aid',
        'fire_fighting',
        'accidental_release',
        'storage_handling',
        'disposal',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'approve_rejected_status',
        'approved_rejected_comment',
        'approved_reject_at',
        'approved_rejected_by',
        'status'
    ];

    public $timestamps = true;
    protected $table = 'chemicals';
    public function chemicalCategory()
    {
        return $this->belongsTo(category::class, 'chemical_category_id', 'categoryID');
    }

    public function companyChemicals()
    {
        return $this->hasMany(CompanyChemical::class, 'chemical_id', 'chemical_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', true);
    }

    public function scopeApproved($query)
    {
        return $query->where('approve_rejected_status', 'approved');
    }
}
