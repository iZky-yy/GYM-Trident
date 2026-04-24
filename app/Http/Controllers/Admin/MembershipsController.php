<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\PaketGym;
use App\Models\PersonalTrainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembershipsController extends Controller
{
    public function index()
    {
        $memberships = Membership::with(['member', 'paket', 'pt.user'])->latest()->get();

        return view('admin.membership.index', compact('memberships'));
    }

    public function edit(string $id)
    {
        $membership = Membership::with(['member', 'paket'])->findOrFail($id);
        $members    = User::where('role', 'member')->get();
        $pakets     = PaketGym::all();
        $pts        = PersonalTrainer::with('user')->get();

        return view('admin.membership.edit', compact('membership', 'members', 'pakets', 'pts'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'paket_id'            => 'required|exists:paket_gyms,id',
            'personal_trainer_id' => 'nullable|exists:personal_trainers,id',
            'tanggal_mulai'       => 'required|date',
            'status'              => 'required|in:active,expired',
        ]);

        $membership   = Membership::findOrFail($id);
        $paket        = PaketGym::findOrFail($request->paket_id);
        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalAkhir = $tanggalMulai->copy()->addDays($paket->durasi_hari);

        $membership->update([
            'paket_id'            => $request->paket_id,
            'personal_trainer_id' => $request->personal_trainer_id,
            'tanggal_mulai'       => $tanggalMulai,
            'tanggal_akhir'       => $tanggalAkhir,
            'status'              => $request->status,
        ]);

        return redirect()->route('membership.index')
            ->with('success', 'Membership berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('membership.index')
            ->with('success', 'Membership berhasil dihapus');
    }
}
