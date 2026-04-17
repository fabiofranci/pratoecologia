<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrPage extends Model
{
    protected $fillable = [
        'nome',
        'slug',
    ];

    // 🔗 relazione offerte
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    // 🔗 relazione visite
    public function visits()
    {
        return $this->hasMany(QrVisit::class);
    }
}