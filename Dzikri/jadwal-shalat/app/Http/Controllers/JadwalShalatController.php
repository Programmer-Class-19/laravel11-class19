<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JadwalShalatService;

class JadwalShalatController extends Controller
{
    protected $jadwalshalatService;

    // Inject service ke dalam controller melalui constructor
    public function __construct(JadwalShalatService $jadwalshalatService)
    {
        $this->jadwalshalatService = $jadwalshalatService;
    }

    /*
      Menampilkan jadwal shalat berdasarkan kota.
     */
    public function index(Request $request)
    {
        // Ambil kota dari request, default Jakarta
        $city = $request->input('city', 'Jakarta');

        // Gunakan service untuk mengambil jadwal shalat
        $times = $this->jadwalshalatService->getJadwalShalatByCity($city);

        // Kembalikan view dengan data jadwal shalat
        return view('jadwal-shalat', ['times' => $times, 'city' => $city]);
    }
}
