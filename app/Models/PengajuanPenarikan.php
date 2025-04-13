<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPenarikan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_penarikan';

    protected $fillable = [
        'dokter_id',
        'jumlah',
        'status',
        'disetujui_pada',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
