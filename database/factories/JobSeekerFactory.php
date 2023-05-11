<?php

namespace Database\Factories;

use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class JobSeekerFactory extends Factory
{
    protected $model = JobSeeker::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['account_type' => 'jobseeker'])->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'resume' => $this->faker->word . '.' . $this->faker->randomElement(['pdf', 'doc']),
        ];
    }
}
