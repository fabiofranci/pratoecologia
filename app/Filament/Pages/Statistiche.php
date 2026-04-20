<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;


class Statistiche extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected string $view = 'filament.pages.statistiche';

    protected static ?string $navigationLabel = 'Statistiche';

    protected static ?string $title = 'Statistiche';

    protected static ?int $navigationSort = 20;
}