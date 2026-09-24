<?php

namespace App\Http\Controllers;

use App\Models\Exposant;
use App\Models\Tag;

class ExposantsController extends Controller
{
    public function index()
    {
        $exposants = Exposant::all();
        $tags = Tag::all();

        return view('exposants', compact('exposants', 'tags'));
    }
}
