<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanPenarikanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengajuan_penarikan')->insert([
            [
                'dokter_id' => 1,
                'jumlah' => 143536,
                'status' => 'ditolak',
                'created_at' => Carbon::parse('2025-04-03 14:51:30'),
                'updated_at' => Carbon::parse('2025-04-08 14:51:30'),
            ],
            [
                'dokter_id' => 2,
                'jumlah' => 209261,
                'status' => 'pending',
                'created_at' => Carbon::parse('2025-04-01 14:51:30'),
                'updated_at' => Carbon::parse('2025-04-08 14:51:30'),
            ],
            [
                'dokter_id' => 3,
                'jumlah' => 476479,
                'status' => 'ditolak',
                'created_at' => Carbon::parse('2025-03-31 14:51:30'),
                'updated_at' => Carbon::parse('2025-04-08 14:51:30'),
            ],
            [
                'dokter_id' => 4,
                'jumlah' => 453081,
                'status' => 'ditolak',
                'created_at' => Carbon::parse('2025-03-29 14:51:30'),
                'updated_at' => Carbon::parse('2025-04-08 14:51:30'),
            ],
            [
                'dokter_id' => 5,
                'jumlah' => 279764,
                'status' => 'ditolak',
                'created_at' => Carbon::parse('2025-04-05 14:51:30'),
                'updated_at' => Carbon::parse('2025-04-08 14:51:30'),
            ],
        ]);
    }
}
