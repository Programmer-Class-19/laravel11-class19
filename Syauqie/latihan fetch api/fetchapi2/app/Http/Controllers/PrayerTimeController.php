<?php
namespace App\Http\Controllers;

use App\Services\PrayerTimeService;
use Illuminate\Http\Request;

class PrayerTimeController extends Controller
{
    protected $prayerTimeService;

    public function __construct(PrayerTimeService $prayerTimeService)
    {
        $this->prayerTimeService = $prayerTimeService;
    }

    public function searchPrayerTimes(Request $request)
    {
        // Validasi input
        $request->validate([
            'city' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $city = $request->input('city');
        $date = $request->input('date');

        // Dapatkan ID kota berdasarkan nama kota
        $cityId = $this->prayerTimeService->getCityId($city);

        if (!$cityId) {
            return view('prayer_times')->with('error', 'Kota tidak ditemukan');
        }

        // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
        $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $date);

        // Tampilkan hasil di halaman yang sama
        return view('prayer_times', [
            'city' => $city,
            'date' => $date,
            'prayerTimes' => $prayerTimes['data']['jadwal'], // Ubah sesuai struktur respons API
        ]);
    }
}

