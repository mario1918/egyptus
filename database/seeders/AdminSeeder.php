<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           
            'firstName' => "Marina",
            'lastName' => "Nabil",
            'username' => "Admin",
            'email' => "zeka.bolbol@gmail.com",
            'password' => Hash::make('123456789'),
            'profileImg' => "",
            'isAdmin' => 1,
            'status' => 'active',
            'type' => 1,
            'location' => 'Egypt',
            'birthdate' => '1997-09-10',
            'phoneNo' => 201287748574,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
