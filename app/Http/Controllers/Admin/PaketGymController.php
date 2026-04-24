<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketGym;
use Illuminate\Http\Request;

class PaketGymController extends Controller
{
    public function index()
    {
        $pakets = PaketGym::latest()->get();

        return view('admin.paketgym.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paketgym.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket'  => 'required|string|max:255',
            'durasi_hari' => 'required|integer|min:1',
            'harga'       => 'required|integer|min:0',
        ]);

        PaketGym::create($validated);

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $pakets = PaketGym::findOrFail($id);

        return view('admin.paketgym.show', compact('pakets'));
    }

    public function edit(string $id)
    {
        $pakets = PaketGym::findOrFail($id);

        return view('admin.paketgym.edit', compact('pakets'));
    }

    public function update(Request $request, string $id)
    {
        $pakets = PaketGym::findOrFail($id);

        $validated = $request->validate([
            'nama_paket'  => 'required|string|max:255',
            'durasi_hari' => 'required|integer|min:1',
            'harga'       => 'required|integer|min:0',
        ]);

        $pakets->update($validated);

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $pakets = PaketGym::findOrFail($id);
        $pakets->delete();

        return back()->with('success', 'Paket berhasil dihapus');
    }
}
