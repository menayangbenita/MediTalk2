<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SesiKonsultasi;

class ChatDokterController extends Controller
{
    public function index()
    {
        $dokter = Auth::user()->dokter;

        $konsultasis = SesiKonsultasi::where('status', 'berlangsung')
        ->where('dokter_id', Auth::user()->id)
        ->get();
        // $sesi = SesiKonsultasi::findOrFail($sesiId);

        // if (Auth::id() != $sesi->pasien_id && Auth::id() != $sesi->dokter_id) {
        //     abort(403);
        // }

        return view('dokter.konsultasi', compact('dokter', 'konsultasis'));
    }
}
