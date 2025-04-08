<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'nama_ibu',
        'nik',
        'alamat',
        'desa',
        'kecamatan',
        'kota',
        'agama',
        'status_perkawinan',
        'pendidikan',
        'pekerjaan',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
