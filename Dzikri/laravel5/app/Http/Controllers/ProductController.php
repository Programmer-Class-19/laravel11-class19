<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      // Tampilkan semua produk
      public function index()
      {
          $products = Product::all();
          return response()->json($products);
      }
  
      // Simpan produk baru
      public function store(Request $request)
      {
          $product = new Product();
          $product->name = $request->name;
          $product->description = $request->description;
          $product->price = $request->price;
          $product->stock = $request->stock;
          $product->save();
  
          return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
      }
  
      // Menampilkan produk berdasarkan ID
      public function show($id)
      {
          $product = Product::find($id);
          if ($product) {
              return response()->json($product);
          } else {
              return response()->json(['message' => 'Product not found'], 404);
          }
      }
  
      // Update produk
      public function update(Request $request, $id)
      {
          $product = Product::find($id);
          if ($product) {
              $product->name = $request->name;
              $product->description = $request->description;
              $product->price = $request->price;
              $product->stock = $request->stock;
              $product->save();
  
              return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
          } else {
              return response()->json(['message' => 'Product not found'], 404);
          }
      }
  
      // Hapus produk
      public function destroy($id)
      {
          $product = Product::find($id);
          if ($product) {
              $product->delete();
              return response()->json(['message' => 'Product deleted successfully']);
          } else {
              return response()->json(['message' => 'Product not found'], 404);
          }
      }
}
