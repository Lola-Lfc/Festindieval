<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exposant;
use App\Models\Invite;
use App\Models\Programme;
use App\Models\User;
use App\Models\Seriesindee;
use App\Models\Tag;
use App\Models\Typebillet;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $invitesCount = Invite::count();
        $exposantsCount = Exposant::count();
        $programmesCount = Programme::count();
        $usersCount = User::count();
        $seriesCount = Seriesindee::count();
        $tagsCount = Tag::count();
        $typebilletsCount = Typebillet::count();

        return view('Admin.dashboard', compact(
            'invitesCount',
            'exposantsCount',
            'programmesCount',
            'usersCount',
            'seriesCount',
            'tagsCount',
            'typebilletsCount'
        ));
    }
}