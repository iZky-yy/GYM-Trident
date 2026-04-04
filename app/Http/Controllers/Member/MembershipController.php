<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use App\Models\PaketGym;
use App\Models\PersonalTrainer;
use App\Models\SesiPt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with([
            'paket',
            'pt.user'
        ])
        ->where('member_id', auth()->id())
        ->latest()
        ->get();

        return view('member.membership.index', compact('memberships'));
    }

    public function create()
    {
        return view('member.membership.create', [
            'pakets' => PaketGym::all(),
            'pts' => PersonalTrainer::with('user')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:paket_gyms,id',
            'personal_trainer_id' => 'nullable|exists:personal_trainers,id'
        ]);

        dd($request->all());
        $membership = Membership::create([
            'member_id' => auth()->id(),
            'paket_id' => $request->paket_id,
            'personal_trainer_id' => $request->personal_trainer_id ?: null,
            'tanggal_mulai' => now(),
            'status' => 'active'
        ]);

        return redirect()->route('membership.index')
            ->with('success','Membership berhasil dibuat');
    }

    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        $pakets = PaketGym::all();
        $pts = PersonalTrainer::with('user')->get();

        return view('member.membership.edit', compact('membership','pakets','pts'));
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);

        $membership->update([
            'paket_id' => $request->paket_id,
            'personal_trainer_id' => $request->personal_trainer_id,
            'status' => $request->status
        ]);

        return redirect()->route('membership.index')
            ->with('success','Membership berhasil diupdate');
    }

    public function destroy($id)
    {
        Membership::findOrFail($id)->delete();

        return back()->with('success','Membership dihapus');
    }
}
