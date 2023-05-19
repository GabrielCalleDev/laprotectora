<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeopleResource\Pages;
use App\Filament\Resources\PeopleResource\RelationManagers;
use App\Models\People;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeopleResource extends Resource
{
    protected static ?string $model = People::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(50),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(50),
                Forms\Components\TextInput::make('dni')
                    ->maxLength(9),
                Forms\Components\TextInput::make('phone')
                    ->tel(),
                Forms\Components\DatePicker::make('birthdate'),
                Forms\Components\TextInput::make('street_address')
                    ->maxLength(100),
                Forms\Components\TextInput::make('address_number'),
                Forms\Components\TextInput::make('address_details')
                    ->maxLength(100),
                Forms\Components\TextInput::make('city')
                    ->maxLength(50),
                Forms\Components\TextInput::make('zip_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->maxLength(20),
                Forms\Components\TextInput::make('observations')
                    ->maxLength(100),
                Forms\Components\TextInput::make('occupation')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date(),
                Tables\Columns\TextColumn::make('street_address'),
                Tables\Columns\TextColumn::make('address_number'),
                Tables\Columns\TextColumn::make('address_details'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('zip_code'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('observations')
                    ->limit(40),
                Tables\Columns\TextColumn::make('occupation'),
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePeople::route('/create'),
            'edit' => Pages\EditPeople::route('/{record}/edit'),
        ];
    }    
}
