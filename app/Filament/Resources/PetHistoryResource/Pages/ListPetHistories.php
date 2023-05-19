<?php

namespace App\Filament\Resources\PetHistoryResource\Pages;

use App\Filament\Resources\PetHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPetHistories extends ListRecords
{
    protected static string $resource = PetHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
