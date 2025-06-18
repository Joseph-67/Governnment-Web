<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            \DB::table('companies')->insert([
                'company_name' => $faker->company,
                'industry' => $faker->randomElement(['Manufacturing', 'IT', 'Finance', 'Healthcare']),
                'industry_process' => $faker->randomElement(['Assembly', 'Software Development', 'Consulting', 'Research']),
                'email' => $faker->unique()->companyEmail,
                'primary_phone_number' => $faker->phoneNumber,
                'secondary_phone_number' => $faker->optional()->phoneNumber,
                'country' => $faker->country,
                'state' => $faker->state,
                'city' => $faker->city,
                'address' => $faker->streetAddress,
                'zip_code' => $faker->postcode,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'mgrs' => null,
                'website_url' => $faker->url,
                'date_of_establishment' => $faker->date('Y-m-d', 'now'),
                'number_of_employees' => $faker->numberBetween(10, 1000),
                'operations_manager' => $faker->name,
                'contact_person_full_name' => $faker->name,
                'contact_person_position' => $faker->jobTitle,
                'contact_person_contact_number' => $faker->phoneNumber,
                'is_sharable' => $faker->randomElement(['active', 'inactive']),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
