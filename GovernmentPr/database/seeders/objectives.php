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
        $objectives = [
            'Business growth',
            'Customer satisfaction',
            'Material optimization',
            'Waste minimization',
            'Measurable & timely targets',
            'Innovation',
            'Sustainability',
            'Employee management',
            'Market expansion',
            'Human environmental health'
        ];

        foreach ($objectives as $index => $objective) {
            \DB::table('objectives')->insert([
            'name' => $objective,
            'description' => null,
            'sequence_order' => $index + 1,
            'start_date' => null,
            'end_date' => null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
        // Insert sample objectives into the objectives table
        
    }
}
