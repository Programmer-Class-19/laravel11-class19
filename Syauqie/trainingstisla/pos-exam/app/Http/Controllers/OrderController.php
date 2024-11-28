<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_country' => 'required|string',
            'payment_method' => 'required|string',
            'products' => 'required|array', // Array of product IDs and quantities
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_country' => $request->shipping_country,
            'payment_method' => $request->payment_method,
            'subtotal' => 0,
            'shipping_cost' => 15.00,
            'total' => 0,
            'status' => 'Pending',
        ]);

        $subtotal = 0;

        foreach ($request->products as $product_id => $quantity) {
            $product = Product::findOrFail($product_id);
            $total_price = $product->price * $quantity;
            $subtotal += $total_price;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $product->price,
                'total' => $total_price,
            ]);

            $product->decrement('stock', $quantity); // Reduce product stock
        }

        $order->update([
            'subtotal' => $subtotal,
            'total' => $subtotal + $order->shipping_cost,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('customer', 'items.product');
        return view('orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->items->each(function ($item) {
            $item->product->increment('stock', $item->quantity); // Restore stock
        });

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

