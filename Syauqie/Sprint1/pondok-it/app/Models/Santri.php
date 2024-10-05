<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'umur', 'angkatan', 'divisi_id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function ujians()
    {
        return $this->hasMany(Ujian::class);
    }
}
