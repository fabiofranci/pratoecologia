<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Widgets\ChartWidget;
use Jenssegers\Agent\Agent;

class OsChart extends ChartWidget
{
    protected ?string $heading = 'Sistemi operativi';

    protected function getData(): array
    {
        $agent = new Agent();

        $osCounts = [
            'Android' => 0,
            'iOS' => 0,
            'Windows' => 0,
            'Mac' => 0,
            'Altro' => 0,
        ];

        QrVisit::select('user_agent')->chunk(200, function ($visits) use (&$osCounts, $agent) {
            foreach ($visits as $visit) {
                $agent->setUserAgent($visit->user_agent ?? '');

                $platform = $agent->platform();

                if (! $platform) {
                    $osCounts['Altro']++;
                } elseif (str_contains($platform, 'Android')) {
                    $osCounts['Android']++;
                } elseif (str_contains($platform, 'iOS')) {
                    $osCounts['iOS']++;
                } elseif (str_contains($platform, 'Windows')) {
                    $osCounts['Windows']++;
                } elseif (str_contains($platform, 'Mac')) {
                    $osCounts['Mac']++;
                } else {
                    $osCounts['Altro']++;
                }
            }
        });

        return [
            'datasets' => [
                [
                    'data' => array_values($osCounts),
                    'backgroundColor' => [
                        '#22C55E', // Android (verde)
                        '#111827', // iOS (nero/grigio scuro)
                        '#3B82F6', // Windows (blu)
                        '#A855F7', // Mac (viola)
                        '#F59E0B', // Altro (arancione)
                    ],
                ],
            ],
            'labels' => array_keys($osCounts),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}