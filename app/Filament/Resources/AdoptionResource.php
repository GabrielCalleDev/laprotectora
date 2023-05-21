<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Adoption;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\AdoptionResource\Pages;
use App\Filament\Resources\AdoptionResource\RelationManagers\AdoptionHistoriesRelationManager;

class AdoptionResource extends Resource
{
    protected static ?string $model = Adoption::class;

    protected static ?string $navigationGroup = 'Adopciones';

    protected static ?string $label = 'Adopciones';

    protected static ?string $slug = 'adopciones';
    
    protected static ?string $navigationLabel = 'Adopciones';

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\Select::make('pet_id')
                                    ->relationship('pet', 'name')
                                    ->label('Mascota')
                                    ->hint('En proceso de adopcion')
                                    ->required(),
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
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (Adoption $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (Adoption $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Adoption $record) => $record === null),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('pet.id')
                    ->label('Mascota')
                    ->getStateUsing(function (Adoption $record): string {
                        return $record->pet->getFirstMediaUrl('pets') ?? '';
                    })
                    ->collection('pets'),
                Tables\Columns\TextColumn::make('pet.name')
                    ->icon('heroicon-s-finger-print')
                    ->color('secondary')
                    ->label('Mascota'),
                Tables\Columns\TextColumn::make('user.name')
                    ->icon('heroicon-s-user')
                    ->label('Adoptante'),
                Tables\Columns\BadgeColumn::make('status')
                    ->getStateUsing(function (Adoption $record): string {
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
                Tables\Columns\TextColumn::make('observation')
                    ->limit(50)
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
            AdoptionHistoriesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdoptions::route('/'),
            'create' => Pages\CreateAdoption::route('/create'),
            'edit' => Pages\EditAdoption::route('/{record}/edit'),
        ];
    }    
}
