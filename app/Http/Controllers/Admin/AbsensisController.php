<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensisController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->role;

        $absensi = Absensi::with('user')
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->get();

        return view('admin.absensi.index', compact('absensi', 'role'));
    }
}
