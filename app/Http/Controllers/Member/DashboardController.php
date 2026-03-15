<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        $memberships = Membership::All();


        return view('member.dashboard', compact(
            'memberships'
        ));
    }
}
