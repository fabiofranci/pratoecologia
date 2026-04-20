<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Widgets\ChartWidget;
use Jenssegers\Agent\Agent;

class DeviceChart extends ChartWidget
{
    protected ?string $heading = 'Dispositivi';

    protected function getData(): array
    {
        $agent = new Agent();

        $mobile = 0;
        $desktop = 0;

        QrVisit::select('user_agent')->chunk(200, function ($visits) use (&$mobile, &$desktop, $agent) {
            foreach ($visits as $visit) {
                $agent->setUserAgent($visit->user_agent ?? '');

                if ($agent->isMobile() || $agent->isTablet()) {
                    $mobile++;
                } else {
                    $desktop++;
                }
            }
        });

        return [
            'datasets' => [
                [
                    'data' => [$mobile, $desktop],
                    'backgroundColor' => [
                        '#3B82F6', // blu
                        '#10B981', // verde
                    ],
                ],
            ],
            'labels' => ['Mobile', 'Desktop'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}