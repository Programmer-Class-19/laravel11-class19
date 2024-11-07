<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'telepon',
        'tipe_nota',
        'diskon',
        'path_logo',
        'path_kartu_member',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
