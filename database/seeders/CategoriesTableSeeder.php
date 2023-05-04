<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Define the categories to be seeded
          $categories = [
            ['name' => 'Technology'],
            ['name' => 'Finance'],
            ['name' => 'Marketing'],
            ['name' => 'Design'],
            ['name' => 'Education'],
            ['name' => 'Healthcare'],
            ['name' => 'Hospitality'],
            ['name' => 'Sales'],
            ['name' => 'Customer Service'],
            ['name' => 'Engineering'],
        ];

        // Insert the categories into the database
        DB::table('categories')->insert($categories);
        
    }
}
