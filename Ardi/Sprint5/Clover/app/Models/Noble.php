<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noble extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'keluaraga', 'ksatria', 'pasukan'];

    public function clover()
    {
        
    }
}
