<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\PaketGym;
use App\Models\User;
use App\Models\Transaksi;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->latest()->get();

        return view('admin.member.index', compact('members'));
    }

    public function create()
    {
        $pakets = PaketGym::all();

        return view('admin.member.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address'  => 'required|string',
            'birthday' => 'required|date',
            'phone'    => 'required|string|max:20',
            'paket_id' => 'required|exists:paket_gyms,id',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'address'  => $request->address,
                    'birthday' => $request->birthday,
                    'phone'    => $request->phone,
                    'role'     => 'member',
                ]);

                $pakets = PaketGym::findOrFail($request->paket_id);

                $transaksi = Transaksi::create([
                    'member_id' => $user->id,
                    'paket_id' => $pakets->id,
                    'personal_trainer_id' => null,
                    'total_bayar' => $pakets->harga,
                    'status' => 'approved',
                    'validated_by' => auth()->id(),
                    'validated_at' => now(),
                    'expired_at' => now()->addDay(),
                ]);

                Membership::create([
                    'member_id' => $user->id,
                    'paket_id' => $pakets->id,
                    'personal_trainer_id' => null,
                    'tanggal_mulai' => now(),
                    'tanggal_akhir' => now()->addDays($pakets->durasi_hari),
                    'status' => 'active',
                ]);

                $this->generateAndSaveQrCode($user);
            });
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan member: ' . $e->getMessage());
        }

        return redirect()->route('member.index')
            ->with('success', 'Member berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        return view('admin.member.show', compact('member'));
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $member->id,
            'address'  => 'required|string',
            'birthday' => 'required|date',
            'phone'    => 'required|string|max:20',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'address', 'birthday', 'phone']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $member->update($data);

        return redirect()->route('member.index')
            ->with('success', 'Member berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $member = User::where('role', 'member')->findOrFail($id);

        if ($member->qr_code && Storage::disk('public')->exists($member->qr_code)) {
            Storage::disk('public')->delete($member->qr_code);
        }

        $member->delete();

        return back()->with('success', 'Member berhasil dihapus');
    }

    private function generateAndSaveQrCode(User $user): void
    {
        $qrName = 'user_' . $user->id . '.png';
        $writer = new PngWriter();
        $result = $writer->write(new QrCode($user->qr_token));

        Storage::disk('public')->put('qrcodes/' . $qrName, $result->getString());

        $user->update(['qr_code' => 'qrcodes/' . $qrName]);
    }
}
