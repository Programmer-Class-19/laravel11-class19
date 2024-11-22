<?php

namespace App\Models;

use App\Models\DetilTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'stock',
        'price',
    ];

    public function detilTransaksis(): HasMany
    {
        return $this->HasMany(DetilTransaksi::class);
    }
}
