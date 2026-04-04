<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalllController extends Controller
{
    public function jadwalByPT($pt_id)
    {
        $jadwal = JadwalPt::where('user_id', $pt_id)->get();

        return view('member.jadwal.index', compact('jadwal'));
    }
}
