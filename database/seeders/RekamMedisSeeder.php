<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Carbon\Carbon;

class RekamMedisSeeder extends Seeder
{
    public function run()
    {
        $dokterIds = Dokter::pluck('id'); // ambil semua id dokter

        Pasien::all()->each(function ($pasien) use ($dokterIds) {
            for ($i = 0; $i < 3; $i++) {
                RekamMedis::create([
                    'pasien_id'   => $pasien->id,
                    'dokter_id'   => $dokterIds->random(),
                    'tanggal'     => Carbon::now()->subDays(rand(1, 100)),
                    'anamnesis'   => 'Keluhan ke-' . ($i + 1) . ' pasien.',
                    'tanda_vital' => 'Tekanan darah: ' . rand(100, 140) . '/' . rand(70, 90),
                    'diagnosis'   => 'Diagnosis ke-' . ($i + 1),
                    'medikasi'    => 'Obat A, Obat B',
                ]);
            }
        });
    }
}
