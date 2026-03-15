<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use App\Models\PaketGym;
use App\Models\PersonalTrainer;
use Illuminate\Http\Request;

class MembershipController extends Controller
{

    public function index()
    {
        $memberships = Membership::with([
            'member',
            'paket',
            'pt.user'
        ])->get();

        return view('member.membership.index', compact('memberships'));
    }


    public function create()
    {
        $members = User::all();
        $pakets = PaketGym::all();
        $pts = PersonalTrainer::with('user')->get();

        return view('member.membership.create', compact('members','pakets','pts'));
    }


    public function store(Request $request)
    {
        Membership::create([
            'paket_id' => $request->paket_id,
            'personal_trainer_id' => $request->personal_trainer_id,
            'tanggal_mulai' => now(),
            'status' => 'active'
        ]);

        return redirect()->route('membership.index')
            ->with('success','Membership berhasil ditambahkan');
    }


    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        $members = User::all();
        $pakets = PaketGym::all();
        $pts = PersonalTrainer::with('user')->get();

        return view('member.membership.edit', compact('membership','members','pakets','pts'));
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
