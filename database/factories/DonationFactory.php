<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'value' => $this->faker->randomFloat(2, 1, 1000),
            'type' => $this->faker->randomElement(['Comida', 'Material', 'Efectivo', 'Tarjeta de crédito', 'Transferencia bancaria']),
            'description' => $this->faker->paragraph(),
        ];
    }
}
