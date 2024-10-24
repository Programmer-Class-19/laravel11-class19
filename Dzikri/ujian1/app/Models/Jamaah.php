<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{

    protected $fillable = ['nama', 'alamat', 'kota', 'jumlah_donasi', 'tanggal_lahir', 'masjid_id'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class, 'partisipasi');
    }

    use HasFactory;
}
