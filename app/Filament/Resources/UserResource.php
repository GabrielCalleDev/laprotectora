<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\PeopleRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Usuarios';

    protected static ?string $slug = 'usuarios';
    
    protected static ?string $navigationLabel = 'Usuarios';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 3;

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
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->label('Correo electrónico')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DateTimePicker::make('email_verified_at')
                                    ->label('Correo electrónico verificado')
                                    ->required(),
                                Forms\Components\TextInput::make('username')
                                    ->label('Nombre de usuario')
                                    ->maxLength(50),
                                Forms\Components\Select::make('people_id')
                                    ->label('Persona asociada')
                                    ->hint('Persona')
                                    ->relationship('people', 'name'),
                                Forms\Components\Select::make('role')
                                    ->options([
                                        'admin' => 'Administrador',
                                        'user' => 'Usuario',
                                    ]),
                                Forms\Components\Toggle::make('status')
                                    ->required(),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Última actualización')
                            ->content(fn (User $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización')
                            ->content(fn (User $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?User $record) => $record === null),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->label('Avatar')
                    ->collection('avatars'),
                Tables\Columns\TextColumn::make('people.name')
                    ->label('Persona'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo electrónico'),
                Tables\Columns\TextColumn::make('username')
                    ->label('Username'),
                Tables\Columns\BadgeColumn::make('role')
                    ->label('Rol')
                    ->icon('heroicon-s-user')
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'admin' : return 'success';
                            case 'user'  : return 'warning';
                            default      : return 'primary';
                        }
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->label('Estado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Verificado')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime(),
                // Tables\Columns\CheckboxColumn::make('status'),
                // Tables\Columns\ToggleColumn::make('status'),
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
            PeopleRelationManager::class,
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
