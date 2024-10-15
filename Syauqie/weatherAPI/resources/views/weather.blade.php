<!DOCTYPE html>
<html>
<head>
    <title>Cuaca Terkini</title>
</head>
<body>
    <h1>Masukkan Nama Kota untuk Melihat Cuaca</h1>
    <a href="/weather">log</a>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <!-- Form untuk mencari cuaca berdasarkan nama kota -->
    <form action="/weather" method="POST">
        @csrf
        <input type="text" name="city" placeholder="Nama Kota" required>
        <button type="submit">Cari Cuaca</button>
    </form>

    <!-- Jika ada data cuaca, tampilkan hasilnya -->
    @if (isset($weather))
        <h2>Cuaca di {{ $weather['name'] }}:</h2>
        <p>Suhu: {{ $weather['main']['temp'] }} °C</p>
        <p>Kelembaban: {{ $weather['main']['humidity'] }}%</p>
        <p>Cuaca: {{ $weather['weather'][0]['description'] }}</p>
    @endif

    <!-- Tampilkan log pencarian cuaca -->
    @if (isset($logs))
        <h2>Log Pencarian Cuaca Terakhir:</h2>
        <ul>
            @foreach ($logs as $log)
                <li>{{ $log->city }}: {{ json_decode($log->weather_data)->main->temp }} °C</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
