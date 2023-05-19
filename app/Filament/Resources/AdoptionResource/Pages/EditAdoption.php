<?php

namespace App\Filament\Resources\AdoptionResource\Pages;

use App\Filament\Resources\AdoptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdoption extends EditRecord
{
    protected static string $resource = AdoptionResource::class;

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
        return 'Se han actualizado correctamente los datos de la adopción';
    }
}
