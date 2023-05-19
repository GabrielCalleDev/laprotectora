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

    protected static ?string $label = 'Cuestionarios rellenados';

    protected static ?string $slug = 'cuestionarios';
    
    protected static ?string $navigationLabel = 'Cuestionarios de usuarios';
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
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
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('observation')
                    ->limit(30),
                Tables\Columns\TextColumn::make('answers')
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
                    ->limit(100),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestionnaires::route('/'),
            'create' => Pages\CreateQuestionnaire::route('/create'),
            'edit' => Pages\EditQuestionnaire::route('/{record}/edit'),
        ];
    }    
}
