<?php

namespace App\Models;

use App\Models\PurchaseDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id',
        'total_item',
        'total_harga',
        'diskon',
        'bayar'
    ];

    public function supplier(): BelongsTo
    {
        return $this->BelongsTo(Supplier::class);
    }

    public function purchasedetail(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
