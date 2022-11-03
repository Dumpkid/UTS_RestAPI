<?php
    $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $dbname = 'bukuinduk';

    $conn = mysqli_connect($host, $user, $pswd, $dbname);
    if(!$conn){
        die("Koneksi Database Gagal: " . mysqli_connect_error());
    }

?>