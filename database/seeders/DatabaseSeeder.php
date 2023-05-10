<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        // CategoriesTableSeeder::class;
        $this->call([
            CategoriesTableSeeder::class,
            AdminUserSeeder::class,
            EmployerSeeder::class,
            JobSeekerSeeder::class,
        ]);
    }
}
