<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return response()->json(Category::all());
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
    ]);

    $category = Category::create($validated);
    return response()->json($category, 201);
}

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'sometimes|required',
    ]);

    $category->update($validated);
    return response()->json($category);
}

}
