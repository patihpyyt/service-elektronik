<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM barang_service WHERE id_barang='$id'");

header("Location: barang_service.php");
?>