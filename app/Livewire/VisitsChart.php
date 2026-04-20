<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Widgets\ChartWidget;

class VisitsChart extends ChartWidget
{
    protected ?string $heading = 'Visite ultimi 7 giorni';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $days = collect(range(6, 0))->map(function ($i) {
            $date = now()->subDays($i);

            return [
                'label' => $date->format('d/m'),
                'count' => QrVisit::whereDate('created_at', $date)->count(),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Visite',
                    'data' => $days->pluck('count'),
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                ],
            ],
            'labels' => $days->pluck('label'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}