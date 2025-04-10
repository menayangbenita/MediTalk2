<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Chat extends Model
{

    protected $fillable = ['sesi_id', 'sender_id', 'message'];

    public function sesi()
    {
        return $this->belongsTo(SesiKonsultasi::class, 'sesi_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

