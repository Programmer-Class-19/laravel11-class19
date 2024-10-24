<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        // Ambil nama kota dari parameter request, default Jakarta
        $city = $request->input('city', 'Jakarta'); 
        
        // Ganti dengan API key Anda dari OpenWeather
        $apiKey = 'YOUR_OPENWEATHER_API_KEY'; 
        
        // URL dari OpenWeather API
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        try {
            // Kirim request HTTP ke OpenWeather API
            $response = Http::get($url);
            
            // Jika request berhasil
            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                // Jika kota tidak ditemukan atau ada kesalahan
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }
}
?>
