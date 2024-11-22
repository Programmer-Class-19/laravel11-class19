<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Category::with('products');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kategori', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $categories = $query->paginate(10);

        return view('ui.features-categories', [
            'data' => $categories,
            'type_menu' => 'category',
            'search' => $search, // Untuk mengisi input pencarian
            'isEmpty' => $categories->isEmpty()
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama_kategori' => 'required|string|max:225',
                'description' => 'nullable|string|max:225'
            ]);

            Category::create($validateData);

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404, 'Category tidak ditemukan');
        }

        return view('ui.features-categories', [
            'data' => $category,
            'type_menu' => 'category',
            'is_detail' => true // Tandai sebagai halaman detail
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('update.update-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'nama_kategori' => 'string|max:225|unique:categories,nama_kategori,' . $category->id,
                'description' => 'string|max:225|unique:categories,description,' . $category->id
            ]);

            $category->nama_kategori = $request->nama_kategori;
            $category->description = $request->description;

            $category->save();

            return redirect()->route('categories.index')->with('success', 'Kategori berhasil di update');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('succes', 'Kategori berhasil dihapus');
    }
}
