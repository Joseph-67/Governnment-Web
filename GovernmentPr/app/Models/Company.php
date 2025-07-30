<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyMaterial;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = "company_id";
    protected $fillable = [
        'company_name',
        'industry',
        'industry_process',
        'email',
        'primary_phone_number',
        'secondary_phone_number',
        'country',
        'state',
        'city',
        'address',
        'zip_code',
        'longitude',
        'latitude',
        'mgrs',
        'website_url',
        'date_of_establishment',
        'number_of_employees',
        'operations_manager',
        'contact_person_full_name',
        'contact_person_position',
        'contact_person_contact_number',
        'is_sharable',
        'status',
        'created_at',
        'updated_at',
    ];

    public function companyProducts()
    {
        return $this->hasMany(Product::class, 'company_id', 'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);    
    }
    public function companyMaterials()
    {
        return $this->hasMany(CompanyMaterial::class, 'companyID', 'company_id');
    }

    public function companyChemicals()
    {
        return $this->hasMany(CompanyChemical::class, 'company_id', 'company_id');
    }

    public function companyWaterConservations()
    {
        return $this->hasMany(CompanyWaterConservation::class);
    }

    public function stock_movements()
    {
        return $this->hasMany(stock_movement::class, 'companyID');
    }

    public function companyWaterConservationOpportunities()
    {
        return $this->hasMany(CompanyWaterConservationOpportunity::class);
    }

    public function companyEnergyConservationOpportunities()
    {
        return $this->hasMany(CompanyEnergyConservationOpportunity::class);
    }

    public function companyWasteManagementOpportunities()
    {
        return $this->hasMany(CompanyWasteManagementOpportunity::class);
    }

    public function companyWasteWaterOpportunities()
    {
        return $this->hasMany(CompanyWasteWaterOpportunity::class);
    }

    
    public function companyAirPollutionOpportunities()
    {
        return $this->hasMany(CompanyAirPollutionOpportunity::class);
    }

    public function companyGreenhouseGasEmissionOpportunities()
    {
        return $this->hasMany(CompanyGreenhouseGasEmissionOpportunity::class);
    }

    public function companyWaterPollutionOpportunities()
    {
        return $this->hasMany(CompanyWaterPollutionOpportunity::class);
    }

    public function companyEnergyConsumptionOpportunities()
    {
        return $this->hasMany(CompanyEnergyConsumptionOpportunity::class);
    }

    public function companyWasteGenerationOpportunities()
    {
        return $this->hasMany(CompanyWasteGenerationOpportunity::class);
    }

    public function companyChemicalUsages()
    {
        return $this->hasMany(ChemicalUsage::class);
    }

    public function companyWaterUsages()
    {
        return $this->hasMany(WaterUsage::class);
    }

    public function companyEnergyUsages()
    {
        return $this->hasMany(EnergyUsage::class);
    }

    public function companyWasteUsages()
    {
        return $this->hasMany(WasteUsage::class);
    }

    public function companyAirPollutionUsages()
    {
        return $this->hasMany(AirPollutionUsage::class);
    }

    public function companyGreenhouseGasEmissionUsages()
    {
        return $this->hasMany(GreenhouseGasEmissionUsage::class);
    }

    public function companyWaterPollutionUsages()
    {
        return $this->hasMany(WaterPollutionUsage::class);
    }

    public function companyRecp() {
        return $this->hasOne(recp::class, 'company_id', 'company_id'); // Define the one-to-one relationship with the recp model
    }

    public static function totalActiveCompanies()
    {
        return self::where('status', 'active')->count(); // BEGIN: Count active companies
    } // END:
    public static function totalInactiveCompanies()
    {
        return self::where('status', 'inactive')->count(); // BEGIN: Count inactive companies
    }
    public static function totalNewCompaniesThisWeek()
    {
        return self::where('created_at', '>=', now()->startOfWeek())->count(); // BEGIN: Count new companies this week
    } // END:
    public static function totalStates()
    {
        return self::distinct('state')->count('state');
    }
    public static function getAllRegions()
{
    return self::select('state')
        ->whereNotNull('state')
        ->distinct()
        ->orderBy('state')
        ->pluck('state');
}

    

}
