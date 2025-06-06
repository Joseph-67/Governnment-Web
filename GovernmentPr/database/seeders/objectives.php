<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class objectives extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('objectives')->insert([
            ['name' => 'Business growth', 'sequence_order' => 1],
            ['name' => 'Customer satisfaction', 'sequence_order' => 2],
            ['name' => 'Material optimization', 'sequence_order' => 3],
            ['name' => 'Waste minimization', 'sequence_order' => 4],
            ['name' => 'Measurable & timely targets', 'sequence_order' => 5],
            ['name' => 'Innovation', 'sequence_order' => 6],
            ['name' => 'Sustainability', 'sequence_order' => 7],
            ['name' => 'Employee management', 'sequence_order' => 8],
            ['name' => 'Market expansion', 'sequence_order' => 9],
            ['name' => 'Human environmental health', 'sequence_order' => 10],
        ]);
    }
}
