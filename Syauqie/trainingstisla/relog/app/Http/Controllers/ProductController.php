<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Log;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::with('category');

        if ($search) {
            $query->where('nama_produk', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(10);

        return view('ui.features-products', [
            'data' => $products,
            'type_menu' => 'category',
            'search' => $search,
            'isEmpty' => $products->isEmpty(),
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('create.create-product', ['type_menu' => 'dashboard', 'data' => $category]);
    }

    public function store(Request $request)
{
    try {
        $validateData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'nama_produk' => 'required|string|max:225',
            'stok' => 'required|integer',
        ]);

        Product::create($validateData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('update.update-product', ['type_menu' => 'dashboard', 'data' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Validasi input
            $request->validate([
                'category_id' => 'required|integer|exists:categories,id', // Pastikan kategori ada di tabel categories
                'nama_produk' => 'required|string|max:225|unique:products,nama_produk,' . $product->id,
                'stok' => 'required|integer|min:0',
            ]);

            // Update data produk
            $product->update([
                'category_id' => $request->category_id,
                'nama_produk' => $request->nama_produk,
                'satuan' => $request->satuan,
                'stok' => $request->stok,
            ]);

            // Redirect ke halaman yang sesuai dengan pesan sukses
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');

        } catch (\Exception $e) {
            // Jika ada error, redirect kembali dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui produk: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('succes', 'Kamu berhasil untuk menghapus dia dari masa lalu');
    }
}
