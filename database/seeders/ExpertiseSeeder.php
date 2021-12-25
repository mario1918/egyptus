<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expertises')->insert([
            'name' => 'Local Cuisine',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Local Culture',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Safary',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Pick up and Driving Tours',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Art and Museums',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Nightlife and Bars',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Exploration and Sightseeing',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Pharaonic Cairo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Roman Dynasty',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('expertises')->insert([
            'name' => 'Christian History',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('expertises')->insert([
            'name' => 'Islamic Cairo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('expertises')->insert([
            'name' => 'Modern History',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('expertises')->insert([
            'name' => 'Biking',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
