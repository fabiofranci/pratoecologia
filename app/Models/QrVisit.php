<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrVisit extends Model
{
    protected $fillable = [
        'qr_page_id',
        'ip',
        'user_agent',
        'device',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // 🔗 relazione pagina
    public function page()
    {
        return $this->belongsTo(QrPage::class, 'qr_page_id');
    }
}