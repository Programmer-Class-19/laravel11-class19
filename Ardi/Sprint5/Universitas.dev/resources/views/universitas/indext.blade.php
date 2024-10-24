<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kampus Di Setiap Kota</title>
</head>
<body>
    <h1>Universitas</h1>
    @foreach($universities as $universitas)
        <h2>{{ $universitas->nama }}</h2>
        <p>Alamat: {{ $universitas->alamat }}</p>
        <p>Kapasitas: {{ $universitas->mahasiswa }}</p>
        <p>Kota: {{ $universitas->kota }}</p>

        <h3>Students</h3>
        <ul>
            @foreach($universitas->mahasiswas as $mahasiswa)
                <li>{{ $mahasiswa->nama }} ({{ $mahasiswa->jurusan }})</li>
            @endforeach
        </ul>
        
        <h3>Seminars</h3>
        <ul>
            @foreach($universitas->seminars as $seminar)
                <li>{{ $seminar->nama }} on {{ $seminar->tanggal }} from {{ $seminar->start_time }} to {{ $seminar->end_time }}</li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>