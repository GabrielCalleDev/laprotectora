<?php

namespace App\Filament\Resources\AdoptionHistoryResource\Pages;

use App\Filament\Resources\AdoptionHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdoptionHistory extends CreateRecord
{
    protected static string $resource = AdoptionHistoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente el historial de adopción';
    }
}
