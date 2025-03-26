<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECPHistory extends Model
{
    use HasFactory;
    protected $table = "recp_histories";
    protected $primaryKey = "recpHistoryID";
    protected $fillable = [
        'companyID',
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
