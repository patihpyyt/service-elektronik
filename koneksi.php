<?php

$hostname = "localhost";
$users = "root";
$password = "";
$db = "service_elektronik";

$koneksi = mysqli_connect($hostname, $users, $password,$db);

if(!$koneksi){
    die("koneksi gagal" . mysqli_connect_error());
}


?>