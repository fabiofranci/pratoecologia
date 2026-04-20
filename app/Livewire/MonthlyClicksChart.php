<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlyClicksChart extends ChartWidget
{
    protected ?string $heading = 'Click mensili';

    protected function getData(): array
    {
        $year = now()->year;

        $data = QrVisit::selectRaw('MONTH(created_at) as mese, COUNT(*) as totale')
            ->whereYear('created_at', $year)
            ->groupBy('mese')
            ->orderBy('mese')
            ->pluck('totale', 'mese');

        $mesi = [
            1 => 'Gen', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mag', 6 => 'Giu', 7 => 'Lug', 8 => 'Ago',
            9 => 'Set', 10 => 'Ott', 11 => 'Nov', 12 => 'Dic',
        ];

        $labels = [];
        $values = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $mesi[$i];
            $values[] = $data[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => "Click $year",
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}