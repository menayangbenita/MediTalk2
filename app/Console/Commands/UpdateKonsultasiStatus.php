<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\SesiKonsultasi;

class UpdateKonsultasiStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-konsultasi-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $now = Carbon::now();

    SesiKonsultasi::where('status', 'berjalan')
        ->where('waktu_selesai', '<', $now)
        ->update(['status' => 'selesai']);

    $this->info('Status konsultasi diperbarui.');
}
}
