<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\PurchaseDetail;
use Illuminate\Support\Carbon;
use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'stock',
        'price',
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
        $uniqueId = Str::upper(Str::random(8));
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
                } while (self::where('id', $id)->exists());
                $model->id = $id;
            }
        });
    }
}
