<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{   
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'kapasitas', 'rekening_doanasi'];

    public function jamaah()
    {
        return $this->hasMany(Jamaah::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    
}
