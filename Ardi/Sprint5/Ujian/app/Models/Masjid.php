<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

}
