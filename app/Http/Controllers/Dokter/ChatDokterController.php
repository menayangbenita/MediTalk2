<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SesiKonsultasi;
use App\Models\RekamMedis;

class ChatDokterController extends Controller
{
    public function index()
    {
        $dokter = Auth::user()->dokter;

        $konsultasis = SesiKonsultasi::where('status', 'berjalan')
        ->where('dokter_id', $dokter->id)
        ->get();

        return view('dokter.konsultasi', compact('dokter', 'konsultasis'));
    }

    public function show($sesiId)
    {
        $dokter = Auth::user()->dokter;
        $sesi = SesiKonsultasi::findOrFail($sesiId);
        $pasienId = $sesi->pasien_id;

        $rekamMedis = RekamMedis::where('pasien_id', $pasienId)
            ->orderByDesc('tanggal')
            ->get();

        if (Auth::id() != $sesi->pasien_id && $dokter->id != $sesi->dokter_id) {
            abort(403);
        }

        $konsultasis = SesiKonsultasi::where('status', 'berjalan')
        ->where('dokter_id', $dokter->id)
        ->get();

        return view('dokter.konsultasi', compact('dokter', 'konsultasis', 'sesi', 'rekamMedis'));
    }
}
