<!-- resources/views/pondok_it/mentor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mentor</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pondok IT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('santri.index') }}">Santri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('divisi.index') }}">Divisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mentor.index') }}">Mentor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ujian.index') }}">Ujian</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Data Mentor</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Mentor</th>
                    <th>Spesialis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mentors as $mentor)
                    <tr>
                        <td>{{ $mentor->nama }}</td>
                        <td>{{ $mentor->spesialis->nama_spesialis }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
