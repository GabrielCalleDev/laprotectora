<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->randomNumber(9),
            'phone' => $this->faker->unique()->randomNumber(9),
            'birthdate' => $this->faker->date(),
            'street_address' => $this->faker->streetAddress(),
            'address_number' => $this->faker->buildingNumber(),
            'address_details' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'zip_code' => $this->faker->postcode(),
            'type' => $this->faker->randomElement(['Adoptante', 'Voluntario', 'Socio']),
            'observations' => $this->faker->text(99),
            'occupation' => $this->faker->jobTitle(),
        ];
    }
}
