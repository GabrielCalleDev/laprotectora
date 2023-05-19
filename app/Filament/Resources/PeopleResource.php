<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\People;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PeopleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeopleResource\RelationManagers;

class PeopleResource extends Resource
{
    protected static ?string $model = People::class;
    
    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Personas';

    protected static ?string $slug = 'personas';
    
    protected static ?string $navigationLabel = 'Personas';
    
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('last_name')
                                    ->label('Apellidos')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('dni')
                                    ->label('Dni')
                                    ->maxLength(9),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Teléfono'),
                                Forms\Components\DatePicker::make('birthdate')
                                    ->label('Fecha de nacimiento'),
                                Forms\Components\TextInput::make('street_address')
                                    ->label('Dirección')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('address_number')
                                    ->label('Número'),
                                Forms\Components\TextInput::make('address_details')
                                    ->label('Detalles')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('city')
                                    ->label('Ciudad')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('zip_code')
                                    ->label('Código postal')
                                    ->maxLength(255),
                                Forms\Components\Select::make('type')
                                    ->label('Tipo')
                                    ->options([
                                        'Adoptante' => 'Adoptante',
                                        'Voluntario' => 'Voluntario',
                                        'Socio' => 'Socio',
                                        'Colaborador' => 'Colaborador',
                                        'Trabajador' => 'Trabajador',
                                        'Otro' => 'Otro',
                                    ]),
                                Forms\Components\TextInput::make('occupation')
                                    ->label('Profesión')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('observations')
                                    ->label('Observaciones')
                                    ->rows(3)
                                    ->maxLength(100),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (People $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (People $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?People $record) => $record === null),
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
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('type')
                    ->icon('heroicon-s-user')
                    ->getStateUsing(function (People $record): string {
                        switch ($record->type) {
                            case 'Adoptante'   : return 'Adoptante';
                            case 'Voluntario'  : return 'Voluntario';
                            case 'Socio'       : return 'Socio';
                            case 'Colaborador' : return 'Colaborador';
                            case 'Trabajador'  : return 'Trabajador';
                            default            : return 'primary';
                        }
                    })
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'Adoptante'   : return 'primary';
                            case 'Voluntario'  : return 'success';
                            case 'Socio'       : return 'danger';
                            case 'Colaborador' : return 'warning';
                            case 'Trabajador'  : return 'danger';
                            default           : return 'primary';
                        }
                    }),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date(),
                Tables\Columns\TextColumn::make('street_address'),
                Tables\Columns\TextColumn::make('address_number'),
                Tables\Columns\TextColumn::make('address_details'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('zip_code'),
                Tables\Columns\TextColumn::make('observations')
                    ->limit(40),
                Tables\Columns\TextColumn::make('occupation')
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePeople::route('/create'),
            'edit' => Pages\EditPeople::route('/{record}/edit'),
        ];
    }    
}
