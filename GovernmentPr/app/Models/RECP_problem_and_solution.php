<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_problem_and_solution extends Model
{
    use HasFactory;
    protected $table = "recp_problem_and_solutions";
    protected $primaryKey = "problemSolutionID";
    protected $fillable = [
        'companyID',
        'problem_solution_title',
        'status'
    ];
}
