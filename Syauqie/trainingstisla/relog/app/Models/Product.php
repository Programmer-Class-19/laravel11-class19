<?php

namespace App\Models;

use App\Models\PurchaseDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama_produk',
        'merk',
        'harga_beli',
        'stock',
        'harga_jual',
        'diskon',
        'sku'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function purchasedetail(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
