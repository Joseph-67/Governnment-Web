<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_house_keep_practice extends Model
{
    use HasFactory;
    protected $table = "recp_house_keep_practices";
    protected $primaryKey = "houseKeepingID";
    protected $fillable = [
        'companyID',
        'practice_title',
        'status'
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
