<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class AdoptionsChart extends LineChartWidget
{
    protected static ?string $heading = 'Adopciones por mes';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Adopciones',
                    'data' => [2, 3, 0, 1, 2, 1, 3, 5, 2, 3, 1, 3]// aquí vendrían los datos de la base de datos
                ],
            ],
            'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        ];
    }
}
