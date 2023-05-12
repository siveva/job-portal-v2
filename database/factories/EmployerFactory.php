<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()
            ->has(JobListing::factory()->count(rand(5, 10))->state(function(array $attributes, User $user){
                return [
                    'employer_id' => $user->id,
                ];
            }))->create(['account_type' => 'employer'])->id,
            'company_name' => $this->faker->company,
            'company_description' => $this->faker->paragraph(3, true),
            'company_logo' => $this->faker->word . '.' . $this->faker->randomElement(['png', 'jpg'])
        ];
    }
}
