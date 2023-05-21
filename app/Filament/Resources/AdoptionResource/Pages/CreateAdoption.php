<?php

namespace App\Filament\Resources\AdoptionResource\Pages;

use App\Filament\Resources\AdoptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdoption extends CreateRecord
{
    protected static string $resource = AdoptionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente la adopción';
    }
}
