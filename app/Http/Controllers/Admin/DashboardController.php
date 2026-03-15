<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaketGym;
use App\Models\Membership;


class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = User::where('role','member')->count();
        $activeTrainers = User::where('role','pt')->count();
        $activeSessions = PaketGym::count();
        $memberships = Membership::All();


        return view('admin.dashboard', compact(
            'totalMembers',
            'activeTrainers',
            'activeSessions',
            'memberships'
        ));
    }
}
