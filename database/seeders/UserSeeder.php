<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Make Seeder Default User
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@atresna.com',
            'user_role' => 'Admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}
