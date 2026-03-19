<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SesiPt;
use App\Models\User;

class SesiController extends Controller
{
    public function index()
    {
        $sesis = SesiPt::with(['member','pt'])->get();
        return view('admin.sesi.index', compact('sesis'));
    }

    public function edit($id)
    {
        $sesi = SesiPt::findOrFail($id);
        return view('admin.sesi.edit', compact('sesi'));
    }

    public function update(Request $request, $id)
    {
        $sesi = SesiPt::findOrFail($id);

        $sesi->update($request->all());

        return back()->with('success','Sesi diperbarui');
    }

    public function destroy($id)
    {
        SesiPt::destroy($id);
        return back()->with('success','Sesi dihapus');
    }
}
