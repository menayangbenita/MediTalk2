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
    public function chats()
    {
        return $this->hasMany(Chat::class, 'sesi_id');
    }
}
