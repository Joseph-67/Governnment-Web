<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddEvent extends Model
{
    use HasFactory; 
    protected $primaryKey="EventID";
    protected $fillable=[
        'categoryID',
        'Event',
        'title',
        'url',           
        'content',     
        'post_date',
        'StartDate',
        'EndDate'  ,
        'description',
        'category',
        'status'
    ];
}
