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
}
