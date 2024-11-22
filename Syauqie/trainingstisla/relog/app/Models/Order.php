<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'order_date',
        'status',
    ];

    public function supplier(): BelongsTo {
        return $this->belongsTo(Supplier::class);
    }
}
