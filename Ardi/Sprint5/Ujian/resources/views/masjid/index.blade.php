<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1 class="text-3xl font-bold tracking-tight">Data Masjid</h1>
    <h3 class="text-xl">Data Setiap Masjid Di Kota</h3>

    <ul>
        @foreach($masjids as $masjid)
            <li>
                <h2>{{ $masjid->nama }}</h2>
                <p>Alamat: {{ $masjid->alamat }}</p>
                <p>Jumlah Rek Donasi {{ $masjid->jumlah_rek_donasi }}</p>
                <p>Kapasitas {{ $masjid->kapasitas }}</p>

                <h3>Jamaah:</h3>
                <ul>
                    @foreach($masjid->jamaahs as $jamaah)
                        <li>{{ $jamaah->name }} - {{ $jamaah->city }}</li>
                    @endforeach
                </ul>

                <h3>Kegiatan:</h3>
                <ul>
                    @foreach($masjid->kegiatan as $kegiatan)
                        <li>{{ $kegiatan->name }} pada {{ $kegiatan->date }} ({{ $kegiatan->start_time }} - {{ $kegiatan->end_time }})</li>
                    @endforeach
                </ul>
            </li>        
        @endforeach
    </ul>
</body>
</html>