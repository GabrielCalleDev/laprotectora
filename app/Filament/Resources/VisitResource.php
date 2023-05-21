<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Visit;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\VisitResource\Pages;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Visitas';

    protected static ?string $slug = 'visitas';
    
    protected static ?string $navigationLabel = 'Gestionar visitas';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Group::make()
                ->schema([
                    Card::make()
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('Usuario visitante')
                                ->hint('Usuario')
                                ->relationship('user', 'name'),
                            Forms\Components\Select::make('pet_id')
                                ->label('Mascota visitada')
                                ->relationship('pet', 'name')
                                ->hint('Mascota')
                                ->required(),
                            Forms\Components\Select::make('user_id_responsible')
                                ->label('Usuario responsable')
                                ->relationship('user', 'name')
                                ->hint('protectora')
                                ->required(),
                            Forms\Components\RichEditor::make('description')
                                ->columnSpan('full')
                                ->maxLength(65535),
                        ])
                        ->columns(2)
                ])
                ->columnSpan(['lg' => 2]),
            
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Última actualización')
                        ->content(fn (Visit $record): ?string => $record->created_at?->diffForHumans()),
                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Última actualización')
                        ->content(fn (Visit $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?Visit $record) => $record === null),
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
            'index' => Pages\ListVisits::route('/'),
            'create' => Pages\CreateVisit::route('/create'),
            'edit' => Pages\EditVisit::route('/{record}/edit'),
        ];
    }    
}
