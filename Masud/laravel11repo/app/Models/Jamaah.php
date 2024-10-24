<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $fillable = ['name', 'address', 'city', 'donation_total', 'birthdate', 'masjid_id'];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class, 'jamaah_kegiatan');
    }
}
