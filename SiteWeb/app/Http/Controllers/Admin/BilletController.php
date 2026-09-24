<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billets;

class BilletController extends Controller
{
    public function index()
    {
        $billets = Billets::with(['user', 'type'])
            ->orderByDesc('date_achat')
            ->get();

        return view('Admin.billets.index', compact('billets'));
    }

    public function refund(Billets $billet)
    {
        $billet->delete();

        return redirect()
            ->route('admin.billets.index')
            ->with('success', 'Le billet a été remboursé avec succès.');
    }
}