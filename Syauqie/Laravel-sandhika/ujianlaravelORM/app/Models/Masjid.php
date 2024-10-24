<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'jumlah_rek_donasi',
        'kapasitas',
    ];

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}

