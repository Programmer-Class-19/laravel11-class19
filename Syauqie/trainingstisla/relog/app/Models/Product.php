<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\PurchaseDetail;
use Illuminate\Support\Carbon;
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
        'satuan',
        'harga_beli',
        'stok',
        'harga_jual',
        'diskon',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function purchasedetail(): HasMany
    // {
    //     return $this->hasMany(PurchaseDetail::class);
    // }

    public function purchasedetail(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    // Tentukan tipe primary key sebagai string
    protected $keyType = 'string';

    // Nonaktifkan auto-increment untuk primary key
    public $incrementing = false;

    // Fungsi untuk membuat ID khusus dengan format seperti invoice
    public static function generateInvoiceId()
    {
        $prefix = 'INV-';
        $uniqueId = Str::upper(Str::random(8)); // Membuat ID acak 8 karakter
        return $prefix . $uniqueId;
    }

    // Boot method untuk menangani event 'creating'
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Jika 'id' belum diisi, maka generate ID khusus
            if (empty($model->id)) {
                do {
                    $id = self::generateInvoiceId();
                } while (self::where('id', $id)->exists()); // Pastikan ID unik
                $model->id = $id; // Set ID ke model
            }
        });
    }
}
