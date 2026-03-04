<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->latest()->get();

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member'
        ]);

        return redirect()->route('admin.members.index')
                         ->with('success', 'Member berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        return view('admin.members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $member->id,
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.members.index')
                         ->with('success', 'Member berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        $member->delete();

        return redirect()->route('admin.members.index')
                         ->with('success', 'Member berhasil dihapus');
    }
}
