<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_divisi', 'angkatan'];

    public function santris()
    {
        return $this->hasMany(Santri::class);
    }
}
