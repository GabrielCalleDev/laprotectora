<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'pet_id' => $this->faker->numberBetween(1, Pet::count()),
            'user_id_responsible' => $this->faker->numberBetween(1, User::count()),
            'description' => $this->faker->text(),
        ];
    }
}
