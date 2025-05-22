<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productionprocess extends Model
{
    use HasFactory;
    protected $table = 'productionprocesses';
    protected $primaryKey = 'process_id';
    protected $fillable = [
        'batch_id',
        'operation_type',
        'start_time',
        'end_time',
        'operator_id',
        'status',
        'remarks'
    ];
   public function batch()
{
    return $this->belongsTo(ProductionBatchTracking::class, 'batch_id', 'batch_id');
}

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
}
