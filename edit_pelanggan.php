<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];


    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama', no_hp='$no_hp', alamat='$alamat'  WHERE id_pelanggan='$id' ");

    header("Location: pelanggan.php");
}
?>

<h2>Edit pelanggan</h2>

<form method="POST">
    Nama: <br>
    <input type="text", name="nama", value="<?= $row['nama']?>"> <br> <br>

    No_hp: <br>
    <input type="text", name="no_hp", value="<?= $row['no_hp']?>"> <br> <br>

    alamat: <br>
    <input type="text", name="alamat", value="<?= $row['alamat']?>"> <br> <br>
 
    <button type="submit" name="update">Update</button>
</form>