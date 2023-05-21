<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Pet;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Array con un listado de 20 colores, variable $colores
        $coloresMascotas = [
            'Blanco',
            'Negro',
            'Marrón',
            'Gris',
            'Dorado',
            'Atigrado',
            'Tricolor',
            'Manchado',
            'Naranja',
            'Canela',
            'Beige',
            'Azul',
            'Rojo',
            'Plateado',
            'Crema',
            'Chocolate',
            'Caramelo',
            'Rayado',
            'Pardo',
            'Amarillo'
        ];

        $currentDate = Carbon::now();
        $oneYearAgo = $currentDate->subYears(1);
        $twoYearsAgo = $currentDate->subYears(2);

        return [
            'name' => $this->faker->firstName(),
            'species' => $this->faker->randomElement(['Perro', 'Gato']),
            'breed' => null,
            'age' => $this->faker->dateTimeBetween('-10 years', '-1 year'),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'color' => $this->faker->randomElement($coloresMascotas),
            'size' => $this->faker->randomElement(['Pequeño', 'Mediano', 'Grande']),
            'weight' => $this->faker->randomFloat(2, 1, 40),
            'adoption_status' => $this->faker->randomElement(['Disponible', 'En adopción', 'Adoptado']),
            'admission_date' => $this->faker->dateTimeBetween($twoYearsAgo, $currentDate)->format('Y-m-d'),
            'adoption_date' => $this->faker->dateTimeBetween($oneYearAgo, $currentDate)->format('Y-m-d'),
            'health_conditions' => $this->faker->sentence(),
            'medications' => $this->faker->sentence(),
            'history' => $this->faker->sentence(),
            'neutered' => $this->faker->boolean(),
            'observations' => $this->faker->sentence(),
            'shelter_house_id' => null,
        ];
    }

    public function configure(): PetFactory
    {
        return $this->afterCreating(function (Pet $pet) {
            try {
                for ($i = 0; $i < 5; $i++) {
                    if($pet->species == 'Perro'){
                        $url = DatabaseSeeder::DOG_IMAGE_URL ." ". $pet->breed;
                        $url = str_replace(' ', '%20', $url);

                        echo PHP_EOL."Downloading image ". $i+1 .": [ ".$url." ]";

                        $pet
                            ->addMediaFromUrl($url)
                            ->toMediaCollection('pets');
                        
                    } else if($pet->species == 'Gato'){
                        $url = DatabaseSeeder::CAT_IMAGE_URL ." ". $pet->breed;
                        $url = str_replace(' ', '%20', $url);

                        echo PHP_EOL."Downloading image ". $i+1 .": [ ".$url." ]";

                        $pet
                            ->addMediaFromUrl($url)
                            ->toMediaCollection('pets');
                    }
                }
            } catch (UnreachableUrl $exception) {
                dump($exception);
                return;
            }
        });
    }
}
