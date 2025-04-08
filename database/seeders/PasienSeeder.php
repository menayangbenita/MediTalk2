<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $pasiens = [
            [
                'nrm' => 'NRM001',
                'nama' => 'Siti Aminah',
                'user_id' => 1,
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2000-01-01',
                'nik' => '3573010101000001',
                'telepon' => '081234567890',
                'nama_ibu' => 'Ibu Aminah',
                'alamat' => 'Jl. Merdeka No.1',
                'desa' => 'Kepanjen',
                'kecamatan' => 'Kepanjen',
                'kota' => 'Malang',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Pelajar',
            ],
            [
                'nrm' => 'NRM002',
                'nama' => 'Budi Santoso',
                'user_id' => 2,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1998-05-12',
                'nik' => '3573010101000002',
                'telepon' => '081234567891',
                'nama_ibu' => 'Ibu Santi',
                'alamat' => 'Jl. Kenanga No.2',
                'desa' => 'Tandes',
                'kecamatan' => 'Tandes',
                'kota' => 'Surabaya',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Kawin',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Karyawan Swasta',
            ],
            [
                'nrm' => 'NRM003',
                'nama' => 'Agus Prabowo',
                'user_id' => 3,
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-03-10',
                'nik' => '3573010101000003',
                'telepon' => '081234567892',
                'nama_ibu' => 'Ibu Sri',
                'alamat' => 'Jl. Melati No.3',
                'desa' => 'Antapani',
                'kecamatan' => 'Antapani',
                'kota' => 'Bandung',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pendidikan' => 'D3',
                'pekerjaan' => 'Wiraswasta',
            ],
            [
                'nrm' => 'NRM004',
                'nama' => 'Rina Kartika',
                'user_id' => 4,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2001-07-25',
                'nik' => '3573010101000004',
                'telepon' => '081234567893',
                'nama_ibu' => 'Ibu Rika',
                'alamat' => 'Jl. Mawar No.4',
                'desa' => 'Cempaka Putih',
                'kecamatan' => 'Cempaka Putih',
                'kota' => 'Jakarta',
                'agama' => 'Hindu',
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Pelajar',
            ],
            [
                'nrm' => 'NRM005',
                'nama' => 'Dewi Lestari',
                'user_id' => 5,
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1997-09-15',
                'nik' => '3573010101000005',
                'telepon' => '081234567894',
                'nama_ibu' => 'Ibu Lestari',
                'alamat' => 'Jl. Anggrek No.5',
                'desa' => 'Umbulharjo',
                'kecamatan' => 'Umbulharjo',
                'kota' => 'Yogyakarta',
                'agama' => 'Buddha',
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Mahasiswa',
            ],
        ];

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }
    }
}
