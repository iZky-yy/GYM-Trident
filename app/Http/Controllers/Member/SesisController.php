<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SesiPt;

class SesisController extends Controller
{
    public function index()
    {
        $sesis = SesiPt::with('pt')
            ->where('member_id', auth()->id())
            ->get();

        return view('member.sesi.index', compact('sesis'));
    }
}
