<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat_kota', 'jumlah_donasi', 'tanggal_lahir', 'masjid_id'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class);
    }
    //setiap jamaah beribadah di satu masjid tertentu dan bisa berpartisipasi dalam banyak kegiatan yang diadakan masjid.
}
