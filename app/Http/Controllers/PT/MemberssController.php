<?php

namespace App\Http\Controllers\pt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class MemberssController extends Controller
{
    public function index()
    {
        $pt = Auth::user()->personalTrainer;

        $members = Membership::with(['member', 'paket'])
            ->where('personal_trainer_id', $pt->id)
            ->latest()
            ->get();

        return view('pt.member.index', compact('members'));
    }
}
