<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ShelterHouse;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\ShelterHouseResource\Pages;
use App\Filament\Resources\ShelterHousesResource\RelationManagers\PetsRelationManager;

class ShelterHouseResource extends Resource
{
    protected static ?string $model = ShelterHouse::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Casas de acogida';

    protected static ?string $slug = 'casas-de-acogida';
    
    protected static ?string $navigationLabel = 'Casas de acogida';
    
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre casa de acogida')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('responsible')
                                    ->label('Persona responsable')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Teléfono')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->label('Correo electrónico')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('capacity')
                                    ->label('Capacidad')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('street_address')
                                    ->label('Dirección')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('street_number')
                                    ->label('Número')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_details')
                                    ->label('Detalles')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('city')
                                    ->label('Ciudad')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('postal_code')
                                    ->label('Código postal')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('coordinates')
                                    ->label('Coordenadas')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('observations')
                                    ->label('Observaciones')
                                    ->maxLength(255),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (ShelterHouse $record): ?string => $record->updated_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (ShelterHouse $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?ShelterHouse $record) => $record === null),
            ])
            ->columns([
                'sm' => 1,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->icon('heroicon-s-home')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('responsible')
                    ->icon('heroicon-s-user')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->label('Responsable'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable()
                    ->label('Teléfono'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->label('Email'),
                Tables\Columns\TextColumn::make('capacity')
                    ->searchable()
                    ->sortable()
                    ->label('Capacidad'),
                Tables\Columns\TextColumn::make('street_address')
                    ->searchable()
                    ->sortable()
                    ->label('Dirección'),
                Tables\Columns\TextColumn::make('street_number')
                    ->searchable()
                    ->sortable()
                    ->label('Número'),
                Tables\Columns\TextColumn::make('address_details')
                    ->searchable()
                    ->sortable()
                    ->label('Detalles'),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable()
                    ->label('Ciudad'),
                Tables\Columns\TextColumn::make('postal_code')
                    ->searchable()
                    ->sortable()
                    ->label('Código postal'),
                Tables\Columns\TextColumn::make('coordinates')
                    ->searchable()
                    ->sortable()
                    ->label('Coordenadas'),
                Tables\Columns\TextColumn::make('observations')
                    ->searchable()
                    ->sortable()
                    ->label('Observaciones')
                    ->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->label('Creado')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->label('Actualizado')
                    ->since()
            ])->defaultSort('created_at', 'desc')
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
            PetsRelationManager::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'phone', 'email'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShelterHouses::route('/'),
            'create' => Pages\CreateShelterHouse::route('/create'),
            'edit' => Pages\EditShelterHouse::route('/{record}/edit'),
        ];
    }    
}
