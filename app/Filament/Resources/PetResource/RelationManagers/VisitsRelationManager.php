<?php

namespace App\Filament\Resources\PetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class VisitsRelationManager extends RelationManager
{
    protected static string $relationship = 'visits';

    protected static ?string $title = 'Visitas a la mascota';

    protected static ?string $label = 'Visitas';

    protected static ?string $recordTitleAttribute = 'type';

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario que visita esta mascota')
                    ->hint('Usuario')
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('user_id_responsible')
                    ->label('Voluntario que gestiona la visita')
                    ->relationship('user', 'name')
                    ->hint('protectora')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpan('full')
                    ->maxLength(65535),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.username')
                    ->icon('heroicon-o-user')
                    ->searchable()
                    ->sortable()
                    ->label('Usuario visitante'),
                Tables\Columns\TextColumn::make('pet.name')
                    ->icon('heroicon-o-finger-print')
                    ->searchable()
                    ->sortable()
                    ->label('Mascota'),
                Tables\Columns\TextColumn::make('user.name')
                    ->icon('heroicon-o-user')
                    ->searchable()
                    ->sortable()
                    ->label('Responsable'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->limit(35),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
