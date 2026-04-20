<?php

use Illuminate\Support\Facades\Route;
use App\Models\QrPage;
use App\Models\QrVisit;
use App\Models\QrEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Homepage (pagina default)
|--------------------------------------------------------------------------
*/

Route::post('/track-event', function (Request $request) {
    QrEvent::create([
        'qr_page_id' => request('qr_page_id'),
        'event' => request('event'),
        'visitor_id' => request('visitor_id'),
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
    ]);

    return response()->json(['ok' => true]);
});

Route::get('/', function () {

    $visitorId = request()->cookie('visitor_id');

    if (! $visitorId) {
        $visitorId = Str::uuid()->toString();
        cookie()->queue('visitor_id', $visitorId, 60 * 24 * 365); // 1 anno
    }

    // pagina default
    $page = QrPage::where('slug', 'default')->firstOrFail();

    // tracking visita
    QrVisit::create([
        'qr_page_id' => $page->id,
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
        'visitor_id' => $visitorId,
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

    $visitorId = request()->cookie('visitor_id');

    if (! $visitorId) {
        $visitorId = Str::uuid()->toString();
        cookie()->queue('visitor_id', $visitorId, 60 * 24 * 365); // 1 anno
    }

    $page = QrPage::where('slug', $slug)->firstOrFail();

    // tracking visita
    QrVisit::create([
        'qr_page_id' => $page->id,
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
        'visitor_id' => $visitorId,
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