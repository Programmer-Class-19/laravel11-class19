<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'stock',
        'price',
        'varian'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionitems(): HasMany
    {
        return $this->hasMany(TransactionItem::class);
    }

    protected $keyType = 'string';

    // Nonaktifkan auto-increment untuk primary key
    public $incrementing = false;


    public static function generateInvoiceId()
    {
        $prefix = 'INV-';
        $timestamp = Carbon::now()->format('YmdHis'); // Menggunakan format waktu saat ini
        $uniqueId = Str::upper(Str::random(3)); // Tambahkan beberapa karakter acak untuk menjaga keunikan lebih lanjut
        return $prefix . $timestamp . $uniqueId;
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
                } while (self::where('id', $id)->exists());
                $model->id = $id;
            }
        });
    }
}
