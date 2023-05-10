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
            ['name' => 'Web Development'],
            ['name' => 'Graphic Designer'],
            ['name' => 'Multimedia'],
            ['name' => 'Advertising'],
            ['name' => 'Education & Training'],
            ['name' => 'English'],
            ['name' => 'Social Media'],
            ['name' => 'Writing'],
            ['name' => 'PHP Programming'],
            ['name' => 'Project Management'],
            ['name' => 'Finance Management'],
            ['name' => 'Office & Admin'],
            ['name' => 'Web Designer'],
            ['name' => 'Customer Service'],
            ['name' => 'Marketing & Sales'],
            ['name' => 'Software Development'],
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
