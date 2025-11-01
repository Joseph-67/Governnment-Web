<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WasteSubCategories;
use App\Models\wasteCategory;

class WasteItem extends Model
{
    use HasFactory;
    protected $table = 'waste_items';
    protected $primaryKey = 'waste_item_id';
    protected $fillable = [
        'name',
        'description',
        'icon',
        'color',
        'unit',
        'quantity_per_unit',
        'waste_category_id',
        'waste_sub_category_id',
    ];
    

    public function wasteSubCategory()
    {
        return $this->belongsTo(WasteSubCategories::class, 'waste_sub_category_id', 'waste_sub_category_id');
    }

    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class, 'waste_category_id', 'waste_category_id');
    }
}
