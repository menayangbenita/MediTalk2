<?php

namespace App\Http\Controllers;

use App\Models\SesiKonsultasi;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        $dokters = User::join('dokters', 'users.id', '=', 'dokters.user_id')
            ->where('users.role', 'dokter')
            ->orderByRaw("
        CASE 
            WHEN dokters.status = 'aktif' THEN 1
            WHEN dokters.status = 'tidak' THEN 2
            ELSE 3
        END
    ")
            ->select('users.*') 
            ->with('dokter') 
            ->get();


        return match ($role) {
            'pasien' => view('pasien.konsultasi.index', compact('dokters')),
        };
    }

    public function dokter($id)
    {
        $dokter = User::where('role', 'dokter')->findOrFail($id);

        return view('pasien.konsultasi.profildokter', compact('dokter'));
    }

    public function riwayat()
    {
        $riwayats = SesiKonsultasi::whereIn('status', ['selesai', 'berjalan'])
            ->where('pasien_id', Auth::user()->id)
            ->get();
            
        return view('pasien.konsultasi.riwayat', compact('riwayats'));
    }
}
