<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdoptionHistoryResource\Pages;
use App\Filament\Resources\AdoptionHistoryResource\RelationManagers;
use App\Models\AdoptionHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdoptionHistoryResource extends Resource
{
    protected static ?string $model = AdoptionHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\components\Card::make()
                            ->schema([
                                Forms\Components\Select::make('adoption_status')
                                    // Obtener el nombre de la mascota
                                    ->relationship('adoption', 'id')
                                    ->disabled()
                                    ->label('Id de la adopción en curso')
                                    // ->label('Adopcion de la mascota')
                                    ->hint('Id adopcion')
                                    ->createOptionForm([
                                        Forms\Components\Select::make('pet')
                                            ->relationship('pet', 'name')
                                            ->label('Nombre de la mascota')
                                            ->required(),
                                    ]),  
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
                            ])->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),
                
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (AdoptionHistory $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (AdoptionHistory $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?AdoptionHistory $record) => $record === null),
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
                Tables\Columns\TextColumn::make('adoption.pet.name')
                    ->icon('heroicon-o-user-group'),
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
                    // ->wrap(),
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) return null;
                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    }),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->since(),
                
                Tables\Columns\ViewColumn::make('created_at')
                    ->getStateUsing(function (AdoptionHistory $record): string {
                        return $record->created_at->diffForHumans();
                    })
                    ->view('test'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdoptionHistories::route('/'),
            'create' => Pages\CreateAdoptionHistory::route('/create'),
            'edit' => Pages\EditAdoptionHistory::route('/{record}/edit'),
        ];
    }    
}
