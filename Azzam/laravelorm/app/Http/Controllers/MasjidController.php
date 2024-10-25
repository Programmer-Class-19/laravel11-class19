<?php
namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index()
    {
        $masjids = Masjid::all();
        return view('masjid.index', compact('masjids'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_rekening_donasi' => 'required|integer',
            'kapasitas' => 'required|integer',
        ]);

        Masjid::create($validated);
        return redirect()->route('masjid.index');
    }
}

