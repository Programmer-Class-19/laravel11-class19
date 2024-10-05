<?php
namespace App\Models;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'angkatan'];

    public function santris()
    {
        return $this->hasMany(Santri::class);
    }

    public function spesialis()
    {
        return $this->belongsToMany(Spesialis::class, 'divisi_spesialis');
    }
}

