<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQuestionaire extends Model
{
    use HasFactory;
    protected $primaryKey = "questionId";
    protected $fillable = [
        "label",
        "question",
        "status",
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
