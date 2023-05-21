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

    protected static ?string $title = 'Historial de la mascota';

    protected static ?string $label = 'Historial';

    protected static ?string $recordTitleAttribute = 'type';

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
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
                    ->maxLength(255)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pet.name')
                    ->label('Mascota'),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable()
                    ->label('Categoría'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'veterinario'     => 'Veterinario',
                        'vacuna'          => 'Vacuna',
                        'desparasitacion' => 'Desparasitación',
                        'enfermedad'      => 'Enfermedad',
                        'cirugia'         => 'Cirugía',
                        'otros'           => 'Otros',
                    ]),
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
