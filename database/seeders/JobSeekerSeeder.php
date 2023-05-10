<?php

namespace Database\Seeders;

use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create three job seeker users
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'name' => 'Job Seeker User '.$i,
                'email' => 'jobseeker'.$i.'@example.com',
                'password' => Hash::make('password'),
                'account_type' => 'jobseeker'
            ]);

            JobSeeker::create([
                'user_id' => $user->id,
                'first_name' => 'First Name '.$i,
                'last_name' => 'Last Name '.$i,
                'phone_number' => '123456789'.$i,
                'address' => 'Address '.$i,
                'resume' => 'resume'.$i.'.pdf'
            ]);
        }
    }
}
