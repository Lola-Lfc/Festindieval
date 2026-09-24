<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded = [];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}