<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    protected $fillable = [
        'qr_page_id',
        'titolo',
        'descrizione',
        'prezzo',
        'valido_dal',
        'valido_al',
        'attiva',
        'ordine',
    ];

    protected $casts = [
        'valido_dal' => 'datetime',
        'valido_al' => 'datetime',
        'attiva' => 'boolean',
    ];

    // 👉 relazione
    public function page()
    {
        return $this->belongsTo(QrPage::class, 'qr_page_id');
    }

    public function qrPage(): BelongsTo
    {
        return $this->belongsTo(\App\Models\QrPage::class);
    }

    // 🔥 SCOPE: offerte attive per data
    public function scopeAttive(Builder $query): Builder
    {
        $now = now();

        return $query->where('attiva', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('valido_dal')
                  ->orWhere('valido_dal', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('valido_al')
                  ->orWhere('valido_al', '>=', $now);
            });
    }
}