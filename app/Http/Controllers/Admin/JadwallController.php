<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\PersonalTrainer;

use Illuminate\Http\Request;

class JadwallController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('pt')->latest()->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'hari' => 'required|array',
            'jam'  => 'required',
        ]);

        $jadwal->update([
            'hari' => implode(',', $request->hari),
            'jam'  => $request->jam,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }
}
