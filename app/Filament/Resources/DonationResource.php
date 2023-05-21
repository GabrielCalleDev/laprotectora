<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Donation;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\DonationResource\Pages;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Donaciones';

    protected static ?string $slug = 'donaciones';
    
    protected static ?string $navigationLabel = 'Registro de donaciones';
    
    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->label('Usuario')
                                    ->placeholder('Selecciona un usuario')
                                    ->options(
                                        \App\Models\User::all()->pluck('name', 'id')->toArray()
                                    )
                                    ->required(),
                                Forms\Components\TextInput::make('value')
                                    ->label('Valor')
                                    ->suffix('€')
                                    ->required(),
                                Forms\Components\Select::make('type')
                                    ->label('Tipo de donación')
                                    ->placeholder('Selecciona un tipo de donación')
                                    ->options([
                                        'Comida' => 'Comida',
                                        'Material' => 'Material',
                                        'Efectivo' => 'Efectivo',
                                        'Tarjeta de crédito' => 'Tarjeta de crédito',
                                        'Transferencia bancaria' => 'Transferencia bancaria',
                                    ])
                                    ->required(),
                                Forms\Components\RichEditor::make('description')
                                    ->label('Descripción')
                                    ->columnSpan('full')
                                    ->required(),
                                    
                            ])
                            ->columns(2)
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado hace')
                            ->content(fn (Donation $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización hace')
                            ->content(fn (Donation $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Donation $record) => $record === null),
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
                    ->sortable()
                    ->searchable()
                    ->weight('bold')
                    ->label('Usuario'),
                Tables\Columns\TextColumn::make('value')
                    ->sortable()
                    ->searchable()
                    ->label('Valor')
                    ->money('eur'),
                // Tables\Columns\TextColumn::make('type'),
                Tables\Columns\BadgeColumn::make('type')
                    ->sortable()
                    ->label('Tipo de donación')
                    ->getStateUsing(function (Donation $record): string {
                        switch ($record->type) {
                            case 'Comida'                 : return 'Comida';
                            case 'Material'               : return 'Material';
                            case 'Efectivo'               : return 'Efectivo';
                            case 'Tarjeta de crédito'     : return 'Tarjeta de crédito';
                            case 'Transferencia bancaria' : return 'Transferencia bancaria';
                            default                       : return 'Desconocido';
                        }
                    })
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'Comida'                 : return 'success';
                            case 'Material'               : return 'warning';
                            case 'Efectivo'               : return 'success';
                            case 'Tarjeta de crédito'     : return 'warning';
                            case 'Transferencia bancaria' : return 'primary';
                            default                       : return 'danger';
                        }
                    }),
                Tables\Columns\TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Descripción')
                    ->limit(45),
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

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'success' : 'warning';
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }    
}
