<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShelterHouse>
 */
class ShelterHouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'responsible' => $this->faker->name(),
            'street_address' => $this->faker->streetName(),
            'street_number' => $this->faker->buildingNumber(),
            'address_details' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'coordinates' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'capacity' => $this->faker->numberBetween(1, 100),
            'observations' => $this->faker->text(),           
        ];
    }
}
