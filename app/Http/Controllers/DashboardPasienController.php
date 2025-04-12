<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SesiKonsultasi;
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
        $konsultasi = SesiKonsultasi::where('pasien_id', $user->id)->latest()->first();
        $status = 'belum';

        if ($konsultasi) {
            $now = Carbon::now();

            if ($konsultasi->end_time && $now->diffInDays($konsultasi->end_time, false) < -0) {
                $status = 'belum';
            }
            elseif (in_array($konsultasi->status, ['menunggu', 'berjalan'])) {
                if ($konsultasi->end_time && $now->gt($konsultasi->end_time)) {
                    $status = 'selesai';
                    $konsultasi->update(['status' => 'selesai']);
                } else {
                    $status = $konsultasi->status;
                }
            } elseif ($konsultasi->status === 'selesai') {
                $status = 'selesai';
            } elseif ($konsultasi->status === 'hangus') {
                $status = 'hangus';
            }
        }


        return view('pasien.dashboard.index', compact('konsultasi', 'status', 'rekammedispasien'));
    }
}
