<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RekamMedis;

class RekamMedisPasienController extends Controller
{
    public function index()
    {
        $pasienId = Auth::user()->id;

        $rekamMedis = RekamMedis::where('pasien_id', $pasienId)
            ->orderByDesc('tanggal')
            ->get();

        return view('pasien.rekam-medis', compact('rekamMedis'));
    }
}
