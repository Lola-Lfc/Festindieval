<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seriesindee extends Model
{
    protected $guarded = [];

    public function dons(): HasMany
    {
        return $this->hasMany(Don::class, 'serie_id');
    }
}