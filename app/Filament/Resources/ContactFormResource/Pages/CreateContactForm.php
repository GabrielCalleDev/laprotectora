<?php

namespace App\Filament\Resources\ContactFormResource\Pages;

use App\Filament\Resources\ContactFormResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactForm extends CreateRecord
{
    protected static string $resource = ContactFormResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Se ha creado correctamente el formulario de contacto';
    }
}
