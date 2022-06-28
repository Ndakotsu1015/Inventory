<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('products')->insert([
        ['name' => 'Monitor'],
        ['name' => 'Projector'],
        ['name' => 'USB drives'],
        ['name' => 'Data Projector'],
        ['name' => 'Power adapters and UPS backup devices'],
        ['name' => 'Cameras'],
        ['name' => 'Calculators'],
        ['name' => 'Presenter devices'],
        ['name' => 'SD cards'],
        ['name' => 'Video and Audio cards'],
        ['name' => 'Television'],
        ['name' => 'Speakers'],
        ['name' => 'Desktop Scanner'],
        ['name' => 'Paper'],
        ['name' => 'Tonner/Ink'],
        ['name' => 'Kyboard'],
       ]);
        

    }
}
