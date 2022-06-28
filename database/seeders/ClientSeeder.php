<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            ['name' => 'Century Information Systems Limited', 'address' 
            => 'Suite C023 & 024 Plot 697 Idris Gidado Street, Wuye, Abuja.'],

            

            ['name' => 'Connectivity Network, BCN', 'address' 
            => '60 lake Chad Crescent, Off Ibb Way, Maitama Abuja'],

            

            ['name' => 'HP Service Centre Abuja', 'address' 
            => 'Prime Plaza, Adetokumbo Ademola Crescent, Wuze 2 Abuja'],

            
            ['name' => 'Jetcom Integrated Services Limited', 'address'
            => 'Muhammadu Buhari Way, Central Business District, FCT Abuja'],

            

            ['name' => 'VDT Communication Limited', 'address' 
            => 'Suit 28 Manga Plaza, Ayangba Street, Area 11 Garki Abuja'],

            

            ['name' => 'ACTI Limited', 'address' 
            =>'16 Djinbounti Crescent, Adetokumbo Ademola Crescent, FCT Abuja'],
            
            ['name' => 'Global Site Concepts Resources', 'address' 
            => 'Suite C29 New Banex Plaza, Aminu Kano Crescent, Wuse 2 Abuja'],
           
           ]);
    }
}
