<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaksi;
use App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Menampilkan halaman pembayaran
     */
    public function index()
    {
        return view('payment.index');
    }

    /**
     * Proses pembuatan transaksi dan membuat Snap Token Midtrans
     */
    public function charge(Request $request)
    {
        $order_id = 'ORDER-' . Str::random(8);

        $transaction = Transaksi::create([
            'order_id' => $order_id,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        $payload = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($payload);

        return response()->json(['snap_token' => $snapToken]);
    }

    /**
     * Menangani notifikasi pembayaran dari Midtrans
     */
    public function notification(Request $request)
    {
        Log::info('Webhook Received', ['query' => $request->query()]);

        // Ambil data dari webhook
        $orderId = $request->query('order_id');
        $transactionStatus = $request->query('transaction_status');

        if (!$orderId || !$transactionStatus) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        // Cari transaksi berdasarkan order_id
        $transaksi = Transaksi::where('order_id', $orderId)->first();

        if (!$transaksi) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        // Jika pembayaran sukses, update status transaksi dan buat sesi konsultasi
        if (in_array($transactionStatus, ['settlement', 'capture'])) {
            $transaksi->update(['payment_status' => 'settlement']); // Update status transaksi

            // Buat sesi konsultasi
            $konsultasi = Konsultasi::create([
                'dokter_id' => $transaksi->dokter_id,
                'pasien_id' => $transaksi->user_id,
                'transaksi_id' => $transaksi->order_id,
                'status' => 'ongoing',
                'start_time' => now(),
                'end_time' => now()->addMinutes(60), // Menambahkan 60 menit ke start_time
            ]);

            Log::info("Sesi konsultasi dimulai untuk transaksi: $orderId");
            return redirect()->route('konsultasi.chat', ['konsultasi_id' => $konsultasi->id])
                ->with('success', 'Chat dimulai!');
        }

        return response()->json(['message' => 'Webhook diproses'], 200);
    }


    public function bayarKonsultasi(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $transaction = Transaksi::create([
            'id' => Str::uuid(),
            'order_id' => 'ORDER-' . time() . '-' . rand(1000, 9999),
            'user_id' => Auth::user()->id,
            'dokter_id' => $request->dokter_id,
            'amount' => $request->amount,
            'payment_status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->amount,
            ],
            'customer_details' => [
                'user_id' => Auth::user()->id,
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'callbacks' => [
                'finish_redirect_url' => url('/payment/success'),
            ],
        ];

        $konsultasi = Konsultasi::create([
            'pasien_id' => Auth::user()->id,
            'dokter_id' => $request->dokter_id,
            'transaksi_id' => $transaction->id,
            'status' => 'pending',
        ]);

        try {
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            return redirect($paymentUrl);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
