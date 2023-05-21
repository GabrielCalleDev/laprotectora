<?php

namespace App\Filament\Resources\ShelterHouseResource\Pages;

use App\Filament\Resources\ShelterHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShelterHouse extends CreateRecord
{
    protected static string $resource = ShelterHouseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente la casa de acogida';
    }
}
