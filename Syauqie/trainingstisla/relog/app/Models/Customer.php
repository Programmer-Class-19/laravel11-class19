<?php

namespace App\Models;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;


    protected $fillable = [
        'kode_member',
        'nama_member',
        'email_member',
        'phone_member',
        'address_member'
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
}
