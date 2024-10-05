{{-- resources/views/santri/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Santri</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Daftar Santri</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Angkatan</th>
                    <th>Divisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($santris as $santri)
                    <tr>
                        <td>{{ $santri->nama }}</td>
                        <td>{{ $santri->umur }}</td>
                        <td>{{ $santri->angkatan }}</td>
                        <td>{{ $santri->divisi->nama_divisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
