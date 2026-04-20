<?php

namespace App\Filament\Resources\Offers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class OffersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('titolo')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('attiva')
                    ->label('Attiva'),

                TextColumn::make('valido_dal')
                    ->label('Dal')
                    ->date('d/m/Y'),

                TextColumn::make('valido_al')
                    ->label('Al')
                    ->date('d/m/Y'),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
