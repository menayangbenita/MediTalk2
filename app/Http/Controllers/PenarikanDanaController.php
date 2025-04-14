<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPenarikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanDanaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $dokter_id = $user->dokter->id;

        $request->validate([
            'jumlah' => 'required|numeric|min:10000',
        ]);

        PengajuanPenarikan::create([
            'user_id' => $dokter_id,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan penarikan dana berhasil dikirim.');
    }

    public function index()
    {
        $pengajuan = PengajuanPenarikan::with('user')->latest()->get();
        return view('superadmin.penarikan', compact('pengajuan'));
    }

    // Superadmin menyetujui pengajuan
    public function approve($id)
    {
        $penarikan = PengajuanPenarikan::findOrFail($id);
        $penarikan->update(['status' => 'disetujui']);

        // Logika integrasi ke Midtrans bisa ditambahkan di sini

        return back()->with('success', 'Pengajuan berhasil disetujui.');
    }

    // Superadmin menolak pengajuan
    public function reject($id)
    {
        $penarikan = PengajuanPenarikan::findOrFail($id);
        $penarikan->update(['status' => 'ditolak']);

        return back()->with('success', 'Pengajuan ditolak.');
    }
}
