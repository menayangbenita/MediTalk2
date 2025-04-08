<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Konsultasi;
use Carbon\Carbon;

class CheckKonsultasiSelesai extends Command
{
    protected $signature = 'check:konsultasi-selesai';
    protected $description = 'Akhiri sesi konsultasi setelah 60 menit';

    public function handle()
    {
        $now = Carbon::now();
        Konsultasi::where('status', 'aktif')
            ->where('started_at', '<=', $now->subMinutes(60))
            ->update(['status' => 'selesai']);

        $this->info('Konsultasi selesai dicek.');
    }
}