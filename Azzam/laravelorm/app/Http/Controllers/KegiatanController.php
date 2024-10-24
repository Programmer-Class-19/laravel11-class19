<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Masjid;
use App\Models\Jamaah;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('masjid', 'jamaahs')->get();
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'masjid_id' => 'required|exists:masjids,id',
            'jamaah_ids' => 'required|array',
        ]);

        $kegiatan = Kegiatan::create($validated);
        $kegiatan->jamaahs()->attach($request->jamaah_ids);

        return redirect()->route('kegiatan.index');
    }
}

