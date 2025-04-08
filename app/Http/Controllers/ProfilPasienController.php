<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;

class ProfilPasienController extends Controller
{
    public function show()
    {
        $pasien = Auth::user()->pasien;
        return view('pasien.profil.index', compact('pasien'));
    }

    public function edit()
    {
        $pasien = Auth::user()->pasien;
        return view('pasien.profil.edit', compact('pasien'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'nik' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'desa' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'status_perkawinan' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $pasien = Auth::user()->pasien;
        $pasien->update($request->all());

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
