<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AdoptionHistory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\AdoptionHistoryResource\Pages;

class AdoptionHistoryResource extends Resource
{
    protected static ?string $model = AdoptionHistory::class;

    protected static ?string $navigationGroup = 'Otros';

    protected static ?string $label = 'Actualizaciones de adopciones';

    protected static ?string $slug = 'historial-adopciones';
    
    protected static ?string $navigationLabel = 'Actualizaciones de adopciones';

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\Select::make('adoption_id')
                                    ->relationship('adoption', 'id')
                                    ->label('Id de la adopción en curso')
                                    ->hint('Id adopcion')
                                    ->required(),
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
                            ])
                            ->columns(2)
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
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user-group'),
                Tables\Columns\BadgeColumn::make('status')
                    ->searchable()
                    ->sortable()
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
                    ->searchable()
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) return null;
                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->sortable()
                    ->since(),
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
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'success' : 'warning';
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
