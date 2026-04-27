<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
       $memberships = Membership::with([
            'paket',
            'pt.user'
        ])
        ->where('member_id', auth()->id())
        ->latest()
        ->get();

        return view('member.dashboard', compact(
            'memberships'
        ));
    }
}
