<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaketGym;
use App\Models\User;
use App\Models\PersonalTrainer;
use App\Models\Membership;
use App\Models\Transaksi;

class RekapController extends Controller
{
   public function index(Request $request)
    {
        $tgl_mulai   = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
    
        // MEMBER
        $member = User::where('role','member')
            ->when($tgl_mulai && $tgl_selesai, function ($q) use ($tgl_mulai, $tgl_selesai) {
                $q->whereBetween('created_at', [$tgl_mulai, $tgl_selesai]);
            })
            ->get();
    
        // TRANSAKSI
        $transaksi = Transaksi::with(['member','paket'])
            ->when($tgl_mulai && $tgl_selesai, function ($q) use ($tgl_mulai, $tgl_selesai) {
                $q->whereBetween('created_at', [$tgl_mulai, $tgl_selesai]);
            })
            ->get();
    
        // MEMBERSHIP
        $memberships = Membership::with(['member','paket','pt.user'])
            ->when($tgl_mulai && $tgl_selesai, function ($q) use ($tgl_mulai, $tgl_selesai) {
                $q->whereBetween('tanggal_mulai', [$tgl_mulai, $tgl_selesai]);
            })
            ->get();
    
        // PT (optional kalau mau difilter)
        $pts = PersonalTrainer::with('user')->get();
    
        // PAKET (biasanya tidak perlu filter)
        $pakets = PaketGym::all();
    
        return view('admin.rekap.index', compact(
            'member',
            'pts',
            'pakets',
            'memberships',
            'transaksi'
        ));
    }
}
