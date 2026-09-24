<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'tag_id',
        'nom',
        'description',
        'pfp',
        'activite',
        'youtube',
        'instagram',
        'tiktok',
        'site_web',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}