<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->randomNumber(9),
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(255),
            'status' => $this->faker->randomElement(['Pendiente', 'En proceso', 'Completado']),
        ];
    }
}
