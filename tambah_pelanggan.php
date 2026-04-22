<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO pelanggan (nama, no_hp, alamat)
    VALUES ('$nama', '$no_hp', '$alamat')");

    header("Location: pelanggan.php");
}
?>

<h2>Tambah Pelanggan</h2>

<form method="POST">
    Nama: <br>
    <input type="text", name="nama"><br><br>

    no hp: <br>
    <input type="text", name="no_hp"><br><br>

    alamat: <br>
    <input type="text", name="alamat"><br><br>
    
    <button type="submit" name="simpan">Simpan</button>

</form>