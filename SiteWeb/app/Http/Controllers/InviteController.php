<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\Tag;

class InviteController extends Controller
{
    public function index()
    {
        $invites = Invite::all();
        $tags = Tag::all();

        return view('invite', compact('invites', 'tags'));
    }
}