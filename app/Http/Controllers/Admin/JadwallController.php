<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwallController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPt::with('pt')->latest()->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }
}
