<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::with('user')->get());
        return response()->json(['status' => true, 'data' => PostResource::class, 'message' => 'data berhasil di tampilkan'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 400);
        }

        $post = Post::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Post berhasil dibuat',
            'data' => $post
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PostResource(Post::with('user')->findOrFail($id));
        return response()->json(['status' => true, 'data' => PostResource::class, 'messsage' => 'data berhasil ditampilkan'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
