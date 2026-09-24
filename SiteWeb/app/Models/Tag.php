<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invite;
use App\Models\Exposant;

class tag extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'nom',
    ];

    public function invites()
    {
        return $this->hasMany(Invite::class, 'tag_id');
    }

    public function exposants()
    {
        return $this->hasMany(Exposant::class, 'tag_id');
    }
}
