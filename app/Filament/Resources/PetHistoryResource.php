<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetHistoryResource\Pages;
use App\Filament\Resources\PetHistoryResource\RelationManagers;
use App\Models\PetHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PetHistoryResource extends Resource
{
    protected static ?string $model = PetHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pet_id'),
                Forms\Components\TextInput::make('type')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pet_id'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(45),
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
            'index' => Pages\ListPetHistories::route('/'),
            'create' => Pages\CreatePetHistory::route('/create'),
            'edit' => Pages\EditPetHistory::route('/{record}/edit'),
        ];
    }    
}
