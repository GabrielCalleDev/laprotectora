<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Questionnaire;
use Filament\Resources\Resource;
use App\Filament\Resources\QuestionnaireResource\Pages;

class QuestionnaireResource extends Resource
{
    protected static ?string $model = Questionnaire::class;

    protected static ?string $navigationGroup = 'Adopciones';

    protected static ?string $label = 'Cuestionarios rellenados';

    protected static ?string $slug = 'cuestionarios';
    
    protected static ?string $navigationLabel = 'Cuestionarios de usuarios';
    
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('id')
                            ->label('Id del cuestionario')
                            ->disabled(),
                        Forms\Components\TextInput::make('observation')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('answers')
                            ->afterStateHydrated(
                                function ( Forms\Components\Textarea $component, array $state) {
                                    $resultado = '';
                                    foreach ($state as $key => $value) {
                                        $resultado .= '[ '. $key . ' ] '. PHP_EOL .'- Question: ' . $value['question'] . ' '. PHP_EOL .'- Answer: ' . $value['answer'] . PHP_EOL;
                                    }
                                    return $component->state($resultado);
                                }
                            )
                            ->disabled(),
                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('observation')
                    ->limit(30),
                Tables\Columns\TextColumn::make('adoption.pet.name')
                    ->label('Mascota')
                    ->icon('heroicon-o-bug-ant')
                    ->color('success'),
                Tables\Columns\TextColumn::make('adoption.user.name')
                    ->label('Adoptante')
                    ->icon('heroicon-o-user')
                    ->color('warning'),
                Tables\Columns\TextColumn::make('answers')
                    ->icon('heroicon-o-question-mark-circle')
                    ->getStateUsing(
                        function ($record) {
                            $resultado = '';
                            foreach ($record->answers as $key => $value) {
                                $resultado .= '[ '. $key . ' ] - Question: ' . $value['question'] . ' | Answer: ' . $value['answer'] . ' | ';
                            }
                            return $resultado;
                        }
                    )
                    ->wrap()
                    ->limit(90),
                Tables\Columns\TextColumn::make('created_at')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
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

    public static function canCreate(): bool
    { 
        return false; 
    }

    // public static function getWidgets(): array
    // {
    //     return [
    //         AdoptionHistoryResource\Widgets\AdoptionHistoriesOverview::class,
    //     ];
    // }
        
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
            'index' => Pages\ListQuestionnaires::route('/'),
            'create' => Pages\CreateQuestionnaire::route('/create'),
            'edit' => Pages\EditQuestionnaire::route('/{record}/edit'),
        ];
    }    
}
