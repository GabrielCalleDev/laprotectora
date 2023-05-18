<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoryPet>
 */
class PetHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['vacuna', 'desparasitacion', 'enfermedad', 'cirugia', 'otro']),
            'description' => $this->faker->sentence(),
            'pet_id' => $this->faker->numberBetween(1, 3),                
        ];
    }
}
