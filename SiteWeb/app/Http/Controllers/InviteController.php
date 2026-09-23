<?php

namespace App\Http\Controllers;

use App\Models\Invite;

class InviteController extends Controller
{
    public function index()
    {
        $invites = Invite::all();

        return view('invite', compact('invites'));
    }
}