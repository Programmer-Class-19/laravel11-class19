<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'total',
        'status'
    ];

    public function detilTransaksi(): HasMany
    {
        return $this->hasMany(DetilTransaksi::class);
    }
}
