<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactsDirectoryResource\Pages;
use App\Filament\Resources\ContactsDirectoryResource\RelationManagers;
use App\Models\ContactsDirectory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactsDirectoryResource extends Resource
{
    protected static ?string $model = ContactsDirectory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(150),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(150),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(150),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company')
                    ->maxLength(150),
                Forms\Components\TextInput::make('position')
                    ->maxLength(150),
                Forms\Components\TextInput::make('notes')
                    ->maxLength(150),
                Forms\Components\TextInput::make('type')
                    ->maxLength(150),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\TextColumn::make('type'),
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
            'index' => Pages\ListContactsDirectories::route('/'),
            'create' => Pages\CreateContactsDirectory::route('/create'),
            'edit' => Pages\EditContactsDirectory::route('/{record}/edit'),
        ];
    }    
}
