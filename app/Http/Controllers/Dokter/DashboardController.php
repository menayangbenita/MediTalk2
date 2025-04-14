<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\User;
use App\Models\SesiKonsultasi;

class DashboardController extends Controller
{
    public function index()
    {
        $dokter = Auth::User()->dokter;
        $dokterId = $dokter->id;
        $user = Auth::user();
        $today = now()->toDateString();
        $todayy =now();

        $konsultasiSelesai = SesiKonsultasi::where('dokter_id', $dokter->id)
            ->where('status', 'selesai')
            ->whereDate('waktu_selesai', $today)
            ->count();

        $konsultasiAktif = SesiKonsultasi::where('dokter_id', $dokter->id)
            ->where('status', 'berjalan')
            ->whereDate('waktu_selesai', $today)
            ->count();

        $pendapatan = $konsultasiSelesai * $dokter->tarif;

        $rating = 95;


        $riwayats = SesiKonsultasi::where('dokter_id', $user->dokter->id)
            ->where('status', 'selesai')
            ->latest('waktu_selesai')
            ->take(5)
            ->get();

        $berlangsungs = SesiKonsultasi::where('dokter_id', $user->dokter->id)
            ->where('status', 'berjalan')
            ->latest('waktu_mulai')
            ->take(5)
            ->get();

        return view('dokter.index', compact('dokter', 'konsultasiAktif', 'konsultasiSelesai', 'pendapatan', 'rating', 'today', 'todayy', 'riwayats', 'berlangsungs'));
    }
}
