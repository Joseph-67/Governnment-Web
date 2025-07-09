<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;
    protected $table = 'policies';
    protected $primaryKey = 'policy_id';

    protected $fillable = [ 
        'title',
        'description',
        'category',
        'sequence_order',
        'effective_date',
        'expiry_date',
        'status',
        'created_by',
        'updated_by'
    ];
    protected $casts = [
        'effective_date' => 'date',
        'expiry_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function createdBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'updated_by');
    }

}
