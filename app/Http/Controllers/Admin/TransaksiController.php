<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Membership;
use App\Models\PaketGym;


class TransaksiController extends Controller
{
    public function receipt($id)
    {
        $transaksi = Transaksi::with(['paket', 'pt', 'pt.user'])
        ->findOrFail($id);

        if ($transaksi->status !== 'approved') {
            return redirect()->back();
        }

        return view('admin.transaksi.receipt', compact('transaksi'));;
    }

    public function index()
    {
        $transaksi = Transaksi::with(['paket', 'pt.user', 'member'])
        ->latest()
        ->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function approve($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->expired_at < now()) {
            return back()->with('error', 'Transaksi sudah expired');
        }

        $transaksi->update([
            'status' => 'approved',
            'validated_by' => auth()->id(),
            'validated_at' => now()
        ]);

        Membership::create([
            'member_id' => $transaksi->member_id,
            'paket_id' => $transaksi->paket_id,
            'personal_trainer_id' => $transaksi->personal_trainer_id,
            'tanggal_mulai' => now(),
            'tanggal_akhir' => now()->addMonth(),
            'status' => 'active'
        ]);

        return back()->with('success', 'Transaksi disetujui');
    }

    public function reject($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'status' => 'rejected',
            'validated_by' => auth()->id(),
            'validated_at' => now()
        ]);

        return back()->with('success', 'Transaksi ditolak');
    }

    private function createMembership($transaksi)
    {
        $paket = PaketGym::findOrFail($transaksi->paket_id);

        Membership::create([
            'member_id' => $transaksi->member_id,
            'paket_id' => $transaksi->paket_id,
            'personal_trainer_id' => $transaksi->personal_trainer_id,
            'tanggal_mulai' => now(),
            'tanggal_akhir' => now()->addDays($paket->durasi_hari),
            'status' => 'active'
        ]);
    }
}
