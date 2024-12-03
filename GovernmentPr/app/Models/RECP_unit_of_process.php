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
}
