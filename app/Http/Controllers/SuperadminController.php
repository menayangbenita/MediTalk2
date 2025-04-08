<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanPenarikan;
use App\Models\Dokter;
use App\Models\User;

class SuperadminController extends Controller
{
    public function index()
    {
        $pemasukan = PengajuanPenarikan::where('status', 'paid')->sum('jumlah');
        $dokterAktif = Dokter::where('status', 'aktif')->count();
        $pasienBaru = User::where('role', 'pasien')
                          ->whereDate('created_at', now()->toDateString())
                          ->count();

        return view('superadmin.index', compact('pemasukan', 'dokterAktif', 'pasienBaru'));
    }
    
}
