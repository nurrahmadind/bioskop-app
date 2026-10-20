<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model

{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'waktu_tayang',
        'harga',
    ];

    public function film()
{
    return $this->belongsTo(Film::class);
}

    public function pemesanans()
{
    return $this->hasMany(Pemesanan::class);
}
}
