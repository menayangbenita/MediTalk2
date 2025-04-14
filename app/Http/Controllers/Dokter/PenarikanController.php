<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanPenarikan;
use App\Models\Transaksi;

class PenarikanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = Auth::User()->dokter;
        $dokter_id = $user->dokter->id;


        $totalMasuk = Transaksi::where('dokter_id', $dokter_id)->sum('amount');

        $totalKeluar = PengajuanPenarikan::where('dokter_id', $dokter_id)
            ->where('status', 'disetujui')
            ->sum('jumlah');

        $saldoAkhir = $totalMasuk - $totalKeluar;

        $danaMasuk = Transaksi::where('dokter_id', $dokter_id)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'no_rek' => $item->dokter->norek ?? '-',
                    'jenis' => 'masuk',
                    // 'saldo_awal' => $item->saldo_awal,
                    'nominal' => $item->amount - 2000,
                    // 'saldo_akhir' => $item->saldo_akhir,
                    'tanggal' => $item->created_at,
                    'status' => 'berhasil',
                ];
            });

        $danaKeluar = PengajuanPenarikan::where('dokter_id', $dokter_id)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'no_rek' => $item->dokter->norek ?? '-',
                    'jenis' => 'keluar',
                    'nominal' => $item->jumlah,
                    'tanggal' => $item->created_at,
                    'status' => $item->status,
                ];
            });

        $transaksiGabung = $danaMasuk->concat($danaKeluar)->sortBy('created_at')->values();
        $saldo = 0;
        $riwayat = $transaksiGabung->map(function ($item) use (&$saldo) {
            $item->saldo_awal = $saldo;

            if ($item->jenis === 'masuk') {
                $saldo += $item->nominal;
            } else {
                $saldo -= $item->nominal;
            }

            $item->saldo_akhir = $saldo;
            return $item;
        });

        return view('dokter.penarikan-dana', compact('dokter', 'dokter_id', 'riwayat', 'saldoAkhir', 'totalMasuk', 'totalKeluar'));
    }
}
