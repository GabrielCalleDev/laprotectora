<?php

namespace App\Filament\Resources\AdoptionHistoryResource\Pages;

use App\Filament\Resources\AdoptionHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdoptionHistory extends EditRecord
{
    protected static string $resource = AdoptionHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Se ha actualizado correctamente el historial de adopción';
    }
}
