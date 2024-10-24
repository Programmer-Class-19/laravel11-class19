<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
{
    return response()->json(Order::all());
}

public function store(Request $request)
{
    $validated = $request->validate([
        'products' => 'required|array',
        'products.*.id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    $totalPrice = collect($validated['products'])->sum(function ($product) {
        $productModel = Product::find($product['id']);
        return $productModel->price * $product['quantity'];
    });

    $order = Order::create([
        'products' => $validated['products'],
        'total_price' => $totalPrice,
    ]);

    return response()->json($order, 201);
}

}
