<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billets extends Model
{
    protected $table = 'billets';

    protected $fillable = [
        'user_id',
        'type_id',
        'date_achat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(Typebillet::class, 'type_id');
    }
}