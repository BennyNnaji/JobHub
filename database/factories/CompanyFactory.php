<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $password = $this->faker->password;
        return [
            'name' =>$this->faker->company(),
            'email'=>$this->faker->email(),
            'website' =>$this->faker->domainName(),
            'phone'=>$this->faker->phoneNumber(),
            'password'=> bcrypt($password),

        ];
    }
}
