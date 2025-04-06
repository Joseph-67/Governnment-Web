<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteDisposal extends Model
{
    use HasFactory;
    protected $table = 'waste_disposals';
    protected $primaryKey = 'waste_disposal_id';

    protected $fillable = [
       'waste_type',
        'operation_type_id',
        'quantity',
        'disposal_method',
        'calendar_year_id',
        'disposal_date',
        'status'
        
    ];

  
}
