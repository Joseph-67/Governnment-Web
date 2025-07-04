<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWorkflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'workflow_id';

    protected $fillable = [
        'company_id',
        'workflow_name',
        'description',
        'created_by',
        'guard',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
   

    public function productionprocess()
    {
        return $this->belongsTo(productionprocess::class, 'workflow_id', 'workflow_id');
    }

    public function creator() {
        switch ($this->guard) {
            case 'admin':
                return $this->belongsTo(Admins::class, 'created_by');
            case 'employee':
                return $this->belongsTo(HRMS\CompanyEmployees::class, 'created_by');
            case 'web':
                return $this->belongsTo(Users::class, 'created_by');
            default:
                throw new \Exception("Invalid guard: {$this->guard}");
        }
    }


}
