<?php

namespace App\Filament\Resources\PetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PetHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'petHistories';

    protected static ?string $recordTitleAttribute = 'type';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pet_id')
                    ->relationship('pet', 'name')
                    ->label('Mascota')
                    ->hint('Mascota a la que se añade el historial')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->label('Tipo de actualización')
                    ->options([
                        'veterinario'     => 'Veterinario',
                        'vacuna'          => 'Vacuna',
                        'desparasitacion' => 'Desparasitación',
                        'enfermedad'      => 'Enfermedad',
                        'cirugia'         => 'Cirugía',
                        'otros'           => 'Otros',
                    ])
                    ->required(),
                Forms\Components\MarkdownEditor::make('description')
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'table',
                        'undo',
                    ])
                    ->columnSpan('full')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pet.name'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
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
