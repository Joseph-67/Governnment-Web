<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $table = 'wastes'; // table name (plural convention)

    protected $primaryKey = 'waste_id'; // optional if using custom ID field
    public $timestamps = true;

    protected $fillable = [
        'waste_name',
        'waste_category_id',
        'waste_sub_category_id',
        'quantity',
        'unit',
        'description',
        'status'
    ];

    /**
     * Relationships
     */

    // Each waste belongs to a main category
    public function category()
    {
        return $this->belongsTo(WasteCategory::class, 'waste_category_id');
    }

    // Each waste belongs to a subcategory
    public function subCategory()
    {
        return $this->belongsTo(WasteSubCategory::class, 'waste_sub_category_id');
    }

    /**
     * Accessors
     */

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'active' => '<span class="badge bg-success">Active</span>',
            'inactive' => '<span class="badge bg-secondary">Inactive</span>',
            default => '<span class="badge bg-light text-dark">Unknown</span>',
        };
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('waste_category_id', $categoryId);
    }
}
