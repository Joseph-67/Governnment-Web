<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class policy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('policies')->insert([
            ['title' => 'Quality Policy', 'sequence_order' => 1],
            ['title' => 'Enviromental Policy', 'sequence_order' => 2],
            ['title' => 'Health and safety policy', 'sequence_order' => 3],
            ['title' => 'Human resource policy', 'sequence_order' => 4],
            ['title' => 'Data protection policy', 'sequence_order' => 5],
            ['title' => 'Cooperate social reponsibility policy', 'sequence_order' => 6],
        ]);
    }
}
