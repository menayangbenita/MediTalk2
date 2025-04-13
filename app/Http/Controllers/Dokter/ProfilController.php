<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User; // Ensure this model extends Illuminate\Database\Eloquent\Model
use App\Models\Dokter;

class ProfilController extends Controller
{
    public function show()
    {
        $dokter = Auth::user()->dokter;
        return view('dokter.profil.index', compact('dokter'));
    }

    public function updateNamaBank(Request $request, $id)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:100',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->nama_bank = $request->nama_bank;
        $dokter->save();

        return back()->with('success', 'Nama bank berhasil diperbarui.');
    }

    public function updateNoRekening(Request $request, $id)
    {
        $request->validate([
            'norek' => 'required|string|max:50',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->norek = $request->norek;
        $dokter->save();

        return back()->with('success', 'Nomor rekening berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();  // Ini sudah otomatis berdasarkan session auth yang aktif

        // Verifikasi password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save(); // Simpan perubahan password

        // Kembalikan pesan sukses
        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
