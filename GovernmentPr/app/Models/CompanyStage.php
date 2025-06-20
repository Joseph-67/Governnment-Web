<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStage extends Model
{
    use HasFactory;
    protected $table = 'company_stages';
    protected $primaryKey = 'stage_id';

    protected $fillable = [
        'company_id',
        'workflow_id',
        'name',
        'description',
        'sequence',
        'status',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function workflow()
    {
        return $this->belongsTo(Workflow::class, 'workflow_id', 'workflow_id');
    }
}
