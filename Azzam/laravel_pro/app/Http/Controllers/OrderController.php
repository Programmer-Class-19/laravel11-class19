<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('orderItems.product')->get();
    }

    public function store(Request $request)
    {
        $request->validate(['items' => 'required|array']);
        $order = Order::create();

        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
            ]);
        }

        return response()->json(['message' => 'Order placed', 'order_id' => $order->id]);
    }
}
?>