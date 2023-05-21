<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\User;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adoption>
 */
class AdoptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_id' => Pet::count() == 0 ? null : $this->faker->numberBetween(1, Pet::count()),
            'user_id' => Pet::count() == 0 ? null : $this->faker->numberBetween(1, User::count()),
            'status' => $this->faker->randomElement(['nuevo','cuestionario','visita','entrevista','firma','pago','seguimiento','finalizado','cancelado']),
            'observation' => $this->faker->text(255),
            'questionnaire_id' => Questionnaire::count() == 0 ? null : $this->faker->numberBetween(1, Questionnaire::count()),
        ];
    }
}
