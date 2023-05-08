<?php

namespace App\Filament\Resources\ShelterHouseResource\Pages;

use App\Filament\Resources\ShelterHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShelterHouse extends EditRecord
{
    protected static string $resource = ShelterHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
