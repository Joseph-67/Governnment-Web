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

    public function companyPolicies()
    {
        return $this->hasMany(CompanyPolicies::class, 'policy_id', 'policy_id');
    }
}
