<?php

$host = "localhost";
$username = "root";
$password = "password";
$database = "nilai";

$koneksi = mysqli_connect($host, $username, $password, $database);

if($koneksi -> connect_error){
    echo "Koneksi Error". mysqli_connect_error();
}

?>