<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $fillable = ['name', 'address', 'donation_total', 'capacity'];

    public function jamaah()
    {
        return $this->hasMany(Jamaah::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
