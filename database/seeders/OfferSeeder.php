<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use Carbon\Carbon;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        Offer::truncate();

        Offer::insert([
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo inverno',
                'descrizione' => 'Per Dicembre 2025, Gennaio e Febbraio 2026 <br><strong style="color:red;">SCONTO 15% su tutti i servizi</strong>',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2025-12-01'),
                'valido_al' => Carbon::parse('2026-02-28 23:59:59'),
                'attiva' => 1,
                'ordine' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo aprile/maggio',
                'descrizione' => 'PER I MESI DI APRILE 2026/MAGGIO 2026 CON L’INTERVENTO DI VUOTATURA DELLE FOSSE BIOLOGICHE <strong style="color:red;">AVRAI DIRITTO AD UN TRATTAMENTO GRATUITO PER LA DISINFESTAZIONE DA BLATTE</strong> (VALIDO SOLO PER ABITAZIONI SINGOLE)',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2026-04-01'),
                'valido_al' => Carbon::parse('2026-05-31 23:59:59'),
                'attiva' => 1,
                'ordine' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo giugno',
                'descrizione' => '<strong style="color:red;">SCONTO 10% su tutti i servizi</strong>',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2026-06-01'),
                'valido_al' => Carbon::parse('2026-06-30 23:59:59'),
                'attiva' => 1,
                'ordine' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo estate',
                'descrizione' => '<strong style="color:red;">SCONTO 15% su vuotatura fosse biologiche</strong>',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2026-07-01'),
                'valido_al' => Carbon::parse('2026-08-31 23:59:59'),
                'attiva' => 1,
                'ordine' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo settembre',
                'descrizione' => 'Con vuotatura fosse biologiche <br><strong style="color:red;">DISINFESTAZIONE ZANZARE GRATIS</strong>',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2026-09-01'),
                'valido_al' => Carbon::parse('2026-09-30 23:59:59'),
                'attiva' => 1,
                'ordine' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'qr_page_id' => 1,
                'titolo' => 'Promo autunno',
                'descrizione' => '<strong style="color:red;">SCONTO 15% su tutti i servizi</strong>',
                'prezzo' => null,
                'valido_dal' => Carbon::parse('2026-10-01'),
                'valido_al' => Carbon::parse('2026-12-31 23:59:59'),
                'attiva' => 1,
                'ordine' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}