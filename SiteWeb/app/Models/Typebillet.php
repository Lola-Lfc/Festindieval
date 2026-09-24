<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Billets;

class Typebillet extends Model
{
    protected $guarded = [];
    
    protected $fillable = [
        'nom',
        'prix',
        'description',
    ];

    public function billets()
    {
        return $this->hasMany(Billets::class, 'type_id');
    }
}
