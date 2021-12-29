<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TouristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insertGetId([

            'firstName' => "Teta",
            'lastName' => "Toto",
            'email' => "zekas.bolbol@gmail.com",
            'password' => Hash::make('asdf1234'),
            'profileImg' => "images/boy.png",
            'isAdmin' => 0,
            'status' => 'active',
            'type' => 2,
            'location' => 'Africa/Egypt',
            'birthdate' => '1996-09-10',
            'phoneNo' =>  +101287748574,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tourist')->insert([
            'user_id'=> $user,
        ]);
    }
}
