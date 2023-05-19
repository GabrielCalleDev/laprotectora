<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Closure;
use App\Models\Pet;
use App\Models\User;
use App\Models\Visit;
use App\Models\People;
use App\Models\Adoption;
use App\Models\Donation;
use App\Models\Favorite;
use App\Models\PetHistory;
use App\Models\ContactForm;
use App\Models\ShelterHouse;
use App\Models\Questionnaire;
use Faker\Generator as Faker;
use App\Models\AdoptionHistory;
use Illuminate\Database\Seeder;
use App\Models\ContactsDirectory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{
    const IMAGE_URL = 'https://source.unsplash.com/random/200x200/?img=1';
    const DOG_IMAGE_URL = 'https://source.unsplash.com/random/200x200/?dog';
    const CAT_IMAGE_URL = 'https://source.unsplash.com/random/200x200/?cat';

    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Eliminar todos los archivos del directorio public
        Storage::deleteDirectory('public'); // Storage::delete(Storage::allDirectories('public'));

        // Configuración de los registros a crear:
        $users          = 10;
        $shelterHouses  = 10;
        $pets           = 10;
        $contactForms   = 10;
        $donations      = 40;
        $visits         = 10;
        $questionnaires = 10;
        $adoptions      = 10;
        $contacts       = 10;

        // *****************************************************
        // Admin user creation
        $this->command->warn(PHP_EOL . 'Creating admin user...');
        $this->withProgressBar(1, fn () => User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'role' => 'admin',
        ]));
        User::factory(1)->create([
            'name' => 'Gabriel',
            'email' => 'gabriel.calle92@gmail.com',
            'username' => 'gabriel',
            'role' => 'admin',
        ]);
        $this->command->info('Admin user created.');


        // *****************************************************
        // Users
        $this->command->warn(PHP_EOL . 'Creating users...');
        $this->withProgressBar($users, fn () => People::factory(1)
            ->afterCreating(function (People $people) {
                $this->command->warn(PHP_EOL . 'Creating user data for: '.$people->name.' '.$people->last_name);
                User::factory(1)->create([
                    'id_people' => $people->id,
                ]);
            })
            ->create()
        );
        $this->command->info('Users created.');
     

        // ShelterHouses
        $this->command->warn(PHP_EOL . 'Creating shelterHouses...');
        $this->withProgressBar($shelterHouses, fn () => ShelterHouse::factory(1)->create());
        $this->command->info('ShelterHouses created.');


        // *****************************************************
        // Pets
        $this->command->warn(PHP_EOL . 'Creating '.($pets*2).'pets...');
        // Creating dogs
        $this->command->warn(PHP_EOL . 'Creating '.$pets.' dogs...');
        $this->withProgressBar($pets, fn () => Pet::factory(1)
            ->afterCreating(function (Pet $pet) {
                $this->command->warn(PHP_EOL . 'Creating pet histories for dog: '.$pet->name);
                $this->withProgressBar(2, fn () => PetHistory::factory(1)->create([
                    'pet_id' => $pet->id,
                ]));
                //Asignando una casa de acogida aleatoria
                if (rand(0, 1)){
                    $this->command->info('Setting a shelter house for cat: '.$pet->name);
                    $pet->shelterHouse()->associate(ShelterHouse::inRandomOrder()->first())->save();
                }
            })
            ->create([
                'species' => 'Perro',
                'breed' => $this->faker->randomElement(['Mixed Breed', 'Husky', 'Golden Retriever', 'Boxer', 'Bulldog', 'Beagle', 'Poodle', 'Chihuahua', 'Pug', 'Rottweiler', 'Yorkshire Terrier']),
                'weight' => $this->faker->randomFloat(2, 1, 40),
            ])
        );
        $this->command->info($pets.' dogs created.');

        // Creating cats
        $this->command->warn(PHP_EOL . 'Creating '.$pets.' cats...');
        $this->withProgressBar($pets, fn () => Pet::factory(1)
            ->afterCreating(function (Pet $pet) {
                $this->command->warn(PHP_EOL . 'Creating pet histories for cat...');
                $this->withProgressBar(2, fn () => PetHistory::factory(1)->create([
                    'pet_id' => $pet->id,
                ]));
                //Asignando una casa de acogida aleatoria
                if (rand(0, 1)){
                    $this->command->info('Setting a shelter house for cat: '.$pet->name);
                    $pet->shelterHouse()->associate(ShelterHouse::inRandomOrder()->first())->save();
                }
            })
            ->create([
                'species' => 'Gato',
                'breed' => $this->faker->randomElement(['Mixed Breed','Maine Coon', 'Persa', 'Siames', 'Bengal', 'Sphynx', 'Ragdoll', 'Abisinio']),
                'weight' => $this->faker->randomFloat(2, 1, 10),
            ])
        );
        $this->command->info($pets.' cats created.');


        // *****************************************************
        // Contact form
        $this->command->warn(PHP_EOL . 'Creating contact form data...');
        $this->withProgressBar($contactForms, fn () => ContactForm::factory(1)->create());
        $this->command->info('ContactData created.');


        // *****************************************************
        // Donations
        $this->command->warn(PHP_EOL . 'Creating Donations...');
        $this->withProgressBar($donations, fn () => Donation::factory(1)->create([
            'user_id' => rand(1, User::count())
        ]));
        $this->command->info('Donations created.');


        // *****************************************************      
        // Favorites
        $this->command->warn(PHP_EOL . 'Creating Favorites...');
        $users = User::pluck('id');
        $contador = 0;
        $this->withProgressBar($users->count(), function () use (&$contador, $users) {
            $user_id = $users[$contador];
            $contador++;
            return Favorite::factory(rand(1, ($users->count()/2) ))->create([
                'user_id' => $user_id,
            ]);
        });
        $this->command->info('Favorites created.');


        // *****************************************************
        // Visits
        $this->command->warn(PHP_EOL . 'Creating visits data...');
        $this->withProgressBar($contactForms, fn () => Visit::factory($visits)->create());
        $this->command->info('Visits data created.');


        // *****************************************************
        // Questionnaires
        $this->command->warn(PHP_EOL . 'Creating questionnaires data...');
        $this->withProgressBar($questionnaires, fn () => Questionnaire::factory(1)->create());
        $this->command->info('Questionnaires data created.');


        // *****************************************************
        // Adoptions
        $this->command->warn(PHP_EOL . 'Creating adoptions data...');
        $this->withProgressBar($adoptions, fn () => Adoption::factory(1)
            ->afterCreating(function (Adoption $adoption) {
                $this->command->warn(PHP_EOL . 'Creating adoption histories for adoption...');
                AdoptionHistory::factory(6)->create([
                    'adoption_id' => $adoption->id,
                ]);
            })
            ->create()
        );
        $this->command->info('Adoptions data created.');

        
        // *****************************************************
        // Contacts directory
        $this->command->warn(PHP_EOL . 'Creating contacts directory data...');
        $this->withProgressBar($contacts, fn () => ContactsDirectory::factory(1)->create());
        $this->command->info('Contacts directory data created.');


        // *****************************************************
        // Listado de usuarios creados en la base de datos
        $this->command->question(PHP_EOL.'[ Contraseña ]: "password"');

        $this->command->table(
            ['Nombre', 'Email'],
            User::all(['name', 'email'])->toArray()
        );
    }

    public function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);

        $progressBar->start();

        $items = new Collection();

        foreach (range(1, $amount) as $i) {
            $items = $items->merge(
                $createCollectionOfOne()
            );
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->command->getOutput()->writeln('');

        return $items;
    }
}

/*
        $this->command->info('verde');
        $this->command->warn('alerta');
        $this->command->question('Azul sobresaltado');
        $this->command->error('Error');
        $this->command->line('Línea');
*/