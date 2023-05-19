<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetResource\Pages;
use App\Filament\Resources\PetResource\RelationManagers;
use App\Models\Pet;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('shelter_house_id'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('species')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('breed')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('age'),
                Forms\Components\TextInput::make('sex')
                    ->maxLength(255),
                Forms\Components\TextInput::make('color')
                    ->maxLength(255),
                Forms\Components\TextInput::make('size')
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight'),
                Forms\Components\TextInput::make('adoption_status')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('admission_date'),
                Forms\Components\DatePicker::make('adoption_date'),
                Forms\Components\Textarea::make('health_conditions')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('medications')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('history')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('observations')
                    ->maxLength(65535),
                Forms\Components\Toggle::make('neutered'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('product-image')
                    ->label('Image')
                    ->collection('pets'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('species'),
                Tables\Columns\TextColumn::make('breed'),
                Tables\Columns\TextColumn::make('age')
                    ->date(),
                Tables\Columns\TextColumn::make('sex'),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\TextColumn::make('adoption_status'),
                Tables\Columns\TextColumn::make('admission_date')
                    ->date(),
                Tables\Columns\TextColumn::make('adoption_date')
                    ->date(),
                Tables\Columns\TextColumn::make('health_conditions')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('medications')
                    ->toggleable()
                    ->limit(30)
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('history')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\IconColumn::make('neutered')
                    ->boolean(),
                Tables\Columns\TextColumn::make('observations')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('shelter_house_id')
                    ->label('idCasa')
                    ->sortable(),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
        ];
    }    
}
