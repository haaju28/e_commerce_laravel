<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebInformation>
 */
class WebInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone' =>$this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
        ];
    }
}
