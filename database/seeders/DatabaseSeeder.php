<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CompanyInfoSeeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            CompanyInfoSeeder::class,
            UserSeeder::class,
        ]);
    }
}
