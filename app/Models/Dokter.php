<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $fillable = [
        'user_id',
        'nama',
        'spesialis',
        'alumnus',
        'str',
        'tempat_praktik',
        'mulai_praktik',
        'tarif',
        'maksimal_chat',
        'status',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function konsultasi()
    {
        return $this->hasMany(SesiKonsultasi::class, 'dokter_id');
    }
}
