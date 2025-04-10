<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesiKonsultasi extends Model
{
    protected $table = 'sesi_konsultasi';
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'pembayaran_id',
        'waktu_mulai',
        'waktu_selesai',
        'status',
        'catatan',
    ];
    public function chat() {
        return $this->hasMany(ChatKonsultasi::class, 'sesi_id');
    }
}
