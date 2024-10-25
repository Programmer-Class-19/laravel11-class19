<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\Masjid;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function index()
    {
        $jamaahs = Jamaah::with('masjid')->get();
        return view('jamaah.index', compact('jamaahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat_kota' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'masjid_id' => 'required|exists:masjids,id',
        ]);

        Jamaah::create($validated);
        return redirect()->route('jamaah.index');
    }
}

