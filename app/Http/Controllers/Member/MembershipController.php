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
        ->where('member_id', Auth::id())
        ->get();

        return view('member.membership.index', compact('memberships'));
    }

    public function create()
    {
        $pakets = PaketGym::all();
        $pts = PersonalTrainer::with('user')->get();

        return view('member.membership.create', compact('pakets','pts'));
    }

    public function store(Request $request)
    {
        $membership = Membership::create([
            'member_id' => auth()->id(),
            'paket_id' => $request->paket_id,
            'personal_trainer_id' => $request->personal_trainer_id,
            'tanggal_mulai' => now(),
            'status' => 'active'
        ]);

        // 🔥 AUTO BUAT SESI
        if ($membership->personal_trainer_id) {

            $pt = PersonalTrainer::find($membership->personal_trainer_id);

            for ($i = 1; $i <= 5; $i++) {

                SesiPt::create([
                    'member_id' => $membership->member_id,
                    'pt_id' => $pt->user_id,
                    'tanggal' => now()->addDays($i),
                    'jam' => '10:00:00',
                    'status' => 'scheduled'
                ]);
            }
        }

        return redirect()->route('membership.index')
            ->with('success','Membership & Jadwal berhasil dibuat');
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
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('membership.index')
            ->with('success','Membership berhasil dihapus');
    }
}
