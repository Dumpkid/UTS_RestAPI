<?php
    $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $dbname = 'inv_buku';

    $conn = mysqli_connect($host, $user, $pswd, $dbname);
    if(!$conn){
        die("Koneksi Database Gagal: " . mysqli_connect_error());
    } else {
        return $conn;
    }

?>