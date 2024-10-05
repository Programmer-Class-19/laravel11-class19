<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function spesialis()
    {
        return $this->belongsToMany(Spesialis::class, 'mentor_spesialis');
    }
}
