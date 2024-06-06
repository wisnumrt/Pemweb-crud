<?php

function getConnection()
{
    // membuat koneksi ke database system
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "buku";

    // membuat koneksi
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

    // mengecek apakah koneksi berhasil
    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }

    mysqli_select_db($conn, $dbName);

    return $conn;
}


