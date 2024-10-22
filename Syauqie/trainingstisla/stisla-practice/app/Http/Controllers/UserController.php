<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        // Inject UserService ke dalam controller
        $this->userService = $userService;
    }

    public function getAllUser()
    {
        // Ambil semua data user dari UserService
        $user = $this->userService->getAllUser();

        // Jika tidak ada user yang ditemukan
        if (!$user) {
            return response()->json(['error' => 'No user found'], 404);
        }

        // Mengembalikan view dengan data user
        return view('pages.posts', [
            'getuser' => $user['data'],
            'getauthor' => collect($user['data'])->flatMap(function ($user) {
                return $user['posts'];
            }),
            'type_menu' => 'posts'
        ]);

    }
}
