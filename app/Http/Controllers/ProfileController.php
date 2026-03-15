<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return view('admin.profile');
        }
        if ($user->role == 'pt') {
            return view('pt.profile');
        }
        return view('member.profile');
    }

    // UPDATE PROFILE
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
            'birthday' => 'nullable|date',
            'photo' => 'nullable|image|max:2048'
        ]);
        if($request->hasFile('photo'))
        {
            if($user->photo){
                Storage::delete('public/'.$user->photo);
            }
            $photo = $request->file('photo')->store('profile','public');
            $user->photo = $photo;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->save();
        return back()->with('success','Profile berhasil diupdate');
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Password berhasil diganti');
    }

    public function delete()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect('/')->with('success','Akun berhasil dihapus');
    }

}
