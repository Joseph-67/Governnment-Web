<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;
    protected $table = 'waste_types';
    protected $primaryKey = 'WasteID';
    protected $fillable = [
        'waste_category_id',
        'waste_sub_category_id',
        'waste_source_id',
        'WasteTitle',
        'Quantity',
        'Unit',
        'DateGenerated',
        'DisposalDate',
        'status'
    ];
    
    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class, 'waste_category_id', 'waste_category_id');
    }
    public function wasteSubCategory()
    {
        return $this->belongsTo(WasteSubCategories::class, 'waste_sub_category_id', 'waste_sub_category_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
    public function wasteSource()
    {
        return $this->belongsTo(WasteSource::class, 'waste_source_id', 'waste_source_id');
    }
}
