<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;

    protected $primaryKey = 'equipment_type_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $table = 'equipment_types';


    protected $fillable = [
        'name',
        'description',
        'is_deleted',
        'company_id',
    ];

    protected $guarded = ['equipment_type_id'];

    protected $casts = [
        'equipment_type_id' => 'int',
        'is_deleted' => 'boolean',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_deleted', false);
    }

    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', true);
    }
    public function scopeOfCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        });
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'equipment_type_id', 'equipment_type_id');
    }
}
