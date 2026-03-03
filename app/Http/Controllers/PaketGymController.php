<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;

class PaketGymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PaketGym = PaketGym::all();
        return view('admin.paketgym.index', compact('PaketGym'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paketgym.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'idpaketgym' => 'required',
                'paketgym' => 'required',
                'hargapaket' => 'required',
            ]);

            PaketGym::create($request->all());
            return redirect()->route('paketgyms.index')->with('Sukses', 'Paket Gym telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketGym $PaketGym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $PaketGym = PaketGym::find($id);
        return view('admin.paketgym.index', compact('PaketGym'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $PaketGym = PaketGym::find($id);
        $PaketGym->paketgym = $request['paketgym'];
        $PaketGym->harga = $request['hargapaket'];
        $PaketGym->save();
        if ($PaketGym) {
            return redirect()->route('paketgyms.index')->with('Sukses', 'Paket GYM berhasil diubah');
        } else {
            return redirect()->route('paketgyms.edit', $PaketGym->id)->with('Error', 'Paket Gym gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketGym $PaketGym)
    {
        $PaketGym = PaketGym::destroy($id);
        return redirect()->route('paketgyms.index')->with('Sukses', "Paket Gym telah dihapus");
    }
}
