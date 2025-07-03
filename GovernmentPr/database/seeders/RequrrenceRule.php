<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RequrrenceRule extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {
            \DB::table('recurrence_rules')->insert([
            'company_id' => $faker->numberBetween(1, 200),
            'frequency' => $faker->randomElement(['daily', 'weekly', 'monthly']),
            'interval' => $faker->numberBetween(1, 4),
            'start_date' => $faker->date(),
            'end_date' => $faker->optional()->date(),
            'by_day' => $faker->optional()->randomElement([json_encode(['MO', 'WE']), json_encode(['TU', 'TH']), null]),
            'by_month' => $faker->optional()->randomElement([json_encode([1, 3, 12]), json_encode([2, 6]), null]),
            'count' => $faker->optional()->numberBetween(1, 30),
            'is_active' => $faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
