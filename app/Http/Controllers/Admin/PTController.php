<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PersonalTrainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PTController extends Controller
{
    public function index()
    {
        $pts = PersonalTrainer::with('user')->latest()->get();
        return view('admin.personaltrainer.index', compact('pts'));
    }

    public function create()
    {
        return view('admin.personaltrainer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'spesialisasi' => 'nullable',
            'tarif_per_sesi' => 'nullable|numeric'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pt'
        ]);

        PersonalTrainer::create([
            'user_id' => $user->id,
            'spesialisasi' => $request->spesialisasi,
            'tarif_per_sesi' => $request->tarif_per_sesi
        ]);

        return redirect()->route('personaltrainer.index')
                         ->with('success','PT berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pts = PersonalTrainer::with('user')->findOrFail($id);
        return view('admin.personaltrainer.edit', compact('pts'));
    }

    public function update(Request $request, $id)
    {

    $pt = PersonalTrainer::with('user')->findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $pt->user_id,
        'password' => 'nullable|min:6',
        'spesialisasi' => 'nullable',
        'tarif_per_sesi' => 'nullable|numeric'
    ]);

    $user = $pt->user;

    $user->name = $request->name;
    $user->email = $request->email;

    if($request->password){
        $user->password = Hash::make($request->password);
    }

    $user->save();

    $pt->update([
        'spesialisasi' => $request->spesialisasi,
        'tarif_per_sesi' => $request->tarif_per_sesi
    ]);

    return redirect()->route('personaltrainer.index')
        ->with('success','PT berhasil diupdate');
}

    public function destroy($id)
    {
        $pt = PersonalTrainer::findOrFail($id);
        $pt->user()->delete();

        return back()->with('success','PT berhasil dihapus');
    }
}
