<?php

namespace App\Filament\Resources\PetImageResource\Pages;

use App\Filament\Resources\PetImageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePetImage extends CreateRecord
{
    protected static string $resource = PetImageResource::class;
}
