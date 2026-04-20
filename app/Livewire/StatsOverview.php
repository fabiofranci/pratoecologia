<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $visiteTotali = QrVisit::count();

        $visitatoriUnici = QrVisit::query()
            ->select('ip')
            ->distinct()
            ->count();

        return [
            Stat::make('Visite totali', $visiteTotali),
            Stat::make('Visitatori unici', $visitatoriUnici),
        ];
    }
}