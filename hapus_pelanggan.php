<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM barang_service WHERE id_pelanggan='$id'");

mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

header("Location: pelanggan.php");
?>