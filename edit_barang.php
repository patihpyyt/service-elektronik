<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
SELECT barang_service.*, pelanggan.nama AS nama_pelanggan
FROM barang_service
JOIN pelanggan ON barang_service.id_pelanggan = pelanggan.id_pelanggan
WHERE id_barang='$id'
");

$row = mysqli_fetch_assoc($data);

if (!$row) {
    die("Data tidak ditemukan");
}

if (isset($_POST['update'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $merek = $_POST['merek'];
    $keluhan = $_POST['keluhan'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $status_service = $_POST['status_service'];

    $update = mysqli_query($koneksi, "
        UPDATE barang_service SET
        id_pelanggan='$id_pelanggan',
        nama_barang='$nama_barang',
        jenis_barang='$jenis_barang',
        merek='$merek',
        keluhan='$keluhan',
        tanggal_masuk='$tanggal_masuk',
        status_service='$status_service'
        WHERE id_barang='$id'
    ");

    if (!$update) {
        die("Error: " . mysqli_error($koneksi));
    }

    header("Location: barang_service.php");
    exit;
}
?>

<h2>Edit Barang Service</h2>

Nama Pelanggan:
<input type="text" value="<?= $row['nama_pelanggan'] ?>" disabled><br><br>

<form method="POST">

ID Pelanggan:
<input type="number" name="id_pelanggan" value="<?= $row['id_pelanggan'] ?>"><br><br>

Nama Barang:
<input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>"><br><br>

Jenis Barang:
<input type="text" name="jenis_barang" value="<?= $row['jenis_barang'] ?>"><br><br>

Merek:
<input type="text" name="merek" value="<?= $row['merek'] ?>"><br><br>

Keluhan:
<textarea name="keluhan"><?= $row['keluhan'] ?></textarea><br><br>

Tanggal Masuk:
<input type="date" name="tanggal_masuk" value="<?= $row['tanggal_masuk'] ?>"><br><br>

Status Service:
<select name="status_service">
    <option value="Menunggu" <?= $row['status_service']=="Menunggu"?"selected":"" ?>>Menunggu</option>
    <option value="Proses" <?= $row['status_service']=="Proses"?"selected":"" ?>>Proses</option>
    <option value="Selesai" <?= $row['status_service']=="Selesai"?"selected":"" ?>>Selesai</option>
</select><br><br>

<button type="submit" name="update">Update</button>

</form>