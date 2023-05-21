<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\People;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PeopleRelationManager extends RelationManager
{
    protected static string $relationship = 'people';

    protected static ?string $title = 'Persona relacionada con este usuario';

    protected static ?string $label = 'Persona relacionada con este usuario';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
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
            ->columns(2);
    }

    public function table(Table $table): Table
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
                Tables\Actions\DetachAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
