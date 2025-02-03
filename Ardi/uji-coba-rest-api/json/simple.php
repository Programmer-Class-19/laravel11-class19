<?php 

    $mahasiswa = [
        [
            "nama" => "Ardi Juni Yansyah",
            "nrp" => "0012062005",
            "jurusan" => "Teknik Informatika",
            "pekerjaan" => "Fullstack Web Developers"
        ],

        [
            "nama" => "Ghibto Syidqi",
            "nrp" => "002062005",
            "jurusan" => "Desain Grafis",
            "pekerjaan" => "Desainer"
        ]
        
    ];

    // var_dump($mahasiswa);
    $sample = json_encode($mahasiswa);
    echo $sample;

?>