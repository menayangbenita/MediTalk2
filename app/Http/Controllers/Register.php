<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Pasien;
use App\Models\Dokter;

class Register extends Controller
{
    public function registerPasien(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'nrm' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pasien = Pasien::where('nrm', $request->nrm)->first();

        if (!$pasien) {
            return back()->withErrors(['nrm' => 'Anda belum memiliki NRM. Silakan daftar secara manual di klinik.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
        ]);

        $pasien->user_id = $user->id;
        $pasien->save();

        Auth::login($user);

        return redirect()->route('dashboard.pasien')->with('success', 'Registrasi berhasil!');
    }
}
