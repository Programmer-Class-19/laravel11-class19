<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $satuan = ['pcs', 'dus', 'rentengan'];
        return [
            'category_id' => $category ? $category->id : null,
            'nama_produk' => fake()->word(), // Menghasilkan satu kata untuk nama
            'satuan' => fake()->randomElement($satuan), // Menghasilkan satu kata untuk nama
            'sku' => fake()->unique()->bothify('BRG-######???'),
            'harga_beli' => fake()->randomFloat(2, 1, 100), // Harga dengan 2 desimal antara 1 dan 100
            'stok' => fake()->numberBetween(1, 100),
            'harga_jual' => fake()->randomFloat(2, 1, 100), // Harga dengan 2 desimal antara 1 dan 100
            'diskon' => fake()->numberBetween(0, 90),
        ];
    }
}
