<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exposant;
use App\Models\Invite;
use App\Models\Programme;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('Admin.dashboard', [
            'usersCount' => User::count(),
            'invitesCount' => Invite::count(),
            'exposantsCount' => Exposant::count(),
            'programmesCount' => Programme::count(),
        ]);
    }
}