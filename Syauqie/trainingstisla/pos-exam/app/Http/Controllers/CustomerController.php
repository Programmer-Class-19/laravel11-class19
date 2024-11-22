<?php
namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    /**
     * Relasi ke pesanan
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

