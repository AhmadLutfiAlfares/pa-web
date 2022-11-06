<?php
$db = mysqli_connect(
    $hostname="localhost",
    $username="root",
    $password="",
    $database="journable"
);
if(!$db) {
    echo "Koneksi tidak berhasil";
}