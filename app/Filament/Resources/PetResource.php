<?php

namespace App\Filament\Resources;

use App\Models\Pet;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Filament\Resources\PetResource\Pages;
use App\Filament\Resources\PetResource\RelationManagers\VisitsRelationManager;
use App\Filament\Resources\PetResource\RelationManagers\AdoptionRelationManager;
use App\Filament\Resources\PetResource\RelationManagers\PetHistoriesRelationManager;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static ?string $navigationGroup = 'Protectora';

    protected static ?string $label = 'Mascotas';

    protected static ?string $slug = 'mascotas';
    
    protected static ?string $navigationLabel = 'Mascotas';
    
    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    protected static ?int $navigationSort = 0;
    
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
                                Forms\Components\TextInput::make('species')
                                    ->label('Especie')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('breed')
                                    ->label('Raza')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('age')
                                    ->label('Fecha de nacimiento'),
                                Forms\Components\TextInput::make('sex')
                                    ->label('Sexo')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('color')
                                    ->label('Color')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('size')
                                    ->label('Tamaño')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('weight')
                                    ->suffix('Kg')
                                    ->label('Peso'),
                                Forms\Components\Select::make('shelter_house_id')
                                    ->relationship('shelterHouse', 'name')
                                    ->label('Asignar casa de acogida')
                                    ->hint('Acogida'),
                                Forms\Components\Select::make('adoption_status')
                                    ->label('Estado de adopción')
                                    ->options([
                                        'Disponible' => 'Disponible',
                                        'Adoptado' => 'Adoptado',
                                        'En adopción' => 'En adopción',
                                    ])
                                    ->required(),
                                Forms\Components\DatePicker::make('admission_date')
                                    ->label('Fecha de entrada'),
                                Forms\Components\DatePicker::make('adoption_date')
                                    ->label('Fecha de adopción'),
                                Forms\Components\Textarea::make('health_conditions')
                                    ->label('Condiciones de salud')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('medications')
                                    ->label('Medicamentos')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('history')
                                    ->label('Historia de la mascota')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Textarea::make('observations')
                                    ->label('Observaciones')
                                    ->rows(3)
                                    ->maxLength(65535),
                                Forms\Components\Toggle::make('neutered')
                                    ->label('Esterilizado'),
                            ])
                            ->columns(2),
                        Forms\Components\Section::make('Subir imagenes')
                            ->schema([
                                Forms\components\View::make('Imagenes')
                                    ->label('Imagenes de la mascota')
                                    ->view('components.pets-gallery'),
                                Forms\Components\FileUpload::make('image')
                                    ->directory('pets')
                                    ->disableLabel(),
                            ])
                            ->collapsible(),
                    ])
                    ->columnSpan(['lg' => 2]),

                
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado:')
                            ->content(fn (Pet $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última actualización')
                            ->content(fn (Pet $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Pet $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('product-image')
                    ->label('Mascota')
                    ->collection('pets'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->label('Nombre'),
                Tables\Columns\BadgeColumn::make('adoption_status')
                    ->label('Estado')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->icon('heroicon-s-finger-print')
                    ->getStateUsing(function (Pet $record): string {
                        switch ($record->adoption_status) {
                            case 'Disponible'  : return 'Disponible';
                            case 'Adoptado'    : return 'Adoptado';
                            case 'En adopción' : return 'En adopción';
                            default            : return 'secondary';
                        }
                    })
                    ->color(static function ($state): string {
                        switch ($state) {
                            case 'Disponible'  : return 'primary';
                            case 'Adoptado'    : return 'success';
                            case 'En adopción' : return 'warning';
                            default            : return 'primary';
                        }
                    }),
                Tables\Columns\BadgeColumn::make('species')
                    ->label('Especie')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->icon('heroicon-s-finger-print')
                    ->color('secondary'),
                Tables\Columns\TextColumn::make('breed')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->label('Raza'),
                Tables\Columns\TextColumn::make('age')
                    ->sortable()
                    ->toggleable()
                    ->label('Fecha de nacimiento')
                    ->date(),
                Tables\Columns\TextColumn::make('sex')
                    ->sortable()
                    ->toggleable()
                    ->label('Sexo'),
                Tables\Columns\TextColumn::make('color')
                    ->sortable()
                    ->toggleable()
                    ->label('Color'),
                Tables\Columns\TextColumn::make('size')
                    ->sortable()
                    ->toggleable()
                    ->label('Tamaño'),
                Tables\Columns\TextColumn::make('weight')
                    ->sortable()
                    ->toggleable()
                    ->label('Peso'),
                Tables\Columns\TextColumn::make('admission_date')
                    ->toggleable()
                    ->sortable()
                    ->label('Fecha de ingreso')
                    ->date(),
                Tables\Columns\TextColumn::make('adoption_date')
                    ->label('Fecha de adopción')
                    ->sortable()
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('health_conditions')
                    ->label('Condiciones de salud')
                    ->limit(30)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('medications')
                    ->label('Medicaciones')
                    ->toggleable()
                    ->limit(30)
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('history')
                    ->label('Historia')
                    ->limit(30)
                    ->toggledHiddenByDefault()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('neutered')
                    ->label('Esterilizado')
                    ->boolean()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('observations')
                    ->label('Observaciones')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('shelterHouse.name')
                    ->sortable()
                    ->label('Casa de acogida'),
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
            PetHistoriesRelationManager::class,
            VisitsRelationManager::class,
            AdoptionRelationManager::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
