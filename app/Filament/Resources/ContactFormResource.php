<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ContactForm;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\ContactFormResource\Pages;

class ContactFormResource extends Resource
{
    protected static ?string $model = ContactForm::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Contactos recibidos';

    protected static ?string $slug = 'contactos-del-sistema';
    
    protected static ?string $navigationLabel = 'Contactos del sistema';

    protected static ?int $navigationSort = 6;
    
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

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
                                    ->hint('Usuario del sistema'),
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('email')
                                    ->label('Correo electrónico')
                                    ->email()
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Teléfono')
                                    ->required()
                                    ->maxLength(15),
                                Forms\Components\TextInput::make('subject')
                                    ->label('Asunto')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\Select::make('status')
                                    ->label('Estado')
                                    ->options([
                                        'Nuevo' => 'Nuevo',
                                        'Pendiente' => 'Pendiente',
                                        'En proceso' => 'En proceso',
                                        'Completado' => 'Completado',
                                    ])
                                    ->required(),
                                Forms\Components\MarkdownEditor::make('message')
                                    ->required()
                                    ->label('Mensaje recibido')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (ContactForm $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (ContactForm $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?ContactForm $record) => $record === null),
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
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Estado')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(function (ContactForm $record): string {
                        switch ($record->status) {
                            case 'Nuevo'      : return 'Nuevo';
                            case 'Pendiente'  : return 'Pendiente';
                            case 'En proceso' : return 'En proceso';
                            case 'Completado' : return 'Completado';
                            default           : return 'primary';
                        }
                    })
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'Nuevo'      : return 'danger';
                            case 'Pendiente'  : return 'warning';
                            case 'En proceso' : return 'primary';
                            case 'Completado' : return 'success';
                            default           : return 'primary';
                        }
                    }),
                Tables\Columns\IconColumn::make('user_id')
                    ->label('User')
                    ->getStateUsing(function (ContactForm $record): string {
                        return ( $record->user_id == '' ) ? false : true;
                    })
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Mensaje')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(function (ContactForm $record): string {
                        return ( !isset($record->user->name) ) ? 'Sin usuario' : $record->user->name;
                    })
                    ->label('Usuario'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
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

    
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'phone'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactForms::route('/'),
            'create' => Pages\CreateContactForm::route('/create'),
            'edit' => Pages\EditContactForm::route('/{record}/edit'),
        ];
    }    
}
