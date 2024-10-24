<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['name', 'date', 'start_time', 'end_time', 'masjid_id'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function jamaah()
    {
        return $this->belongsToMany(Jamaah::class, 'jamaah_kegiatan');
    }
}
