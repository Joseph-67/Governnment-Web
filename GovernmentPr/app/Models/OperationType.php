<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
    use HasFactory;
    protected $table = 'operation_types';

    protected $primaryKey = 'operation_type_id';

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'sequence_order',
        'is_delete',
    ];

    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_delete', false);
    }


}
