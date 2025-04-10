<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Konsultasi;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Auth;

class DashboardPasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $rekammedispasien = RekamMedis::where('pasien_id', Auth::user()->id)
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get(); 
        $konsultasi = Konsultasi::where('pasien_id', $user->id)->latest()->first();

        $status = 'belum'; 

        if ($konsultasi) {
            if (in_array($konsultasi->status, ['pending', 'berlangsung'])) {
                if ($konsultasi->end_time && Carbon::now()->gt($konsultasi->end_time)) {
                    $status = 'ended';
                    $konsultasi->update(['status' => 'selesai']);
                } else {
                    $status = $konsultasi->status; 
                }
            } elseif ($konsultasi->status === 'selesai') {
                $status = 'ended';
            } elseif ($konsultasi->status === 'hangus') {
                $status = 'hangus';
            }
        }

        return view('pasien.dashboard.index', compact('konsultasi', 'status', 'rekammedispasien'));
    }
}
