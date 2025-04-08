<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Konsultasi;
use App\Models\Chat;
use Carbon\Carbon;

class CheckResponseTimeout extends Command
{
    protected $signature = 'check:response-timeout';
    protected $description = 'Periksa apakah pasien merespons dalam 2 menit setelah pesan dokter';

    public function handle()
    {
        $now = Carbon::now();

        $konsultasis = Konsultasi::where('status', 'aktif')->get();

        foreach ($konsultasis as $konsultasi) {
            $lastDoctorMessage = Chat::where('konsultasi_id', $konsultasi->id)
                ->where('sender_role', 'dokter')
                ->latest()
                ->first();

            if ($lastDoctorMessage) {
                $response = Chat::where('konsultasi_id', $konsultasi->id)
                    ->where('sender_role', 'pasien')
                    ->where('created_at', '>', $lastDoctorMessage->created_at)
                    ->exists();

                if (!$response && Carbon::parse($lastDoctorMessage->created_at)->diffInMinutes($now) >= 2) {
                    $konsultasi->update(['status' => 'expired']);
                }
            }
        }

        $this->info('Timeout respons pasien diperiksa.');
    }
}