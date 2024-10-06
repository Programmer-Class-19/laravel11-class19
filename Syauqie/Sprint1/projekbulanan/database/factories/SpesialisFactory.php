<?php

namespace Database\Factories;

use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spesialis>
 */
class SpesialisFactory extends Factory
{
    protected $model = Spesialis::class;

    public function definition()
    {
        $spesialisOptions = [
            'Laravel' => 'LRV',
            'Flutter' => 'FLT',
            'Capcut' => 'CPC',
            'UI/UX' => 'UIX'
        ];

        $namaSpesialis = $this->faker->randomElement(array_keys($spesialisOptions));
        $kodePrefix = $spesialisOptions[$namaSpesialis];

        return [
            'nama_spesialis' => $namaSpesialis,
            'kode_id' => $this->faker->unique()->regexify($kodePrefix . '[0-9]{9}'), // Buat kode unik dengan prefix
        ];
    }
}
