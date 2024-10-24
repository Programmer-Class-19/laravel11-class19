<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Jadwal Shalat di {{ $city }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Shalat</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Subuh</td>
                    <td>{{ $times['Fajr'] }}</td>
                </tr>
                <tr>
                    <td>Dzuhur</td>
                    <td>{{ $times['Dhuhr'] }}</td>
                </tr>
                <tr>
                    <td>Ashar</td>
                    <td>{{ $times['Asr'] }}</td>
                </tr>
                <tr>
                    <td>Maghrib</td>
                    <td>{{ $times['Maghrib'] }}</td>
                </tr>
                <tr>
                    <td>Isya</td>
                    <td>{{ $times['Isha'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
