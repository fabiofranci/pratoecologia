<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrEvent extends Model
{
    protected $fillable = [
        'qr_page_id',
        'event',
        'ip',
        'visitor_id',
        'user_agent',
    ];

    public function qrPage()
    {
        return $this->belongsTo(QrPage::class);
    }
}