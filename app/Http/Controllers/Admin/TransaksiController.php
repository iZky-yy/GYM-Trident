<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function approve($id)
{
    $trx = Transaksi::findOrFail($id);

    $trx->update([
        'status'=>'approved',
        'validated_by'=>auth()->id(),
        'validated_at'=>now()
    ]);

    // Buat membership aktif
    MemberPaket::create([
        'member_id'=>$trx->member_id,
        'paket_id'=>$trx->paket_id,
        'tanggal_mulai'=>now(),
        'tanggal_akhir'=>now()->addDays($trx->paket->durasi_hari),
        'sisa_kunjungan'=>$trx->paket->max_kunjungan,
        'status'=>'active'
    ]);

    return back()->with('success','Transaksi disetujui');
}
}
