<?php

namespace Database\Seeders;

use App\Models\JobSeeker;
use Database\Factories\JobSeekerFactory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;


class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobSeeker::factory()->count(10000)->create(); 
    }
}
