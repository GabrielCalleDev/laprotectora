<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Closure;
use App\Models\User;
use App\Models\ShelterHouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Helper\ProgressBar;


class DatabaseSeeder extends Seeder
{
    const IMAGE_URL = 'https://source.unsplash.com/random/200x200/?img=1';

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Eliminar todos los archivos del directorio public
        Storage::deleteDirectory('public'); // Storage::delete(Storage::allDirectories('public'));

        // Admin user creation
        $this->command->warn(PHP_EOL . 'Creating admin user...');
        $this->withProgressBar(1, fn () => User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]));
        User::factory(1)->create([
            'name' => 'Gabriel',
            'email' => 'gabriel.calle92@gmail.com',
        ]);
        $this->command->info('Admin user created.');

        // Users
        $this->command->warn(PHP_EOL . 'Creating users...');
        $this->withProgressBar(10, fn () => User::factory(1)->create());
        $this->command->info('Users created.');
     
        // ShelterHouses
        $this->command->warn(PHP_EOL . 'Creating shelterHouses...');
        $this->withProgressBar(10, fn () => ShelterHouse::factory(1)->create());
        $this->command->info('ShelterHouses created.');
        
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
