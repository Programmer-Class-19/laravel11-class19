<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Tampilkan halaman transaksi.
     */
    public function index()
    {
        $products = Product::all(); // Ambil semua produk dari database
        $cart = session()->get('cart', []); // Ambil keranjang dari session
        $total = collect($cart)->sum('subtotal'); // Hitung total
        $type_menu = 'transactions';

        return view('ui.features-transaction', compact('products', 'cart', 'total', 'type_menu'));
    }

    /**
     * Tambahkan produk ke keranjang.
     */
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id); // Validasi produk
        $quantity = $request->quantity;

        // Validasi stok
        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Cek apakah produk sudah ada di keranjang
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
            $cart[$product->id]['subtotal'] = $cart[$product->id]['quantity'] * $product->price;
        } else {
            // Tambahkan produk ke keranjang
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'subtotal' => $quantity * $product->price,
            ];
        }

        // Simpan keranjang ke session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus item dari keranjang.
     */
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]); // Hapus item dari keranjang
        session()->put('cart', $cart); // Simpan kembali

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    /**
     * Checkout dan simpan transaksi.
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        DB::beginTransaction();
        try {
            // Simpan transaksi
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'transaction_date' => now(),
                'total_amount' => collect($cart)->sum('subtotal'),
                'payment_method' => $request->payment_method,
                'status' => 'completed',
            ]);

            // Simpan detail transaksi
            foreach ($cart as $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);

                // Kurangi stok produk
                $product = Product::find($item['product_id']);
                $product->decrement('stock', $item['quantity']);
            }

            // Kosongkan keranjang
            session()->forget('cart');

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

