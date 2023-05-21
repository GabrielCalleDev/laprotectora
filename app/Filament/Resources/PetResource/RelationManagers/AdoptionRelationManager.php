<?php

namespace App\Filament\Resources\PetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AdoptionRelationManager extends RelationManager
{
    protected static string $relationship = 'adoptions';

    protected static ?string $title = 'Adopciones';

    protected static ?string $label = 'Adopciones';

    protected static ?string $recordTitleAttribute = 'type';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Adoptante')
                    ->hint('Persona que adopta')
                    ->required(),
                Forms\Components\Select::make('questionnaire_id')
                    ->relationship('questionnaire', 'id')
                    ->label('Cuestionario')
                    ->hint('Id cuestionario'),
                    // ->required(),
                Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'nuevo' => 'Nuevo',
                        'cuestionario' => 'Cuestionario',
                        'visita' => 'Visita',
                        'entrevista' => 'Entrevista',
                        'firma' => 'Firma',
                        'pago' => 'Pago',
                        'seguimiento' => 'Seguimiento',
                        'finalizado' => 'Finalizado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->required(),
                Forms\Components\MarkdownEditor::make('observation')
                    ->required()
                    ->label('Observaciones')
                    ->maxLength(255)
                    ->columnSpan('full'),
            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('pet.name')
                ->label('Mascota'),
            Tables\Columns\TextColumn::make('user.name')
                ->label('Adoptante'),
            Tables\Columns\BadgeColumn::make('status'),
            Tables\Columns\TextColumn::make('observation')
                ->limit(20)
                ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                    $state = $column->getState();
                    if (strlen($state) <= 40) return null;
                    return $state;
                }),
            Tables\Columns\IconColumn::make('questionnaire_id')
                ->label('Cuestionario')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->since(),
            Tables\Columns\TextColumn::make('updated_at')
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
