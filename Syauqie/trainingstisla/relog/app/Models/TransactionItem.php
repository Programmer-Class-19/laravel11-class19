<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    public function transaction():BelongsTo {
        return $this->belongsTo(Transaction::class);
    }

    public function product():BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
