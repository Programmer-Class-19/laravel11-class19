<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;

    protected $fillable = ['nama_spesialis', 'kode_spesialis'];

    public function mentors()
    {
        return $this->belongsToMany(Mentor::class);
    }

    public function ujians()
    {
        return $this->hasMany(Ujian::class);
    }
}
