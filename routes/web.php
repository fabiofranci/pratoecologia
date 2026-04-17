<?php

use Illuminate\Support\Facades\Route;
use App\Models\QrPage;
use App\Models\QrVisit;

/*
|--------------------------------------------------------------------------
| Homepage (pagina default)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    // pagina default
    $page = QrPage::where('slug', 'default')->firstOrFail();

    // tracking visita
    QrVisit::create([
        'qr_page_id' => $page->id,
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
        'device' => str_contains(request()->userAgent(), 'Mobile') ? 'mobile' : 'desktop',
    ]);

    // offerte attive
    $offers = $page->offers()
        ->attive()
        ->orderByDesc('valido_dal')
        ->orderBy('ordine')
        ->get();

    return view('landing', compact('page', 'offers'));
});

/*
|--------------------------------------------------------------------------
| Pagina dinamica per slug (QR multipli)
|--------------------------------------------------------------------------
*/

Route::get('/{slug}', function ($slug) {

    $page = QrPage::where('slug', $slug)->firstOrFail();

    // tracking visita
    QrVisit::create([
        'qr_page_id' => $page->id,
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
        'device' => str_contains(request()->userAgent(), 'Mobile') ? 'mobile' : 'desktop',
    ]);

    // offerte attive (stessa logica della home)
    $offers = $page->offers()
        ->attive()
        ->orderByDesc('valido_dal')
        ->orderBy('ordine')
        ->get();

    return view('landing', compact('page', 'offers'));
});