<?php

namespace Database\Seeders;

use App\Models\Employer;
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
        // Create two employer users
        for ($i = 1; $i <= 2; $i++) {
            $user = User::create([
                'name' => 'Employer User '.$i,
                'email' => 'employer'.$i.'@example.com',
                'password' => Hash::make('password'),
                'account_type' => 'employer'
            ]);

            Employer::create([
                'user_id' => $user->id,
                'company_name' => 'Company '.$i,
                'company_description' => 'Description of Company '.$i,
                'company_logo' => 'logo'.$i.'.png'
            ]);
        }
    }
}
