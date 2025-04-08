<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $primaryKey = "categoryID";
    protected $fillable = [
        'category_name',
        'category_description',
        'category_image',
        'category_status',
        'created_by',
        'updated_by'
    ];

    public $timestamps = false;

    public function chemicalCategories()
    {
        return $this->hasMany(Chemicals::class, 'chemical_category_id', 'categoryID');
    }

    public function scopeActive($query)
    {
        return $query->where('category_status', 1);
    }
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->chemicalCategories()->delete();
        });
    }
}
