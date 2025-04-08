<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 'pasien':
                    return redirect()->route('dashboard.pasien');
                case 'dokter':
                    return redirect()->route('dashboard.dokter');
                case 'laborat':
                    return redirect()->route('laborat.dashboard');
                case 'superadmin':
                    return redirect()->route('dashboard.superadmin');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'role' => 'Role tidak dikenali.',
                    ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
