<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        return $query->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        return Product::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            'category_id' => 'exists:categories,id'
        ]);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
