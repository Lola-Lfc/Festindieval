<?php

namespace App\Http\Controllers;

use App\Models\Typebillet;

class BilleterieController extends Controller
{
    public function index()
    {
        $typebillets = Typebillet::all();

        return view('billeterie', compact('typebillets'));
    }
}