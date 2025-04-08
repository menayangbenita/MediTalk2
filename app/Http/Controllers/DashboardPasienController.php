<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Auth;

class DashboardPasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $konsultasi = Konsultasi::where('pasien_id', $user->id)->latest()->first();

        $status = 'belum'; // default jika belum pernah konsultasi

        if ($konsultasi) {
            // Cek jika status sedang berlangsung atau pending
            if (in_array($konsultasi->status, ['pending', 'berlangsung'])) {
                // Jika waktu sesi sudah lewat tapi status belum selesai
                if ($konsultasi->end_time && Carbon::now()->gt($konsultasi->end_time)) {
                    $status = 'ended';
                    $konsultasi->update(['status' => 'selesai']);
                } else {
                    $status = $konsultasi->status; // tetap 'pending' atau 'berlangsung'
                }
            } elseif ($konsultasi->status === 'selesai') {
                $status = 'ended';
            } elseif ($konsultasi->status === 'hangus') {
                $status = 'hangus';
            }
        }

        return view('pasien.dashboard.index', compact('konsultasi', 'status'));
    }
}
