<?php

namespace App\Filament\Resources;

use App\Models\Pet;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\PetResource\Pages;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Mascotas';

    protected static ?string $slug = 'mascotas';
    
    protected static ?string $navigationLabel = 'Mascotas';
    
    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('species')
                                    ->label('Especie')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('breed')
                                    ->label('Raza')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('age')
                                    ->label('Fecha de nacimiento'),
                                Forms\Components\TextInput::make('sex')
                                    ->label('Sexo')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('color')
                                    ->label('Color')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('size')
                                    ->label('Tamaño')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('weight')
                                    ->suffix('Kg')
                                    ->label('Peso'),
                                Forms\Components\Select::make('shelter_house_id')
                                    ->relationship('shelterHouse', 'name')
                                    ->label('Asignar casa de acogida')
                                    ->hint('Acogida'),
                                Forms\Components\Select::make('adoption_status')
                                    ->label('Estado de adopción')
                                    ->options([
                                        'Disponible' => 'Disponible',
                                        'Adoptado' => 'Adoptado',
                                        'En adopción' => 'En adopción',
                                    ])
                                    ->required(),
                                Forms\Components\DatePicker::make('admission_date'),
                                Forms\Components\DatePicker::make('adoption_date'),
                                Forms\Components\Textarea::make('health_conditions')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('medications')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('history')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('observations')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Toggle::make('neutered'),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Última actualización')
                            ->content(fn (Pet $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización')
                            ->content(fn (Pet $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Pet $record) => $record === null),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('product-image')
                    ->label('Imagen')
                    ->collection('pets'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre'),
                // Tables\Columns\TextColumn::make('adoption_status')
                //     ->label('Estado de adopción'),
                Tables\Columns\BadgeColumn::make('adoption_status')
                    ->label('Estado')
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
                    ->icon('heroicon-s-finger-print')
                    ->color('secondary'),
                Tables\Columns\TextColumn::make('breed')
                    ->label('Raza'),
                Tables\Columns\TextColumn::make('age')
                    ->label('Fecha de nacimiento')
                    ->date(),
                Tables\Columns\TextColumn::make('sex')
                    ->label('Sexo'),
                Tables\Columns\TextColumn::make('color')
                    ->label('Color'),
                Tables\Columns\TextColumn::make('size')
                    ->label('Tamaño'),
                Tables\Columns\TextColumn::make('weight')
                    ->label('Peso'),
                Tables\Columns\TextColumn::make('admission_date')
                    ->label('Fecha de ingreso')
                    ->date(),
                Tables\Columns\TextColumn::make('adoption_date')
                    ->label('Fecha de adopción')
                    ->date(),
                Tables\Columns\TextColumn::make('health_conditions')
                    ->label('Condiciones de salud')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('medications')
                    ->label('Medicaciones')
                    ->toggleable()
                    ->limit(30)
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('history')
                    ->label('Historia')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\IconColumn::make('neutered')
                    ->label('Esterilizado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('observations')
                    ->label('Observaciones')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('shelterHouse.name')
                    ->label('Casa de acogida'),
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
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
        ];
    }    
}
