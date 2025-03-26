<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterRecyclingLog extends Model
{
    use HasFactory;

    protected $table = 'water_recycling_logs';
    protected $primaryKey = 'recycling_id';

    protected $fillable = [
        'companyID',
        'quantity_recycled',
        'unit',
        'recycling_date',
        'method',
        'status',
    ];

    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
