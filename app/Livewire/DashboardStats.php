<?php

namespace App\Livewire;

use App\Models\QrVisit;
use App\Models\Offer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected ?string $heading = 'Ultime visite';
    protected function getStats(): array
    {
        return [
            Stat::make('Visite oggi', QrVisit::whereDate('created_at', today())->count()),
            Stat::make('Visite totali', QrVisit::count()),
            Stat::make('Offerte attive', Offer::where('attiva', true)->count()),
        ];
    }
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('ip')
                ->label('IP')
                ->copyable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Data')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

}