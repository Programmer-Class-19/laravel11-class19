<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return response()->json(Product::with('category')->get());
    }

    public function store(Request $request) {
        $request->validate(['name'=> 'required|string|max:255', 'price'=> 'required|numeric', 'category_id' => 'required|exist:categories,id']);
        $product = Product::create($request->only('name','price','category_id'));
        return response()->json($product);
    }

    // public function destroy($id) {
    //     Product::destroy($id);
    //     return response()->json(null,204);
    // }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(null,204);
    }
}
