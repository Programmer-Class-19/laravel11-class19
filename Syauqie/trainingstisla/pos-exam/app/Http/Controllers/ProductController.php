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
                'name' => 'required|string|max:225',
                'varian' => 'nullable|string|max:225',
                'stock' => 'required|integer',
                'price' => 'required|string', // Validasi sebagai string untuk menerima input dengan titik
            ]);

            // Hapus titik pada input harga sebelum mengonversi ke integer dan menyimpan
            $price = str_replace(',', '', $validateData['price']);
            $validateData['price'] = (float) $price;


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
                'category_id' => 'nullable|integer|exists:categories,id', // kategori boleh kosong, pastikan valid
                'name' => 'nullable|string|max:225|unique:products,name,' . $product->id, // pastikan nama tidak duplikat, kecuali untuk produk ini
                'varian' => 'nullable|string|max:225', // pastikan nama tidak duplikat, kecuali untuk produk ini
                'stock' => 'nullable|integer|min:0', // stok boleh kosong, tapi jika ada harus >= 0
                'price' => 'nullable|string|regex:/^[0-9,]+$/', // harga boleh kosong, tapi jika ada hanya angka dan koma
            ]);

            // Hapus titik (.) pada input harga untuk menghindari format ribuan
            $price = str_replace([',', '.'], '', $request->price); // Menghapus titik dan koma

            // Perbarui produk
            $product->update([
                'category_id' => $request->has('category_id') ? $request->category_id : $product->category_id,
                'name' => $request->has('name') ? $request->name : $product->name,
                'varian' => $request->has('varian') ? $request->varian : $product->varian,
                'stock' => $request->has('stock') ? $request->stock : $product->stock,
                'price' => $request->has('price') ? (int) $price : $product->price,
            ]);


            // Redirect dengan pesan sukses
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            // Jika terjadi error, kembalikan dengan pesan error dan input lama
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui produk: ' . $e->getMessage()])->withInput();
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
