<?php

namespace App\Http\Controllers;

use App\Models\Seriesindee;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Seriesindee::all();

        return view('serie', compact('series'));
    }
}