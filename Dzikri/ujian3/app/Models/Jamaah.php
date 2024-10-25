<?php

namespace App\Models;

use App\Models\Masjid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jamaah extends Model
{
    protected $fillable = ['nama', 'alamat', 'kota', 'jumlah_donasi', 'tanggal_lahir'];

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
