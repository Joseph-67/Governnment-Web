<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recp extends Model
{
    use HasFactory;
    protected $primaryKey = 'recp_id'; // Primary key for the recps table
    protected $fillable = [
        'company_id',
        'status', 
        'remark', 
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
