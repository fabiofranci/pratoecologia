<?php

namespace App\Livewire;

use App\Models\QrVisit;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentVisits extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    protected function getTableQuery(): Builder
    {
        return QrVisit::latest()->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('ip'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i'),
        ];
    }
}
