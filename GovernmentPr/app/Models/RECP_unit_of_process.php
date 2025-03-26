<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_unit_of_process extends Model
{
    use HasFactory;
    protected $table = "recp_unit_of_processes";
    protected $primaryKey = "unitProcessID";
    protected $fillable = [
      'companyID',
      'unit_process_title',
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
