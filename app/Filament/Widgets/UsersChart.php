<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class UsersChart extends LineChartWidget
{
    protected static ?string $heading = 'Estadisticas de usuarios';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Usuarios',
                    'data' => [1,12,34,45,36,44,28,29,30,48,45,40] // aquí vendrían los datos de la base de datos
                ],
            ],
            'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        ];
    }
}
