<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::factory()->count(5000)
            ->create(); 
    }
}
