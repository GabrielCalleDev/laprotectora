<?php

namespace App\Filament\Resources\PetImageResource\Pages;

use App\Filament\Resources\PetImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPetImage extends EditRecord
{
    protected static string $resource = PetImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
