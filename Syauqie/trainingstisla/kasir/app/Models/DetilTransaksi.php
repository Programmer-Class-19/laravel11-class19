<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetilTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah',
    ];

    public function transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class);
    }
    public function produk(): BelongsTo {
        return $this->belongsTo(Produk::class);
    }
}
