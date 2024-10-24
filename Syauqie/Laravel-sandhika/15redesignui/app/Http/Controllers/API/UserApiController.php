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
        $users = User::with('posts')->get();
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

        // Hash password dan tambahkan email_verified_at
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => now(), // Isi email_verified_at dengan waktu sekarang
            'password' => bcrypt($request->password), // Hash password
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil dimasukkan',
            'data' => $user
        ], 201);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('posts')->findOrFail($id);
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
            'name' => 'string|max:255',
            'username' => 'string|max:255|unique:users,username,' . $id,
            'email' => 'email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8', // Password tidak wajib, hanya jika diisi
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 400);
        }

        $user = User::findOrFail($id);

        // Cek apakah password diisi, jika ya maka hash sebelum di-update
        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Update user
        $user->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil diperbarui',
            'data' => $user
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
