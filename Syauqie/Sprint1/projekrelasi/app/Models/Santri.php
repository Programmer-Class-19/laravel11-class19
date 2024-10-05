<?php
namespace App\Models;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'umur', 'angkatan', 'divisi_id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}

