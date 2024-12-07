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
}
