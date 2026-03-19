<?php

namespace App\Http\Controllers\PT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SesiPt;

class SesissController extends Controller
{
    public function index()
    {
        $sesis = SesiPt::with('member')
            ->where('pt_id', auth()->id())
            ->get();

        return view('pt.sesi.index', compact('sesis'));
    }

    public function edit($id)
    {
        $sesi = SesiPt::findOrFail($id);
        return view('pt.sesi.edit', compact('sesi'));
    }

    public function update(Request $request, $id)
    {
        $sesi = SesiPt::findOrFail($id);

        $sesi->update([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status' => $request->status
        ]);

        return back()->with('success','Jadwal diupdate');
    }
}
