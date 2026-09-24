<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    protected $fillable = [
        'user_id',
        'serie_id',
        'montant',
        'date_don',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serie()
    {
        return $this->belongsTo(Seriesindee::class, 'serie_id');
    }
}