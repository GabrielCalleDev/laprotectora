<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\PetHistory;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\PetHistoryResource\Pages;
use App\Models\Pet;

class PetHistoryResource extends Resource
{
    protected static ?string $model = PetHistory::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Historial de mascotas';

    protected static ?string $slug = 'historial-de-mascotas';
    
    protected static ?string $navigationLabel = 'Historial de mascotas';
    
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('pet_id'),
                                Forms\Components\TextInput::make('type')
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpan('full')
                                    ->label('Descripción'),

                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('created_at')
                            ->disabled()
                            ->label('Creado el'),
                        Forms\Components\DateTimePicker::make('updated_at')
                            ->disabled()
                            ->label('Actualizado el'),
                    ])
                    ->columnSpan(['lg' => 1]),
                    // ->hidden(fn (?Pet $record) => $record === null),
            ])
            ->columns([
                'sm' => 3,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pet.name')
                    ->label('Mascota')
                    ->icon('heroicon-o-finger-print')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(30),
                Tables\Columns\TextColumn::make('created_at')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPetHistories::route('/'),
            'create' => Pages\CreatePetHistory::route('/create'),
            'edit' => Pages\EditPetHistory::route('/{record}/edit'),
        ];
    }    
}
