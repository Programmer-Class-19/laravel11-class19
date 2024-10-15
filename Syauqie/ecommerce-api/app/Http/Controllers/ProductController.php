<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $products = Product::when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
