<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'masjid_id',
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function jamaahs()
    {
        return $this->belongsToMany(Jamaah::class, 'jamaah_kegiatan');
    }
}

