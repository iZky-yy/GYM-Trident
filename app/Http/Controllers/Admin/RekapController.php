<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaketGym;
use App\Models\User;
use App\Models\PersonalTrainer;
use App\Models\Membership;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $tgl_mulai   = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai && $tgl_selesai) {

        $member = User::where('role','member')
            ->whereBetween('created_at', [$tgl_mulai, $tgl_selesai])
            ->get();

        } else {

            $member = User::where('role','member')->get();
        }
        $pts = PersonalTrainer::with('user')->get();
        $pakets = PaketGym::all();
        $memberships = Membership::All();
        return view('admin.rekap.index', compact(
            'member',
            'pts',
            'pakets',
            'memberships'
        ));
    }
}
