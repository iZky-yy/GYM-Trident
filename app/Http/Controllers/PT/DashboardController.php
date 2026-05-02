<?php

namespace App\Http\Controllers\PT;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pt = Auth::user()->personalTrainer;
        $memberships = Membership::with(['member', 'paket'])
            ->where('personal_trainer_id', $pt->id)
            ->latest()
            ->get();
        $totalAssignedMembers = $memberships->unique('member_id')->count();
        $activeMembersCount = $memberships->where('status', 'active')->unique('member_id')->count();
        $revenue = $activeMembersCount * $pt->tarif_per_sesi;

        return view('pt.dashboard', compact('memberships', 'totalAssignedMembers', 'revenue'));
    }
}
