<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWaste extends Model
{
    use HasFactory;
    protected $table = 'company_wastes';

    protected $primaryKey = 'company_waste_id';

    protected $fillable = [
        'company_id',
        'waste_name',
        'waste_type',
        'unit',
        'is_active',
        'is_delete',
    ];
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeDelete($query)
    {
        return $query->where('is_delete', true);
    }
}
