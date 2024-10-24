<?php
namespace Database\Factories;

use App\Models\Jamaah;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JamaahKegiatanFactory extends Factory
{
    protected $model = \App\Models\JamaahKegiatan::class;

    public function definition()
    {
        $jamaah = Jamaah::inRandomOrder()->first();
        $kegiatan = Kegiatan::inRandomOrder()->first();

        return [
            'jamaah_id' =>  $jamaah ? $jamaah->id : null,
            'kegiatan_id' => $kegiatan ? $kegiatan->id : null,
        ];
    }
}

