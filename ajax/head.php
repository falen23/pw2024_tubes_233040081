<?php
require '../proses.php';
$query = "SELECT * FROM deskripsi_film";
$deskripsi_film = query($query);

var_dump($deskripsi_film);
?>