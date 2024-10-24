<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'jumlah_rekening_donasi', 'kapasitas'];

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
    //setiap masjid dapat memiliki banyak jamaah yang terdaftar dan menyelenggarakan banyak kegiatan
}

