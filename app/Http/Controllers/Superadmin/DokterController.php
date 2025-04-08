<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class DokterController extends Controller
{
    public function create()
    {
        $dokters = Dokter::all()->map(function ($dokter) {
            $user = User::where('name', $dokter->nama)->where('role', 'dokter')->first();

            return (object)[
                'id' => $dokter->id,
                'alumnus' => $dokter->alumnus,
                'str' => $dokter->str,
                'tempat_praktik' => $dokter->tempat_praktik,
                'mulai_praktik' => $dokter->mulai_praktik,
                'tarif' => $dokter->tarif,
                'maksimal_chat' => $dokter->maksimal_chat,
                'status' => $dokter->status,
                'nama' => $dokter->nama,
                'spesialis' => $dokter->spesialis,
                'foto' => $dokter->foto,
                'status_dokter' => $dokter->status,
                'email' => $user?->email ?? 'Belum ada akun',
                'status_login' => $user ? 'Sudah punya akun' : 'Belum punya akun',
            ];
        });

        return view('superadmin.dokter', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'alumnus' => 'required|string|max:255',
            'str' => 'required|string|unique:dokters,str',
            'tempat_praktik' => 'required|string',
            'mulai_praktik' => 'required|numeric',
            'tarif' => 'required|numeric',
            'maksimal_chat' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_dokter', 'public');
        }

        try {
            DB::beginTransaction();
        
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'role' => 'dokter',
            ]);
        
            Dokter::create([
                'user_id' => $user->id,
                'nama' => $request->nama,
                'spesialis' => $request->spesialis,
                'foto' => $fotoPath,
                'alumnus' => $request->alumnus,
                'str' => $request->str,
                'tempat_praktik' => $request->tempat_praktik,
                'mulai_praktik' => now()->year - $request->mulai_praktik, // pastikan ini INT, bukan date
                'tarif' => $request->tarif,
                'maksimal_chat' => $request->maksimal_chat,
                'status' => 'tidak',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
            DB::commit();
        
            return redirect()->back()->with('success', 'Dokter berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage()); // TAMPILKAN error-nya!
        }
        
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);

        // Cari user berdasarkan nama dan role
        $user = User::where('name', $dokter->nama)
            ->where('role', 'dokter')
            ->first();

        if ($dokter->foto) {
            Storage::disk('public')->delete($dokter->foto);
        }

        if ($user) {
            $user->delete();
        }

        $dokter->delete();

        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }
}
