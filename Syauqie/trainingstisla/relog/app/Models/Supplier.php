<?php

namespace App\Models;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'phone_supplier'
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
