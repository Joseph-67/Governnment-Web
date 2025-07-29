<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUsers extends Model
{
    use HasFactory;
    protected $table = 'company_users';
    protected $primaryKey = 'company_user_id';
    protected $fillable = [
        'company_id',
        'user_id',
    ];
    public $timestamps = true;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function countCompaniesForUser($userId)
    {
        return self::where('user_id', $userId)->count();
    }
    
   
   
}
