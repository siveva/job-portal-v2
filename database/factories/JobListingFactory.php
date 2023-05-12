<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now();
        $oneMonthFromNow = $now->copy()->addMonth();
        $deadline = $this->faker->dateTimeBetween($now, $oneMonthFromNow);

        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraphs(3, true),
            'location' => $this->faker->city . ', ' . $this->faker->stateAbbr,
            'salary' => $this->faker->numberBetween(30000, 100000),
            'job_type' => $this->faker->randomElement(['part-time', 'full-time', 'freelance', 'internship', 'temporary']),
            'requirements' => $this->faker->paragraph(5, true),
            'deadline' => $deadline,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (JobListing $jobListing) {
            $categories = Category::inRandomOrder()->limit(rand(2, 5))->get();
            $jobListing->categories()->attach($categories);
        });
    }
}
