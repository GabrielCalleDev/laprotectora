<?php

namespace App\Filament\Resources\PetHistoryResource\Pages;

use App\Filament\Resources\PetHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePetHistory extends CreateRecord
{
    protected static string $resource = PetHistoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente el historial de mascota';
    }
}
