<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function scan($token)
    {
        $user = User::where('qr_token',$token)->firstOrFail();
    
        $absenHariIni = Absensi::where('user_id',$user->id)
                        ->whereDate('waktu_masuk',today())
                        ->first();
    
        if(!$absenHariIni){
            // masuk
            Absensi::create([
                'user_id'=>$user->id,
                'role'=>$user->role,
                'waktu_masuk'=>now()
            ]);
        }else{
            // keluar
            $absenHariIni->update([
                'waktu_keluar'=>now()
            ]);
        }
    
        return back()->with('success','Absensi berhasil');
    }
}
