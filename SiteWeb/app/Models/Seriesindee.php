<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Don;

class Seriesindee extends Model
{
    protected $guarded = [];

    protected $table = 'seriesindees';

    protected $fillable = [
        'nom',
        'description',
        'image',
        'lien',
    ];

    public function dons()
    {
        return $this->hasMany(Don::class, 'serie_id');
    }
}