<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact'
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
