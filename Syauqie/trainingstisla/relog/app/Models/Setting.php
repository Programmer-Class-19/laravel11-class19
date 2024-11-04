<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'telepon',
        'tipe_nota',
        'diskon',
        'path_logo',
        'path_kartu_member'
    ];
}
