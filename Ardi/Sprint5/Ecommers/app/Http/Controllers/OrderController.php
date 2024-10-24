<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index() {
        return response()->json(Order::with('orderItems.product')->get());
    }
    
    public function store(Request $request)
    {
        // validasi sebuah data unutk menghindari kesalahan
        $validatedData = $request->validate([
            'order_id' => 'required|exist:orders,id', //sebagai validasi untuk order_id
            'item.*.product_id' => 'required|exists:product,id',
            'item.*.quantity' => 'required|integer|min1'
        ]);
        
        // Mengambil order dari database
        $order = Order::findOrFail($validatedData['order_id']);

        // Mengisi array orders item menggunakan foreach
        foreach ($request->items as $item):
            $orderItems[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ];
        endforeach;

        // Menyimpan OrderItem ke dalam Database Secara Massal Atau Langsung
        $order->orderItems()->createMany($orderItems);

        // Gasken Ke Responlah Biar cepat Usai Kayak Hubungan Gua ama dia Ehh!
        return response()->json($order, 201);
    }
}
