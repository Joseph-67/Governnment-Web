<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\HRMS\CompanyEmployees;
use Faker\Factory as Faker;

class CompanyEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 150; $i++) {
            $data[] = [
                'CompanyID' => $faker->randomNumber(),
                'FirstName' => $faker->firstName,
                'LastName' => $faker->lastName,
                'Email' => $faker->unique()->safeEmail,
                'PhoneNumber' => $faker->phoneNumber,
                'DateOfBirth' => $faker->date('Y-m-d', '-20 years'),
                'Gender' => $faker->randomElement(['Male', 'Female']),
                'JobTitle' => $faker->jobTitle,
                'DepartmentID' => $faker->randomElement([1, 2, 3]),
                'ManagerIDs' => null,
                'HireDate' => $faker->date('Y-m-d', 'now'),
                'Status' => $faker->randomElement(['Active', 'Inactive']),
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'State' => $faker->state,
                'ZipCode' => $faker->postcode,
                'Country' => $faker->country,
                'EmergencyContact' => $faker->name,
                'EmergencyPhone' => $faker->phoneNumber,
                'ProfilePicture' => $faker->imageUrl(200, 200, 'people'),
                'EmployeeNumber' => 'EMP' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'password' => bcrypt('password123'),
                'LastLogin' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('company_employees')->insert($data);
    }
}