<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable =[
        'purchase_id',
        'product_id',
        'harga_beli',
        'jumlah',
        'subtotal',
    ];

    public function purchase() {
        return $this->belongsTo(Purchase::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
