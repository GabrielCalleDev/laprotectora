<?php

namespace App\Filament\Resources\PetHistoryResource\Pages;

use App\Filament\Resources\PetHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPetHistory extends EditRecord
{
    protected static string $resource = PetHistoryResource::class;

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
        return 'Se ha actualizado correctamente el historial de mascota';
    }
}
