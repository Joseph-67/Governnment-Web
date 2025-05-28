<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('en_US');
        for ($i = 0; $i < 200; $i++) {
            DB::table('tags')->insert([
                'name' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
