<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->realText($maxNbChars = 250, $indexSize = 2),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->companyEmail,
            'email_verified_at' => now()
        ];
    }
}
