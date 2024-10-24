<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return response()->json(Category::all());    
    }

    public function store(Request $request) {
        $request->validate(['name'=> 'required|string|max:255']);
        $category = Category::create($request->only('name'));
        return response()->json($category,201);
    }

    // public function update(Request $request, $id) { 
    //     $category = Category::findorFail($id);
    //     $category->update($request->only('name'));
    //     return response()->json($category);
    // }

    public function update(Request $request, Category $category) { 
        $category->update($request->only('name'));
        return response()->json($category);
    }

    public function destroy($id) {
        Category::destroy($id);
        return response()->json(null,204);
    }
}
