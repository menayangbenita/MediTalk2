<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Chat extends Model
{
    protected $table = 'chat_konsultasi';

    protected $fillable = ['sesi_id', 'sender_id', 'pesan'];

    public function sesi()
    {
        return $this->belongsTo(SesiKonsultasi::class, 'sesi_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

