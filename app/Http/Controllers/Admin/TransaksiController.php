<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Membership;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('member','paket')
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

        // BUAT MEMBERSHIP
        Membership::create([
            'member_id' => $transaksi->member_id,
            'paket_id' => $transaksi->paket_id,
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
}
