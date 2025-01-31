<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminManagement extends Model
{
    use HasFactory;
    protected $table="admin_management";
    protected $primaryKey = "adminID";
    protected $fillable = [
        "firstname",
        "lastname",
        "othername",
        "email",
        "mobileNumber",
        "status"
    ];
}
