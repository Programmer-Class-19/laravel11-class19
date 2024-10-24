<?php

namespace App\Http\Controllers;

use App\Models\WeatherLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    // Menampilkan form cuaca
    public function index()
    {
        $logs = WeatherLog::latest()->take(10)->get();
        return view('weather', ['logs' => $logs]);
    }


    // Mengambil data cuaca dari API
    public function fetchWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY'); // Simpan API Key di .env
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        // Fetch API cuaca
        $response = Http::get($url);

        if ($response->successful()) {
            $weatherData = $response->json();

            // Simpan log pencarian cuaca di database
            WeatherLog::create([
                'city' => $city,
                'weather_data' => json_encode($weatherData),
            ]);

            return view('weather', ['weather' => $weatherData]);
        } else {
            return redirect('/weather')->with('error', 'Kota tidak ditemukan atau terjadi kesalahan.');
        }
    }
}
