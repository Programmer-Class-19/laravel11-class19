<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = User::paginate(5); // Tampilkan 10 user per halaman
        return view('ui.features-post', [
            'type_menu' => 'dashboard',
            'data' => $data
        ]);
    }
}
