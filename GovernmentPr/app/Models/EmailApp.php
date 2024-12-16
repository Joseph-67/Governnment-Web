<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailApp extends Model
{
    use HasFactory;
    protected $table="email_apps";
    protected $primaryKey="notification_id";
    protected $fillable=[
        'reciepients_email',
        'subject',
        'message'
    ];
}
