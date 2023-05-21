<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactsDirectory>
 */
class ContactsDirectoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $this->faker->name(),
            'phone'    => $this->faker->phoneNumber(),
            'email'    => $this->faker->email(),
            'address'  => $this->faker->address(),
            'company'  => $this->faker->company(),
            'position' => $this->faker->jobTitle(),
            'notes'    => $this->faker->text(150),
            'type'     => $this->faker->randomElement(['personal', 'professional']),
        ];
    }
}
