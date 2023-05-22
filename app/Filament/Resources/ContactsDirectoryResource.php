<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ContactsDirectory;
use Filament\Forms\Components\Card;
use App\Filament\Resources\ContactsDirectoryResource\Pages;

class ContactsDirectoryResource extends Resource
{
    protected static ?string $model = ContactsDirectory::class;

    protected static ?string $navigationGroup = 'Otros';

    protected static ?string $label = 'Directorio de contactos';

    protected static ?string $slug = 'directorio-de-contactos';
    
    protected static ?string $navigationLabel = 'Directorio de contactos';
    
    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre')
                                    ->maxLength(150),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Teléfono')
                                    ->maxLength(150),
                                Forms\Components\TextInput::make('email')
                                    ->label('Correo electrónico')
                                    ->email()
                                    ->maxLength(150),
                                Forms\Components\TextInput::make('address')
                                    ->label('Dirección')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('company')
                                    ->label('Empresa')
                                    ->maxLength(150),
                                Forms\Components\TextInput::make('position')
                                    ->label('Cargo')
                                    ->maxLength(150),
                                Forms\Components\TextInput::make('notes')
                                    ->label('Notas')
                                    ->maxLength(150),
                                Forms\Components\Select::make('type')
                                    ->label('Tipo de contacto')
                                    ->options([
                                        'personal' => 'Personal',
                                        'profesional' => 'Profesional',
                                        'organizacion' => 'Organización',
                                        'otro' => 'Otro',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (ContactsDirectory $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (ContactsDirectory $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?ContactsDirectory $record) => $record === null),
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->icon('heroicon-o-user')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->icon('heroicon-o-phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-o-at-symbol')
                    ->label('Correo electrónico'),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->searchable()
                    ->label('Dirección')
                    ->limit(50),
                Tables\Columns\TextColumn::make('company')
                    ->sortable()
                    ->searchable()
                    ->label('Empresa'),
                Tables\Columns\TextColumn::make('position')
                    ->sortable()
                    ->searchable()
                    ->label('Cargo'),
                Tables\Columns\TextColumn::make('notes')
                    ->sortable()
                    ->searchable()
                    ->label('Notas')
                    ->limit(50),
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable()
                    ->label('Tipo de contacto'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'phone', 'email', 'company'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
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
