<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Console\Commands\CheckPendingKonsultasi;
use App\Console\Commands\CheckKonsultasiTimeout;
use App\Console\Commands\CheckResponseTimeout;
use App\Console\Commands\CheckKonsultasiSelesai;
use App\Console\Commands\UpdateKonsultasiStatus;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected $commands = [
        UpdateKonsultasiStatus::class,
    ];
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
{
    $schedule->command('konsultasi:check-pending')->everyMinute();
    $schedule->command('konsultasi:check-expired')->everyMinute();
    $schedule->command('konsultasi:check-response')->everyMinute();
    $schedule->command('konsultasi:update-status')->everyMinute(); 
}

}
