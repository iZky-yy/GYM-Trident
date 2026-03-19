<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    public function index()
    {
        $member = User::where('role', 'member')->latest()->get();

        return view('admin.member.index', compact('member'));
    }

    public function create()
    {
        return view('admin.member.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qr_token' => Str::uuid(),
            'role' => 'member'
        ]);

        $qrName = 'user_'.$user->id.'.png';

        $qr = new QrCode($user->qr_token);

        $writer = new PngWriter();
        $result = $writer->write($qr);

        Storage::disk('public')->put(
            'qrcodes/'.$qrName,
            $result->getString()
        );

        $user->update([
            'qr_code' => 'qrcodes/'.$qrName
        ]);

        return redirect()->route('member.index')
                         ->with('success', 'Member berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);
        return view('member.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);
        return view('admin.member.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $member->id,
            'password' => 'nullable|min:6',
            'address' => 'nullable',
            'birthday' => 'nullable',
            'phone' => 'nullable',
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
        ]);
        if ($request->password) {
            $member->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('member.index')
                         ->with('success', 'Member berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);
        $member->delete();
        return back()->with('success', 'Member berhasil dihapus');
    }
}
