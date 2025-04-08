<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Konsultasi;
use Carbon\Carbon;

class CheckPendingKonsultasi extends Command
{
    protected $signature = 'check:pending-konsultasi';
    protected $description = 'Hanguskan sesi konsultasi jika tidak dimulai dalam 3 menit setelah pembayaran';

    public function handle()
    {
        $now = Carbon::now();
        Konsultasi::where('status', 'pending')
            ->where('created_at', '<=', $now->subMinutes(3))
            ->update(['status' => 'expired']);

        $this->info('Pending konsultasi checked.');
    }
}