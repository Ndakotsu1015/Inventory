<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            ['name' => 'Mr. Mohammed Aliyu'],
            ['name' => 'Mr. Joseph Onyilo'],
            ['name' => 'Mr. Sammy Akpata'],
            ['name' => 'Miss. Mercy Itunu'],
            ['name' => 'Mr. Solomon Iwajomon']
            
         ]);
    }
}
