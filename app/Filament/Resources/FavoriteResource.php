<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Favorite;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FavoriteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FavoriteResource\RelationManagers;

class FavoriteResource extends Resource
{
    protected static ?string $model = Favorite::class;

    protected static ?string $navigationGroup = 'Otros';

    protected static ?string $label = 'Favoritos';

    protected static ?string $slug = 'favoritos';
    
    protected static ?string $navigationLabel = 'Favoritos';
    
    protected static ?string $navigationIcon = 'heroicon-o-star';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Group::make()
                ->schema([
                    Card::make()
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                ->relationship('user', 'name')
                                ->label('Usuario')
                                ->hint('favorito')
                                ->required(),
                            Forms\Components\Select::make('pet_id')
                                ->relationship('pet', 'name')
                                ->label('Mascota')
                                ->hint('favorito')
                                ->required(),
                        ])
                        ->columns(2)
                ])
                ->columnSpan(['lg' => 2]),
            
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Creado hace')
                        ->content(fn (Favorite $record): ?string => $record->created_at?->diffForHumans()),
                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Última actualización hace')
                        ->content(fn (Favorite $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?Favorite $record) => $record === null),
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
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user')
                    ->label('Usuario'),
                Tables\Columns\TextColumn::make('pet.name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-finger-print')
                    ->label('Mascota'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creación')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualización')
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
            'index' => Pages\ListFavorites::route('/'),
            'create' => Pages\CreateFavorite::route('/create'),
            'edit' => Pages\EditFavorite::route('/{record}/edit'),
        ];
    }    
}
