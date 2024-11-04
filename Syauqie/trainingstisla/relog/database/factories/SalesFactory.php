<?php
namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Models\Sales;
use App\Models\SalesItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    protected $model = Sales::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $customer = Customer::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();

        // Pastikan ada produk untuk dihitung total
        $quantity = $this->faker->numberBetween(1, 10); // Misalnya, dapatkan jumlah acak antara 1 hingga 10

        return [
            'user_id' => $user ? $user->id : null,
            'customer_id' => $customer ? $customer->id : null,
            'total_harga' => $product ? $product->price * $quantity : 0, // Menghitung total hanya jika produk ada
            'total_item' => fake()->numberBetween(1, 100),
            'payment_type' => $this->faker->randomElement(['cash', 'transfer', 'debt']), // Menggunakan array untuk randomElement
            'status' => $this->faker->randomElement(['pending', 'completed']),
        ];
    }
}
