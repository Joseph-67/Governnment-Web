<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationCategory extends Model
{
    use HasFactory;
    protected $table = 'operation_categories';

    protected $primaryKey = 'operation_category_id';

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'is_delete',
    ];

    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_delete', false);
    }
}
