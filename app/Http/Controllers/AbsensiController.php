<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function scan($token)
{
    $user = User::where('qr_token', $token)->firstOrFail();

    $absenHariIni = Absensi::where('user_id', $user->id)
        ->whereDate('waktu_masuk', today())
        ->first();

    if (!$absenHariIni) {
        Absensi::create([
            'user_id' => $user->id,
            'role' => $user->role,
            'waktu_masuk' => now()
        ]);
    }

    return redirect()->route('absensi.index')
        ->with('success', 'Absensi berhasil untuk ' . $user->name);
}
}
