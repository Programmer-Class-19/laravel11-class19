<?php
namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan
     */
    public function index()
    {
        // Mengambil semua pesanan
        $orders = Order::with('supplier', 'customer')->get();
        $type_menu = 'order';

        return view('orders.index', compact('orders', 'type_menu'));
    }

    /**
     * Menampilkan form untuk membuat pesanan baru
     */
    public function create()
    {
        // Mengambil semua supplier dan customer untuk ditampilkan pada form
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $type_menu = 'order';

        return view('orders.create', compact('suppliers', 'customers', 'type_menu'));
    }

    /**
     * Menyimpan pesanan baru
     */
    public function store(Request $request)
{
    try {
        // Validasi input
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_method' => 'required|in:credit_card,transfer,cash',
            'total_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'shipping_address' => 'required|string|max:255',
            'shipping_status' => 'required|in:pending,shipped,delivered',
        ]);


        // Simpan ke database
        $order = Order::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors());
        // Tangani error validasi
        return redirect()->back()
            ->withErrors($e->validator)
            ->withInput();
    } catch (\Exception $e) {
        // Tangani error umum
        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal membuat order: ' . $e->getMessage());
    }
}


    /**
     * Menampilkan detail pesanan
     */
    public function show($id)
    {
        $order = Order::with('supplier', 'customer', 'orderItems.product')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Menampilkan form untuk mengedit pesanan
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $suppliers = Supplier::all();
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'suppliers', 'customers'));
    }

    /**
     * Memperbarui pesanan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
            'total_price' => $request->total_price,
            'discount' => $request->discount ?? 0,
            'tax' => $request->tax ?? 0,
            'shipping_address' => $request->shipping_address,
            'payment_status' => $request->payment_status ?? $order->payment_status,
            'shipping_status' => $request->shipping_status ?? $order->shipping_status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    /**
     * Menghapus pesanan
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
