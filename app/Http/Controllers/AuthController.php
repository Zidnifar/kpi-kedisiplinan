<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna = \App\Models\Pengguna::where(
            'username',
            $request->username
        )->first();

        if (!$pengguna || !Hash::check($request->password, $pengguna->password)) {
            return back()->with('error', 'Username atau password salah.');
        }

        if ($pengguna->status_akun !== 'aktif') {
            return back()->with('error', 'Akun Anda tidak aktif.');
        }

        Auth::login($pengguna);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}