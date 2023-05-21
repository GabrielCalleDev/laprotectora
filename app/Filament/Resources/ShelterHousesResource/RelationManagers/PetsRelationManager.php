<?php

namespace App\Filament\Resources\ShelterHousesResource\RelationManagers;

use App\Models\Pet;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PetsRelationManager extends RelationManager
{
    protected static string $relationship = 'pets';

    protected static ?string $title = 'Mastocas acogidas en la casa';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('product-image')
                    ->label('Mascota')
                    ->collection('pets'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->label('Nombre'),
                Tables\Columns\BadgeColumn::make('adoption_status')
                    ->label('Estado')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->icon('heroicon-s-finger-print')
                    ->getStateUsing(function (Pet $record): string {
                        switch ($record->adoption_status) {
                            case 'Disponible'  : return 'Disponible';
                            case 'Adoptado'    : return 'Adoptado';
                            case 'En adopción' : return 'En adopción';
                            default            : return 'secondary';
                        }
                    })
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'Disponible'  : return 'primary';
                            case 'Adoptado'    : return 'success';
                            case 'En adopción' : return 'warning';
                            default            : return 'primary';
                        }
                    }),
                Tables\Columns\BadgeColumn::make('species')
                    ->label('Especie')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->icon('heroicon-s-finger-print')
                    ->color('secondary'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
            ]);
    }    
}
