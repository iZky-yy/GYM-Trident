<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class JadwalllController extends Controller
{
    public function index()
    {
        $membership = Membership::with('pt.user')
        ->where('member_id', Auth::id())
        ->where('status', 'active')
        ->whereNotNull('personal_trainer_id')
        ->latest()
        ->first();

    $jadwal = collect();
    $pt = null;

    if ($membership && $membership->pt) {
        $pt = $membership->pt;
        $jadwal = Jadwal::where('user_id', $pt->user_id)->get();
    }

    return view('member.jadwal.index', compact('jadwal', 'pt', 'membership'));
    }
}
