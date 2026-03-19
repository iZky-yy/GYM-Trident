<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\PaketGym;
use App\Models\PersonalTrainer;
use Illuminate\Support\Facades\Storage;

class TransaksisController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('paket')
            ->where('member_id', auth()->id())
            ->latest()
            ->get();

        return view('member.transaksis.index', compact('transaksi'));
    }

    public function create()
    {
        $pakets = PaketGym::all();
        $pts = PersonalTrainer::with('user')->get();

        return view('member.transaksis.create', compact('pakets','pts'));
    }

    public function store(Request $request)
    {
        $pakets = PaketGym::findOrFail($request->paket_id);

        Transaksi::create([
            'member_id' => auth()->id(),
            'paket_id' => $pakets->id,
            'total_bayar' => $pakets->harga,
            'status' => 'pending',
            'expired_at' => now()->addHours(24)
        ]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi dibuat, silakan upload pembayaran');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('member.transaksis.show', compact('transaksi'));
    }

    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|image|max:2048'
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->expired_at < now()) {
            return back()->with('error', 'Transaksi sudah expired');
        }

        $file = $request->file('bukti');
        $path = $file->store('bukti', 'public');

        $transaksi->update([
            'bukti_pembayaran' => $path,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Bukti berhasil diupload');
    }
}
