{{-- resources/views/divisi/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Divisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Daftar Divisi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Divisi</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($divisis as $divisi)
                    <tr>
                        <td>{{ $divisi->nama_divisi }}</td>
                        <td>{{ $divisi->angkatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
