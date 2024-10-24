<?php
// header('Content-Type: application/json');
// $mahasiswa = [
//   [
//     "nama" => "syauqie billah",
//     "umur" => 19,
//     "hobi" => "main bola"
//   ],
//   [
//     "nama" => "zidan",
//     "umur" => 20,
//     "hobi" => "main catur"
//   ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', 'root');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
