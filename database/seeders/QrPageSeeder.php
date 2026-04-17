<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QrPage;

class QrPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QrPage::firstOrCreate(
            ['slug' => 'default'],
            [
                'nome' => 'Pagina Offerte',
            ]
        );
    }
}