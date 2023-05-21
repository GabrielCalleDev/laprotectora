<?php

namespace Database\Factories;

use App\Models\Adoption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdoptionHistory>
 */
class AdoptionHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adoption_id' => Adoption::count() == 0 ? null : $this->faker->numberBetween(1, Adoption::count()),
            'status' => $this->faker->randomElement(['nuevo','cuestionario','visita','entrevista','firma','pago','seguimiento','finalizado','cancelado']),
            'update' => $this->faker->text(255),
        ];
    }
}
