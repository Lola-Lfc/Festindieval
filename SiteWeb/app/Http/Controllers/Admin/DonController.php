<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Don;

class DonController extends Controller
{
    public function index()
    {
        $dons = Don::with(['user', 'serie'])
            ->orderByDesc('date_don')
            ->get();

        return view('Admin.dons.index', compact('dons'));
    }
}