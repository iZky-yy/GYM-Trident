<?php

namespace App\Http\Controllers\PT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::where('user_id', Auth::id())->latest()->get();
        return view('pt.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('pt.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|array',
            'jam' => 'required',
        ]);

        Jadwal::create([
            'user_id' => Auth::id(),
            'hari' => implode(',', $request->hari),
            'jam' => $request->jam,
        ]);

        return redirect()->route('pt.jadwal.index')
            ->with('success','Jadwal berhasil ditambahkan');
    }


    public function show(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('pt.jadwal.show', compact('jadwal'));
    }


    public function edit($id)
    {
        $jadwal = Jadwal::where('user_id', Auth::id())->findOrFail($id);
        return view('pt.jadwal.edit', compact('jadwal'));
    }


    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::where('user_id', Auth::id())->findOrFail($id);
        $request->validate([
            'hari' => 'required|array',
            'jam' => 'required',
        ]);
        $jadwal->update($request->only('hari','jam'));

        return redirect()->route('pt.jadwal.index')
            ->with('success','Jadwal berhasil diupdate');
    }


    public function destroy($id)
    {
        $jadwal = Jadwal::where('user_id', Auth::id())->findOrFail($id);
        $jadwal->delete();

        return back()->with('success','Jadwal berhasil dihapus');
    }
}
