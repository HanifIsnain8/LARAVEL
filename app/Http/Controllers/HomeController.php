<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $alt = Alternatif::where('user_id', Auth::id())->count();
        $kri = Kriteria::where('user_id', Auth::id())->count();
        return view('dashboard', compact('alt', 'kri'));
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'PASSWORD SALAH');
        }
        $auth = Auth::user();
        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "PASSWORD BERHASIL DI GANTI");
    }
}
