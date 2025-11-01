<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Material;
class stock_movement extends Model
{
    use HasFactory;
    protected $table="stock_movements";
    protected $primaryKey="stockID";
    protected $fillable=[
        'companyMaterialId',
        'materialID',
        'companyID',
        'movement_type',
        'quantity',
        'batch_number',
        'source',
        'usage_reason',
        'calendar_year',
        'movement_date',
        'remark',
        'status'
    ];

    protected $casts = [
        'movement_date' => 'datetime:Y-m-d',
    ];

    public $timestamps = true;


    public function material()
    {
        return $this->belongsTo(Material::class, 'materialID', 'materialID'); // Adjust 'id' as the primary key in the Material model
    }

    public function companyMaterial()
    {
        return $this->belongsTo(CompanyMaterial::class, 'companyMaterialId', 'companyMaterialId'); // Adjust 'id' as the primary key in the CompanyMaterial model
    }

    public function company() {
        return $this->belongsTo(Company::class, 'companyID', 'companyID'); // Adjust 'id' as the primary key in the Company model
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('calendar_year', $year);
    }
    
    public function scopeByType($query, $type)
    {
        return $query->where('movement_type', $type);
    }
    
    public function scopeLowStock($query, $threshold)
    {
        return $query->where('quantity', '<', $threshold);
    }
    
    public function scopeByBatch($query, $batchNumber)
    {
        return $query->where('batch_number', $batchNumber);
    }
    
    public function scopeCheckIns($query)
    {
        return $query->where('movement_type', 'in');
    }
    
    public function scopeCheckOuts($query)
    {
        return $query->where('movement_type', 'out');
    }
    
    /**
     * Get available quantity for a specific batch
     */
    public static function getBatchBalance($companyMaterialId, $batchNumber)
    {
        $checkIns = self::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNumber)
            ->where('movement_type', 'in')
            ->sum('quantity');
            
        $checkOuts = self::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNumber)
            ->where('movement_type', 'out')
            ->sum('quantity');
            
        $transfers = self::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNumber)
            ->where('movement_type', 'transfer')
            ->sum('quantity');
            
        $adjustments = self::where('companyMaterialId', $companyMaterialId)
            ->where('batch_number', $batchNumber)
            ->where('movement_type', 'adjustment')
            ->sum('quantity');
            
        return $checkIns - $checkOuts - $transfers + $adjustments;
    }
    
    /**
     * Get all batches with available quantities for a material including adjustments
     */
    public static function getAvailableBatches($companyMaterialId)
    {
        return self::selectRaw('
                batch_number,
                companyMaterialId,
                materialID,
                MIN(movement_date) as check_in_date,
                SUM(CASE WHEN movement_type = "in" THEN quantity ELSE 0 END) as total_in,
                SUM(CASE WHEN movement_type = "out" THEN quantity ELSE 0 END) as total_out,
                SUM(CASE WHEN movement_type = "transfer" THEN quantity ELSE 0 END) as total_transfer,
                SUM(CASE WHEN movement_type = "adjustment" THEN quantity ELSE 0 END) as total_adjustment,
                (SUM(CASE WHEN movement_type = "in" THEN quantity ELSE 0 END) - 
                 SUM(CASE WHEN movement_type = "out" THEN quantity ELSE 0 END) - 
                 SUM(CASE WHEN movement_type = "transfer" THEN quantity ELSE 0 END) + 
                 SUM(CASE WHEN movement_type = "adjustment" THEN quantity ELSE 0 END)) as available_quantity
            ')
            ->where('companyMaterialId', $companyMaterialId)
            ->whereNotNull('batch_number')
            ->where('status', 'active')
            ->groupBy('batch_number', 'companyMaterialId', 'materialID')
            ->orderBy('check_in_date', 'asc')
            ->get()
            ->map(function ($batch) {
                $batch->batch_id = $batch->batch_number; // For compatibility with existing code
                $batch->original_quantity = $batch->total_in;
                $batch->batch_adjustments = $batch->total_adjustment;
                $batch->batch_checkouts = $batch->total_out;
                $batch->batch_transfers = $batch->total_transfer;
                return $batch;
            });
    }
}
