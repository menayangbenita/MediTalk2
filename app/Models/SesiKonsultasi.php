<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesiKonsultasi extends Model
{
    public function chat() {
        return $this->hasMany(ChatKonsultasi::class, 'sesi_id');
    }
}
