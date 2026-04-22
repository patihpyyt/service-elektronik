<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM barang_service WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $status_service = $_POST['status_service'];
    $kerusakan = $_POST['kerusakan'];
    $biaya = $_POST['biaya'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    mysqli_query($koneksi, "
        UPDATE barang_service SET
        status_service='$status_service',
        kerusakan='$kerusakan',
        biaya='$biaya',
        tanggal_selesai='$tanggal_selesai'
        WHERE id_barang='$id'
    ");

    header("Location: proses_service.php");
}
?>

<h2>Update Service</h2>

<form method="POST">

Status:
<select name="status_service">
    <option>Menunggu</option>
    <option>Proses</option>
    <option>Selesai</option>
</select><br><br>

Kerusakan:
<textarea name="kerusakan"><?= $row['kerusakan'] ?></textarea><br><br>

Biaya:
<input type="number" name="biaya" value="<?= $row['biaya'] ?>"><br><br>

Tanggal Selesai:
<input type="date" name="tanggal_selesai" value="<?= $row['tanggal_selesai'] ?>"><br><br>

<button type="submit" name="update">Update Service</button>

</form>