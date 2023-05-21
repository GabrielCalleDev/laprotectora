<?php

namespace App\Filament\Resources\AdoptionResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AdoptionHistory;
use Filament\Resources\RelationManagers\RelationManager;

class AdoptionHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'adoptionHistory';

    protected static ?string $title = 'Historial de la adopción';

    protected static ?string $label = 'Historial de la adopción';

    protected static ?string $recordTitleAttribute = 'status';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
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
                Forms\Components\MarkdownEditor::make('update')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('adoption.user.name')
                    ->icon('heroicon-o-finger-print'),
                Tables\Columns\BadgeColumn::make('status')
                    ->getStateUsing(function (AdoptionHistory $record): string {
                        switch ($record->status) {
                            case 'nuevo'        : return 'Nuevo';
                            case 'cuestionario' : return 'Cuestionario';
                            case 'visita'       : return 'Visita';
                            case 'entrevista'   : return 'Entrevista';
                            case 'firma'        : return 'Firma';
                            case 'pago'         : return 'Pago';
                            case 'seguimiento'  : return 'Seguimiento';
                            case 'finalizado'   : return 'Finalizado';
                            case 'cancelado'    : return 'Cancelado';
                        }
                    })
                    ->color(static function ($state): string {
                        if ($state === 'Nuevo' || $state === 'Finalizado') {
                            return 'success';
                        }else if ($state === 'Cancelado') {
                            return 'danger';
                        }else if ($state === 'Firma') {
                            return 'secondary';
                        }else if ($state === 'Cuestionario' || $state === 'Visita' || $state === 'Entrevista' || $state === 'Pago' || $state === 'Seguimiento') {
                            return 'primary';
                        }
                        return 'secondary';
                    })
                    ->icons([
                        'heroicon-o-shield-check' => 'Finalizado',
                    ]),
                Tables\Columns\TextColumn::make('update')
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) return null;
                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    }),
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
