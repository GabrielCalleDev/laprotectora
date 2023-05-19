<?php

namespace App\Filament\Resources\ContactsDirectoryResource\Pages;

use App\Filament\Resources\ContactsDirectoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactsDirectory extends EditRecord
{
    protected static string $resource = ContactsDirectoryResource::class;

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
        return 'Se ha actualizado correctamente el directorio de contactos';
    }
}
