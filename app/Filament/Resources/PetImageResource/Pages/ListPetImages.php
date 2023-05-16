<?php

namespace App\Filament\Resources\PetImageResource\Pages;

use App\Filament\Resources\PetImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPetImages extends ListRecords
{
    protected static string $resource = PetImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
