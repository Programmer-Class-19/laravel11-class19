<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clover extends Model
{
    use HasFactory;

    protected $fillable = ['kerajaan', 'raja', 'bangsawan', 'ksatria', 'warga'];

    public function noble()
    {
        return $this->hasMany(Noble::class);
    }

    public function knight()
    {
        return $this->hasMany(Knight::class);
    }
}
