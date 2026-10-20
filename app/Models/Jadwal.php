<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function film()
{
    return $this->belongsTo(Film::class);
}

    public function pemesanans()
{
    return $this->hasMany(Pemesanan::class);
}
}
