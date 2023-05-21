<?php

namespace App\Filament\Resources\ContactsDirectoryResource\Pages;

use App\Filament\Resources\ContactsDirectoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactsDirectory extends CreateRecord
{
    protected static string $resource = ContactsDirectoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente el directorio de contactos';
    }
}
