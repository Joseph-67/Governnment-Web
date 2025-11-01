<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WasteCategory;

class WasteSubCategories extends Model
{
    use HasFactory;
    protected $table = 'waste_sub_categories';
    protected $primaryKey = 'waste_sub_category_id';
    
    protected $fillable = [
        'waste_sub_category_name',
        'waste_sub_category_description',
        'waste_category_id',
        'is_delete',
    ];

    public function category()  {
        return $this->belongsTo(WasteCategory::class, 'waste_category_id');
    }
}
