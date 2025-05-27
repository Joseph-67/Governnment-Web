<?php

namespace App\Models\HRMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDepartment extends Model
{
    use HasFactory;
    protected $table = 'company_departments';
    protected $primaryKey = 'DepartmentID';
    protected $fillable = [
        'DepartmentName',
        'ManagerID',
        'CompanyID',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'CompanyID', 'CompanyID');
    }
    public function manager()
    {
        return $this->belongsTo(CompanyEmployee::class, 'ManagerID', 'EmployeeID');
    }
}
