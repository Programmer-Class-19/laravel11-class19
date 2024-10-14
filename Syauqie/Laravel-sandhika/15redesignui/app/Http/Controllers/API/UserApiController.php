<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json(
            ['status' => true, 'data' => $users, 'message' => 'Get Data Success']
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|string|min:8'
        ]);

        // Jika validasi gagal, kembalikan respons error
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 400);
        }

        $users = User::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Berhasil dimasukkan',
            'data' => $users
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|string|min:8'
        ]);

        // Jika validasi gagal, kembalikan respons error
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 400);
        }
        $users = User::findOrFail($id);
        $users->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Berhasil diperbaiki',
            'data' => $users
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Temukan user, jika tidak ditemukan otomatis akan mengembalikan 404
    $user = User::findOrFail($id);

    // Hapus semua post terkait user ini menggunakan relasi
    $user->posts()->delete();

    // Hapus user
    $user->delete();

    // Kembalikan respons sukses dengan status 204 No Content
    return response()->json(['message' => 'User deleted successfully'], 200);
}

}
