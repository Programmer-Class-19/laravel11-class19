<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Supplier::query();

        // Jika ada pencarian, filter berdasarkan nama atau email
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Ambil data dengan paginasi
        $supplier = $query->paginate(10);

        // Kirim data ke view
        return view('ui.features-supplier', [
            'data' => $supplier,
            'type_menu' => 'category',
            'search' => $search, // Untuk mengisi input pencarian
            'isEmpty' => $supplier->isEmpty() // Cek jika hasil pencarian kosong
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.create-supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validateData = $request->validate([
                'name' => 'required|string|max:225',
                'address' => 'required|string|max:225',
                'phone' => 'required|string|max:225',
            ]);

            // Hapus titik pada input harga sebelum mengonversi ke integer dan menyimpan
            Supplier::create($validateData);

            return redirect()->route('suppliers.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('update.update-supplier', ['type_menu' => 'dashboard', 'data' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'nullable|string|max:225|unique:suppliers,name,' . $supplier->id, // pastikan nama tidak duplikat, kecuali untuk produk ini
                'address' => 'nullable|string|max:225|unique:suppliers,address,' . $supplier->id, // pastikan nama tidak duplikat, kecuali untuk produk ini
                'phone' => 'nullable|string|max:225|unique:suppliers,phone,' . $supplier->id, // pastikan nama tidak duplikat, kecuali untuk produk ini
            ]);

            // Perbarui produk
            $supplier->update([
                'name' => $request->has('name') ? $request->name : $supplier->name,
                'address' => $request->has('address') ? $request->address : $supplier->address,
                'phone' => $request->has('phone') ? $request->phone : $supplier->phone,
            ]);


            // Redirect dengan pesan sukses
            return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui');
        } catch (\Exception $e) {
            // Jika terjadi error, kembalikan dengan pesan error dan input lama
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui Supplier: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $Supplier)
    {
        $Supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Kamu berhasil untuk menghapus dia dari masa lalu');
    }
}
