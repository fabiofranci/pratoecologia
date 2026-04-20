<?php

namespace App\Filament\Resources\Offers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;

class OfferForm
{
    public static function make(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

            DatePicker::make('valido_dal')
                ->label('Valido dal')
                ->native(false)
                ->displayFormat('d/m/Y'),

            DatePicker::make('valido_al')
                ->label('Valido al')
                ->native(false)
                ->displayFormat('d/m/Y')
                ->after('valido_dal')
                ->rule('after_or_equal:valido_dal'),
                
                TextInput::make('titolo')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('descrizione')
                    ->label('Descrizione')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                        'h2',
                        'h3',
                        'redo',
                        'undo',
                    ])
                    ->columnSpanFull(),

                Hidden::make('qr_page_id')
                    ->default(fn () => \App\Models\QrPage::first()?->id),

                Toggle::make('attiva')
                    ->label('Attiva')
                    ->default(true),

            ]);
    }
}