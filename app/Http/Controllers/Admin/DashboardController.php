<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaketGym;
use App\Models\Membership;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers   = User::where('role', 'member')->count();
        $activeTrainers = User::where('role', 'pt')->count();
        $activeSessions = PaketGym::count();

        $memberships = Membership::with(['member', 'paket', 'pt.user'])
            ->latest()
            ->limit(5)
            ->get();

        $totalRevenue = Transaksi::where('status', 'approved')
            ->sum('total_bayar');

        $revenueRaw = Transaksi::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(total_bayar) as total')
            )
            ->where('status', 'approved')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $memberRaw = Membership::select(
                DB::raw('MONTH(tanggal_mulai) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->where('status', 'active')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $months = collect(range(1, 12));

        $revenueChart = $months->map(fn($m) => $revenueRaw[$m] ?? 0);
        $memberChart  = $months->map(fn($m) => $memberRaw[$m] ?? 0);

        return view('admin.dashboard', compact(
            'totalMembers',
            'activeTrainers',
            'activeSessions',
            'memberships',
            'totalRevenue',
            'revenueChart',
            'memberChart'
        ));
    }
}
