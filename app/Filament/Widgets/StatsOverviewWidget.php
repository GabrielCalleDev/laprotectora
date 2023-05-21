<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('Recaudaciones', '1.365,29€')
                ->description('1k incremento')
                ->descriptionIcon('heroicon-s-arrow-trending-up')
                ->color('success'),
            Card::make('Nuevos usuarios', '40')
                ->description('3% hacia abajo')
                ->descriptionIcon('heroicon-s-arrow-trending-down')
                ->chart([36,44,28,29,30,48,45,40]) // aquí vendrían los datos de la base de datos
                ->color('danger'),
            Card::make('Nuevas adopciones', '3')
                ->description('7% incremento')
                ->descriptionIcon('heroicon-s-arrow-trending-up')
                ->chart([2, 1, 3, 5, 2, 3, 1, 3]) // aquí vendrían los datos de la base de datos
                ->color('success'),
        ];
    }
}
