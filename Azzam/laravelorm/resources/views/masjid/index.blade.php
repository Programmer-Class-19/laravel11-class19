<!-- resources/views/masjid/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Masjid</title>
</head>
<body>
    <h1>Daftar Masjid</h1>
<ul>
    @foreach ($masjids as $masjid)
        <li>{{ $masjid->nama }} - {{ $masjid->alamat }}</li>
    @endforeach
</ul>

<form action="{{ route('masjid.store') }}" method="POST">
    <input type="text" name="nama" placeholder="Nama Masjid">
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="number" name="jumlah_rekening_donasi" placeholder="Jumlah Rekening Donasi">
    <input type="number" name="kapasitas" placeholder="Kapasitas">
    <button type="submit">Tambah Masjid</button>
</form>
</body>
</html>

