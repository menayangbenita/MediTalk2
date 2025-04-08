<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasienAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nrm' => 'required|string',
            'email' => 'required|email|unique:pasiens,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $pasien = Pasien::where('nrm', $request->nrm)->first();

        if (!$pasien) {
            throw ValidationException::withMessages([
                'nrm' => 'Nomor Rekam Medis tidak ditemukan. Silakan hubungi admin.',
            ]);
        }

        if ($pasien->password) {
            return back()->withErrors(['nrm' => 'NRM ini sudah digunakan untuk mendaftar.']);
        }

        $pasien->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('web')->login($pasien);

        return redirect()->route('lengkapi.profil')->with('success', 'Akun berhasil dibuat. Silakan lengkapi profil Anda.');
    }
}
