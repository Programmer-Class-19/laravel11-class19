<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'nilai', 'santri_id', 'spesialis_id'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class);
    }
}
