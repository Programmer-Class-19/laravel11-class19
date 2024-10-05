<?php

namespace App\Models;

use App\Models\Divisi;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spesialis extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode'];

    public function mentors()
    {
        return $this->belongsToMany(Mentor::class, 'mentor_spesialis');
    }

    public function divisi()
    {
        return $this->belongsToMany(Divisi::class, 'divisi_spesialis');
    }
}
