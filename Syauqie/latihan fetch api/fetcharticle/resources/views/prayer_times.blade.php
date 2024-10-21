<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Jadwal Sholat</title>
</head>
<body>
    <h1>Cari Jadwal Sholat</h1>
    <form action="/prayer-times" method="POST">
        @csrf <!-- Laravel CSRF protection -->
        <label for="city">Nama Kota:</label><br>
        <input type="text" id="city" name="city" required><br><br>

        <label for="date">Tanggal (YYYY-MM-DD):</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <button type="submit">Cari Jadwal</button>
    </form>

    <div id="result">
        <!-- Hasil jadwal sholat akan ditampilkan di sini -->
        @if (isset($prayerTimes))
            <h2>Jadwal Sholat di {{ $city }} pada {{ $date }}</h2>
            <ul>
                <li>Subuh: {{ $prayerTimes['subuh'] }}</li>
                <li>Dzuhur: {{ $prayerTimes['dzuhur'] }}</li>
                <li>Ashar: {{ $prayerTimes['ashar'] }}</li>
                <li>Maghrib: {{ $prayerTimes['maghrib'] }}</li>
                <li>Isya: {{ $prayerTimes['isya'] }}</li>
            </ul>
        @elseif (isset($error))
            <p>{{ $error }}</p>
        @endif
    </div>
</body>
</html>
