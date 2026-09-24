<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exposant extends Model
{
    protected $guarded = [];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}