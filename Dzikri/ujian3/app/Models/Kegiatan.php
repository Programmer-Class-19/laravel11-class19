<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['nama', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'partisipasi'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    } 

    public function jamaah()
    {
        return $this->belongsToMany(Jamaah::class, 'partisipasi');
    }
    use HasFactory;
}
