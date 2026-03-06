<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PTController extends Controller
{
    public function index()
    {
        $pts = User::where('role','pt')->latest()->get();

        return view('admin.personaltrainer.index', compact('pts'));
    }

    public function create()
    {
        return view('admin.pts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pt'
        ]);

        return redirect()->route('admin.pts.index')
                         ->with('success','PT berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pt = User::where('role','pt')->findOrFail($id);
        $pt->delete();

        return back()->with('success','PT berhasil dihapus');
    }
}
