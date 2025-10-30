<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'waste_category_id';

    protected $fillable = [
        'waste_category_name',
        'waste_category_description',
    ];

    public function subCategories()  {
        return $this->hasMany(WasteSubCategories::class, 'waste_category_id');
    }

    public function waste() {
        return $this->hasMany(Waste::class, 'waste_category_id');
    }

}
