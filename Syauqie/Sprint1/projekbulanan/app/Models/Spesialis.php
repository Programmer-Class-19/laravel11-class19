<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;

    protected $fillable = ['nama_spesialis', 'kode_id'];

    public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }

    public function divisis()
    {
        return $this->belongsToMany(Divisi::class);
    }
}
