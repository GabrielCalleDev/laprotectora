<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const IMAGE_URL = 'https://source.unsplash.com/random/200x200/?img=1';

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // User::factory(10)->create()->each(function ($user) {
        //     // Agregar una imagen de avatar a cada usuario utilizando Spatie Media Library
        //     $avatarPath = storage_path('app/public/avatars/avatar.jpg'); // Ruta de la imagen de avatar
        //     $user->addMedia($avatarPath)->toMediaCollection('avatars');
        // });
    }
}
