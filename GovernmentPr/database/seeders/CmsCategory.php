<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CmsCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            \DB::table('cms_categories')->insert([
            'name' => $faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }

    }
}
