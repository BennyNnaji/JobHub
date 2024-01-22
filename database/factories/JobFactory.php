<?php

namespace Database\Factories;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company_id = $this->faker->numberBetween(1, 65);
        //$selected_company_id = $this->faker->randomElement($company_id);
        $job_title = $this->faker->jobTitle;
        $job_type = ['Internship', 'Part Time', 'Full Time'];
        $selected_job_type = $this->faker->randomElement($job_type);
        $min_salary = $this->faker->numberBetween(40000, 60000);
        $max_salary = $this->faker->numberBetween($min_salary, 100000);
        $country = $this->faker->country();
        $state = $this->faker->state($country);
        $location = $state . ', ' . $country;

        return [
        'company_id' => $this->faker->numberBetween(1, 65),
        'job_title' => $job_title,
        'job_type' => $selected_job_type,
        'job_description' => $this->faker->sentence(510),
        'min_salary' => $min_salary,
        'max_salary' => $max_salary,
        'job_location' =>$location,
        'deadline' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        'responsibility' => $this->faker->sentence(800),
        'benefits' => $this->faker->sentence(500),
        'job_status' => 1,
        ];
    }
}
