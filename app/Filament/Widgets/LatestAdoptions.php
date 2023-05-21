<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Adoption;
use App\Models\Shop\Order;
use Squire\Models\Currency;
use App\Filament\Resources\PetResource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AdoptionResource;
use App\Filament\Resources\Shop\OrderResource;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAdoptions extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Últimas solicitudes de adopción';

    protected static ?int $sort = 1;

    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 5;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    protected function getTableQuery(): Builder
    {
        return AdoptionResource::getEloquentQuery()->where('status', '=', 'nuevo');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\SpatieMediaLibraryImageColumn::make('pet.id')
                ->label('Mascota')
                ->getStateUsing(function (Adoption $record): string {
                    return $record->pet->getFirstMediaUrl('pets') ?? '';
                })
                ->collection('pets'),
            Tables\Columns\TextColumn::make('pet.name')
                ->icon('heroicon-s-finger-print')
                ->color('secondary')
                ->label('Mascota'),
            Tables\Columns\TextColumn::make('user.name')
                ->icon('heroicon-s-user')
                ->label('Adoptante'),
            Tables\Columns\BadgeColumn::make('status')
                ->getStateUsing(function (Adoption $record): string {
                    switch ($record->status) {
                        case 'nuevo'        : return 'Nuevo';
                        case 'cuestionario' : return 'Cuestionario';
                        case 'visita'       : return 'Visita';
                        case 'entrevista'   : return 'Entrevista';
                        case 'firma'        : return 'Firma';
                        case 'pago'         : return 'Pago';
                        case 'seguimiento'  : return 'Seguimiento';
                        case 'finalizado'   : return 'Finalizado';
                        case 'cancelado'    : return 'Cancelado';
                    }
                })
                ->color(static function ($state): string {
                    if ($state === 'Nuevo' || $state === 'Finalizado') {
                        return 'success';
                    }else if ($state === 'Cancelado') {
                        return 'danger';
                    }else if ($state === 'Firma') {
                        return 'secondary';
                    }else if ($state === 'Cuestionario' || $state === 'Visita' || $state === 'Entrevista' || $state === 'Pago' || $state === 'Seguimiento') {
                        return 'primary';
                    }
                    return 'secondary';
                })
                ->icons([
                    'heroicon-o-shield-check' => 'Finalizado',
                ]),
            Tables\Columns\TextColumn::make('observation')
                ->limit(20)
                ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                    $state = $column->getState();
                    if (strlen($state) <= 40) return null;
                    return $state;
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->since(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('open')
                ->url(fn (Adoption $record): string => AdoptionResource::getUrl('edit', ['record' => $record])),
        ];
    }
}
