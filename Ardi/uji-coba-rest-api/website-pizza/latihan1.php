<?php
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Pizza Hut!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="120"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">

            <div class="col">
                <h1>All Menu</h1>
            </div>

            <div class="row mt-5">
                <?php foreach ($menu as $shole) : ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="img/pizza/<?= $shole["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $shole["nama"]; ?></h5>
                            <p class="card-text"><?= $shole["deskripsi"]; ?></p>
                            <h5 class="card-title"><?= $shole["harga"]; ?></h5>
                            <a href="#" class="btn btn-primary mt-3">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--     
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>