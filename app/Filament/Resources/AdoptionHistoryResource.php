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
                Forms\Components\TextInput::make('adoption_id')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->maxLength(150),
                Forms\Components\TextInput::make('update')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('adoption_id'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('update')
                    ->limit(60),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
