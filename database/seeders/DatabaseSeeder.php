<?php

namespace Database\Seeders;

use App\Models\RekamMedis;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use Database\Seeders\DokterSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Pasien::truncate();
        RekamMedis::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $this->call([
            UserSeeder::class,
            DokterSeeder::class,
            PasienSeeder::class,
            LaboratSeeder::class,
            RekamMedisSeeder::class,
        ]);
    }
}
