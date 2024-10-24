<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use Illuminate\Http\Request;

class UniversitasController extends Controller
{
    public function index()
    {
        $universities = Universitas::with(['mahasiswas', 'seminars'])->get();
        return view('universitas.index', compact('universitas', 'title'));
    }
}
