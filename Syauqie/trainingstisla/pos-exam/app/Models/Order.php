<?php
namespace App\Models;

use App\Models\Customer;
use App\Models\Supplier;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'customer_id',
        'order_date',
        'status',
        'payment_status',
        'payment_method',
        'total_price',
        'discount',
        'tax',
        'shipping_address',
        'shipping_status',
        'payment_time',
        'shipping_time',
        'order_reference'
    ];

    /**
     * Relasi ke Supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Relasi ke Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi ke OrderItems (jika ada tabel untuk item pesanan)
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Menambahkan aksesors untuk total harga (misalnya, menghitung harga setelah diskon dan pajak)
     */
    public function getTotalAmountAttribute()
    {
        return $this->total_price - $this->discount + $this->tax;
    }

    /**
     * Menambahkan aksesors untuk status pembayaran
     */
    public function getPaymentStatusLabelAttribute()
    {
        $statusLabels = [
            'pending' => 'Pending',
            'paid' => 'Paid',
            'failed' => 'Failed'
        ];

        return $statusLabels[$this->payment_status] ?? 'Unknown';
    }

    /**
     * Menambahkan aksesors untuk status pengiriman
     */
    public function getShippingStatusLabelAttribute()
    {
        $shippingLabels = [
            'pending' => 'Pending',
            'shipped' => 'Shipped',
            'delivered' => 'Delivered'
        ];

        return $shippingLabels[$this->shipping_status] ?? 'Unknown';
    }
}
