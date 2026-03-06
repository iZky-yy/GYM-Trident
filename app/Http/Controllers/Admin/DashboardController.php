<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMember = User::where('role','member')->count();
        $totalPT = User::where('role','pt')->count();
        $kunjunganHariIni = Absensi::whereDate('waktu_masuk',today())->count();

        return view('admin.dashboard', compact(
            'totalMember',
            'totalPT',
            'kunjunganHariIni'
        ));
    }
}
