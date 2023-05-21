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
    
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Se ha actualizado correctamente la casa de acogida';
    }
}
