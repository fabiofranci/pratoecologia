<?php

namespace App\Livewire;

use App\Models\QrEvent;
use App\Models\QrVisit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CtaStats extends BaseWidget
{
    protected function getStats(): array
    {
        $visite = QrVisit::distinct('visitor_id')->count('visitor_id');

        $whatsapp = QrEvent::where('event', 'click_whatsapp')->count();
        $call = QrEvent::where('event', 'click_call')->count();
        $website = QrEvent::where('event', 'click_website')->count();
        $facebook = QrEvent::where('event', 'click_facebook')->count();

        $totale = $whatsapp + $call + $website + $facebook;

        return [
            Stat::make('Click WhatsApp', $whatsapp),
            Stat::make('Click Chiamate', $call),
            Stat::make('Click Sito', $website),
            Stat::make('Click Facebook', $facebook),
            Stat::make('Totale CTA', $totale),

            Stat::make(
                'Conversione',
                $visite > 0 ? round(($totale / $visite) * 100, 1) . '%' : '0%'
            ),
        ];
    }
}