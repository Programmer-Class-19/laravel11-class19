<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'spesialis_id'];

    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class);
    }
}
