<?php

namespace App\Livewire;

use App\Models\QrVisit;
use App\Models\QrEvent;
use Filament\Widgets\ChartWidget;

class MonthlyClicksChart extends ChartWidget
{
    protected ?string $heading = 'Click mensili';

    protected function getData(): array
    {
        $year = now()->year;

        // VISITE
        $visite = QrVisit::selectRaw('MONTH(created_at) as mese, COUNT(*) as totale')
            ->whereYear('created_at', $year)
            ->groupBy('mese')
            ->pluck('totale', 'mese');

        // EVENTI
        $events = QrEvent::selectRaw('MONTH(created_at) as mese, event, COUNT(*) as totale')
            ->whereYear('created_at', $year)
            ->groupBy('mese', 'event')
            ->get()
            ->groupBy('event');

        $mesi = [
            1=>'Gen',2=>'Feb',3=>'Mar',4=>'Apr',5=>'Mag',6=>'Giu',
            7=>'Lug',8=>'Ago',9=>'Set',10=>'Ott',11=>'Nov',12=>'Dic'
        ];

        $labels = [];
        $visiteData = [];
        $whatsappData = [];
        $callData = [];
        $webData = [];
        $facebookData = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $mesi[$i];

            $visiteData[] = $visite[$i] ?? 0;

            $whatsappData[] = optional($events->get('click_whatsapp'))->firstWhere('mese', $i)->totale ?? 0;
            $callData[] = optional($events->get('click_call'))->firstWhere('mese', $i)->totale ?? 0;
            $webData[] = optional($events->get('click_website'))->firstWhere('mese', $i)->totale ?? 0;
            $facebookData[] = optional($events->get('click_facebook'))->firstWhere('mese', $i)->totale ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'WhatsApp',
                    'data' => $whatsappData,
                    'borderColor' => '#22C55E',
                ],
                [
                    'label' => 'Call',
                    'data' => $callData,
                    'borderColor' => '#F59E0B',
                ],
                [
                    'label' => 'Sito',
                    'data' => $webData,
                    'borderColor' => '#ff0000',
                ],
                [
                    'label' => 'Facebook',
                    'data' => $facebookData,
                    'borderColor' => '#3B82F6',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}