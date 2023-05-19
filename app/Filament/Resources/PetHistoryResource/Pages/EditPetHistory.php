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
}
